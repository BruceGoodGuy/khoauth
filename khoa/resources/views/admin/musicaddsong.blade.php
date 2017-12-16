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
<form action="{{route('musicaddsong')}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
  <div class="form-group">
    <label for="exampleInputEmail1">Tên bài hát:</label>
    <input type="text" name="song" class="form-control" id="exampleInputEmail1" placeholder="Tên bài hát">
  </div>
  <div class="form-group">
    <label for="exampleInputFile">Cover</label>
    <input type="file" id="exampleInputFile" name="cover">
    <p class="help-block">Ảnh JPG và PNG độ phân giải: 300x300px</p>
  </div>
  <div class="form-group">
    <label for="loai">Loại bài hát</label>
    <select name="type" id="loai" class="form-control">
        @foreach($type as $type)
        <option value="{{$type->id}}">{{$type->ten}}</option>
        @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="loai">Ca sĩ:</label>
    <select name="singer" id="loai" class="form-control">
    @foreach($singer as $singer)
        <option value="{{$singer->id}}">{{$singer->name}}</option>
    @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputFile">Lyric Anh</label>
    <textarea id="lyric"  name="lyriceng">
        
    </textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputFile">Lyric Viet</label>
    <textarea id="lyric1"  name="lyricvie">
        
    </textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputFile">MV</label>
    <input type="file" id="exampleInputFile" name="mv">
    <p class="help-block">Video định dạng MP4</p>
  </div>
  <div class="form-group">
    <label for="exampleInputFile">File text Lyric</label>
    <input type="file" id="exampleInputFile" name="textlyric">
    <p class="help-block">File text Lyric</p>
  </div>
  <div class="form-group">
    <label for="exampleInputFile">File sub Eng</label>
    <input type="file" id="exampleInputFile" name="subeng">
    <p class="help-block">Chỉ hổ trợ định dạng vtt</p>
  </div>
  <div class="form-group">
    <label for="exampleInputFile">File sub vie</label>
    <input type="file" id="exampleInputFile" name="subvie">
    <p class="help-block">Chỉ hổ trợ định dạng vtt</p>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
<div>
<script>
        CKEDITOR.replace( 'lyric' );
        CKEDITOR.replace( 'lyric1' );
    </script>
@endsection