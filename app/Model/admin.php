<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    //
    protected $table = 'admin';

    public function peminjaman()
    {
      // code...
      	return $this->hasMany('App\Model\peminjaman', 'admin_id');
    }

    public function pengembalian()
    {
      // code...
      	return $this->hasMany('App\Model\pengembalian', 'admin_id');
    }
}
