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
			
			$('a.toggle-logo').mouseover(function(e){
				$('.logo h1 a').css("background" , "url('../images/mnemosyne-phonetics-logo.png') no-repeat 0 0");
				e.preventDefault();
			});
			
			$('a.toggle-logo').mouseout(function(e){
					$('.logo h1 a').css("background" , "none");
				e.preventDefault();
			});

    });      
})(jQuery);