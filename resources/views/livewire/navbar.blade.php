<div>

	<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
		<div class="container">
			<a class="navbar-brand" href="{{ url('/') }}">
				{{ config('app.name', 'Laravel') }}
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<!-- Left Side Of Navbar -->
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="{{ route('home') }}">Home</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							List Jersey
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							@foreach($ligas as $liga)
							<a class="dropdown-item" href="{{ route('products.liga', $liga->id) }}">{{ $liga->nama }}</a>
							@endforeach
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="{{ route('products.index') }}">Semua Liga</a>
						</div>
					</li>
				</ul>

				<!-- Right Side Of Navbar -->
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="{{ route('history') }}">
							History <i class="fas fa-history"></i>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{ route('keranjang') }}">
							Keranjang <i class="fas fa-shopping-cart"></i>
							@if($jumlah_pesanan !== 0)
							<sup><span class="badge badge-danger">{{ $jumlah_pesanan }}</span></sup>
							@endif
						</a>
					</li>
					<div class="topbar-divider d-none d-sm-block"></div>
					<!-- Authentication Links -->
					@guest
					<li class="nav-item">
						<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
					</li>
					@if (Route::has('register'))
					<li class="nav-item">
						<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
					</li>
					@endif
					@else
					<li class="nav-item dropdown">
						<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
							{{ Auth::user()->name }} <span class="caret"></span>
						</a>

						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
							@if(Auth::user()->role == 'admin')
							<a href="{{ route('admin.dashboard') }}" class="dropdown-item">Dashboard Admin</a>
							@endif

							<a href="{{ route('user.profile', Auth::user()->id) }}" class="dropdown-item">Profile</a>

							<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
								{{ __('Logout') }}
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
						</div>
					</li>
					@endguest
				</ul>
			</div>
		</div>
	</nav>
	
</div>
