jQuery(document).ready(function($) {
  $(".main-menu .menu .menu-item").on("click", function() {
        $(".main-menu .menu .menu-item").removeClass("active");
        $(this).addClass("active");
    });

});