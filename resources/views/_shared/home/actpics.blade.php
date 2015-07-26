{{-- Created at 2015/07/26 08:42 htien Exp $ --}}

<div id="actPics" class="box">
  <h4 class="box-title"><span>Ảnh hoạt động</span></h4>
  <div class="UISlider">
    <ul class="slideList no-bullets">
      @for ($i = 0; $i < 12; $i++)
        <li>
          <div class="text-center">
            <img src="assets/img/transparent.gif" alt=""
                 style="width: 600px;height: 480px;background-color: #ccc;"/>
            {{ $i }}
          </div>
        </li>
      @endfor
    </ul>
  </div>
</div>
