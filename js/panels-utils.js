$(document).ready(function () {
    $('.rs-carousel').carousel(
        {
            nextPrevActions: true,
            insertPrevAction: function () {
                return $('<a href="#" class="rs-carousel-action rs-carousel-action-prev"><span class="carousel-left-control"></span></a>').appendTo(this);
            },
            insertNextAction: function () {
                return $('<a href="#" class="rs-carousel-action rs-carousel-action-next"><span class="carousel-right-control"></span></a>').appendTo(this);
            },
            pagination: false
        }
    );
    
		
		//hover over carousel of panels will change image legend to active color.
		$('.panel-item').hover(function(){
		  $(this).find('.panel-name').addClass('hover');
		}, function(){
		  $(this).find('.panel-name').removeClass('hover');
		});

});



