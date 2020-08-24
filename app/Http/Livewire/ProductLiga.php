<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\{Product, Liga};

class ProductLiga extends Component
{
	use WithPagination;

	public $search, $liga;
	protected $updatesQueryString = ['search'];

	/**
	 * to reset search input
	 */
	public function updatingSearch()
	{
		$this->resetPage();
	}

	/**
	 * Like constructor method
	 */
	public function mount($ligaID)
	{
		$ligaDetail = Liga::findOrFail($ligaID);
		if ($ligaDetail) {
			$this->liga = $ligaDetail;
		}
	}

	public function render()
	{
		if ($this->search) {
			$products = Product::where('liga_id', $this->liga->id)->where('nama', 'LIKE', "%$this->search%")->paginate(8);
		} else {
			$products = Product::where('liga_id', $this->liga->id)->paginate(8);
		}
		return view('livewire.product-index', [
			'products' => $products,
			'title' => "List Jersey : " . $this->liga->nama
		]);
	}
}
