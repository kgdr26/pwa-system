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
    $arr   = DB::select("SELECT * FROM users");

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
    $arr   = DB::select("SELECT * FROM mst_customer");

    return $arr;
}

// End Action Customer

// Action Customer Type
function listcustomertype(){
    $arr   = DB::select("SELECT * FROM mst_customer_type");

    return $arr;
}
// End Action Customer Type