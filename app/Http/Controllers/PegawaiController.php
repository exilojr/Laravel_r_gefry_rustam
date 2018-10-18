<?php

namespace App\Http\Controllers;

use App\tb_pegawai;
use Illuminate\Http\Request;


class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pegawai = tb_pegawai::all();
        return view('PegawaiIndex',compact('pegawai'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('PegawaiInsert');
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
        $pegawai = new tb_pegawai();
        $pegawai->nip = $request->get('nip');
        $pegawai->nama = $request->get('nama');
        $pegawai->pangkat = $request->pangkat;
        $pegawai->jabatan = $request->get('jabatan');
        $pegawai->save();
 
        return redirect('pegawai')->with('success','Pegawai has been added');
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
    public function edit($nip)
    {
        //
        $pegawai = tb_pegawai::find($nip);
        return view('PegawaiEdit',compact('pegawai','nip'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nip)
    {
        //

        $test = $request->get('nip');

        $pegawai= tb_pegawai::find($nip);
        $pegawai->nip = $request->get('nip');
        $pegawai->nama = $request->get('nama');
        $pegawai->pangkat = $request->pangkat;
        $pegawai->jabatan = $request->get('jabatan');
        $pegawai->save();
        return redirect('pegawai')->with('success','Pegawai dengan Nip : '.$test. ' berhasil di UPDATE');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nip)
    {
        //
        
        $pegawai = tb_pegawai::find($nip);
        $pegawai->delete();
        return redirect('pegawai')->with('success','Pegawai dengan Nip : '.$nip. ' berhasil di DELETE');
    }
}
