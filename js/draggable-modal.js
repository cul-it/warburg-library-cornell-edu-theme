(function ($) {
 // (function($) {
  	//$("#additionalImage").draggable({
  	//    handle: ".modal-header"
  	//});
  //});
  $('body').on('click', '#additional-image-link', function() {
    alert('clicked on #additional-image-link');
    $("#additionalImage").dialog('open');
    return false;
  });
})(jQuery);
