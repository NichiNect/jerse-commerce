<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Liga extends Model
{
	protected $table = 'liga';

	/**
	 * Relation One to Many with 'product' table
	 */
	public function products()
	{
		return $this->hasMany(Product::class, 'liga_id', 'id');
	}

	/**
    * Method to take image with symbolic link from /storage
    */
	public function getTakeLigaImageAttribute()
    {
        return '/storage/images/liga/' . $this->gambar;
    }
}
