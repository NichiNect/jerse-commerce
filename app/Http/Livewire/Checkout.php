<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\{PesananUser, User};
use Auth;

class Checkout extends Component
{
	public $totalHarga, $nama, $noHP, $alamat;

	/**
	 * Like a constructor method
	 */
	public function mount()
	{
		if (!Auth::user()) {
			return redirect()->route('home');
		} else {
			$this->nama = Auth::user()->nama;
			$this->noHP = Auth::user()->noHP;
			$this->alamat = Auth::user()->alamat;

			$pesanan = PesananUser::where('user_id', Auth::user()->id)->where('status', 0)->first();

			if (!empty($pesanan)) {
				$this->totalHarga = $pesanan->total_harga + $pesanan->kode_unik;
			} else {
				return redirect()->route('home');
			}
		}
	}

	/**
	 * Catch data from view component "checkout"
	 */
	public function checkout()
	{
		$this->validate([
			'nama' => 'required',
			'noHP' => 'required|numeric',
			'alamat' => 'required'
		]);

		// update the data user
		$user = User::where('id', Auth::user()->id)->first();
		$user->no_hp = $this->noHP;
		$user->alamat = $this->alamat;
		$user->update();

		// update data on table "PesananUser"
		$pesananUser = PesananUser::where('user_id', Auth::user()->id)->where('status', 0)->first();
		$pesananUser->status = 1;
		$pesananUser->update();

		$this->emit('masukKeranjang');

		session()->flash('message', "Sukses Checkout");

		return redirect()->route('history');
	}

    public function render()
    {
        return view('livewire.checkout');
    }
}
