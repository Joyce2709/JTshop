@extends('admin')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm Sản Phẩm
                        </header>
                            <?php
                                $message = Session ::get('message');
                                    if($message){
                                        echo $message;
                                        Session ::put('message',null);
                                    }
                            ?>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Sản Phẩm</label>
                                    <input type="text" name="product_name" class="form-control" 
                                    id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá Sản Phẩm</label>
                                    <input type="text" name="product_price" class="form-control" 
                                    id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình Ảnh Sản Phẩm</label>
                                    <input type="file" name="product_image" class="form-control" 
                                    id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô Tả Sản Phẩm</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="product_desc"
                                    id="exampleInputPassword1" placeholder="Mô Tả"></textarea>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô Tả</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="product_content"
                                    id="exampleInputPassword1" placeholder="Mô Tả"></textarea>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Danh Mục</label>
                                    <select name="product_cate" class="form-control input-sm m-bot15">
                                        @foreach($cate_product as $key=>$cate)
                                        <option value="{{$cate->category_id}}">{{$cate->category_name}} </option>
                                        @endforeach
                                    </select>
                                </div> 
                                <div class="form-group">
                                    <label for="exampleInputFile">Chất Liệu</label>
                                    <select name="product_material" class="form-control input-sm m-bot15">
                                        @foreach($material_product as $key=>$material)
                                        <option value="{{$material->material_id}}">{{$material->material_name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Hiển Thị</label>
                                    <select name="product_status" class="form-control input-sm m-bot15">
                                        <option value="0">Ẩn </option>
                                        <option value="1">Hiển Thị </option>
                                    </select>
                                </div> 
                                <button type="submit" name="add_product" class="btn btn-info">Thêm</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
        </div>
@endsection