@extends('layouts/new-main')

@section('content')

    @include('components/products-header')

    <div class="container pb-5">
        <h2 class="products-title text-center"><b>Our Products</b></h2>
        <div class="row gx-4 gx-lg-5">
            <div class="col-lg-3 position-relative mb-5 pb-5">
                <div class="products-filters-wrapper">
                    <form>
                        <input type="hidden" name="page" value="">
                        @foreach ($filter_categories as $filter_category)
                            @php
                                $filter_category_open = isset(request('filters_category')[$filter_category->id]) && request('filters_category')[$filter_category->id];
                            @endphp
                            <div class="filter-wrapper pb-3  {{ $filter_category_open ? 'open' : '' }}">
                                <div class="filter-title d-flex align-items-center mb-2">
                                    <b class="me-2">{{ $filter_category->title }}</b>
                                    <img class="arrow" src="{{ asset('images/new/arrow.svg') }}">
                                </div>
                                <div class="filter-subitems" {!! $filter_category_open ? 'style="display: block"' : '' !!}>
                                    <label class="d-block mb-2">
                                        <input type="radio" class="d-none" name="filters_category[{{ $filter_category->id }}]" value="" {{ !isset(request('filters_category')[$filter_category->id]) || !request('filters_category')[$filter_category->id] ? 'checked' : '' }}>
                                        <p class="mb-0">All</p>
                                    </label>
                                    @foreach ($filter_category->subcategories as $subcategory)
                                        <label class="d-block mb-2">
                                            <input type="radio" class="d-none" name="filters_category[{{ $filter_category->id }}]" value="{{ $subcategory->id }}" {{ isset(request('filters_category')[$filter_category->id]) && request('filters_category')[$filter_category->id] == $subcategory->id ? 'checked' : '' }}>
                                            <p class="mb-0">{{ $subcategory->title }}</p>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                        <p class="tags-title mb-3"><b>Species</b></p>
                        <div class="d-flex flex-wrap">
                            @foreach ($filter_tags as $tag)
                                <label class="tag-label mb-2 me-2">
                                    <input type="checkbox" class="d-none" name="filters_tags[]" value="{{ $tag->id }}" {{ request('filters_tags') && in_array($tag->id, request('filters_tags')) ? 'checked' : '' }}>
                                    <div class="tag">{{ $tag->title }}</div>
                                </label>
                            @endforeach
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-9" id="products-grid">
                @include('components/products-grid')
            </div>
        </div>
    </div>

@endsection
