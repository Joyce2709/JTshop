<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Illuminate\support\Facades\Redirect;
session_start();
class MaterialProduct extends Controller
{
    public function add_material_product(){
        return view('admin.add_material_product');
    }
    public function all_material_product(){
        $all_material_product = DB::table('tbl_material')->get();
        $manager_material_product = view('admin.all_material_product')->with('all_material_product',$all_material_product);

        return view('admin')->with('admin.all_material_product',$manager_material_product);
    }
    public function save_material_product(Request $request){
        $data = array();
        $data['material_name'] = $request -> material_product_name;
        $data['material_desc'] = $request -> material_product_desc;
        $data['material_status'] = $request -> material_product_status;

        DB::table('tbl_material')->insert($data);
        Session::put('message','Thêm Thương Hiệu Sản Phẩm Thành Công');
        return Redirect::to('add-material-product');
    }
    public function unactive_material_product($material_product_id){
        DB::table('tbl_material')->where('material_id',$material_product_id)->update(['material_status'=>1]);
        Session::put('message','Không kích hoạt Thương Hiệu sản phẩm thành công');
        return Redirect::to('all-material-product');
    }
    public function active_material_product($material_product_id){
        DB::table('tbl_material')->where('material_id',$material_product_id)->update(['material_status'=>0]);
        Session::put('message','Kích hoạt Thương Hiệu sản phẩm thành công');
        return Redirect::to('all-material-product');
    }
    public function edit_material_product($material_product_id){
        $edit_material_product = DB::table('tbl_material')->where('material_id',$material_product_id)->get();
        $manager_material_product = view('admin.edit_material_product')->with('edit_material_product',$edit_material_product);
        return view('admin')->with('admin.edit_material_product',$manager_material_product);
    }
    public function update_material_product(Request $request,$material_product_id){
        $data = array();
        $data['material_name'] = $request -> material_product_name;
        $data['material_desc'] = $request -> material_product_desc;
        DB::table('tbl_material')->where('material_id',$material_product_id)->update($data);
        Session::put('message','Cập nhật Thương Hiệu Sản Phẩm Thành Công');
        return Redirect::to('all-material-product');
    }
    public function delete_material_product($material_product_id){
        DB::table('tbl_material')->where('material_id',$material_product_id)->delete();
        Session::put('message','Xoá Thương Hiệu Sản Phẩm Thành Công');
        return Redirect::to('all-material-product');
    }
}
