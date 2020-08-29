<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\{Liga, PesananUser, PesananDetail};
use Auth;

class Navbar extends Component
{
	public $jumlah = 0;

	protected $listeners = [
		'masukKeranjang' => 'updateKeranjang'
	];

	/**
	 * To update the "keranjang" with realtime/async
	 */
	public function updateKeranjang()
	{
		if (Auth::user()) {
			$pesanan = PesananUser::where('user_id', Auth::user()->id)->where('status', 0)->first();
			if ($pesanan) {
				$this->jumlah = PesananDetail::where('pesanan_user_id', $pesanan->id)->count();
			}
		}
	}

	/**
	 * Like constructor method
	 */
	public function mount()
	{
		if (Auth::user()) {
			$pesanan = PesananUser::where('user_id', Auth::user()->id)->where('status', 0)->first();
			if ($pesanan) {
				$this->jumlah = PesananDetail::where('pesanan_user_id', $pesanan->id)->count();
			}
		}
	}

    public function render()
    {
        return view('livewire.navbar', [
        	'ligas' => Liga::get(),
        	'jumlah_pesanan' => $this->jumlah,
        ]);
    }
}
