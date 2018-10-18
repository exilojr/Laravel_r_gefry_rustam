<?php

namespace App\Http\Controllers;

use App\tb_penilaian;
use App\tb_hasil;
use App\tb_pegawai;
use DB;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$penilaian = tb_penilaian::all();

        

            $penilaian = DB::table('tb_penilaians')
            ->leftJoin('tb_hasils', 'tb_penilaians.nip', '=', 'tb_hasils.nip')
            ->get();

        return view('PenilaianIndex',compact('penilaian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('PenilaianInsert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try{


            $penilaian = new tb_penilaian();
            $penilaian->nip = $request->nip;
            $penilaian->tahun = $request->get('tahun');
            $penilaian->bulan = $request->get('bulan');
            $penilaian->jumlah_hari_kerja = $request->get('jumlah_hari_kerja');
            $penilaian->hadir = $request->get('hadir');
            $penilaian->izin = $request->get('izin');
            $penilaian->sakit = $request->get('sakit');
            $penilaian->cuti = $request->get('cuti');
            $penilaian->tanpa_alasan_sah = $request->get('tanpa_alasan_sah');
            $penilaian->terlambat = $request->get('terlambat');
            $penilaian->cepat_pulang = $request->get('cepat_pulang');
            $penilaian->uwas = $request->get('uwas');
            $penilaian->upacara = $request->get('upacara');
            $penilaian->wirid = $request->get('wirid');
            $penilaian->apel = $request->get('apel');
            $penilaian->senam = $request->get('senam');
            $penilaian->orientasi_pelayanan = $request->get('orientasi_pelayanan');
            $penilaian->integritas = $request->get('integritas');
            $penilaian->kerja_sama = $request->get('kerja_sama');
            $penilaian->kepemimpinan = $request->get('kepemimpinan');
            $penilaian->lkh = $request->get('lkh');
            $penilaian->sop = $request->get('sop');
            $penilaian->skp = $request->get('skp');

            $penilaian->save();

            //variabel pendukung proses---------------------------------------------

            $temp_nip = $request->nip;
            $get_pangkat = DB::table('tb_pegawais')->where('nip', $temp_nip)->value('pangkat');

            $get_tahun = $request->get('tahun');
            $get_bulan = $request->get('bulan');
            $get_jumlah_hari_kerja = $request->get('jumlah_hari_kerja');
            $get_hadir = $request->get('hadir');
            $get_izin = $request->get('izin');
            $get_sakit = $request->get('sakit');
            $get_cuti = $request->get('cuti');
            $get_tanpa_alasan_sah = $request->get('tanpa_alasan_sah');
            $get_terlambat = $request->get('terlambat');
            $get_cepat_pulang = $request->get('cepat_pulang');
            $get_uwas = $request->get('uwas');
            $get_upacara = $request->get('upacara');
            $get_wirid = $request->get('wirid');
            $get_apel = $request->get('apel');
            $get_senam = $request->get('senam');
            $get_orientasi_pelayanan = $request->get('orientasi_pelayanan');
            $get_integritas = $request->get('integritas');
            $get_kerja_sama = $request->get('kerja_sama');
            $get_kepemimpinan = $request->get('kepemimpinan');
            $get_lkh = $request->get('lkh');
            $get_sop = $request->get('sop');
            $get_skp = $request->get('skp');


            $hasil_komitmen = (($get_upacara+$get_wirid+$get_apel+$get_senam)/$get_uwas)*100;

            $hasil_disiplin = ($get_hadir/$get_jumlah_hari_kerja)*100;

            $hasil_prilaku_kerja = ((20/100)*$get_orientasi_pelayanan)+((20/100)*$get_integritas)+((20/100)*$hasil_komitmen)+((20/100)*$hasil_disiplin)+((10/100)*$get_kerja_sama)+((10/100)*$get_kepemimpinan);

            $hasil_sasaran_kerja_pegawai;

            if ($get_skp<26){

                $hasil_sasaran_kerja_pegawai = 25;
            }
            else if ($get_skp >=26 and $get_skp < 51){

                $hasil_sasaran_kerja_pegawai = 50;
            }

            else if ($get_skp >= 51 and $get_skp < 76){

                $hasil_sasaran_kerja_pegawai = 75;
            }
            else if ($get_skp>=76){

                $hasil_sasaran_kerja_pegawai = 100;
            }

            $hasil_penilaian_prestasi_kerja = ((60/100)*$hasil_sasaran_kerja_pegawai)+((40/100)*$hasil_prilaku_kerja);

            $hasil_tpp_maksimal;

            if ($get_pangkat=="Eselon II"){
                $hasil_tpp_maksimal= 30000000;
            }
            else if ($get_pangkat=="Eselon III"){
                $hasil_tpp_maksimal= 25000000;
            }
            else if ($get_pangkat=="Eselon IV"){
                $hasil_tpp_maksimal= 20000000;
            }

            else if ($get_pangkat=="Golongan II"){
                $hasil_tpp_maksimal= 15000000;
            }

            else if ($get_pangkat=="Golongan III"){
                $hasil_tpp_maksimal= 10000000;
            }

            else if ($get_pangkat=="Golongan IV"){
                $hasil_tpp_maksimal= 5000000;
            }


            $hasil_kinerja = ((((70/100)*($hasil_penilaian_prestasi_kerja/100))*(70/100))*$hasil_tpp_maksimal)+((((20/100)*$get_lkh)/100)*(70/100)*$hasil_tpp_maksimal)+((10/100)*($get_sop/100));

            $hasil_kehadiran = ((30/100)*$hasil_tpp_maksimal)-(((5/100)*$get_tanpa_alasan_sah)+((3/100)*$get_izin)+((3/100)*(($get_terlambat+$get_cepat_pulang)/300))*((30/100)*$hasil_tpp_maksimal));

            $hasil_tpp_bulan_ini = $hasil_kinerja+$hasil_kehadiran;
            
            
            
            
            
            
            


            $hasil = new tb_hasil();
            $hasil->nip = $request->nip;
            $hasil->komitmen = $hasil_komitmen;
            $hasil->disiplin = $hasil_disiplin;
            $hasil->prilaku_kerja = $hasil_prilaku_kerja;
            $hasil->sasaran_kerja_pegawai = $hasil_sasaran_kerja_pegawai;
            $hasil->penilaian_prestasi_kerja = $hasil_penilaian_prestasi_kerja;
            $hasil->tpp_maksimal = $hasil_tpp_maksimal;
            $hasil->kinerja = $hasil_kinerja;
            $hasil->kehadiran = $hasil_kehadiran;
            $hasil->tpp_bulan_ini = $hasil_tpp_bulan_ini;
            $hasil->save();

            return redirect('penilaian')->with('success','Penilaian has been added');
        }
        
        catch (\Illuminate\Database\QueryException $e){
         $errorCode = $e->errorInfo[1];
         if($errorCode == 1062){
            $test =  $request->nip;
            return redirect()->back()->with('alert', "Nip Ini : ".$test.' Sudah Di Beri Nilai !')->withInput();
        }
    }
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
        $penilaian = tb_penilaian::find($nip);
        return view('PenilaianEdit',compact('penilaian','nip'));
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

        $penilaian= tb_penilaian::find($nip);
        $penilaian->nip = $request->get('nip');
        $penilaian->tahun = $request->get('tahun');
        $penilaian->bulan = $request->get('bulan');
        $penilaian->jumlah_hari_kerja = $request->get('jumlah_hari_kerja');
        $penilaian->hadir = $request->get('hadir');
        $penilaian->izin = $request->get('izin');
        $penilaian->sakit = $request->get('sakit');
        $penilaian->cuti = $request->get('cuti');
        $penilaian->tanpa_alasan_sah = $request->get('tanpa_alasan_sah');
        $penilaian->terlambat = $request->get('terlambat');
        $penilaian->cepat_pulang = $request->get('cepat_pulang');
        $penilaian->uwas = $request->get('uwas');
        $penilaian->upacara = $request->get('upacara');
        $penilaian->wirid = $request->get('wirid');
        $penilaian->apel = $request->get('apel');
        $penilaian->senam = $request->get('senam');
        $penilaian->orientasi_pelayanan = $request->get('orientasi_pelayanan');
        $penilaian->integritas = $request->get('integritas');
        $penilaian->kerja_sama = $request->get('kerja_sama');
        $penilaian->kepemimpinan = $request->get('kepemimpinan');
        $penilaian->lkh = $request->get('lkh');
        $penilaian->sop = $request->get('sop');
        $penilaian->skp = $request->get('skp');
        $penilaian->save();

        //variabel pendukung proses---------------------------------------------

        $temp_nip = $request->get('nip');
        $get_pangkat = DB::table('tb_pegawais')->where('nip', $temp_nip)->value('pangkat');

        $get_tahun = $request->get('tahun');
        $get_bulan = $request->get('bulan');
        $get_jumlah_hari_kerja = $request->get('jumlah_hari_kerja');
        $get_hadir = $request->get('hadir');
        $get_izin = $request->get('izin');
        $get_sakit = $request->get('sakit');
        $get_cuti = $request->get('cuti');
        $get_tanpa_alasan_sah = $request->get('tanpa_alasan_sah');
        $get_terlambat = $request->get('terlambat');
        $get_cepat_pulang = $request->get('cepat_pulang');
        $get_uwas = $request->get('uwas');
        $get_upacara = $request->get('upacara');
        $get_wirid = $request->get('wirid');
        $get_apel = $request->get('apel');
        $get_senam = $request->get('senam');
        $get_orientasi_pelayanan = $request->get('orientasi_pelayanan');
        $get_integritas = $request->get('integritas');
        $get_kerja_sama = $request->get('kerja_sama');
        $get_kepemimpinan = $request->get('kepemimpinan');
        $get_lkh = $request->get('lkh');
        $get_sop = $request->get('sop');
        $get_skp = $request->get('skp');


        $hasil_komitmen = (($get_upacara+$get_wirid+$get_apel+$get_senam)/$get_uwas)*100;

        $hasil_disiplin = ($get_hadir/$get_jumlah_hari_kerja)*100;

        $hasil_prilaku_kerja = ((20/100)*$get_orientasi_pelayanan)+((20/100)*$get_integritas)+((20/100)*$hasil_komitmen)+((20/100)*$hasil_disiplin)+((10/100)*$get_kerja_sama)+((10/100)*$get_kepemimpinan);

        $hasil_sasaran_kerja_pegawai;

        if ($get_skp<26){

            $hasil_sasaran_kerja_pegawai = 25;
        }
        else if ($get_skp >=26 and $get_skp < 51){

            $hasil_sasaran_kerja_pegawai = 50;
        }

        else if ($get_skp >= 51 and $get_skp < 76){

            $hasil_sasaran_kerja_pegawai = 75;
        }
        else if ($get_skp>=76){

            $hasil_sasaran_kerja_pegawai = 100;
        }

        $hasil_penilaian_prestasi_kerja = ((60/100)*$hasil_sasaran_kerja_pegawai)+((40/100)*$hasil_prilaku_kerja);

        $hasil_tpp_maksimal;

        if ($get_pangkat=="Eselon II"){
            $hasil_tpp_maksimal= 30000000;
        }
        else if ($get_pangkat=="Eselon III"){
            $hasil_tpp_maksimal= 25000000;
        }
        else if ($get_pangkat=="Eselon IV"){
            $hasil_tpp_maksimal= 20000000;
        }

        else if ($get_pangkat=="Golongan II"){
            $hasil_tpp_maksimal= 15000000;
        }

        else if ($get_pangkat=="Golongan III"){
            $hasil_tpp_maksimal= 10000000;
        }

        else if ($get_pangkat=="Golongan IV"){
            $hasil_tpp_maksimal= 5000000;
        }


        $hasil_kinerja = ((((70/100)*($hasil_penilaian_prestasi_kerja/100))*(70/100))*$hasil_tpp_maksimal)+((((20/100)*$get_lkh)/100)*(70/100)*$hasil_tpp_maksimal)+((10/100)*($get_sop/100));

        $hasil_kehadiran = ((30/100)*$hasil_tpp_maksimal)-(((5/100)*$get_tanpa_alasan_sah)+((3/100)*$get_izin)+((3/100)*(($get_terlambat+$get_cepat_pulang)/300))*((30/100)*$hasil_tpp_maksimal));

        $hasil_tpp_bulan_ini = $hasil_kinerja+$hasil_kehadiran;









        $hasil = tb_hasil::find($nip);
        $hasil->nip = $request->nip;
        $hasil->komitmen = $request->nip;
        $hasil->disiplin = $hasil_disiplin;
        $hasil->prilaku_kerja = $hasil_prilaku_kerja;
        $hasil->sasaran_kerja_pegawai = $hasil_sasaran_kerja_pegawai;
        $hasil->penilaian_prestasi_kerja = $hasil_penilaian_prestasi_kerja;
        $hasil->tpp_maksimal = $hasil_tpp_maksimal;
        $hasil->kinerja = $hasil_kinerja;
        $hasil->kehadiran = $hasil_kehadiran;
        $hasil->tpp_bulan_ini = $hasil_tpp_bulan_ini;
        $hasil->save();



        return redirect('penilaian')->with('success','Penilaian dengan Nip : '.$test. ' berhasil di UPDATE');
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
        $penilaian = tb_penilaian::find($nip);
        $penilaian->delete();
        $hasil = tb_hasil::find($nip);
        $hasil->delete();
        return redirect('penilaian')->with('success','Penilaian dengan Nip : '.$nip. ' berhasil di DELETE');
    }
}
