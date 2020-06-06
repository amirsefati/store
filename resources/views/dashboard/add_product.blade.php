@extends('dashboard.index')

@section('content')

<div class="card">
  <div class="card-header">
    افزودن کالا
  </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

    <div class="card-body">
        <form action="/dashboard/add_productTo_system" method="post" enctype="multipart/form-data">
                @csrf
            <div class="row">
                <div class="col-md-4">
                    <label for="name">نام کالا </label>
                    <input type="text" class="form-control" name="name" id="">
                </div>

                <div class="col-md-8">
                    <label for="desc">شرح کالا </label>
                    <input type="text" class="form-control" name="desc" id="">
                </div>
            </div>


            <div class="row">
                <div class="col-md-4 mt-3">
                    <label for="cate"> دسته بندی : </label>
                    <input type="text" class="form-control" name="cate" id="">
                </div>

                <div class="col-md-4 mt-3">
                    <label for="sub_cate"> زیر دسته بندی :</label>
                    <input type="text" class="form-control" name="sub_cate" id="">
                </div>

                <div class="col-md-4 mt-3">
                    <label for="size"> واحد اندازه (اختیاری) :  </label>
                    <input type="text" class="form-control" name="size" id="">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mt-3">
                    <label for="price">  قیمت : </label>
                    <input type="text" class="form-control" name="price" id="">
                </div>

                <div class="col-md-6 mt-3">
                    <label for="per_price"> واحد قیمت (اختیاری) :  </label>
                    <input type="text" class="form-control" name="per_price" id="">
                </div>

                
            </div>

            <div class="row">
                <div class="col-md-3 mt-3">
                    <label for="img">آپلود عکس :</label>
                    <input type="file" name="img" id="">
                </div>

                <div class="col-md-3 mt-3">
                    <label for="relate"> محصول مرتبط :</label>
                    <input type="text" name="relate" class="form-control">
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 mt-5" style="text-align: center;margin:auto">
                    <button class="btn btn-success pr-5 pl-5">ارسال محصول</button>
                </div>
            </div>
        </form>
    </div>
</div>




@endsection