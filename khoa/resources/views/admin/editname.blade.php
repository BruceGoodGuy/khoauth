@extends('template.adminTemplate')
@section('content')
<div id="page-inner">
    <div class="page-header">
        <h3>Sửa tên bài hát: {{$song->song}}</h3>
    </div>
    @if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
        @foreach($errors->all() as $errors)
            <p>{{$errors}}</p>
        @endforeach
    </div>
    @endif
    @if(session('alert'))
        <div class="alert alert-success" role="alert">
            {{session('alert')}}
        </div>
    @endif
    <form action="{{$song->id}}" method="POST">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <label for="exampleInputEmail1">Nhập tên bài hát:</label>
            <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="{{$song->song}}">
        </div>
        <input type="submit" class="btn btn-success" value="Lưu" name="luu">
        <button onclick="window.history.go(-1)" type="button" class="btn btn-danger">Hủy</button>
    </form>
</div>
@endsection