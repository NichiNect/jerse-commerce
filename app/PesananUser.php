<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PesananUser extends Model
{
    protected $table = 'pesanan_user';

    protected $fillable = ['kode_pemesanan', 'status', 'total_harga', 'kode_unik', 'user_id'];

    /**
     * Relation One to Many with 'pesanan_detail' table
     */
    public function pesanan_details()
    {
    	return $this->hasMany(PesananDetail::class, 'pesanan_user_id', 'id');
    }

    /**
     * Relation Many to One with 'user' table
     */
    public function user()
    {
    	return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
