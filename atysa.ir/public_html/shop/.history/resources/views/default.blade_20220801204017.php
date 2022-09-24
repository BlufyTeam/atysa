@extends('layouts.main')

@section('content')
    <div class="osahan-home-page">
        <div class="bg-primary p-3 d-none">
            <div class="text-white">
                <div class="title d-flex align-items-center">
                    <a class="toggle" href="#">
                        <span></span>
                    </a>
                    <h4 class="font-weight-bold m-0 pl-5">Browse</h4>
                    <a class="text-white font-weight-bold ml-auto" data-toggle="modal" data-target="#exampleModal" href="#">Filter</a>
                </div>
            </div>
            <div class="input-group mt-3 rounded shadow-sm overflow-hidden">
                <div class="input-group-prepend">
                    <button class="border-0 btn btn-outline-secondary text-dark bg-white btn-block"><i class="feather-search"></i></button>
                </div>
                <input type="text" class="shadow-none border-0 form-control" placeholder="Search for restaurants or dishes">
            </div>
        </div>
        <!-- offer sectio slider -->
        <div>
            <div class="container">
                <div class="offer-slider"  style="direction: ltr">
                    @foreach($banners as $banner)
                    <div class="cat-item px-1 py-3">
                        <a class="d-block text-center shadow-sm" href="{{$banner->url}}">
                            <img alt="#" src="/main/img/pro1.jpg" class="img-fluid rounded">
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Filters -->
        <div class="bg-white">
            <div class="container">
                <div class="cat-slider" style="direction: ltr">
                    @foreach($categories as $category)
                        <div class="cat-item px-1 py-3">
                            <a class="categoryrClick bg-white rounded d-block p-2 text-center shadow-sm" href="#" data-name="{{$category->name}}">
                                <img alt="#" src="/uploads/categories/{{$category->image}}" class="img-fluid mb-2">
                                <p class="m-0 small">{{$category->name}}</p>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="container">
            <!-- Most popular -->
            <div class="py-3 title d-flex align-items-center">
                <h5 class="m-0 category"></h5>
                {{-- <a class="font-weight-bold ml-auto" href="most_popular.html">26 places <i class="feather-chevrons-right"></i></a> --}}
            </div>
            <!-- Most popular -->
            <div class="most_popular">
                <div class="row">
                    <div class="col-md-3 pb-3">
                        <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                            <div class="list-card-image">
                                <div class="star position-absolute"><span class="badge badge-success"><i class="feather-star"></i> 3.1 (300+)</span></div>
                                <div class="favourite-heart text-danger position-absolute"><a href="#"><i class="feather-heart"></i></a></div>
                                <div class="member-plan position-absolute"><span class="badge badge-dark">Promoted</span></div>
                                <a href="restaurant.html">
                                    <img alt="#" src="/main/img/popular1.png" class="img-fluid item-img w-100">
                                </a>
                            </div>
                            <div class="p-3 position-relative">
                                <div class="list-card-body">
                                    <h6 class="mb-1"><a href="restaurant.html" class="text-black">The osahan Restaurant
                                 </a>
                                    </h6>
                                    <p class="text-gray mb-1 small">• North • Hamburgers</p>
                                    <p class="text-gray mb-1 rating">
                                    </p>
                                    <ul class="rating-stars list-unstyled">
                                        <li>
                                            <i class="feather-star star_active"></i>
                                            <i class="feather-star star_active"></i>
                                            <i class="feather-star star_active"></i>
                                            <i class="feather-star star_active"></i>
                                            <i class="feather-star"></i>
                                        </li>
                                    </ul>
                                    <p></p>
                                </div>
                                <div class="list-card-badge">
                                    <span class="badge badge-danger">OFFER</span> <small>65% OSAHAN50</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('script')
    <script>
        $('body').on('click','.categoryrClick',function(){
            var name = $(this).attr('data-name');
            changeCategoryForDefault(name);
        });
    </script>
    @endsection