<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\{PesananUser, PesananDetail};
use Auth;

class Keranjang extends Component
{	
	protected $pesanan;
	protected $pesanan_details = [];
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
