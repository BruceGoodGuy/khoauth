<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Simple Responsive Admin</title>
      <!-- BOOTSTRAP STYLES-->
      <link href="{{asset('/')}}resources/assets/admin/css/bootstrap.css" rel="stylesheet" />
      <!-- FONTAWESOME STYLES-->
      <link href="{{asset('/')}}resources/assets/admin/css/font-awesome.css" rel="stylesheet" />
      <!-- CUSTOM STYLES-->
      <link href="{{asset('/')}}resources/assets/admin/css/custom.css" rel="stylesheet" />
      <!-- GOOGLE FONTS-->
      <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

      {{--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  --}}
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="{{asset('/')}}resources/ckeditor/ckeditor.js"/></script>
      <script href="{{asset('/')}}resources/assets/admin/js/custom.js"></script>
   </head>
   <body>
      <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
               <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="#">
                  <img src="assets/img/logo.png" />
                  </a>
               </div>
               <span class="logout-spn" >
               <a href="{{asset('/')}}dangxuat" style="color:#fff;">Đăng Xuất</a>  
               </span>
            </div>
         </div>
         <!-- /. NAV TOP  -->
         <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
               <ul class="nav" id="main-menu">
                  <li class="active-link">
                     <a href="" ><i class="fa fa-desktop "></i>Home <span class="badge">Included</span></a>
                  </li>
                  <li>
                     <a href="{{asset('/')}}admin/music"><i class="fa fa-table "></i>Nhạc <span class="badge">{{$count}}</span></a>
                  </li>
                  <li>
                     <a href="{{asset('/')}}admin/word"><i class="fa fa-edit "></i>Từ vựng  <span class="badge">{{$countword}}</span></a>
                  </li>
                  <li>
                     <a href="{{asset('/')}}admin/ex"><i class="fa fa-edit "></i>Bài tập </a>
                  </li>
                  <li>
                     <a href="{{asset('/')}}admin/comment"><i class="fa fa-edit "></i>Comment </a>
                  </li>
                  <li>
                     <a href="{{asset('/')}}admin/ex"><i class="fa fa-edit "></i>User </a>
                  </li>
               </ul>
            </div>
         </nav>
         <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
         @yield('content')
        </div>


         <!-- /. PAGE WRAPPER  -->
      </div>
      <div class="footer">
         <div class="row">
            <div class="col-lg-12" >
               &copy;  2014 yourdomain.com | Design by: <a href="http://binarytheme.com" style="color:#fff;" target="_blank">www.binarytheme.com</a>
            </div>
         </div>
      </div>
      <!-- /. WRAPPER  -->
      <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
      <!-- JQUERY SCRIPTS -->
      {{--  <script href="{{asset('/')}}resources/assets/admin/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
      <script href="{{asset('/')}}resources/assets/admin/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
      <script href="{{asset('/')}}resources/assets/admin/js/custom.js"></script>  --}}
   </body>
</html>