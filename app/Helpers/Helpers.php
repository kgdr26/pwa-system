<?php

//Action Cek Data
function cekdata($data){
    $table      = $data['table'];
    $whr        = $data['whr'];
    $id         = $data['id'];

    $arr['row'] = collect(\DB::select("SELECT * FROM $table WHERE $whr='$id'"))->first();

    return $arr;
}
//End Action Cek Data

//Action Role
function listrole(){
    $arr   = DB::select("SELECT * FROM mst_role");

    return $arr;
}

//End Action Role

//Action Users
function listusers(){
    $arr   = DB::select("SELECT a.*, b.name AS role_name, c.city, c.region FROM users a LEFT JOIN mst_role b ON a.role_id=b.id LEFT JOIN mst_service_base c ON a.id_service_base=c.id");

    return $arr;
}

//End Action Users

// Action Entity
function listentity(){
    $arr   = DB::select("SELECT * FROM mst_entity");

    return $arr;
}

// End Action Entity

// Action Customer
function listcustomer(){
    $arr   = DB::select("SELECT a.*, b.name AS name_type FROM mst_customer a LEFT JOIN mst_customer_type b ON a.customer_type=b.id");

    return $arr;
}

// End Action Customer

// Action Customer Type
function listcustomertype(){
    $arr   = DB::select("SELECT * FROM mst_customer_type");

    return $arr;
}
// End Action Customer Type

// Action Machine
function listmachine(){
    $arr   = DB::select("SELECT a.*, b.name AS name_type, c.name AS name_model, d.name AS name_vendor, e.alias AS name_customer, f.alias AS name_entity FROM mst_machine a LEFT JOIN mst_machine_type b ON a.type_id=b.id LEFT JOIN mst_machine_model c ON a.model_id=c.id LEFT JOIN mst_machine_vendor d ON a.vendor_id=d.id LEFT JOIN mst_customer e ON a.customer_id=e.id LEFT JOIN mst_entity f ON a.customer_id=f.id");

    return $arr;
}
// End Action Machine

// Action Vendore Machine
function listvendormachine(){
    $arr   = DB::select("SELECT * FROM mst_machine_vendor");

    return $arr;
}
// End Action Vendore Machine

// Action Model Machine
function listmodelmachine(){
    $arr   = DB::select("SELECT * FROM mst_machine_model");

    return $arr;
}
// End Action Model Machine

// Action type Machine
function listtypemachine(){
    $arr   = DB::select("SELECT * FROM mst_machine_type");

    return $arr;
}
// End Action type Machine

// Action type Machine
function listproject(){
    $arr   = DB::select("SELECT a.*, b.name AS customer_name, c.name AS entity_name FROM mst_project a LEFT JOIN mst_customer b ON a.customer_id=b.id LEFT JOIN mst_entity c ON b.entity_id=c.id");

    return $arr;
}
// End Action type Machine

// Action type Machine
function listformulir(){
    $arr   = DB::select("SELECT * FROM trx_formulir");

    return $arr;
}
// End Action type Machine

// Action service base
function listservicebase(){
    $arr   = DB::select("SELECT * FROM mst_service_base");

    return $arr;
}
// End Action service base

// Action Auto singkat
function autosingkat($nm){
    $arr    = '';
    foreach($nm as $key => $val){
        $arr    .= substr($val,0,1);
    }

    return $arr;
}
// End Action Auto singkat

//Get data eform
function getdataeform($id){
    $id     = $id;

    $arr    = collect(\DB::select("SELECT * FROM trx_formulir WHERE id='$id'"))->first();

    $cus    = json_decode($arr->customer_id);
    $cus_alias  = '';
    foreach ($cus as $k => $value) {
        $arr_cus_alias      = collect(\DB::select("SELECT alias FROM mst_customer WHERE id = '$value'"))->first();
        $arr_cus_alias      = strtoupper($arr_cus_alias->alias);
        $cus_alias         .= $arr_cus_alias.', ';
    }

    $ent    = json_decode($arr->entity_id);
    $ent_alias  = '';
    foreach ($ent as $k => $value) {
        $arr_ent_alias      = collect(\DB::select("SELECT alias FROM mst_entity WHERE id = '$value'"))->first();
        $arr_ent_alias      = strtoupper($arr_ent_alias->alias);
        $ent_alias         .= $arr_ent_alias.', ';
    }

    $usr    = json_decode($arr->user_id);
    $usr_alias  = '';
    foreach ($usr as $k => $value) {
        $arr_usr_alias      = collect(\DB::select("SELECT alias FROM users WHERE id = '$value'"))->first();
        $arr_usr_alias      = strtoupper($arr_usr_alias->alias);
        $usr_alias         .= $arr_usr_alias.', ';
    }

    $rol    = json_decode($arr->role_id);
    $rol_alias  = '';
    foreach ($rol as $k => $value) {
        $arr_rol_alias      = collect(\DB::select("SELECT name FROM mst_role WHERE id = '$value'"))->first();
        $arr_rol_alias      = strtoupper($arr_rol_alias->name);
        $rol_alias         .= $arr_rol_alias.', ';
    }

    $form   = json_decode($arr->form);
    $listform   = '';
    $no     = 1;
    $count_form = count($form);
    foreach($form as $key => $val){
        $no_form    = $no++;
        $listform .= '<div class="card mb-3" id=""><div class="card-header"><div class="card-title m-0">';
        $listform .= '<h3 class="fw-bold m-0">'.$no_form.'. '.$val->QUESTION.'</h3>';
        $listform .= '</div></div>';
        $listform .= '<div class="card-body">';
        
        if($val->TYPE == 'CHOICE'){
            $CHOICE_CONTENT = '';
            foreach($val->CHOICE as $k => $v){
                $CHOICE_CONTENT .= '<label class="form-check form-check-custom form-check-solid me-10 cursor-pointer">';
                $CHOICE_CONTENT .= '<input class="form-check-input h-20px w-20px" type="checkbox" name="CHOICE_CONTENT[]" value="'.$v->CHOICE_CONTENT.'">';
                $CHOICE_CONTENT .= '<span class="form-check-label fw-bold" style="color : #000000">'.strtoupper($v->CHOICE_CONTENT).'</span></label>';
            }

            $listform .= '<h4 class="fw-bold m-0 d-flex align-items-center w-100">ANSWER : &nbsp;&nbsp;&nbsp;'.$CHOICE_CONTENT.'</h4>';
        }else{
            $listform .= '<h4 class="fw-bold m-0">ANSWER :</h4>';
        }

        $listform .= '</div>';
        $listform .= '<div class="card-footer d-flex justify-content-end">';
        $listform .= '<a href="#" class="btn btn-secondary me-3">Edit Form List</a>';
        if($no_form == $count_form){
            $listform .= '<a href="#" class="btn btn-primary" data-name="add_data">Add Form List</a>';
        }
        $listform .= '</div></div>';
    }


    $data['code']       = $arr->code;
    $data['form_name']  = $arr->judul;
    $data['user_content']   = substr($usr_alias, 0, -2);
    $data['role_approval']  = substr($rol_alias, 0, -2);
    $data['customer']   = substr($cus_alias, 0, -2);
    $data['entity']     = substr($ent_alias, 0, -2);
    $data['form']       = $listform;

    return $data;
}
//End Get data eform

//Action Add list form
function adddataeform($data){

    $id     = $data['id'];

    $arr    = collect(\DB::select("SELECT * FROM trx_formulir WHERE id='$id'"))->first();

    $form       = json_decode($arr->form);
    $count_form = count($form);
    

    $dat['show']    = json_decode($arr->form);

    return $dat;
    // return 'success';
}
//End Add list form