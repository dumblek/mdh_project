<?php 
use Illuminate\Support\Facades\DB;
use App\Models\Nav_model;
$site_config = DB::table('konfigurasi')->first();
// Nav profil
$myprofil    = new Nav_model();
$nav_profilf  = $myprofil->nav_profil();
$nav_layananf = $myprofil->nav_layanan();
?>
<!--Footer Start-->
<footer class="h3footer wf100">
   <div class="container">
      <div class="row">
         <!--Footer Widget Start-->
         <div class="col-md-12 col-sm-6">
            <div class="footer-widget">
               <h3>{{ $site_config->namaweb }}</h3>
               <p>{{ $site_config->deskripsi }}</p>
               <hr style="border-top: solid thin #EEE;padding:0; margin: 5px 0;">
               <p><strong>Our Address:</strong>
                  <?php echo nl2br($site_config->alamat) ?>
                  <br><strong>Phone:</strong> {{ $site_config->telepon }}
                  <br><strong>Fax:</strong> {{ $site_config->fax }}
                  <br><strong>Email:</strong> {{ $site_config->email }}
                  <br><strong>Website:</strong> {{ $site_config->website }}</p>
            </div>
         </div>
         <!--Footer Widget End--> 
         <!--Footer Widget Start-->
         <!-- <div class="col-md-5 col-sm-6">
            <div class="footer-widget">
               <h3>Program dan Kegiatan</h3>
               <ul class="lastest-products">
                  <?php foreach($nav_layananf as $nav_layananf) { ?>
                  <li><strong><a href="{{ asset('berita/layanan/'.$nav_layananf->slug_berita) }}">{{ $nav_layananf->judul_berita }}</a></strong> <span class="pdate"><i>Updated:</i> <?php echo tanggal('tanggal_id',$nav_layananf->tanggal_post) ?></span> </li>
                  <?php } ?>
               </ul>
            </div>
         </div> -->
         <!--Footer Widget End--> 
         <!--Footer Widget Start-->
         <!-- <div class="col-md-3 col-sm-12">
            <div class="footer-widget">
               <h3>Tetap Update</h3>
               <div class="newsletter">
                  <ul>
                     <li>
                        <input type="text" placeholder="Your Name">
                     </li>
                     <li>
                        <input type="text" placeholder="Your Email">
                     </li>
                     <li>
                        <input type="submit" value="Subscribe Now">
                     </li>
                  </ul>
               </div>
               <div class="footer-social">
                  <a href="#"><i class="fab fa-facebook-f"></i></a> 
                  <a href="#"><i class="fab fa-twitter"></i></a> 
                  <a href="#"><i class="fab fa-linkedin-in"></i></a> 
                  <a href="#"><i class="fab fa-instagram"></i></a> 
                  <a href="#"><i class="fab fa-youtube"></i></a> </div>
            </div>
         </div> -->
         <!--Footer Widget End--> 
      </div>
      <div class="row footer-copyr">
         <div class="col-md-4 col-sm-4"> <img src="{{ asset('assets/upload/image/logo_putih.png') }}" alt="" style="max-height: 50px; width: auto;"> </div>
         <div class="col-md-8 col-sm-8">
            <p>Copyright ©2021 All rights reserved | Developed and maintained by <a target="_blank" href="https://darulhusna.com" style="color:#66bb6a; :hover { color: red; }">Divisi IT Masjid Darul Husna</a></p>
         </div>
      </div>
   </div>
</footer>
<!--Footer End--> 
</div>
<!--   JS Files Start  --> 
<script src="{{ asset('assets/aws/js/jquery-3.3.1.min.js') }}"></script> 
<script src="{{ asset('assets/aws/js/jquery-migrate-1.4.1.min.js') }}"></script> 
<script src="{{ asset('assets/aws/js/popper.min.js') }}"></script> 
<script src="{{ asset('assets/aws/js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('assets/aws/js/owl.carousel.min.js') }}"></script> 
<script src="{{ asset('assets/aws/js/jquery.prettyPhoto.js') }}"></script> 
<script src="{{ asset('assets/aws/js/isotope.min.js') }}"></script> 
<script src="{{ asset('assets/aws/js/slick.min.js') }}"></script> 
<script src="{{ asset('assets/aws/js/custom.js') }}"></script>
<script src="https://lazismu.bmtumy.com/wp-content/plugins/donasiaja/assets/js/jquery.min.js"></script>
<script src="https://lazismu.bmtumy.com/wp-content/plugins/donasiaja/assets/js/donasiaja.min.js"></script>
<script src="https://lazismu.bmtumy.com/wp-content/plugins/donasiaja/assets/js/js.cookie.js"></script>
<script>
		$(document).ready(function() {
            
            nominal = 0;

			if(Cookies.get('nominal')!=undefined){

				nominal = Cookies.get('nominal');
				$('input:radio[name="nominal_donasi"][value="'+nominal+'"]').attr('checked', 'checked');

				if ($("#other_nominal_radio").hasClass("other_nominal") && nominal==0) {
					$('.other_nominal_value').removeClass('hide_input');
					$('.other_nominal_value input').caretTo(0);
					$('#nominal_value').text('');
				}else{
					if(nominal<1000000){
						var check_dlast3 = nominal.substr(nominal.length - 3);
						if(check_dlast3=='000'){
							nominalnya = nominal+'_';
							content = nominalnya.split('000_').join('rb');
							$('#nominal_value').text(content);
						}else{
							content = nominal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
							$('#nominal_value').text(content);
						}
					}else{
						content = nominal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
						$('#nominal_value').text(content);
					}
					
				}
			}

			if(Cookies.get('nominal')!=''){
				try {
					var nominal_donasi = Cookies.get('nominal').toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
					$('.other_nominal_value input').val(nominal_donasi);
				}catch(err) {
				}
			}

            
			var min_donasi = 10000
			function randomInRange(from, to) {
			  var r = Math.random();
			  return Math.floor(r * (to - from) + from);
			}

			var unique_number = randomInRange(1,999);
			var title_campaign = 'Infak Peduli Gempa Turki';

            $(".donation_button_now2").on("click", function(e) {
                var nominalnya = parseInt(Cookies.get('nominal'));
                if(nominalnya>=min_donasi){
                	var campaign_id = $('#campaign_id').val();
	                var name = $('#name').val();
	                var whatsapp = $('#whatsapp').val();
	                var email = $('#email').val();
	                var anonim = $('#anonim').prop('checked');
	                if(anonim==true){anonim = 1;}else{anonim = 0;}
	                var comment = $('#comment').val();
	                var payment_method = $('.img_payment_selected').attr('data-paymentmethod');
	                var payment_code = $('.img_payment_selected').attr('data-paymentcode');
	                var payment_number = $('.img_payment_selected').attr('data-paymentnumber');
	                var payment_account = $('.img_payment_selected').attr('data-paymentaccount');
                    var a_id = 0;

	                if(name==''){
						$('.donasiaja-input.fullname input').addClass('set_red');
					}
					if(whatsapp==''){
						$('.donasiaja-input.whatsapp input').addClass('set_red');
					}

					if(name==''){
                        var message = "Maaf, Silahkan lengkapi Nama anda!";
                        var status = "warning";
                        var timeout = 4000;
                        createAlert(message, status, timeout);
                        return false;
                    }

                    if(whatsapp==''){
                        var message = "Maaf, Silahkan lengkapi Whatsapp anda!";
                        var status = "warning";
                        var timeout = 4000;
                        createAlert(message, status, timeout);
                        return false;
                    }

					if (whatsapp.length < 7) {
						var message = "Maaf, No Handphone atau whatsapp anda tidak valid!";
						var status = "warning";
						var timeout = 4000;
						createAlert(message, status, timeout);
						return false;
					}

					if(payment_method==''){
						var message = "Maaf, Silahkan pilih metode pembayaran anda!";
						var status = "warning";
						var timeout = 4000;
						createAlert(message, status, timeout);
						$('#choose_payment').addClass('set_red');
						return false;
					}

					$('.donasi-loading').removeClass('loading-hide');

					nominalnya = unique_number + nominalnya;

	                var data_nya = [
	                	campaign_id,
	                    name,
	                    whatsapp,
	                    email,
	                    anonim,
	                    comment,
	                    nominalnya,
	                    payment_method,
	                    payment_code,
	                    payment_number,
	                    payment_account,
                     	unique_number,
                     	title_campaign,
                        a_id
	                ];

	                var data = {
	                    "action": "djafunction_submit_donasi",
	                    "datanya": data_nya
	                };

                }else{
                	var message = "Maaf, Minimal sebesar Rp"+numberWithDot(min_donasi)+".";
					var status = "warning";
					var timeout = 4000;
					createAlert(message, status, timeout);
					return false;
                }
            });



            $(".choose_payment").on("click", function(e) {
                e.preventDefault();
                $(this).simplePopup({ type: "html", htmlSelector: "#popup_payment", width: "420px" });
            });
            $("#comment").keyup(function(){
			    el = $(this);
                max_char = 160;
                if(el.val().length > max_char){
                    el.val( el.val().substr(0, max_char) );
                } else {
                    sisa = max_char-el.val().length;
                    $("#charNum").text('Sisa '+ sisa + ' char');
                }
			});
            $("#whatsapp").keyup(function(){
			    el = $(this);
			    if(el.val().length >= 14){
			        el.val( el.val().substr(0, 14) );
			    }
			});  

			$("input, textarea").on("change", function(e){
			var content = $(this).val();
			if($(this).prop("type")!='checkbox'){
				if(content!=''){
					$(this).addClass('filled');
				}else{
					$(this).removeClass('filled');
				}
			}
		});

        });

        a = 0;
        $(".card-label").on("click", function(e) {
            console.log("payment "+(a+1));
            a = a+1;
        });

		
		$(".other_nominal_value input").on("keyup", function(e){
            if(event.which >= 37 && event.which <= 40) return;
            $(this).val(function(index, value) {
                return nilai = value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            });
            run_other_nominal();
        });


		$('input[name="nominal_donasi"]').on("change", function(e){
			nominal = $(this).val();
			set_cookies_nominal(nominal);
			var nominal_label = $(this).data('label');
			if(nominal!=0){
				$('.other_nominal_value').addClass('hide_input');
				$('.other_nominal_value input').val('');
				$('#nominal_value').text(nominal_label);
			}else{
				$('.other_nominal_value').removeClass('hide_input');
				$('.other_nominal_value input').caretTo(0);
				$('#nominal_value').text('');
			}
		});


		$("select#jumlah_paket").on("change", function(e){
			var nominal_paket = $('#nominal_paket').attr('data-paket');
			var jumlah = this.value;
			if(jumlah!='0'){
				nominal = nominal_paket*jumlah;
				set_cookies_nominal(nominal);
				content = nominal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
				$('#nominal_value').text(content);
			}else{
				nominal = 0;
				set_cookies_nominal(nominal);
				content = nominal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
				$('#nominal_value').text(content);
			}
		});

        $(".pendapatan_perbulan input, .pendapatan_lainnya input, .pengeluaran input").on("keyup", function(e){
            if(event.which >= 37 && event.which <= 40) return;
            $(this).val(function(index, value) {
                return nilai = value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            });
            run_zakat();
        });

        function run_zakat(){
            var pendapatan_perbulan = $('.pendapatan_perbulan input').val();
            if(pendapatan_perbulan!=''){
                var pendapatan_perbulan_int = pendapatan_perbulan.replace(/\./g,'');
            }else{
                var pendapatan_perbulan_int = 0;
            }
            
            var pendapatan_lainnya = $('.pendapatan_lainnya input').val();
            if(pendapatan_lainnya!=''){
                var pendapatan_lainnya_int = pendapatan_lainnya.replace(/\./g,'');
            }else{
                var pendapatan_lainnya_int = 0;
            }
            
            var pengeluaran = $('.pengeluaran input').val();
            if(pengeluaran!=''){
                var pengeluaran_int = pengeluaran.replace(/\./g,'');
            }else{
                var pengeluaran_int = 0;
            }

            var total_zakat = parseInt(pendapatan_perbulan_int)+parseInt(pendapatan_lainnya_int)-parseInt(pengeluaran_int);
            // console.log('zakat 1:'+total_zakat);
            total_zakat = (2.5*total_zakat)/100;            // console.log('zakat 2:'+total_zakat);
            total_zakat = Math.round(total_zakat);
            // console.log('zakat 3:'+total_zakat);
            if(total_zakat!=''){
                nominal = parseInt(total_zakat);
                set_cookies_nominal(nominal);
                $('#nominal_value').text(numberWithDot(total_zakat));
                $('.total_zakat input').val(numberWithDot(total_zakat));
            }
        }

		function run_other_nominal(){
			var content = $('.other_nominal_value input').val();
			if(content!=''){
				$('#nominal_value').text(content);
				mystring_number = content.replace(/\./g,'');
				nominal = parseInt(mystring_number);
				set_cookies_nominal(nominal);
			}
		}
		function allowNumbersOnly(e) {
		    var code = (e.which) ? e.which : e.keyCode;
		    if (code > 31 && (code < 48 || code > 57)) {
		        e.preventDefault();
		    }
		}
		function set_cookies_nominal(nominal){
			Cookies.set('nominal', nominal, { expires: 1 });
		}
		function numberWithDot(x) {
		    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
		}



	payment_code = '';
	payment_name = '';
	payment_number = '';
	payment_account = '';
	payment_method = '';

	(function ($) {

    "use strict";

    $.fn.simplePopup = function(options) {
        /**
         * Javascript this
         */
        var that = this;

        /**
         * The data to be inserted in the popup
         */
        var data;

        /**
         * Determined type, based on type option (because we have possible value "auto")
         */
        var determinedType;

        /**
         * Different types are supported:
         *
         * "auto"   Will first try "data", then "html" and else it will fail.
         * "data"   Looks at current HTML "data-content" attribute for content
         * "html"   Needs a selector of an existing HTML tag
         */
        var types = [
            "auto",
            "data",
            "html",
        ];

        /**
         * Default values
         */
        var settings = $.extend({
            type: "auto",                   // Type to get content
            htmlSelector: null,             // HTML selector for popup content
            width: "600px",                 // Width popup
            height: "auto",                 // Height popup
            background: "#fff",             // Background popup
            backdrop: 0.7,                  // Backdrop opactity or falsy value
            backdropBackground: "#000",     // Backdrop background (any css here)
            inlineCss: true,                // Inject CSS via JS
            escapeKey: true,                // Close popup when "escape" is pressed"
            closeCross: true,               // Display a closing cross
            fadeInDuration: 0.3,            // The time to fade the popup in, in seconds
            fadeInTimingFunction: "ease",   // The timing function used to fade the popup in
            fadeOutDuration: 0.3,           // The time to fade the popup out, in seconds
            fadeOutimingFunction: "ease",   // The timing function used to fade the popup out
            beforeOpen: function(){},
            afterOpen: function(){},
            beforeClose: function(){},
            afterClose: function(){}
        }, options );

        /**
         * A selector string to filter the descendants of the selected elements that trigger the event.
         */
        var selector = this.selector;

        /**
         * init
         *
         * Set the onclick event, determine type, validate the settings, set the data and start popup.
         *
         * @returns {this} jQuery object
         */
        function init() {
            validateSettings();

            determinedType = determineType();
            data = setData();

            startPopup();

            return that;
        }

        /**
         * validateSettings
         *
         * Check for some settings if they are correct
         *
         * @returns {void}
         */
        function validateSettings() {
            if (settings.type !== "auto"
                && settings.type !== "data"
                && settings.type !== "html"
            ) {
                throw new Error("simplePopup: Type must me \"auto\", \"data\" or \"html\"");
            }

            if (settings.backdrop > 1 || settings.backdrop < 0) {
                throw new Error("simplePopup: Please enter a \"backdrop\" value <= 1 of >= 0");
            }

            if (settings.fadeInDuration < 0 || Number(settings.fadeInDuration) !== settings.fadeInDuration) {
                throw new Error("simplePopup: Please enter a \"fadeInDuration\" number >= 0");
            }

            if (settings.fadeOutDuration < 0 || Number(settings.fadeOutDuration) !== settings.fadeOutDuration) {
                throw new Error("simplePopup: Please enter a \"fadeOutDuration\" number >= 0");
            }
        }

        /**
         * determineType
         *
         * Check what type we have (and with that where we need to look for the data)
         *
         * @returns {boolean|string} The type of the data or false
         */
        function determineType() {
            // Type HTML
            if (settings.type === "html") {
                return "html";
            }

            // Type DATA
            if (settings.type === "data") {
                return "data";
            }

            // Type AUTO
            if (settings.type === "auto") {
                if(that.data("content")) {
                    return "data";
                }

                if ($(settings.htmlSelector).length) {
                    return "html";
                }

                throw new Error("simplePopup: could not determine type for \"type: auto\"");
            }

            return false;
        }

        /**
         * setData
         *
         * Set the data variable based on the type
         *
         * @returns {boolean|string} The HTML or text to disply in the popup or false
         */
        function setData() {
            // Type HTML
            if (determinedType === "html") {
                if (!settings.htmlSelector) {
                    throw new Error("simplePopup: for \"type: html\" the \"htmlSelector\" option must point to your popup html");
                }

                if (!$(settings.htmlSelector).length) {
                    throw new Error("simplePopup: the \"htmlSelector\": \"" + settings.htmlSelector + "\" was not found");
                }

                return $(settings.htmlSelector).html();
            }

            // Type DATA
            if (determinedType === "data") {
                data = that.data("content");

                if (!data) {
                    throw new Error("simplePopup: for \"type: data\" the \"data-content\" attribute can not be empty");
                }

                return data;
            }

            return false;
        }

        /**
         * startPopup
         *
         * Insert popup HTML, maybe bind escape key and maybe start the backdrop
         *
         * @returns {void}
         */
        function startPopup() {
            if (settings.backdrop) {
                startBackdrop();
            }

            if (settings.escapeKey) {
                bindEscape();
            }

            insertPopupHtml();
        }

        /**
         * insertPopupHtml
         *
         * Create the popup HTML and append it to the body. Maybe set the CSS.
         *
         * @returns {void}
         */
        function insertPopupHtml() {
            var content = $("<div/>", {
                "class": "simple-popup-content",
                "html": data
            });

            var html = $("<div/>", {
                "id": "simple-popup",
                "class": "hide-it"
            });

            if (settings.inlineCss) {
                content.css("width", settings.width);
                content.css("height", settings.height);
                content.css("background", settings.background);
            }



            bindClickPopup(html);

            // When we have a closeCross, create the element, bind click close and append it to
            // the content
            if (settings.closeCross) {
                var closeButton = $("<div/>", {
                    "class": "close"
                });

                bindClickClose(closeButton);
                content.append(closeButton);
            }

            html.append(content);

            // Call the beforeOpen callback
            settings.beforeOpen(html);

            $("body").append(html);

            // Use a timeout, else poor CSS is to slow to see the difference
            setTimeout(function() {
                var html = $("#simple-popup");

                // Set the fade in effect
                if (settings.inlineCss) {
                    html = setFadeTimingFunction(html, settings.fadeInTimingFunction);
                    html = setFadeDuration(html, settings.fadeInDuration);
                }

                html.removeClass("hide-it");

            });

            // Poll to check if the popup is faded in
            var intervalId = setInterval(function() {
                if ($("#simple-popup").css("opacity") === "1") {
                    clearInterval(intervalId);

                    // Call the afterOpen callback
                    settings.afterOpen(html);
                }
            }, 100);

            if(payment_code!=''){
            	$('.'+payment_code).find("input").prop("checked", true);
        	}
            // alert(payment_is);
        }

        /**
         * stopPopup
         *
         * Stop the popup and remove it from the DOM. Because it can fade out, use and interval
         * to check if opacity has reached 0. Maybe remove backdrop and maybe unbind the escape
         * key
         *
         * @returns {void}
         */
        function stopPopup() {
            // Call the beforeClose callback
            var html = $("#simple-popup");
            settings.beforeClose(html);

            // Set the fade out effect
            if (settings.inlineCss) {
                html = setFadeTimingFunction(html, settings.fadeOutTimingFunction);
                html = setFadeDuration(html, settings.fadeOutDuration);
            }

            $("#simple-popup").addClass("hide-it");

            // Poll to check if the popup is faded out
            var intervalId = setInterval(function() {
                if ($("#simple-popup").css("opacity") === "0") {
                    $("#simple-popup").remove();
                    clearInterval(intervalId);

                    // Call the afterClose callback
                    settings.afterClose();
                }
            }, 100);

            if (settings.backdrop) {
                stopBackdrop();
            }

            if (settings.escapeKey) {
                unbindEscape();
            }
        }

        /**
         * bindClickPopup
         *
         * When clicked outside the popup, close the popup. Use e.target to determine if
         * "simple-popup" was clicked or "simple-popup-content"
         *
         * @param {string} html The html of the popup
         * @returns {void}
         */
        
        function bindClickPopup(html) {
        	
            $(html).on("click", function(e) {
                if ($(e.target).prop("id") === "simple-popup") {
                    stopPopup();
                }

                if ($(e.target).hasClass("card-label")) {
                    stopPopup();
                    payment_method = $(e.target).attr('data-method');
                    payment_code = $(e.target).attr('data-code');
                    payment_name = $(e.target).attr('data-paymentname');
                    payment_number = $(e.target).attr('data-number');
                    payment_account = $(e.target).attr('data-account');
                    $('.title_payment').text(payment_name).css({"text-transform":"capitalize", "font-weight":"bold"});
                    console.log('label :'+payment_code);

                    $('.box_img_payment img').attr('src', 'https://lazismu.bmtumy.com/wp-content/plugins/donasiaja/assets/images/bank/'+payment_code+'.png');
					$('.box_img_payment img').attr('data-paymentmethod', payment_method).attr('data-paymentcode', payment_code).attr('data-paymentnumber', payment_number).attr('data-paymentaccount', payment_account);
					$('#choose_payment').removeClass('set_red');
                }
                if ($(e.target).prop("class") === "card-icon") {
                	stopPopup();
                    payment_method = $(e.target).attr('data-method');
                    payment_code = $(e.target).attr('data-code');
                    payment_name = $(e.target).attr('data-paymentname');
                    payment_number = $(e.target).attr('data-number');
                    payment_account = $(e.target).attr('data-account');
                    $('.title_payment').text(payment_name).css({"text-transform":"capitalize", "font-weight":"bold"});
                    console.log('icon :'+payment_code);

                    $('.box_img_payment img').attr('src', 'https://lazismu.bmtumy.com/wp-content/plugins/donasiaja/assets/images/bank/'+payment_code+'.png');
					$('.box_img_payment img').attr('data-paymentmethod', payment_method).attr('data-paymentcode', payment_code).attr('data-paymentnumber', payment_number).attr('data-paymentaccount', payment_account);
					$('#choose_payment').removeClass('set_red');
                }
                if ($(e.target).prop("class") === "card-text") {
                	stopPopup();
                    payment_method = $(e.target).attr('data-method');
                    payment_code = $(e.target).attr('data-code');
                    payment_name = $(e.target).attr('data-paymentname');
                    payment_number = $(e.target).attr('data-number');
                    payment_account = $(e.target).attr('data-account');
                    $('.title_payment').text(payment_name).css({"text-transform":"capitalize", "font-weight":"bold"});
                    console.log('name :'+payment_code);

                    $('.box_img_payment img').attr('src', 'https://lazismu.bmtumy.com/wp-content/plugins/donasiaja/assets/images/bank/'+payment_code+'.png');
					$('.box_img_payment img').attr('data-paymentmethod', payment_method).attr('data-paymentcode', payment_code).attr('data-paymentnumber', payment_number).attr('data-paymentaccount', payment_account);
					$('#choose_payment').removeClass('set_red');
                }
            });
        }

        function bindClickClose(html) {
            $(html).on("click", function(e) {
                stopPopup();
            });
        }

        function startBackdrop() {
            insertBackdropHtml();
        }

        function stopBackdrop() {
            var backdrop = $("#simple-popup-backdrop");

            // Set the fade out effect
            if (settings.inlineCss) {
                backdrop = setFadeTimingFunction(backdrop, settings.fadeOutTimingFunction);
                backdrop = setFadeDuration(backdrop, settings.fadeOutDuration);
            }

            backdrop.addClass("hide-it");

            // Poll to check if the popup is faded out
            var intervalId = setInterval(function() {
                if ($("#simple-popup-backdrop").css("opacity") === "0") {
                    $("#simple-popup-backdrop").remove();
                    clearInterval(intervalId);
                }
            }, 100);
        }

        function insertBackdropHtml() {
            var content = $("<div/>", {
                "class": "simple-popup-backdrop-content"
            });

            var html = $("<div/>", {
                "id": "simple-popup-backdrop",
                "class": "hide-it"
            });

            if (settings.inlineCss) {
                content.css("opacity", settings.backdrop);
                content.css("background", settings.backdropBackground);
            }

            html.append(content);
            $("body").append(html);

            // Use a timeout, else poor CSS doesn"t see the difference
            setTimeout(function() {
                var backdrop = $("#simple-popup-backdrop");

                // Set the fade in effect
                if (settings.inlineCss) {
                    backdrop = setFadeTimingFunction(backdrop, settings.fadeInTimingFunction);
                    backdrop = setFadeDuration(backdrop, settings.fadeInDuration);
                }

                backdrop.removeClass("hide-it");
            });
        }

        function bindEscape() {
            $(document).on("keyup.escapeKey", function(e) {
                if (e.keyCode === 27) {
                    stopPopup();
                }
            });
        }

        function unbindEscape() {
            $(document).unbind("keyup.escapeKey");
        }

        function setFadeTimingFunction(object, timingFunction) {
            object.css("-webkit-transition-timing-function", timingFunction);
            object.css("-moz-transition-timing-function", timingFunction);
            object.css("-ms-transition-timing-function", timingFunction);
            object.css("-o-transition-timing-function", timingFunction);
            object.css("transition-timing-function", timingFunction);
            return object;
        }

        function setFadeDuration(object, duration) {
            object.css("-webkit-transition-duration", duration + "s");
            object.css("-moz-transition-duration", duration + "s");
            object.css("-ms-transition-duration", duration + "s");
            object.css("-o-transition-duration", duration + "s");
            object.css("transition-duration", duration + "s");
            return object;
        }

        return init();
    };
}(jQuery));
    
</script>
<script>

$(document).ready(function(){$(".set > a").on("click",function(){if($(this).hasClass("active")){$(this).removeClass("active");$(this).siblings(".content").slideUp(200);$(".set > a i").removeClass("fa-minus").addClass("fa-plus")}else{$(".set > a i").removeClass("fa-minus").addClass("fa-plus");$(this).find("i").removeClass("fa-plus").addClass("fa-minus");$(".set > a").removeClass("active");$(this).addClass("active");$(".content").slideUp(200);$(this).siblings(".content").slideDown(200)}})})


$(".typ-total-copy, .copy-total").on("click",function(e){var total=$(this).attr('data-salin');copyToClipboard(total);var message="Nominal transfer: "+total+" berhasil dicopy.";var status="success";var timeout=3000;createAlert(message,status,timeout)});$(".typ-rek-copy, .copy-rek").on("click",function(e){var rek=$(this).attr('data-salin');copyToClipboard(rek);var message="Payment Number: "+rek+" berhasil dicopy.";var status="success";var timeout=3000;createAlert(message,status,timeout)})

function copyToClipboard(string) {
         let textarea;let result;try{textarea=document.createElement("textarea");textarea.setAttribute("readonly",!0);textarea.setAttribute("contenteditable",!0);textarea.style.position="fixed";textarea.value=string;document.body.appendChild(textarea);textarea.focus();textarea.select();const range=document.createRange();range.selectNodeContents(textarea);const sel=window.getSelection();sel.removeAllRanges();sel.addRange(range);textarea.setSelectionRange(0,textarea.value.length);result=document.execCommand("copy")}catch(err){console.error(err);result=null}finally{document.body.removeChild(textarea)}
      if(!result){const isMac=navigator.platform.toUpperCase().indexOf("MAC")>=0;const copyHotkey=isMac?"⌘C":"CTRL+C";result=prompt(`Press ${copyHotkey}`,string);if(!result){return!1}}
      return!0
         }
   
</script>
<script>

		window.addEventListener("load", function() {

			// store tabs variable
			var myTabs = document.querySelectorAll("ul.nav-tabs > li");

			function myTabClicks(tabClickEvent) {

				for (var i = 0; i < myTabs.length; i++) {
					myTabs[i].classList.remove("active");
				}

				var clickedTab = tabClickEvent.currentTarget; 

				clickedTab.classList.add("active");

				tabClickEvent.preventDefault();

				var myContentPanes = document.querySelectorAll(".tab-pane");

				for (i = 0; i < myContentPanes.length; i++) {
					myContentPanes[i].classList.remove("active");
				}

				var anchorReference = tabClickEvent.target;
				var activePaneId = anchorReference.getAttribute("href");
				var activePane = document.querySelector(activePaneId);

				activePane.classList.add("active");

			}

			for (i = 0; i < myTabs.length; i++) {
				myTabs[i].addEventListener("click", myTabClicks)
			}
		});

		$(document).ready(function() {
		  $timelineExpandableTitle = $('.timeline-action.is-expandable .title');
		  
		  $($timelineExpandableTitle).attr('tabindex', '0');
		  
		  // Give timelines ID's
		  $('.timeline').each(function(i, $timeline) {
		    var $timelineActions = $($timeline).find('.timeline-action.is-expandable');
		    
		    $($timelineActions).each(function(j, $timelineAction) {
		      var $milestoneContent = $($timelineAction).find('.content');
		      
		      $($milestoneContent).attr('id', 'timeline-' + i + '-milestone-content-' + j).attr('role', 'region');
		      $($milestoneContent).attr('aria-expanded', $($timelineAction).hasClass('expanded'));
		      
		      $($timelineAction).find('.title').attr('aria-controls', 'timeline-' + i + '-milestone-content-' + j);
		    });
		  });
		  
		  $($timelineExpandableTitle).click(function() {
		    $(this).parent().toggleClass('is-expanded');
		    $(this).siblings('.content').attr('aria-expanded', $(this).parent().hasClass('is-expanded'));
		  });
		  
		  // Expand or navigate back and forth between sections
		  $($timelineExpandableTitle).keyup(function(e) {
		    if (e.which == 13){ //Enter key pressed
		      $(this).click();
		    } else if (e.which == 37 ||e.which == 38) { // Left or Up
		      $(this).closest('.timeline-milestone').prev('.timeline-milestone').find('.timeline-action .title').focus();
		    } else if (e.which == 39 ||e.which == 40) { // Right or Down
		      $(this).closest('.timeline-milestone').next('.timeline-milestone').find('.timeline-action .title').focus();
		    }
		  });
		});                  


		$(document).ready(function() {
		    $('.donasiaja-share').click(function(e) {
		        e.preventDefault();
		        if ($(this).hasClass("wa") || $(this).hasClass("fb") || $(this).hasClass("twit") || $(this).hasClass("tele")) {
					window.open($(this).attr('href'), 'fbShareWindow', 'height=450, width=550, top=' + ($(window).height() / 2 - 275) + ', left=' + ($(window).width() / 2 - 225) + ', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');
						return false;
				}
		        
		    });
		});

		$('.donation_button_share').bind("click", function(e) {
			$('#fixed-share-button').addClass("show-button");
		});
		$('.share-close').bind("click", function(e) {
			$('#fixed-share-button').removeClass("show-button");
		});


		$('.donasiaja-readmore').readmore({
		  speed: 12,
		  moreLink: '<a href="#" class="readmore">Baca selengkapnya ▾</a>',
		  lessLink: '<a href="#" class="readmore">Baca dengan ringkas ▴</a>',
		});

		$(function() {
		    var header = $("#header-title");
		    var header2 = $('.campaign-header-title');
		    var footer = $("#fixed-button");
		    $(window).scroll(function() {
		        var scroll = $(window).scrollTop();

		        if (scroll >= 500) {
		            header.addClass("flying-header");
		            header2.addClass("show-title");
		            footer.addClass("flying-button");
		        } else {
		            header.removeClass("flying-header");
		            header2.removeClass("show-title");
		            footer.removeClass("flying-button");
		            $('#fixed-share-button').removeClass("show-button");
		        }
		    });
		});


		$(document).on("click", ".donasiaja_copy_link", function(e) {
			var link_donasi = $(this).data("link");
			copyToClipboard(link_donasi);
			var message = "Copy link donasi berhasil!";
			var status = "success";    /* There are 4 statuses: success, info, warning, danger  */
			var timeout = 3000;     /* 5000 here means the alert message disappears after 5 seconds. */
			createAlert(message, status, timeout);
		});

		$(document).on("click", ".copy_link_aff", function(e) {
			var link_donasi = $(this).data("link");
			copyToClipboard(link_donasi);
			var message = "Copy Link Aff berhasil!";
			var status = "success";    /* There are 4 statuses: success, info, warning, danger  */
			var timeout = 3000;     /* 5000 here means the alert message disappears after 5 seconds. */
			createAlert(message, status, timeout);
		});

		$(document).on("click", ".regaff", function(e) {
			$('.fundraiser-loading').removeClass('fundraiser-hide');
			var cid = $(this).data("cid");
			var data_nya = [cid];
		    var data = {
		        "action": "djafunction_regaff_fundraiser",
		        "datanya": data_nya
		    };

		    jQuery.post("https://lazismu.bmtumy.com/wp-admin/admin-ajax.php", data, function(response) {

		    	var response_text = response.split("_");
                response_info = response_text[0];
                response_affcode = response_text[1];

                if(response_info=='loginfirst'){
			    	$('.fundraiser-loading').addClass('fundraiser-hide');

			    	var message = "Silahkan anda login terlebih dahulu.";
					var status = "warning";    /* There are 4 statuses: success, info, warning, danger  */
					var timeout = 3000;     /* 5000 here means the alert message disappears after 5 seconds. */
					createAlert(message, status, timeout);

					
					setTimeout(function() {
			            var urlnya = "https://lazismu.bmtumy.com/wp-login.php";
						window.location.replace(urlnya);
			        }, 1200)
					
                }else{
                	var aff_url = "https://lazismu.bmtumy.com/campaign/infak-peduli-gempa-turki"+'?ref='+response_affcode;
			    	$('.donation_button_fundraiser img').attr("src","https://lazismu.bmtumy.com/wp-content/plugins/donasiaja/assets/images/link2.png");
			    	$('.donation_button_fundraiser').removeClass('regaff');
			    	$('.donation_button_fundraiser').addClass('copy_link_aff');
			    	$('.donation_button_fundraiser').attr('data-link', aff_url);
			    	$('.donation_button_fundraiser .text-fundraiser').text('Copy Link Aff');
			    	
			    	$('.fundraiser-loading').addClass('fundraiser-hide');

			    	copyToClipboard(aff_url);

			    	var message = "Link Aff Fundraiser berhasil didaftarkan dan di-copy. Silahkan sebarkan ke Social Media anda.";
					var status = "success";    /* There are 4 statuses: success, info, warning, danger  */
					var timeout = 3000;     /* 5000 here means the alert message disappears after 5 seconds. */
					createAlert(message, status, timeout);
                }

		    	
		    });
		});

		

		// get Copy
		function copyToClipboard(string) {
		let textarea;let result;try{textarea=document.createElement("textarea");textarea.setAttribute("readonly",!0);textarea.setAttribute("contenteditable",!0);textarea.style.position="fixed";textarea.value=string;document.body.appendChild(textarea);textarea.focus();textarea.select();const range=document.createRange();range.selectNodeContents(textarea);const sel=window.getSelection();sel.removeAllRanges();sel.addRange(range);textarea.setSelectionRange(0,textarea.value.length);result=document.execCommand("copy")}catch(err){console.error(err);result=null}finally{document.body.removeChild(textarea)}
	if(!result){const isMac=navigator.platform.toUpperCase().indexOf("MAC")>=0;const copyHotkey=isMac?"⌘C":"CTRL+C";result=prompt(`Press ${copyHotkey}`,string);if(!result){return!1}}
	return!0
		}

		function getNum(val) {
		   if (isNaN(val)) {
		     return 0;
		   }
		   return val;
		}

		$(function(){
		  $(document).on("click", ".donation_love", function(e) {
		    $(this).bind('animationend webkitAnimationEnd MSAnimationEnd oAnimationEnd', function(){
		        $(this).removeClass('active');
		    })
		     $(this).addClass("active");
		  });
		});


		$(document).on("click", ".donation_love", function(e) {
			var id = $(this).attr('id');
			var campaign_id = $(this).attr('data-campaignid');
			var donate_id = $(this).attr('data-donateid');
			var count_love = $(this).find('.total_love').text();
			
			var thenum = parseInt(getNum(count_love.replace(/\D/g, "")));
			if(isNaN(thenum)){
				$(this).find('.total_love').html('<span>1 Aaminn</span>');
			}else{
				thenum = thenum+1;
				$(this).find('.total_love').html('<span>'+thenum+' Aaminn</span>');
			}

			$("#"+id+" img").attr("src","https://lazismu.bmtumy.com/wp-content/plugins/donasiaja/assets/icons/praying-color3.png");

			$(this).find('.plus1').addClass('show').animate({
				top: '-27px',
				opacity: '0',
			}, {
				duration : 400, 
				complete : function(){
    				set_hide(id);
    			}
    		});
			// console.log("log: "+id);
			var data_nya = [campaign_id, donate_id];
		    var data = {
		        "action": "djafunction_set_love",
		        "datanya": data_nya
		    };

		    jQuery.post("https://lazismu.bmtumy.com/wp-admin/admin-ajax.php", data, function(response) {
		    	

		    });
			
		});



		function set_hide(id){
			$('#'+id+' .plus1').removeClass('show').removeAttr('style');
		}

		// Load Fundariser
		$('.load_fundraiser').bind("click", function(e) {
			var id = $(this).attr('id');
			var campaign_id = $(this).attr('data-id');
			var load_count = $(this).attr('data-count');
			var anonim = $(this).attr('data-anonim');
			var fullanonim = $(this).attr('data-fullanonim');
			$('#'+id).text('Loadmore...');

			var data_nya = [id, campaign_id, load_count, anonim, fullanonim];
		    var data = {
		        "action": "djafunction_load_fundraiser",
		        "datanya": data_nya
		    };

		    jQuery.post("https://lazismu.bmtumy.com/wp-admin/admin-ajax.php", data, function(response) {
		    	if(response==''){
					$('#box_btn_'+id+' .loadmore_info').html('No more data').slideDown();
			        setTimeout(function() {
			            $('#box_btn_'+id+' .loadmore_info').hide()
			        }, 5000)
				}
		        
		        load_count = parseFloat(load_count)+1;
		        $('#'+id).attr('data-count', load_count).text('Loadmore');;
				$('#box_'+id).append(response);

		    })

		});


		// Load Doa Donatur
		$('.load_doa_donatur').bind("click", function(e) {
			var id = $(this).attr('id');
			var campaign_id = $(this).attr('data-id');
			var load_count = $(this).attr('data-count');
			var anonim = $(this).attr('data-anonim');
			var fullanonim = $(this).attr('data-fullanonim');
			$('#'+id).text('Loadmore...');

			var data_nya = [id, campaign_id, load_count, anonim, fullanonim];
		    var data = {
		        "action": "djafunction_load_doa_donatur",
		        "datanya": data_nya
		    };

		    jQuery.post("https://lazismu.bmtumy.com/wp-admin/admin-ajax.php", data, function(response) {
		    	if(response==''){
					$('#box_btn_'+id+' .loadmore_info').html('No more data').slideDown();
			        setTimeout(function() {
			            $('#box_btn_'+id+' .loadmore_info').hide()
			        }, 5000)
				}
		        
		        load_count = parseFloat(load_count)+1;
		        $('#'+id).attr('data-count', load_count).text('Loadmore');;
				$('#box_'+id).append(response);

		    })

		});

		// Load Data Donatur
		$('.load_data_donatur').bind("click", function(e) {
			var id = $(this).attr('id');
			var campaign_id = $(this).attr('data-id');
			var load_count = $(this).attr('data-count');
			var anonim = $(this).attr('data-anonim');
			var fullanonim = $(this).attr('data-fullanonim');
			$('#'+id).text('Loadmore...');

			var data_nya = [id, campaign_id, load_count, anonim, fullanonim];
		    var data = {
		        "action": "djafunction_load_data_donatur",
		        "datanya": data_nya
		    };

		    jQuery.post("https://lazismu.bmtumy.com/wp-admin/admin-ajax.php", data, function(response) {
		    	if(response==''){
					$('#box_btn_'+id+' .loadmore_info').html('No more data').slideDown();
			        setTimeout(function() {
			            $('#box_btn_'+id+' .loadmore_info').hide()
			        }, 5000)
				}
		        
		        load_count = parseFloat(load_count)+1;
		        $('#'+id).attr('data-count', load_count).text('Loadmore');;
				$('#box_'+id).append(response);

		    })

		});

	</script>
</body>
</html>