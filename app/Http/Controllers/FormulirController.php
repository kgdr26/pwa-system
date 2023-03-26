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

class FormulirController extends Controller
{
    function Formulir()
    {
        $arr        = listformulir();
        $user       = listusers();
        $role       = listrole();
        $project    = listproject();
        $data = array(
            'title'     => 'Forms',
            'arr'       => $arr,
            'project'   => $project,
            'user'      => $user,
            'role'      => $role
        );

        return view('Formulir.list')->with($data);
    }

    function formuliradd(Request $request)
    {
        $judul       = $request['judul'];
        $project_id  = $request['project_id'];
        $date_start_active  = $request['date_start_active'];
        $date_end_active    = $request['date_end_active'];
        $user_id    = json_encode($request['user_id']);
        $role_id    = json_encode($request['role_id']);
        $is_active  = 1;
        $update_by  = 1;

        $countrows  = listformulir();
        $cn         = sprintf("%04d",(count($countrows)+1));

        $data       = array('table'=>'mst_project','whr'=>'id','id'=>$project_id);
        $asl        = cekdata($data);

        $nm         = explode(' ',  $asl['row']->name);
        $skt        = autosingkat($nm);

        $code       = 'frm.'.$skt.'.'.$cn.'.'.date('ymd');

        DB::insert("INSERT INTO trx_formulir (code,judul,project_id,date_start_active,date_end_active,user_id,role_id,is_active,update_by) values (?,?,?,?,?,?,?,?,?)", [$code,$judul,$project_id,$date_start_active,$date_end_active,$user_id,$role_id,$is_active,$update_by]);

        return response('success');
    }

}
