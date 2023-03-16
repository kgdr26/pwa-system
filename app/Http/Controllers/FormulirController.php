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
        $data = array(
            'title' => 'Forms'
        );

        return view('Formulir.list')->with($data);
    }

    function FormulirAdd()
    {
        $data = array(
            'title' => 'Add Forms'
        );

        return view('Formulir.add')->with($data);
    }

}
