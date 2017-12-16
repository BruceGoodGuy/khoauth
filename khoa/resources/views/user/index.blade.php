	@extends("template.indexTemplate")
	@section('content')
	@include("module.headerIndex")
	<div id="coverAll">
		<div id="containBox">
			<div class="containuser">
				<div class="headerUser">
					<h3>{{$user->username}}</h3>
				</div>
				<div class="leftcontrol">
					<ul>
						<li><a href="">Quản lý</a></li>
						<li><a href="">Từ yêu thích</a></li>
						<li><a href="">Kết quả học</a></li>
						<li><a href="{{asset('/')}}logout">Đăng xuất</a></li>
					</ul>
				</div>
				<div class="rightcontrol">
					
				</div>
			</div>
		</div>
	</div>
	@include("module.indexMenuBar")
	@endsection