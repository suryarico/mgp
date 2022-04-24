@extends('frount.index')

@section('content')
<main class="main-content">
    <div class="breadcrumb-area breadcrumb-height" data-bg-image="{{ asset('public/assets/images/breadcrumb/bg/1-1-1919x388.jpg')}}">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-12">
                    <div class="breadcrumb-item">
                        <h2 class="breadcrumb-heading">Wishlist Page</h2>
                        <ul>
                            <li>
                                <a href="{{route('home.index')}}">Home</a>
                            </li>
                            <li>Wishlist</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wishlist-area section-space-y-axis-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="javascript:void(0)">
                        <div class="table-content table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="product_remove">remove</th>
                                        <th class="product-thumbnail">images</th>
                                        <th class="cart-product-name">Product</th>
                                        <th class="product-price">Unit Price</th>
                                        <th class="product-stock-status">Stock Status</th>
                                        <th class="cart_btn">add to cart</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($productList))
                                    @foreach ( $productList as $p )
                                    <tr>
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
                                        <td class="product-stock-status"><span class="in-stock">in stock</span></td>
                                        <td class="cart_btn"><a href="javascript:void(0)" class="add_toCart" product_id="<?php echo $p->id ?>">add to cart</a></td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Main Content Area End Here -->

@endsection