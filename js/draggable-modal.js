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
  $('#additionalImage').modal({onShow: function (dialog) {
  dialog.container.draggable();
  }});

})(jQuery);
