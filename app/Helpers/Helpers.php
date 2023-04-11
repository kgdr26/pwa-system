<?php

function idn_user($id){
    $arr    = collect(\DB::select("SELECT a.*, b.name AS name_role FROM users a LEFT JOIN  mst_role b ON a.role_id=b.id WHERE a.id='$id'"))->first();
    return $arr;
}

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
    $arr   = DB::select("SELECT a.*, b.name AS customer_name FROM mst_project a LEFT JOIN mst_customer b ON a.customer_id=b.id");

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

    $id         = $data['id'];
    $QUESTION   = $data['QUESTION'];
    $TYPE       = $data['TYPE'];
    $CHOICE     = json_encode($data['CHOICE']);

    $arr    = collect(\DB::select("SELECT * FROM trx_formulir WHERE id='$id'"))->first();

    $form       = json_decode($arr->form);
    $count_form = count($form);
    $id_form    = $count_form+1;
    $frm        = '';
    if($count_form == 0){
        if($TYPE == "CHOICE"){
            $id_val_chc = 1;
            $loop_chc   = json_decode($CHOICE);
            $frm        .= '[{"ID": '.$id_form.',"TYPE": "'.$TYPE.'","QUESTION": "'.$QUESTION.'","ANSWER": "","CHOICE": [';
            $val_chc    = '';
            foreach($loop_chc as $key => $val){
                $val_chc    .= '{"ID_CHOICE": '.$id_val_chc++.',"CHOICE_CONTENT": "'.$val.'"},';
            }
            $frm    .= substr($val_chc, 0, -1).']}]';
        }else{
            $frm    .= '[{"ID": '.$id_form.',"TYPE": "'.$TYPE.'","QUESTION": "'.$QUESTION.'","ANSWER": "","CHOICE": []}]';
        }
    }else{
        if($TYPE == "CHOICE"){
            $frm    .= '[';
            foreach($form as $key => $val){
                if($val->TYPE == 'CHOICE'){
                    $frm        .= '{"ID": '.$val->ID.',"TYPE": "'.$val->TYPE.'","QUESTION": "'.$val->QUESTION.'","ANSWER": "'.$val->ANSWER.'","CHOICE": [';
                    $val_chc    = '';
                    foreach($val->CHOICE as $k => $v){
                        $val_chc    .= '{"ID_CHOICE": '.$v->ID_CHOICE.',"CHOICE_CONTENT": "'.$v->CHOICE_CONTENT.'"},';
                    }
                    $frm    .= substr($val_chc, 0, -1).']},';
                }else{
                    $frm    .= '{"ID":'.$val->ID.',"TYPE":"'.$val->TYPE.'","QUESTION":"'.$val->QUESTION.'","ANSWER":"'.$val->ANSWER.'","CHOICE": []},';
                }
            }
            $id_val_chc = 1;
            $loop_chc   = json_decode($CHOICE);
            $frm        .= '{"ID": '.$id_form.',"TYPE": "'.$TYPE.'","QUESTION": "'.$QUESTION.'","ANSWER": "","CHOICE": [';
            $val_chc    = '';
            foreach($loop_chc as $s => $t){
                $val_chc    .= '{"ID_CHOICE": '.$id_val_chc++.',"CHOICE_CONTENT": "'.$t.'"},';
            }
            $frm    .= substr($val_chc, 0, -1).']}]';
        }else{
            $frm    .= '[';
            foreach($form as $key => $val){
                if($val->TYPE == 'CHOICE'){
                    $frm        .= '{"ID": '.$val->ID.',"TYPE": "'.$val->TYPE.'","QUESTION": "'.$val->QUESTION.'","ANSWER": "'.$val->ANSWER.'","CHOICE": [';
                    $val_chc    = '';
                    foreach($val->CHOICE as $k => $v){
                        $val_chc    .= '{"ID_CHOICE": '.$v->ID_CHOICE.',"CHOICE_CONTENT": "'.$v->CHOICE_CONTENT.'"},';
                    }
                    $frm    .= substr($val_chc, 0, -1).']},';
                }else{
                    $frm    .= '{"ID":'.$val->ID.',"TYPE":"'.$val->TYPE.'","QUESTION":"'.$val->QUESTION.'","ANSWER":"'.$val->ANSWER.'","CHOICE": []},';
                }
            }
            $frm    .= '{"ID": '.$id_form.',"TYPE": "'.$TYPE.'","QUESTION": "'.$QUESTION.'","ANSWER": "","CHOICE": []}]';
        }
    }
    
    DB::table('trx_formulir')->where('id', $id)->update(['form' => $frm]);

    // $dat['show']    = $frm;

    // return $frm;

    return 'success';
}
//End Add list form


// Action set ddistance location
function listrecordlatlongnow($id_user){
    $id_user    = $id_user;
    $date_now   = date('y-m-d');

    $arr   = DB::select("SELECT a.*, b.location_name AS mac_location_name FROM trx_record_latlong a LEFT JOIN mst_machine b ON a.id_machine=b.id WHERE a.id_user='$id_user' AND a.date_time_start LIKE '%$date_now%'");
    return $arr;
}

function listrecordlatlong($id_user){
    $id_user    = $id_user;
    
    $arr   = DB::select("SELECT a.*, b.location_name AS mac_location_name FROM trx_record_latlong a LEFT JOIN mst_machine b ON a.id_machine=b.id WHERE a.id_user='$id_user'");
    return $arr;
}

function distance($lat1, $lon1, $lat2, $lon2) {
    $theta = $lon1 - $lon2;
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $dist = $dist * 60 * 1.1515;
    $dist = $dist * 1.609344 * 1000; // convert to meters
    return $dist;
}

function travelTime($distance, $speed) {
    $time = $distance / ($speed * 1000 / 3600);
    return $time; // in seconds
}


function setdistance($data){
    $lat        = $data['lat'];
    $long       = $data['long'];
    $machine    = $data['machine'];

    $dt         = collect(\DB::select("SELECT a.*, b.name AS name_type, c.name AS name_model, d.name AS name_vendor, e.alias AS name_customer, f.alias AS name_entity FROM mst_machine a LEFT JOIN mst_machine_type b ON a.type_id=b.id LEFT JOIN mst_machine_model c ON a.model_id=c.id LEFT JOIN mst_machine_vendor d ON a.vendor_id=d.id LEFT JOIN mst_customer e ON a.customer_id=e.id LEFT JOIN mst_entity f ON a.customer_id=f.id WHERE a.id='$machine'"))->first();
    
    $latlong_mc = explode(",",$dt->lat_long);
    
    $locA_lat   = $lat;
    $locA_lon   = $long;
    $locB_lat   = $latlong_mc[0];
    $locB_lon   = $latlong_mc[1];

    $distance   = distance($locA_lat, $locA_lon, $locB_lat, $locB_lon);
    $time       = travelTime($distance, 40);

    $dats['show_wsid']          = $dt->wsid;
    $dats['show_serial_no']     = $dt->serial_no;
    $dats['show_location_name'] = $dt->location_name;
    $dats['show_location_adr']  = $dt->location_adr;
    $dats['show_customer_name'] = $dt->name_customer;
    $dats['show_lat_long']      = $dt->lat_long;
    $dats['show_id_mc']         = $dt->id;
    $dats['show_distance']      = round($distance, 2);
    $dats['show_travel_time']   = round($time/60, 2);
    return $dats;
}