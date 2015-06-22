{{-- Created at 2015/06/21 06:04 htien Exp $ --}}
@extends('layouts.admin.main_page')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('admin::index') }}">Vùng quản lý</a></li>
  <li class="active">Tin tức - Hoạt động</li>
</ol>

<div class="container-fluid">

  <div class="panel panel-primary">
    <div class="panel-heading">
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
        @if (! $posts OR count($posts) == 0)
        <tr>
          <td colspan="5">Chưa có dữ liệu</td>
        </tr>
        @else

        @foreach ($posts as $p)
        @if ($p->post_type != 'trashed')
        <tr>
          <td>{{ $p->id }}</td>
          <td>
            {{ Carbon::createFromTimestamp($p->post_date, $user_timezone)->format($user_dateformat) }}
          </td>
          <td>
            <a href="{{ route('admin::@dmin-zone.posts.show', $p->id) }}">{{ $p->post_title }}</a>
          </td>
          <td>{{ $p->post_excerpt }}</td>
          <td>
            {{ $p->updated_at->setTimezone($user_timezone)->format($user_dateformat) }}
          </td>
        </tr>
        @endif
        @endforeach

        @endif
      </tbody>
      <tfoot>
        <tr>
          <th>#</th><th>Ngày đăng</th><th>Tiêu đề</th><th>Tóm tắt</th><th>Cập nhật lần cuối</th>
        </tr>
      </tfoot>
    </table>
  </div>

</div>

@stop
