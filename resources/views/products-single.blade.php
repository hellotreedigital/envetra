@extends('layouts/new-main')

@section('content')

@include('components/products-header')

<div class="container pb-5">
    <div class="row gx-4 gx-lg-5 position-relative">

        <div class="col-lg-5 pb-lg-0 pb-4">
            <img class="menuButton" src="{{ asset('images/menu.png') }}" alt="menu" />
        </div>

        <div class="col-lg-7">
            <div class="search-wrapper-single">
                <div class="p-2 d-flex justify-content-between align-items-center">
                    <input form="filter-products" type="text" name="search" placeholder="Search" />
                    <img src="{{ asset('images/search.png') }}" alt="search" />
                </div>
            </div>
        </div>



        <div class="container pt-lg-5 pt-3 mt-4 position-absolute top-0 left-0">
            <div class="burgerMenu">
                <div class="ms-0">
                    <div class="menuBorder">
                        <form action="{{route('products')}}" id="filter-products">

                            <div class="row">
                                <div class="col-lg-3 col-sm-4 col-6 colMenuBorder py-lg-5 py-3 ps-lg-5 ps-4 d-flex flex-column">
                                    @foreach ($filter_categories as $filter_category)
                                    @php
                                    $filter_category_open = isset(request('filters_category')[$filter_category->id]) && request('filters_category')[$filter_category->id];
                                    @endphp
                                    <div class="filter-single filter-wrapper {{ $filter_category_open ? 'open' : '' }}" data-id="{{$filter_category->id}}">
                                        <a class="fw-bold mb-2">
                                            {{ $filter_category->title }}
                                        </a>
                                    </div>
                                    @endforeach
                                </div>

                                <div class="col-lg-9 col-sm-8 col-6 ps-1 ps-sm-0 py-lg-5 py-3">

                                    @foreach ($filter_categories as $filter_category)
                                    @php
                                    $filter_category_open = isset(request('filters_category')[$filter_category->id]) && request('filters_category')[$filter_category->id];
                                    @endphp
                                    <div class="container category-content product-{{$filter_category->id}} px-xl-3 px-1 {{ $filter_category_open ? '' : 'd-none' }}">
                                        <p class="ms-2">Select {{$filter_category->title}}</p>
                                        <div class="row gx-0">
                                            @foreach ($filter_category->subcategories as $subcategory)
                                            <div class="col-3">
                                                <label class="category-label">
                                                    <input type="radio" class="d-none" name="filters_category[{{ $filter_category->id }}]" value="{{ $subcategory->id }}" {{ isset(request('filters_category')[$filter_category->id]) && request('filters_category')[$filter_category->id] == $subcategory->id ? 'checked' : '' }}>
                                                    <div class="checkbox-view"></div>
                                                    {{ $subcategory->title }}
                                                </label>
                                            </div>

                                            @endforeach

                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="d-flex justify-content-center flex-sm-row flex-column pt-4">
                                        <button type="submit" class="menuApply py-1 me-sm-3 mx-sm-0 mx-auto">Apply
                                            Filters</button>
                                        <div class="menuClear py-1 mx-sm-0 mx-auto mt-sm-0 mt-2">Clear
                                            All</div>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


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

<div class="container pb-5">
    <div class="row align-items-center arrows">
        <div class="col-6 d-flex">
            @if ($prev_product)
            <a href="{{ route('products-single', [$prev_product->slug]) }}?{{$_SERVER['QUERY_STRING']}}">
                <div class="wrapperArrowLeft position-relative">
                    <div class="text-center position-absolute d-flex align-items-center justify-content-center arrowLeft">
                        <img src="{{ asset('images/arrow.png') }}" alt="arrow" />
                    </div>
                    <div class="arrowLeftDescription px-2">
                        <div class="my-auto pt-1">
                            <p class="fw-bold mb-0">{{$prev_product->title}}</p>
                            <p class="mt-0">{{$prev_product->price}} $</p>
                        </div>
                        <img src="https://via.placeholder.com/38x38.png" alt="product" />
                    </div>
                </div>
            </a>
            @endif
        </div>
        <div class="col-6 d-flex justify-content-end">
            @if ($next_product)
            <a href="{{ route('products-single', [$next_product->slug]) }}?{{$_SERVER['QUERY_STRING']}}">
                <div class="wrapperArrowRight position-relative">
                    <div class="arrowRightDescription px-2">
                        <img src="https://via.placeholder.com/38x38.png" alt="product" />
                        <div class="my-auto pt-1 ps-2">
                            <p class="fw-bold mb-0">{{$next_product->title}}</p>
                            <p>{{$next_product->price}} $</p>
                        </div>
                    </div>
                    <div class="text-center d-flex align-items-center justify-content-center arrowRight">
                        <img src="{{ asset('images/arrow.png') }}" alt="arrow" />
                    </div>
                </div>
            </a>
            @endif
        </div>
    </div>
</div>

@endsection