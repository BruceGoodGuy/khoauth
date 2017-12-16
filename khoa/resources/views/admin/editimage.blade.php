@extends('template.adminTemplate')
@section('content')
<div id="page-inner">
    <div class="page-header">
        <h3>Sửa Cover bài hát: {{$song->song}}</h3>
    </div>
    @if(session('errors'))
        <div class="alert alert-danger" role="alert">
            {{session('errors')}}
        </div>
    @endif
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
    @endif
    <form action="{{$song->id}}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <a href="" class="thumbnail">
        <img src="{{asset('/')}}public/image/imageMusicCover/{{$song->coverImage}}" alt="{{$song->song}}" class="img-responsive img-rounded">
    </a>
    <div class="form-group">
    <label for="exampleInputFile">Chọn file hình</label>
    <input name="myfile" type="file" id="exampleInputFile">
    <p class="help-block">Chỉ hổ trợ định dạng jpg, png; Kích thước (w/h)=300x300</p>
  </div> 
    <input type="submit" class="btn btn-success" value="Lưu" name="luu">
        <button onclick="window.history.go(-1)" type="button" class="btn btn-danger">Hủy</button>
    </form>
</div>
@endsection