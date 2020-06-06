@extends('dashboard.index')

@section('content')
<form action="/dashboard/add_product_to_storeTo_system" method="post">
@csrf
    <div class="row">
        <div class="col-md-12">
            <ul style=" list-style-type:none">
            @foreach($store as $stor)
                <li style="float:right;text-align:center;margin:10px">
                    <img src="{{$stor->icon_url}}" style="border-radius: 50%;width:70px" alt=""> <br>
                    <p style="font-size:10px;margin:5px">{{$stor->name}}</p>
                    <input type="checkbox" name="store" value="{{$stor->id}}" style="width:20px;margin:auto;text-align:center" class="form-control">
                </li>
            @endforeach
            </ul>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">انتخاب همه</th>
                        <th scope="col">تصویر محصول</th>
                        <th scope="col">نام محصول</th>
                        <th scope="col">شرح محصول</th>
                        <th scope="col">دسته بندی محصول</th>
                        <th scope="col">قیمت </th>
                        <th scope="col">اندازه </th>

                        </tr>
                    </thead>
                    <tbody>
                    @foreach($product as $pr)
                        <tr>
                        <th scope="row"><input type="checkbox" name="check[]" value="{{$pr->id}}" class="form-control" width="10px"></th>
                        <td><img src="{{$pr->img}}" width="40px" alt=""></td>
                        <td>{{$pr->name}}</td>
                        <td>{{$pr->desc}}</td>
                        <td>{{$pr->cate}} -> {{$pr->sub_cate}}</td>
                        <td>{{$pr->price}}</td>
                        <td>{{$pr->size}}</td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
        </div>

        <div class="col-md-12" style="margin:auto;text-align:center">
            <button class="btn btn-success">ارسال</button>
        </div>
    </div>
</form>
@endsection