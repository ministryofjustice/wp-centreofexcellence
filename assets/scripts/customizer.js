(function($) {
  // Site title
  wp.customize('blogname', function(value) {
    value.bind(function(to) {
      $('#logo h1').text(to);
    });
  });
})(jQuery);
