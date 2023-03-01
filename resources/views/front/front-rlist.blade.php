@extends('front.app')

@section('content')
    <form action="{{ route('frontend-show') }}" method="get">
        <label for="sort">sort</label>
        <select name="sort">
            <option value="default" selected>default</option>
            @forelse($sortSelect as $key => $value)
                <option value="{{ $key }}" @if ($sortShow == $key) selected @endif>{{ $value }}
                </option>
            @empty
            @endforelse
        </select>
        <label for="per_page">Per page</label>
        <select name="per_page">
            @forelse($perpageSelect as  $value)
                <option value="{{ $value }}" @if ($perpageShow == $value) selected @endif>{{ $value }}
                </option>
            @empty
            @endforelse
        </select>
        <label for="cityid">Show towns being places</label>
        <select name="cityid">
            <option value="default" selected>default</option>
            @forelse($city as $key => $thecity)
                <option value="{{ $thecity->id }}" @if ($thecity->id == $cityShow) selected @endif>{{ $thecity->title }}
                </option>
            @empty
            @endforelse
        </select>
        <button type="submit" class="btn btn-outline-primary mt-3">Show</button>
        <a href="{{ route('frontend-show') }}" class="btn btn-outline-info mt-3">Reset</a>
    </form>
    <ul style="width:30%; display: inline-block; float: left;">
        @forelse($city as $key => $fcity)
            <li id="{{ $fcity->id }}">{{ $fcity->title }} {{ $fcity->restaurants()->count() }}<div style="display:flex">

            </li>
        @empty
            <li>none</li>
        @endforelse
    </ul>
    <ul style="width:70%; display: flex; flex-direction:row; flex-wrap:wrap; flex-flow: column wrap;">
        @forelse($restaurant as $key => $frestaurant)
            <li style="width:20%;  flex-direction:row; flex-wrap:wrap; flex-flow: column wrap;">City:
                {{ $frestaurant->cities->title }} Name:
                {{ $frestaurant->title }} Address:
                {{ $frestaurant->address }}
                Work starts: {{ $frestaurant->work_start }} Work ends: {{ $frestaurant->work_end }}
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <span class="dropdown-item">
                            <ul>
                                @forelse($frestaurant->dishes as $mdish)
                                    <li>{{ $mdish->title }}\\--{{ $mdish->price }}</li>

                                @empty
                                @endforelse
                            </ul>
                        </span>

                    </div>
                </a>

                <div style="display:flex">
                    <form action="{{ route('frontend-restaurant-menu', $frestaurant) }}" method="get">
                        <button>View menu</button>
                    </form>
                    <button>{{ $frestaurant->dishes()->count() }}</button>
                </div>
            </li>
        @empty
            <li>none</li>
        @endforelse
    </ul>
    @if ($perpageShow != 'all')
        <div class="m-2">{{ $restaurant->links() }}</div>
    @endif
@endsection
