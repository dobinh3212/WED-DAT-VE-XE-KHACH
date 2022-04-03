@extends('client.layout.main')
@section('title')
    Trang chủ
@endsection
@section('content')
  <!-- Chi tiết tin tức --> 
	<div class="mainviewtintuc">
		@foreach($tintuc as $tintucs)
			<h2>{{$tintucs->title}}</h2>
			<i class="fa fa-calendar" aria-hidden="true"><span> {{$tintucs->created_at}}</span></i>
			<br>
			<span>{{$tintucs->introduce}}</span>
      <br>
			<br>
			{!! $tintucs->content !!}
		@endforeach
          <!-- Tin tức khác --> 
		<div class="tintuc">
            <div class="tentintuc"><h3>Tin Tức Khác</h3></div>
            <ul>
              @foreach($tintuckhac as $tintuckhacs)
                <li>
                    <img src="../upload/{{$tintuckhacs->image}}">   
                    <a href="{{asset("tintuc/$tintuckhacs->id")}}"><strong>{{$tintuckhacs->title}}</strong></a>
                </li>
                @endforeach
            </ul>
            <div style="clear: left;"></div>
              <!-- Xem toàn bộ tin tức --> 
            <div class="tintucbutton">
                <button class="btn"><a href="{{asset('/tintuc')}}">Xem Toàn Bộ</a></button>
            </div>
        </div>
	</div>
@endsection