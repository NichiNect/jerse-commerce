<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\User;

class EditProfile extends Component
{
	public $nama, $alamat, $no_hp;
	public $dataUser;

	/**
	 * Like constructor method
	 */
	public function mount($dataUser)
	{
		$this->dataUser = $dataUser;
	}

	public function updateUser()
	{
		$this->validate([
			'nama' => 'required',
			'alamat' => 'required',
			'no_hp' => 'required|numeric',
		]);

		// $this->emit('refresh');
		// dd($this->nama . ' ' . $this->alamat . ' ' . $this->no_hp);
		$user = User::where('id', auth()->user()->id)
		->update([
			'name' => $this->nama,
			'alamat' => $this->alamat,
			'no_hp' => $this->no_hp
		]);

		session()->flash('message', 'Sukses mengganti data!');
		$this->emit('editProfile');
		return redirect()->back();
	}

	public function render()
	{
		return view('livewire.user.edit-profile', $this->dataUser);
	}
}
