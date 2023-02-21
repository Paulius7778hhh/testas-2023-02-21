@extends('back.app')

@section('content')

<form class="card card-header col-md-5" style='translateX(-50%); margin:1% 0 0 28%; ' action="{{route('backend-restaurant-add')}}" method="post">




    <label for="title">Restaurant name</label>

    <input type="text" name="title" value="">
    <select class="form-select" name="city_id" aria-label="Default select example">

        <option selected>select country</option>

        @forelse($cities as $key => $city)


        <option value="{{$city->id}}">{{$city->title}}</option>




        @empty
        <option value="">none</option>


        @endforelse
    </select>

    <label for="address">Address</label>
    <input type="text" name="address" value="">
    <label for="work_start">Working begins</label>
    <input type="date" name="work_start" value="">
    <label for="work_end">Working ends</label>

    <input type="date" name="work_end" value="">
    <button type='submit'>Add Restaurant</button>
    @csrf</form>


@endsection
