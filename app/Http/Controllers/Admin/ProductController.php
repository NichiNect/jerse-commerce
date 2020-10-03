<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $liga = \App\Liga::get();
        return view('admin.products.create-product', compact('liga'));
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
            'harga' => 'required|numeric',
            'harga_nameset' => 'required',
            'status' => 'required',
            'jenis' => 'required',
            'berat' => 'required|numeric',
            'gambar' => 'required',
            'liga' => 'required',
        ]);

        // if $_FILES
        if ($request->hasFile('gambar')) {
            $photo = $request->file('gambar');
            $image_extension = $photo->extension();
            $image_name = \Str::slug($request->nama) . '-' . time() . "." . $image_extension;
            $photo->storeAs('/images/jersey/', $image_name, 'public');
        }

        $product = Product::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'harga_nameset' => $request->harga_nameset,
            'is_ready' => $request->status,
            'jenis' => $request->jenis,
            'berat' => $request->berat,
            'gambar' => $image_name,
            'liga_id' => $request->liga,
        ]);

        session()->flash('success', "Data telah berhasil Ditambahkan!");
        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $liga = \App\Liga::get();
        return view('admin.products.edit-product', compact('product', 'liga'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'harga_nameset' => 'required',
            'status' => 'required',
            'jenis' => 'required',
            'berat' => 'required|numeric',
            'liga' => 'required',
        ]);

        $product = Product::findOrFail($id);
        $product->nama = $request->nama;
        $product->harga = $request->harga;
        $product->harga_nameset = $request->harga_nameset;
        $product->is_ready = $request->status;
        $product->jenis = $request->jenis;
        $product->berat = $request->berat;
        if($request->hasFile('gambar')) {
            \Storage::delete('public/images/jersey/'.$product->gambar);
            $photo = $request->file('gambar');
            $image_extension = $photo->extension();
            $image_name = \Str::slug($request->nama) . '-' . time() . "." . $image_extension;
            $photo->storeAs('/images/jersey', $image_name, 'public');
            $product->gambar = $image_name;
        }
        $product->liga_id = $request->liga;
        $product->save();

        session()->flash('success', "Data telah berhasil di Edit!");
        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * To get data all products from table products to ajax with \DataTables server-side 
     * rendering
     * @return json type for ajax
     */
    public function getAllProducts()
    {
        $products = Product::select('products.*');

        return \DataTables::eloquent($products)
        ->addColumn('imgJersey', function($row) {
            return '<td><img src="'.$row->TakeJerseyImage.'" alt="" width="60"></td>';
        })
        ->addColumn('liga', function($row) {
            return $row->liga->nama;
        })
        ->addColumn('hargaJersey', function($row) {
            return 'Rp.' . number_format($row->harga);
        })
        ->addColumn('status', function($row) {
            $st = $row->is_ready;
            if ($st == 1) {
                $stts = '<span class="badge badge-success m-3">Ready</span>';
            } else if($st == 0) {
                $stts = '<span class="badge badge-danger m-3">Stok Habis</span>';
            }
            return $stts;
        })
        ->addColumn('aksi', function($row) {
            return view('admin.products.aksi-button', compact('row'));
        })
        ->rawColumns(['imgJersey', 'hargaJersey', 'status', 'aksi'])
        ->toJson();
    }
}
