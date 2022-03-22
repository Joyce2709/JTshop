<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Mail;
use App\Slider;
use Illuminate\Support\Facades\Redirect;
session_start();
class HomeController extends Controller
{
    public function index()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get(); 
        $material_product = DB::table('tbl_material')->where('material_status','1')->orderby('material_id','desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status','1')->orderby(DB::raw('RAND()'))->paginate(10);
        return view('pages.home')->with('category',$cate_product)->with('material',$material_product)->with('all_product',$all_product);
    }
}
