<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Cách cài đặt 
Chuẩn bị cho môi trường:</br>
-PHP >= 7.0.0</br>
-Composer: Công cụ quản lý package PHP, nó sẽ được dùng để cài đặt app Laravel.</br>
-XAMPP hoặc MAMP: Công cụ gỉa lập server trên máy tính.</br>

Cài đặt project :</br>
Khởi động XAMPP or MAMP</br>
Bước 1: clone dự án về máy</br>
Bước 2: Đổi tên file .env.example thành .env hoặc có thể giải nén thư mục file_env.rar</br>
Bước 3: Chạy lệnh composer install trên terminal </br>
Bước 4: sau khi đã cài đặt thành công các bạn có thể run ứng dụng lên bằng 2 cách.</br>
    Cách 1: truy cập thằng vào folder public của dự án, Nếu sử dụng XAMPP thì các bạn có thể truy cập theo đường dẫn
    http://localhost/test-project/public </br>
    Cách 2: Các bạn dùng terminal truy cập truy cập vào trong folder của dự án và gõ lệnh </br>
    php artisan serve
    
## Giới thiệu project
Project có các chức năng như sau:</br>
1: Đăng ký, đăng nhâp : </br>
Có 3 loại user là : Admin ,người mua và người bán </br>
Khi người dùng đăng ký mặc định sẽ là quyền người mua </br>
2: Gửi Đăng ký thành Người Bán
Sau khi đăng nhập thành công. Người mua có thể đăng ký trở thành người bán và được sự xét duyệt của admin </br>
Người mua có thể gửi lại thông tin đăng ký của mình khi  admin chưa xét duyệt </br>
3: Admin Đăng nhập hệ thông :</br>
Email: buituanviet1234@gmail.com </br>
Password: matkhau1</br>
Admin có thể xem được Tất cả tài khoản trên hệ Thông </br>
Xem được tất cả các đơn Đăng ký thành người bán, Và chấp nhận Cho user trở thành người bán hoặc reject  </br>
Xem được tất cả danh sách người bán





