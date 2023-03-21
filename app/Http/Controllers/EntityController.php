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

class EntityController extends Controller
{
    function Entity()
    {
        $arr    = listentity();
        $data = array(
            'title' => 'Entity',
            'arr'   => $arr
        );

        return view('Entity.list')->with($data);
    }


}
