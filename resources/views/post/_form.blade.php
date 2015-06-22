{{-- Created at 2015/06/22 05:26 htien Exp $ --}}

<div class="form-group">
  {!! Form::label('title', 'Tiêu đề bài viết', [ 'class' => 'control-label' ]) !!}
  {!! Form::text('title', null, [ 'id' => 'title', 'class' => 'form-control', 'placeholder' => 'Nhập tiêu đề', 'required' => 'true' ]) !!}
</div>

<div class="form-group">
  {!! Form::label('excerpt', 'Nội dung Tóm tắt', [ 'class' => 'control-label' ]) !!}
  {!! Form::textarea('excerpt', null, [ 'id' => 'excerpt', 'class' => 'form-control', 'placeholder' => 'Nhập tóm tắt', 'required' => 'true' ]) !!}
</div>

<div class="form-group">
  {!! Form::label('content', 'NỘI DUNG BÀI VIẾT', [ 'class' => 'control-label' ]) !!}
  {!! Form::textarea('content', null, [ 'id' => 'content', 'class' => 'form-control', 'placeholder' => 'Nhập nội dung', 'required' => 'true' ]) !!}
</div>

{{--<div class="form-group">--}}
  {{--{!! Form::label('content', 'NỘI DUNG BÀI VIẾT', [ 'class' => 'control-label' ]) !!}--}}
  {{--<textarea id="content" class="tinymce" placeholder="Nhập nội dung" required="true" name="content" rows="40"></textarea>--}}
{{--</div>--}}

<div class="form-group">
  {!! Form::submit($button_name, [ 'class' => 'btn btn-primary', 'onclick' => 'get_editor_content()' ]) !!}
</div>
