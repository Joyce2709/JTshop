<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Illuminate\support\Facades\Redirect;
session_start();
class ProductController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_product(){
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $material_product = DB::table('tbl_material')->orderby('material_id','desc')->get();

        return view ('admin.add_product')->with('cate_product',$cate_product)->with('material_product',$material_product);
    }
    public function all_product(){
        $this->AuthLogin();
        $all_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_material','tbl_material.material_id','=','tbl_product.material_id')
        ->orderby('tbl_product.product_id','desc')->paginate(10);
    	$manager_product  = view('admin.all_product')->with('all_product',$all_product);
    	return view('admin')->with('admin.all_product', $manager_product);
    }
    public function save_product(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_cate;
        $data['material_id'] = $request->product_material;
        $data['product_status'] = $request -> product_status;

        $get_image = $request ->file('product_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            
            $get_image->move('public/upload/product',$new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->insert($data);
            Session::put('message','Th??m S???n Ph???m Th??nh C??ng');
            return Redirect::to('add-product');
        }
        $data['product_image'] = '';
        DB::table('tbl_product')->insert($data);
        Session::put('message','Th??m S???n Ph???m Th??nh C??ng');
        return Redirect::to('add-product');
    }
    public function unactive_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>1]);
        Session::put('message','Kh??ng k??ch ho???t s???n ph???m th??nh c??ng');
        return Redirect::to('all-product');
    }
    public function active_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>0]);
        Session::put('message','Kh??ng k??ch ho???t s???n ph???m th??nh c??ng');
        return Redirect::to('all-product');
    }
    public function edit_product($product_id){
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get(); 
        $material_product = DB::table('tbl_material')->orderby('material_id','desc')->get(); 

        $edit_product = DB::table('tbl_product')->where('product_id',$product_id)->get();

        $manager_product  = view('admin.edit_product')->with('edit_product',$edit_product)->with('cate_product',$cate_product)->with('material_product',$material_product);

        return view('admin')->with('admin.edit_product', $manager_product);
    }
    public function update_product(Request $request,$product_id){
        $this->AuthLogin();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_cate;
        $data['material_id'] = $request->product_material;
        $data['product_status'] = $request -> product_status;

        $get_image = $request ->file('product_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/product',$new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->where('product_id',$product_id)->update($data);
            Session::put('message','C???p nh???t s???n ph???m th??nh c??ng');
            return Redirect::to('all-product');
        }   
        
        DB::table('tbl_product')->where('product_id',$product_id)->update($data);
        Session::put('message','C???p nh???t s???n ph???m th??nh c??ng');
        return Redirect::to('all-product');
    }
    public function delete_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->delete();
        Session::put('message','X??a s???n ph???m th??nh c??ng');
        return Redirect::to('all-product');
    }
    public function details_product($product_id){
       

        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','desc')->get(); 
        $material_product = DB::table('tbl_material')->where('material_status','1')->orderby('material_id','desc')->get();
        $details_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_material','tbl_material.material_id','=','tbl_product.material_id')
        ->where('tbl_product.product_id',$product_id)->get();

        foreach($details_product as $key => $details){
            $category_id = $details->category_id;
        }
        $related_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_material','tbl_material.material_id','=','tbl_product.material_id')
        ->where('tbl_category_product.category_id',$category_id)
        ->whereNotIn('tbl_product.product_id',[$product_id])->get();  
        
       

       return view('pages.sanpham.show_details')
       ->with('category',$cate_product)
       ->with('material',$material_product)
       ->with('product_details',$details_product)
       ->with('relate',$related_product);
   }
   
}
