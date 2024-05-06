@extends('layout.user')
@section('profile')
<style>
    .img-thumbnail {
        width:100px;height:100px;border-radius: 50%;
    }
    .remove-image {
        display: none
    }
</style>
    <div class="lzd-playground-right">
        <div class="breadcrumb"><a>Chỉnh sửa</a></div>
        <div id="container" class="container">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="edit-profile">
                <div class="col-sm-4">
                    <div class="box box-warning">
                        <div class="box-body block-images">
                            <div style="margin-bottom: 10px" class="image-area">
                                <img src="{{ pare_url_file(Auth::user()->avatar) }}" class="img-thumbnail" >
                            </div>
                            <input type="file" name="avatar" size="40" class="d-none js-upload imageID"  id="thumbnail-stage"> </a> &nbsp; <span class="label label-info" id="upload-file-info"></span> </div>
                            <label for="thumbnail-stage" class="btn btn-primary">Thay ảnh...</label>
                            </div>
                    </div>
                    <div class="edit-profile-bd" style="margin-top:10px">
                        <div class="edit-profile-item">
                            <h3 class="edit-profile-item-title">Họ tên</h3>
                            <div class="edit-profile-item-info">
                                <div class="mod-input floating edit-profile-input-name mod-input-name">
                                    <input type="text" name="name" id="name" placeholder="Họ Tên"
                                           value="{{ Auth::user()->name }}"><b></b>
                                </div>
                            </div>
                        </div>
                        <div class="edit-profile-item">
                            <h3 class="edit-profile-item-title">
                                <span>Địa chỉ email</span>
                                <div class="mod-input floating  edit-profile-item-value">
                                    <input type="text" readonly name="email" placeholder="Email" value="{{ Auth::user()->email }}">
                                </div>
                        </div>
                        <div class="edit-profile-item">
                            <h3 class="edit-profile-item-title">
                                <span>Số điện thoại</span>
                                <div class="mod-input floating  edit-profile-item-value">
                                    <input type="text" name="phone" placeholder="Số điện thoại" value="{{ Auth::user()->phone }}">
                                </div>
                        </div>
                        <div class="edit-profile-item">
                            <h3 class="edit-profile-item-title">
                                <span>Địa chỉ</span>
                                <div class="mod-input floating  edit-profile-item-value">
                                    <input type="text" name="address" placeholder="Địa chỉ" value="{{ Auth::user()->address }}">
                                </div>
                        </div>
                        <div class="edit-profile-item">
                            <h3 class="edit-profile-item-title">
                                <span>Ngày sinh</span>
                                <div class="mod-input floating  edit-profile-item-value">
                                    <input type="date" name="birthday" value="{{ Auth::user()->birthday }}">
                                </div>
                        </div>
                        <div class="edit-profile-item">
                            <h3 class="edit-profile-item-title">
                                <span>Giới tính</span>
                                <div class="mod-input floating  edit-profile-item-value">
                                    <select name="gender" class="form-control">
                                        <option value="0">Nam</option>
                                        <option value="1" @if(Auth::user()->gender == 1) selected @endif>Nữ</option>
                                    </select>
                                </div>
                        </div>
                        <div class="edit-profile-item">
                            <h3 class="edit-profile-item-title">
                                <span>Mật khẩu hiện tại</span>
                                <div class="mod-input floating  edit-profile-item-value">
                                <input name="oldpassword" type="password" placeholder="Tối thiểu 6 kí tự">
                                </div>
                        </div>
                        <div class="edit-profile-item">
                            <h3 class="edit-profile-item-title">
                                <span>Mật khẩu mới</span>
                                <div class="mod-input floating  edit-profile-item-value">
                                <input name="password" type="password" placeholder="Tối thiểu 6 kí tự">
                                </div>
                        </div>
                        <div class="edit-profile-item">
                            <h3 class="edit-profile-item-title">
                                <span>Nhập lại mật khẩu của bạn</span>
                                <div class="mod-input floating  edit-profile-item-value">
                                <input name="re_password" type="password" placeholder="Tối thiểu 6 kí tự">
                                </div>
                        </div>
                        <div class="change-foot-inner">
                            <button type="submit" class="next-btn next-btn-primary next-btn-large">Lưu thay đổi</button>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    </div>
    </div>
<script src="{{ asset('view/js/script.js') }}"></script>
@stop
