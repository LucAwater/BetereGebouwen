(function() {

    mobileMenu();
    closedCookie = Cookies.get("popupClosed"),
    helpPopupTimeout(closedCookie);
})();

function mobileMenu() {
    var menu = $('.mobile-menu');
    var menuTrigger = menu.find('.mobile-menu__trigger');
    var menuList = menu.find('.mobile-menu__list');

    menuTrigger.click(function () {
        menu.toggleClass('is-active');
        menuList.slideToggle(300);
    });
}
// Can I Help you popup in Master.
var helpTimeout;

function helpPopupTimeout(closedCookie) {
    var helpPopup = ".help-popup";
    if (closedCookie !== 'true') { // If no cookie was found, then set timeout.
        helpTimeout = setTimeout(function () {
            $('.help-popup').fadeIn();
            $('.layover').fadeIn();
        }, 15000); // 15 Seconds default.
    }
}
function closeHelpPopup() {
    clearTimeout(helpTimeout);
    $('.help-popup').fadeOut();
    $('.layover').hide();
    // On close: store in Cookie and check if exists
    Cookies.set('popupClosed', 'true', { expires: 60 });
}
$('.btn-signup').on('click', function(e){
  e.preventDefault();
  clearTimeout(helpTimeout);
  $('.help-popup').hide();
  $('.layover').hide();
  // On close: store in Cookie and check if exists
  Cookies.set('popupClosed', 'true', { expires: 60 });
  $(this).closest("form").submit();
});

// function callMeBack(e) {
//     var t = {
//         RequestTelNo: $("input[name=telCallMeBack]").val()
//     }
//       , r = $(".help-popup__finish")
//       , a = $(".help-popup__content")
//       , o = $(".help-popup__error");
//     event.preventDefault(),
//     $.post(e, t).done(function(e) {
//         a.fadeOut(),
//         r.fadeIn()
//     }).fail(function() {
//         a.fadeOut(),
//         o.fadeIn()
//     }).always(function() {})
// }
