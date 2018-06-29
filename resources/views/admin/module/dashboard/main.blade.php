@extends('admin.master')
@section('title','Trang Admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="form-login text-center">
                    <h3>Login Success</h3>
                    <p>Hello: {!! Auth::user()->username !!} ,<a href="{!! url('logout') !!}">logout</a></p>
                </div>
            </div>
        </div>
    </div>

@endsection
