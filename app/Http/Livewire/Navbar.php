<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Liga;

class Navbar extends Component
{
    public function render()
    {
        return view('livewire.navbar', [
        	'ligas' => Liga::get()
        ]);
    }
}
