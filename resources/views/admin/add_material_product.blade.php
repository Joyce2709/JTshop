@extends('admin')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm Chất Liệu Sản Phẩm
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
                                <form role="form" action="{{URL::to('/save-material-product')}}"method="post">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Chất Liệu</label>
                                    <input type="text" name="material_product_name" class="form-control" 
                                    id="exampleInputEmail1" placeholder="Tên Chất Liệu">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô Tả Chất Liệu</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="material_product_desc"
                                    id="exampleInputPassword1" placeholder="Mô Tả Chất Liệu"></textarea>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Hiển Thị</label>
                                    <select name="material_product_status" class="form-control input-sm m-bot15">
                                        <option value="0">Ẩn </option>
                                        <option value="1">Hiển Thị </option>
                                    </select>
                                </div>
                                
                                <button type="submit" name="add_material_product" class="btn btn-info">Thêm</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
        </div>
@endsection