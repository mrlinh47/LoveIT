@extends('admin.master')
@section('title','Danh sách danh mục')
@section('content')
<div class="row">
<div class="col-lg-12 list-user">
    <h2 class="page-header text-center">
        Danh sách chuyên mục <span class="icon-add"><a href="{!! route('getCateAdd') !!}"><i class="fa fa-plus-circle" aria-hidden="true"></i>Thêm</a></span>
    </h2>
</div>
<!-- /.col-lg-12 -->
<table class="table table-striped table-bordered table-hover list-user" id="dataTables-example">
    <thead>
        <tr align="center">
            <th class="text-center">Tên danh mục</th>
            <th class="text-center">Xuất bản</th>
            <th class="text-center">Sửa</th>
            <th class="text-center">Xóa</th>
            <th class="text-center aa">ID</th>
        </tr>
    </thead>
    <tbody>
        
        <?php echo listCate($data); ?>
        
    </tbody>
</table>
</div>
<!-- /.row -->
@endsection