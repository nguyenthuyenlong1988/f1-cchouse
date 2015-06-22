{{-- Created at 2015/06/21 06:04 htien Exp $ --}}
@extends('layouts.admin.main_page')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('admin::index') }}">Vùng quản lý</a></li>
  <li class="active">Tin tức - Hoạt động</li>
</ol>

<div class="container-fluid">

  <div class="panel panel-primary">
    <div class="panel-footer">
      <a class="btn btn-default" href="{{ route('admin::@dmin-zone.posts.create') }}">Bài viết mới</a>
    </div>
    <div class="panel-heading">Danh sách bài viết</div>
    <table class="table">
      <thead>
        <tr>
          <th>#</th><th>Ngày đăng</th><th>Tiêu đề</th><th>Tóm tắt</th><th>Cập nhật lần cuối</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $p)
        @if ($p->post_type != 'trashed')
        <tr>
          <td>{{ $p->id }}</td>
          <td>
            {{ date_create()->setTimestamp($p->post_date)->setTimezone(new DateTimeZone('Asia/Ho_Chi_Minh'))->format('Y-m-d H:i:s') }}
          </td>
          <td>
            <a href="{{ route('admin::@dmin-zone.posts.show', $p->id) }}">{{ $p->post_title }}</a>
          </td>
          <td>{{ $p->post_excerpt }}</td>
          <td>
            {{ date_create($p->updated_at)->setTimezone(new DateTimeZone('Asia/Ho_Chi_Minh'))->format('Y-m-d H:i:s') }}
          </td>
        </tr>
        @endif
        @endforeach
      </tbody>
    </table>
  </div>

</div>

@stop
