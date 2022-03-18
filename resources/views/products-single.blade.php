@extends('layouts/new-main')

@section('content')

    @include('components/products-header')

    <div class="container pb-5">
        <div class="row gx-4 gx-lg-5 position-relative">

            <div class="col-lg-5 pb-lg-0 pb-4">
                <img class="menuButton" src="{{ asset('images/menu.png') }}" alt="menu" />
            </div>
            <div class="col-lg-7">
                <div class="search-wrapper">
                    <div class="p-2 d-flex justify-content-between align-items-center">
                        <form class="flex-grow-1">
                            <input type="text" placeholder="Search" />
                        </form>
                        <img src="{{ asset('images/search.png') }}" alt="search" />
                    </div>
                </div>
            </div>

            <div class="container pt-lg-5 pt-3 mt-4 position-absolute top-0 left-0">
                <div class="burgerMenu">
                    <div class="ms-0">
                        <div class="menuBorder">
                            <div class="row">
                                <div
                                    class="col-lg-3 col-sm-4 col-6 colMenuBorder py-lg-5 py-3 ps-lg-5 ps-4 d-flex flex-column">
                                    <a class="fw-bold mb-2" href="#home">
                                        Home
                                    </a>
                                    <a class="text-decoration-none text-reset fw-bold mb-2" href="#Country">
                                        Country
                                    </a>
                                    <a class="text-decoration-none text-reset fw-bold mb-2" href="#Brands">
                                        Brands
                                    </a>
                                    <a class="text-decoration-none text-reset fw-bold mb-2" href="#Category">
                                        Category
                                    </a>
                                    <a class="text-decoration-none text-reset fw-bold mb-2" href="#Subcategory">
                                        Subcategory
                                    </a>
                                    <a class="text-decoration-none text-reset fw-bold" href="#Forms">
                                        Forms
                                    </a>
                                </div>
                                <div class="col-lg-9 col-sm-8 col-6 ps-1 ps-sm-0 py-lg-5 py-3">
                                    <div class="container px-xl-3 px-1">
                                        <p class="ms-2">Select Brand</p>
                                        <form>
                                            <div class="row gx-0">
                                                <div class="col-lg-3 col-sm-6 col-12">
                                                    <div class="d-flex pt-2">
                                                        <input id="Animedica" type="checkbox" />
                                                        <label class=" ms-2" for="Animedica">
                                                            Animedica
                                                        </label>
                                                    </div>
                                                    <div class="d-flex pt-2">
                                                        <input id="CZ V" type="checkbox" />
                                                        <label class=" ms-2" for="CZ V">
                                                            CZ V
                                                        </label>
                                                    </div>
                                                    <div class="d-flex pt-2">
                                                        <input id="Invesa" type="checkbox" />
                                                        <label class=" ms-2" for="Invesa">
                                                            Invesa
                                                        </label>
                                                    </div>
                                                    <div class="d-flex pt-2">
                                                        <input id="Over" type="checkbox" />
                                                        <label class=" ms-2" for="Over">
                                                            Over
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-6 col-12">
                                                    <div class="d-flex pt-2">
                                                        <input id="BIONOTE" type="checkbox" />
                                                        <label class=" ms-2" for="BIONOTE">
                                                            BIONOTE
                                                        </label>
                                                    </div>
                                                    <div class="d-flex pt-2">
                                                        <input id="Divers" type="checkbox" />
                                                        <label class=" ms-2" for="Divers">
                                                            Divers
                                                        </label>
                                                    </div>
                                                    <div class="d-flex pt-2">
                                                        <input id="LVL" type="checkbox" />
                                                        <label class=" ms-2" for="LVL">
                                                            LVL
                                                        </label>
                                                    </div>
                                                    <div class="d-flex pt-2">
                                                        <input id="Pfizer" type="checkbox" />
                                                        <label class=" ms-2" for="Pfizer">
                                                            Pfizer
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-6 col-12">
                                                    <div class="d-flex pt-2">
                                                        <input id="Ceva" type="checkbox" />
                                                        <label class=" ms-2" for="Ceva">
                                                            Ceva
                                                        </label>
                                                    </div>
                                                    <div class="d-flex pt-2">
                                                        <input id="HIPRA" type="checkbox" />
                                                        <label class=" ms-2" for="HIPRA">
                                                            HIPRA
                                                        </label>
                                                    </div>
                                                    <div class="d-flex pt-2">
                                                        <input id="Naturvet" type="checkbox" />
                                                        <label class=" ms-2" for="Naturvet">
                                                            Naturvet
                                                        </label>
                                                    </div>
                                                    <div class="d-flex pt-2">
                                                        <input id="Select all" type="checkbox" />
                                                        <label class=" ms-2" for="Select all">
                                                            Select all
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-sm-6 col-12">
                                                    <div class="d-flex pt-2">
                                                        <input id="Chanel" type="checkbox" />
                                                        <label class=" ms-2" for="Chanel">
                                                            Chanel
                                                        </label>
                                                    </div>
                                                    <div class="d-flex pt-2">
                                                        <input id="Interchemie" type="checkbox" />
                                                        <label class=" ms-2" for="Interchemie">
                                                            Interchemie
                                                        </label>
                                                    </div>
                                                    <div class="d-flex pt-2">
                                                        <input id="Norbrook" type="checkbox" />
                                                        <label class=" ms-2" for="Norbrook">
                                                            Norbrook
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-center flex-sm-row flex-column pt-4">
                                                <button class="menuApply py-1 me-sm-3 mx-sm-0 mx-auto">Apply
                                                    Filters</button>
                                                <button class="menuClear py-1 mx-sm-0 mx-auto mt-sm-0 mt-2">Clear
                                                    All</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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
                        <input type="checkbox" class="d-none" name="filters_tags[]" value="{{ $tag->id }}"
                            {{ request('filters_tags') && in_array($tag->id, request('filters_tags')) ? 'checked' : '' }}>
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
                {{-- <div class="arrow-wrapper d-flex">
                    <div class="arrow-button d-flex align-items-center justify-content-center">
                        <img src="{{ asset('images/arrow.png') }}" alt="arrow" />
                    </div>
                    <div class="arrow-content d-flex align-items-center">
                        <img src="https://via.placeholder.com/38x38.png" alt="product" />
                        <div class="my-auto ms-2">
                            <p class="fw-bold mb-0">Product Name</p>
                            <p class="mb-0">100.00$</p>
                        </div>
                    </div>
                </div> --}}
                <div class="wrapperArrowLeft position-relative">
                    <div class="text-center position-absolute d-flex align-items-center justify-content-center arrowLeft">
                        <img src="{{ asset('images/arrow.png') }}" alt="arrow" />
                    </div>
                    <div class="arrowLeftDescription px-2">
                        <div class="my-auto pt-1">
                            <p class="fw-bold mb-0">Product Name</p>
                            <p class="mt-0">100.00$</p>
                        </div>
                        <img src="https://via.placeholder.com/38x38.png" alt="product" />
                    </div>
                </div>
            </div>
            <div class="col-6 d-flex justify-content-end">
                {{-- <div class="arrow-wrapper d-flex">
                     <div class="arrow-content d-flex align-items-center">
                        <img src="https://via.placeholder.com/38x38.png" alt="product" />
                        <div class="my-auto ms-2">
                            <p class="fw-bold mb-0">Product Name</p>
                            <p class="mb-0">100.00$</p>
                        </div>
                    </div>
                    <div class="arrow-button d-flex align-items-center justify-content-center">
                        <img src="{{ asset('images/arrow.png') }}" alt="arrow" style="transform: rotate(180deg)" />
                    </div>
                </div> --}}
                <div class="wrapperArrowRight position-relative">
                    <div class="arrowRightDescription px-2">
                        <img src="https://via.placeholder.com/38x38.png" alt="product" />
                        <div class="my-auto pt-1 ps-2">
                            <p class="fw-bold mb-0">Product Name</p>
                            <p>100.00$</p>
                        </div>
                    </div>
                    <div class="text-center d-flex align-items-center justify-content-center arrowRight">
                        <img src="{{ asset('images/arrow.png') }}" alt="arrow" />
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
