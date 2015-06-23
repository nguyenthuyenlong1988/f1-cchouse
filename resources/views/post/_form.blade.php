{{-- Created at 2015/06/22 05:26 htien Exp $ --}}

<div class="form-group">
  {!! Form::label('title', 'Tiêu đề bài viết', [ 'class' => 'control-label' ]) !!}
  {!! Form::text('post_title', null, [ 'id' => 'post_title', 'class' => 'form-control', 'placeholder' => 'Nhập tiêu đề', 'required' => 'true' ]) !!}
</div>

<div class="form-group">
  {!! Form::label('excerpt', 'Nội dung Tóm tắt', [ 'class' => 'control-label' ]) !!}
  {!! Form::textarea('post_excerpt', null, [ 'id' => 'post_excerpt', 'class' => 'form-control', 'placeholder' => 'Nhập tóm tắt', 'required' => 'true' ]) !!}
</div>

<div class="form-group">
  {!! Form::label('content', 'NỘI DUNG BÀI VIẾT', [ 'class' => 'control-label' ]) !!}
  {!! Form::textarea('post_content', null, [ 'id' => 'post_content', 'class' => 'form-control', 'placeholder' => 'Nhập nội dung', 'required' => 'true' ]) !!}
</div>

{{--<div class="form-group">--}}
  {{--{!! Form::label('content', 'NỘI DUNG BÀI VIẾT', [ 'class' => 'control-label' ]) !!}--}}
  {{--<textarea id="content" class="tinymce" placeholder="Nhập nội dung" required="true" name="content" rows="40"></textarea>--}}
{{--</div>--}}

<div class="form-group" style="margin-top:40px">
  <div class="btn-group">
    @if (Route::currentRouteNamed('admin::@dmin-zone.posts.edit'))
    <a class="btn btn-info" href="{{ route('admin::@dmin-zone.posts.show', $post->id) }}">Xem bài viết</a>
    @endif
    @if (in_array(Route::currentRouteName(), ['admin::@dmin-zone.posts.create', 'admin::@dmin-zone.posts.edit']))
    {!! Form::submit($button_name, [ 'class' => 'btn btn-primary', 'onclick' => 'get_editor_content()' ]) !!}
    @endif
  </div>
  @if (Route::currentRouteNamed('admin::@dmin-zone.posts.edit'))
  <a class="btn btn-danger pull-right" href="javascript:void(0)" onclick="dlg_post_delete('{{ $post->id }}', '{{ $post->post_title }}', '{{ csrf_token() }}')">Xóa bài viết</a>
  @endif
</div>
