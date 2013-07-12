(function ($) {
 // (function($) {
 //  	$("#additionalImage").draggable({
 //  	    handle: ".modal-header"
 //  	});
 //  });
  // $('body').on('click', '#additional-image-link', function() {
  //   alert('clicked on #additional-image-link');
  //   //$("#additionalImage").dialog('open');
  //   $("#test-dialog").dialog('open');
  //   return false;
  // });
  // $('#additionalImage').modal({onShow: function (dialog) {
  // dialog.container.draggable();
  // }});
  // $('body').on('show', '#additionalImage', function(dialog) {
  //   dialog.container.draggable();
  // });

  $('body').on('click', "#additional-image-link", function() {
    $('#additionalImage').modal({
      show: true,
      onShow: function (dialog) {
        dialog.container.draggable()
      }});
    //$('#additionalImage').modal('show');
  });
})(jQuery);
