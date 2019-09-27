@extends('admin.layouts.master')

@section('scripts')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script>
        $(document).ready(function(){
          $('#options').click(function(){
            if(this.checked){
              $('.checkBox').each(function(){
                this.checked = true;
              })
            }else{
              $('.checkBox').each(function(){
                this.checked = false;
              })
            }

          })
        })
    </script>
@endsection

@section('content')
    @if(Session::has('delete_photo'))
        <div class="alert alert-danger">
            <div>{{session('delete_photo')}}</div>
        </div>
    @endif
    @if(Session::has('delete_photos'))
        <div class="alert alert-danger">
            <div>{{session('delete_photos')}}</div>
        </div>
    @endif
    <h3 class="p-b-2">لیست فایل ها</h3>

    <form action="/admin/delete/media" method="post" class="form-inline">
        {{csrf_field()}}
        {{method_field('delete')}}
        <div class="form-group">
            <select name="checkBoxArray" id="" class="form-control">
                <option value="delete">حذف دسته جمعی</option>
            </select>
            <input type="submit" name="submit" class="btn btn-primary" value="اعمال">
        </div>


        <table class="table table-hover bg-content" style="margin-top: 10px;">
            <thead>
            <tr>
                <th><input type="checkbox" id="options"></th>
                <th>شناسه</th>
                <th>تصویر</th>
                <th>کاربر</th>
                <th>تاریخ ایجاد</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>
            @foreach($photos as $photo)
                <tr>
                    <td><input class="checkBox" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}"></td>
                    <td>{{$photo->id}}</td>
                    <td><img src="{{$photo->path }}" class="img-fluid" width="80"></td>
                    <td>{{$photo->user->name}}</td>
                    <td>{{\Hekmatinasser\Verta\Verta::instance($photo->created_at)->formatDifference(\Hekmatinasser\Verta\Verta::today('Asia/Tehran'))}}</td>
                    <td>
                        {!! Form::open(['method' => 'DELETE', 'action'=> ['Admin\AdminPhotoController@destroy', $photo->id]]) !!}
                        <div class="form-group">
                            {!! Form::submit('حذف', ['class'=>'btn btn-danger']) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </form>
    <div class="col-md-12" style="text-align: center">{{$photos->links()}}</div>
@endsection