<div class="product">
	<div class="product-image">
		<div class="image"> <a href="detail.html"><img src="{{asset($product->image)}}" alt=""></a> </div>
		<!-- /.image -->
		<div class="tag hot"><span>hot</span></div>
	</div>
	<!-- /.product-image -->
	<div class="product-info text-left">
		<h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
		<div class="rating rateit-small rateit">
			<button id="rateit-reset-24" data-role="none" class="rateit-reset" aria-label="reset rating" aria-controls="rateit-range-24" style="display: none;"></button>
			<div id="rateit-range-24" class="rateit-range" tabindex="0" role="slider" aria-label="rating" aria-owns="rateit-reset-24" aria-valuemin="0" aria-valuemax="5" aria-valuenow="4" aria-readonly="true" style="width: 70px; height: 14px;">
				<div class="rateit-selected" style="height: 14px; width: 56px;"></div>
				<div class="rateit-hover" style="height:14px"></div>
			</div>
		</div>
		<div class="description"></div>
		<div class="product-price">
            <span class="price">$100</span>
            <span class="price-before-discount">${{$product->unit_price}}</span> </div>
		<!-- /.product-price -->
	</div>
	<!-- /.product-info -->
	<div class="cart clearfix animate-effect">
		<div class="action">
			<ul class="list-unstyled">
				<li class="add-cart-button btn-group">
					<button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
					<button class="btn btn-primary cart-btn" type="button">Add to cart</button>
				</li>
				<li class="lnk wishlist">
					<a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a>
				</li>
				<li class="lnk">
					<a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a>
				</li>
			</ul>
		</div>
		<!-- /.action -->
	</div>
	<!-- /.cart -->
</div>