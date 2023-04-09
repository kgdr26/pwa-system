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

class DashboardController extends Controller
{
    function Dashboard()
    {
        $idn_user   = idn_user(auth::user()->id);
        $data = array(
            'idn_user'  => $idn_user,
            'title' => 'Dashboard'
        );

        return view('Dashboard.list')->with($data);
    }

    function dashlocation(Request $request)
    {
        $latitude   = $request['latitude'];
        $longitude  = $request['longitude'];

        if (!empty($latitude) && !empty($longitude)) {
            $gmap = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($latitude).','.$longitude.'&sensor=false';
            // curl
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $gmap);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_PROXYPORT,3128);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
            $response = curl_exec($ch);
            curl_close($ch);
            // end curl
            // $data = json_decode($response);
    
            if ($response) {
                return response($response);
            }else{
                return response(false);
            }
        }

    }

}
