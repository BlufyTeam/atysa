@extends('layouts.admin') 
@section('style')
<link href="/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="page-title mb-0 font-size-18">کاربران</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">کاربران</a></li>
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
                <form enctype="multipart/form-data" action="/admin/users/update" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if($errors->any())
                        <p  class="text-danger mb-4 mt-3">{{$errors->first()}}</p>
                    @endif
                    <input type="hidden" name="id" value="{{$single->id}}" />
                    <div class="form-group row">
                        <label for="type" class="col-md-2 col-form-label">نام</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" id="name" name="name" value="{{$single->name}}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="companyId" class="col-md-2 col-form-label">شرکت</label>
                        <div class="col-md-10">
                            <select class="form-control" name="companyId" id="companyId">
                                @foreach($companies as $com)
                                <option @if($com->id == $single->companyId) selected="selected" @endif  value="{{$com->id}}">{{$com->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="type" class="col-md-2 col-form-label">نوع کاربر</label>
                        <div class="col-md-10">
                            <select class="form-control" name="type" id="type">
                                <option {{$single->type == 1 ? 'selected="selected"' : ""}} value="1"> ادمین</option>
                                <option {{$single->type == 2 ? 'selected="selected"' : ""}} value="2">کارشناس فروش</option>
                                <option {{$single->type == 4 ? 'selected="selected"' : ""}} value="4">مدیر شرکت</option>
                                <option {{$single->type == 5 ? 'selected="selected"' : ""}} value="5">کارمند</option>
                                <option {{$single->type == 6 ? 'selected="selected"' : ""}} value="6">لوجستیک</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-2 col-form-label">آدرس ایمیل</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" id="email" name="email" value="{{$single->email}}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="mobile" class="col-md-2 col-form-label">شماره موبایل</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" id="mobile" name="mobile" value="{{$single->mobile}}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-md-2 col-form-label">پسورد جدید</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" id="password" name="password"/>
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
@section('footer')
    <script src="/assets/libs/select2/js/select2.min.js"></script>
    <script src="/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#userId').select2();
        });
    </script>
@endsection