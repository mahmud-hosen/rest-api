<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Response;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;



use App\Http\Requests\StoreCategorytRequest;

class ProductController extends Controller
{
    public function index()
    {
      return  $users = DB::table('products')->get();
    }
}
