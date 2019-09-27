@extends('admin.layouts.master')


@section('content')
    <h3 class="p-b-2 text-center"> ویرایش کاربر {{$user->name}} </h3>

    <div class="row">
        <div class="col-md-3">
            <img src="{{$user->photo ? $user->photo->path : "http://www.placehold.it/400" }}" class="img-fluid">
        </div>
        <div class="col-md-9">
            @include('partials.form-errors')
            {!! Form::model($user, ['method' => 'PATCH', 'action'=> ['Admin\AdminUserController@update', $user->id], 'files'=>true]) !!}
            <div class="form-group">
                {!! Form::label('name', 'نام و نام خانوادگی:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email', 'ایمیل:') !!}
                {!! Form::text('email', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('roles', 'نقش:') !!}
                {!! Form::select('roles[]', $roles, null,['multiple'=>'multiple', 'class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('status', 'وضعیت:') !!}
                {!! Form::select('status', [1=>'فعال', 0=>'غیرفعال'], null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('avatar', 'تصویر پروفایل:') !!}
                {!! Form::file('avatar', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password', 'رمز عبور:') !!}
                {!! Form::password('password', ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('بروزرسانی', ['class'=>'btn btn-success col-md-3']) !!}
            </div>
            {!! Form::close() !!}

            {!! Form::open(['method' => 'DELETE', 'action'=> ['Admin\AdminUserController@destroy', $user->id]]) !!}
            <div class="form-group">
                {!! Form::submit('حذف', ['class'=>'btn btn-danger col-md-3']) !!}
            </div>
            {!! Form::close() !!}
        </div>


    </div>

@endsection