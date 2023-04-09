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
        $idn_user   = idn_user(auth::user()->id);
        $arr    = listmachine();
        $type   = listtypemachine();
        $model  = listmodelmachine();
        $vendor = listvendormachine();
        $customer = listcustomer();
        $entity = listentity();

        $data = array(
            'idn_user'  => $idn_user,
            'title' => 'Machine',
            'arr'   => $arr,
            'type'  => $type,
            'model' => $model,
            'vendor'=> $vendor,
            'customer'  => $customer,
            'entity'  => $entity 
        );

        return view('Machine.list')->with($data);
    }

    function machineadd(Request $request){

        $wsid            = $request['wsid'];
        $serial_no       = $request['serial_no'];
        $location_name   = $request['location_name'];
        $location_adr    = $request['location_adr'];
        $customer_id     = $request['customer_id'];
        $entity_id       = $request['entity_id'];
        $lat_long        = $request['lat_long'];
        $type_id         = $request['type_id'];
        $model_id        = $request['model_id'];
        $vendor_id       = $request['vendor_id'];

        $is_active       = 1;
        $update_by       = auth::user()->id;

        $countrows  = listmachine();
        $cn         = sprintf("%04d",(count($countrows)+1));

        $qr_code    = 'qr.'.date('ymd').'.'.$cn;

        DB::insert("INSERT INTO mst_machine (wsid,serial_no,location_name,location_adr,customer_id,entity_id,lat_long,type_id,model_id,vendor_id,qr_code,is_active,update_by) values (?,?,?,?,?,?,?,?,?,?,?,?,?)", [$wsid,$serial_no,$location_name,$location_adr,$customer_id,$entity_id,$lat_long,$type_id,$model_id,$vendor_id,$qr_code,$is_active,$update_by]);

        return response('success');
    }
    
    function MachineType()
    {
        $idn_user   = idn_user(auth::user()->id);
        $arr    = listtypemachine();
        $data = array(
            'idn_user'  => $idn_user,
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
        $update_by  = auth::user()->id;

        $countrows  = listtypemachine();
        $cn         = sprintf("%04d",(count($countrows)+1));
        $code       = $code.$cn;

        DB::insert("INSERT INTO mst_machine_type (code,name,is_active,update_by) values (?,?,?,?)", [$code,$name,$is_active,$update_by]);

        return response('success');
    }

    function MachineVendor()
    {
        $idn_user   = idn_user(auth::user()->id);
        $arr    = listvendormachine();
        $data = array(
            'idn_user'  => $idn_user,
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
        $update_by  = auth::user()->id;

        $countrows  = listvendormachine();
        $cn         = sprintf("%04d",(count($countrows)+1));
        $code       = $code.$cn;

        DB::insert("INSERT INTO mst_machine_vendor (code,name,is_active,update_by) values (?,?,?,?)", [$code,$name,$is_active,$update_by]);

        return response('success');
    }

    function MachineModel()
    {
        $idn_user   = idn_user(auth::user()->id);
        $arr    = listmodelmachine();
        $data = array(
            'idn_user'  => $idn_user,
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
        $update_by  = auth::user()->id;

        $countrows  = listmodelmachine();
        $cn         = sprintf("%04d",(count($countrows)+1));
        $code       = $code.$cn;

        DB::insert("INSERT INTO mst_machine_model (code,name,is_active,update_by) values (?,?,?,?)", [$code,$name,$is_active,$update_by]);

        return response('success');
    }


}
