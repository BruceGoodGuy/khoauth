@extends('template.adminTemplate')
@section('content')
<div id="page-inner">
    <div class="page-header">
        <h1>Thêm từ vựng</h1>
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
    <form action="{{route('postaddword')}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group ">
            <label for="type">Loại từ</label>
            <select class="form-control" name="type">
                @foreach($type as $type)
                <option value="{{$type->id}}">{{$type->typeEng}} - {{$type->typeVie}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group ">
            <label for="type">Tên từ: </label>
            <input class="form-control" type="text" name="word" placeholder="word" value="">
        </div>
        <div class="form-group ">
            <label for="type">Pronun: </label>
            <input class="form-control" type="text" name="pronun" placeholder="Pronunciation" value="">
        </div>
         <div class="form-group ">
            <label for="type">Type: </label>
            <input class="form-control" type="text" name="typeword" placeholder="Loại từ" value="">
        </div>
        <div class="form-group ">
            <label for="type">Nghĩa: </label>
            <input class="form-control" type="text" name="meaning" placeholder="Nghĩa từ" value="">
        </div>
        <div class="form-group ">
            <label for="type">Ví dụ tiếng anh: </label>
            <input class="form-control" type="text" name="exeng" placeholder="Ví dụ tiếng anh" value="">
        </div>
        <div class="form-group ">
            <label for="type">Ví dụ tiếng việt: </label>
            <input class="form-control" type="text" name="exvie" placeholder="Ví dụ tiếng việt" value="">
        </div>
        <div class="form-group ">
            <label for="type">Hình: </label>
            <input class="form-control" type="file" name="fileimg">
             <p class="help-block">Chỉ hổ trợ định dạng JPG, PNG </p>
        </div>
        <div class="form-group ">
            <label for="type">Audio: </label>
            <input class="form-control" type="file" name="filemp3">
             <p class="help-block">Chỉ hổ trợ định dạng mp3</p>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Success</button>
            <button type="reset" class="btn btn-danger">Hủy</button>
        </div>
    </form>
</div>
@endsection