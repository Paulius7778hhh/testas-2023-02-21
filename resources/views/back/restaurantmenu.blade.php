@extends('back.app')

@section('content')
    <ul style="width:70%; display: inline-block; float: right;">
        @forelse($restaurant->dishes as $key => $dish)
            <li>Dish: {{ $dish->title }} Price: {{ $dish->price }} @if (isset($dish->picture))
                    <img src="{{ asset($dish->picture) }}">
                @endif

                <form action="{{ route('backend-edit-dish', $dish) }}" method="get"><button>edit</button>@csrf</form>
                <form action="{{ route('backend-delete-dish', $dish) }}" method="post">
                    <button>delete</button>@method('delete')@csrf
                </form>
            </li>


        @empty
            <li>none</li>
        @endforelse
    </ul>
@endsection
