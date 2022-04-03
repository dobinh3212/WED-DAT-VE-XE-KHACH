@extends('client.layout.main')
@section('title')
    Tin tức
@endsection
@section('content')
   <!-- Trang tin tức --> 
    <div class="maintintuc">
        <div class="trangtintuc">
            <div class="trangtentintuc"><h2>Tin Tức</h2></div>
            <ul>
                <ul>
              @foreach($tintuc as $new)
                <li onclick="location.href='{{url("tintuc")}}/{{$new->id}}';" >   
                        <img src="upload/{{$new->image}}">
                        <a><strong>{{$new->title}}</strong></a>
                    </li>
                @endforeach
             </ul>
            </ul>
        </div>
        <div style="clear: left;"></div>
          <!-- Phân trang --> 
        <ul class="pager">
           {!! $tintuc->links() !!}
        </ul>
    </div>
@endsection
