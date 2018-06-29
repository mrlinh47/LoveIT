@extends('admin.master')
@section('title','Sửa Danh Mục')
@section('content')

<div class="container edit-user">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-login">
                @include('admin.blocks.error')
                <h2 class="text-center text-center">Sửa danh mục</h2>
                <form action="" method="POST">
                     @csrf
                    <div class="form-group">
                         <label>Danh mục cha</label>
                            <select class="form-control" name="sltCate"> 
                            <option value="0">Chọn danh mục</option>
                           <?php menuMulti($data,0,$str="--",$parent['parent_id']); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tên danh mục</label>
                        <input class="form-control" name="txtCateName" value="{!! old('txtCateName',isset($parent['name']) ? $parent['name'] : null ) !!}" />
                    </div>
                    <div class="form-group">
                        <label>Hiển thị </label>
                        <label>
                                <input type="radio" name="rdoPublish" value="1" @if($parent['publish'] == '1')
                                    checked 
                                @endif>Yes
                            </label>
                            <label><input type="radio" name="rdoPublish" value="0" @if($parent['publish'] == '0')
                                checked 
                            @endif>No</label>
                        </div>
                        
                        <div class="form-group text-center">
                        
                       <button type="submit" class="btn btn-default">Lưu</button>
                        <button type="reset" class="btn btn-default">Xóa</button>
                    </div>

                    </div>
                    
                    
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
