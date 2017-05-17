// Supports menu function when "hamburger" menu is used
(function () {
    var $body = $('body');
    $('.go-to-menu a').click(function(event) {
        $body.toggleClass('show-menu');
        return false;
    });
    $body.click(function() {
        $body.removeClass('show-menu');
    });
}());
