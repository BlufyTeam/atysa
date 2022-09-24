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
        url: '/user/take-second-level',
        type: "post",
        data: {id : $(this).attr('data-value')},
    }).done(function (res) {
      $.each(res, function(index,row){
        console.log(row);
        str+= '<div class="col-3"><label class="category-title"><input type="radio" name="cat2" value="'+ row['name'] +'" data-calory="'+ row['weight'] +'" data-ingredientName ="'+ row['name'] +'"  />'+ row['name'] +'</label></div>';
      })
      $(".category-level2-pictures ").append(str);
    }).fail(function (e) {
        console.log(e);
    });
}
(function($) {
    "use strict"; // Start of use strict

    // Tooltip
    

})(jQuery); // End of use strict