@extends('layouts.admin') 
@section('style')
<link href="/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="page-title mb-0 font-size-18">افزودن بنر</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">بنر</a></li>
                    <li class="breadcrumb-item active">افزودن</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
    
        <div class="card">
            <div class="card-body">
                <form enctype="multipart/form-data" action="/admin/categories/create" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="url" class="col-md-2 col-form-label">آدرس</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" id="url" name="url"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="size" class="col-md-2 col-form-label">تصویر شاخص</label>
                        <div class="col-md-10">
                            <input class="form-control" type="file" id="file" name="file"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-md-2 col-form-label">توضیحات</label>
                        <div class="col-md-10">
                            <textarea class="form-control" id="editor" name="description"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">ثبت</button>
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