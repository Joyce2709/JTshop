@extends('welcome')
@section('content')
@foreach($material_by_id as $key => $product)

<div class="col-lg-4 col-sm-6">
    <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">
        <div class="single_product_item">
            <img src="{{URL::to('public/upload/product/'.$product->product_image)}}" height="150" width="200" alt="">
            <div class="single_product_text">
                <h4>{{$product->product_name}}</h4>
                <h3>{{number_format($product->product_price,0,',','.').' '.'VNĐ'}}</h3>
                <input type="button" value="Thêm giỏ hàng" class="btn btn-default add-to-cart" data-id_product="{{$product->product_id}}" name="add-to-cart">
            </div>
        </div>
    </a>
</div>

@endforeach                   
                        <!-- <div class="col-lg-12">
                            <div class="pageination">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Previous">
                                                <i class="ti-angle-double-left"></i>
                                            </a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                                        <li class="page-item"><a class="page-link" href="#">6</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next">
                                                <i class="ti-angle-double-right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div> -->

@endsection