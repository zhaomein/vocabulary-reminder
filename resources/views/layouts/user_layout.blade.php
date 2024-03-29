<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="img/favicon.png" type="image/png">
        <title>
            @if(isset($title))
                {{$title}} -
            @endif
            Vocabulary Remider
        </title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="/css/bootstrap.css">
        <link rel="stylesheet" href="/vendors/linericon/style.css">
        <link rel="stylesheet" href="/css/font-awesome.min.css">
        <link rel="stylesheet" href="/vendors/owl-carousel/owl.carousel.min.css">
        <link rel="stylesheet" href="/vendors/lightbox/simpleLightbox.css">
        <link rel="stylesheet" href="/vendors/nice-select/css/nice-select.css">
        <link rel="stylesheet" href="/vendors/animate-css/animate.css">
        <link rel="stylesheet" href="/vendors/popup/magnific-popup.css">
        <!-- main css -->
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/responsive.css">
        <link rel="stylesheet" type="text/css" href="/DataTables/css/dataTables.bootstrap4.min.css"/>
        <link rel="stylesheet" type="text/css" href="/DataTables/css/responsive.dataTables.min.css"/>
        <link rel="stylesheet" type="text/css" href="/css/toastr.min.css">
    </head>
    <body>

        <!--================Header Menu Area =================-->
        <header class="header_area navbar_fixed">
            <div class="main_menu">
            	<nav class="navbar navbar-expand-lg navbar-light">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<a class="navbar-brand logo_h" style="margin-left: 40px" href="/"><img src="/img/logo.png" alt=""></a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse offset" id="navbarSupportedContent">

							<ul class="nav navbar-nav menu_nav ml-auto">
								@if (Auth::check())
                                    <li class="nav-item dropdown dropdown-notifications">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            <i class="fa fa-bell" aria-hidden="true"></i><span class="caret"></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right menu-notification" aria-labelledby="navbarDropdown">
                                            @foreach (Auth::user()->notifications as $notification)
                                                <a class="dropdown-item" href="#">
                                                    <span>{{ $notification->data['title'] }}</span><br>
                                                    <small>{{ $notification->data['content'] }}</small>
                                                </a>
                                            @endforeach
                                        </div>
                                    </li>
									<li class="nav-item submenu dropdown">
										<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
											<img class="user_avatar" src="{{Auth::user()->avartar}}" alt="Avatar">
											<div class="user_info">
												<span>{{Auth::user()->fullname}}</span>
												<span class="email">{{Auth::user()->email}}</span>
											</div>
										</a>
										<ul class="dropdown-menu" style="left: -30px;">
											<li class="nav-item"><a class="nav-link" href="{{route('user_profile')}}">Thông tin tài khoản</a>
											<li class="nav-item"><a class="nav-link" href="{{route('logout')}}">Đăng xuất</a></li>
										</ul>
									</li>
								@else
									<li class="nav-item active"><a class="nav-link" href="/">Trang chủ</a></li>
									<li class="nav-item"><a class="nav-link" href="{{route('vocabularies')}}">Từ vựng</a></li>
									<li class="nav-item"><a class="nav-link" href="{{route('login')}}">Đăng nhập</a></li>
									<li class="nav-item"><a class="nav-link" href="{{route('signup')}}">Đăng ký</a></li>
								@endif
							</ul>
						</div>
					</div>
            	</nav>
            </div>
        </header>
		<!--================Header Menu Area =================-->

		<div class="content-section" style="width: 100%;">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-2" style="padding: 0;min-height: calc(100vh - 160px);background: #1f253e;">
						<div class="menu_features">
							<a href="{{route('user_remind')}}">
								<div class="alert big_icon" role="alert">
									<i class="fa fa-bell" aria-hidden="true"></i>
									<p>Nhắc nhở</p>
								</div>
							</a>
							<a href="{{route('user_dictionary')}}">
								<div class="alert big_icon" role="alert">
									<i class="fa fa-book" aria-hidden="true"></i>
									<p>Từ điển Online</p>
								</div>
							</a>
							<a href="{{route('vocabulary-manager-fuser')}}">
								<div class="alert big_icon" role="alert">
									<i class="fa fa-th-list" aria-hidden="true"></i>
									<p>Quản lý từ vựng</p>
								</div>
							</a>
							<a href="#">
								<div class="alert big_icon" role="alert">
									<i class="fa fa-suitcase" aria-hidden="true"></i>
									<p>Ôn tập từ vựng</p>
								</div>
							</a>
							<a href="{{route('user_profile')}}">
								<div class="alert big_icon" role="alert">
									<i class="fa fa-user" aria-hidden="true"></i>
									<p>Thông tin cá nhân</p>
								</div>
							</a>
							<a href="{{route('logout')}}">
								<div class="alert big_icon" role="alert">
									<i class="fa fa-sign-out" aria-hidden="true"></i>
									<p>Thoát</p>
								</div>
							</a>
						</div>
					</div>
					<div class="col-md-10" style="padding-right:0">
						<div class="card" style="border: 0;padding-top: 30px;border-radius: 0;">
							<div class="card-body">
								@yield('content')
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

        <!--================ start footer Area  =================-->
		<footer class="footer-area">
				<div class="container-fluid">
					<div class="row footer-bottom d-flex justify-content-between align-items-center">
						<p class="col-lg-8 col-md-8 footer-text m-0">
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							Bài tập lớn môn phát triển phần mềm hướng dịch vụ. Được phát triển bởi <a href="#">Nhóm 5</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
						<div class="col-lg-4 col-md-4 footer-social">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-dribbble"></i></a>
							<a href="#"><i class="fa fa-behance"></i></a>
						</div>
					</div>
				</div>
			</footer>
		<!--================ End footer Area  =================-->






        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="/js/jquery-3.3.1.min.js"></script>
        <script src="/js/toastr.min.js"></script>
        <script src="/js/popper.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/stellar.js"></script>
        <script src="/vendors/lightbox/simpleLightbox.min.js"></script>
        <script src="/vendors/nice-select/js/jquery.nice-select.min.js"></script>
        <script src="/vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="/vendors/isotope/isotope.pkgd.min.js"></script>
        <script src="/vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="/vendors/popup/jquery.magnific-popup.min.js"></script>
        <script src="/js/jquery.ajaxchimp.min.js"></script>
        <script src="/vendors/counter-up/jquery.waypoints.min.js"></script>
        <script src="/vendors/counter-up/jquery.counterup.js"></script>
        <script src="/js/mail-script.js"></script>
        <script src="/js/theme.js"></script>
        <script type="text/javascript" src="/DataTables/js/jquery.dataTables.js"></script>
		<script type="text/javascript" src="/DataTables/js/dataTables.bootstrap4.min.js"></script>

        <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
        <script type="text/javascript">
            var pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
                encrypted: true,
                cluster: "ap1"
            });
            var channel = pusher.subscribe('NotificationEvent');
            channel.bind('send-message', function(data) {
                var newNotificationHtml = `
                <a class="dropdown-item" href="#">
                    <span>${data.title}</span><br>
                    <small>${data.content}</small>
                </a>`;
                $('.menu-notification').prepend(newNotificationHtml);
            });
        </script>

		<script>
			current = window.location.pathname.split('/')[2];
			console.log('Current page', current);
			$('.menu_features a').each((index, elm)=>{
				if(new RegExp(current).test($(elm).attr('href'))) {
					$(elm).addClass('active');
				}
			})
		</script>
        @yield('script')
    </body>
</html>
