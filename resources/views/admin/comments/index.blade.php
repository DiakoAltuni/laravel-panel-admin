@extends('admin.layouts.master')


@section('content')
    @if(Session::has('delete_comment'))
        <div class="alert alert-danger">
            <div>{{session('delete_comment')}}</div>
        </div>
    @endif
    @if(Session::has('update_comment'))
        <div class="alert alert-success">
            <div>{{session('update_comment')}}</div>
        </div>
    @endif
    @if(Session::has('approved_comment'))
        <div class="alert alert-success">
            <div>{{session('approved_comment')}}</div>
        </div>
    @endif
    @if(Session::has('rejected_comment'))
        <div class="alert alert-danger">
            <div>{{session('rejected_comment')}}</div>
        </div>
    @endif
    <h3 class="p-b-2">لیست نظرات</h3>
    <table class="table table-hover bg-content">
        <thead>
        <tr>
            <th>شناسه</th>
            <th>توضیحات</th>
            <th>مطلب</th>
            <th>تاریخ ایجاد</th>
            <th>وضعیت</th>
            <th>عملیات</th>
        </tr>
        </thead>
        <tbody>
        @foreach($comments as $comment)
            <tr>
                <td>{{$comment->id}}</td>
                <td><a href="{{route('comments.edit', $comment->id)}}">{{$comment->description}}</a></td>
                <td>{{$comment->post->title}}</td>
                <td>{{\Hekmatinasser\Verta\Verta::instance($comment->created_at)->formatDifference(\Hekmatinasser\Verta\Verta::today('Asia/Tehran'))}}</td>
                @if($comment->status == 0)
                    <td><span class="tag tag-pill tag-danger">منتشر نشده</span></td>
                @else
                    <td><span class="tag tag-pill tag-success">منتشر شده</span></td>
                @endif
                @if($comment->status == 0)
                    <td>
                        {!! Form::open(['method' => 'POST', 'route' => ['comments.actions', $comment->id]]) !!}
                        <div class="form-group">
                            {!! Form::hidden('action', 'approved') !!}
                            {!! Form::submit('تایید', ['class'=>'btn btn-success']) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                @else
                    <td>
                        {!! Form::open(['method' => 'POST', 'route' => ['comments.actions', $comment->id]]) !!}
                        <div class="form-group">
                            {!! Form::hidden('action', 'rejected') !!}
                            {!! Form::submit('عدم تایید', ['class'=>'btn btn-danger']) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="col-md-12" style="text-align: center">{{$comments->links()}}</div>

@endsection