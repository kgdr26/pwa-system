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

class EntityController extends Controller
{
    function Entity()
    {
        $arr    = listentity();
        $data = array(
            'title' => 'Entity',
            'arr'   => $arr
        );

        return view('Entity.list')->with($data);
    }

    function addentity(Request $request)
    {
        $name      = $request['name'];
        $alias     = $request['alias'];
        $email     = $request['email'];
        $owner     = $request['owner'];
        $tlp       = $request['tlp'];
        $is_active  = 1;
        $update_by  = 1;

        $countrows  = listentity();
        $cn         = sprintf("%04d",(count($countrows)+1));
        $cd         = strtolower($alias);
        $code       = $cd.'-'.$cn;

        DB::insert("INSERT INTO mst_entity (code,name,alias,email,owner,tlp,is_active,update_by) values (?,?,?,?,?,?,?,?)", [$code,$name,$alias,$email,$owner,$tlp,$is_active,$update_by]);

        return response('success');
    }

}
