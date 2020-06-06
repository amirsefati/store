@extends('dashboard.index')

@section('content')

<form action="/dashboard/add_storeTo_system" method="post" enctype="multipart/form-data">
    @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4 mt-3">
                        <label for="name">نام فروشگاه :</label>
                        <input type="text" class="form-control" name="name">
                    </div>

                    <div class="col-md-8 mt-3">
                        <label for="desc">توضیحات فروشگاه :</label>
                        <input type="text" class="form-control" name="desc">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 mt-3">
                        <label for="desc"> ساعات فعالیت فروشگاه :</label>
                        <input type="time" class="form-control col-md-8" name="to">
                        <input type="time" class="form-control col-md-10" name="end">

                    </div>

                    <div class="col-md-4 mt-3">
                        <label for="desc">  لینک فروشگاه :</label>
                        <input type="text" class="form-control" name="link">
                    </div>

                    <div class="col-md-4 mt-3 pt-2">
                        <label for="name"> آیکون فروشگاه :</label> <br>   
                        <input type="file"  name="icon_link">
                    </div>
                    
                </div>
                    <br>
                <div class="row mt-4">
                    <div class="col-md-4">
                    موقیت فروشگاه <br> <br> 
                        <label for="long">عرض جغرافیایی : </label>
                        <input type="text" name="long" class="form-control"> <br>
                        <label for="late">طول جغرافیایی : </label>
                        <input type="text" name="late" class="form-control">
                    </div>
                    <div class="col-md-8">

                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
                <div class="col-md-12" style="text-align:center;margin:auto">
                    <button class="btn btn-success">ارسال فروشگاه</button>
                </div>
            </div>
</form>

@endsection