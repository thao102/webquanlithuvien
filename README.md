# webquanlithuvien
# Quản lý Thư viện

Dự án này là một ứng dụng quản lý thư viện, giúp người dùng quản lý sách, nhân viên, và các loại dữ liệu liên quan. Dự án được phát triển bằng PHP với kiến trúc MVC, kết hợp các file Excel để quản lý dữ liệu.

## Cấu trúc dự án

- **Css/**: Chứa các file CSS phục vụ giao diện người dùng.
- **Js/**: Chứa các file JavaScript hỗ trợ chức năng động trên trang web.
- **MVC/**: Chứa các thành phần chính của ứng dụng, bao gồm:
  - **Model**: Xử lý dữ liệu.
  - **View**: Giao diện hiển thị cho người dùng.
  - **Controller**: Xử lý logic ứng dụng và kết nối giữa Model và View.
- **Pictures/**: Thư mục chứa hình ảnh sử dụng trong ứng dụng.
- **Danh sách các Sách.xlsx**: File Excel chứa danh sách các sách trong thư viện.
- **Danh sách loại Sách.xlsx**: File Excel chứa thông tin về các loại sách.
- **ExportExcel.xlsx**: File mẫu dùng để xuất dữ liệu ra Excel.
- **Nhân Viên.xlsx**: File Excel chứa thông tin về nhân viên trong thư viện.

## Các file chính

- **index.php**: File chính khởi chạy ứng dụng.
- **css.css, thanh.css, thanhtable.css**: Các file CSS tùy chỉnh cho giao diện.
- **logotruong.png**: Hình ảnh logo sử dụng trong ứng dụng.

## Tính năng chính

- **Quản lý sách**: Thêm, sửa, xóa, và tìm kiếm sách.
- **Quản lý nhân viên**: Xem thông tin nhân viên và cập nhật dữ liệu.
- **Xuất dữ liệu**: Cho phép xuất dữ liệu sang file Excel để quản lý hiệu quả hơn.

## Cách chạy dự án

1. **Yêu cầu hệ thống**:
   - PHP 7.4 trở lên.
   - Máy chủ web Apache hoặc Nginx.
   - Phần mềm quản lý cơ sở dữ liệu MySQL.
   - Tiện ích mở rộng PHP Excel (nếu dùng tính năng export/import).

2. **Hướng dẫn cài đặt**:
   - Clone dự án từ GitHub:
     ```bash
     git clone <link_dự_án>
     ```
   - Copy tất cả các file vào thư mục gốc của server (VD: `htdocs` nếu dùng XAMPP).
   - Khởi chạy máy chủ web và truy cập đường dẫn:
     ```
     http://localhost/<thư_mục_dự_án>
     ```

3. **Cấu hình cơ sở dữ liệu**:
   - Import các file .sql (nếu có) vào cơ sở dữ liệu.
   - Chỉnh sửa thông tin kết nối cơ sở dữ liệu trong file cấu hình (thường nằm trong thư mục MVC/Model).

## Đóng góp

Nếu bạn muốn đóng góp cho dự án, vui lòng tạo Pull Request hoặc liên hệ qua email.

---

**Người phát triển**: Thao102  
**Liên hệ**: thaonguyen200004@gmail.com
