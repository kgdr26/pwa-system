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

class UsersController extends Controller
{
    function Users()
    {
        $arr    = listusers();
        $role   = listrole();
        $data = array(
            'title' => 'Users',
            'arr'   => $arr,
            'role'  => $role
        );

        return view('Users.list')->with($data);
    }

    function Role()
    {
        $arr    = listrole();
        $data = array(
            'title' => 'Manage Role',
            'arr'   => $arr
        );

        return view('Users.role')->with($data);
    }
    
    function addRole(Request $request)
    {
        $code       = $request['code'];
        $name       = $request['name'];
        $is_active  = 1;
        $update_by  = 1;

        DB::insert("INSERT INTO mst_role (code,name,is_active,update_by) values (?,?,?,?)", [$code,$name,$is_active,$update_by]);

        return response('success');
    }

    function showDataRole(Request $request)
    {
        $id         = $request['id'];
        $whr        = 'id';
        $table      = 'mst_role';
        $data       = array(
            'id'    => $id,
            'table' => $table,
            'whr'   => $whr
        );
        $arr        = cekdata($data);

        return response($arr);
    }


}
