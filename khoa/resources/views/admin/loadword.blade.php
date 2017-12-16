@extends('template.adminTemplate')
@section('content')
<div id="page-inner">
<div class="row text-center pad-top">
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                     <div class="div-square">
                        <a href="{{asset('/')}}admin/word/add" >
                           <i class="fa fa-plus fa-5x"></i>
                           <h4>Thêm từ</h4>
                        </a>
                     </div>
                  </div>
</div>
    <div class="page-header">
        <h1>Danh sách từ vựng</h1>
    </div>
    @foreach($word as $word1)
    <a href="{{asset('/')}}admin/word/change/{{$word1->id}}">
     <div class="panel panel-default" role="pane">
        <div class="panel-body">
     {{$word1->word}}</div></div>
     </a>
    @endforeach
    {{ $word->links() }}
</div>
@endsection