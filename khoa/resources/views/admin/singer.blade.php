@extends('template.adminTemplate')
@section('content')
     <div id="page-inner">
               <div class="row">
                  <div class="col-lg-12">
                     <h2> Trang Quản Trị Website</h2>
                  </div>
               </div>
                 <hr />
               <div class="row">
                  <div class="col-lg-12 ">
                     <div class="alert alert-info">
                        <strong>Quản lý ca sĩ</strong>
                     </div>
                  </div>
               </div>
               @if(isset($success))
                <div class="row">
                  <div class="col-lg-12 ">
                     <div class="alert alert-info">
                        <strong>{{$success}}</strong>
                     </div>
                  </div>
               </div>
               @endif
               <div class="row text-center pad-top">
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                     <div class="div-square">
                        <a href="{{asset('/')}}admin/singer" >
                           <i class="fa fa-bars  fa-5x"></i>
                           <h4>Danh sách ca sĩ</h4>
                        </a>
                     </div>
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                     <div class="div-square">
                        <a href="{{asset('/')}}admin/singer/add" >
                           <i class="fa fa-plus fa-5x"></i>
                           <h4>Thêm ca sĩ</h4>
                        </a>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-lg-12">
                    <div class="page-header">
                        <h3>Danh sách ca sĩ</h3>
                    </div>
                    @foreach($singer as $key => $value)
                        <a href="{{asset('/')}}admin/music/selectsinger/{{$value->id}}" title="{{$value->name}}">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                {{++$key}}, {{$value->name}}
                            </div>
                        </div>
                        </a>
                    @endforeach
                  </div>
                </div>
    </div>
@endsection