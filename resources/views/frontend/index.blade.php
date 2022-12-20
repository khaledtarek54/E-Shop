@extends('layouts.front')

@section('title')
    Welcome to E-Shop
@endsection

@section('content')
    @include('layouts.inc.slider')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Featured Products</h2>
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach ($featured_products as $prod)
                        <a href="{{ url('category/' . $prod->category->slug . '/' . $prod->slug) }}">
                            <div class="item">
                                <div class="card">
                                    <img style="width: 100%;height: 15vw; object-fit: cover;"
                                        src="{{ asset('assets/uploads/product/' . $prod->image) }}" alt="Product image">
                                    <div class="card-body">
                                        <h5>{{ $prod->name }}</h5>
                                        <span class="float-start">{{ $prod->selling_price }}</span>
                                        <span class="float-right"><s>{{ $prod->original_price }}</s></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Trending Categories</h2>
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach ($trending_category as $tcategory)
                        <a href="{{ url('view.category/'.$tcategory->slug)}}">
                            <div class="item">
                                <div class="card">
                                    <img style="width: 100%;height: 15vw; object-fit: cover;"
                                        src="{{ asset('assets/uploads/category/' . $tcategory->image) }}"
                                        alt="Product image">
                                    <div class="card-body">
                                        <h5>{{ $tcategory->name }}</h5>
                                        <p>{{ $tcategory->description }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('.featured-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
    </script>
@endsection
