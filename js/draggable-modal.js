(function ($) {
 // (function($) {
  	//$("#additionalImage").draggable({
  	//    handle: ".modal-header"
  	//});
  //});
  $('#additional-image-link').click() {
    $("#additionalImage").dialog({
      height:140,
      model: true
    });
  }
})(jQuery);
