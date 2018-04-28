<header>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<div class="container">
			<a class="navbar-brand" href="{{ url('/') }}">
			{{ config('app.name') }}
		    </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

			<div class="collapse navbar-collapse" id="navbarContent">
				<ul class="navbar-nav mr-auto">
					
				</ul>
				<ul class="navbar-nav ml-auto">
						@include('partials.navigations.' . \App\User::navigation())
				</ul>
			</div>
		</div>
	</nav>
</header>