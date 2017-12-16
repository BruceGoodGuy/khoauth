@extends('template.adminTemplate')
@section('content')
<div id="page-inner">
   <div class="row text-center pad-top">
      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
         <div class="div-square">
            <a href="{{asset('/')}}admin/music/editit/{{$music->id}}" >
               <i class="fa fa-pencil-square-o  fa-5x"></i>
               <h4>Sửa</h4>
            </a>
         </div>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
         <div class="div-square">
            <a href="blank.html" >
               <i class="fa fa-times fa-5x"></i>
               <h4>Xóa</h4>
            </a>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-lg-12">
         <div class="panel panel-default">
            <div class="panel-body">
               Tên bài hát: {{$music->song}} </br>
               Ca sĩ:
               @for($i=0;$i<count($singer);$i++)
               <a href=""> {{$singer[$i]['name']}}</a>
               @if($i!=count($singer)-1)
               {{',&nbsp;'}}
               @endif
               @endfor
               </br>
               Hình cover: {{$music -> coverImage}} </br>
               <a href="#" class="thumbnail">
               <img src="{{asset('/')}}public/image/imageMusicCover/{!!$music->coverImage!!}" alt="...">
               </a>
               Loại:  {{$typemusic->ten}}
            </div>
         </div>
         <div class="container">
               <h2>Lời bài hát {{$music -> song}}</h2>
               <ul class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" href="#home">Lời Việt</a></li>
                  <li><a data-toggle="tab" href="#menu1">Lời Anh</a></li>
               </ul>
               <div class="tab-content">
                  <div id="home" class="tab-pane fade in active">
                     <h3>{{$music -> song}}</h3>
                     <p>{!!$music -> lyricVie!!}</p>
                  </div>
                  <div id="menu1" class="tab-pane fade">
                     <h3>{{$music -> song}}</h3>
                     <p>{!!$music -> lyricEng!!}</p>
                  </div>
               </div>
            </div>
      </div>
   </div>
</div>
@endsection