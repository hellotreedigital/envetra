<div class="row">
    @foreach ($products as $product)
        <div class="col-md-6 col-lg-4 mb-5 product-grid-item" animate="down">
            <a data-href="{{ route('products-single', [$product->slug]) }}">
                <div class="product-wrapper">
                    <div class="pb-1 mb-2">
                        <div class="product-image">
                            @if ($product->image)
                                <img src="{{ Voyager::image($product->image) }}">
                            @endif
                        </div>
                    </div>
                    <p class="product-title mb-2"><b>{{ $product->title }}</b></p>
                    <p class="product-small-description small mb-2">{{ $product->small_description }}</p>
                    <p class="mb-2">{{ $product->price }}$</p>
                    <div class="product-sku text-center btn-prim px-0">{{ $product->sku }}</div>
                </div>
            </a>
        </div>
    @endforeach
</div>
@if (count($products))
    <div class="products-pagination-wrapper d-flex justify-content-center" animate="down">
        {{ $products->onEachSide(1)->links() }}
    </div>
@else
    <p>No products to show</p>
@endif
