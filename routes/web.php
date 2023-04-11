<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('tees', function () {
    return view('welcome');
});

Route::get('/',['as'=>'/login','uses'=> 'AuthController@ShowFormLogin']);
Route::get('login',['as'=> 'login','uses'=>'AuthController@ShowFormLogin']);
Route::post('login', ['as'=>'login_post','uses'=>'AuthController@login'] );
Route::get('logout', ['as'=>'logout','uses'=>'AuthController@logout']);

Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('dashboard',['as'=> 'dashboard','uses'=>'DashboardController@Dashboard']);
    Route::post('dashlocation',['as'=> 'dashlocation','uses'=>'DashboardController@dashlocation']);

    // Formulir
    Route::get('formulir',['as'=> 'formulir','uses'=>'FormulirController@Formulir']);
    Route::post('formuliradd',['as'=> 'formuliradd','uses'=>'FormulirController@formuliradd']);
    Route::get('eform',['as'=> 'eform','uses'=>'FormulirController@eform']);
    Route::post('getdataeform',['as'=> 'getdataeform','uses'=>'FormulirController@getdataeform']);
    Route::post('adddataeform',['as'=> 'adddataeform','uses'=>'FormulirController@adddataeform']);
    Route::get('contenteform',['as'=> 'contenteform','uses'=>'FormulirController@contenteform']);

    // Project
    Route::get('project',['as'=> 'project','uses'=>'ProjectController@Project']);
    Route::post('projectadd',['as'=> 'projectadd','uses'=>'ProjectController@projectadd']);

    // Users
    Route::get('users',['as'=> 'users','uses'=>'UsersController@Users']);
    Route::post('adduser',['as'=> 'adduser','uses'=>'UsersController@adduser']);
    Route::get('role',['as'=> 'role','uses'=>'UsersController@Role']);
    Route::post('addrole',['as'=> 'addrole','uses'=>'UsersController@addRole']);
    Route::post('showdatarole',['as'=> 'showdatarole','uses'=>'UsersController@showDataRole']);

    //Entity
    Route::get('entity',['as'=> 'entity','uses'=>'EntityController@Entity']);
    Route::post('addentity',['as'=> 'addentity','uses'=>'EntityController@addentity']);

    //Customer
    Route::get('customer',['as'=> 'customer','uses'=>'CustomerController@Customer']);
    Route::post('addcustomer',['as'=> 'addcustomer','uses'=>'CustomerController@addcustomer']);
    Route::get('customertype',['as'=> 'customertype','uses'=>'CustomerController@CustomerType']);
    Route::post('addtype',['as'=> 'addtype','uses'=>'CustomerController@addType']);
    Route::post('showdatatype',['as'=> 'showdatatype','uses'=>'CustomerController@showDataType']);

    //Machine
    Route::get('machine',['as'=> 'machine','uses'=>'MachineController@Machine']);
    Route::post('machineadd',['as'=> 'machineadd','uses'=>'MachineController@machineadd']);
    Route::get('machinetype',['as'=> 'machinetype','uses'=>'MachineController@MachineType']);
    Route::post('machinetypeadd',['as'=> 'machinetypeadd','uses'=>'MachineController@addtype']);
    Route::get('machinevendor',['as'=> 'machinevendor','uses'=>'MachineController@MachineVendor']);
    Route::post('machinevendoradd',['as'=> 'machinevendoradd','uses'=>'MachineController@addvendor']);
    Route::get('machinemodel',['as'=> 'machinemodel','uses'=>'MachineController@MachineModel']);
    Route::post('machinemodeladd',['as'=> 'machinemodeladd','uses'=>'MachineController@addmodel']);

    //Service Base
    Route::get('servicebase',['as'=> 'servicebase','uses'=>'ServicebaseController@Servicebase']);
    Route::post('addservicebase',['as'=> 'addservicebase','uses'=>'ServicebaseController@addservicebase']);

    //Record Latlong
    Route::get('betweenlatlong',['as'=> 'betweenlatlong','uses'=>'RecordLatlongController@betweenlatlong']);
    Route::post('setdistance',['as'=> 'setdistance','uses'=>'RecordLatlongController@setdistance']);
    Route::post('addrecordlatlong',['as'=> 'addrecordlatlong','uses'=>'RecordLatlongController@addrecordlatlong']);
    Route::get('historybetweenlatlong',['as'=> 'historybetweenlatlong','uses'=>'RecordLatlongController@historybetweenlatlong']);
    
   
    Route::get('logout', ['as'=>'logout','uses'=>'AuthController@logout']);
});