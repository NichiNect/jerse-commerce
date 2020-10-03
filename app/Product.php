<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'nama',
        'harga',
        'harga_nameset',
        'is_ready',
        'jenis',
        'berat',
        'gambar',
        'liga_id'
    ];

    /**
     * Relation Many to One with 'liga' table
     */
    public function liga()
    {
    	return $this->belongsTo(Liga::class, 'liga_id', 'id');
    }

    /**
     * Relation One to Many with 'pesanan_detail' table
     */
    public function pesanan_details()
    {
        return $this->hasMany(PesananDetail::class, 'product_id', 'id');
    }

    /**
    * Method to take image with symbolic link from /storage
    */
    public function getTakeJerseyImageAttribute() {
        return '/storage/images/jersey/' . $this->gambar;
    }

}
