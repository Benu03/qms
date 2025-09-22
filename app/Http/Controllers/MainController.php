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

            $clientPath = public_path('img/client');
            $clients = [];

            if (is_dir($clientPath)) {
                foreach (scandir($clientPath) as $file) {
                    if ($file !== '.' && $file !== '..') {
                        $ext = pathinfo($file, PATHINFO_EXTENSION);
                        if (in_array(strtolower($ext), ['jpg','jpeg','png','gif','webp','svg'])) {
                            $clients[] = 'img/client/' . $file;
                        }
                    }
                }
            }

            return view('welcome', compact('clients'));

    }
    
    public function login()
    {
  
         return redirect(config('static.url_login_mudahin'));
         
    }






   




}