@extends('back.app')

@section('content')
{{--
<ul style="width:30%; display: inline-block; float: left;">
    @forelse($cities as $key => $city)
    <li id="{{ $city->id }}">{{ $city->title }} {{ $city->restaurants()->count() }}
<form action="{{ route('backend-edit-city', $city) }}" method="get"><button>
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
</ul> --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-3">

        </div>
        <div class="col-9">
            <div class="card-body ">
                <div class="container">
                    <div class="row justify-content-center">
                        @forelse($restaurantlist as $key => $restaurant)

                        <div class="col-4">

                            <div class="list-table ">
                                <div class="top">
                                    <h3>

                                        {{$restaurant->title}}



                                    </h3>
                                    <a href="">
                                        <div class="smallimg">

                                            <img src="{{asset('no-image-available.jpg')}}">





                                        </div>
                                    </a>
                                </div>
                                <div class="bottom">
                                    <div class="info">
                                        <div class="type"> {{ $restaurant->cities->title }}</div>
                                        <div class="type"> {{ $restaurant->work_start }} - {{ $restaurant->work_end }}</div>



                                        <div class="size"> {{ $restaurant->address }} </div>

                                    </div>
                                    <div class="buy">
                                        <div class=" btn-sm btn-group"> </div>

                                        <form action="{{ route('backend-edit-restaurant', $restaurant) }}" method="get"><button class="btn btn-outline-primary btn-sm inline-block">

                                                edit</button>@csrf</form>
                                        <form action="{{ route('backend-restaurant-dish', $restaurant) }}" method="get"><button class="btn btn-outline-primary btn-sm inline-block">View
                                                menu</button>@csrf</form>
                                        <form action="{{ route('backend-delete-restaurant', $restaurant) }}" method="post"><button class="btn btn-outline-danger btn-sm inline-block">
                                                delete {{ $restaurant->dishes()->count() }}</button>@method('delete')@csrf</form>


                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        No restaurants yet
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="m-2"></div>

        </div>
    </div>
</div>

@endsection
