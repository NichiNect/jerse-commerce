<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
    	$totalUser = \App\User::count();
    	$pesananUserBelumTerkonfirmasi = \App\PesananUser::where('status', 1)->count();
    	$products = \App\Product::count();
    	return view('admin.dashboard-admin', [
    		'totalUser' => $totalUser,
    		'pesananUser' => $pesananUserBelumTerkonfirmasi,
    		'products' => $products,
    	]);
    }
}
