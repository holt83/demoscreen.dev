//Induced scope:
(function($) {
  $(document).ready(function() {
    //Show and hide loading screen
    $("#sidebar-first ul.menu a").click(function() {
      if ($("#demo-beep").length > 0) {
        $("#demo-beep").get(0).play();
      }
      $("#demo-loading").show();
      $("#demo-content").hide();
    });
  });
})(jQuery);

