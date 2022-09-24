<div class="shadow-sm rounded bg-white mb-3 overflow-hidden">
    <div class="d-flex item-aligns-center">
        <p class="font-weight-bold h6 p-3 border-bottom mb-0 w-100">منوی غذا</p>
        <!-- <a class="small text-primary font-weight-bold ml-auto" href="#">View all <i class="feather-chevrons-right"></i></a> -->
    </div>
    @if(count($products) > 0)
    <div class="row m-0">
        <h6 class="p-3 m-0 bg-light w-100">{{$products[0]->category}} <small class="text-black-50">{{count($products)}} عدد</small></h6>
        <div class="col-md-12 px-0 border-top">
            <div class="">
                @foreach($products as $product)
                <div class="p-3 border-bottom menu-list">
                    <span class="float-right">
                        <a href="#" data-id="{{$product->_id}}" 
                            class="btn btn-outline-secondary btn-sm addToBasketButton" 
                            data-name="{{$product->name}}"
                            data-toggle="modal" data-target="#extras">افزودن</a>
                    </span>
                    <div class="media">
                        <img src="{{$product->image}}" class="mr-3 rounded-pill ">
                        <div class="media-body">
                            <h6 class="mb-1">{{$product->name}} </h6>
                            <p class="text-muted mb-0">{{number_format($product->price)}} تومان</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @else
    <div class="col-md-12 px-0 border-top">
        <a style="margin: 50px 0px" class="btn btn-primary btn-block btn-sm" href="/user/plates">بشقاب شخصی خود را بسازید</a>
    </div>
    @endif
</div>