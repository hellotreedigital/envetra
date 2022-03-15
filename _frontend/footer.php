    <div class="section-fulldark">
      <div class="container">
        <div class="row">
            <div class="col-md-12">
              <p class="text-gray">Copyright © 2018.</p>
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
<script src="assets/js/jquery/jquery.js"></script> 
<script src="assets/js/bootstrap/bootstrap.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="assets/js/less/less.min.js" data-env="development"></script> 
<!-- Scripts END --> 

<!-- Template scripts --> 
<script src="assets/js/megamenu/js/main.js"></script>
<style>.black{background-color: black !important;}</style>
<script src="assets/js/tabs/js/responsive-tabs.min.js" type="text/javascript"></script>
<script src="assets/js/owl-carousel/owl.carousel.js"></script> 
<script src="assets/js/owl-carousel/custom.js"></script> 
<script src="assets/js/owl-carousel/owl.carousel.js"></script>
<script src="assets/js/intlTelInput.min.js"></script>
<script src="assets/js/functions/functions.js"></script>
<script type="text/javascript">
  $(document).ready(function () {

    // get the country data from the plugin
var input = document.querySelector("#phone");
  window.intlTelInput(input);

  
    // $(document).on("scroll", onScroll); 
    
    //smoothscroll
    // $('.nav li a[href^="#"]').on('click', function (e) {
    //     e.preventDefault();
    //     $(document).off("scroll");
        
    //     $('li a').each(function () {
    //         $(this).removeClass('active');
    //     })
    //     $(this).addClass('active');
      
    //     var target = this.hash,
    //         menu = target;
    //     $target = $(target);
    //     $('html, body').stop().animate({
    //         'scrollTop': $target.offset().top+2
    //     }, 1000, 'swing', function () {
    //         window.location.hash = target;
    //         $(document).on("scroll", onScroll);
    //     });
    // });
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
        }, 1000, function() {
            // $('li a').each(function () {
            //     $(this).removeClass('active');
            // })
            // $(this).addClass('active');
            // $('.nav li a').removeClass("active").end().filter("[href='#"+target+"']").parent().addClass("active");
          // Callback after animation
          // Must change focus!
        //   var $target = $(target);
        //   $target.focus();
        //   if ($target.is(":focus")) { // Checking if the target was focused
        //     return false;
        //   } else {
        //     $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
        //     $target.focus(); // Set focus again
        //   };
        });
      }
    }
    });
    $('.logo').click(function(event) {
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
            // $('li a').each(function () {
            //     $(this).removeClass('active');
            // })
            // $(this).addClass('active');
            // $('.nav li a').removeClass("active").end().filter("[href='#"+target+"']").parent().addClass("active");
          // Callback after animation
          // Must change focus!
        //   var $target = $(target);
        //   $target.focus();
        //   if ($target.is(":focus")) { // Checking if the target was focused
        //     return false;
        //   } else {
        //     $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
        //     $target.focus(); // Set focus again
        //   };
        });
      }
    }
    });
});

// function onScroll(event){
//     var scrollPos = $(document).scrollTop();
//     $('.nav a').each(function () {
//         var currLink = $(this);
//         var refElement = $(currLink.attr("href"));
//         if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
//             $('.nav li a').removeClass("active");
//             currLink.addClass("active");
//         }
//         else{
//             currLink.removeClass("active");
//         }
//     });
// }
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
</body>

</html>
