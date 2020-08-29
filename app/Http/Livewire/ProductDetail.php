<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\{Product, PesananUser, PesananDetail};
use Auth;

class ProductDetail extends Component
{
	public $product, $nama, $jumlah_pesan, $nomor;

	/**
	 * Like constructor method
	 */
	public function mount($id)
	{
		$productDetail = Product::findOrFail($id);
		if ($productDetail) {
			$this->product = $productDetail;
		}
	}

	public function masukkanKeranjang()
	{
		$this->validate([
			'jumlah_pesan' => 'required',
		]);

		// Validate user login
		if (!Auth::user()) {
			return redirect()->route('login');
		}

		// Calculate the total price
		if (!empty($this->nama)) {
			$total_harga = $this->jumlah_pesan * $this->product->harga + $this->product->harga_nameset;
		} else {
			$total_harga = $this->jumlah_pesan * $this->product->harga;
		}

		// Check that user have data on "Main Pesanan" with 0 status
		$pesanan = PesananUser::where('user_id', Auth::user()->id)->where('status', 0)->first();
		if (empty($pesanan)) {
			PesananUser::create([
				'user_id' => Auth::user()->id,
				'total_harga' => $total_harga,
				'status' => 0,
				'kode_unik' => mt_rand(100, 999),
			]);

			$pesanan = PesananUser::where('user_id', Auth::user()->id)->where('status', 0)->first();
			$pesanan->kode_pemesanan = 'JC' . date('dmy', time()) . $pesanan->id;
			$pesanan->update();
		} else {
			$pesanan->total_harga = $pesanan->total_harga + $total_harga;
			$pesanan->update();
		}

		// Save to "Pesanan Detail"
		PesananDetail::create([
			'product_id' => $this->product->id,
			'pesanan_user_id' => $pesanan->id,
			'jumlah_pesanan' => $this->jumlah_pesan,
			'nameset' => $this->nama ? true : false,
			'nama' => $this->nama,
			'nomor' => $this->nomor,
			'total_harga' => $total_harga
		]);

		session()->flash('message', 'Sukses Masuk ke Keranjang');
		return redirect()->back();

	}

	public function render()
	{
		return view('livewire.product-detail');
	}
}
