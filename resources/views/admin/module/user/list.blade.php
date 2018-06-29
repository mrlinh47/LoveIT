@extends('admin.master')
@section('title','List User')
@section('content')
<div class="col-md-12 list-user">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2 class="text-center"> Danh sách người dùng<span class="icon-add"><a href="{!! route('getAdd') !!}"><i class="fa fa-plus-circle" aria-hidden="true"></i>Thêm</a></span>
                        </div></h2>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>FullName</th>
                                            <th>UserName</th>
                                            <th>Email</th>
                                            <th class="text-center">Level</th>
                                            <th class="text-center">Active</th>
                                            <th class="text-center">Edit</th>
                                            <th class="text-center">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; ?>
                                        @foreach($data as $user)
                                        <tr class="odd gradeX">
                                            <td>{!! $i !!}</td>
                                            <td>{!! $user->fullname !!}</td>
                                            <td>{!! $user->username !!}</td>
                                            <td class="center">{!! $user->email !!}</td>
                                            <td class="text-center">
                                                @if($user->level == 1 && $user->id == 1) {!! 'SuperAdmin' !!}
                                                @elseif($user->level == 1) {!! 'Admin' !!}
                                                @elseif($user->level == 2) {!! 'User' !!}
                                                @endif
                                            </td>
                                            @if(($user['id']==1) || (Auth::user()->id !=1 && $user['level'] == 1))
                                            <td class="text-center">&nbsp;</td>
                                            @else
                                                <td class="text-center">
                                                <a href="javascript:void(0)" id="chang-status" data-id="{!! $user->id !!}"><i class="fa {!! ($user->status == 1 ? "fa-check icon-active" : "fa-times icon-inactive" ) !!}" aria-hidden="true" id="id-{!! $user->id !!}"></i></a>
                                                <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                                            </td>
                                            @endif
                                            @if((Auth::user()->id != 1) && ($user['id'] == 1 || ($user['level'] == 1 && (Auth::user()->id != $user['id']))))
                                                <td class="text-center">&nbsp;</td>
                                            @else
                                               <td class="text-center"><a href="edit/{!! $user["id"] !!}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td> 
                                            @endif
                                            
                                            @if(($user['id']==1) || (Auth::user()->id !=1 && $user['level'] == 1))
                                                <td class="text-center">&nbsp;</td>
                                            @else
                                                <td class="text-center"><a href="delete/{!! $user->id !!}" onclick="return xacnhanxoa('Bạn có chắc muốn xóa không?')"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                                            @endif
                                        </tr>
                                        <?php $i++; ?>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
</div>
@endsection