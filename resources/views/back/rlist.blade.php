@extends('back.app')

@section('content')
<ul style="width:30%; display: inline-block; float: left;">
    @forelse($cities as $key => $city)
    <li>{{$city->title}}</li>
    @empty
    <li>none</li>

    @endforelse
</ul>
<ul style="width:70%; display: inline-block; float: right;">
    @forelse($restaurantlist as $key => $restaurant)




    <li> {{$restaurant->title}} {{$restaurant->address}} {{$restaurant->work_start}} {{$restaurant->work_end}}</li>















    @empty
    <li>none</li>

    @endforelse
</ul>

@endsection
