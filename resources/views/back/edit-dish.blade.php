@extends('back.app')

@section('content')
    <form class="card card-header col-md-5" style='translateX(-50%); margin:1% 0 0 28%; '
        action="{{ route('backend-update-dish', $dish) }}" method="post" enctype="multipart/form-data">



        <label for="edit_title">Dish name</label>

        <input type="text" name="edit_title">
        <select class="form-select" name="edit_restaurants_id" aria-label="Default select example">


            <option selected>select restaurant to add</option>

            @forelse($restaurants as $key => $restaurant)
                <option value="{{ $restaurant->id }}">{{ $restaurant->title }}</option>



            @empty
                <option value="">none</option>
            @endforelse
        </select>

        <label for="edit_picture">picture</label>

        <input type="file" name="edit_picture" value="readonly">



        <label for="edit_price">price</label>

        <input type="number" name="edit_price" value="">

        <button type='submit'>Add Dish</button>
        @method('put')
        @csrf
    </form>
@endsection
