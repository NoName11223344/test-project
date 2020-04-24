@extends('site.layout.site')
@section('content')
<div id="login">
    <h3 class="text-center text-white pt-5">Đăng ký</h3>
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center"  style="width:500px;margin:auto">
            <form action="{{route('submit_register')}}" method="post">
            {!! csrf_field() !!}
                <div class="form-group" style=" padding:10px">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                    <label for="uname"><b>Email</b></label>
                    <input type="text" placeholder="Enter Username" value="{{ old('email') }}"  name="email" >

                    <label for="uname"><b>Họ Tên </b></label>
                    <input type="text" placeholder="Enter Username" value="{{ old('name') }}"  name="name" >

                    <label for="psw"><b>Mật Khẩu</b></label>
                    <input type="password" placeholder="Enter Password" name="password" >

                    <label for="psw"><b>Xác nhận mật khẩu</b></label>
                    <input type="password" placeholder="Summit Password" name="re_password" >

                    <button type="submit">Đăng ký</button>
                
                    <a class="button btn" href="/" style=" background-color: #4c8faf; color:#fff">Đăng nhập</a>
                </div>
            </form>

            
        </div>
    </div>
</div>
<style>
    /* Bordered form */
form {
  border: 3px solid #f1f1f1;
}
label{
    display: block !important;
}
/* Full-width inputs */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display:block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button ,.button{
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

/* Add a hover effect for buttons */
button:hover {
  opacity: 0.8;
}

/* Extra style for the cancel button (red) */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the avatar image inside this container */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

/* Avatar image */
img.avatar {
  width: 40%;
  border-radius: 50%;
}

/* Add padding to containers */
.container {
  padding: 16px;
}

/* The "Forgot password" text */
span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
    display: block;
    float: none;
  }
  .cancelbtn {
    width: 100%;
  }
}
</style>
@endsection