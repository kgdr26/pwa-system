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
        $entity = listentity();
        $type   = listcustomertype();
        $data = array(
            'title' => 'Customer',
            'arr'   => $arr,
            'type'  => $type,
            'entity'=> $entity
        );

        return view('Customer.list')->with($data);
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


}
