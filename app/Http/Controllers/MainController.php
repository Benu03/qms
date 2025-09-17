<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Libraries\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;


class MainController extends Controller
{

    public function index(Request $request)
    {

        return view('welcome');

    }
    
    public function login()
    {
  
         return redirect(config('static.url_login_mudahin'));
         
    }






   




}