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
      <a class="btn btn-primary" href="{{ route('admin::@dmin-zone.posts.create') }}">Bài viết mới</a>
    </div>
    <div class="panel-heading">Danh sách bài viết</div>
    <table class="table">
      <thead>
        <tr>
          <th>#</th><th>Ngày đăng</th><th>Tiêu đề</th><th>Tóm tắt</th><th>Cập nhật lần cuối</th>
        </tr>
      </thead>
      <tbody>

        @forelse ($posts as $p)
        <tr>
          <td>{{ $p->id }}</td>
          <td>
            <?php $tmp_post_date = $p->post_date->setTimezone($user_timezone); ?>
            @if ($tmp_post_date->isToday())
              Mới hôm nay @ {{ $tmp_post_date->format($user_hourformat) }}
            @elseif ($tmp_post_date->isYesterday())
              Hôm qua @ {{ $tmp_post_date->format($user_hourformat) }}
            @else
              {{ $tmp_post_date->format($user_dateformat) }}
            @endif
          </td>
          <td>
            <a href="{{ route('admin::@dmin-zone.posts.show', $p->id) }}">{{ $p->post_title }}</a>
          </td>
          <td>{{ $p->post_excerpt }}</td>
          <td>
            @if ($p->updated_at->setTimezone($user_timezone)->isToday())
              Mới hôm nay @ {{ $p->updated_at->format($user_hourformat) }}
            @elseif ($p->updated_at->isYesterday())
              Hôm qua @ {{ $p->updated_at->format($user_hourformat) }}
            @else
              <?php $tmp_updated_at = $p->updated_at->setTimezone($user_timezone); ?>
              @if ($tmp_updated_at->isToday())
                Mới hôm nay @ {{ $tmp_updated_at->format($user_hourformat) }}
              @elseif ($tmp_updated_at->isYesterday())
                Hôm qua @ {{ $tmp_updated_at->format($user_hourformat) }}
              @else
                {{ $tmp_updated_at->format($user_dateformat) }}
              @endif
            @endif
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
