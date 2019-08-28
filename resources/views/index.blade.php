@extends('layouts.layout')

@section('content')
	<div class="container content">
		<div class="row">
			@foreach($products as $product)
				<div class="product col-lg-3 col-md-4">
					<div class="preview-product-image">
						<a href="#"><img class="img-fluid " src="images/durum2.png"></a>
					</div>
					<a class="name-product" href="#">{{ $product->title }}</a>
					<div class="preview-product-description">
						Сочный, мощный.
					</div>
					<div class="product-controls">
						<div class="row">
							<div class="product-price">
								от <span class="product-money">{{ $product->price }} ₽</span>
							</div>
							<div class="product-to-cart ml-auto">
								<a href="#" class="accept-product" data-id="{{ $product->id }}">Выбрать</a>
							</div>
						</div>
					</div>
				</div>
			@endforeach
		</div>
		<br>
		{{ $products->links('vendor.pagination.bootstrap-4') }}
	</div>
@endsection