(function ($) {
  $('body').on('click', "#additional-image-link", function() {
    $('#additionalImage').modal('show').draggable();
  });
})(jQuery);
