@extends('back-end.layouts.base')
@section('content')
<div class="content-wrapper" style="min-height: 1203.6px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Slide</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Danh sách slide</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title" style="float:right"><a href="{{URL::to('/back-end/add-slide')}}"><button class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Add">Thêm slide</button></a></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                  <thead>
                  <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Tiêu đề slide</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Ảnh slide</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Trạng thái</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Nội dung</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Link</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Edit</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($slider as $slide)
                  <tr role="row" class="odd">
                    <td>{{ $slide->id }}</td>
                    <td>{{ $slide->slide_title}}</td>
                    <td><img src="{{ asset($slide->slide_image) }}" alt="" width="100px"/></td>
                    <td style="text-align:center">
                    @if($slide->status == 0)
                        <a href="{{URL::to('back-end/list-slide/'.$slide->id)}}"><button class="btn btn-info" type="button" data-toggle="tooltip" data-placement="top" >Đang hiển thị</button></a>
                      @else
                      <a href="{{URL::to('back-end/list-slide/'.$slide->id)}}"><button class="btn btn-primary" type="button" data-toggle="tooltip" data-placement="top">Đang ẩn</button></a>
                      @endif
                    </td>
                    <td><details><summary>Nội dung</summary>{!! $slide->slide_detail !!}</details></td>
                    <td><a href="{{route('product')}}">Link</a></td>
                    <td><a href="edit-slide/{{$slide->id}}"><button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a></td>
                    <td><a href="delete-slide/{{$slide->id}}"><button class="btn btn-danger btn-sm rounded-0"  onclick="return confirm('Bạn có chắc muốn xóa slide này?')" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button></td>
                    </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  @if (\Session::has('success'))
                    <div class="alert alert-success">
                      <ul>
                        <li>{!! \Session::get('success') !!}</li>
                      </ul>
                    </div>
                  @endif
                  </tfoot>
                </table></div></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection