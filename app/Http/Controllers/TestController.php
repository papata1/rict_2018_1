<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Business_layer;
use App\Application_layer; 

class TestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){

     $buss = DB::table('business_layer')
            ->join('department', 'department.id', '=', 'business_layer.department_id')
            ->select('business_layer.*', 'department.name as dname')
            ->get();
      return view('front.index', compact('buss'));
    }
    public function index1(){
      return view('front/index1');
    }
    public function app(){
        $apps = Application_layer::get();
        return view('front.app', compact('buss'));
    }
    public function data(){
      return view('front/data');
    }
    public function left(){
      return view('front/left-sidebar');
    }
    public function no(){
      return view('front/no-sidebar');
    }
    public function right(){
      return view('front/right-sidebar');
    }
    public function tech(){
      return view('front/tech');
    }
}
