@extends('admin')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Cập Nhật Chất Liệu Sản Phẩm
                        </header>
                            <?php
                                $message = Session ::get('message');
                                    if($message){
                                        echo $message;
                                        Session ::put('message',null);
                                    }
                            ?>
                        <div class="panel-body">
                            @foreach($edit_material_product as $key => $edit_value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-material-product/'.$edit_value->material_id)}}"method="post">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Chất Liệu</label>
                                    <input type="text" value="{{$edit_value->material_name}}" name="material_product_name" class="form-control" 
                                    id="exampleInputEmail1" placeholder="Tên Chất Liệu">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô Tả Chất Liệu</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="material_product_desc"
                                    id="exampleInputPassword1">{{$edit_value->material_desc}}</textarea>
                                    
                                </div>                               
                                <button type="submit" name="update_material_product" class="btn btn-info">Cập Nhật</button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
        </div>
@endsection