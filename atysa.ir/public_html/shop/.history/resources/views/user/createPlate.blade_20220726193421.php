@extends('layouts.main') 
@section('style')
<link rel="stylesheet" type="text/css" href="/assets/libs/select2/select2.min.css">
@endsection
@section('content')
<div class="offer-section py-4">
  <div class="container position-relative">
      {{-- <img alt="#" src="/main/img/trending1.png" class="restaurant-pic"> --}}
      <div class="pt-3 text-white">
          <h2 class="font-weight-bold">بشقاب های شخصی</h2>
      </div>
  </div>
</div>
<div class="container createFoodSection">
  <div class="osahan-cart-item mb-3 rounded shadow-sm bg-white overflow-hidden">
    <div class="osahan-cart-item-profile bg-white p-3">
        <div class="d-flex flex-column">
            <h6 class="mb-3 font-weight-bold">بشقاب های فعلی</h6>
            <div class="row">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <td>
                        نام بشقاب
                      </td>
                      <td>
                        قیمت
                      </td>
                      <td>
                        کالری
                      </td>
                      <td>
                        حذف
                      </td>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach(Auth::user()->products as $product)
                    <tr>
                      <td>
                        {{$product['name']}}
                      </td>
                      <td>
                        {{$product['price']}} تومان
                      </td>
                      <td>
                        {{$product['calory']}}
                      </td>
                      <td>
                        <form action="/user/plate/delete" method="post">
                          @csrf
                          <input type="hidden" name="productId" value="{{$product['id']}}">
                          <button type="submit" class="btn btn-outline-secondary btn-sm"><i class="feather-trash"></i></button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
  <div class="accordion mb-3 rounded shadow-sm bg-white overflow-hidden" id="accordionExample">
    <div class="osahan-card bg-white border-bottom overflow-hidden">
        <div class="osahan-card-header" id="headingOne">
            <h2 class="mb-0">
                <button class="d-flex p-3 align-items-center btn btn-link w-100" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">ساخت بشقاب جدید<i class="feather-chevron-down ml-auto"></i></button>
            </h2>
        </div>
        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="osahan-card-body border-top p-3">
              <form method="post" action="/user/create-plate" >
                @csrf
                <div class="row text-center">
                  <div class="col-xs-12 col-md-9 d-flex justify-content-center">
                    <div class="card w-100">
                      <h5 class="card-header">اطلاعات بشقاب</h5>
                      <div class="card-body bg-light">
                        <div class="form-group text-left">
                          <label for="plateName">نام بشقاب:</label>
                          <input
                            type="text"
                            name="plateName"
                            class="form-control"
                            placeholder="نام دلخواه خود را وارد نمایید"
                            id="plateName"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-12 col-md-3 d-flex justify-content-center">
                    <div class="card w-100">
                      <h5 class="card-header" style="text-align: center">مجموع</h5>
                      <div class="card-body bg-light "  style="text-align: center">
                        <div class="form-group text-right " style="font-size: 25px">
                          <div class="col-md-12" style="font-size: 12px; text-align:center!important">
                              مجموع کالری <div class="onlineCalory"></div>
                          </div>
                          <div class="col-md-12" style="font-size: 12px; text-align:center!important">
                            مجموع قیمت <div class="onlinePrice"></div>
                        </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 d-flex justify-content-center">
                    <div class="card w-100">
                      {{-- <h5 class="card-header">اطلاعات بشقاب</h5> --}}
                      <div class="card-body bg-light">
                        <h6>انتخاب گروه غذایی :</h6>
                        <div class="category-level1-pictures row mt-4" style="text-align: center">
                          @foreach($materials as $key=>$row)
                          <div class="col-md-2 col-xs-12">
                            {{$row->name}}
                            <select multiple name="materials[{{$key}}][]" class="form-control select-{{$key}}" data-maximum-selection-length="{{$row->countOfSelection}}">
                              @foreach($row->materialChilds as $row2)
                                <option data-val="{{$row2['name']}}" data-price="{{$row2['price']}}" data-calory="{{$row2['weight']}}" value="{{$row2['name']}}">{{$row2['name']}} - {{$row2['weight']}} کالری</option>
                              @endforeach
                            </select>
                            {{-- <button disabled class="btn btn-success mt-5 add-ingredients" data-numberOfSelect="{{$key}}">
                              + افزودن به بشقاب
                            </button> --}}
                            </label>
                          </div>
                          @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
                    {{-- <button class="btn btn-success align-self-center d-none">
                      + افزودن بشقاب جدید
                    </button> --}}
                  </div>
                  <div class="col-12 d-flex justify-content-center">
                    <div class="card w-100">
                      <h5 class="card-header">خلاصه بشقاب</h5>
                      <div class="card-body px-5">
                        <div id="summary-items"></div>
                        <div id="total" class="justify-content-between align-items-center mb-5 py-3 px-2 rounded" style="display: none">
                          <div class="ingredients-title" style="font-weight: bold">
                            مجموع
                          </div>
                          <div class="ingredients-calory"></div>
                          <div class="ingredients-price"></div>
                          <input type="hidden" name="totalCalory"/>
                          <input type="hidden" name="totalPrice"/>
                        </div>
                        <div class="d-flex justify-content-around">
                            <button id="add-final-dish" class="btn btn-success">ذخیره بشقاب شما</button>
                          <button type="button" id="remove-final-dish" class="btn btn-danger">حذف آیتم ها</button></div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script src="/assets/libs/select2/select2.min.js" ></script>
<script>
  $(document).ready(function(){
    var onlineCalory = 0;
    var onlinePrice  = 0;
    var element='';
    $('select').change(function(){
      onlineCalory = 0;
      onlinePrice  = 0;
      element = '';
      $('select > option:selected').each(function() {
          onlineCalory+=parseInt($(this).attr('data-calory'));
          onlinePrice+=parseInt($(this).attr('data-price'));
          $('.onlineCalory').text(onlineCalory+' تومان');
          $('.onlinePrice').text(onlinePrice+' تومان');
          element +=
              '<div class="d-flex justify-content-between align-items-center">' +
              '<div class="ingredients-title">' +
                $(this).attr('data-val') +
              "</div>" +
              '<div class="ingredients-calory">کالری : ' +
                $(this).attr('data-calory') + 
              "</div>" +
              '<div class="ingredients-price">قیمت : ' +
                $(this).attr('data-price') + ' تومان' +
              "</div>" +
              "</div>" +
              "<hr />";
      });
      @if(Auth::user()->calory)
        var myCalory = {{Auth::user()->calory}}
        if(onlineCalory < myCalory){
          $('.onlineCalory').css('color','green');
        }else{
          $('.onlineCalory').css('color','red');
          alert('کالری این غذا بیشتر از کالری درخواستی شما می باشد.');
        }
      @endif
      $("#summary-items").html(element);
      $("#total").css("display", "flex");
      $("input[name='totalCalory']").val(onlineCalory);
      $("#total .ingredients-calory").text('کالری : '+onlineCalory);
      $("input[name='totalPrice']").val(onlinePrice);
      $("#total .ingredients-price").text('قیمت : '+onlinePrice+ ' تومان');
    });
    $('select').select2({
      language: {
        // You can find all of the options in the language files provided in the
        // build. They all must be functions that return the string that should be
        // displayed.
          maximumSelected: function (e) {
              var t = "شما فقط می توانید " + e.maximum + " آیتم انتخاب نمایید";
              return t ;
          }
      }
    });
  });
    function setTotalColor(){
      var defaultCalory = parseInt( $('#maxDailyCalory').text());
      var calory = parseInt($('#total .ingredients-calory').text());
      if(calory > defaultCalory){
        $('#total').removeAttr('class').addClass('justify-content-between align-items-center mb-5 py-3 px-2 rounded over-calory');
      }else if(calory <= defaultCalory){
        $('#total').removeAttr('class').addClass('justify-content-between align-items-center mb-5 py-3 px-2 rounded below-calory'); 
      }
    }
</script>
<script>
  
function summaryElements() {
  var element = "";
  var total = "";
  var caloryCounter = 0;
  $.each(JSON.parse(localStorage.getItem("dish")), function (key, item) {
    caloryCounter += parseInt(item.calory);
    element +=
      '<div class="d-flex justify-content-between align-items-center">' +
      '<div class="ingredients-title">' +
      item.title +
      '<input type="hidden" name="elementName[]" value="' + item.title + '" />'+
      "</div>" +
      '<div class="ingredients-calory">' +
      '<input type="hidden" name="elementCalory[]" value="' + item.calory + '" />'+
      item.calory +
      "</div>" +
      "</div>" +
      "<hr />";
  });
  element += '<input type="hidden" name="totalCalory" value="' + caloryCounter + '" />';
  $("#summary-items").html(element);
  $("#total").css("display", "flex");
  $("#total .ingredients-calory").text(caloryCounter);
  console.log(caloryCounter);
}
function summaryUpdate(data) {
  alert('ماده اولیه افزوده شد');
  if (
    localStorage.getItem("dish") &&
    localStorage.getItem("dish") != "[]"
  ) {
    var dish = JSON.parse(localStorage.getItem("dish"));
    dish.push(data);
    localStorage.setItem("dish", JSON.stringify(dish));
  } else {
    var arr = [];
    arr.push(data);
    localStorage.setItem("dish", JSON.stringify(arr));
  }
  summaryElements();
}
$(document).ready(function () {
   
  summaryElements();
  setTotalColor();
  
$('body').on("change", "input[name='cat2']", function(){
    $('.category-level2-pictures  .category-title').removeClass("active-material");
      $(this).parent().addClass('active-material');
})
  $("body").on("change", "input[name='cat1']", function () {
      $('.level2-box').css('display','block');
      $('.category-level2-pictures ').empty();
      $('.category-title').removeClass("active-material");
      $(this).parent().addClass('active-material');
    var str = "";
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
  });
  $("#add-ingredients").click(function (event) {
    $('.category-level1-pictures  .category-title').removeClass("active-material");
    event.preventDefault();
  //   console.log($("input[name='plateName']").val())
    if ($("input[name='cat2']:checked").length != 0) {
      data = {
        title: $("input[name='cat2']:checked").attr(
          "data-ingredientName"
        ),
        calory: $("input[name='cat2']:checked").attr("data-calory"),
        parent: $("input[name='cat2']:checked").attr("data-parent"),
      };

      summaryUpdate(data);
      summaryElements();
      setTotalColor();
      $(".category-level2-pictures ").empty();
    }
  });
  $("#add-final-dish").click(function (){
      
      var finalData = {
          "name" :$("input[name='plateName']").val(),
          "calory" : caloryCounter,
      }
      console.log(finalData)
      // var dish = JSON.parse(localStorage.getItem('dish'))
      $.getJSON("meals.json", function (data) {
          
          // console.log(data);
          $.each(data, function(key,value){
              console.log(value);
              value.push(finalData);
              console.log()
          })
      })
  })
  $("#remove-final-dish").click(function(){
      location.reload();
  })
});
</script>
@endsection
