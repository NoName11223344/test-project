@extends('site.layout.site')
@section('content')
<div id="login">
    <h3 class="text-center text-white pt-5">Login form</h3>
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center"  style="width:500px;margin:auto">
                    @if (session('registerSuccess'))
                        <div class="alert alert-success">
                            <p>{{ session('registerSuccess') }}</p>
                        </div>
                    @endif
            <form action="{{route('login')}}" method="post">
            {!! csrf_field() !!}
                <div class="imgcontainer">
                    <img style="width:200px" 
                    src="https://library.kissclipart.com/20181001/wbw/kissclipart-gsmnet-ro-clipart-computer-icons-user-avatar-4898c5072537d6e2.png" alt="Avatar" class="avatar">
                </div>
                <div class="form-group" style=" padding:10px">
                    <label for="uname"><b>Email</b></label>
                    <input type="text" placeholder="Enter Email" name="email" value="{{ old('email') }}" required>
                    
                    @if ($errors->has('email'))
											<span class="help-block">
												<strong>{{ $errors->first('email') }}</strong>
											</span>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-error">
                            <p>{{ session('error') }}</p>
                        </div>
                    @endif
                    <label for="psw"><b>Mật khẩu</b></label>
                    <input type="password" placeholder="Enter Password" name="password" required>

                    @if ($errors->has('password'))
											<span class="help-block">
												<strong>{{ $errors->first('password') }}</strong>
											</span>
                    @endif
                    <label>
                      <input type="checkbox" name="remember" value="remember">
                      Nhớ đăng nhập
                    </label>

                    <button type="submit">Đăng nhập</button>

                    <a class="button btn" href="{{route('register')}}" style=" background-color: #4c8faf; color:#fff">Đăng ký</a>
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