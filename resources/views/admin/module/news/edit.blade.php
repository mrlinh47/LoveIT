@extends('admin.master')
@section('title','Sửa Tin tức')
@section('content')
<div class="row">
<div class="col-lg-12">
<h2 class="page-header text-center">Sửa tin tức
</h2>
</div>
<!-- /.col-lg-12 -->
<div class="col-lg-8 col-md-offset-2" style="padding-bottom:120px">
    <div class="form-login">
<form action="" method="POST"  enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
     <div class="form-group">
    <label>Danh mục</label>
    <select class="form-control" name="sltCate"> 
        <option value="">Chọn danh mục</option>
       <?php menuMulti($cate,0,$str="--",$news['category_id']); ?>
    </select>
</div>
    <div class="form-group">
        <label>Tiêu đề</label>
        <input class="form-control" name="txtTitle" placeholder="Vui lòng nhập tiêu đề"  value="{!! old('txtTitle',isset($news['title']) ? $news['title'] : null ) !!}"  />
    </div>
    <div class="form-group">
        <label>Tác giả</label>
        <input class="form-control" name="txtAuthor" placeholder="Vui lòng nhập tác giả" value="{!! old('txtAuthor',isset($news['author']) ? $news['author'] : null ) !!}" />
    </select>
    </div>
    <div class="form-group">
        <label>Intro text</label>
        <textarea class="form-control" rows="3" name="txtIntro">{!! old('txtIntro',isset($news['introtext']) ? $news['introtext'] : null ) !!}</textarea>
        {!! csrf_field() !!}
    </div>
    <div class="form-group">
        <label>Nội dung</label>
        <textarea class="form-control" rows="3" name="txtContent">{!! old('txtContent',isset($news['fulltext']) ? $news['fulltext'] : null ) !!}</textarea>
        {!! csrf_field() !!}
    </div>
    <?php if($news['image']): ?>
    <div class="form-group">
        <label>Hình ảnh hiện tại</label>
        <?php 
        $image = isset($news['image']) ? asset('uploads/news/'.$news['image']) :  asset('uploads/nophoto.png');
        ?>
        <img src="{!! $image !!}" width="120px">
        <input type="hidden" name="fImageCurrent" value="{!! $news['image'] !!}">
    </div>
    <?php endif; ?>
    <div class="form-group">
        <label>Hình ảnh</label>
        <input type="file" name="fImages">
    </div>
    <div class="form-group">
        <label>Xuất bản</label>
        <label class="radio-inline">
            <input name="rdoPulish" value="1" type="radio" checked="checked"
            @if($news['publish'] == '1')
                checked
            @endif
            >Có
        </label>
        <label class="radio-inline">
            <input name="rdoPulish" value="0" type="radio"
                @if($news['publish'] == '0')
                checked
            @endif
            >Không
        </label>
    </div>
    <button type="submit" class="btn btn-default">Sửa</button>
    <button type="reset" class="btn btn-default">Xóa</button>
</form>
</div>
</div>
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
@endsection
<script type="text/javascript" src="{!! asset('admrlinh/tinymce/js/tinymce/tinymce.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('admrlinh/tinymce/js/tinymce/tinymce.js') !!}"></script>
<script type="text/javascript">
    
       tinymce.init(editor_config);
</script>