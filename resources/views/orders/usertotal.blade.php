<table class="table" id="usertotal">
    <thead>
        <tr>
            <th class="cart-product-name">Product</th>
            <th class="cart-product-total">Total</th>
        </tr>
    </thead>
    <tbody>
        <?php $grandTotal = 0; ?>
        @foreach ( $cart_list as $p )
        <?php $grandTotal = $grandTotal + $p->netprice; ?>
        <tr class="cart_item">
            <td class="cart-product-name"> <?php echo $p->product_name ?><strong class="product-quantity">
                    × <?php echo $p->product_quantity ?></strong></td>
            <td class="cart-product-total"><span class="amount">&#x20b9;<?php echo $p->product_price ?></span></td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr class="cart-subtotal">
            <th>Cart Subtotal</th>
            <td><span class="amount">&#x20b9;{{$grandTotal}}</span></td>
        </tr>
        <tr class="order-total">
            <th>Order Total</th>
            <td><strong><span class="amount">&#x20b9;{{$grandTotal}}</span></strong></td>
        </tr>
    </tfoot>
</table>