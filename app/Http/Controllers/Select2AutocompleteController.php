<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class Select2AutocompleteController extends Controller
{
    //
    /**
     * Show the application layout.
     *
     * @return \Illuminate\Http\Response
     */
    public function layout()
    {
    	return view('select2');
    }


    /**
     * Show the application dataAjax.
     *
     * @return \Illuminate\Http\Response
     */
    public function dataAjax(Request $request)
    {
    	$data = [];


    	if($request->has('q')){
    		$search = $request->q;
    		$data = DB::table("tb_pegawais")
    		->select("nip","nama")
    		->where('nama','LIKE',"%$search%")
    		->get();
    	}


    	return response()->json($data);
    }
}
