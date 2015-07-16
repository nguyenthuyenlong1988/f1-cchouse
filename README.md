# CCHouse


## Hướng dẫn cài đặt

#### Hướng dẫn bằng video clip

[![How to get project](http://img.youtube.com/vi/AvKp40N2hkM/0.jpg)](http://www.youtube.com/watch?v=AvKp40N2hkME)


## Thiết lập project

#### **Bước 1**: tự động tải thư viện.

Thư mục **`'vendor'`** (chứa các thư viện PHP) và **`'public/assets/libs/closure-library'`** (chứa thư viện Google Closure) sẽ tự động được cập nhật, thực hiện lệnh bên dưới.

    composer update
    git submodule update --init

#### **Bước 2**: thay đổi một số tập tin sau.

Thay đổi bằng cách copy và rename các tập tin bên dưới:

    .env.local             => .env  
    public/.htaccess.local => public/.htaccess

**_Lưu ý_: Không được xóa các tập tin `*.local` và `*.remote` (nhớ kỹ)**

#### **Bước 3**: tạo application key.

Tạo key cho ứng dụng. Web không thể chạy nếu không có **`application key`**.  
Thực hiện lệnh:

    artisan key:generate

#### **Bước 4**: Tạo database.

Hãy tạo 1 database (tên đặt tùy ý). Đây phải là database rỗng.

#### **Bước 5**: thiết lập cấu hình kết nối MySQL.

Mở tập tin `.env` bằng text editor, sau đó cập nhật các thông số kết nối.

#### **Bước 6**: Tự động tạo các table và dữ liệu demo vào database.

* Thực thi lệnh sau để tự động tạo các table:

        artisan migrate

* Thực thi lệnh sau để tự động tạo dữ liệu demo:

        artisan db:seed --class=_MkForTest

* Bên dưới là lệnh kết hợp của 2 lệnh trước (bỏ qua bước này nếu đã thực thi 2 lệnh trên).

        artisan migrate --seeder=_MkForTest


##### Hoàn thành cấu hình.


## Cấu trúc 'chủ yếu' thư mục project

    /
    |--- app/                            =>
    |    |--- Http/                      =>
    |    |    |--- Controllers/          =>
    |    |    |--- Middleware/           =>
    |    |    |--- Request/              =>
    |    |    |--- helpers.php           =>
    |    |    |--- routes.php            =>
    |    |
    |    |--- Jobs/                      =>
    |    |--- Listeners/                 =>
    |    |--- Providers/                 =>
    |    |--- (...Model classes...)      =>
    |
    |--- bootstrap/                      =>
    |--- config/                         =>
    |--- database/                       =>
    |--- public/                         =>
    |    |--- app-admin/                 =>
    |    |--- app-home/                  =>
    |    |--- assets/                    =>
    |    |    |--- img/                  =>
    |    |    |--- js/                   =>
    |    |    |--- libs/                 =>
    |    |
    |    |--- media/                     =>
    |    |--- uploads/                   =>
    |    |--- user-media/                =>
    |    |--- .htaccess                  =>
    |
    |--- resources/                      =>
    |    |--- views/                     =>
    |         |--- errors/               =>
    |         |--- layouts/              =>
    |         |--- partials/             =>
    |         |--- (...Page views...)    =>
    |
    |--- storage/                        =>
    |--- tests/                          =>
    |--- vendor/                         =>
    |--- .env                            =>
    ...
      


## License

[MIT license](http://opensource.org/licenses/MIT)
