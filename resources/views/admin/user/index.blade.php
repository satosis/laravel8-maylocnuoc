@extends('layout.admin')
@section('content')
    <title>Thông tin sản phẩm</title>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Người dùng
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
                <li class="active">Người dùng</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <table class="table">
                <thead>
                <th>STT</th>
                <th>Tên người dùng</th>
                <th>Điện thoại</th>
                <th>Đăng nhập bằng</th>
                <th>Tạo ngày</th>
                </thead>
                @foreach($user as $list )
                    <tbody>
                    <td>{{ $list->id}}</td>
                    <td>{{ $list->name}}</td>
                    <td>{{ $list->phone}}</td>
                    <td>{{ $list->provider ?? "Trực tiếp"}}</td>
                    <td>{{ $list->created_at}}</td>

                    </tbody>
                @endforeach
            </table>
        </section>
        <div class="box-footer">
            {!! $user->links() !!}
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@stop
