<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\User;
use Auth;

class UserProfile extends Component
{
	public $dataUser;

	protected $listeners = ['editProfile' => 'successEditProfile'];

	public function successEditProfile()
	{
		session()->flash('message', 'Sukses mengganti data!');
		$this->render();
	}
	/**
	 * Like constructor method
	 */
	public function mount($id)
	{
		if (!Auth::user()) {
			redirect()->route('login');
		} else {
			$this->dataUser = User::findOrFail($id);
			$this->emit('refresh');
		}
	}

    public function render()
    {
        return view('livewire.user.user-profile', [
        	'dataUser' => $this->dataUser,
        ]);
    }
}
