<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use \App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if(isset($_GET['role'])) {
            if ($_GET['role'] == 'admin') {
                $users = User::where('role', 'admin')->get();
                return view('admin.users.index1', compact('users'));
            } else if($_GET['role'] == 'user') {
                $users = User::where('role', 'user')->get();
                return view('admin.users.index2', compact('users'));
            }
        } else {
            $users = User::get();
            return view('admin.users.index', compact('users'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create-users');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'password' => 'required|min:6',
            'role' => 'required',
            'email' => 'required',
            'no_hp' => 'numeric'
        ]);

        $user = User::create([
            'name' => $request->nama,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
        ]);

        session()->flash('success', "Data telah berhasil Ditambahkan!");
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit-users', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'nama' => 'required',
            'role' => 'required',
            'email' => 'required',
            'no_hp' => 'numeric'
        ]);

        $user = User::where('id', $user->id)
        ->update([
            'name' => $request->nama,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
        ]);

        session()->flash('success', "Data telah berhasil Diedit!");
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        session()->flash('success', "Data telah berhasil Dihapus!");
        return redirect()->route('admin.users.index');
    }

    /**
     * Method to change password from admin panel
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function changepassword(User $user)
    {
        return view('admin.users.changepassword-user', compact('user'));
    }

    /**
     * Method to handle the PUT Http Request from changepassword()
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function putChangePassword(Request $request, User $user)
    {
        $request->validate([
            'password_lama' => 'required',
            'new_password' => 'required',
            'repeat_password' => 'required|same:new_password',
        ]);

        if(Hash::check($request->password_lama, $user->password)){

            $changePassword = User::where('id', $user->id)->update([
                'password' => bcrypt($request->new_password),
            ]);

            session()->flash('success', "Password telah berhasil di ubah!");
            return redirect()->route('admin.users.index');
        } else {
            session()->flash('password_salah', "Password lama salah!");
            return redirect()->back();
        }
    }

    /**
     * To get All data from table Users to ajax with \DataTables
     * @return json type for ajax
     */
    public function getAllUsers()
    {
        if(isset($_GET['role'])) {
            if ($_GET['role'] == 'admin') {
                $allUsers = User::select('users.*')->where('role', 'admin');
            } else if($_GET['role'] == 'user') {
                $allUsers = User::select('users.*')->where('role', 'user');
            }
        } else {
            $allUsers = User::select('users.*');
        }

        return \DataTables::eloquent($allUsers)
        // ->addColumn('nomer', function($row) {
        //     return $index++;
        // })
        ->addColumn('aksi', function($row) {
            return view('admin.users.aksi-button', compact('row'));
        })
        ->rawColumns(['aksi'])
        ->toJson();
    }

    /**
     * To get data user role Admin from table Users to ajax with \DataTables
     * @return json type for ajax
     */
    public function getAdminRoleUsers()
    {
        $usersRoleAdmin = User::select('users.*')->where('role', 'admin');

        return \DataTables::eloquent($usersRoleAdmin)
        ->addColumn('aksi', function($row) {
            return view('admin.users.aksi-button', compact('row'));
        })
        ->rawColumns(['aksi'])
        ->toJson();
    }

    /**
     * To get data user role User from table Users to ajax with \DataTables
     * @return json type for ajax
     */
    public function getUserRoleUsers()
    {
        $usersRoleUser = User::select('users.*')->where('role', 'user');

        return \DataTables::eloquent($usersRoleUser)
        ->addIndexColumn()
        ->addColumn('aksi', function($row) {
            return view('admin.users.aksi-button', compact('row'));
        })
        ->rawColumns(['aksi'])
        ->toJson();
    }

    /**
     * Profile Management
     * 
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $user = User::findOrFail(auth()->user()->id);

        return view('admin.users.profile.profile', compact('user'));
    }
    /**
     * Profile Management
     * 
     * @return \Illuminate\Http\Response
     */
    public function editProfile(Request $r)
    {
        $user = User::findOrFail(auth()->user()->id)->update([
            'name' => $r->nama,
            'alamat' => $r->alamat,
            'no_hp' => $r->no_hp,
        ]);

        return redirect()->route('admin.profile')->with('success', "Data profile berhasil diedit!");
    }
}
