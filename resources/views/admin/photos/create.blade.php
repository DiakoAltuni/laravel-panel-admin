@extends('admin.layouts.master')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/dropzone.css')}}">
@endsection

@section('content')
    <h3 class="p-b-2 text-center">آپلود فایل</h3>

    <div class="row">
        <div class="col-md-10 offset-md-1">
            @include('partials.form-errors')
            {!! Form::open(['method' => 'POST', 'action'=> 'Admin\AdminPhotoController@store', 'class'=>'dropzone']) !!}

            {!! Form::close() !!}
        </div>

    </div>

@endsection

@section('scripts')
    <script src="{{asset('js/dropzone.js')}}"></script>
@endsection