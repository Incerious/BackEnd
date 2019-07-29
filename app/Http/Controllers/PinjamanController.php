<?php

namespace App\Http\Controllers;
use App\Model\peminjaman;
use App\Model\pengembalian;
use App\Model\member;
use App\Model\buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PinjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        $buku = buku::find($request->buku_id);
        $jumlah = $buku->qty;
        $buku->qty = $jumlah - 1;
        $buku->save();


        // $peminjaman = peminjaman::create($request->all());
        $nqty=1;
        $peminjaman = peminjaman::create([
            'admin_id'=>$request->admin_id,
            'member_id'=>$request->member_id,
            'buku_id'=>$request->buku_id,
            'qty'=>$nqty,
        ]);

         
         return redirect()->route('member.show', ['id'=>$peminjaman->member->id]);

         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {



        // $peminjaman = peminjaman::create($request->all());

        $pengembalian = pengembalian::create([
            'pinjaman_id'=>$request->pinjaman_id,
            'admin_id'=>$request->admin_id,
            'member_id'=>$request->member_id,
            'buku_id'=>$request->buku_id,
            'qty'=>$request ->qty,
        ]);

        // 

        $buku = buku::find($request->buku_id);
        $jumlah = $buku->qty;
        $buku->qty = $jumlah + 1;
        $buku->save();

        // 
        $peminjaman = peminjaman::find($id);

        $peminjaman->delete();

        return redirect()->route('member.show', ['id'=>$peminjaman->member->id]);
    }
}
