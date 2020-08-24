<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PesananDetail extends Model
{
    protected $table = 'pesanan_detail';

    /**
     * Relation Many to One with 'pesanan_user' table
     */
    public function pesanan_user()
    {
    	return $this->belongsTo(PesananUser::class, 'user_id', 'id');
    }

    /**
     * Relation Many to One with 'product' table
     */

    public function product()
    {
    	return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
