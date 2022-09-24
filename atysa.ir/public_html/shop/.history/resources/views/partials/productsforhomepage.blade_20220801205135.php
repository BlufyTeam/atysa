@foreach($products as $product)
<div class="col-md-3 pb-3">
    <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
        <div class="list-card-image">
            {{-- <div class="favourite-heart text-danger position-absolute"><a href="#"><i class="feather-heart"></i></a></div> --}}
            @if($product->promoted)
            <div class="member-plan position-absolute"><span class="badge badge-dark">Promoted</span></div>
            @endif
            <a href="restaurant.html">
                <img alt="#" src="{{$product->image}}" class="img-fluid item-img w-100">
            </a>
        </div>
        <div class="p-3 position-relative">
            <div class="list-card-body">
                <h6 class="mb-1"><a href="restaurant.html" class="text-black">{{$product->name}}
             </a>
                </h6>
                {{-- <p class="text-gray mb-1 small">• North • Hamburgers</p> --}}
                <p class="text-gray mb-1 rating">
                </p>
                {{-- <ul class="rating-stars list-unstyled">
                    <li>
                        <i class="feather-star star_active"></i>
                        <i class="feather-star star_active"></i>
                        <i class="feather-star star_active"></i>
                        <i class="feather-star star_active"></i>
                        <i class="feather-star"></i>
                    </li>
                </ul> --}}
                <p></p>
            </div>
            <div class="list-card-badge">
                <span class="badge badge-danger">OFFER</span> <small>65% OSAHAN50</small>
            </div>
        </div>
    </div>
</div>
@endforeach