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
function changeMyCategory(){
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/products/getmine',
        type: "post",
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
function changeCategoryForDefault(name){
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/takeproducts',
        type: "get",
        data: name: name,
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
        url: '/orders/updatecount',
        type: "post",
        data: {type: type, productId: productId}
    }).done(function (res) {
      $(".checkout ").html(res);
    }).fail(function (e) {
        console.log(e);
    });
}
$('body').on('click', '.removeAddress', function(){
    var addressId = $(this).attr('data-id');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/user/address/remove',
        type: "post",
        data: {addressId: addressId}
    }).done(function (res) {
        window.location.reload();
    }).fail(function (e) {
        console.log(e);
    });
})
$('body').on('click', '.showMore', function(){
    var orderId = $(this).attr('data-id');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/user/orders/showmore',
        type: "post",
        data: {orderId: orderId}
    }).done(function (res) {
        $(".moreData ").html(res);
    }).fail(function (e) {
        console.log(e);
    });
});
(function($) {
    "use strict"; // Start of use strict

    // Tooltip
    

})(jQuery); // End of use strict