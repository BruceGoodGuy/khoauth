@extends('template.adminTemplate')
@section('content')
<div id="page-inner">
@if(count($errors)>0)
    <div class="row">
        <div class="col-lg-12 ">
                @foreach($errors->all() as $errors)
                <div class="alert alert-info">
                    <strong>{{$errors}}</strong>
                </div>
                @endforeach
         </div>
    </div>
@endif
@if((session('error')))
    <div class="row">
        <div class="col-lg-12 ">
                <div class="alert alert-info">
                    <strong>{{session('error')}}</strong>
                </div>
         </div>
    </div>
@endif
<div class="page-header">
  <h1>Thêm ca sĩ</h1>
</div>
<form action="{{route('addsinger')}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
  <div class="form-group">
    <label for="exampleInputEmail1">Họ tên:</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Họ tên">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">BIO</label>
    <textarea name="bio" class="form-control" style="height:300px">
    </textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputFile">Hình</label>
    <input type="file" id="exampleInputFile" name="myfile">
    <p class="help-block">Ảnh JPG và PNG độ phân giải: 200x100 px</p>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
<div>
@endsection