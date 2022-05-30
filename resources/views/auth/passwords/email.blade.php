@extends('auth.app')
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
    }

    body:before {
        content: '';
        position: fixed;
        width: 100vw;
        height: 100vh;
        background-image: url(https://media.gettyimages.com/photos/sleek-red-bus-picture-id173002523?k=20&m=173002523&s=612x612&w=0&h=zueVdzDHqHVPNdqDTQ_LTKlH-VrDYfYJt0HPhMU7Z5c=);
        background-position: center center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        -webkit-background-size: cover;
        background-size: cover;
        -webkit-filter: blur(10px);
        -moz-filter: blur(10px);
        filter: blur(10px);
    }

    .contact-form {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 500px;
        height: 385px;
        padding: 80px 40px;
        background: rgba(0, 0, 0, 0.5);
    }

    .avatar {
        position: absolute;
        width: 80px;
        height: 80px;
        border-radius: 50%;
        overflow: hidden;
        top: calc(-80px/2);
        left: 211px;
    }

    .contact-form h2 {
        margin: 0;
        padding: 0 0 20px;
        color: #fff;
        text-align: center;
        text-transform: uppercase;
    }

    .contact-form p {
        margin: 0;
        padding: 0;
        font-weight: bold;
        color: #fff;
    }

    .contact-form input {
        width: 100%;
        margin-bottom: 20px;
    }

    .contact-form input[type=email],
    .contact-form input[type=password] {
        border: none;
        border-bottom: 1px solid #fff;
        background: transparent;
        outline: none;
        height: 40px;
        color: #fff;
        font-size: 16px;
    }

    .contact-form input[type=submit] {
        height: 30px;
        color: #fff;
        font-size: 15px;
        background: red;
        cursor: pointer;
        border-radius: 25px;
        border: none;
        outline: none;
        margin-top: 15%;
    }

    .contact-form a {
        color: #fff;
        font-size: 14px;
        text-decoration: none;
    }

    input[type=checkbox] {
        width: 20%;
    }
</style>

<body>
    <div class="contact-form">
        <div>
            @include('flash::message')
        </div>
        <img alt="" class="avatar" src="https://i.postimg.cc/zDyt7KCv/a1.jpg">
        <h2>ĐẶT LẠI MẬT KHẨU</h2>
        <form method="POST" action="{{ route('forget.password.post') }}">
            @csrf
            <div class=" form-group row">
                <div class="col-md-8  offset-md-2">
                    <input id="email" type="email" placeholder="Nhập email đặt lại mật khẩu!" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-12 offset-md-3">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Gửi liên kết đặt lại mật khẩu') }}
                    </button>
                </div>
            </div>

        </form>
    </div>
</body>