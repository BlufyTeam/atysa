@extends('layouts.main')

@section('content')
{{-- <div class="container">
    <div class="cat-slider slick-initialized slick-slider"><button class="slick-prev slick-arrow" aria-label="Previous" type="button" style="">Previous</button>
        <div class="slick-list draggable"><div class="slick-track" style="opacity: 1; width: 3666px; transform: translate3d(-1128px, 0px, 0px);"><div class="cat-item px-1 py-3 slick-slide slick-cloned" data-slick-index="-8" aria-hidden="true" style="width: 141px;" tabindex="-1">
            <a class="bg-white rounded d-block p-2 text-center shadow-sm" href="trending.html" tabindex="-1">
                <img alt="#" src="/main/img/icons/Pizza.png" class="img-fluid mb-2">
                <p class="m-0 small">Pizza</p>
            </a>
        </div><div class="cat-item px-1 py-3 slick-slide slick-cloned" data-slick-index="-7" aria-hidden="true" style="width: 141px;" tabindex="-1">
            <a class="bg-white rounded d-block p-2 text-center shadow-sm" href="trending.html" tabindex="-1">
                <img alt="#" src="/main/img/icons/Burger.png" class="img-fluid mb-2">
                <p class="m-0 small">Burger</p>
            </a>
        </div><div class="cat-item px-1 py-3 slick-slide slick-cloned" data-slick-index="-6" aria-hidden="true" style="width: 141px;" tabindex="-1">
            <a class="bg-white rounded d-block p-2 text-center shadow-sm" href="trending.html" tabindex="-1">
                <img alt="#" src="/main/img/icons/Sandwich.png" class="img-fluid mb-2">
                <p class="m-0 small">Sandwich</p>
            </a>
        </div><div class="cat-item px-1 py-3 slick-slide slick-cloned" data-slick-index="-5" aria-hidden="true" style="width: 141px;" tabindex="-1">
            <a class="bg-white rounded d-block p-2 text-center shadow-sm" href="trending.html" tabindex="-1">
                <img alt="#" src="/main/img/icons/Coffee.png" class="img-fluid mb-2">
                <p class="m-0 small">Coffee</p>
            </a>
        </div><div class="cat-item px-1 py-3 slick-slide slick-cloned" data-slick-index="-4" aria-hidden="true" style="width: 141px;" tabindex="-1">
            <a class="bg-white rounded d-block p-2 text-center shadow-sm" href="trending.html" tabindex="-1">
                <img alt="#" src="/main/img/icons/Steak.png" class="img-fluid mb-2">
                <p class="m-0 small">Steak</p>
            </a>
        </div><div class="cat-item px-1 py-3 slick-slide slick-cloned" data-slick-index="-3" aria-hidden="true" style="width: 141px;" tabindex="-1">
            <a class="bg-white rounded d-block p-2 text-center shadow-sm" href="trending.html" tabindex="-1">
                <img alt="#" src="/main/img/icons/ColaCan.png" class="img-fluid mb-2">
                <p class="m-0 small">ColaCan</p>
            </a>
        </div><div class="cat-item px-1 py-3 slick-slide slick-cloned" data-slick-index="-2" aria-hidden="true" style="width: 141px;" tabindex="-1">
            <a class="bg-white rounded d-block p-2 text-center shadow-sm" href="trending.html" tabindex="-1">
                <img alt="#" src="/main/img/icons/Breakfast.png" class="img-fluid mb-2">
                <p class="m-0 small">Breakfast</p>
            </a>
        </div><div class="cat-item px-1 py-3 slick-slide slick-cloned" data-slick-index="-1" aria-hidden="true" style="width: 141px;" tabindex="-1">
            <a class="bg-white rounded d-block p-2 text-center shadow-sm" href="trending.html" tabindex="-1">
                <img alt="#" src="/main/img/icons/Salad.png" class="img-fluid mb-2">
                <p class="m-0 small">Salad</p>
            </a>
        </div><div class="cat-item px-1 py-3 slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" style="width: 141px;" tabindex="0">
            <a class="bg-white rounded d-block p-2 text-center shadow-sm" href="trending.html" tabindex="0">
                <img alt="#" src="/main/img/icons/Fries.png" class="img-fluid mb-2">
                <p class="m-0 small">Fries</p>
            </a>
        </div><div class="cat-item px-1 py-3 slick-slide slick-active" data-slick-index="1" aria-hidden="false" style="width: 141px;" tabindex="0">
            <a class="bg-white rounded d-block p-2 text-center shadow-sm" href="trending.html" tabindex="0">
                <img alt="#" src="/main/img/icons/Pizza.png" class="img-fluid mb-2">
                <p class="m-0 small">Pizza</p>
            </a>
        </div><div class="cat-item px-1 py-3 slick-slide slick-active" data-slick-index="2" aria-hidden="false" style="width: 141px;" tabindex="0">
            <a class="bg-white rounded d-block p-2 text-center shadow-sm" href="trending.html" tabindex="0">
                <img alt="#" src="/main/img/icons/Burger.png" class="img-fluid mb-2">
                <p class="m-0 small">Burger</p>
            </a>
        </div><div class="cat-item px-1 py-3 slick-slide slick-active" data-slick-index="3" aria-hidden="false" style="width: 141px;" tabindex="0">
            <a class="bg-white rounded d-block p-2 text-center shadow-sm" href="trending.html" tabindex="0">
                <img alt="#" src="/main/img/icons/Sandwich.png" class="img-fluid mb-2">
                <p class="m-0 small">Sandwich</p>
            </a>
        </div><div class="cat-item px-1 py-3 slick-slide slick-active" data-slick-index="4" aria-hidden="false" style="width: 141px;" tabindex="0">
            <a class="bg-white rounded d-block p-2 text-center shadow-sm" href="trending.html" tabindex="0">
                <img alt="#" src="/main/img/icons/Coffee.png" class="img-fluid mb-2">
                <p class="m-0 small">Coffee</p>
            </a>
        </div><div class="cat-item px-1 py-3 slick-slide slick-active" data-slick-index="5" aria-hidden="false" style="width: 141px;" tabindex="0">
            <a class="bg-white rounded d-block p-2 text-center shadow-sm" href="trending.html" tabindex="0">
                <img alt="#" src="/main/img/icons/Steak.png" class="img-fluid mb-2">
                <p class="m-0 small">Steak</p>
            </a>
        </div><div class="cat-item px-1 py-3 slick-slide slick-active" data-slick-index="6" aria-hidden="false" style="width: 141px;" tabindex="0">
            <a class="bg-white rounded d-block p-2 text-center shadow-sm" href="trending.html" tabindex="0">
                <img alt="#" src="/main/img/icons/ColaCan.png" class="img-fluid mb-2">
                <p class="m-0 small">ColaCan</p>
            </a>
        </div><div class="cat-item px-1 py-3 slick-slide slick-active" data-slick-index="7" aria-hidden="false" style="width: 141px;" tabindex="0">
            <a class="bg-white rounded d-block p-2 text-center shadow-sm" href="trending.html" tabindex="0">
                <img alt="#" src="/main/img/icons/Breakfast.png" class="img-fluid mb-2">
                <p class="m-0 small">Breakfast</p>
            </a>
        </div><div class="cat-item px-1 py-3 slick-slide" data-slick-index="8" aria-hidden="true" style="width: 141px;" tabindex="-1">
            <a class="bg-white rounded d-block p-2 text-center shadow-sm" href="trending.html" tabindex="-1">
                <img alt="#" src="/main/img/icons/Salad.png" class="img-fluid mb-2">
                <p class="m-0 small">Salad</p>
            </a>
        </div><div class="cat-item px-1 py-3 slick-slide slick-cloned" data-slick-index="9" aria-hidden="true" style="width: 141px;" tabindex="-1">
            <a class="bg-white rounded d-block p-2 text-center shadow-sm" href="trending.html" tabindex="-1">
                <img alt="#" src="/main/img/icons/Fries.png" class="img-fluid mb-2">
                <p class="m-0 small">Fries</p>
            </a>
        </div><div class="cat-item px-1 py-3 slick-slide slick-cloned" data-slick-index="10" aria-hidden="true" style="width: 141px;" tabindex="-1">
            <a class="bg-white rounded d-block p-2 text-center shadow-sm" href="trending.html" tabindex="-1">
                <img alt="#" src="/main/img/icons/Pizza.png" class="img-fluid mb-2">
                <p class="m-0 small">Pizza</p>
            </a>
        </div><div class="cat-item px-1 py-3 slick-slide slick-cloned" data-slick-index="11" aria-hidden="true" style="width: 141px;" tabindex="-1">
            <a class="bg-white rounded d-block p-2 text-center shadow-sm" href="trending.html" tabindex="-1">
                <img alt="#" src="/main/img/icons/Burger.png" class="img-fluid mb-2">
                <p class="m-0 small">Burger</p>
            </a>
        </div><div class="cat-item px-1 py-3 slick-slide slick-cloned" data-slick-index="12" aria-hidden="true" style="width: 141px;" tabindex="-1">
            <a class="bg-white rounded d-block p-2 text-center shadow-sm" href="trending.html" tabindex="-1">
                <img alt="#" src="/main/img/icons/Sandwich.png" class="img-fluid mb-2">
                <p class="m-0 small">Sandwich</p>
            </a>
        </div><div class="cat-item px-1 py-3 slick-slide slick-cloned" data-slick-index="13" aria-hidden="true" style="width: 141px;" tabindex="-1">
            <a class="bg-white rounded d-block p-2 text-center shadow-sm" href="trending.html" tabindex="-1">
                <img alt="#" src="/main/img/icons/Coffee.png" class="img-fluid mb-2">
                <p class="m-0 small">Coffee</p>
            </a>
        </div><div class="cat-item px-1 py-3 slick-slide slick-cloned" data-slick-index="14" aria-hidden="true" style="width: 141px;" tabindex="-1">
            <a class="bg-white rounded d-block p-2 text-center shadow-sm" href="trending.html" tabindex="-1">
                <img alt="#" src="/main/img/icons/Steak.png" class="img-fluid mb-2">
                <p class="m-0 small">Steak</p>
            </a>
        </div><div class="cat-item px-1 py-3 slick-slide slick-cloned" data-slick-index="15" aria-hidden="true" style="width: 141px;" tabindex="-1">
            <a class="bg-white rounded d-block p-2 text-center shadow-sm" href="trending.html" tabindex="-1">
                <img alt="#" src="/main/img/icons/ColaCan.png" class="img-fluid mb-2">
                <p class="m-0 small">ColaCan</p>
            </a>
        </div><div class="cat-item px-1 py-3 slick-slide slick-cloned" data-slick-index="16" aria-hidden="true" style="width: 141px;" tabindex="-1">
            <a class="bg-white rounded d-block p-2 text-center shadow-sm" href="trending.html" tabindex="-1">
                <img alt="#" src="/main/img/icons/Breakfast.png" class="img-fluid mb-2">
                <p class="m-0 small">Breakfast</p>
            </a>
        </div><div class="cat-item px-1 py-3 slick-slide slick-cloned" data-slick-index="17" aria-hidden="true" style="width: 141px;" tabindex="-1">
            <a class="bg-white rounded d-block p-2 text-center shadow-sm" href="trending.html" tabindex="-1">
                <img alt="#" src="/main/img/icons/Salad.png" class="img-fluid mb-2">
                <p class="m-0 small">Salad</p>
            </a>
        </div></div></div>
        
        
        
        
        
        
        
        
    <button class="slick-next slick-arrow" aria-label="Next" type="button" style="">Next</button></div>
</div> --}}
<div class="container position-relative">
    <div class="row">
        <div class="col-md-8 pt-3">
            <div class="shadow-sm rounded bg-white mb-3 overflow-hidden">
                <div class="d-flex item-aligns-center">
                    <p class="font-weight-bold h6 p-3 border-bottom mb-0 w-100">منوی غذا</p>
                    <!-- <a class="small text-primary font-weight-bold ml-auto" href="#">View all <i class="feather-chevrons-right"></i></a> -->
                </div>
                <div class="row m-0">
                    <h6 class="p-3 m-0 bg-light w-100">Starters <small class="text-black-50">3 ITEMS</small></h6>
                    <div class="col-md-12 px-0 border-top">
                        <div class="">
                            <div class="p-3 border-bottom menu-list">
                                <span class="float-right"><a href="#" class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#extras">ADD</a></span>
                                <div class="media">
                                    <img alt="#" src="/main/img/starter1.jpg" class="mr-3 rounded-pill ">
                                    <div class="media-body">
                                        <h6 class="mb-1">Chicken Tikka Sub </h6>
                                        <p class="text-muted mb-0">$250</p>
                                    </div>
                                </div>
                            </div>
                            <div class="p-3 border-bottom menu-list">
                                <span class="float-right"><a href="#" class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#extras">ADD</a></span>
                                <div class="media">
                                    <img alt="#" src="/main/img/starter2.jpg" class="mr-3 rounded-pill ">
                                    <div class="media-body">
                                        <h6 class="mb-1">Cheese corn Roll <span class="badge badge-danger">BEST SELLER</span></h6>
                                        <p class="text-muted mb-0">$600</p>
                                    </div>
                                </div>
                            </div>
                            <div class="p-3 border-bottom menu-list">
                                <span class="float-right"><a href="#" class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#extras">ADD</a></span>
                                <div class="media">
                                    <img alt="#" src="/main/img/starter3.jpg" class="mr-3 rounded-pill ">
                                    <div class="media-body">
                                        <h6 class="mb-1">Chicken Tikka Sub <span class="badge badge-success">Pure Veg</span></h6>
                                        <p class="text-muted mb-0">$250</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 pt-3">
            <div class="osahan-cart-item rounded rounded shadow-sm overflow-hidden bg-white sticky_sidebar">
                <div class="d-flex border-bottom osahan-cart-item-profile bg-white p-3">
                    <div class="d-flex flex-column">
                        <h6 class="mb-1 font-weight-bold">سبد خرید</h6>
                    </div>
                </div>
                <div class="bg-white border-bottom py-2">
                    <div class="gold-members d-flex align-items-center justify-content-between px-3 py-2 border-bottom">
                        <div class="media align-items-center">
                            <div class="mr-2 text-danger">·</div>
                            <div class="media-body">
                                <p class="m-0">Chicken Tikka Sub</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="count-number float-right"><button type="button" class="btn-sm left dec btn btn-outline-secondary"> <i class="feather-minus"></i> </button><input class="count-number-input" type="text" readonly="" value="2"><button type="button" class="btn-sm right inc btn btn-outline-secondary"> <i class="feather-plus"></i> </button></span>
                            <p class="text-gray mb-0 float-right ml-2 text-muted small">$628</p>
                        </div>
                    </div>
                    <div class="gold-members d-flex align-items-center justify-content-between px-3 py-2 border-bottom">
                        <div class="media align-items-center">
                            <div class="mr-2 text-danger">·</div>
                            <div class="media-body">
                                <p class="m-0">Methi Chicken Dry
                                </p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="count-number float-right"><button type="button" class="btn-sm left dec btn btn-outline-secondary"> <i class="feather-minus"></i> </button><input class="count-number-input" type="text" readonly="" value="2"><button type="button" class="btn-sm right inc btn btn-outline-secondary"> <i class="feather-plus"></i> </button></span>
                            <p class="text-gray mb-0 float-right ml-2 text-muted small">$628</p>
                        </div>
                    </div>
                    <div class="gold-members d-flex align-items-center justify-content-between px-3 py-2 border-bottom">
                        <div class="media align-items-center">
                            <div class="mr-2 text-danger">·</div>
                            <div class="media-body">
                                <p class="m-0">Reshmi Kebab
                                </p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="count-number float-right"><button type="button" class="btn-sm left dec btn btn-outline-secondary"> <i class="feather-minus"></i> </button><input class="count-number-input" type="text" readonly="" value="2"><button type="button" class="btn-sm right inc btn btn-outline-secondary"> <i class="feather-plus"></i> </button></span>
                            <p class="text-gray mb-0 float-right ml-2 text-muted small">$628</p>
                        </div>
                    </div>
                    <div class="gold-members d-flex align-items-center justify-content-between px-3 py-2 border-bottom">
                        <div class="media align-items-center">
                            <div class="mr-2 text-success">·</div>
                            <div class="media-body">
                                <p class="m-0">Lemon Cheese Dry
                                </p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="count-number float-right"><button type="button" class="btn-sm left dec btn btn-outline-secondary"> <i class="feather-minus"></i> </button><input class="count-number-input" type="text" readonly="" value="2"><button type="button" class="btn-sm right inc btn btn-outline-secondary"> <i class="feather-plus"></i> </button></span>
                            <p class="text-gray mb-0 float-right ml-2 text-muted small">$628</p>
                        </div>
                    </div>
                    <div class="gold-members d-flex align-items-center justify-content-between px-3 py-2">
                        <div class="media align-items-center">
                            <div class="mr-2 text-success">·</div>
                            <div class="media-body">
                                <p class="m-0">Rara Paneer</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="count-number float-right"><button type="button" class="btn-sm left dec btn btn-outline-secondary"> <i class="feather-minus"></i> </button><input class="count-number-input" type="text" readonly="" value="2"><button type="button" class="btn-sm right inc btn btn-outline-secondary"> <i class="feather-plus"></i> </button></span>
                            <p class="text-gray mb-0 float-right ml-2 text-muted small">$628</p>
                        </div>
                    </div>
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
                    <p class="mb-1">Item Total <span class="float-right text-dark">$3140</span></p>
                    <p class="mb-1">Restaurant Charges <span class="float-right text-dark">$62.8</span></p>
                    <p class="mb-1">Delivery Fee<span class="text-info ml-1"><i class="feather-info"></i></span><span class="float-right text-dark">$10</span></p>
                    <p class="mb-1 text-success">Total Discount<span class="float-right text-success">$1884</span></p>
                    <hr>
                    <h6 class="font-weight-bold mb-0">TO PAY <span class="float-right">$1329</span></h6>
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
                <form>
                    <!-- extras body -->
                    <div class="recepie-body">
                        <div class="custom-control custom-radio border-bottom py-2">
                            <input type="radio" id="customRadio1f" name="day" class="custom-control-input" checked>
                            <label class="custom-control-label" for="customRadio1f">شنبه</label>
                        </div>
                        <div class="custom-control custom-radio border-bottom py-2">
                            <input type="radio" id="customRadio2f" name="day" class="custom-control-input">
                            <label class="custom-control-label" for="customRadio2f">یکشنبه</label>
                        </div>
                        <div class="custom-control custom-radio border-bottom py-2">
                            <input type="radio" id="customRadio3f" name="day" class="custom-control-input">
                            <label class="custom-control-label" for="customRadio3f">دوشنبه</label>
                        </div>
                        <div class="custom-control custom-radio border-bottom py-2">
                            <input type="radio" id="customRadio4f" name="day" class="custom-control-input">
                            <label class="custom-control-label" for="customRadio4f">سه شنبه</label>
                        </div>
                        <div class="custom-control custom-radio border-bottom py-2">
                            <input type="radio" id="customRadio5f" name="day" class="custom-control-input">
                            <label class="custom-control-label" for="customRadio5f">Vegetables  <span class="text-muted">+$5.00</span></label>
                        </div>
                        <div class="custom-control custom-radio border-bottom py-2">
                            <input type="radio" id="customRadio6f" name="day" class="custom-control-input">
                            <label class="custom-control-label" for="customRadio6f">Noodles  <span class="text-muted">+$30.00</span></label>
                        </div>
                        <h6 class="font-weight-bold mt-4">QUANTITY</h6>
                        <div class="d-flex align-items-center">
                            <p class="m-0">1 Item</p>
                            <div class="ml-auto">
                                <span class="count-number"><button type="button" class="btn-sm left dec btn btn-outline-secondary"> <i class="feather-minus"></i> </button><input class="count-number-input" type="text" readonly="" value="1"><button type="button" class="btn-sm right inc btn btn-outline-secondary"> <i class="feather-plus"></i> </button></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer p-0 border-0">
                <div class="col-6 m-0 p-0">
                    <button type="button" class="btn border-top btn-lg btn-block" data-dismiss="modal">Close</button>
                </div>
                <div class="col-6 m-0 p-0">
                    <button type="button" class="btn btn-primary btn-lg btn-block">Apply</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
