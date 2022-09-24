@extends('layouts.admin') 
@section('style')
<link href="/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
<link href="/assets/libs/quill/quill.core.css" rel="stylesheet" type="text/css" />
<link href="/assets/libs/quill/quill.bubble.css" rel="stylesheet" type="text/css" />
<link href="/assets/libs/quill/quill.snow.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="page-title mb-0 font-size-18">ویرایش غذا</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">غذا</a></li>
                    <li class="breadcrumb-item active">ویرایش</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
    
        <div class="card">
            <div class="card-body">
                <form enctype="multipart/form-data" action="/admin/plates/update" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$single->id}}" />
                    <div class="form-group row">
                        <label for="category" class="col-md-2 col-form-label">سرگروه</label>
                        <div class="col-md-10">
                            <select class="form-control" id="category" name="category">
                                @foreach($categories as $cat)
                                    <option @if($single->category == $cat->name) selected="selected" @endif value="{{$cat->name}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">نام غذا</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" id="name" name="name" value="{{$single->name}}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">آیا ویژه شده؟</label>
                        <div class="col-md-10">
                            <select class="form-control"  id="isPromoted" name="isPromoted">
                                <option value="false">خیر</option>
                                <option value="true">بله</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-md-2 col-form-label">توضیحات</label>
                        <div class="col-md-10">
                            <textarea class="form-control" id="editor" name="description">{!! $single->description!!}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="calory" class="col-md-2 col-form-label">کالری غذا</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" id="calory" name="calory" value="{{$single->calory}}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="price" class="col-md-2 col-form-label">قیمت غذا به تومان</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" id="price" name="price" value="{{$single->price}}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="size" class="col-md-2 col-form-label">سایز غذا</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" id="size" name="size" value="{{$single->size}}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="size" class="col-md-2 col-form-label">تصویر شاخص</label>
                        <div class="col-md-10">
                            <input class="form-control" type="file" id="file" name="file"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="endDate" class="col-md-2 col-form-label">محصولات زیر مجموعه</label>
                        <div class="col-md-10">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>نام مواد اولیه</th>
                                        <th>وزن تقریبی هر واحد</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 0; $i < 40; $i++)
                                        <tr class="table-active">
                                            <th scope="row">{{$i+1}}</th>
                                            <td><input class="form-control" type="text" name="materials[{{$i}}][name]" @if(isset($single->materials[$i])) value="{{$single->materials[$i]['name']}}" @endif/></td>
                                            <td><input class="form-control" type="text" name="materials[{{$i}}][weight]" @if(isset($single->materials[$i])) value="{{$single->materials[$i]['weight']}}" @endif/></td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="form-group row">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">ویرایش</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>
@endsection
@section('script')
<script src="/assets/libs/tinymce/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- init js -->
    <script src="/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script>
        $(document).ready(function() {
            console.log('tae');
            tinymce.init({
                selector: 'textarea#editor',
                directionality : 'rtl',
            });
        });
    </script>
@endsection