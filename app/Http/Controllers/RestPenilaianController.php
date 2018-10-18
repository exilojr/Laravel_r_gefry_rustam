<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tb_pegawai;
use App\tb_hasil;
use App\tb_penilaian;
use DB;

class RestPenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = DB::table('tb_penilaians')
        ->leftJoin('tb_hasils', 'tb_penilaians.nip', '=', 'tb_hasils.nip')
        ->get();

        if(count($data) > 0){ //mengecek apakah data kosong atau tidak
            $res['message'] = "Success!";
            $res['values'] = $data;
            return response($res);
        }
        else{
            $res['message'] = "Empty!";
            return response($res);
        }
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
        try{


            $penilaian = new tb_penilaian();
            $penilaian->nip = $request->input('nip');
            $penilaian->tahun = $request->input('tahun');
            $penilaian->bulan = $request->input('bulan');
            $penilaian->jumlah_hari_kerja = $request->input('jumlah_hari_kerja');
            $penilaian->hadir = $request->input('hadir');
            $penilaian->izin = $request->input('izin');
            $penilaian->sakit = $request->input('sakit');
            $penilaian->cuti = $request->input('cuti');
            $penilaian->tanpa_alasan_sah = $request->input('tanpa_alasan_sah');
            $penilaian->terlambat = $request->input('terlambat');
            $penilaian->cepat_pulang = $request->input('cepat_pulang');
            $penilaian->uwas = $request->input('uwas');
            $penilaian->upacara = $request->input('upacara');
            $penilaian->wirid = $request->input('wirid');
            $penilaian->apel = $request->input('apel');
            $penilaian->senam = $request->input('senam');
            $penilaian->orientasi_pelayanan = $request->input('orientasi_pelayanan');
            $penilaian->integritas = $request->input('integritas');
            $penilaian->kerja_sama = $request->input('kerja_sama');
            $penilaian->kepemimpinan = $request->input('kepemimpinan');
            $penilaian->lkh = $request->input('lkh');
            $penilaian->sop = $request->input('sop');
            $penilaian->skp = $request->input('skp');

            $penilaian->save();

            //variabel pendukung proses---------------------------------------------

            $temp_nip = $request->input('nip');
            $get_pangkat = DB::table('tb_pegawais')->where('nip', $temp_nip)->value('pangkat');

            $get_tahun = $request->input('tahun');
            $get_bulan = $request->input('bulan');
            $get_jumlah_hari_kerja = $request->input('jumlah_hari_kerja');
            $get_hadir = $request->input('hadir');
            $get_izin = $request->input('izin');
            $get_sakit = $request->input('sakit');
            $get_cuti = $request->input('cuti');
            $get_tanpa_alasan_sah = $request->input('tanpa_alasan_sah');
            $get_terlambat = $request->input('terlambat');
            $get_cepat_pulang = $request->input('cepat_pulang');
            $get_uwas = $request->input('uwas');
            $get_upacara = $request->input('upacara');
            $get_wirid = $request->input('wirid');
            $get_apel = $request->input('apel');
            $get_senam = $request->input('senam');
            $get_orientasi_pelayanan = $request->input('orientasi_pelayanan');
            $get_integritas = $request->input('integritas');
            $get_kerja_sama = $request->input('kerja_sama');
            $get_kepemimpinan = $request->input('kepemimpinan');
            $get_lkh = $request->input('lkh');
            $get_sop = $request->input('sop');
            $get_skp = $request->input('skp');


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
            $hasil->nip = $request->input('nip');
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

            if($hasil->save()&&$penilaian->save()){

                $res['message'] = "Success!";
               

                return response($res);
            }

            
        }
        catch (\Illuminate\Database\QueryException $e){
     $errorCode = $e->errorInfo[1];
     if($errorCode == 1062){
           // $test =  $request->input('nip');
        $res['message'] = "Gagal Sudah Ada Nilai!";
        return response($res);
    }
}
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nip)
    {
        //
    
        $data1 = tb_penilaian::where('nip',$nip)->get();
        $data2 = tb_hasil::where('nip',$nip)->get();
        if(count($data1) > 0){ //mengecek apakah data kosong atau tidak
            $res['message'] = "Success!";
            $res['values1'] = $data1;
            $res['values2'] = $data2;
            return response($res);
        }
        else{
            $res['message'] = "Failed!";
            return response($res);
        }
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
    public function update(Request $request, $nip)
    {
        //
          

            $penilaian = tb_penilaian::find($nip);
            $penilaian->nip = $request->input('nip');
            $penilaian->tahun = $request->input('tahun');
            $penilaian->bulan = $request->input('bulan');
            $penilaian->jumlah_hari_kerja = $request->input('jumlah_hari_kerja');
            $penilaian->hadir = $request->input('hadir');
            $penilaian->izin = $request->input('izin');
            $penilaian->sakit = $request->input('sakit');
            $penilaian->cuti = $request->input('cuti');
            $penilaian->tanpa_alasan_sah = $request->input('tanpa_alasan_sah');
            $penilaian->terlambat = $request->input('terlambat');
            $penilaian->cepat_pulang = $request->input('cepat_pulang');
            $penilaian->uwas = $request->input('uwas');
            $penilaian->upacara = $request->input('upacara');
            $penilaian->wirid = $request->input('wirid');
            $penilaian->apel = $request->input('apel');
            $penilaian->senam = $request->input('senam');
            $penilaian->orientasi_pelayanan = $request->input('orientasi_pelayanan');
            $penilaian->integritas = $request->input('integritas');
            $penilaian->kerja_sama = $request->input('kerja_sama');
            $penilaian->kepemimpinan = $request->input('kepemimpinan');
            $penilaian->lkh = $request->input('lkh');
            $penilaian->sop = $request->input('sop');
            $penilaian->skp = $request->input('skp');

            $penilaian->save();

            //variabel pendukung proses---------------------------------------------

            $temp_nip = $request->input('nip');
            $get_pangkat = DB::table('tb_pegawais')->where('nip', $temp_nip)->value('pangkat');

            $get_tahun = $request->input('tahun');
            $get_bulan = $request->input('bulan');
            $get_jumlah_hari_kerja = $request->input('jumlah_hari_kerja');
            $get_hadir = $request->input('hadir');
            $get_izin = $request->input('izin');
            $get_sakit = $request->input('sakit');
            $get_cuti = $request->input('cuti');
            $get_tanpa_alasan_sah = $request->input('tanpa_alasan_sah');
            $get_terlambat = $request->input('terlambat');
            $get_cepat_pulang = $request->input('cepat_pulang');
            $get_uwas = $request->input('uwas');
            $get_upacara = $request->input('upacara');
            $get_wirid = $request->input('wirid');
            $get_apel = $request->input('apel');
            $get_senam = $request->input('senam');
            $get_orientasi_pelayanan = $request->input('orientasi_pelayanan');
            $get_integritas = $request->input('integritas');
            $get_kerja_sama = $request->input('kerja_sama');
            $get_kepemimpinan = $request->input('kepemimpinan');
            $get_lkh = $request->input('lkh');
            $get_sop = $request->input('sop');
            $get_skp = $request->input('skp');


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
            $hasil->nip = $request->input('nip');
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

            if($hasil->save()&&$penilaian->save()){

                $res['message'] = "Success!";
               

                return response($res);
            }
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
 

        $data1 = tb_penilaian::where('nip',$nip)->first();
        $data2 = tb_hasil::where('nip',$nip)->first();


        if($data1->delete()&&$data2->delete()){
            $res['message'] = "Success!";
            $res['value1'] = $data1;
            $res['value2'] = $data2;
            return response($res);
        }
        else{
            $res['message'] = "Failed!";
            return response($res);
        }
    }
}
