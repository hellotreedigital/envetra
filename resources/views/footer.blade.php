<div class="section-fulldark">
      <div class="container">
        <div class="row">
            <div class="col-md-12">
              <p class="text-gray" style="margin-bottom:0px;">Copyright © <?= date('Y') ?>.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
    <!-- end section --> 
    
    <a href="#" class="scrollup"><i class="fa fa-angle-up" aria-hidden="true"></i></a><!-- end scroll to top of the page--> 
    
  </div>
  <!--end site wrapper--> 
</div>
<!--end wrapper boxed--> 

<!-- Scripts --> 
<script src="https://www.google.com/recaptcha/api.js?render=6Ledl3IcAAAAAGEL8JgOGNf2TjvREdiJJREHXKA7"></script>
<!--<script src="{{asset('js/jquery/jquery.js')}}"></script> -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="{{asset('js/bootstrap/bootstrap.min.js')}}"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="{{asset('js/less/less.min.js')}}" data-env="development"></script> 
<!-- Scripts END --> 
<!-- Template scripts --> 
<script src="{{asset('js/megamenu/js/main.js')}}"></script>
<style>.black{background-color: black !important;}</style>
<script src="{{asset('js/tabs/js/responsive-tabs.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/functions/matchHeight.js')}}"></script> 
<script src="{{asset('js/owl-carousel/owl.carousel.js')}}"></script> 
<script src="{{asset('js/owl-carousel/custom.js')}}"></script> 
<!--<script src="{{asset('js/owl-carousel/owl.carousel.js')}}"></script>-->
<script src="{{asset('js/intlTelInput.min.js')}}"></script>
<script src="{{asset('js/functions/functions.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function () {

    // get the country data from the plugin
var input = document.querySelector("#phone");
  window.intlTelInput(input);

    $('.demo a').click(function(event) {
        $('#menu').collapse('hide');
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
      && 
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
            scrollTop: target.offset().top
          }, 1000, function() {
        });
      }
    }
    });
    $('.nav li a[href^="#"]').not('[href="#"]').not('[href="#0"]').click(function(event) {
        $('#menu').collapse('hide');
        $('.style1').removeClass('black');
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
      && 
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1500, function() {
          
        });
      }
    }
    });
    $('.logo').click(function(event) {
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
      && 
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, function() {

        });
      }
    }
    });
});

// Cache selectors
var topMenu = $(".nav"),
    topMenuHeight = topMenu.outerHeight()+15,
    // All list items
    menuItems = topMenu.find("a"),
    // Anchors corresponding to menu items
    scrollItems = menuItems.map(function(){
      var item = $($(this).attr("href"));
      if (item.length) { return item; }
    });

// Bind to scroll
$(window).on('scroll',function(){
   // Get container scroll position
   var fromTop = $(this).scrollTop()+topMenuHeight;

   // Get id of current scroll item
   var cur = scrollItems.map(function(){
     if ($(this).offset().top < fromTop)
       return this;
   });
   var scrollHeight = $(document).height();
	var scrollPosition = $(window).height() + $(window).scrollTop();
	if ((scrollHeight - scrollPosition) / scrollHeight === 0) {
	    // when scroll to bottom of the page
        cur = cur[cur.length+1];
   var id = cur && cur.length ? cur[0].id : "";
   // Set/remove active class
   menuItems.parent().removeClass("active").end().filter("[href='#contact']").parent().addClass("active");
	}else{
   // Get the id of the current element
   cur = cur[cur.length-1];
   var id = cur && cur.length ? cur[0].id : "";
   // Set/remove active class
   menuItems.parent().removeClass("active").end().filter("[href='#"+id+"']").parent().addClass("active");
    }
});
</script>


  <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

    </script>

   <script>
        grecaptcha.ready(function() {
            document.querySelector('.grecaptcha-badge').style.display = 'none';
        });
        
        $(document).ready(function() {
            $('.contact-form').on('submit', function(e) {
                e.preventDefault();
                
                grecaptcha.execute('6Ledl3IcAAAAAGEL8JgOGNf2TjvREdiJJREHXKA7', {action: 'submit'}).then(function(token) {
                    $('[name="g-recaptcha-response"]').val(token);
                    
                    var form = $('.contact-form');
                    $('.error').html('&nbsp;');
                    $('.sucess').html('&nbsp;');
                    $.ajax({
                        url: '{{ route('contact-store') }}',
                        type: 'post',
                        data: form.serialize() + '&country=123',
                        error: function(data) {
                            var keys = Object.keys(data.responseJSON.errors);
                            var values = Object.values(data.responseJSON.errors);
                            for (var i = 0; i < keys.length; i++) {
                                if ('email' == keys[i]) {
                                    $('.er-email').html(values[i]);
                                } else if ('fname' == keys[i]) {
                                    $('.er-fname').html(values[i]);
                                } else if ('lname' == keys[i]) {
                                    $('.er-lname').html(values[i]);
                                } else if ('subject'== keys[i]){
                                    $('.er-subject').html(values[i] );
                                } else if ('message' == keys[i]) {
                                    $('.er-msg').html(values[i] );
                                } else if ('phone' == keys[i]) {
                                    $('.er-phone').html(values[i] );
                                }
                            }
                        },
                        success: function(data) {
                            $('.contact-form')[0].reset();
                            $('.error').html('&nbsp;');
                            $('.input-1').val('');
                            $('.textaria-1').html('');
                            $('.sucess').html(data.msg);
                        }
                    });
                });
            });
        });

    </script>











</body>

</html>
