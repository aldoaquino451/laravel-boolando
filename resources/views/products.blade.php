@extends('layouts.main')

@section('content')
    <div class="container py-5">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">

            @forelse ($products as $product)
                <div class="col">
                    <div class="mb-5">
                        <div class="my-product position-relative">

                            <div class="my-product-image">
                                <img class="img-fluid front-image"
                                    src="{{ Vite::asset('resources/img/' . $product['frontImage']) }}"
                                    alt="{{ $product['frontImage'] }}">

                                <img class="img-fluid back-image"
                                    src="{{ Vite::asset('resources/img/' . $product['backImage']) }}"
                                    alt="{{ $product['backImage'] }}">
                            </div>

                            <div class="my-badges d-flex gap-2">
                                @foreach ($product['badges'] as $badge)
                                    <span class="my-{{ $badge['type'] }} py-1 my-1 px-2">{{ $badge['value'] }}</span>
                                    @php
                                        $isDiscounted = true;
                                        if ($badge['type'] === 'discount') {
                                            $discount = intval($badge['value']) * -1;
                                            $discounted_price = $product['price'];
                                            $initial_price = $discounted_price / (1 - $discount / 100);
                                            $initial_price = number_format($initial_price, 2);
                                        } else {
                                            $isDiscounted = false;
                                        }
                                    @endphp
                                @endforeach
                            </div>

                            <div class="my-heart bg-light fs-4 d-flex justify-content-center align-items-center">
                                @if ($product['isInFavorites'])
                                    <i class="fa-regular fa-heart"></i>
                                @else
                                    <i class="fa-solid favorite fa-heart"></i>
                                @endif
                            </div>
                        </div>

                        <div class="my-product-info">
                            <p class="my-brand mt-2">{{ $product['brand'] }}</p>
                            <p class="my-name fw-bold my-1 fs-5">{{ $product['name'] }}</p>
                            <p class="mt-2">
                                <span class="my-price fw-bold me-0">{{ $product['price'] }} &euro;</span>
                                @if ($isDiscounted)
                                    <span class="my-discount-price fw-bold text-decoration-line-through">
                                        {{ $initial_price }}&euro;
                                    </span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>

            @empty
                <p>Non è stato inserito alcun prodotto!</p>
            @endforelse

        </div>
    </div>
@endsection
