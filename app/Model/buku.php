<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    //
    protected $table = 'buku';
    protected $guarded = ['id'];
    const UPDATED_AT = null;
  	const CREATED_AT = null;

    public function kategori()
    {
      // code...
        return $this->belongsTo('App\Model\kategori', 'kategori_id');
    }

    public function peminjaman()
    {
      // code...
        return $this->hasMany('App\Model\peminjaman', 'buku_id');
    }

    public function pengembalian()
    {
      // code...
        return $this->hasMany('App\Model\pengembalian', 'buku_id');
    }
}
