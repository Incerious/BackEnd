<?php

namespace App\Http\Controllers;
use App\Model\buku;
use App\Model\member;
use App\Model\peminjaman;
use App\Model\pengembalian;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
    public function getmember()
    {
      // code...
      $member = member::all();
      return response()->json($member);
    }

    public function postmember(Request $request)
    {
        # code...
        // back end = pengelolahan data
        // return $request->all();
        $save = member::create($request->all());
        if ($save) {
            # code...
            $res = array(
                'status' => true,
                'message' => 'Berhasil di tambahkan'
            );
        } else {
            # code...
            $res = array(
                'status' => false,
                'message' => 'fail'
            );
        }
        return response()->json($res);
    }

    public function getpeminjaman($id)
    {
      // code...
      // $member=member::findOrFail($id);
      $peminjaman = peminjaman::all()->where('member_id', $id);
      // $peminjaman = peminjaman::all();
      // $buku = buku::all();

      return response()->json($peminjaman);
    }
}
