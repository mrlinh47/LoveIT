@extends('admin.master')
@section('title','Edit User')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="form-login">
				@include('admin.blocks.error')
				<h2 class="text-center">Edit User</h2>
				<form action="" method="POST">
					@csrf
					<div class="form-group">
				        <label for="exampleInputEmail1">FullName</label>
				        <input type="text" class="form-control" id="fullname" name="fullname" value="{!! $user['fullname'] !!}">
				    </div>
				    <div class="form-group">
				        <label for="exampleInputEmail1">UserName</label>
				        <input type="text" class="form-control" id="username" name="username" value="{!! $user['username'] !!}" disabled="disabled">
				    </div>
				    <div class="form-group">
				        <label for="exampleInputEmail1">Email</label>
				        <input type="email" class="form-control" id="email" name="email" value="{!! $user['email'] !!}" >
				    </div>
				    <div class="form-group">
				        <label for="exampleInputPassword1">Password</label>
				        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
				    </div>
				    <div class="form-group">
				        <label for="exampleInputPassword1">Re-Password</label>
				        <input type="password" class="form-control" id="repassword" name="repassword" placeholder="Enter re-password">
				    </div>
				    <div class="form-group">
				        <label for="exampleInputEmail1">Address</label>
				        <input type="text" class="form-control" id="address" name="address" value="{!! $user['address'] !!}" placeholder="Enter Address">
				    </div>
				    @if(Auth::user()->id != $user['id'])
				    <div class="form-group">
				        <label for="exampleInputEmail1">Roles</label>
				        <select class="form-control" name="roles">
                            <option value="">Please choose</option>
                            <option value="1" {{ $user['level'] == 1 ? 'selected' : '' }} >Admin</option>
                            <option value="2" {{ $user['level'] == 2 ? 'selected' : '' }} >User</option>
                        </select>
				    </div>
				    @endif
				    @if(Auth::user()->id != $user['id'])
				    <div class="form-group">
                        <label>Status</label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="status" class="status" value="1" {{ $user['status'] == 1 ? 'checked' : '' }}>Yes
                            </label>
                            <label><input type="radio" name="status" class="status" value="0" {{ $user['status'] == 0 ? 'checked' : '' }}>No</label>
                        </div>
                    </div>
                    @endif
				    <div class="form-group text-center">
				    	<input type="submit" name="edit" class="btn btn-primary" value="Edit" />
				   	</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection