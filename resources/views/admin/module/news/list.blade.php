@extends('admin.master')
@section('title','Danh sức Tin tức')
@section('content')
<div class="row">
<div class="col-lg-12 list-user">
<h2 class="page-header">Danh sách tin tức<span class="icon-add"><a href="{!! route('getNewsAdd') !!}"><i class="fa fa-plus-circle" aria-hidden="true"></i>Thêm</a></span>
</h2>
</div>
<!-- /.col-lg-12 -->
<table class="table table-striped table-bordered table-hover list-user" id="dataTables-example">
<thead>
<tr align="center">
    <th class="text-center">ID</th>
    <th class="text-center">Tiêu đề</th>
    <th class="text-center">Danh mục</th>
    <th class="text-center">Ngày</th>
    <th class="text-center">Hiển thị</th>
    <th class="text-center">Sửa</th>
    <th class="text-center">Xóa</th>
</tr>
</thead>
<tbody>
    <?php $i=1; ?>
    @foreach($news as $item)
<tr class="odd gradeX" align="center">
    <td>{!! $i !!}</td>
    <td><a href="{!! route('getNewsEdit',['id'=>$item['id']]) !!}">{!! $item['title'] !!}</a></td>
    <td>
    <?php
        $cate = DB::table('mll02_category')->where('id',$item["category_id"])->first();
        ?>
            @if(!empty(@cate['name']))
                {!! $cate->name !!}
            @endif
    </td>
    <td>
        <?php \Carbon\Carbon::setLocale('vi'); ?>
        {!! \Carbon\Carbon::createFromTimeStamp(strtotime($item['created_at'] ))->diffForHumans()!!}</td>
    <td>
        <a href="javascript:void(0);" id="chang-status-news" data-id="{!! $item['id'] !!}"><i class="fa {!! ($item['publish'] == '1' ? "fa-check icon-active" : "fa-times icon-inactive" ) !!}" aria-hidden="true" id="id-{!! $item['id'] !!}"></i>
        </a>
        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
        </td>
    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{!! route('getNewsEdit',['id'=>$item['id']]) !!}">Edit</a></td>
    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{!! route('getNewsDelete',['id'=>$item['id']]) !!}" onclick="return xacnhanxoa('Bạn có chắc muốn xóa không?')"> Delete</a></td>
</tr>
<?php $i++; ?>
@endforeach()
</tbody>
</table>
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
@endsection