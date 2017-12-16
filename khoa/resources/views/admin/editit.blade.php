@extends('template.adminTemplate')
@section('content')
<div id="page-inner">
    <div class="page-header">
        <h3>Menu sửa bài hát: {{$song->song}}</h3>
    </div>
   <div class="row text-center pad-top">
      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
         <div class="div-square">
            <a href="{{asset('/')}}admin/music/editit/name/{{$song->id}}" >
               <i class="fa fa-pencil-square-o  fa-5x"></i>
               <h4>Tên bài hát</h4>
            </a>
         </div>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
         <div class="div-square">
            <a href="{{asset('/')}}admin/music/editit/image/{{$song->id}}" >
               <i class="fa fa-picture-o fa-5x"></i>
               <h4>Cover Hình</h4>
            </a>
         </div>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
         <div class="div-square">
            <a href="{{asset('/')}}admin/music/editit/type/{{$song->id}}" >
               <i class="fa fa-music fa-5x"></i>
               <h4>Loại bài hát</h4>
            </a>
         </div>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
         <div class="div-square">
            <a href="blank.html" >
               <i class="fa fa-user fa-5x"></i>
               <h4>Ca sĩ</h4>
            </a>
         </div>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
         <div class="div-square">
            <a href="{{asset('/')}}admin/music/editit/lyeng/{{$song->id}}" >
               <i class="fa fa-file-text fa-5x"></i>
               <h4>Lyric Eng</h4>
            </a>
         </div>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
         <div class="div-square">
            <a href="{{asset('/')}}admin/music/editit/lyve/{{$song->id}}" >
               <i class="fa fa-file-text fa-5x"></i>
               <h4>Lyric Vie</h4>
            </a>
         </div>
      </div>
   </div>
   <div class="row text-center pad-top">
      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
         <div class="div-square">
            <a href="{{asset('/')}}admin/music/editit/video/{{$song->id}}" >
               <i class="fa fa-video-camera  fa-5x"></i>
               <h4>Video</h4>
            </a>
         </div>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
         <div class="div-square">
            <a href="{{asset('/')}}admin/music/editit/tely/{{$song->id}}" >
               <i class="fa fa-file fa-5x"></i>
               <h4>Text Lyric</h4>
            </a>
         </div>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
         <div class="div-square">
            <a href="{{asset('/')}}admin/music/editit/subEn/{{$song->id}}" >
               <i class="fa fa-text-width fa-5x"></i>
               <h4>Sub Eng</h4>
            </a>
         </div>
      </div>
      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
         <div class="div-square">
            <a href="{{asset('/')}}admin/music/editit/subVie/{{$song->id}}" >
               <i class="fa fa-text-width fa-5x"></i>
               <h4>SubVie</h4>
            </a>
         </div>
      </div>
   </div>
</div>
@endsection