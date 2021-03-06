@extends('welcome')
@section('content')
  <!--================Cart Area =================-->

    <div class="container">
      <div class="cart_inner">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Sản Phẩm</th>
                <th scope="col">Giá</th>
                <th scope="col">Số Lượng</th>
                <th scope="col">Tổng Tiền</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div class="media">
                    <div class="d-flex">
                      <img src="public/upload/product/feature_441.png" height="150" width="200" alt="" />
                    </div>
                    
                  </div>
                </td>
                <td>
                  <h5>$360.00</h5>
                </td>
                <td>
                <div class="product_count">
                    <span class="input-number-decrement"> <i class="ti-angle-down"></i></span>
                    <input class="input-number" type="text" value="1" min="0" max="10">
                    <span class="input-number-increment"> <i class="ti-angle-up"></i></span>
                  </div>
                </td>
                <td>
                  <h5>$720.00</h5>
                </td>
              </tr>

            </tbody>
          </table>
          <div class="checkout_btn_inner float-right">
            <a class="btn_1" href="#">Continue Shopping</a>
            <a class="btn_1 checkout_btn_1" href="#">Proceed to checkout</a>
          </div>
        </div>
      </div>
  
  <!--================End Cart Area =================-->



@endsection