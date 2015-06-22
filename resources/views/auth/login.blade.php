{{-- Created at 2015/06/21 12:38 htien Exp $ --}}
@extends('layouts.admin.main_page')

@section('content')

<div class="container-fluid">
  <div class="row">

    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-primary login-panel">
        <div class="panel-heading">Hệ Thống Quản Lý</div>
        <div class="panel-body">
          @if (count($errors) > 0)
          <div class="alert alert-danger">
            <strong>Xác nhận đăng nhập thất bại.</strong>
            <ul>
              @foreach ($errors->all() as $err)
              <li>{{ $err }}</li>
              @endforeach
            </ul>
          </div>
          @endif

          <form class="form-horizontal" action="{{ url('auth/login') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

            <div class="form-group">
              <label class="control-label col-md-4" for="email">ID đăng nhập</label>
              <div class=" col-md-6">
                <input class="form-control" type="email" name="email" value="{{ old('email') }}" />
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-4" for="password">Mật mã</label>
              <div class="col-md-6">
                <input class="form-control" type="password" name="password" />
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button class="btn btn-primary">Đăng nhập</button>
              </div>
            </div>
          </form>
        </div>
        <div class="panel-footer">&copy; {{ date('Y') }} &mdash; Nhà Văn Hóa Thiếu Nhi Gò Vấp.</div>
      </div>
    </div>

  </div>
</div>

@stop
