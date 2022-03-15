
   $(document).ready(function() {

   	$("#main-demo").owlCarousel({
     
    autoPlay: false, //Set AutoPlay to 3 seconds
	slideSpeed: 3000,
	loop: false,
	mouseDrag: true,
	touchDrag: true,
	nav: true,
	lazyload: true,
	rewind:true,
	navigationText: ["<span class='right-arrow'></span>","<span class='left-arrow'></span>"],
	dots: false,
	items: 1
    });
     
	$("#owl-demo5").owlCarousel({
     
    autoPlay: true, //Set AutoPlay to 3 seconds
     
    items : 5,
    itemsDesktop : [1199,3],
    itemsDesktopSmall : [979,3],
    dots : false

    });

	$("#owl-demo3").owlCarousel({
     
    navigation : false, // Show next and prev buttons
    slideSpeed : 3000,
	autoPlay: false,
    paginationSpeed : 400,
    singleItem:true
     
    });
	  
  $("#owl-demo7").owlCarousel({
     
    navigation : false, // Show next and prev buttons
    slideSpeed : 3000,
	autoPlay: false,
    paginationSpeed : 400,
    singleItem:true,
    items: 3
     
    });
	
  
	var sync1 = $("#sync1");
	var sync2 = $("#sync2");
	
	sync1.owlCarousel({
	singleItem : true,
	slideSpeed : 1000,
	pagination:false,
	afterAction : syncPosition,
	responsiveRefreshRate : 200,
	});
	
	sync2.owlCarousel({
	items : 4,
	itemsDesktop      : [1170,4],
	itemsDesktopSmall     : [979,4],
	itemsTablet       : [768,4],
	itemsMobile       : [479,2],
	pagination:false,
	responsiveRefreshRate : 100,
	afterInit : function(el){
	  el.find(".owl-item").eq(0).addClass("synced");
	}
	});
	
	function syncPosition(el){
	var current = this.currentItem;
	$("#sync2")
	  .find(".owl-item")
	  .removeClass("synced")
	  .eq(current)
	  .addClass("synced")
	if($("#sync2").data("owlCarousel") !== undefined){
	  center(current)
	}
	
	}
	
	$("#sync2").on("click", ".owl-item", function(e){
	e.preventDefault();
	var number = $(this).data("owlItem");
	sync1.trigger("owl.goTo",number);
	});
	
	function center(number){
	var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
	
	var num = number;
	var found = false;
	for(var i in sync2visible){
	  if(num === sync2visible[i]){
		var found = true;
	  }
	}
	
	if(found===false){
	  if(num>sync2visible[sync2visible.length-1]){
		sync2.trigger("owl.goTo", num - sync2visible.length+2)
	  }else{
		if(num - 1 === -1){
		  num = 0;
		}
		sync2.trigger("owl.goTo", num);
	  }
	} else if(num === sync2visible[sync2visible.length-1]){
	  sync2.trigger("owl.goTo", sync2visible[1])
	} else if(num === sync2visible[0]){
	  sync2.trigger("owl.goTo", num-1)
	}
	}



	
    });
