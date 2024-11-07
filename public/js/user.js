$(document).ready(function() {
    $('button.order__info--detail').click(function() {
        $(this).siblings('div.detail').css('display', 'block')
    })
})