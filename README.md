# CCHouse


## Hướng dẫn cài đặt

[![How to get project](http://img.youtube.com/vi/AvKp40N2hkM/0.jpg)](http://www.youtube.com/watch?v=AvKp40N2hkME)


## Chạy project

#### **Bước 1**: thực thi lệnh sau để tạo thư mục `vendor` và tự động tải về thư viện.

    composer update

#### **Bước 2**: thay đổi tên một số tập tin sau:

    .env.local             => .env  
    public/.htaccess.local => public/.htaccess

**_Lưu ý_: Không được xóa các tập tin `*.local` và `*.remote` (nhớ kỹ)**

#### **Bước 3**: Tạo database.

Hãy tạo 1 database (tên đặt tùy ý). Đây phải là database rỗng.

#### **Bước 4**: thiết lập cấu hình kết nối đến MySQL.

Mở tập tin `.env` bằng text editor, sau đó cập nhật các thông số kết nối.

#### **Bước 5**: Tự động tạo các table và dữ liệu demo vào database.

* Thực thi lệnh sau để tự động tạo các table:

        artisan migrate

* Thực thi lệnh sau để tự động tạo dữ liệu demo:

        artisan db:seed --class=_MkForTest

* Bên dưới là lệnh kết hợp của 2 lệnh trước (bỏ qua bước này nếu đã thực thi 2 lệnh trên).

        artisan migrate --seeder=_MkForTest


#### Hoàn thành cấu hình.


## License

[MIT license](http://opensource.org/licenses/MIT)
