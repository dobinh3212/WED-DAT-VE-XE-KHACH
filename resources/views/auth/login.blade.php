@extends('auth.app')

<style>
    .left-column {
        width: 62%;
        margin-top: 7px;
    }
    .backgroud_login{
         background-image: url("https://cdn.thukyluat.vn/nhch-images//Images/uploaded/moi/xe%20kh%C3%A1ch.jpg");
}

    .right-column {
        width: 38%;
    }
</style>
<div class="section_web backgroud_login">
    <div class="container">
            <div class="col-md-6" style="margin-left: 260px; margin-top: 100px;">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div style="padding-bottom: 5px">
                                <h3>Đăng nhập</h3>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Tên đăng nhập')
                                    }}</label>
                                <div class="col-md-8">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div> 
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mật khẩu')
                                    }}</label>
                                <div class="col-md-8">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 d-flex">
                                <div class="col-md-6" style="margin-left: 165px;">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{
                                            old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember">
                                                {{ __('Nhớ mật khẩu') }}
                                            </label> 
                                </div>
                                <div class="col-md-4" style="margin-left: -46px;margin-top: -7px;">
                                    <a class="nav-link" href="{{ url('/forgot_password') }}"> {{ __('Quên mật khẩu?') }}</a>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" style="width: 100%">
                                        {{ __('Đăng nhập') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CSS Blurred Transparent Background</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
</head>
<style>
body{
    margin: 0;
    padding: 0;
    font-family: sans-serif;
}
section{
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    background: url(https://cdn.thukyluat.vn/nhch-images//Images/uploaded/moi/xe%20kh%C3%A1ch.jpg);
    background-attachment: fixed;
    height: 100vh;

}

section .box{
    position: relative;
    max-width: 600px;
    padding: 50px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
    overflow: hidden;
    color: #000; 
    /* sửa color để đổi màu chữ bên trong box trong suốt */
}

section .box:before{
    content: '';
    position: absolute;
    top: -20px;
    left: -20px;
    right: -20px;
    bottom: -20px;
    background: url(https://cdn.thukyluat.vn/nhch-images//Images/uploaded/moi/xe%20kh%C3%A1ch.jpg);
    background-attachment: fixed;
    filter: blur(4px);
}

section .box h2{
    position: relative;
    margin: 0 0 20px;
    padding: 0;
    font-size: 48px;
    text-transform: uppercase;
    z-index: 2;
}

section .box p{
    position: relative;
    margin: 0;
    padding: 0;
    font-size: 18px;
    z-index: 2;
}</style>
<body>
    <section>
        <div class="box">
            <h2>CSS Blurred Glass / Transparent Div</h2>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Veritatis soluta architecto ad corporis molestiae maiores cumque id eligendi quos quo! Magnam consectetur expedita sint necessitatibus veniam maxime suscipit sit quidem?<br><br>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam consectetur reiciendis ut totam commodi nostrum odit ex similique veritatis beatae quibusdam vero earum mollitia blanditiis, sapiente magni nisi cum! Nihil!</p>
        </div>
    </section>
</body>
</html> -->