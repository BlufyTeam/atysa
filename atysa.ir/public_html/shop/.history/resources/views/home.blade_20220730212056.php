@extends('layouts.main')
@section('style')
    <link rel="stylesheet" href="/main/css/persian-datepicker.min.css"/>
@endsection
@section('content')
<div class="container" style="direction: ltr">
    <div class="cat-slider">
        @foreach($categories as $category)
            <div class="cat-item px-1 py-3">
                <a class="categoryrClick bg-white rounded d-block p-2 text-center shadow-sm" href="#" data-name="{{$category->name}}">
                    <img alt="#" src="/uploads/categories/{{$category->image}}" class="img-fluid mb-2">
                    <p class="m-0 small">{{$category->name}}</p>
                </a>
            </div>
        @endforeach
        @if(Auth::check())
            <div class="cat-item px-1 py-3">
                <a class="ownCategoryClick bg-white rounded d-block p-2 text-center shadow-sm" href="#" data-name="{{$category->name}}">
                    <img alt="#" src="/main/img/user/1.jpg" class="img-fluid mb-2">
                    <p class="m-0 small">غذاهای شخصی</p>
                </a>
            </div>
        @endif
    </div>
</div>
<div class="container position-relative">
    <div class="row">
        <div class="col-md-8 pt-3 foods">
        </div>
        <div class="col-md-4 pt-3 checkout">
            <div class="osahan-cart-item rounded rounded shadow-sm overflow-hidden bg-white sticky_sidebar">
                <div class="d-flex border-bottom osahan-cart-item-profile bg-white p-3">
                    <div class="d-flex flex-column">
                        <h6 class="mb-1 font-weight-bold">سبد خرید</h6>
                    </div>
                </div>
                <div class="bg-white border-bottom py-2">
                </div>
                <div class="bg-white p-3 py-3 border-bottom clearfix">
                    {{-- <div class="input-group-sm mb-2 input-group">
                        <input placeholder="Enter promo code" type="text" class="form-control">
                        <div class="input-group-append"><button type="button" class="btn btn-primary"><i class="feather-percent"></i> APPLY</button></div>
                    </div> --}}
                    <div class="mb-0 input-group">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="feather-message-square"></i></span></div>
                        <textarea placeholder="توضیحاتی اگر دارید درج بفرمائید..." aria-label="With textarea" class="form-control"></textarea>
                    </div>
                </div>
                <div class="bg-white p-3 clearfix border-bottom">
                    <p class="mb-1">تعداد کل <span class="float-right text-dark">0</span></p>
                    <p class="mb-1">مبلغ سفارش <span class="float-right text-dark">0</span></p>
                    <p class="mb-1">هزینه ارسال<span class="text-info ml-1"><i class="feather-info"></i></span><span class="float-right text-dark">0</span></p>
                </div>
                <div class="p-3">
                    <a class="btn btn-success btn-block btn-lg" href="successful.html">پرداخت<i class="feather-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- extras modal -->
<div class="modal fade" id="extras" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">چه روزی ارسال شود؟</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form class="addToBasketForm">
                    <input type="hidden" name="productId" value=""/>
                    <!-- extras body -->
                    <div class="recepie-body">
                        <div class="form-group">
                            <label for="day" class="small font-weight-bold">تاریخ ارسال این کالا</label>
                            <input type="text" class="form-control" name="day" id="day" placeholder="تاریخ رسیدن سفارش">
                        </div>
                        <div class="container position-relative">
                            <img alt="#" src="" class="restaurant-pic product-image">
                            <div class="pt-3">
                                <h2 class="font-weight-bold product-name"></h2>
                                <p class="m-0 product-description"></p>
                                {{-- <div class="rating-wrap d-flex align-items-center mt-2">
                                    <ul class="rating-stars list-unstyled">
                                        <li>
                                            <i class="feather-star text-warning"></i>
                                            <i class="feather-star text-warning"></i>
                                            <i class="feather-star text-warning"></i>
                                            <i class="feather-star text-warning"></i>
                                            <i class="feather-star"></i>
                                        </li>
                                    </ul>
                                    <p class="label-rating text-white ml-2 small"> (245 Reviews)</p>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer p-0 border-0">
                <div class="col-6 m-0 p-0">
                    <button type="button" class="btn border-top btn-lg btn-block" data-dismiss="modal">حذف کردن</button>
                </div>
                <div class="col-6 m-0 p-0">
                    <button type="button" class="btn btn-primary btn-lg btn-block addToBasket">ثبت کردن</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script src="/main/js/persian-datepicker.min.js"></script>
    <script src="/main/js/persian-date.min.js"></script>
    <script>
        $(document).ready(function(e){
            $("#day").pDatepicker({
                minDate: new persianDate().add('day', 3).valueOf(),
                initialValue: false,
                format: 'YYYY/MM/DD',
                beforeShowDay: function(date) {
                    var day = date.getDay();
                    console.log(day);
                    return [(day != 1)];
                }
            });
            var mainName = '{{$categories[0]->name}}';
            changeCategory(mainName);
            showBasket(mainName);

            $('body').on('click','.categoryrClick',function(){
                var name = $(this).attr('data-name');
                changeCategory(name);
            });
            $('body').on('click','.ownCategoryClick',function(){
                changeMyCategory();
            });
            
            $('body').on('click','.addToBasketButton', function(){
                var productId = $(this).attr('data-id');
                $('.product-image').attr('src', $(this).attr('data-image'));
                $('.product-name').html($(this).attr('data-name'));
                $('.product-description').html($(this).attr('data-description'));
                $('input:hidden[name="productId"]').val(productId);
            });
            $('body').on('click','.addToBasket',function(){
                addToBasket($('.addToBasketForm').serialize());
                $('#extras').modal('toggle');
            });
            $('body').on('click','.changeCount',function(){
                var type = $(this).attr('data-type');
                var productId = $(this).attr('data-productId');
                changeCount(type, productId);
            });
        });
    </script>
@endsection