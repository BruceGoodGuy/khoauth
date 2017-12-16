@extends('template.adminTemplate')
@section('content')
<div id="page-inner">
<div class="page-header">
    <h1>Thêm</h1>
</div>
<div class="container col-md-8">
        <form action="{{route('addex')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="ten">Tên: </label>
            <input type="text" name="ten" placeholder="Nhập tên" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" name="sb" value="Thêm" class="btn btn-success">
        </div>
        </form>
    </div>
    @if(session('success'))
    <div class=" row col-md-8 alert-success">
        {{session('success')}}
    </div>
    @endif
    @if(count($errors)>0)
    @foreach($errors -> all() as $errors)
    <div class=" row col-md-8 alert-danger">
        {{$errors}}
    </div>
    @endforeach
    @endif
</div>
@endsection