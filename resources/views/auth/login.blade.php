{{-- Created at 2015/06/21 12:38 htien Exp $ --}}
@extends('layouts.admin.main_page')

@section('page_title', 'Đăng nhập')

@section('content')

<div class="container-fluid">
  <div class="row">

    <div class="col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3">
      <div class="panel panel-primary login-panel">
        <div class="panel-heading">Hệ Thống Quản Lý</div>
        <div class="panel-body">
          <div class="text-center">
            <img src="img/home_logo_h120.png" alt="Admin logo" style="margin-bottom:15px" />
          </div>

          @if (count($errors) > 0)
          <div class="alert alert-danger">
            <strong>Xác nhận đăng nhập thất bại.</strong>
            <ul>
              @foreach ($errors->all() as $err)<li>{{ $err }}</li>@endforeach
            </ul>
          </div>
          @endif

          {!! Form::open(['class' => 'form-horizontal', 'method' => 'POST', 'url' => 'auth/login']) !!}

            <div class="form-group">
              {!! Form::label('email', 'ID đăng nhập', ['class' => 'control-label col-md-3']) !!}
              <div class="col-md-7">
                {!! Form::email('email', null, [ 'class' => 'form-control', 'placeholder' => 'your_email@example.com' ]) !!}
              </div>
            </div>

            <div class="form-group">
              {!! Form::label('password', 'Mật mã', ['class' => 'control-label col-md-3']) !!}
              <div class="col-md-7">
                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '*****']) !!}
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-3">
                {!! Form::submit('Đăng nhập', ['class' => 'btn btn-primary']) !!}
              </div>
            </div>

          {!! Form::close() !!}
        </div>
        <div class="panel-footer">&copy; {{ date('Y') }} &mdash; Nhà Văn Hóa Thiếu Nhi Gò Vấp.</div>
      </div>
    </div>

  </div>
</div>

@stop
