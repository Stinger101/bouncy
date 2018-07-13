@extends('layouts.master')
@section('navig')
@include('partials.nav')
@endsection
@section('content')

<div class="row">
      <div class="col-md-8 col-md-offset-2">
          <h3 class="text-center">Your Shopping Cart</h3><br>
          <div class="table-responsive sATables zcCart">
            <form method="POST" action="http://www.gibscoffee.com/cart" accept-charset="UTF-8" class="form-horizontal"><input name="_token" type="hidden" value="jCRgT6DtttlMesviA0RHURhCRpdoHgTYi0kulDOF">
              <table class="table table-striped">
                <thead>
                  <th>Image</th>
                  <th>Title</th>
                  <th>Weight</th>
                  <th>Qty</th>
                  <th>Price</th>
                  <th>Total</th>
                  <th>Shipping</th>
                </thead>
                <tbody>

@if (count($cartitems))
<?php $tot=0; ?>
@foreach ($cartitems as $cartitem)
@include('shop.cart-item')
<?php $tot+=($cartitem->price*array_count_values(session('cart'))[$cartitem->id]); ?>
@endforeach
@endif



                <tr>
                  <td colspan="4"></td>
                  <td colspan="1"><b>Sub-total</b></td>
                  <td colspan=""><b>KES {{$tot}}</b></td>
                  <td colspan=""><b>KES 200.00</b></td>
                </tr>


                <tr>
                  <td colspan="7" class="text-center">
                    <button type="submit" name="button" class="btn btn-primary">Update Cart <i class="fa fa-refresh"></i></button>
                  </td>
                </tr>
                </tbody>
              </table>
            </form>

            <h4 class="text-center sACartTotalShared">
              <b>Cart total: KES {{$tot+200.00}}</b>
            </h4>
          </div>
          <br>
      </div>
    </div>

    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <a href="http://www.gibscoffee.com/shipping-address" class="pull-right btn btn-default">Check Out <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <br>
@endsection
@section('footer')
@include('partials.footer')
@endsection
