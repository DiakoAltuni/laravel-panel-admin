@extends('admin.layouts.master')


@section('content')
    <h3 class="p-b-2 text-center">ایجاد دسته بندی جدید</h3>

    <div class="row">
        <div class="col-md-6 offset-md-3">
            @include('partials.form-errors')
            {!! Form::open(['method' => 'POST', 'action'=> 'Admin\AdminCategoryController@store']) !!}
            <div class="form-group">
                {!! Form::label('title', 'عنوان:') !!}
                {!! Form::text('title', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('slug', 'نام مستعار:') !!}
                {!! Form::text('slug', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('meta_description', 'متا توضیحات:') !!}
                {!! Form::textarea('meta_description', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('meta_keywords', 'متا برچسب ها:') !!}
                {!! Form::textarea('meta_keywords', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('ذخیره', ['class'=>'btn btn-success']) !!}
            </div>
            {!! Form::close() !!}
        </div>

    </div>

@endsection