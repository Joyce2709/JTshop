<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Illuminate\support\Facades\Redirect;
session_start();
class CartController extends Controller
{
    public function save_cart(Request $request){
        $productId = $request->productid_hidden;
        $quanlity = $request->qty;
        $data = DB::table('tbl_product')->where('product_id',$productId)->get();
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get(); 
        $material_product = DB::table('tbl_material')->where('material_status','1')->orderby('material_id','desc')->get();

        return view('pages.cart.show_cart')->with('category',$cate_product)->with('material',$material_product);
    }
}
