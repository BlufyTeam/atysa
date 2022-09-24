/*
Author: Ali Alaei
Author URI: http://alialaei.ir
Version: 1.0
*/

function changeCategory(name){
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/products/get',
        type: "post",
        data: {categoryName : name},
    }).done(function (res) {
      $(".foods ").html(res);
    }).fail(function (e) {
        console.log(e);
    });
}
function addToBasket(form){
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/orders/updatebasket',
        type: "post",
        data: form,
    }).done(function (res) {
      $(".checkout ").html(res);
    }).fail(function (e) {
        console.log(e);
    });
}
function showBasket(){
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/orders/showbasket',
        type: "post",
    }).done(function (res) {
      $(".checkout ").html(res);
    }).fail(function (e) {
        console.log(e);
    });
}
function changeCount(type, productId){
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/orders/showbasket',
        type: "post",
    }).done(function (res) {
      $(".checkout ").html(res);
    }).fail(function (e) {
        console.log(e);
    });
}
(function($) {
    "use strict"; // Start of use strict

    // Tooltip
    

})(jQuery); // End of use strict