// It will handle user interaction just for content, not panels. For example: revealing phonetics, search form, etc.

//Wrapping all in an anonymous self invoking function because Drupal is too delicate.

(function ($) {
    var $searchIcon = $('.search-panels-content');
    var $searchIconImg = $('.search-panels span');
    var $searchFlag = true;
    $searchIcon .click(function(){
      console.log("I am being clicked");
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
    });      
})(jQuery);