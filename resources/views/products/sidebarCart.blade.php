<ul class="minicart-list">
    <?php if ($userCartItems->count() > 0) {
        $grandTotal = 0; ?>
        <?php foreach ($userCartItems as $u) {
            $grandTotal = $grandTotal + $u->netprice;
        ?>
            <li class="minicart-product">
                <a class="product-item_remove" href="#"><i class="pe-7s-close" data-tippy="Remove" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder"></i></a>
                <a href="#" class="product-item_img">
                    <img class="img-full" src="{{ URL::to('/') }}/public/products/<?php echo $u->product_image ?>" alt="Product Image">
                </a>
                <div class="product-item_content">
                    <a class="product-item_title" href="#"><?php echo $u->product_name ?></a>
                    <span class="product-item_quantity"><?php echo $u->product_quantity ?>x &#x20b9;<?php echo $u->product_price ?></span>
                </div>
            </li>
        <?php } ?>

</ul>

<div class="minicart-item_total">
    <span>Subtotal</span>
    <span class="ammount">&#x20b9;{{$grandTotal}}</span>
</div>
<div class="group-btn_wrap d-grid gap-2">
    <a href="{{ route('cart') }}" class="btn btn-dark">View Cart</a>
    <a href="{{route('checkOut')}}" class="btn btn-dark">Checkout</a>
</div>
<?php } ?>