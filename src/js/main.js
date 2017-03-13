(function($) {
  $(document).ready(function() {
    $('nav .page_item').addClass('nav-item');
    $('nav .current_page_item').addClass('active');
    $('.nav-item>a').addClass('nav-link');

    if (usingIE()) {
      $("#IE-modal").modal({
        keyboard: false,
        backdrop: 'static',
        show: true
      });
      $("#IE-vnum").html(usingIE());
      return;
    }

    if (/Chrome/.test(navigator.userAgent))
      $('#use-chrome').hide();

    var s = skrollr.init({
      constants: {
        box: '100p'
      },
      mobileCheck: function() { return false }
    });
    
    $('.sticky').fixedsticky();
  });
})(jQuery);

function usingIE() {
    var ua = window.navigator.userAgent;

    var msie = ua.indexOf('MSIE ');
    if (msie > 0) {
        return parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
    }

    var trident = ua.indexOf('Trident/');
    if (trident > 0) {
        var rv = ua.indexOf('rv:');
        return parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10);
    }

    var edge = ua.indexOf('Edge/');
    if (edge > 0) {
       return parseInt(ua.substring(edge + 5, ua.indexOf('.', edge)), 10);
    }

    return false;
}