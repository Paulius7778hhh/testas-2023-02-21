@extends('back.app')

@section('content')
<form class="card card-header col-md-5" style='translateX(-50%); margin:1% 0 0 28%; ' action="{{route('backend-dish-add')}}" method="post" enctype="multipart/form-data">



    <label for="title">Dish name</label>

    <input type="text" name="title" value="">
    <select class="form-select" name="restaurants_id" aria-label="Default select example">


        <option selected>select restaurant to add</option>

        @forelse($restaurants as $key => $restaurant)



        <option value="{{$restaurant->id}}">{{$restaurant->title}}</option>



        @empty
        <option value="">none</option>

        @endforelse
    </select>

    <label for="picture">picture</label>

    <input type="file" name="picture" value="readonly">



    <label for="price">price</label>

    <input type="number" name="price" value="">

    <button type='submit'>Add Dish</button>
    @csrf</form>


@endsection
