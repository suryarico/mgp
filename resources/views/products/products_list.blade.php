@extends('frount.index')

@section('content')
<!-- Begin Main Content Area -->
<main class="main-content">
    <div class="breadcrumb-area breadcrumb-height" data-bg-image="{{ asset('public/assets/images/breadcrumb/bg/1-1-1919x388.jpg')}}">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-12">
                    <div class="breadcrumb-item">
                        <h2 class="breadcrumb-heading">Shop</h2>
                        <ul>
                            <li>
                                <a href="index.html">Home</a>
                            </li>
                            <li>Shop Default</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="shop-area section-space-y-axis-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 order-2 order-lg-1 pt-5 pt-lg-0">
                    @include('products.sidebar')
                </div>
                <div class="col-xl-9 col-lg-8 order-1 order-lg-2">
                    <div class="product-topbar">
                        <ul>
                            <li class="page-count">
                                <span>12</span> Product Found of <span>30</span>
                            </li>
                            <li class="product-view-wrap">
                                <ul class="nav" role="tablist">
                                    <li class="grid-view" role="presentation">
                                        <a class="active" id="grid-view-tab" data-bs-toggle="tab" href="#grid-view" role="tab" aria-selected="true">
                                            <i class="fa fa-th"></i>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="short">
                                <select class="nice-select">
                                    <option value="1">Sort by Default</option>
                                    <option value="2">Sort by Popularity</option>
                                    <option value="3">Sort by Rated</option>
                                    <option value="4">Sort by Latest</option>
                                    <option value="5">Sort by High Price</option>
                                    <option value="6">Sort by Low Price</option>
                                </select>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="grid-view" role="tabpanel" aria-labelledby="grid-view-tab">
                            <div class="product-grid-view row g-y-20">
                                @if(!empty($products))
                                @foreach ( $products as $p )
                                <div class="col-md-4 col-sm-6">
                                    <div class="product-item">
                                        @include('products.product')
                                    </div>
                                </div>

                                @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane fade" id="list-view" role="tabpanel" aria-labelledby="list-view-tab">
                            <div class="product-list-view row g-y-30">
                                @if(!empty($products))
                                @foreach ( $products as $p )
                                <div class="col-12">
                                    <div class="product-item">
                                        @include('products.product')
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="pagination-area">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                {{ $products->links() }}

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Main Content Area End Here -->

@endsection