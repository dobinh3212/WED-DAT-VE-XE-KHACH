@extends('admin.layouts.main')

@section('content')
<style>
    .left-column {
        width: 62%;
        margin-top: 7px;
    }
    .backgroud_home{
         height: 607px;        
         width: 1317px;
         background-image: url("https://images.pexels.com/photos/385997/pexels-photo-385997.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940");
         background-repeat: no-repeat;
         background-attachment: fixed;
         background-size: cover;
}

    .right-column {
        width: 38%;
    }
</style>
<div class="container backgroud_home">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div style="text-align: center;font-size: 30px;" class="card-header">Chào bạn</div>

                <div style="text-align: center;font-size: 30px;" class="card-body">
                    Chúc bạn một ngày làm việc vui vẻ!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection