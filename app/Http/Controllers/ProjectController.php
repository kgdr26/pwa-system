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

class ProjectController extends Controller
{
    function Project()
    {
        $arr        = listproject();
        $customer   = listcustomer();
        $data = array(
            'title' => 'Project',
            'arr'   => $arr,
            'customer'=> $customer
        );

        return view('Project.list')->with($data);
    }

    function projectadd(Request $request)
    {
        $customer_id  = $request['customer_id'];
        $name       = $request['name'];
        $is_active  = 1;
        $update_by  = 1;

        $countrows  = listproject();
        $cn         = sprintf("%04d",(count($countrows)+1));

        $data       = array('table'=>'mst_customer','whr'=>'id','id'=>$customer_id);
        $asl        = cekdata($data);

        $nm         = explode(' ', $name);
        $skt        = autosingkat($nm);

        $code       = $asl['row']->alias.'.'.$skt.'.'.$cn;

        DB::insert("INSERT INTO mst_project (code,name,customer_id,is_active,update_by) values (?,?,?,?,?)", [$code,$name,$customer_id,$is_active,$update_by]);

        return response('success');
    }

}
