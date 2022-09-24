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
      
      $(".foods ").append(str);
    }).fail(function (e) {
        console.log(e);
    });
}
(function($) {
    "use strict"; // Start of use strict

    // Tooltip
    

})(jQuery); // End of use strict