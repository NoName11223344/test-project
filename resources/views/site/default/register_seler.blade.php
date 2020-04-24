@extends('site.layout.site')
@section('content')
@include('site.common.header')
<div class="container">

 

    <div class="box" style="width: 600px; margin:auto">
        @if (session('messageSucess'))
            <div class="alert alert-success">
                {{ session('messageSucess') }}
            </div>
        @endif

        @if( !empty( \App\Entity\Seller::checkSeller($user->id)) )
            <div class="update">
                <h2 class="text-center text-white pt-5">Đề nghị trở thành Người bán hàng của bạn <i style="color:red"> đang được xét duyệt</i></h2>
                
                <button class="btn btn-primary " onclick="showUpdate();">
                    Đăng ký lại 
                </button>

                <div id="update-form" style="display: none">
                    <form class="form-horizontal" action="{{route('update_seler_register')}}" method="post">

                    {!! csrf_field() !!}
                        <div class="form-group">
                        <label style="margin: 10px 0" class="control-label" >Tên Doanh nghiệp:</label>
                            <div class="">
                                <input type="text" class="form-control" placeholder="Enter Company Name" name="seller_name" value="{{ \App\Entity\Seller::checkSeller($user->id)->seller_name }}">
                            </div>
                        </div>
                        <div class="form-group">
                        <label style="margin: 10px 0" class="control-label " for="pwd">Địa chỉ :</label>
                            <div class="">          
                                <input type="text" class="form-control" id="pwd" placeholder="Address" name="address" value="{{ \App\Entity\Seller::checkSeller($user->id)->address }}">
                            </div>
                        </div>
                        <input  type="hidden" name="user_id" value="{{$user->id}}">
                        <div class="form-group">        
                            <div class="">
                                <button type="submit" class="btn btn-primary">Đăng ký</button>
                            </div>
                        </div>
                    </form>
                </div>

            <script>
                function showUpdate(){
                    $('#update-form').toggle(500);
                }
            </script>


            </div>
       @else
        
        <h2 class="text-center text-white pt-5">Đăng ký thành người bán hàng</h2>
        <form class="form-horizontal" action="{{route('post_seler_register')}}" method="post">
        {!! csrf_field() !!}
            <div class="form-group">
            <label style="margin: 10px 0" class="control-label" >Tên Doanh nghiệp:</label>
                <div class="">
                    <input type="text" class="form-control" placeholder="Enter Company Name" name="seller_name" value="{{ old('seller_name') }}">
                </div>
            </div>
            <div class="form-group">
            <label style="margin: 10px 0" class="control-label " for="pwd">Địa chỉ :</label>
                <div class="">          
                    <input type="text" class="form-control" id="pwd" placeholder="Address" name="address" value="{{ old('address') }}">
                </div>
            </div>
            <input  type="hidden" name="user_id" value="{{$user->id}}">

            <div class="form-group">        
                <div class="">
                    <button type="submit" class="btn btn-primary">Đăng ký</button>
                </div>
            </div>
        </form>

        @endif
    </div>
</div>

@include('site.common.footer')

@endsection