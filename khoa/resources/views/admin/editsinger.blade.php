@extends('template.adminTemplate')
@section('content')
<div id="page-inner">
<div class="page-header">
  <h1>{{$singer->name}}</h1>
</div>
    @if(isset($success))
    <p class="bg-success">{{$success}}</p>
    @endif
    @if(isset($error))
    <p class="bg-danger">{{$error}}</p>
    @endif
    @if(count($errors)>0)
    @foreach($errors -> all() as $errors)
     <p class="bg-danger">{{$errors}}</p>
    @endforeach
    @endif
    <form role="form" action="{{$singer->id}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="form-group">
        <label for="exampleInputEmail1">Tên</label>
        <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="{{$singer->name}}" value="{{$singer->name}}">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Bio</label>
        <textarea style="height:300px;" name="bio" class="form-control">
            {{$singer->bio}}
        </textarea>
    </div>
    <img src="{{asset('/')}}public/image/avatarSinger/{{$singer->image}}" alt="{{$singer->name}}" class="img-thumbnail">  
    <div class="form-group">
        <label for="exampleInputEmail1">Hình</label>
        <input type="file" name="myfile" class="form-control">
        <p class="help-block">Chỉ hổ trợ định dạng JPG, PNG - Độ phân giải 200x106
        </p>
    </div>
    <button type="submit" class="btn btn-success">OK</button>
    <button type="button" class="btn btn-danger">Huỷ</button>
    </form>
</div>
@endsection