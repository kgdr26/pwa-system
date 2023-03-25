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
    $arr   = DB::select("SELECT a.*, b.name AS role_name FROM users a LEFT JOIN mst_role b ON a.role_id=b.id");

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
    $arr   = DB::select("SELECT a.*, b.name AS name_type, c.alias AS name_entity FROM mst_customer a LEFT JOIN mst_customer_type b ON a.customer_type=b.id LEFT JOIN mst_entity c ON a.entity_id=c.id");

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
    $arr   = DB::select("SELECT a.*, b.name AS name_type, c.name AS name_model, d.name AS name_vendor, e.alias AS name_customer, f.alias AS name_entity FROM mst_machine a LEFT JOIN mst_machine_type b ON a.type_id=b.id LEFT JOIN mst_machine_model c ON a.model_id=c.id LEFT JOIN mst_machine_vendor d ON a.vendor_id=d.id LEFT JOIN mst_customer e ON a.customer_id=e.id LEFT JOIN mst_entity f ON e.entity_id=f.id");

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


function autosingkat($nm){
    $arr    = '';
    foreach($nm as $key => $val){
        $arr    .= substr($val,0,1);
    }

    return $arr;
}