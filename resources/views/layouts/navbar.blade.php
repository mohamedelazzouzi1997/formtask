
    <header id="navtop" class="">
		{{-- <div class="menu-container"> --}}
			<div class="grt-menu-row items-center h-[100px]">
				<div data-aos="fade-down" class="grt-menu-logo">
					<a href="{{ url('/') }}" class="grt-logo"><img src="{{ asset('images/logo.png') }}"></a>
				</div>
				<div class="grt-menu-right">
				<nav class="flex z-50">
				 <button class="grt-mobile-button"><span class="line1"></span><span class="line2"></span><span class="line3"></span></button>
				 <ul class="grt-menu">
				  <li class=""><a class="@if (Request::path() == '/') border-b border-orange-300 @endif" href="{{ url('/') }}">HOME</a></li>
				  {{-- <li><a class="@if (Request::path() == '/') border-b border-orange-300 @endif" href="{{ url('/#about') }}">ABOUT</a></li> --}}
				  {{-- <li><a class="@if (Request::path() == '/') border-b border-orange-300 @endif" href="{{ url('/#reservation') }}">RESERVATION</a></li> --}}
				<li><a class="@if (Request::path() == 'contact') border-b border-orange-300 @endif" href="{{ url('/contact') }}">CONTACT</a></li>
				</ul>
				</nav>
				</div>
			</div>
		{{-- </div> --}}
	</header>
