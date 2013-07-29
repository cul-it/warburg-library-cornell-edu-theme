// It will handle user interaction just for content, not panels. For example: revealing phonetics, search form, etc.

//Wrapping all in an anonymous self invoking function because Drupal is too delicate.

(function ($) {

		//Display/Hide search form
		
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
      };

			//Display/Hide phonetic for logo
			
			//$('a.toggle-logo').hover(function(e){
				//$('.logo h1 a').toggleClass('phonetic')
				//e.preventDefault();
			//});

            //Drop-down touch friendly
        $( '#nav li:has(ul)' ).doubleTapToGo();

    });      
})(jQuery);