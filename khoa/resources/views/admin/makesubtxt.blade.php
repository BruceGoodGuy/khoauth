@extends('template.adminTemplate')
@section('content')
<div id="page-inner">
<div class="page-header">
  <h1>Tạo file sub</h1>
</div>
  <form action="" method="POST">   
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="form-group">
        <label for="tensub">Tên file</label>
        <input type="text" id="tebsub" class="form-control" name="ten" placeholder="Tên file">
    </div>
    <h3>Nhập nội dung bên dưới</h3>
    <div class="form-group">
        <div class="row">
            <div class="col-lg-2">
                <div class="input-group">
                <span class="input-group-addon">
                    Time
                </span>
                <input type="text" class="form-control" aria-label="...">
                </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
            <div class="col-lg-5">
                <div class="input-group">
                <span class="input-group-addon">
                    English
                </span>
                <input type="text" class="form-control" aria-label="...">
                </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
            <div class="col-lg-5">
                <div class="input-group">
                <span class="input-group-addon">
                    Vietnam
                </span>
                <input type="text" class="form-control" aria-label="...">
                </div><!-- /input-group -->
            </div><!-- /.col-lg-6 -->
        </div><!-- /.row -->
    </div>
    <label>Thêm dòng</label>
    <div class="row">
            <div class="col-lg-4">
                <select name="size" class="form-control">
                    @for($i=4;$i<100;$i*=2)
                    <option value="{{$i}}">{{$i}}</option>
                    @endfor
                </select>
            </div>
    </div>
  </form>
</div>
@endsection
