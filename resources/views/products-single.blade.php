@extends('layouts/new-main')

@section('content')

    @include('components/products-header')

    <div class="container pb-5">
        <div class="row gx-4 gx-lg-5">
            <div class="col-lg-5 position-relative pb-4 pb-lg-0">
                <div class="products-filters-wrapper"></div>
                <div class="product-image mb-4">
                    @if ($product->image)
                        <img src="{{ Voyager::image($product->image) }}">
                    @endif
                </div>
                <h2 class="mb-2"><b>{{ $product->title }}</b></h2>
                <p class="mb-2">{{ number_format($product->price, 2) }}$</p>
                <div class="pb-1">
                    <div class="product-sku text-center btn-prim px-0 mb-2 pb-1">{{ $product->sku }}</div>
                </div>
                @foreach ($product->tags as $tag)
                    <label class="tag-label mb-2 me-2">
                        <input type="checkbox" class="d-none" name="filters_tags[]" value="{{ $tag->id }}" {{ request('filters_tags') && in_array($tag->id, request('filters_tags')) ? 'checked' : '' }}>
                        <div class="tag">{{ $tag->title }}</div>
                    </label>
                @endforeach
            </div>
            <div class="col-lg-7 pt-4 pt-lg-0">
            @if ($product->composition)
                    <div class=" mb-5">
                        <h4><b>Composition:</b></h4>
                        @foreach ($product->composition as $i => $composition)
                            <div class="border-bottom {{ $i ? 'py-2' : 'pb-2' }}">
                                <div class="row {{ $i ? 'py-1' : 'pb-1' }}">
                                    <div class="col-10">
                                        <p class="m-0">{{ $composition->title }}</p>
                                    </div>
                                    <div class="col-2 text-end">
                                        <p class="m-0"><b>{{ $composition->value }}</b></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
                <div class="">
                    {!! $product->description !!}
                </div>
                
            </div>
        </div>
    </div>

@endsection
