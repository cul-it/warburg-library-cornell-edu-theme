//Wrapping all in an anonimous self invoking function because Drupal is too delicate.

(function($){
  //Comment? get max height for panels

  var $header = $('.panels header');

  var headerHeight = $header.height() + parseInt($header.css("paddingTop") + $header.css("paddingBottom") + $header.css("marginTop") + $header.css("marginBottom"));

  var $carousel = $('.rs-carousel');

  var carouselHeight = $carousel.height() + parseInt($carousel.css("paddingTop") + $carousel.css("paddingBottom") + $carousel.css("marginTop") + $carousel.css("marginBottom"));

  var $winHeight = $(window).height();

  var maxHeightPanel = $winHeight - ((headerHeight + carouselHeight) + 10);
  
  $('.panels-display').height(maxHeightPanel); 

  $('.panels-photo').height(maxHeightPanel);
  $('.panel-description').height(maxHeightPanel);
  $('.panels-display nav').height(maxHeightPanel);




 
  //console.log($('.win').html($winHeight));   
          
  $(window).resize(function(){
    
      headerHeight = $header.height() + parseInt($header.css("paddingTop") + $header.css("paddingBottom") + $header.css("marginTop") + $header.css("marginBottom"));
    
      carouselHeight = $carousel.height() + parseInt($carousel.css("paddingTop") + $carousel.css("paddingBottom") + $carousel.css("marginTop") + $carousel.css("marginBottom"));

      $winHeight = ($(window).height()) + 10;

      maxHeightPanel = $winHeight - ((headerHeight + carouselHeight) + 10);
    
      $('.panels-display').height(maxHeightPanel);  
      $('.panels-photo').height(maxHeightPanel);
      $('.panel-description').height(maxHeightPanel);
      $('.panels-display nav').height(maxHeightPanel);
    
    
      //center panel
      //$('#container').hide();
    
      $(':rs-carousel').carousel('refresh');
      console.log( maxHeightPanel + " Refreshed");
  });



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
    
    
      //ZOOM
      $('#container').tilezoom({
  			xml: 'dest/Panel79a.xml',
  			mousewheel: true,
  			navigation: true,
  			zoomIn: '#plus',
  			zoomOut: '#minus',
  			goHome: '#home',
  			navigation: '#panel-tools li.display-tools'
  			//'#panel-tools'

  		});
		
		
  		//hover over carousel of panels will change image legend to active color.
  		$('.panel-item').hover(function(){
  		  $(this).find('.panel-name').addClass('hover');
  		}, function(){
  		  $(this).find('.panel-name').removeClass('hover');
  		});
		
		
  		//search
  		//.search-panels
		
		
  		//#search-panels
  		//.search-panels-icon
  		//.search-panels-close-icon
		
  		// $('#search-panels').show();
		
  			$('.search-panels').click(function(){
  			  $('#search-panels').toggle();
  			});
			
			
        // iOS viewport scaling bug fix, by @mathias, @cheeaun and @jdalton
      		(function(doc){var addEvent='addEventListener',type='gesturestart',qsa='querySelectorAll',scales=[1,1],meta=qsa in doc?doc[qsa]('meta[name=viewport]'):[];function fix(){meta.content='width=device-width,minimum-scale='+scales[0]+',maximum-scale='+scales[1];doc.removeEventListener(type,fix,true);}if((meta=meta[meta.length-1])&&addEvent in doc){fix();scales=[.25,1.6];doc[addEvent](type,fix,true);}}(document));

        //Drop-down touch friendly
        $( '#nav li:has(ul)' ).doubleTapToGo();




  });

})(jQuery);

