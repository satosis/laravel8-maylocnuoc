
## Trang thương mại điện tử (Source:Đăng quang watch)

Đây là website giúp mọi người có thể tham khảo và mua máy lọc nước một cách dễ dàng , nhận xét về sản phẩm một cách trực quan .
## Công nghệ
- Laravel
- Jquery
- Ajax
- Boostrap
- HTML
- CSS
### Cài đặt
- CMD thường
- Yêu cầu : Xampp , composer
+ Cài đặt bằng cmd :
- composer install
- copy .env.example .env
- php artisan migrate
- php artisan db:seed
- php artisan serve
- Truy cập website :localhost:8000

### Chức năng chính
+ Trang đăng nhập dành cho người dùng
    - Đăng nhập
    - Đăng nhập bằng google , facebook
    - Đăng ký ( email )
    - Quên mật khẩu ( gửi email cho người dùng để người dùng đặt lại mật khẩu)
+ Trang chủ dành cho người dùng
    - Theo dõi các sản phẩm của cửa hàng
+ Trang chi tiết sản phẩm
    - Ảnh sản phẩm
    - Giá sản phẩm
    - Số lượt xem sản phẩm
    - Yêu thích bài viết
    - Đánh giá ( sao , bình luận) sản phẩm
+ Trang giỏ hàng
    - Thêm , bớt số lượng sản phẩm
    - Điền thông tin người nhận
+ Trang admin (http://localhost:8000/api-admin)
Nếu chưa đăng nhập sẽ không vào được trang admin
    - Nếu không có quyền thì chỉ xem và không thể thêm sửa xóa
    - Đăng nhập (http://localhost:8000/admin-auth/login)
    - Thống kê doanh thu , trạng thái các đơn hàng
+ Trang quản lý giao dịch
    - Thông tin khác hàng
    - Giá trị ,trạng thái đơn hàng
    - Thời gian nhận đơn
    - Chi tiết đơn hàng trong view
    - Tìm kiếm đơn hàng
    - Xuất exel
+ Thêm danh mục sản phẩm ,chi tiết sản phẩm, từ khóa , tin tức ,người dùng
+ Trang tổng hợp đánh giá của khách hàng
