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
        $idn_user   = idn_user(auth::user()->id);
        $arr    = listusers();
        $role   = listrole();
        $servicebase   = listservicebase();
        $data = array(
            'idn_user'  => $idn_user,
            'title' => 'Users',
            'arr'   => $arr,
            'role'  => $role,
            'servicebase'   => $servicebase
        );

        return view('Users.list')->with($data);
    }

    function adduser(Request $request)
    {
        $name      = $request['name'];
        $alias     = $request['alias'];
        $email     = $request['email'];
        $tlp       = $request['tlp'];
        $username  = $request['username'];
        $pass      = $request['password'];
        $password  = Hash::make($pass);
        $role_id   = $request['role_id'];
        $id_service_base   = $request['id_service_base'];
        $is_active  = 1;
        $update_by  = auth::user()->id;

        $countrows  = listusers();
        $cn         = sprintf("%04d",(count($countrows)+1));
        $data       = array(
            'id'    => $role_id,
            'table' => 'mst_role',
            'whr'   => 'id'
        );
        $rolecode   = cekdata($data);
        $cd         = $rolecode['row']->code;
        $code       = $cd.'-'.$cn;

        DB::insert("INSERT INTO users (code,username,pass,password,name,alias,role_id,email,tlp,id_service_base,is_active,update_by) values (?,?,?,?,?,?,?,?,?,?,?,?)", [$code,$username,$pass,$password,$name,$alias,$role_id,$email,$tlp,$id_service_base,$is_active,$update_by]);

        return response('success');
    }

    function Role()
    {
        $idn_user   = idn_user(auth::user()->id);
        $arr    = listrole();
        $data = array(
            'idn_user'  => $idn_user,
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
        $update_by  = auth::user()->id;

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
