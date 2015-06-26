{{-- Created at 2015/06/22 05:26 htien Exp $ --}}

<div class="form-group">
  {!! Form::label('post_title', 'Tiêu đề bài viết', ['class' => 'control-label']) !!}
  {!! Form::text('post_title', null, ['id' => 'post_title', 'class' => 'form-control', 'placeholder' => 'Nhập tiêu đề', 'required' => 'true']) !!}
</div>

<div class="form-group">
  {!! Form::label('post_excerpt', 'Nội dung Tóm tắt', ['class' => 'control-label']) !!}
  {!! Form::textarea('post_excerpt', null, ['id' => 'post_excerpt', 'class' => 'form-control', 'placeholder' => 'Nhập tóm tắt', 'required' => 'true']) !!}
</div>

<div class="form-group">
  {!! Form::label('post_content', 'NỘI DUNG BÀI VIẾT', ['class' => 'control-label']) !!}
  {!! Form::textarea('post_content', null, ['id' => 'post_content', 'class' => 'form-control froala', 'placeholder' => 'Nhập nội dung', 'required' => 'true']) !!}
</div>

{{--<div class="form-group">--}}
  {{--{!! Form::label('post_content', 'NỘI DUNG BÀI VIẾT', [ 'class' => 'control-label' ]) !!}--}}
  {{--<textarea id="post_content" class="form-control froala" placeholder="Nhập nội dung" required="true" name="post_content" rows="25">--}}
    {{--@if (Route::currentRouteNamed('admin::@dmin-zone.posts.edit')) {{ ($post->post_content) }} @endif--}}
  {{--</textarea>--}}
{{--</div>--}}

<div class="form-group" style="margin-top:40px">
  <div class="btn-group">
    @if (Route::currentRouteNamed('admin::@dmin-zone.posts.edit'))
    <a class="btn btn-info" href="{{ route('admin::@dmin-zone.posts.show', $post->id) }}">Bài viết #{{ $post->id }}</a>
    @endif
    @if (in_array(Route::currentRouteName(), ['admin::@dmin-zone.posts.create', 'admin::@dmin-zone.posts.edit']))
    {!! Form::submit($button_name, ['class' => 'btn btn-primary']) !!}
    @endif
  </div>
  @if (Route::currentRouteNamed('admin::@dmin-zone.posts.edit'))
  <a class="btn btn-danger pull-right" href="javascript:void(0)" onclick="_func.cfmOnDeleteRecord('{{ $post->id }}', '{{ $post->post_title }}', '{{ csrf_token() }}')">Xóa bài viết</a>
  @endif
</div>
