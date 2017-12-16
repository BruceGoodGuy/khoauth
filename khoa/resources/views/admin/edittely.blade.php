@extends('template.adminTemplate')
@section('content')
<div id="page-inner">
    <div class="page-header">
        <h3>Sửa File Text: {{$song->song}}</h3>
    </div>
    @if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
        @foreach($errors->all() as $errors)
            <p>{{$errors}}</p>
        @endforeach
    </div>
    @endif
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
    @endif
    <form action="{{$song->id}}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div align="center" class="embed-responsive embed-responsive-16by9">
        <video controls loop class="embed-responsive-item">
            <source src="{{asset('/')}}resources/video/Music/{{$song->MV}}" type="video/mp4">
        </video>
    </div>
    </br>
    <textarea id="lyric" class="form-control"  name="lyric">
        @foreach($file as $file)
            {{$file}}
        @endforeach
    </textarea>
    </br>
    <input type="submit" class="btn btn-success" value="Lưu" name="luu">
        <button onclick="window.history.go(-1)" type="button" class="btn btn-danger">Hủy</button>
    </form>
</div>
@endsection