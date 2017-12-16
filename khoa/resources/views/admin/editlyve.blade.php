@extends('template.adminTemplate')
@section('content')
<div id="page-inner">
    <div class="page-header">
        <h3>Sửa lời bài hát: {{$song->song}}</h3>
    </div>
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
    @endif
    <form action="{{$song->id}}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <textarea id="lyric"  name="lyric">
        {{$song->lyricVie}}
    </textarea>
    <script>
        CKEDITOR.replace( 'lyric' );
    </script>
    </br>
    <input type="submit" class="btn btn-success" value="Lưu" name="luu">
        <button onclick="window.history.go(-1)" type="button" class="btn btn-danger">Hủy</button>
    </form>
</div>
@endsection