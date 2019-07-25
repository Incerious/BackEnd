<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class pengembalian extends Model
{
    //
    protected $table = 'pengembalian';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function admin(){
      return $this->belongsTo('App\Model\admin', 'admin_id');
     }

     public function member(){
      return $this->belongsTo('App\Model\member', 'member_id');
     }

     public function buku(){
      return $this->belongsTo('App\Model\buku', 'buku_id');
     }
}
