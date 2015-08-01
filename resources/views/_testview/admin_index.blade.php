{{-- Created at 2015/07/14 17:17 htien Exp $ --}}
@extends('_layouts.admin.main_page')

@section('content')

<div class="container-fluid" style="margin-top: 20px;color: #fff">

    <div data-ng-controller="MyController">
        <input class="form-control" type="text" data-ng-model="author.name" placeholder="Enter a name here" />
        <p>Hello, <span data-ng-bind="author.name + ', ' + author.email"></span></p>
        <hr />
        <p data-ng-bind="author.name + ', ' + author.email"></p>
    </div>
</div>

@stop
