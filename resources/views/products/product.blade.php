<div class="product-img">
    <a href="#">
        <img class="primary-img" src="{{ URL::to('/') }}/public/products/<?php echo $p->product_image ?>" alt="Product Images">
        <img class="secondary-img" src="{{ asset('public/assets/images/product/medium-size/1-10-270x300.jpg')}}" alt="Product Images">
    </a>
    <div class="product-add-action">
        <ul>
            <li>
                <a href="javascript:void(0)" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder" class="add_toWishlist" product_id="<?php echo $p->id ?>">
                    <i class="pe-7s-like"></i>
                </a>
            </li>
            <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder" class="quickview" product_id="<?php echo $p->id ?>">
                    <i class="pe-7s-look"></i>
                </a>
            </li>
            <li>
                <a href="javascript:void(0)" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder" class="add_toCart" product_id="<?php echo $p->id ?>">
                    <i class="pe-7s-cart"></i>
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="product-content">
    <a class="product-name" href="#"><?php echo $p->product_name ?></a>
    <div class="price-box pb-1">
        <span class="new-price">&#x20b9;<?php echo $p->product_price ?></span>
    </div>
    <div class="rating-box">
        <ul>
            <li><i class="fa fa-star"></i></li>
            <li><i class="fa fa-star"></i></li>
            <li><i class="fa fa-star"></i></li>
            <li><i class="fa fa-star"></i></li>
            <li><i class="fa fa-star"></i></li>
        </ul>
    </div>
</div>