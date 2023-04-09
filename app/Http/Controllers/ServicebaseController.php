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

class ServicebaseController extends Controller
{
    function Servicebase()
    {
        $idn_user   = idn_user(auth::user()->id);
        $arr    = listservicebase();
        $data = array(
            'idn_user'  => $idn_user,
            'title' => 'Service Base',
            'arr'   => $arr,
        );

        return view('Servicebase.list')->with($data);
    }

    function addservicebase(Request $request)
    {
        $cod        = $request['code'];
        $city       = $request['city'];
        $region     = $request['region'];
        $is_active  = 1;
        $update_by  = auth::user()->id;

        $countrows  = listservicebase();
        $cn         = sprintf("%04d",(count($countrows)+1));
        $code       = $cod.'.'.$cn;

        DB::insert("INSERT INTO mst_service_base (code,city,region,is_active,update_by) values (?,?,?,?,?)", [$code,$city,$region,$is_active,$update_by]);

        return response('success');
    }

}
