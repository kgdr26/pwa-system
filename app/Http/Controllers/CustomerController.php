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

class CustomerController extends Controller
{
    function Customer()
    {
        $arr    = listcustomer();
        $type   = listcustomertype();
        $data = array(
            'title' => 'Customer',
            'arr'   => $arr,
            'type'  => $type
        );

        return view('Customer.list')->with($data);
    }

    function addcustomer(Request $request)
    {
        $name           = $request['name'];
        $alias          = $request['alias'];
        $customer_type  = $request['customer_type'];
        $email          = $request['email'];
        $tlp            = $request['tlp'];
        $is_active      = 1;
        $update_by      = auth::user()->id;

        $countrows  = listcustomer();
        $cn         = sprintf("%04d",(count($countrows)+1));
        $cd         = strtolower($alias);
        $code       = $cd.'.'.$cn;

        DB::insert("INSERT INTO mst_customer (code,name,alias,customer_type,email,tlp,is_active,update_by) values (?,?,?,?,?,?,?,?)", [$code,$name,$alias,$customer_type,$email,$tlp,$is_active,$update_by]);

        return response('success');
    }

    function CustomerType()
    {
        $arr    = listcustomertype();
        $data = array(
            'title' => 'Customer Type',
            'arr'   => $arr
        );

        return view('Customer.type')->with($data);
    }

    function addType(Request $request)
    {
        $code       = $request['code'];
        $name       = $request['name'];
        $is_active  = 1;
        $update_by  = auth::user()->id;

        $countrows  = listcustomertype();
        $cn         = sprintf("%04d",(count($countrows)+1));
        $code       = $code.'.'.$cn;

        DB::insert("INSERT INTO mst_customer_type (code,name,is_active,update_by) values (?,?,?,?)", [$code,$name,$is_active,$update_by]);

        return response('success');
    }

    function showDataType(Request $request)
    {
        $id         = $request['id'];
        $whr        = 'id';
        $table      = 'mst_customer_type';
        $data       = array(
            'id'    => $id,
            'table' => $table,
            'whr'   => $whr
        );
        $arr        = cekdata($data);

        return response($arr);
    }

}
