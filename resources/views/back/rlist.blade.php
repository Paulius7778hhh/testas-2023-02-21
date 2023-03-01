@extends('back.app')

@section('content')
    <ul style="width:30%; display: inline-block; float: left;">
        @forelse($cities as $key => $city)
            <li id="{{ $city->id }}">{{ $city->title }} {{ $city->restaurants()->count() }}<form
                    action="{{ route('backend-edit-city', $city) }}" method="get"><button>
                        edit</button>@csrf</form>
                <form action="{{ route('backend-delete-city', $city) }}" method="post"><button>
                        delete</button>@method('delete')@csrf</form>
            </li>
        @empty
            <li>none</li>
        @endforelse
    </ul>
    <ul style="width:70%; display: inline-block; float: right;">
        @forelse($restaurantlist as $key => $restaurant)
            <li>City: {{ $restaurant->cities->title }} Name:
                {{ $restaurant->title }} Address:
                {{ $restaurant->address }}
                Work starts: {{ $restaurant->work_start }} Work ends: {{ $restaurant->work_end }}
                <form action="{{ route('backend-edit-restaurant', $restaurant) }}" method="get"><button>
                        edit</button>@csrf</form>
                <form action="{{ route('backend-restaurant-dish', $restaurant) }}" method="get"><button>View
                        menu</button>@csrf</form>
                <form action="{{ route('backend-delete-restaurant', $restaurant) }}" method="post"><button>
                        delete</button>{{ $restaurant->dishes()->count() }}@method('delete')@csrf</form>
            </li>
        @empty
            <li>none</li>
        @endforelse
    </ul>
@endsection
