(function() {

    mobileMenu();

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