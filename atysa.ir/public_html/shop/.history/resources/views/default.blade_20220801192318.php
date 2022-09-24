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
                    <div class="cat-item px-1 py-3">
                        <a class="d-block text-center shadow-sm" href="trending.html">
                            <img alt="#" src="/main/img/pro1.jpg" class="img-fluid rounded">
                        </a>
                    </div>
                    <div class="cat-item px-1 py-3">
                        <a class="d-block text-center shadow-sm" href="trending.html">
                            <img alt="#" src="/main/img/pro2.jpg" class="img-fluid rounded">
                        </a>
                    </div>
                    <div class="cat-item px-1 py-3">
                        <a class="d-block text-center shadow-sm" href="trending.html">
                            <img alt="#" src="/main/img/pro3.jpg" class="img-fluid rounded">
                        </a>
                    </div>
                    <div class="cat-item px-1 py-3">
                        <a class="d-block text-center shadow-sm" href="trending.html">
                            <img alt="#" src="/main/img/pro4.jpg" class="img-fluid rounded">
                        </a>
                    </div>
                    <div class="cat-item px-1 py-3">
                        <a class="d-block text-center shadow-sm" href="trending.html">
                            <img alt="#" src="/main/img/pro2.jpg" class="img-fluid rounded">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Filters -->
        <div class="bg-white">
            <div class="container">
                <div class="cat-slider" style="direction: ltr">
                    <div class="cat-item px-1 py-3">
                        <a class="bg-white rounded d-block p-2 text-center shadow-sm" href="trending.html">
                            <img alt="#" src="/main/img/icons/Fries.png" class="img-fluid mb-2">
                            <p class="m-0 small">Fries</p>
                        </a>
                    </div>
                    <div class="cat-item px-1 py-3">
                        <a class="bg-white rounded d-block p-2 text-center shadow-sm" href="trending.html">
                            <img alt="#" src="/main/img/icons/Pizza.png" class="img-fluid mb-2">
                            <p class="m-0 small">Pizza</p>
                        </a>
                    </div>
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
                    <div class="col-md-3 pb-3">
                        <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                            <div class="list-card-image">
                                <div class="star position-absolute"><span class="badge badge-success"><i class="feather-star"></i> 3.1 (300+)</span></div>
                                <div class="favourite-heart text-danger position-absolute"><a href="#"><i class="feather-heart"></i></a></div>
                                <div class="member-plan position-absolute"><span class="badge badge-dark">Promoted</span></div>
                                <a href="restaurant.html">
                                    <img alt="#" src="/main/img/popular2.png" class="img-fluid item-img w-100">
                                </a>
                            </div>
                            <div class="p-3 position-relative">
                                <div class="list-card-body">
                                    <h6 class="mb-1"><a href="restaurant.html" class="text-black">Thai Famous Indian Cuisine</a></h6>
                                    <p class="text-gray mb-1 small">• Indian • Pure veg</p>
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
                                    <span class="badge badge-success">OFFER</span> <small>65% off</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 pb-3">
                        <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                            <div class="list-card-image">
                                <div class="star position-absolute"><span class="badge badge-success"><i class="feather-star"></i> 3.1 (300+)</span></div>
                                <div class="favourite-heart text-danger position-absolute"><a href="#"><i class="feather-heart"></i></a></div>
                                <div class="member-plan position-absolute"><span class="badge badge-dark">Promoted</span></div>
                                <a href="restaurant.html">
                                    <img alt="#" src="/main/img/popular3.png" class="img-fluid item-img w-100">
                                </a>
                            </div>
                            <div class="p-3 position-relative">
                                <div class="list-card-body">
                                    <h6 class="mb-1"><a href="restaurant.html" class="text-black">The osahan Restaurant
                                 </a>
                                    </h6>
                                    <p class="text-gray mb-1 small">• Hamburgers • Pure veg</p>
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
                    <div class="col-md-3 pb-3">
                        <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                            <div class="list-card-image">
                                <div class="star position-absolute"><span class="badge badge-success"><i class="feather-star"></i> 3.1 (300+)</span></div>
                                <div class="favourite-heart text-danger position-absolute"><a href="#"><i class="feather-heart"></i></a></div>
                                <div class="member-plan position-absolute"><span class="badge badge-dark">Promoted</span></div>
                                <a href="restaurant.html">
                                    <img alt="#" src="/main/img/popular4.png" class="img-fluid item-img w-100">
                                </a>
                            </div>
                            <div class="p-3 position-relative">
                                <div class="list-card-body">
                                    <h6 class="mb-1"><a href="restaurant.html" class="text-black">Bite Me Now Sandwiches</a></h6>
                                    <p class="text-gray mb-1 small">American • Pure veg</p>
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
                                    <span class="badge badge-success">OFFER</span> <small>65% off</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 pb-3">
                        <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                            <div class="list-card-image">
                                <div class="star position-absolute"><span class="badge badge-success"><i class="feather-star"></i> 3.1 (300+)</span></div>
                                <div class="favourite-heart text-danger position-absolute"><a href="#"><i class="feather-heart"></i></a></div>
                                <div class="member-plan position-absolute"><span class="badge badge-dark">Promoted</span></div>
                                <a href="restaurant.html">
                                    <img alt="#" src="/main/img/popular5.png" class="img-fluid item-img w-100">
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
                    <div class="col-md-3 pb-3">
                        <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                            <div class="list-card-image">
                                <div class="star position-absolute"><span class="badge badge-success"><i class="feather-star"></i> 3.1 (300+)</span></div>
                                <div class="favourite-heart text-danger position-absolute"><a href="#"><i class="feather-heart"></i></a></div>
                                <div class="member-plan position-absolute"><span class="badge badge-dark">Promoted</span></div>
                                <a href="restaurant.html">
                                    <img alt="#" src="/main/img/popular6.png" class="img-fluid item-img w-100">
                                </a>
                            </div>
                            <div class="p-3 position-relative">
                                <div class="list-card-body">
                                    <h6 class="mb-1"><a href="restaurant.html" class="text-black">Thai Famous Indian Cuisine</a></h6>
                                    <p class="text-gray mb-1 small">• Indian • Pure veg</p>
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
                                    <span class="badge badge-success">OFFER</span> <small>65% off</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 pb-3">
                        <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                            <div class="list-card-image">
                                <div class="star position-absolute"><span class="badge badge-success"><i class="feather-star"></i> 3.1 (300+)</span></div>
                                <div class="favourite-heart text-danger position-absolute"><a href="#"><i class="feather-heart"></i></a></div>
                                <div class="member-plan position-absolute"><span class="badge badge-dark">Promoted</span></div>
                                <a href="restaurant.html">
                                    <img alt="#" src="/main/img/popular7.png" class="img-fluid item-img w-100">
                                </a>
                            </div>
                            <div class="p-3 position-relative">
                                <div class="list-card-body">
                                    <h6 class="mb-1"><a href="restaurant.html" class="text-black">The osahan Restaurant
                                 </a>
                                    </h6>
                                    <p class="text-gray mb-1 small">• Hamburgers • Pure veg</p>
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
                    <div class="col-md-3 pb-3">
                        <div class="list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                            <div class="list-card-image">
                                <div class="star position-absolute"><span class="badge badge-success"><i class="feather-star"></i> 3.1 (300+)</span></div>
                                <div class="favourite-heart text-danger position-absolute"><a href="#"><i class="feather-heart"></i></a></div>
                                <div class="member-plan position-absolute"><span class="badge badge-dark">Promoted</span></div>
                                <a href="restaurant.html">
                                    <img alt="#" src="/main/img/popular8.png" class="img-fluid item-img w-100">
                                </a>
                            </div>
                            <div class="p-3 position-relative">
                                <div class="list-card-body">
                                    <h6 class="mb-1"><a href="restaurant.html" class="text-black">Bite Me Now Sandwiches</a></h6>
                                    <p class="text-gray mb-1 small">American • Pure veg</p>
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
                                    <span class="badge badge-success">OFFER</span> <small>65% off</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Most sales -->
            <div class="pt-2 pb-3 title d-flex align-items-center">
                <h5 class="m-0">Most sales</h5>
                <a class="font-weight-bold ml-auto" href="#">26 places <i class="feather-chevrons-right"></i></a>
            </div>
            <!-- Most sales -->
            <div class="most_sale">
                <div class="row mb-3">
                    <div class="col-md-4 mb-3">
                        <div class="d-flex align-items-center list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                            <div class="list-card-image">
                                <div class="star position-absolute"><span class="badge badge-success"><i class="feather-star"></i> 3.1 (300+)</span></div>
                                <div class="favourite-heart text-danger position-absolute"><a href="#"><i class="feather-heart"></i></a></div>
                                <div class="member-plan position-absolute"><span class="badge badge-dark">Promoted</span></div>
                                <a href="restaurant.html">
                                    <img alt="#" src="/main/img/sales1.png" class="img-fluid item-img w-100">
                                </a>
                            </div>
                            <div class="p-3 position-relative">
                                <div class="list-card-body">
                                    <h6 class="mb-1"><a href="restaurant.html" class="text-black">The osahan Restaurant
                                 </a>
                                    </h6>
                                    <p class="text-gray mb-3">North • Hamburgers • Pure veg</p>
                                    <p class="text-gray mb-3 time"><span class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2"><i class="feather-clock"></i> 15–25 min</span> <span class="float-right text-black-50"> $500 FOR TWO</span></p>
                                </div>
                                <div class="list-card-badge">
                                    <span class="badge badge-danger">OFFER</span> <small>65% OSAHAN50</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="d-flex align-items-center list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                            <div class="list-card-image">
                                <div class="star position-absolute"><span class="badge badge-success"><i class="feather-star"></i> 3.1 (300+)</span></div>
                                <div class="favourite-heart text-danger position-absolute"><a href="#"><i class="feather-heart"></i></a></div>
                                <div class="member-plan position-absolute"><span class="badge badge-dark">Promoted</span></div>
                                <a href="restaurant.html">
                                    <img alt="#" src="/main/img/sales2.png" class="img-fluid item-img w-100">
                                </a>
                            </div>
                            <div class="p-3 position-relative">
                                <div class="list-card-body">
                                    <h6 class="mb-1"><a href="restaurant.html" class="text-black">Thai Famous Cuisine</a></h6>
                                    <p class="text-gray mb-3">North Indian • Indian • Pure veg</p>
                                    <p class="text-gray mb-3 time"><span class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2"><i class="feather-clock"></i> 30–35 min</span> <span class="float-right text-black-50"> $250 FOR TWO</span></p>
                                </div>
                                <div class="list-card-badge">
                                    <span class="badge badge-success">OFFER</span> <small>65% off</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="d-flex align-items-center list-card bg-white h-100 rounded overflow-hidden position-relative shadow-sm">
                            <div class="list-card-image">
                                <div class="star position-absolute"><span class="badge badge-success"><i class="feather-star"></i> 3.1 (300+)</span></div>
                                <div class="favourite-heart text-danger position-absolute"><a href="#"><i class="feather-heart"></i></a></div>
                                <div class="member-plan position-absolute"><span class="badge badge-dark">Promoted</span></div>
                                <a href="restaurant.html">
                                    <img alt="#" src="/main/img/sales3.png" class="img-fluid item-img w-100">
                                </a>
                            </div>
                            <div class="p-3 position-relative">
                                <div class="list-card-body">
                                    <h6 class="mb-1"><a href="restaurant.html" class="text-black">The osahan Restaurant
                                 </a>
                                    </h6>
                                    <p class="text-gray mb-3">North • Hamburgers • Pure veg</p>
                                    <p class="text-gray mb-3 time"><span class="bg-light text-dark rounded-sm pl-2 pb-1 pt-1 pr-2"><i class="feather-clock"></i> 15–25 min</span> <span class="float-right text-black-50"> $500 FOR TWO</span></p>
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
    @endsection