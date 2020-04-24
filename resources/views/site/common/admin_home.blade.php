<div class="content-wrapper" style="min-height: 926px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Danh sách tài khoản </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Danh sách tài khoản </h3>
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
                                                    Tên</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">
                                                  Phân quyền </th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
                                                  Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                 
                                        @foreach( $users as $id => $user )
                                            <tr role="row" class="odd">                                              
                                                <td class="sorting_1">{{$id+1}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->name}}</td>
                                                <td>
                                                  <?php
                                                    switch ($user->role) {
                                                      case 1:
                                                        # code...
                                                        echo 'Người mua';
                                                        break;
                                                      case 2:
                                                          # code...
                                                          echo 'Người bán';
                                                          break;
                                                        
                                                      default:
                                                        # code...
                                                        echo 'admin';
                                                        break;
                                                    }
                                                  ?>
                                                </td>
                                                <td>
                                                  <a id='{{$user->id}}' onclick="return removeUser(this);" title="Xóa" class="btn btn-danger">
                                                    <i class="glyphicon glyphicon-remove"></i>
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
                                                <th rowspan="1" colspan="1">Phân quyền </th>
                                                <th rowspan="1" colspan="1">Thao tác</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                              
                                <div class="col-sm-7">
                                    {{$users->links()}}
                                </div>
                            </div>

                            <script>
                              function removeUser(e){
                                  id = $(e).attr('id');
                                  if(confirm('Bạn có thật sự muốn xóa')){
                                    $.ajax({
                                        url: '{{route("remove_user")}}',
                                        type: 'GET',
                                        data: {
                                          id: id
                                        },
                                    })
                                    .done(function() {
                                        console.log("success");
                                        alert ('Xóa thành công');
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