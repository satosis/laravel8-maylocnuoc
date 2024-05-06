@extends('layout.user')
@section('profile')

    <div class="lzd-playground-right">
        <div class="breadcrumb"><a>Thông tin cá nhân</a></div>
        <div id="container" class="container">
            <div class="my-profile">
            <img class="profile-user-img img-responsive img-circle" src="{{ pare_url_file(Auth::user()->avatar) }}" style="width:100px;height:100px;border-radius: 50%;" alt="User profile picture">
                <div class="my-profile-bd">
                    <div class="my-profile-item" style="margin-top: 10px">
                        <h3 class="my-profile-item-title">Họ tên</h3>
                        <div class="my-profile-item-info">{{Auth::user()->name}}</div>
                    </div>
                    <div class="my-profile-item">
                        <h3 class="my-profile-item-title"><span>Địa chỉ email</span></h3>
                        <div class="my-profile-item-info">{{Auth::user()->email}}</div>
                    </div>
                    <div class="my-profile-item">
                        <h3 class="my-profile-item-title">Số điện thoại</h3>
                        <div class="my-profile-item-info"><span
                                    class="gray">{{Auth::user()->phone ?? 'Vui lòng nhập số điện thoại của bạn'}} </span>
                        </div>
                    </div>
                    <br>
                    <div class="my-profile-item">
                        <h3 class="my-profile-item-title">Địa chỉ</h3>
                        <div class="my-profile-item-info"><span
                                    class="gray">{{Auth::user()->address ?? 'Vui lòng nhập số địa chỉ của bạn'}} </span>
                        </div>
                    </div>
                    <div class="my-profile-item">
                        <h3 class="my-profile-item-title">Ngày sinh</h3>
                        <div class="my-profile-item-info"><span
                                    class="gray">{{Auth::user()->birthday}} </span>
                        </div>
                    </div>
                    <div class="my-profile-item">
                        <h3 class="my-profile-item-title">Giới tính</h3>
                        <div class="my-profile-item-info"><span
                                    class="gray">{{Auth::user()->gender == 0 ? 'Nam' : 'Nữ'}} </span>
                        </div>
                    </div>
                    <a href="{{ route('get.user.edit')}}"><button type="a" class="next-btn next-btn-warning next-btn-normal next-btn-large">SỬA THÔNG TIN</button></a>
            </div>
        </div>
    </div>
@stop
