
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
   
    <ul class="nav navbar-nav">
      <li class="{{ Request::is('home') ? 'active' : null }}">
        <a href="{{route('home_page')}}">
          Trang chủ
        </a>
      </li>

      @if($user->role == 1)
        <li class="{{ Request::is('seller_register') ? 'active' : null }}">
          <a href="{{route('register_seler')}}">
            Đăng ký Người Bán Hàng
          </a>
        </li>
      @endif

      @if($user->role == 0)
        <li class="{{ Request::is('list-register-seller') ? 'active' : null }}">
          <a href="{{route('list_register_seller')}}">
              Danh sách đăng ký người bán hàng
          </a>
        </li>
        <li class="{{ Request::is('list-seller') ? 'active' : null }}">
          <a href="{{route('list_seller')}}">
              Danh sách người bán hàng
          </a>
        </li>
        
      @endif

    </ul>
    <div class="navbar-header " style="float: right">
      <a style="font-size: 14px; color:#fff" class="navbar-brand" href="#">Xin chào: {{ $user->name }} </a>

      <a class="navbar-brand" style="font-size: 14px; color:#4e82e2" href="{{route('logout')}}">Đăng xuất</a>
    </div>
  </div>
</nav>
