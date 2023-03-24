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

class ProjectController extends Controller
{
    function Project()
    {
        $data = array(
            'title' => 'Project'
        );

        return view('Project.list')->with($data);
    }

}
