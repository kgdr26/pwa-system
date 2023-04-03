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
        $customer   = listcustomer();
        $entity     = listentity();

        foreach ($arr as $key => $row) {
            $arr[$key]->cus_alias = [];
            $arr[$key]->ent_alias = [];
        }

        if(!empty($arr)){
            foreach ($arr as $key => $row) {
                $mn = json_decode($row->customer_id);
                if(!empty($mn)){
                    foreach ($mn as $k => $value) {
                        $cus_alias = collect(\DB::select("SELECT alias FROM mst_customer WHERE id = '$value'"))->first();
                        $cus_alias = strtoupper($cus_alias->alias);
                        $arr[$key]->cus_alias[] = $cus_alias.',';
                    }
                }

                $nt = json_decode($row->entity_id);
                if(!empty($nt)){
                    foreach ($nt as $k => $value) {
                        $ent_alias = collect(\DB::select("SELECT alias FROM mst_entity WHERE id = '$value'"))->first();
                        $ent_alias = strtoupper($ent_alias->alias);
                        $arr[$key]->ent_alias[] = $ent_alias.',';
                    }
                }
            }
        }


        $data = array(
            'title'     => 'Forms',
            'arr'       => $arr,
            'customer'  => $customer,
            'entity'    => $entity,
            'user'      => $user,
            'role'      => $role
        );

        return view('Formulir.list')->with($data);
    }

    function formuliradd(Request $request)
    {

        $judul          = $request['judul'];
        $user_id        = json_encode($request['user_id']);
        $role_id        = json_encode($request['role_id']);
        $entity_id      = json_encode($request['entity_id']);
        $customer_id    = json_encode($request['customer_id']);
        $active_date    = $request['active_date'];
        $is_active      = 1;
        $update_by      = auth::user()->id;

        $countrows      = listformulir();
        $cn             = sprintf("%04d",(count($countrows)+1));

        $code           = 'frm.'.date('ymd').'.'.$cn;
        $form           = '[]';

        DB::insert("INSERT INTO trx_formulir (code,form,judul,active_date,user_id,role_id,entity_id,customer_id,is_active,update_by) values (?,?,?,?,?,?,?,?,?,?)", [$code,$form,$judul,$active_date,$user_id,$role_id,$entity_id,$customer_id,$is_active,$update_by]);

        return response('success');
    }

    function eform(Request $request)
    {
        $id         = $request['id'];
        $data = array(
            'title'     => 'Forms',
            'id'        => $id
        );

        return view('Formulir.eform')->with($data);
    }

    function getdataeform(Request $request)
    {
        $id         = $request['id'];
        $arr        = getdataeform($id);

        return response($arr);
    }

    function adddataeform(Request $request)
    {
        $id         = $request['id'];
        $QUESTION   = $request['QUESTION'];
        $TYPE       = $request['TYPE'];
        $CHOICE     = $request['CHOICE'];

        $data       = array(
            'id'        => $id,
            'QUESTION'  => $QUESTION,
            'TYPE'      => $TYPE,
            'CHOICE'    => $CHOICE,
        );

        $arr        = adddataeform($data);

        return response($arr);
    }

}
