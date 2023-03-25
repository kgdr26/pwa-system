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
        $arr    = listmachine();
        $type   = listtypemachine();
        $model  = listmodelmachine();
        $vendor = listvendormachine();
        $customer = listcustomer();

        $data = array(
            'title' => 'Machine',
            'arr'   => $arr,
            'type'  => $type,
            'model' => $model,
            'vendor'=> $vendor,
            'customer'  => $customer 
        );

        return view('Machine.list')->with($data);
    }
    
    function MachineType()
    {
        $arr    = listtypemachine();
        $data = array(
            'title' => 'Machine Type',
            'arr'   => $arr
        );

        return view('Machine.type')->with($data);
    }

    function addtype(Request $request)
    {
        $code       = $request['code'];
        $name       = $request['name'];
        $is_active  = 1;
        $update_by  = 1;

        $countrows  = listtypemachine();
        $cn         = sprintf("%04d",(count($countrows)+1));
        $code       = $code.$cn;

        DB::insert("INSERT INTO mst_machine_type (code,name,is_active,update_by) values (?,?,?,?)", [$code,$name,$is_active,$update_by]);

        return response('success');
    }

    function MachineVendor()
    {
        $arr    = listvendormachine();
        $data = array(
            'title' => 'Machine Vendor',
            'arr'   => $arr
        );

        return view('Machine.vendor')->with($data);
    }

    function addvendor(Request $request)
    {
        $code       = $request['code'];
        $name       = $request['name'];
        $is_active  = 1;
        $update_by  = 1;

        $countrows  = listvendormachine();
        $cn         = sprintf("%04d",(count($countrows)+1));
        $code       = $code.$cn;

        DB::insert("INSERT INTO mst_machine_vendor (code,name,is_active,update_by) values (?,?,?,?)", [$code,$name,$is_active,$update_by]);

        return response('success');
    }

    function MachineModel()
    {
        $arr    = listmodelmachine();
        $data = array(
            'title' => 'Machine Model',
            'arr'   => $arr
        );

        return view('Machine.model')->with($data);
    }

    function addmodel(Request $request)
    {
        $code       = $request['code'];
        $name       = $request['name'];
        $is_active  = 1;
        $update_by  = 1;

        $countrows  = listmodelmachine();
        $cn         = sprintf("%04d",(count($countrows)+1));
        $code       = $code.$cn;

        DB::insert("INSERT INTO mst_machine_model (code,name,is_active,update_by) values (?,?,?,?)", [$code,$name,$is_active,$update_by]);

        return response('success');
    }


}
