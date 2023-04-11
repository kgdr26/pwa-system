<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Support\Facades\File;
use ZanySoft\Zip\Zip;
use ZipArchive;
use Carbon\Carbon;
use Response;
use Hash;
use Auth;
use Session;
use Redirect;

class RecordLatlongController extends Controller
{
    function betweenlatlong()
    {
        $idn_user   = idn_user(auth::user()->id);
        $arr        = listrecordlatlongnow(auth::user()->id);
        $machine    = listmachine();

        $data = array(
            'idn_user'  => $idn_user,
            'title'     => 'Between Latlong',
            'arr'       => $arr,
            'machine'   => $machine
        );

        return view('RecordLatlong.betweenlatlong')->with($data);
    }

    function setdistance(Request $request){
        $lat        = $request['lat'];
        $long       = $request['long'];
        $machine    = $request['machine'];

        $data       = array(
            'lat'       => $lat,
            'long'      => $long,
            'machine'   => $machine
        );

        $arr        = setdistance($data);
        return response($arr);
    }

    function addrecordlatlong(Request $request){
        $inp_latlong_mc             = $request['inp_latlong_mc'];
        $inp_latlong_usr            = $request['inp_latlong_usr'];
        $inp_id_mc                  = $request['inp_id_mc'];
        $inp_distance_estimation    = $request['inp_distance_estimation'];
        $inp_time_estimation        = $request['inp_time_estimation'];
        $id_user                    = auth::user()->id;
        $date_time_start            = date('y-m-d H:i:s');

        DB::insert("INSERT INTO trx_record_latlong (id_user,id_machine,latlong_start,latlong_end,date_time_start,distance_estimation,time_estimation) values (?,?,?,?,?,?,?)", [$id_user,$inp_id_mc,$inp_latlong_usr,$inp_latlong_mc,$date_time_start,$inp_distance_estimation,$inp_time_estimation]);

        return response('success');

    }

    function historybetweenlatlong(){
        $idn_user   = idn_user(auth::user()->id);
        $arr        = listrecordlatlong(auth::user()->id);

        $data = array(
            'idn_user'  => $idn_user,
            'title'     => 'History Between Latlong',
            'arr'       => $arr
        );

        return view('RecordLatlong.historybetweenlatlong')->with($data);
    }


}
