@extends('back-end.layouts.base')
@section('content')
<div class="content-wrapper" style="min-height: 1203.6px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tin tức</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Danh sách tin tức</li>
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
                <h3 class="card-title" style="float:right"><a href="{{URL::to('/back-end/add-blog')}}"><button class="btn btn-primary btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Add">Thêm tin tức</button></a></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                  <thead>
                  <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Tiêu đề tin tức</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Ảnh tin tức</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Lượt xem</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Nội dung</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Ngày đăng</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Edit</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($blogs as $blog)
                  <tr role="row" class="odd">
                    <td>{{ $blog->id }}</td>
                    <td style="width:400px">{{ $blog->news_title }}</td>
                    <td><img src="{{ asset($blog->news_image) }}" alt="" width="100px"/></td>
                    <td>{{ $blog->views }}</td>
                    <td><details><summary>Mô tả</summary>{!! $blog->news_detail !!}</details></td>
                    <td>{{ $blog->created_at }}</td>
                    <td><a href="edit-blog/{{ $blog->id }}"><button class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></a></td>
                    <td><a href="delete-blog/{{ $blog->id }}"><button class="btn btn-danger btn-sm rounded-0" onclick="return confirm('Bạn có chắc muốn xóa tin tức này?')" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button></a></td>
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
                {{ $blogs->links() }}
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