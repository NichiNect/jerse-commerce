<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        $users = User::get();
        return view('admin.users.index', compact('users'));
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
     * To get All data from table Users to ajax with \DataTables
     */
    public function getAllUsers()
    {
        $allUsers = User::select('users.*');

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
}
