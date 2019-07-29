<?php

namespace App\Http\Controllers;
use App\Model\member;
use App\User;
use App\Model\buku;
use App\Model\peminjaman;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $member = member::all();
        $buku = buku::all();
        return view("member.index", ['member'=>$member, 'buku'=>$buku]);
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
        $member = member::create([
            'username'=>$request->nm,
            'alamat'=>$request->alt,
            'no_hp'=>$request->hp,
            'tanggal_lahir'=>$request->tgl,
        ]);


         return redirect()->route('member.show', ['id'=>$member->id]);
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
        $member=member::findOrFail($id);
        $peminjaman = peminjaman::all()->where('member_id', $id);
        $user = User::all();
        $buku = buku::all();

        return view('member.show') -> with('member', $member)
        -> with('peminjaman', $peminjaman)
        -> with('buku', $buku)
        -> with('user', $user);
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
        $member = member::where('id',$id)->first();

      return view ("member.edit",['member'=> $member]);
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
        member::where('id',$id)->
        update(['username'=>$request->nm,
            'alamat'=>$request->alt,
            'no_hp'=>$request->hp,
            'tanggal_lahir'=>$request->tgl,]);

        return redirect()->route('member.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        member::where('id', $id)->delete();
      return redirect()->route('member.index');
    }

    public function kembali($id){
        // $kategori = kategori::all();
        $buku = buku::where('id', $id)->first();
        return view("buku.edit", ['buku'=>$buku],['kategori'=>kategori]);
    }
}
