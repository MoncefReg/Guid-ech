<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class GuidTaxiController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function afficher($wilayas_id){
    	$elements = DB::table('GuidTaxis')->where('wilaya_id', strval($wilayas_id))->paginate(5);

        return view('GuidTaxi', compact('elements'));

    }
    public function affichertt(){

        $elements = DB::table('GuidTaxis')->get();

        return view('GuidTaxi' , compact('elements'));
    }

    }

   /*
    public function index()
    {
        return view('GuidTaxi');
    }*/
