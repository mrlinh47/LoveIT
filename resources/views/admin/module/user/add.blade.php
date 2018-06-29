@extends('admin.master')
@section('title','Add User')
@section('content')
<div class="container add-user">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="form-login">
				@include('admin.blocks.error')
				<h2 class="text-center">Thêm người dùng</h2>
				<form action="" method="POST">
 					 @csrf
					<div class="form-group">
				        <label for="exampleInputEmail1">FullName <span class="error">(*)</span></label>
				        <input type="text" class="form-control" id="fullname" name="fullname" value="{!! old('fullname') !!}" placeholder="Enter username">
				    </div>
				    <div class="form-group">
				        <label for="exampleInputEmail1">UserName <span class="error">(*)</span></label>
				        <input type="text" class="form-control" id="username" name="username" value="{!! old('username') !!}" placeholder="Enter username">
				    </div>
				    <div class="form-group">
				        <label for="exampleInputEmail1">Email <span class="error">(*)</span></label>
				        <input type="email" class="form-control" id="email" name="email" value="{!! old('email') !!}" placeholder="Enter email">
				    </div>
				    <div class="form-group">
				        <label for="exampleInputPassword1">Password <span class="error">(*)</span></label>
				        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
				    </div>
				    <div class="form-group">
				        <label for="exampleInputPassword1">Re-Password <span class="error">(*)</span></label>
				        <input type="password" class="form-control" id="repassword" name="repassword" placeholder="Enter re-password">
				    </div>
				    <div class="form-group">
				        <label for="exampleInputEmail1">Address</label>
				        <input type="text" class="form-control" id="address" name="address" value="{!! old('address') !!}" placeholder="Enter Address">
				    </div>
				    <div class="form-group">
				        <label for="exampleInputEmail1">Roles <span class="error">(*)</span></label>
				        <select class="form-control" name="level">
                            <option value="">Please choose</option>
                            <option value="1" {{ old('level') == 1 ? 'selected' : '' }} >Admin</option>
                            <option value="2" {{ old('level') == 2 ? 'selected' : '' }} >User</option>
                        </select>
				    </div>
				    <div class="form-group">
                        <label>Status</label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="status" class="status" value="1" {{ old('status') == 1 ? 'checked' : '' }}>Yes
                            </label>
                            <label><input type="radio" name="status" class="status" value="0" {{ old('status') == 0 ? 'checked' : '' }}>No</label>
                        </div>
                    </div>
				    <div class="form-group text-center">
				    	<input type="submit" name="save" class="btn btn-primary" value="Save" />
				   	</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection