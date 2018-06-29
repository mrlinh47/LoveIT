@extends('admin.master')
@section('title','Thêm Tin tức')
@section('content')
<div class="row">
<div class="col-lg-12">
<h2 class="page-header text-center">Thêm Tin tức
</h2>
</div>
<!-- /.col-lg-12 -->
<div class="container edit-user add-user">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="form-login">
                @include('admin.blocks.error')
<form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
    <label>Danh mục</label>
    <select class="form-control" name="sltCate"> 
        <option value="">Chọn danh mục</option>
       <?php menuMulti($cate,0,$str="--",old('sltCate')); ?>
    </select>
</div>
    <div class="form-group">
        <label>Tiêu đề <span class="error">(*)</span></label>
        <input class="form-control" name="txtTitle" placeholder="Vui lòng nhập tiêu đề" value="{!! old('txtTitle') !!}" />
    </div>
    <div class="form-group">
        <label>Tác giả</label>
        <input class="form-control" name="txtAuthor" placeholder="Vui lòng nhập tác giả" value="{!! old('txtAuthor') !!}" />
    </select>
    </div>
    <div class="form-group">
        <label>Intro text</label>
        <textarea class="form-control my-editor" rows="3" name="txtIntro">{!! old('txtIntro') !!}</textarea>
        {!! csrf_field() !!}
    </div>
    <div class="form-group">
        <label>Nội dung</label>
        <textarea class="form-control my-editor" rows="3" name="txtContent">{!! old('txtContent') !!}</textarea>
        {!! csrf_field() !!}
    </div>
    <div class="form-group">
        <label>Hình ảnh</label>
        <input type="file" name="fImages">
    </div>
    <div class="form-group">
        <label>Xuất bản</label>
        <label class="radio-inline">
            <input name="rdoPulish" value="1" type="radio" checked="checked"
            @if(old('rdoPulish') == '1')
                checked
            @endif
            >Có
        </label>
        <label class="radio-inline">
            <input name="rdoPulish" value="0" type="radio"
                @if(old('rdoPulish') == '0')
                checked
            @endif
            >Không
        </label>
    </div>
    <button type="submit" class="btn btn-default">Lưu</button>
    <button type="reset" class="btn btn-default">Xóa</button>
<form>
</div>
</div>
<!-- /.row -->
</div>
        </div>
    </div>
</div>

<!-- /.container-fluid -->
@endsection

<script type="text/javascript" src="{!! asset('admrlinh/tinymce/js/tinymce/tinymce.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('admrlinh/tinymce/js/tinymce/tinymce.js') !!}"></script>

<script type="text/javascript">
        var editor_config = {
    path_absolute : "/",
    selector: "textarea.my-editor",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };
       tinymce.init(editor_config);
</script>
