@extends('layouts.user') 
@section('header')
<link rel="stylesheet" type="text/css" href="/assets/libs/select2/select2.min.css">
@endsection
@section('content')
<div class="page-body">
  <div class="container-fluid">
      <div class="page-title">
          <div class="row">
              <div class="col-md-6 col-xs-12">
                  <h3>ساخت بشقاب جدید</h3>
              </div>
              <div class="col-md-6 col-xs-12" style="padding-top: 15px">
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                          <a href="/">
                              <i data-feather="home"></i
                          ></a>
                      </li>
                      <li class="breadcrumb-item">ساخت بشقاب جدید</li>
                  </ol>
              </div>
          </div>
      </div>
  </div>
<form method="post" action="/user/create-plate" >
  @csrf
<div class="row text-center">
  <div class="col-xs-12 col-md-9 d-flex justify-content-center">
    <div class="card w-100">
      <h5 class="card-header">اطلاعات بشقاب</h5>
      <div class="card-body bg-light">
        <div class="form-group text-right">
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
      <h5 class="card-header" style="text-align: center">مجموع کالری بشقاب</h5>
      <div class="card-body bg-light "  style="text-align: center">
        <div class="form-group text-right onlineCalory" style="font-size: 25px">
          0
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
                <option data-val="{{$row2['name']}}" data-calory="{{$row2['weight']}}" value="{{$row2['name']}}">{{$row2['name']}} - {{$row2['weight']}} کالری</option>
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
    <button class="btn btn-success align-self-center d-none">
      + افزودن بشقاب جدید
    </button>
  </div>
  <div class="col-12 d-flex justify-content-center">
    <div class="card w-100">
      <h5 class="card-header">خلاصه بشقاب</h5>
      <div class="card-body px-5">
        <div id="summary-items"></div>
        <div id="total" class="justify-content-between align-items-center mb-5 py-3 px-2 rounded" style="display: none">
          <div class="ingredients-title" style="font-weight: bold">
            {{-- <img
              src="/main/images/meat-steak.png"
              alt=""
              class="summary-ingre ml-2"
            /> --}}
            مجموع کالری
          </div>
          <div class="ingredients-calory"></div>
          <input type="hidden" name="totalCalory"/>
        </div>
        <div class="d-flex justify-content-around">
            <button id="add-final-dish" class="btn btn-success">ذخیره بشقاب شما</button>
          <button type="button" id="remove-final-dish" class="btn btn-danger">حذف آیتم ها</button></div>
      </div>
    </div>
  </div>
</div>
</form>
@endsection
@section('footer')
<script src="/assets/libs/select2/select2.min.js" ></script>
<script>
  $(document).ready(function(){
    var onlineCalory = 0;
    var element='';
    $('select').change(function(){
      onlineCalory = 0;
      element = '';
      $('select > option:selected').each(function() {
          onlineCalory+=parseInt($(this).attr('data-calory'));
          $('.onlineCalory').text(onlineCalory);
          element +=
              '<div class="d-flex justify-content-between align-items-center">' +
              '<div class="ingredients-title">' +
                $(this).attr('data-val') +
              "</div>" +
              '<div class="ingredients-calory">' +
                $(this).attr('data-calory') +
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
      $("#total .ingredients-calory").text(onlineCalory);
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
