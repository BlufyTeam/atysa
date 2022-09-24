@extends('layouts.main')

@section('content')
    <div class="osahan-home-page">
        <!-- offer sectio slider -->
        <div class="bg-white">
            <div class="container">
                <div class="offer-slider"  style="direction: ltr">
                    @foreach($banners as $banner)
                    <div class="cat-item px-1 py-3">
                        <a class="d-block text-center shadow-sm" href="{{$banner->url}}">
                            <img alt="#" src="{{$banner->image}}" class="img-fluid rounded">
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Filters -->
        <div class="">
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
                <h5 class="m-0 categoryName"></h5>
                {{-- <a class="font-weight-bold ml-auto" href="most_popular.html">26 places <i class="feather-chevrons-right"></i></a> --}}
            </div>
            <!-- Most popular -->
            <div class="most_popular">
                <div class="row productsBox">
                    
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('script')
    <script>
        var name = '{{$categories[0]->name}}';
        changeCategoryForDefault(name);
        $('body').on('click','.categoryrClick',function(){
            var name = $(this).attr('data-name');
            changeCategoryForDefault(name);
        });
    </script>
    @endsection