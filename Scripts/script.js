$(function () {
    /*
        Autor: Caio Henrique Mota Cuadra
        Data: 22/08/2025
    */
    var open = true;
    var windowSize = $(window)[0].innerWidth;
    var windowSize2 = (windowSize / 2) + 50;
    var targetSizeMenu = (windowSize < 400) ? windowSize2 : 250;
    var newWidth = $('body').width() - targetSizeMenu;
    $('#menu-button').click(function () {
        if (open) {
            $('#lista-menu').fadeOut();
            $('#menu-button').hide();
            $('#wrapper-content').hide();
            $.when(
                $('#menu-vertical').animate(
                    { 'width': '0', 'padding': '0' },
                    { duration: 'slow' }
                ).promise(),
                $('#content').animate(
                    { 'width': '100%', 'left': '0' },
                    { duration: 'slow' }
                ).promise()
            ).done(function () {
                setTimeout(() => {
                    $('#menu-vertical').css('display', 'none');
                    
                }, 100);
                    $('#menu-button').fadeIn();
                    $('#wrapper-content').fadeIn();
                open = false;
            });
        } else {
            $('#menu-button').hide();
            $('#menu-vertical').hide();
            $('#wrapper-content').hide();
            $.when(
                $('#menu-vertical').show().animate(
                    { 'width': targetSizeMenu + 'px' },
                    { duration: 'fast' }
                ).promise(),
                $('#content').animate(
                    { 'left': targetSizeMenu + 'px', 'width': newWidth },
                    { duration: 'slow' }
                ).promise()
            ).done(function () {
                $('#menu-button').fadeIn();
                $('#lista-menu').fadeIn();
                $('#wrapper-content').fadeIn();
                open = true;
            });
        }
    })
})