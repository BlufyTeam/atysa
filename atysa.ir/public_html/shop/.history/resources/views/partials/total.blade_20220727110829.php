<div class="osahan-cart-item rounded rounded shadow-sm overflow-hidden bg-white sticky_sidebar">
    <div class="d-flex border-bottom osahan-cart-item-profile bg-white p-3">
        <div class="d-flex flex-column">
            <h6 class="mb-1 font-weight-bold">سبد خرید</h6>
        </div>
    </div>
    <div class="bg-white border-bottom py-2">
        @foreach($userBasket as $b)
        <div class="gold-members d-flex align-items-center justify-content-between px-3 py-2 border-bottom">
            <div class="media align-items-center">
                <div class="mr-2 text-danger">·</div>
                <div class="media-body">
                    <p class="m-0">{{$b->productName}}</p>
                </div>
            </div>
            <div class="d-flex align-items-center">
                <span class="count-number float-right">
                    <button type="button" data-type="minus" data-productId="{{$b->productId}}" data-count="{{$b->count}}" class="changeCount btn-sm left dec btn btn-outline-secondary"> 
                        <i class="feather-minus"></i> 
                    </button>
                    <input class="count-number-input" type="text" readonly="" value="{{$b->count}}">
                    <button type="button" data-type="plus" data-productId="{{$b->productId}}" data-count="{{$b->count}}" class="changeCount btn-sm right inc btn btn-outline-secondary"> 
                        <i class="feather-plus"></i> 
                    </button>
                </span>
                <p class="text-gray mb-0 float-right ml-2 text-muted small">{{number_format($b->price)}}</p>
            </div>
        </div>
        
        @endforeach
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
        <p class="mb-1">مجموع سبد <span class="float-right text-dark">{{number_format($total)}}</span></p>
        <p class="mb-1">هزینه ارسال<span class="text-info ml-1"><i class="feather-info"></i></span>
            <span class="float-right text-dark">{{number_format($shipping)}}</span>
        </p>
        <hr>
        <h6 class="font-weight-bold mb-0">رقم پرداختی <span class="float-right">{{number_format($final)}}</span></h6>
    </div>
    <div class="p-3">
        <a class="btn btn-success btn-block btn-lg" href="successful.html">پرداخت<i class="feather-arrow-right"></i></a>
    </div>
</div>