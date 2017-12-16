	@extends("template.indexTemplate")
    @include("module.headerIndex")
	@section('content')
        <div id="coverAll">
		    <div id="containBox">
                <div class="containLogin">
                    <h3>Đăng Nhập</h3>
                    @if(count($errors)>0)
                        @foreach($errors->all() as $errors)
                            <div class="error">{{$errors}}</div>
                        @endforeach
                    @endif
                    @if(session('success'))
                            <div class="error">{{session('success')}}</div>
                    @endif
                    @if(session('error'))
                            <div class="error">{{session('error')}}</div>
                    @endif
                    <form action="{{route('dangnhap')}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input class="form-control" type="text" name="username" placeholder="username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input class="form-control" type="password" name="password" placeholder="">
                        </div>
                        <button type="submit" class="btndn">Đăng nhập
						</button>
                            <a style="margin-right:50px; float:right" href="{{asset('/')}}dangki">Chưa có tài khoản</a>
                    </form>
                </div>
            </div>
        </div>
    @endsection