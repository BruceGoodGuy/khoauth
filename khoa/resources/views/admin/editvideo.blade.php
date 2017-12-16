@extends('template.adminTemplate')
@section('content')
<div id="page-inner">
    <div class="page-header">
        <h3>Sửa MV bài hát: {{$song->song}}</h3>
    </div>
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
    @endif
    @if(session('errors'))
        <div class="alert alert-danger" role="alert">
            {{session('errors')}}
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
    <input type="file" class="form-control" name="myfile">
    <p class="help-block">Chỉ hổ trợ định dạng mp4</p>
    </br>
    <input type="submit" class="btn btn-success" value="Lưu" name="luu">
        <button onclick="window.history.go(-1)" type="button" class="btn btn-danger">Hủy</button>
    </form>
</div>
@endsection