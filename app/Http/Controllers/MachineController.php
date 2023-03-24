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

class MachineController extends Controller
{
    function Machine()
    {
        $data = array(
            'title' => 'Machine'
        );

        return view('Machine.list')->with($data);
    }
    
    function MachineType()
    {
        $data = array(
            'title' => 'Machine Type'
        );

        return view('Machine.type')->with($data);
    }

    function MachineVendor()
    {
        $data = array(
            'title' => 'Machine Vendor'
        );

        return view('Machine.vendor')->with($data);
    }

    function MachineModel()
    {
        $data = array(
            'title' => 'Machine Model'
        );

        return view('Machine.model')->with($data);
    }


}
