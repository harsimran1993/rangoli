	

	$(document).ready(function(){
	    $('[data-toggle="popover"]').popover({ trigger: "manual" , html: true, animation:false})
	    .on("mouseenter", function () {
	        var _this = this;
	        $(this).popover("show");
	        $(".popover").on("mouseleave", function () {
	            $(_this).popover('hide');
	        });
	    }).on("mouseleave", function () {
	        var _this = this;
	        setTimeout(function () {
	            if (!$(".popover:hover").length) {
	                $(_this).popover("hide");
	            }
	        }, 300);
	    });   
	    
	    $("#myTab a").on("click", function(){
			$("#myTab").find(".active").removeClass("active");
			$(this).parent().addClass("active");
			$(this).parent().find(".caret").toggleClass("rotate");
		});
	    $(".nav-pills a").on("click", function(){
			$(".nav-pills").find(".active").removeClass("active");
			$(this).parent().addClass("active");
			$(this).parent().find(".caret").toggleClass("rotate");
		});
	    $('nav').affix({
	        offset: {
	          top: $('#video').height()
	        }
	  }); 
	});

	function loading(percent){
	$('.progress-bar').animate({width:percent},1000,function(){
	$(this).children().html(percent);
	if(percent=='100%'){
	setTimeout(function(){
	$('.progress').fadeOut();
	//location.href="#about";
	},1000);
	}
	})
	};
	