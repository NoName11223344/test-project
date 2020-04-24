@extends('site.layout.site')
@section('content')
@include('site.common.header')
<div class="container">
    <div class="box text-center" style="width: 600px; margin:auto">
        @if($user->role == 1)
            <h2 class="text-center text-white pt-5">Bạn đang là người mua hàng</h2>

            <a href="{{route('register_seler')}}">Đăng ký trở thành người bán</a>

            <img src="https://lh3.googleusercontent.com/proxy/ruBPN5euDOwaicFuwDM_LiZ55HiQrD13WugiPDSMgEUpOjfOSAg10MmDz-CRCzWszBBT8-8zzoQ8PLq_PayUcyulcisQ6V6bQgwZoelESgSZHFdmJ25lQT2P" alt="">
        @elseif($user->role == 2)
            <h2 class="text-center text-white pt-5">Bạn đang là người bán hàng</h2>
            <img src="https://image.freepik.com/free-vector/supermarket-seller-woman-character_24877-51024.jpg" alt="">
        @else
            @include('site.common.admin_home')
        @endif
    </div>
</div>

@include('site.common.footer')

@endsection