/*
 * THIS FILES HANDLES PANELS INTERACTION.
 *
 */

(function($){
	
  //Get max height for panels display, description, and panel tools containers.

  var $header = $('.panels header');

  var headerHeight = $header.height() + parseInt($header.css("paddingTop") + $header.css("paddingBottom") + $header.css("marginTop") + $header.css("marginBottom"));

  var $carousel = $('.rs-carousel');

  var carouselHeight = $carousel.height() + parseInt($carousel.css("paddingTop") + $carousel.css("paddingBottom") + $carousel.css("marginTop") + $carousel.css("marginBottom"));

  var $winHeight = $(window).height();

  var maxHeightPanel = $winHeight - ((headerHeight + carouselHeight) + 10);

	var $carouselHidden = 0;
  
  $('.panels-display').height(maxHeightPanel); 

  $('.panels-photo').height(maxHeightPanel);

  $('.panel-description').height(maxHeightPanel);

  $('.panels-display nav').height(maxHeightPanel);
    
  $(window).resize(function(){
    
      headerHeight = $header.height() + parseInt($header.css("paddingTop") + $header.css("paddingBottom") + $header.css("marginTop") + $header.css("marginBottom"));
    
      carouselHeight = $carousel.height() + parseInt($carousel.css("paddingTop") + $carousel.css("paddingBottom") + $carousel.css("marginTop") + $carousel.css("marginBottom"));

			$winHeight = ($(window).height()) + 10;
			
			if ($('.rs-carousel').is(":visible")) {
				
				maxHeightPanel = $winHeight - ((headerHeight + carouselHeight) + 10);
				
			}else {
				
				maxHeightPanel = $winHeight - ((headerHeight) + 10);
			};

      $('.panels-display').height(maxHeightPanel);  

      $('.panels-photo').height(maxHeightPanel);

      $('.panel-description').height(maxHeightPanel);

      $('.panels-display nav').height(maxHeightPanel);
    

      // Refresh carousel items
    
      $(':rs-carousel').carousel('refresh');

  });

  $(document).ready(function () {
	
			//Init carousel
	
      $('.rs-carousel').carousel(
          {
              nextPrevActions: true,
              insertPrevAction: function () {
                  return $('<div id="left-nav" class="carousel-left-limit"><a href="#" class="rs-carousel-action rs-carousel-action-prev"><span class="carousel-left-control"></span></a></div>').appendTo(this);
              },
              insertNextAction: function () {
                  return $('<div id="right-nav" class="carousel-right-limit"><a href="#" class="rs-carousel-action rs-carousel-action-next"><span class="carousel-right-control"></span></a></div>').appendTo(this);
              },
              pagination: false
          }
      );
    
			//Hide carousel UI nav control when beginning and ending of carousel items.
	
			if (!$('#left-nav').hasClass('rs-carousel-action-active')){
				$('#left-nav').hide();
			}
			
			if ($('#left-nav').hasClass('rs-carousel-action-active')){
				$('#left-nav').show();
			}
			
			if (!$('#right-nav').hasClass('rs-carousel-action-active')){
				$('#right-nav').hide();
			}
			
				if ($('#right-nav').hasClass('rs-carousel-action-active')){
					$('#right-nav').show();
				}
			
			
  		//Hover over carousel of panels will change image legend to active color.

  		$('.panel-item').hover(function(){
	
  		  $(this).find('.panel-name').addClass('hover');

  		}, function(){
	
  		  $(this).find('.panel-name').removeClass('hover');
  		});
		
		
			//Reveal/Hide dearch form
  		
		   var $searchIcon = $('.search-panels');
		
		   var $searchIconImg = $('.search-panels span');
		
		   var $searchFlag = true;
		
  			$searchIcon .click(function(){
  			  
  			  if ($searchFlag) {
	
						$('#search-panels').show();

							$searchIconImg.removeClass("search-panels-icon");

  			      $searchIconImg.addClass("search-panels-close-icon");

  			      $searchFlag = !$searchFlag;

  			  }else{
	
            $('#search-panels').hide();

              $searchIconImg.addClass("search-panels-icon");

              $searchIconImg.removeClass("search-panels-close-icon");

              $searchFlag = !$searchFlag;
  			  }
  		
  			});
			
	
        //Drop-down touch friendly
        $( '#nav li:has(ul)' ).doubleTapToGo();

		
		//show/hide carousel

     $('.carousel-toggle').toggle(function () {

         $('.rs-carousel').slideUp('slow');

				$(this).removeClass('carousel-toggle-hide').addClass('carousel-toggle-show').attr('title', 'expand panels');
			
				headerHeight = $header.height() + parseInt($header.css("paddingTop") + $header.css("paddingBottom") + $header.css("marginTop") + $header.css("marginBottom"));

				$winHeight = ($(window).height()) + 10;

				maxHeightPanel = $winHeight - (headerHeight + 10);

				$('.panels-display').height(maxHeightPanel); 
				 
     		$('.panels-photo').height(maxHeightPanel);

     		$('.panel-description').height(maxHeightPanel);

     		$('.panels-display nav').height(maxHeightPanel);

				$(':rs-carousel').carousel('refresh');

     }, function () {
	
         $('.rs-carousel').slideDown('slow');

				$(this).removeClass('carousel-toggle-show').addClass('carousel-toggle-hide').attr('title', 'collapse panels');

				headerHeight = $header.height() + parseInt($header.css("paddingTop") + $header.css("paddingBottom") + $header.css("marginTop") + $header.css("marginBottom"));

				$winHeight = ($(window).height()) + 10;

				maxHeightPanel = $winHeight - ((headerHeight + carouselHeight) + 10);

				$('.panels-display').height(maxHeightPanel); 
				 
     		$('.panels-photo').height(maxHeightPanel);

     		$('.panel-description').height(maxHeightPanel);

     		$('.panels-display nav').height(maxHeightPanel);

				$(':rs-carousel').carousel('refresh');
     });

  });

})(jQuery);

