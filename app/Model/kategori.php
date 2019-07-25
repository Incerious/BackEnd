<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    //
    protected $table = 'kategoris';
    protected $fillable = ['nama_kategori'];

    public function buku()
    {
      // code...
      	return $this->hasMany('App\Model\buku', 'kategori_id');
    }
}
