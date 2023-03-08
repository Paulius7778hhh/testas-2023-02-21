@extends('front.app')

@section('content')
    <div class="container card-body justify-content-center bg-dark sm text-light">
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
                    <option value="{{ $thecity->id }}" @if ($thecity->id == $cityShow) selected @endif>
                        {{ $thecity->restaurants()->count() . ' ' . $thecity->title }}
                    </option>
                @empty
                @endforelse
            </select>
            <button type="submit" class="btn btn-outline-primary mt-3">Show</button>
            <a href="{{ route('frontend-show') }}" class="btn btn-outline-info mt-3">Reset</a>
        </form>
    </div>
    {{-- <ul style="width:30%; display: inline-block; float: left;"> --}}
    {{--    @forelse($city as $key => $fcity) --}}
    {{--        <li id="{{ $fcity->id }}">{{ $fcity->title }} {{ $fcity->restaurants()->count() }}<div style="display:flex"> --}}
    {{-- --}}
    {{--        </li> --}}
    {{--    @empty --}}
    {{--        <li>none</li> --}}
    {{--    @endforelse --}}
    {{-- </ul> --}}
    {{-- <ul class="list-group d-inline-flex flex-sm-row flex-wrap justify-content-sm-between align-items-center">
        @forelse($restaurant as $key => $frestaurant)
            <div>
                <li class="list-group-item ">City:
                    {{ $frestaurant->cities->title }}</li>
                <li class="list-group-item">Name:
                    {{ $frestaurant->title }}</li>
                <li class="list-group-item">Address:
                    {{ $frestaurant->address }}</li>
                <li class="list-group-item">
                    Work starts: {{ $frestaurant->work_start }}</li>
                <li class="list-group-item d-inline-flex"> Work ends: {{ $frestaurant->work_end }}</li>

                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Menu list
                    </button>
                    <ul class="dropdown-menu list-group-item-dark" aria-labelledby="dropdownMenuButton1">
                        @forelse($frestaurant->dishes as $mdish)
                            <li class="dropdown-item list-group-item-dark">{{ $mdish->title }}{{ $mdish->price }}</li>
                        @empty
                            <li class="dropdown-item list-group-item-dark"></li>
                        @endforelse
                    </ul>
                </div>

            </div>
            <span>
                <form action="{{ route('frontend-restaurant-menu', $frestaurant) }}" method="get">
                    <button>View menu</button>
                    <button>{{ $frestaurant->dishes()->count() }}</button>
                </form>

            </span>

        @empty
            <li>none</li>
        @endforelse
       
    </ul> --}}
    <div class="album py-5">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @forelse($restaurant as $key => $frestaurant)
                    <div class="col">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <li class="list-group-item ">City:
                                    {{ $frestaurant->cities->title }}</li>
                                <li class="list-group-item ">Name:
                                    {{ $frestaurant->title }}</li>
                                <li class="list-group-item ">Address:
                                    {{ $frestaurant->address }}</li>
                                <li class="list-group-item ">
                                    Work starts: {{ $frestaurant->work_start }}</li>
                                <li class="list-group-item "> Work ends: {{ $frestaurant->work_end }}</li>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <form action="{{ route('frontend-restaurant-menu', $frestaurant) }}"
                                            method="get">
                                            <button class="btn btn-sm btn-outline-secondary">View menu <button
                                                    class="btn btn-sm btn-outline-secondary">{{ $frestaurant->dishes()->count() }}</button></button>

                                        </form>

                                    </div>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            Menu list
                                        </button>
                                        <ul class="dropdown-menu list-group-item-dark"
                                            aria-labelledby="dropdownMenuButton1">{{--
                                            @forelse($frestaurant->dishes as $mdish)
                                                <li class="dropdown-item list-group-item-dark">
                                                    {{ $mdish->title }}{{ $mdish->price }}</li>
                                            @empty
                                                <li class="dropdown-item list-group-item-dark"></li>
                                            @endforelse
                                                --}}
                                            <table class="table">
                                                <thead>
                                                    <tr>

                                                        <th scope="col">Dish</th>
                                                        <th scope="col">Price</th>

                                                    </tr>
                                                </thead>
                                                @forelse($frestaurant->dishes as $mdish)
                                                    <tbody>
                                                        <tr>

                                                            <td>{{ $mdish->title }}</td>
                                                            <td>{{ $mdish->price }}</td>
                                                        </tr>

                                                    </tbody>
                                                @empty
                                                    <li class="dropdown-item list-group-item-dark"></li>
                                                @endforelse
                                            </table>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @empty
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        <div class="col">
                            <div class="card shadow-sm">


                                <div class="card-body">

                                </div>
                            </div>
                        </div>
                @endforelse
            </div>
        </div>
        @if ($perpageShow != 'all')
            <div class="m-5">{{ $restaurant->links() }}</div>
        @endif
    @endsection
