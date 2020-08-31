<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\{PesananUser, PesananDetail};
use Auth;

class Keranjang extends Component
{	
	protected $pesanan;
	protected $pesanan_details = [];

    /**
     * Destroy method when user delete data from "Keranjang"
     * @param int $id
     */
	public function destroy($id)
	{
    	$pesanan_detail = PesananDetail::find($id); 		// keranjang user
    	if (!empty($pesanan_detail)) {
    		$pesanan = PesananUser::where('id', $pesanan_detail->pesanan_user_id)->first();
    		$jumlah_pesanan_detail = PesananDetail::where('pesanan_user_id', $pesanan->id)->count();

    		if ($jumlah_pesanan_detail == 1) {
    			$pesanan->delete();
    		} else {
    			$pesanan->total_harga = $pesanan->total_harga - $pesanan_detail->total_harga;
    			$pesanan->update();
    		}

    		$pesanan_detail->delete();
    	}

    	$this->emit('masukKeranjang');
    	session()->flash('message', 'Pesanan berhasil dihapus!');
    }

    public function render()
    {
    	if (Auth::user()) {
    		$this->pesanan = PesananUser::where('user_id', Auth::user()->id)->where('status', 0)->first();
    		if ($this->pesanan) {
    			$this->pesanan_details = PesananDetail::where('pesanan_user_id', $this->pesanan->id)->get();
    		}
    	}
    	return view('livewire.keranjang', [
    		'pesanan' => $this->pesanan,
    		'pesanan_details' => $this->pesanan_details
    	]);
    }

}
