@extends('template.adminTemplate')
@section('content')
<div id="page-inner">
<div class="page-header">
    <h1>Thêm bài tập</h1>
</div>
<div class="container col-md-8">
        <form action="{{route('addexz')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="ten">Nhóm bài: </label>
            <select name="nhombai" class="form-control">
            @foreach($listanh as $key =>$listanh)
                <option value="{{$listanh->id}}">{{$listanh->ten}}</option>
                @endforeach
            </select>
            
        </div>
        <div class="form-group">
            <label for="hinh">hình: </label>
            <input type="file" name="file" class="form-control">
        </div>
        <div class="form-group">
            <label for="ten">Đáp án a: </label>
            <input type="text" name="da" placeholder="Nhập đáp án a" class="form-control">
        </div>
         <div class="form-group">
            <label for="ten">Đáp án b: </label>
            <input type="text" name="db" placeholder="Nhập đáp án b" class="form-control">
        </div>
         <div class="form-group">
            <label for="ten">Đáp án c: </label>
            <input type="text" name="dc" placeholder="Nhập đáp án c" class="form-control">
        </div>
         <div class="form-group">
            <label for="ten">Đáp án d: </label>
            <input type="text" name="dd" placeholder="Nhập đáp án d" class="form-control">
        </div>
        <div class="form-group">
            <label for="hinh">Audio: </label>
            <input type="file" name="fileaudio" class="form-control">
        </div>
        <div class="form-group">
            <label for="ten">Đáp án đúng: </label>
            <select name="dad" class="form-control">
                <option value="1">A</option>
                 <option value="2">B</option>
                  <option value="3">C</option>
                   <option value="4">D</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" name="sb" value="Thêm" class="btn btn-success">
        </div>
        </form>
    </div>
    @if(session('success'))
    <div class=" row col-md-8 alert-success">
        {{session('success')}}
    </div>
    @endif
    @if(count($errors)>0)
    @foreach($errors -> all() as $errors)
    <div class=" row col-md-8 alert-danger">
        {{$errors}}
    </div>
    @endforeach
    @endif
</div>
@endsection