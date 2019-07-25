<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class member extends Model
{
    //
    protected $table = 'member';
    protected $fillable = ['username', 'alamat', 'no_hp', 'tanggal_lahir'];
    const UPDATED_AT = null;
  	const CREATED_AT = null;

  	public function peminjaman()
    {
      // code...
      	return $this->hasMany('App\Model\peminjaman', 'member_id');
    }

    public function pengembalian()
    {
      // code...
      	return $this->hasMany('App\Model\pengembalian', 'member_id');
    }

}
