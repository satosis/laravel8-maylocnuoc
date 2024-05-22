@extends('layout.admin')
@section('content')
    <title>Thông tin danh mục sản phẩm</title>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Danh mục sản phẩm
                <small><a href="{{ route('admin.category.create') }}" class="btn btn-primary">Thêm mới</a></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin.category.index') }}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                <li class="active">Danh mục</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="col-md-12">
                <table class="table">
                    <tbody>
                    <tr>
                        <th>STT</th>
                        <th style="width: 360px;">Tên</th>
                        <th style="width: 180px;">Thể loại</th>
                        <th>Thời gian cập nhật</th>
                        <th>Thời gian tạo</th>
                        <th style="width: 200px;">Hành động</th>
                    </tr>
                    @if($category)
                        @foreach($category as $list)
                            <tr>
                                <td>{{$list->id}}</td>
                                <td>{{$list->c_name}}</td>
                                <td>
                                    @if ($list->c_cate == 'watch')
                                        Máy lọc nước
                                    @elseif ($list->c_cate == 'glass')
                                        THIẾT BỊ LỌC NƯỚC
                                    @else
                                        THIẾT BỊ ĐO
                                    @endif
                                </td>
                                <td>{{$list->updated_at}}</td>
                                <td>{{$list->created_at}}</td>
                                <td><a href="{{route('admin.category.update',$list->id) }}" class="btn btn-primary"><i
                                                class="fa fa-edit"></i> Sửa</a>

                                    <a href="{{route('admin.category.delete',$list->id) }}"
                                       class="btn btn-danger js-query-confirm"><i class="fa fa-times"></i> Xóa</a></td>


                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>

            </div>
            <div class="box-footer">
                {!! $category->links() !!}
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@stop
