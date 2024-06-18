       <!-- Start Footer Area -->
       <footer id="htc__footer">
           <!-- Start Footer Widget -->
           <div class="footer__container bg__cat--1">
               <div class="container">
                   <div class="row">
                       <!-- Start Single Footer Widget -->
                       <div class="col-md-3 col-sm-6 col-xs-12">
                           <div class="footer">
                               <h2 class="title__line--2">ABOUT US</h2>
                               <div class="ft__details">
                                   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim</p>
                                   <div class="ft__social__link">
                                       <ul class="social__link">
                                           <li><a href="#"><i class="icon-social-twitter icons"></i></a></li>

                                           <li><a href="#"><i class="icon-social-instagram icons"></i></a></li>

                                           <li><a href="#"><i class="icon-social-facebook icons"></i></a></li>

                                           <li><a href="#"><i class="icon-social-google icons"></i></a></li>

                                           <li><a href="#"><i class="icon-social-linkedin icons"></i></a></li>
                                       </ul>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <!-- End Single Footer Widget -->
                       <!-- Start Single Footer Widget -->
                       <div class="col-md-2 col-sm-6 col-xs-12 xmt-40">
                           <div class="footer">
                               <h2 class="title__line--2">information</h2>
                               <div class="ft__inner">
                                   <ul class="ft__list">
                                       <li><a href="#">About us</a></li>
                                       <li><a href="#">Delivery Information</a></li>
                                       <li><a href="#">Privacy & Policy</a></li>
                                       <li><a href="#">Terms & Condition</a></li>
                                       <li><a href="#">Manufactures</a></li>
                                   </ul>
                               </div>
                           </div>
                       </div>
                       <!-- End Single Footer Widget -->
                       <!-- Start Single Footer Widget -->
                       <div class="col-md-2 col-sm-6 col-xs-12 xmt-40 smt-40">
                           <div class="footer">
                               <h2 class="title__line--2">my account</h2>
                               <div class="ft__inner">
                                   <ul class="ft__list">
                                       <li><a href="#">My Account</a></li>
                                       <li><a href="cart.php">My Cart</a></li>
                                       <li><a href="#">Login</a></li>
                                       <li><a href="wishlist.php">Wishlist</a></li>
                                       <li><a href="checkout.php">Checkout</a></li>
                                   </ul>
                               </div>
                           </div>
                       </div>
                       <!-- End Single Footer Widget -->
                       <!-- Start Single Footer Widget -->
                       <div class="col-md-2 col-sm-6 col-xs-12 xmt-40 smt-40">
                           <div class="footer">
                               <h2 class="title__line--2">Our service</h2>
                               <div class="ft__inner">
                                   <ul class="ft__list">
                                       <li><a href="#">My Account</a></li>
                                       <li><a href="cart.php">My Cart</a></li>
                                       <li><a href="#">Login</a></li>
                                       <li><a href="wishlist.php">Wishlist</a></li>
                                       <li><a href="checkout.php">Checkout</a></li>
                                   </ul>
                               </div>
                           </div>
                       </div>
                       <!-- End Single Footer Widget -->
                       <!-- Start Single Footer Widget -->
                       <div class="col-md-3 col-sm-6 col-xs-12 xmt-40 smt-40">
                           <div class="footer">
                               <h2 class="title__line--2">NEWSLETTER </h2>
                               <div class="ft__inner">
                                   <div class="news__input">
                                       <input type="text" placeholder="Your Mail*">
                                       <div class="send__btn">
                                           <a class="fr__btn" href="#">Send Mail</a>
                                       </div>
                                   </div>

                               </div>
                           </div>
                       </div>
                       <!-- End Single Footer Widget -->
                   </div>
               </div>
           </div>
           <!-- End Footer Widget -->
           <!-- Start Copyright Area -->
           <div class="htc__copyright bg__cat--5">
               <div class="container">
                   <div class="row">
                       <div class="col-xs-12">
                           <div class="copyright__inner">
                               <p>Copyright© <a href="https://freethemescloud.com/">Free themes Cloud</a> 2018. All right reserved.</p>
                               <a href="#"><img src="images/others/shape/paypol.png" alt="payment images"></a>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <!-- End Copyright Area -->
       </footer>
       <!-- End Footer Style -->
       </div>
       <!-- Body main wrapper end -->

       <!-- Placed js at the end of the document so the pages load faster -->

       <!-- jquery latest version -->
       <script src="js/vendor/jquery-3.2.1.min.js"></script>
       <!-- Bootstrap framework js -->
       <script src="js/bootstrap.min.js"></script>
       <!-- All js plugins included in this file. -->
       <script src="js/plugins.js"></script>
       <script src="js/slick.min.js"></script>
       <script src="js/owl.carousel.min.js"></script>
       <script src="js/ajax-mail.js"></script>

       <!-- Google Map js -->
       <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBmGmeot5jcjdaJTvfCmQPfzeoG_pABeWo "></script>
       <script src="js/contact-map.js"></script>
       <script>
           // When the window has finished loading create our google map below
           google.maps.event.addDomListener(window, 'load', init);

           function init() {
               // Basic options for a simple Google Map
               // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
               var mapOptions = {
                   // How zoomed in you want the map to start at (always required)
                   zoom: 12,

                   scrollwheel: false,

                   // The latitude and longitude to center the map (always required)
                   center: new google.maps.LatLng(23.7286, 90.3854), // New York

                   // How you would like to style the map. 
                   // This is where you would paste any style found on Snazzy Maps.
                   styles: [{
                           "featureType": "all",
                           "elementType": "labels.text.fill",
                           "stylers": [{
                                   "saturation": 36
                               },
                               {
                                   "color": "#000000"
                               },
                               {
                                   "lightness": 40
                               }
                           ]
                       },
                       {
                           "featureType": "all",
                           "elementType": "labels.text.stroke",
                           "stylers": [{
                                   "visibility": "on"
                               },
                               {
                                   "color": "#000000"
                               },
                               {
                                   "lightness": 16
                               }
                           ]
                       },
                       {
                           "featureType": "all",
                           "elementType": "labels.icon",
                           "stylers": [{
                               "visibility": "off"
                           }]
                       },
                       {
                           "featureType": "administrative",
                           "elementType": "geometry.fill",
                           "stylers": [{
                                   "color": "#000000"
                               },
                               {
                                   "lightness": 20
                               }
                           ]
                       },
                       {
                           "featureType": "administrative",
                           "elementType": "geometry.stroke",
                           "stylers": [{
                                   "color": "#000000"
                               },
                               {
                                   "lightness": 17
                               },
                               {
                                   "weight": 1.2
                               }
                           ]
                       },
                       {
                           "featureType": "landscape",
                           "elementType": "geometry",
                           "stylers": [{
                                   "color": "#000000"
                               },
                               {
                                   "lightness": 20
                               }
                           ]
                       },
                       {
                           "featureType": "poi",
                           "elementType": "geometry",
                           "stylers": [{
                                   "color": "#000000"
                               },
                               {
                                   "lightness": 21
                               }
                           ]
                       },
                       {
                           "featureType": "road.highway",
                           "elementType": "geometry.fill",
                           "stylers": [{
                                   "color": "#000000"
                               },
                               {
                                   "lightness": 17
                               }
                           ]
                       },
                       {
                           "featureType": "road.highway",
                           "elementType": "geometry.stroke",
                           "stylers": [{
                                   "color": "#000000"
                               },
                               {
                                   "lightness": 29
                               },
                               {
                                   "weight": 0.2
                               }
                           ]
                       },
                       {
                           "featureType": "road.arterial",
                           "elementType": "geometry",
                           "stylers": [{
                                   "color": "#000000"
                               },
                               {
                                   "lightness": 18
                               }
                           ]
                       },
                       {
                           "featureType": "road.local",
                           "elementType": "geometry",
                           "stylers": [{
                                   "color": "#000000"
                               },
                               {
                                   "lightness": 16
                               }
                           ]
                       },
                       {
                           "featureType": "transit",
                           "elementType": "geometry",
                           "stylers": [{
                                   "color": "#000000"
                               },
                               {
                                   "lightness": 19
                               }
                           ]
                       },
                       {
                           "featureType": "water",
                           "elementType": "geometry",
                           "stylers": [{
                                   "color": "#141516"
                               },
                               {
                                   "lightness": 17
                               }
                           ]
                       }
                   ]
               };

               // Get the HTML DOM element that will contain your map 
               // We are using a div with id="map" seen below in the <body>
               var mapElement = document.getElementById('googleMap');

               // Create the Google Map using our element and options defined above
               var map = new google.maps.Map(mapElement, mapOptions);

               // Let's also add a marker while we're at it
               var marker = new google.maps.Marker({
                   position: new google.maps.LatLng(23.7286, 90.3854),
                   map: map,
                   title: 'Ramble!',
                   icon: 'images/icons/map-2.png',
                   animation: google.maps.Animation.BOUNCE

               });
           }
           //    send messege script
           function send_message() {
               var name = jQuery("#name").val();
               var email = jQuery("#email").val();
               var mobail = jQuery("#mobail").val();
               var message = jQuery("#message").val();

               if (name == "") {
                   alert('Please enter name');
               } else if (email == "") {
                   alert('Please enter email');
               } else if (mobail == "") {
                   alert('Please enter mobail');
               } else if (message == "") {
                   alert('Please enter message');
               } else {
                   jQuery.ajax({
                       url: 'send_message.php',
                       type: 'post',
                       data: 'name=' + name + '&email=' + email + '&mobail=' + mobail + '&message=' + message,
                       success: function(result) {
                           alert(result);
                       }
                   })
               }
           }
       </script>



       <!-- Waypoints.min.js. -->
       <script src="js/waypoints.min.js"></script>
       <!-- Main js file that contents all jQuery plugins activation. -->
       <script src="js/main.js"></script>


       </body>

       </html>