<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Slider;
use App\Exports\ExcelExports;
use App\Imports\ExcelImports;
use Excel;
use CategoryProductModel;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class MaterialProduct extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_material_product(){
        $this->AuthLogin();
        return view('admin.add_material_product');
    }
    public function all_material_product(){
        $this->AuthLogin();
        $all_material_product = DB::table('tbl_material')->get();
        $manager_material_product = view('admin.all_material_product')->with('all_material_product',$all_material_product);

        return view('admin')->with('admin.all_material_product',$manager_material_product);
    }
    public function save_material_product(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['material_name'] = $request -> material_product_name;
        $data['material_desc'] = $request -> material_product_desc;
        $data['material_status'] = $request -> material_product_status;

        DB::table('tbl_material')->insert($data);
        Session::put('message','Thêm Thương Hiệu Sản Phẩm Thành Công');
        return Redirect::to('add-material-product');
    }
    public function unactive_material_product($material_product_id){
        $this->AuthLogin();
        DB::table('tbl_material')->where('material_id',$material_product_id)->update(['material_status'=>1]);
        Session::put('message','Không kích hoạt Thương Hiệu sản phẩm thành công');
        return Redirect::to('all-material-product');
    }
    public function active_material_product($material_product_id){
        $this->AuthLogin();
        DB::table('tbl_material')->where('material_id',$material_product_id)->update(['material_status'=>0]);
        Session::put('message','Kích hoạt Thương Hiệu sản phẩm thành công');
        return Redirect::to('all-material-product');
    }
    public function edit_material_product($material_product_id){
        $this->AuthLogin();
        $edit_material_product = DB::table('tbl_material')->where('material_id',$material_product_id)->get();
        $manager_material_product = view('admin.edit_material_product')->with('edit_material_product',$edit_material_product);
        return view('admin')->with('admin.edit_material_product',$manager_material_product);
    }
    public function update_material_product(Request $request,$material_product_id){
        $this->AuthLogin();
        $data = array();
        $data['material_name'] = $request -> material_product_name;
        $data['material_desc'] = $request -> material_product_desc;
        DB::table('tbl_material')->where('material_id',$material_product_id)->update($data);
        Session::put('message','Cập nhật Thương Hiệu Sản Phẩm Thành Công');
        return Redirect::to('all-material-product');
    }
    public function delete_material_product($material_product_id){
        $this->AuthLogin();
        DB::table('tbl_material')->where('material_id',$material_product_id)->delete();
        Session::put('message','Xoá Thương Hiệu Sản Phẩm Thành Công');
        return Redirect::to('all-material-product');
    }
    public function show_material_home(Request $request,$material_id){
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get(); 
        $material_product = DB::table('tbl_material')->where('material_status','1')->orderby('material_id','desc')->get();
        $material_by_id = DB::table('tbl_product')->join('tbl_material','tbl_product.material_id','=','tbl_material.material_id')->where('tbl_product.material_id',$material_id)->get();
        return view('pages.material.show_material_home')->with('category',$cate_product)->with('material',$material_product)->with('material_by_id',$material_by_id);
   
        
    }
}
