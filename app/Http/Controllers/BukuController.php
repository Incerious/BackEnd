<?php

namespace App\Http\Controllers;
use App\Model\buku;
use App\Model\kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;
class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $buku = buku::all();
        return view("buku.index", ['buku'=>$buku]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kategori = kategori::all();
        return view("buku.add", ['kategori'=>$kategori]);
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
        $this->validate($request, [
    			'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
    		]);

    		// menyimpan data file yang diupload ke variabel $file
    		$file = $request->file('file');

    		$nama_file = time()."_".$file->getClientOriginalName();

          	        // isi dengan nama folder tempat kemana file diupload
    		$tujuan_upload = 'img';
    		$file->move($tujuan_upload,$nama_file);

        DB::table('buku')->insert([
          'nama_buku' => $request -> nm,
          'kategori_id' => $request -> kategori_id,
          'qty' => $request -> stck,
          'keterangan' => $request -> kt,
          'cover' => $nama_file,
          'denda' => $request -> ded,

        ]);
          return redirect()->route('buku.index');
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
        $kategori = kategori::all();
        $buku = buku::where('id', $id)->first();
        return view("buku.edit", ['buku'=>$buku],['kategori'=>$kategori]);
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
        $this->validate($request, [
                'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('file');

            $nama_file = time()."_".$file->getClientOriginalName();

                    // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'img';
            $file->move($tujuan_upload,$nama_file);

            buku::where('id', $id)
            ->update([
            // buku::create([
              'nama_buku' => $request -> nm,
              'kategori_id' => $request -> kategori_id,
              'qty' => $request -> stck,
              'keterangan' => $request -> kt,
              'cover' => $nama_file,
              'denda' => $request -> ded,
            ]);
            return redirect()->route('buku.index');
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
        // hapus file
        $buku = buku::where('id',$id)->first();
        File::delete('img/'.$buku->cover);
     
        // hapus data
        buku::where('id', $id)->delete();

     
        return redirect()->back();
        return redirect()->route('buku.index');
    }
}
