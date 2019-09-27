@extends('admin.layouts.master')


@section('content')
    @if(Session::has('delete_category'))
        <div class="alert alert-danger">
            <div>{{session('delete_category')}}</div>
        </div>
    @endif
    @if(Session::has('add_category'))
        <div class="alert alert-success">
            <div>{{session('add_category')}}</div>
        </div>
    @endif
    @if(Session::has('update_category'))
        <div class="alert alert-success">
            <div>{{session('update_category')}}</div>
        </div>
    @endif
    <h3 class="p-b-2">لیست دسته بندی ها</h3>
    <table class="table table-hover bg-content">
        <thead>
        <tr>
            <th>شناسه</th>
            <th>عنوان</th>
            <th>تاریخ ایجاد</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td><a href="{{route('categories.edit', $category->id)}}">{{$category->title}}</a></td>
                <td>{{\Hekmatinasser\Verta\Verta::instance($category->created_at)->formatDifference(\Hekmatinasser\Verta\Verta::today('Asia/Tehran'))}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="col-md-12" style="text-align: center">{{$categories->links()}}</div>

@endsection