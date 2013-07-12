(function ($) {
 // (function($) {
  	//$("#additionalImage").draggable({
  	//    handle: ".modal-header"
  	//});
  //});
  $('#additional-image-link').click(function() {
    alert('clicked on #additional-image-link');
    $("#additionalImage").dialog({
      height:140,
      model: true
    });
  });
})(jQuery);
