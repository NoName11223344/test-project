@extends('site.layout.site')
@section('content')
@include('site.common.header')
<div class="container">
    <div class="box text-center" style="width: 600px; margin:auto">
    <div class="content-wrapper" style="min-height: 926px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Danh sách tài khoản cần phê duyệt </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Danh sách tài khoản cần phê duyệt </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <div class="row">
                                <div class="col-sm-6">
                                </div>
                                <div class="col-sm-6">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column descending" aria-sort="ascending">
                                                    Id</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                                                    Email</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                    Tên </th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">
                                                    Tên đăng ký</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">
                                                    Địa chỉ </th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
                                                  Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                 
                                        @foreach( $sellers as $id => $seller )
                                        
                                            <tr role="row" class="odd">                                              
                                                <td class="sorting_1">{{$id+1}}</td>
                                                <td>{{$seller->user_email}}</td>
                                                <td>{{$seller->user_name}}</td>
                                                <td>
                                                    {{$seller->seller_name}}
                                                </td>
                                                <td>
                                                    {{$seller->address}}
                                                </td>
                                                <td>
                                                  <a id='{{$seller->seller_id}}' user_id="{{$seller->user_id}}" onclick="return submitSeller(this);" title="Phê duyệt " class="btn btn-success">
                                                    <i class="glyphicon glyphicon-ok"></i>
                                                  </a>
                                                  <a id='{{$seller->seller_id}}' onclick="return rejectSeller(this);" title="Từ chối" class="btn btn-danger">
                                                    <i class="glyphicon glyphicon-remove-circle"></i>
                                                  </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th rowspan="1" colspan="1">Id</th>
                                                <th rowspan="1" colspan="1">Email</th>
                                                <th rowspan="1" colspan="1">Tên</th>
                                                <th rowspan="1" colspan="1">Tên đăng ký</th>
                                                <th rowspan="1" colspan="1">Địa chỉ </th>

                                                <th rowspan="1" colspan="1">Thao tác</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                              
                                <div class="col-sm-7">
                                    {{$sellers->links()}}
                                </div>
                            </div>

                            <script>
                            function submitSeller(e){
                                  id = $(e).attr('id');
                                  user_id = $(e).attr('user_id');

                                  if(confirm('Bạn có thật sự muốn phê duyệt ')){
                                    $.ajax({
                                        url: '{{route("submit_register_seller")}}',
                                        type: 'GET',
                                        data: {
                                          id: id,
                                          user_id: user_id
                                        },
                                    })
                                    .done(function() {
                                        console.log("success");
                                        alert ('Duyệt thành công');
                                        $(e).parent().parent().remove();
                                    })
                                    .fail(function() {
                                        console.log("error");
                                    })
                                    .always(function() {
                                        console.log("complete");
                                    });
                                  }
                            }   
                            function rejectSeller(e){
                                  id = $(e).attr('id');
                             
                                  if(confirm('Bạn có thật sự muốn Từ chối')){
                                    $.ajax({
                                        url: '{{route("reject_register_seller")}}',
                                        type: 'GET',
                                        data: {
                                          id: id,                                       
                                        },
                                    })
                                    .done(function() {
                                        console.log("success");
                                        alert ('Từ chôi thành công');
                                        $(e).parent().parent().remove();
                                    })
                                    .fail(function() {
                                        console.log("error");
                                    })
                                    .always(function() {
                                        console.log("complete");
                                    });
                                  }
                            }

                            </script>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>

    
    <!-- /.content -->
</div>
    </div>
</div>

@include('site.common.footer')

@endsection