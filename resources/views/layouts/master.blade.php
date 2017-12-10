<!DOCTYPE html>
<html>
<head>
	<title>
		@yield('title', 'School')
	</title>

	<meta charset='utf-8'>
	@stack('head')
</head>
<body>
	<div id="wrapper">
		<header>
			<h1>Language School<img src="/img/phone.jpg" id="imgId" title="Contact Us" alt="Contact Us" /></h1>
			<nav>
				<ul>
					<li><a href='/'>Contact Us</a></li>
					<li><a href='/all'>All Students</a></li>
					<li><a href='/course/create'>Add Course</a></li>
				</ul>
			</nav>
		</header>

		<section>
			@yield('content')
		</section>

		<footer>
			Copyright &copy; {{ date('Y') }} All Rights Reserved.
		</footer>

	</div>
</body>
</html>
