@extends('frount.index')

@section('content')
<main class="main-content">
    <div class="breadcrumb-area breadcrumb-height" data-bg-image="{{ asset('public/assets/images/breadcrumb/bg/1-1-1919x388.jpg')}}">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-12">
                    <div class="breadcrumb-item">
                        <h2 class="breadcrumb-heading">Cart Page</h2>
                        <ul>
                            <li>
                                <a href="index.html">Home</a>
                            </li>
                            <li>Cart Page</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cart-area section-space-y-axis-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if(!empty($cart_list) && $cart_list->count()>0)
                    <form action="{{route('cartUpdate')}}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="table-content table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="product_remove">remove</th>
                                        <th class="product-thumbnail">images</th>
                                        <th class="cart-product-name">Product</th>
                                        <th class="product-price">Unit Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $grandTotal = 0; ?>


                                    @foreach ( $cart_list as $p )
                                    <?php $grandTotal = $grandTotal + $p->netprice; ?>
                                    <tr>
                                        <input name="product_id[]" value="<?php echo $p->id ?>" type="hidden" />
                                        <td class="product_remove">
                                            <a href="#">
                                                <i class="pe-7s-close" data-tippy="Remove" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder"></i>
                                            </a>
                                        </td>
                                        <td class="product-thumbnail1">
                                            <a href="#">
                                                <img src="{{ URL::to('/') }}/public/products/<?php echo $p->product_image ?>" alt="Wishlist Thumbnail" height="112px" width="124px">
                                            </a>
                                        </td>
                                        <td class="product-name"><a href="#"><?php echo $p->product_name ?></a></td>
                                        <td class="product-price"><span class="amount">&#x20b9;<?php echo $p->product_price ?></span></td>
                                        <td class="quantity">
                                            <div class="cart-plus-minus">

                                                <input class="cart-plus-minus-box" name="product_quantity[]" value="<?php echo $p->product_quantity ?>" type="text" />
                                                <div class="dec qtybutton">
                                                    <i class="fa fa-minus"></i>
                                                </div>
                                                <div class="inc qtybutton">
                                                    <i class="fa fa-plus"></i>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="product-subtotal"><span class="amount">&#x20b9;<?php echo $p->netprice ?></span></td>
                                    </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="coupon-all">
                                    <div class="coupon">
                                        <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                                        <input class="button mt-xxs-30" name="apply_coupon" value="Apply coupon" type="submit">
                                    </div>
                                    <div class="coupon2">
                                        <input class="button" name="update_cart" value="Update cart" type="submit">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5 ml-auto">
                                <div class="cart-page-total">
                                    <h2>Cart totals</h2>
                                    <ul>
                                        <li>Subtotal <span>&#x20b9;{{$grandTotal}}</span></li>
                                        <li>Total <span>&#x20b9;{{$grandTotal}}</span></li>
                                    </ul>
                                    <a href="{{route('checkOut')}}">Proceed to checkout</a>
                                </div>
                            </div>
                        </div>
                    </form>
                    @else
                    <h2 align="center">No Items in Cart<h1>

                            @endif
                </div>
            </div>
        </div>
    </div>
</main>
@endsection