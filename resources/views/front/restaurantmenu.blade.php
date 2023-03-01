@extends('front.app')

@section('content')
    <ul style="width:70%; display: inline-block; float: right;">
        @forelse($restaurant->dishes as $key => $dish)
            <li>Dish: {{ $dish->title }} Price: {{ $dish->price }} @if (isset($dish->picture))
                    <img src="{{ asset($dish->picture) }}">
                @endif

                <form action="{{-- neuzbaigta --> {{ route('frontend-submition', $dish) }} --}}" method="post">
                    <input type="number" min="1" max="5" name="rating" step="0.5">
                    <input type="hidden" name="ids" value="{{ $user }}">
                    <button type="submit" hidden>Rate</button>@csrf
                </form>


            </li>


        @empty
            <li>none</li>
        @endforelse
    </ul>
@endsection
