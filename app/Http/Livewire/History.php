<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\PesananUser;
use Auth;

class History extends Component
{
	public $semuaPesanan;

    public function render()
    {
    	if (Auth::user()) {
    		$this->semuaPesanan = PesananUser::where('user_id', Auth::user()->id)->where('status', '!=', 0)->get();
    	}

        return view('livewire.history');
    }
}
