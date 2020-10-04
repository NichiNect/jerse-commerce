<?php

namespace App\Http\Controllers\Admin\Pesanan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\PesananUser;

class PesananUserController extends Controller
{
    /**
     * Display a listing.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesananUsers = PesananUser::where('status', 1)->paginate(10);
        return view('admin.pesanan-user.pesanan-users', compact('pesananUsers'));
    }

    /**
     * Confirm 'pesanan' from user with specified request.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirm($id)
    {
    	$pesananUser = PesananUser::findOrFail($id);
    	$pesananUser->status = 2;
    	$pesananUser->update();

    	session()->flash('success', "Konfirmasi Sukses!");
        return redirect()->route('admin.pesananuser');
    }
}
