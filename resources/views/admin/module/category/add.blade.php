@extends('admin.master')
@section('title','Thêm Danh Mục')
@section('content')


<div class="container add-user">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-login">
                @include('admin.blocks.error')
                <h2 class="text-center text-center">Thêm Danh Mục</h2>
                <form action="" method="POST">
                     @csrf
                    <div class="form-group">
                         <label>Danh mục cha</label>
                            <select class="form-control" name="sltCate"> 
                                <option value="0">Chọn danh mục</option>
                               <?php menuMulti($data,0,$str="--",old('sltCate')); ?>
                            </select>
                    </div>
                    <div class="form-group">
                        <label>Tên danh mục <span class="error">(*)</span></label>
                        <input class="form-control" name="txtCateName" placeholder="Vui lòng nhập tên danh mục" value="{!! old('txtCateName') !!}" />
                    </div>
                    <div class="form-group">
                        <label>Hiển thị </label>
                        <label>
                                <input type="radio" name="rdoPublish" value="1" {{ old('status') == 1 ? 'checked' : '' }}>Yes
                            </label>
                            <label><input type="radio" name="rdoPublish" value="0" {{ old('status') == 0 ? 'checked' : '' }}>No</label>
                        </div>

                        <div class="form-group text-center">
                        
                       <button type="submit" class="btn btn-default">Lưu</button>
                        <button type="reset" class="btn btn-default">Xóa</button>
                    </div>
                        
                </form>
            </div>
        </div>
    </div>
</div>



@endsection
