<table class="table" id="usertotal">
    <thead>
        <tr>
            <th class="cart-product-name">Product</th>
            <th class="cart-product-total">Total</th>
            <th class="cart-product-total">Product Weight</th>
            <th class="cart-product-total">Product per kg price</th>
        </tr>
    </thead>
    <tbody>
        <?php $grandTotal = 0;
        $grandTotalweightnet = 0;
        $grandTotalweight = 0; ?>
        @foreach ( $cart_list as $p )
        <?php $grandTotal = $grandTotal + $p->netprice;
        $grandTotalweightnet = ($perkg->perkg_cost * $p->product_weight) * $p->product_quantity;
        ?>
        <tr class="cart_item">
            <td class="cart-product-name"> <?php echo $p->product_name ?><strong class="product-quantity">
                    × <?php echo $p->product_quantity ?></strong></td>
            <td class="cart-product-total"><span class="amount">&#x20b9;<?php echo $p->product_price ?></span></td>
            <td class="cart-product-total"><span class="amount"><?php echo $p->product_weight ?> KG</span></td>
            <td class="cart-product-total"><span class="amount">&#x20b9;<?php echo $perkg->perkg_cost ?> </span></td>
        </tr>
        <?php $grandTotalweight = $grandTotalweight + $grandTotalweightnet; ?>
        @endforeach
    </tbody>
    <tfoot>

        <tr class="cart-subtotal">
            <th>Cart Subtotal</th>
            <td><span class="amount"></span></td>
            <td><span class="amount"></span></td>
            <td><span class="amount">&#x20b9;{{$grandTotal}}</span></td>
        </tr>
        <tr class="cart-subtotal">
            <th>Packaging charges</th>
            <td><span class="amount"></span></td>
            <td><span class="amount"></span></td>
            <td><span class="amount">&#x20b9;{{$grandTotalweight}}</span></td>
        </tr>
        <tr class="order-total">
            <th>Order Total</th>
            <td><span class="amount"></span></td>
            <td><span class="amount"></span></td>

            <td><strong><span class="amount">&#x20b9;{{$grandTotal+$grandTotalweight}}</span></strong></td>
        </tr>
    </tfoot>
</table>