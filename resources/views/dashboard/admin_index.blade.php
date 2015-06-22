{{-- Created at 2015/06/21 06:05 htien Exp $ --}}
@extends('layouts.admin.main_page')

@section('content')

<div class="container">

  <div class="panel panel-primary admin-panel">
    <div class="panel-heading">Vùng quản lý</div>
    <div class="panel-body">
      <p>Danh mục các chức năng quản lý chính.</p>

      <div class="row">

        <div class="col-md-6">

          <div class="panel panel-danger">
            <div class="panel-heading">
              <a class="btn btn-default" href="{{ route('admin::@dmin-zone.posts.index') }}">Tin tức - Hoạt động</a>
            </div>
            <div class="panel-body">
            </div>
          </div>

          <div class="panel panel-info">
            <div class="panel-heading">...</div>
            <div class="panel-body">
              ...
            </div>
          </div>

        </div>

        <div class="col-md-6">

          <div class="panel panel-success">
            <div class="panel-heading">...</div>
            <div class="panel-body">
              ...
            </div>
          </div>

          <div class="panel panel-warning">
            <div class="panel-heading">...</div>
            <div class="panel-body">
              ...
            </div>
          </div>

        </div>

      </div>

    </div>
  </div>

</div>

@stop
