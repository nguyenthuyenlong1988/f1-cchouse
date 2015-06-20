{{-- Created at 2015/05/27 04:43 htien Exp $ --}}

<!-- My Message -->
<div class="modal fade" id="my-message" tabindex="-1" role="dialog" aria-labelledby="my-message-label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 id="my-message-label" class="modal-title">Thông điệp &mdash; Nhà Thiếu Nhi</h4>
      </div>
      <div class="modal-body" style="position:relative">
        {{--<h4>Đôi điều về thiết kế trang chủ</h4>--}}
        {{--<ul style="list-style: disc inside">--}}
          {{--<li>Phần VideoClip không nên đặt ở chính giữa. Vì VideoClip chiều cao max chỉ đạt khoảng 400px,--}}
            {{--trong khi cột left và right (2 bên) chiều cao ít nhất cũng 1000px cho đến 2000px.--}}
            {{--Suy ra phần cột giữa sẽ bị trống.</li>--}}
          {{--<li>Layout như yêu cầu thường được dùng cách đây 5-10 năm trước. Xu hướng thiết kế hiện nay nên đa dạng phần layout. Ví dụ như demo có thể thấy:<br />--}}
            {{--+ Một phần trình bày <strong>khung slideshow hình ảnh</strong>.<br />--}}
            {{--+ Một phần trình bày <strong>khung clip</strong> (đính kèm thêm lời tựa hấp dẫn + 1 nút đăng ký học).<br />--}}
            {{--+ Tiếp theo, một phần gồm <strong>3 cột đều nhau</strong> (thích hợp trình bày tin tức cố định [hình + mô tả], <strong>hiển thị 3 tin được chọn lọc cố định</strong> (sticky news)<br />--}}
            {{--+ Phần tiếp theo gồm <strong>2 cột nhỏ cạnh bên</strong>, <strong>1 cột lớn chính giữa</strong><br />--}}
              {{--(<strong>Cột giữa</strong> trình bày tin tức hoạt động <strong>mới nhất</strong>)<br />--}}
              {{--(<strong>2 cột bên</strong> vẫn trình bày theo như yêu cầu. <strong>Không nên</strong> trình bày Tin tức nhất ở cột phải, vì đã được trình bày ở cột giữa. Hơn nữa khung bên phải không gian hẹp sẽ không gây chú, trải nghiệm người xem sẽ không tốt.)<br />--}}
            {{--+ Phần kế cuối, gồm <strong>4 cột đều nhau</strong> (trình bày nội dung ngoài lề, tùy ý...)<br />--}}
            {{--+ Phần cuối cùng (màu xám đen, hiển thị địa chỉ (tên đường, quận...))</li>--}}
          {{--<li>Những chức năng như facebook comment, cửa sổ chat trả lời trực tuyến sẽ được tích hợp sau khi đã coding.</li>--}}
        {{--</ul>--}}
        <img src="img/underconstruction.gif" alt="" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">:)</button>
      </div>
    </div>
  </div>
</div>

@yield('page_js_load')