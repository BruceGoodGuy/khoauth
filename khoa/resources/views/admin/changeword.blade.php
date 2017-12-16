@extends('template.adminTemplate')
@section('content')
<div id="page-inner">
    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Cảnh báo</h4>
        </div>
        <div class="modal-body">
          <p>Bạn thật sự muốn xóa từ {{$word -> word}}?</p>
        </div>
        <div class="modal-footer">
        <button id="xoa" type="button" class="btn btn-success">Đúng</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
    <div class="row text-center pad-top">
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                     <div class="div-square">
                           <i class="fa fa-plus fa-5x" id="myBtn"></i>
                           <h4>Xóa</h4>
                     </div>
                  </div>
    </div>
    <div class="page-header">
        <h1>Chỉnh sửa từ: {{$word->word}}</h1>
    </div>
    @if(count($errors)>0)
    @foreach($errors->all() as $errors)
    <div class="alert alert-danger" role="alert">{{$errors}}</div>
    @endforeach
    @endif
    @if(session('success'))
        <div class="alert alert-success" role="alert">{{session('success')}}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger" role="alert">{{session('error')}}</div>
    @endif
    <form action="{{$word->id}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group ">
            <label for="type">Loại từ</label>
            <select class="form-control" name="type">
                @foreach($type as $type)
                <option @if($type->id == $word->idType) selected @endif value="{{$type->id}}">{{$type->typeEng}} - {{$type->typeVie}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group ">
            <label for="type">Tên từ: </label>
            <input class="form-control" type="text" name="word" placeholder="word" value="{{$word->word}}">
        </div>
        <div class="form-group ">
            <label for="type">Pronun: </label>
            <input class="form-control" type="text" name="pronun" placeholder="Pronunciation" value="{{$word->pronun}}">
        </div>
         <div class="form-group ">
            <label for="type">Type: </label>
            <input class="form-control" type="text" name="typeword" placeholder="Loại từ" value="{{$word->type}}">
        </div>
        <div class="form-group ">
            <label for="type">Nghĩa: </label>
            <input class="form-control" type="text" name="meaning" placeholder="Nghĩa từ" value="{{$word->mean}}">
        </div>
        <div class="form-group ">
            <label for="type">Ví dụ tiếng anh: </label>
            <input class="form-control" type="text" name="exeng" placeholder="Ví dụ tiếng anh" value="{{$word->exEng}}">
        </div>
        <div class="form-group ">
            <label for="type">Ví dụ tiếng việt: </label>
            <input class="form-control" type="text" name="exvie" placeholder="Ví dụ tiếng việt" value="{{$word->exVie}}">
        </div>
        <div class="form-group ">
            <label for="type">Hình: </label>
            <input class="form-control" type="file" name="fileimg">
             <p class="help-block">Chỉ hổ trợ định dạng JPG, PNG </p>
        </div>
        <img src="{{asset('/')}}public/image/imageWord/newWord/{{$word->image}}" alt="{{$word->word}}" class="img-thumbnail">
        <div class="form-group ">
            <label for="type">Audio: </label>
            <input class="form-control" type="file" name="filemp3">
             <p class="help-block">Chỉ hổ trợ định dạng mp3</p>
        </div>
        <audio controls>
                <source src="{{asset('/')}}resources/audio/{{$word->audio}}" type="audio/mpeg">
                Your browser does not support the audio element.
        </audio>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Success</button>
            <button type="reset" class="btn btn-danger">Hủy</button>
        </div>
    </form>
</div>
<script>
    $(document).ready(function(){
        $("#myBtn").click(function(){
            $("#myModal").modal();
        });
        $('#xoa').click(function(){
          location.href="{{asset('/')}}admin/word/deleteword/{{$word->id}}";
        });
    });
    </script>
@endsection