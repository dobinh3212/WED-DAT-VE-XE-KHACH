@extends('client.layout.main')
@section('title')
    Giới thiệu
@endsection
@section('content')
	<!-- Giới thiệu -->
	    <div class="maingioithieu">
	        <div class="trangtentintuc"><h2>Giới Thiệu</h2></div>
	        <div style="margin-top: 4em;">
	        @foreach($gioithieu as $gioithieus)
				{!! $gioithieus->content !!}
	        @endforeach
	    	</div>
	    </div>
	<!-- Kết thúc phần giới thiệu -->
@endsection
