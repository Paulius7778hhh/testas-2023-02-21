@extends('front.app')

@section('content')
    {{-- <ul style="width:70%; display: inline-block; float: right;">
        @forelse($restaurant->dishes as $key => $dish)
            <li>Dish: {{ $dish->title }} Price: {{ $dish->price }} @if (isset($dish->picture))
                    <img src="{{ asset($dish->picture) }}">
                @endif

                <form action="{{-- neuzbaigta --> {{ route('frontend-submition', $dish) }} " method="post">
                    <input type="number" min="1" max="5" name="rating" step="0.5">
                    <input type="hidden" name="ids" value="{{ $user }}">
                    <button type="submit" hidden>Rate</button>@csrf
                </form>


            </li>


        @empty
            <li>none</li>
        @endforelse
    </ul> --}}
    <div class="album py-5 ">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @forelse($restaurant->dishes as $key => $dish)
                    <div class="col">
                        <div class="card shadow-sm">
                            @if (isset($dish->picture))
                                <img src="{{ asset($dish->picture) }}">
                            @else
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                    xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                                    preserveAspectRatio="xMidYMid slice" focusable="false">
                                    <title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%"
                                        fill="#eceeef" dy=".3em">Thumbnail</text>
                                </svg>
                            @endif
                            <div class="card-body">
                                <p class="card-text">Dish: {{ $dish->title }} Price: {{ $dish->price }}</p>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                    additional
                                    content. This content is a little bit longer.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <form action="{{-- neuzbaigta --> {{ route('frontend-submition', $dish) }} --}} " method="post">
                                            <input type="number" min="1" max="5" name="rating"
                                                step="0.5">
                                            <input type="hidden" name="ids" value="{{ $user }}">
                                            <button type="submit">Rate</button>@csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
