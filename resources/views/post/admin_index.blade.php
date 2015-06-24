{{-- Created at 2015/06/21 06:04 htien Exp $ --}}
@extends('layouts.admin.main_page')

@section('content')

<ol class="breadcrumb">
  <li><a href="{{ route('admin::index') }}">Vùng quản lý</a></li>
  <li class="active">Tin tức - Hoạt động</li>
</ol>

<div class="container-fluid">

  <div class="panel panel-primary posts-list">
    <div class="panel-heading">
      <h2 class="title">
        <span class="literal">Danh sách bài viết</span>
        <a class="btn btn-danger" href="{{ route('admin::@dmin-zone.posts.create') }}">Bài viết mới</a>
        <a class="btn btn-primary" href="javascript:void(0)">Bài viết đã xóa ({{ $countDeletedPosts }})</a>
      </h2>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th style="min-width:40px">#</th>
          <th style="min-width:170px">Ngày đăng</th>
          <th>Tiêu đề</th>
          <th>Tóm tắt</th>
          <th style="min-width:170px;">Cập nhật lần cuối</th>
        </tr>
      </thead>
      <tbody>

        @forelse ($posts as $p)
        <tr>
          <td>{{ $p->id }}</td>
          <td>
            {{ ivy_echo_date($p->post_date) }}
          </td>
          <td>
            <a href="{{ route('admin::@dmin-zone.posts.show', $p->id) }}">{{ $p->post_title }}</a>
          </td>
          <td>{{ $p->post_excerpt }}</td>
          <td>
            {{ ivy_echo_date($p->updated_at) }}
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="5">Chưa có dữ liệu</td>
        </tr>
        @endforelse

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
