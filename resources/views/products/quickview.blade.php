<div class="modal-header">
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-tippy="Close" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
    </button>
</div>
<div class="modal-body">
    <div class="modal-wrap row">
        <div class="col-lg-6">
            <div class="modal-img">
                <div class="swiper-container modal-slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <a href="#" class="single-img">
                                <img class="img-full" src="{{ URL::to('/') }}/public/products/<?php echo $product->product_image ?>" alt="Product Image">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="#" class="single-img">
                                <img class="img-full" src="{{ URL::to('/') }}/public/products/<?php echo $product->product_image ?>" alt="Product Image">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="#" class="single-img">
                                <img class="img-full" src="{{ URL::to('/') }}/public/products/<?php echo $product->product_image ?>" alt="Product Image">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="#" class="single-img">
                                <img class="img-full" src="{{ URL::to('/') }}/public/products/<?php echo $product->product_image ?>" alt="Product Image">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 pt-5 pt-lg-0">
            <div class="single-product-content">
                <h2 class="title"><?php echo $product->product_name ?></h2>
                <div class="price-box">
                    <span class="new-price">&#x20b9;<?php echo $product->product_price ?></span>
                </div>
                <div class="rating-box-wrap">
                    <div class="rating-box">
                        <ul>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul>
                    </div>
                    <div class="review-status">
                        <a href="#">( 1 Review )</a>
                    </div>
                </div>
                <div class="selector-wrap color-option">
                    <span class="selector-title border-bottom-0">Color</span>
                    <select class="nice-select wide border-bottom-0 rounded-0">
                        <option value="default"><?php echo $product->color ?></option>

                    </select>
                </div>
                <div class="selector-wrap size-option">
                    <span class="selector-title">Size</span>
                    <select class="nice-select wide rounded-0">
                        <option value="medium"><?php echo $product->size ?> <?php echo $product->shape ?></option>

                    </select>
                </div>
                <p class="short-desc"><?php echo $product->product_short_description ?></p>
                <ul class="quantity-with-btn">
                    <li class="quantity">
                        <div class="cart-plus-minus">
                            <input class="cart-plus-minus-box" value="1" type="text">
                        </div>
                    </li>
                    <li class="add-to-cart">
                        <a class="btn btn-custom-size lg-size btn-pronia-primary add_toCart" product_id="<?php echo $product->id ?>" href="javascript:void(0)">Add to
                            cart</a>
                    </li>
                    <li class="wishlist-btn-wrap">
                        <a class="custom-circle-btn add_toWishlist" product_id="<?php echo $product->id ?>" href="javascript:void(0)">
                            <i class="pe-7s-like"></i>
                        </a>
                    </li>
                    <li class="compare-btn-wrap">
                        <a class="custom-circle-btn" href="#">
                            <i class="pe-7s-refresh-2"></i>
                        </a>
                    </li>
                </ul>
                <ul class="service-item-wrap pb-0">
                    <li class="service-item">
                        <div class="service-img">
                            <img src="{{ asset('public/assets/images/shipping/icon/car.png')}}" alt="Shipping Icon">
                        </div>
                        <div class="service-content">
                            <span class="title">Free <br> Shipping</span>
                        </div>
                    </li>
                    <li class="service-item">
                        <div class="service-img">
                            <img src="{{ asset('public/assets/images/shipping/icon/card.png')}}" alt="Shipping Icon">
                        </div>
                        <div class="service-content">
                            <span class="title">Safe <br> Payment</span>
                        </div>
                    </li>
                    <li class="service-item">
                        <div class="service-img">
                            <img src="{{ asset('public/assets/images/shipping/icon/service.png')}}" alt="Shipping Icon">
                        </div>
                        <div class="service-content">
                            <span class="title">Safe <br> Payment</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<script>
    $(".add_toCart").on('click', function() {
        //alert('asdasd');
        var product_id = $(this).attr("product_id");
        $("#overlay").fadeIn(300);

        $.ajax({
            url: "{{route('addtoCart')}}",
            type: 'POST',
            data: {
                "product_id": product_id,
                "_token": "{{ csrf_token() }}",
            },
            success: function(json) {
                if (json.status == 'success') {
                    $("#userCartlist").html("")
                    alert("product add Successfully");
                    $("#userCartlist").html(json.html)

                } else {
                    alert("Oops! Kindly login before add to cart ");


                }
            }
        }).done(function() {
            setTimeout(function() {
                $("#overlay").fadeOut(300);



            }, 500);
        });
    });
</script>
<script>
    $(".add_toWishlist").on('click', function() {
        //alert('asdasd');
        var product_id = $(this).attr("product_id");
        $("#overlay").fadeIn(300);

        $.ajax({
            url: "{{route('addtoWishlist')}}",
            type: 'POST',
            data: {
                "product_id": product_id,
                "_token": "{{ csrf_token() }}",
            },
            success: function(json) {
                if (json.status == 'success') {
                    alert(json.msg);
                } else {
                    alert("Oops! Kindly login before add to Wish list ");
                }
            }
        }).done(function() {
            setTimeout(function() {
                $("#overlay").fadeOut(300);
            }, 500);
        });
    });
</script>
<script>
    $(".quickview").on('click', function() {
        //alert('asdasd');
        var product_id = $(this).attr("product_id");
        $("#overlay").fadeIn(300);

        $.ajax({
            url: "{{route('showQuickview')}}",
            type: 'POST',
            data: {
                "product_id": product_id,
                "_token": "{{ csrf_token() }}",
            },
            success: function(json) {
                if (json.status == 'success') {
                    //alert(json.msg);
                    $("#QuckviewShow").html(json.html);
                } else {
                    alert("Oops! Kindly login before add to Wish list ");
                }
            }
        }).done(function() {
            setTimeout(function() {
                $("#overlay").fadeOut(300);
            }, 500);
        });
    });
</script>