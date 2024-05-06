<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Http\Requests\UserRequestUpdate;
use Illuminate\Support\Facades\Hash;
use Session;
use Auth;

class UpdateUserController extends Controller
{
    public function edit(){
        $category =Category::all();
        $viewData=[
            'category'=>$category,
            'title_page'=>'Chỉnh sửa thông tin cá nhân'
        ];
        return view('user.edit',$viewData);
    }

    public function new_address(){
        $category =Category::all();
        $viewData=[
            'category'=>$category,
            'title_page'=>'Thêm mới địa chỉ'
        ];
        return view('user.new_address',$viewData);
    }

    public function edit_address(){
        $category =Category::all();
        $viewData=[
            'category'=>$category,
            'title_page'=>'Đổi địa chỉ'
        ];
        return view('user.edit_address',$viewData);
    }


    public function store(Request $request){
        $category =Category::all();
        $data =$request->except('_token', 'avatar');
        if ($request->avatar) {
            $image = upload_image('avatar');
            if ($image['code'] == 1) {
                $data['avatar'] = $image['name'];
            }
        }
        if(isset($data['password'])) {
            if (strlen($request->password) < 6) {
                Session::flash('toastr', [
                    'type' => 'error',
                    'message' => 'Mật khẩu ít nhất 6 ký tự'
                ]);
                return redirect()->back();
            }
            if ($request->password == $request->oldpassword) {
                Session::flash('toastr', [
                    'type' => 'error',
                    'message' => 'Mật khẩu mới trùng mật khẩu cũ. Vui lòng dùng mật khẩu khác'
                ]);
                return redirect()->back();
            }
            if ($request->re_password != $request->password) {
                Session::flash('toastr', [
                    'type' => 'error',
                    'message' => 'Mật khẩu xác nhận không đúng'
                ]);
                return redirect()->back();
            }
            if (!Hash::check($request->oldpassword, Auth::user()->password)) {
                Session::flash('toastr', [
                    'type' => 'error',
                    'message' => 'Mật khẩu cũ không đúng. Vui lòng thử lại'
                ]);
                return redirect()->back();
            }
            $data['password'] = Hash::make($data['password']);
        }
        $user = User::find(\Auth::user()->id);
        $user->update($data);
        Session::flash('toastr', [
            'type' => 'success',
            'message' => 'Cập nhật thành công'
        ]);
        return redirect()->back()->with('status','Cập nhật thành công');
    }
}
