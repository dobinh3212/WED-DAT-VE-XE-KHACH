@extends('client.layout.main')
@section('title')
Liên hệ
@endsection
@section('content')
<div class="maintintuc">
	<div class="trangtentintuc">
		<h2>Liên hệ</h2>
	</div>
</div>
<div class="mail">
	<h3>LIÊN HỆ VỚI CHÚNG TÔI</h3>
	<div class="agileinfo_mail_grids">
		<div class="col-md-4 agileinfo_mail_grid_left">
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i></li>
				<li>Địa chỉ<span>{{$setting->address??''}}</span></li>
			</ul>
			<ul>
				<li><i class="fa fa-envelope" aria-hidden="true"></i></li>
				<li>email<span><a href="mailto:{{$setting->email??''}}">{{$setting->email??''}}</a></span></li>
			</ul>
			<ul>
				<li><i class="fa fa-phone" aria-hidden="true"></i></li>
				<li>Điện thoại<span>{{$setting->phone??''}}</span></li>
			</ul>
		</div>
		<div class="col-md-8 agileinfo_mail_grid_right">
			<form action="{{ route('contact') }}" method="post">
				@csrf
				<div class="col-md-6 wthree_contact_left_grid">
					<input type="text" name="name" value="Họ và tên" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Họ và tên';}" required="">
					<input type="email" name="email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
				</div>
				<div class="col-md-6 wthree_contact_left_grid">
					<input type="text" name="phone" value="Số điện thoại" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Số điện thoại';}" required="">
					<input type="text" name="title" value="Tiêu đề" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Tiêu đề';}" required="">
				</div>
				<div class="clearfix"> </div>
				<textarea name="content" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Nội dung';}" required="">Nội dung</textarea>
				<input style="background: #19980b;" type="submit" value="Gửi">
				<input style="background: red" type="reset" value="Nhập lại">
			</form>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- //mail -->
</div>
<div class="clearfix"></div>
</div>
<!-- //banner -->
<!-- map -->
<!-- <div class="map">
		<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d96748.15352429623!2d-74.25419879353115!3d40.731667701988506!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sshopping+mall+in+New+York%2C+NY%2C+United+States!5e0!3m2!1sen!2sin!4v1467205237951" style="border:0"></iframe>
	</div> -->
<!-- //map -->
@endsection