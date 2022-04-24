 <!-- Begin Footer Area -->
 <div class="footer-area" data-bg-image="{{ asset('public/assets/images/footer/bg/1-1920x465.jpg')}}">
   <div class="footer-top section-space-top-100 pb-60">
     <div class="container">
       <div class="row">
         <div class="col-lg-3">
           <div class="footer-widget-item">
             <div class="footer-widget-logo">
               <a href="index.html">
                 <img src="{{ asset('public/assets/images/logo/dark.png')}}" alt="Logo">
               </a>
             </div>
             <p class="footer-widget-desc">Lorem ipsum dolor sit amet, consec adipisl elit, sed do eiusmod
               tempor
               <br>
               incidio ut labore et dolore magna.
             </p>
             <div class="social-link with-border">
               <ul>
                 <li>
                   <a href="#" data-tippy="Facebook" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                     <i class="fa fa-facebook"></i>
                   </a>
                 </li>
                 <li>
                   <a href="#" data-tippy="Twitter" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                     <i class="fa fa-twitter"></i>
                   </a>
                 </li>
                 <li>
                   <a href="#" data-tippy="linkedin" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                     <i class="fa fa-linkedin"></i>
                   </a>
                 </li>
                 <li>
                   <a href="#" data-tippy="instagram" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                     <i class="fa fa-instagram"></i>
                   </a>
                 </li>
               </ul>
             </div>
           </div>
         </div>
         <div class="col-lg-2 col-md-4 pt-40">
           <div class="footer-widget-item">
             <h3 class="footer-widget-title">Useful Links</h3>
             <ul class="footer-widget-list-item">
               <li>
                 <a href="#">About Us</a>
               </li>
               <li>
                 <a href="#">Home</a>
               </li>
               <li>
                 <a href="#">Blogs</a>
               </li>
               <li>
                 <a href="#">Contact us</a>
               </li>
               <li>
                 <a href="#">Log in</a>
               </li>
             </ul>
           </div>
         </div>
         <div class="col-lg-2 col-md-4 pt-40">
           <div class="footer-widget-item">
             <h3 class="footer-widget-title">Quick Links</h3>
             <ul class="footer-widget-list-item">
               <li>
                 <a href="#">My Account</a>
               </li>
               <li>
                 <a href="#">FAQ</a>
               </li>
               <li>
                 <a href="#">My Wishlist</a>
               </li>
               <li>
                 <a href="#">Disclaimer</a>
               </li>
               <li>
                 <a href="#">Terms Policy</a>
               </li>
             </ul>
           </div>
         </div>
         <div class="col-lg-2 col-md-4 pt-40">
           <div class="footer-widget-item">
             <h3 class="footer-widget-title">Our Products</h3>
             <ul class="footer-widget-list-item">
               <li>
                 <a href="#">Indoor</a>
               </li>
               <li>
                 <a href="#">Outdoor</a>
               </li>
               <li>
                 <a href="#">Ceramic</a>
               </li>
               <li>
                 <a href="#">Fiber Ceramic</a>
               </li>
               <li>
                 <a href="#">Shop</a>
               </li>
             </ul>
           </div>
         </div>
         <div class="col-lg-3 pt-40">
           <div class="footer-contact-info">
             <h3 class="footer-widget-title">Got Question? Call Us</h3>
             <a class="number" href="tel://123-456-789">123 456 789</a>
             <div class="address">
               <ul>
                 <li>
                   Your Address Goes Here
                 </li>
               </ul>
             </div>
           </div>
           <div class="payment-method">
             <a href="#">
               <img src="{{ asset('public/assets/images/payment/1.png')}}" alt="Payment Method">
             </a>
           </div>
         </div>
       </div>
     </div>
   </div>
   <div class="footer-bottom">
     <div class="container">
       <div class="row">
         <div class="col-lg-12">
           <div class="copyright">
             <span class="copyright-text">© 2021 MyGreenPlants, All rights reserved.</span>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
 <!-- Footer Area End Here -->

 <!-- Begin Modal Area -->
 <div class="modal quick-view-modal fade" id="quickModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="quickModal" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered">
     <div class="modal-content">
       <div id="QuckviewShow"></div>
     </div>
   </div>
 </div>
 <!-- Modal Area End Here -->

 <!-- Begin Scroll To Top -->
 <a class="scroll-to-top" href="#">
   <i class="fa fa-angle-double-up"></i>
 </a>
 <!-- Scroll To Top End Here -->

 </div>

 <!-- Global Vendor, plugins JS -->

 <!-- JS Files
    ============================================ -->

 <!-- Minify Version -->
 <script src="{{ asset('public/assets/js/plugins.min.js')}}"></script>
 <div id="overlay" style="display:none">
   <div class="cv-spinner1">
     <span class="spinner1"></span>
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
 <script>
   $("#state_id").on('change', function() {
     //alert('asdasd');
     var state_id = $(this).val();
     //alert(state_id);
     $("#overlay").fadeIn(300);

     $.ajax({
       url: "{{route('getStatecharge')}}",
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
 <script>
   function getCheckoutItems(userid, stateType) {
     $.ajax({
       url: "{{route('getCheckoutItems')}}",
       type: 'POST',
       data: {
         "userid": userid,
         "stateType": stateType,
         "_token": "{{ csrf_token() }}",
       },
       success: function(json) {
         if (json.status == 'success') {
           //alert(json.msg);
           $("#checkoutDetails").html(json.html);
         } else {
           alert("Oops! Kindly login before add to Wish list ");
         }
       }
     });
   };
   $(".stateChange").on('change', function() {
     $("#overlay").fadeIn(300);
     var state_id = $(this).attr('state_id');
     getCheckoutItems("{{Auth::id()}}", state_id);
     setTimeout(function() {
       $("#overlay").fadeOut(300);
     }, 500);

   });

   $(document).ready(function() {

     getCheckoutItems("{{Auth::id()}}", 0);

   });
   $('#placeorder').click(function() {
     var checkstr = confirm('are you sure you want to delete this?');
     if (checkstr == true) {
       $.ajax({
         url: "{{route('placeOrder')}}",
         type: 'GET',
         success: function(json) {
           if (json.status == 'success') {
             alert(json.msg);

           } else {
             alert("Oops! Kindly login before add to Wish list ");
           }
         }
       });
     } else {
       return false;
     }
   });
 </script>

 </body>

 </html>