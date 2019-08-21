<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Site</title>
	<meta name="keywords" content="keywords">
    <meta name="description" content="description_site">
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<!-- CSS -->
	<link  href="css/style.css" rel="stylesheet"/>
</head>
<body>
	@include('layouts/header')

	@include('layouts/nav')
	<main>
		<section>
			<article>
				<div class="name_product">
					<a href="#"><h2>ДУРУМ(Шаурма по Армянски)</h2></a>
				</div>
				<div class="about_product">
					<p>Свежие огурцы</p>
					<img src="img/durum.jpg">
					<section>
						<p>Масса: 300г</p>
						<p>120 Руб.</p>
						<p>В корзину</p>
					</section>
				</div>
			</article>
			<article>
				<div class="name_product">
					<a href="#"><h2>ДУРУМ(Шаурма по Армянски)</h2></a>
				</div>
				<div class="about_product">
					<p>Свежие огурцы</p>
					<img src="img/durum.jpg">
					<section>
						<p>Масса: 300г</p>
						<p>120 Руб.</p>
						<p>В корзину</p>
					</section>
				</div>
			</article>
			<article>
				<div class="name_product">
					<a href="#"><h2>ДУРУМ(Шаурма по Армянски)</h2></a>
				</div>
				<div class="about_product">
					<p>Свежие огурцы</p>
					<img src="img/durum.jpg">
					<section>
						<p>Масса: 300г</p>
						<p>120 Руб.</p>
						<p>В корзину</p>
					</section>
				</div>
			</article>
		</section>
	</main>
	@include('layouts/footer')
</body>
</html>
 //