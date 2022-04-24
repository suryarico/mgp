<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MyGreenPlants - Home</title>
  <meta name="robots" content="index, follow" />
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/assets/images/favicon.png')}}" />

  <!-- CSS
    ============================================ -->

  <!-- Minify Version -->
  <link rel="stylesheet" href="{{ asset('public/assets/css/plugins.min.css')}}">
  <link rel=" stylesheet" href="{{ asset('public/assets/css/style.min.css')}}">
  <link rel="stylesheet" href="{{ asset('public/assets/css/custom-style.css')}}">

  <style>
    #overlay {
      position: fixed;
      top: 0;
      z-index: 100;
      width: 100%;
      height: 100%;
      display: none;
      background: rgba(0, 0, 0, 0.6);
    }

    .cv-spinner1 {
      height: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .spinner1 {
      width: 40px;
      height: 40px;
      border: 4px #89e6a7 solid;
      border-top: 4px #208f44 solid;
      border-radius: 50%;
      animation: sp-anime 0.8s infinite linear;
    }

    @keyframes sp-anime {
      100% {
        transform: rotate(360deg);
      }
    }

    .is-hide {
      display: none;
    }
  </style>
</head>

<body>
  <div class="preloader-activate preloader-active open_tm_preloader" id="loader">
    <div class="preloader-area-wrap">
      <div class="spinner d-flex justify-content-center align-items-center h-100">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
      </div>
    </div>
  </div>
  <div class="main-wrapper">

    <!-- Begin Main Header Area -->
    <header class="main-header-area">
      <!--   <div class="header-top bg-pronia-primary d-none d-lg-block">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="header-top-left text-center">
                                <span class="pronia-offer">HELLO EVERYONE! 25% Off All Products</span>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div> -->
      <div class="header-middle py-3">
        <div class="container">
          <div class="header-nav position-relative">
            <div class="row align-items-center">
              <div class="col-lg-3 col-6">

                <a href="{{route('home.index')}}" class="header-logo">
                  <img src="{{ asset('public/assets/images/logo/dark.png')}}" alt="Header Logo">
                </a>

              </div>
              <div class="col-lg-6 d-none d-lg-block">
                <div class="main-menu">
                  <nav class="main-nav">
                    <ul>
                      <li class="drop-holder">
                        <a href="{{route('home.index')}}">Home</a>
                      </li>
                      <?php $categories_masters = App\Models\CategoryMaster::get();
                      $subcategories = App\Models\SubcategoryMaster::get(); ?>
                      <?php foreach ($categories_masters as $c) { ?>
                        <li class="drop-holder">

                          <a href="{{ url('category',$c->slug)}}">{{$c->category_name}}</a>
                          <ul class="drop-menu">
                            <?php foreach ($subcategories as $sub) {
                              if ($sub->category_id == $c->id) { ?>
                                <li>
                                  <a href="{{ url('sub-category',$sub->slug)}}">{{$sub->sub_category_name}}</a>
                                </li>
                            <?php }
                            } ?>
                          </ul>
                        </li>
                      <?php } ?>


                      <li>
                        <a href="#">About Us</a>
                      </li>
                      <li>
                        <a href="#">Blogs</a>
                      </li>
                      <li>
                        <a href="#">Contact Us</a>
                      </li>
                    </ul>
                  </nav>
                </div>
              </div>
              <div class="col-lg-3 col-6">
                <div class="header-right">
                  <ul>
                    <li>
                      <a href="#exampleModal" class="search-btn bt" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="pe-7s-search"></i>
                      </a>
                    </li>
                    <li class="dropdown d-none d-lg-block">
                      <button class="btn btn-link dropdown-toggle ht-btn p-0" type="button" id="stickysettingButton" data-bs-toggle="dropdown" aria-label="setting" aria-expanded="false">
                        <i class="pe-7s-users"></i>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="stickysettingButton">
                        <li><a class="dropdown-item" href="{{ route('user') }}">My account</a></li>
                        @if (Auth::user())
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                        @else
                        <li><a class="dropdown-item" href="{{ route('login') }}">Login | Register</a></li>
                        @endif

                      </ul>
                    </li>
                    <li class="d-none d-lg-block">
                      <a href="{{ route('wishlist') }}">
                        <i class="pe-7s-like"></i>
                      </a>
                    </li>
                    <li class="minicart-wrap me-3 me-lg-0">
                      <a href="#miniCart" class="minicart-btn toolbar-btn">
                        <i class="pe-7s-shopbag"></i>
                        <?php $userCartItems = App\Models\Cart::where('user_id', Auth::id())->get(); ?>
                        <span class="quantity">{{$userCartItems->count()}}</span>
                      </a>
                    </li>
                    <li class="mobile-menu_wrap d-block d-lg-none">
                      <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn pl-0">
                        <i class="pe-7s-menu"></i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="mobile-menu_wrapper" id="mobileMenu">
        <div class="offcanvas-body">
          <div class="inner-body">
            <div class="offcanvas-top">
              <a href="#" class="button-close"><i class="pe-7s-close"></i></a>
            </div>
            <div class="header-contact offcanvas-contact">
              <i class="pe-7s-call"></i>
              <a href="#">+00 123 456 789</a>
            </div>
            <div class="offcanvas-user-info">
              <ul class="dropdown-wrap">


              </ul>
            </div>
            <div class="offcanvas-menu_area">
              <nav class="offcanvas-navigation">
                <ul class="mobile-menu">
                  <li class="menu-item-has-children">
                    <a href="#">
                      <span class="mm-text">Home
                      </span>
                    </a>
                  </li>
                  <?php foreach ($categories_masters as $c) { ?>
                    <li class="menu-item-has-children">

                      <a href="#">
                        <span class="mm-text">{{$c->category_name}} <i class="pe-7s-angle-down"></i> </span></a>
                      <ul class="sub-menu">
                        <?php foreach ($subcategories as $sub) {
                          if ($sub->category_id == $c->id) { ?>
                            <li>
                              <a href="{{ url('sub-category',$sub->slug)}}"> <span class="mm-text">{{$sub->sub_category_name}}</span></a>
                            </li>
                        <?php }
                        } ?>
                      </ul>
                    </li>
                  <?php } ?>


                  <li>
                    <a href="#">
                      <span class="mm-text">About Us</span>
                    </a>
                  </li>

                  <li>
                    <a href="#">
                      <span class="mm-text">Contact</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModal" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
          <div class="modal-content modal-bg-dark">
            <div class="modal-header">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-tippy="Close" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
              </button>
            </div>
            <div class="modal-body">
              <div class="modal-search">
                <span class="searchbox-info">Start typing and press Enter to search or ESC to close</span>
                <form action="#" class="hm-searchbox">
                  <input type="text" name="Search..." value="Search..." onblur="if(this.value==''){this.value='Search...'}" onfocus="if(this.value=='Search...'){this.value=''}" autocomplete="off">
                  <button class="search-btn" type="submit" aria-label="searchbtn">
                    <i class="pe-7s-search"></i>
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="offcanvas-minicart_wrapper" id="miniCart">
        <div class="offcanvas-body">
          <div class="minicart-content">
            <div class="minicart-heading">
              <h4 class="mb-0">Shopping Cart</h4>
              <a href="#" class="button-close"><i class="pe-7s-close" data-tippy="Close" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder"></i></a>
            </div>
            <div id="userCartlist">
              <?php
              $userCartItems = App\Models\Cart::where('user_id', Auth::id())
                ->leftJoin('products',  'products.id', '=', 'carts.product_id')->get(); ?>
              <?php if ($userCartItems->count() > 0) { ?>
                @include('products.sidebarCart')
              <?php } else {
                echo "No Items in cart";
              } ?>
            </div>
          </div>
        </div>
        <div class="global-overlay"></div>
    </header>
    <!-- Main Header Area End Here -->