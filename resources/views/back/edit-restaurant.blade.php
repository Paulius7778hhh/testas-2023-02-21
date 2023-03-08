@extends('back.app')

@section('content')
{{--
<form class="card card-header col-md-5" style='translateX(-50%); margin:1% 0 0 28%; ' action="{{ route('backend-update-restaurant', $restaurant) }}" method="post">




<label for="edit_title">Restaurant name</label>

<input type="text" name="edit_title" value="">

<select style="margin-top: 10px" class="form-select" name="edit_city_id" aria-label="Default select example">

    <option selected>select country</option>

    @forelse($cities as $key => $city)
    <option value="{{ $city->id }}">{{ $city->title }}</option>




    @empty
    <option value="">none</option>
    @endforelse
</select>

<label for="edit_address">Address</label>
<input type="text" name="edit_address" value="">
<label for="edit_work_start">Working begins</label>
<input type="text" name="edit_work_start" value="">
<label for="edit_work_end">Working ends</label>

<input type="text" name="edit_work_end" value="">
<button type='submit'>Edit Restaurant</button>
@method('put')
@csrf
</form>
--}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Edit drink</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('backend-update-restaurant', $restaurant) }}" method="post" enctype="multipart/form-data">

                        <div class="container">
                            <div class="row">

                                <div class="col-8">
                                    <div class="mb-3">
                                        <label class="form-label">Restaurant title</label>
                                        <input type="text" class="form-control" name="edit_title" value="{{old('edit_title', $restaurant->title)}}">



                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">City from</label>
                                        <select id="drink--create--edit" class="form-select" name="edit_city_id">

                                            @foreach($cities as $key => $city)

                                            <option value="{{$city->id}}" @if($city->id == old('edit_city_id', $city->city_id)) selected @endif>{{$city->title}}</option>






                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">address</label>
                                        <input type="text" class="form-control" name="edit_address" value="{{old('edit_address', $restaurant->address)}}">


                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">edit_work_start</label>
                                        <input type="text" class="form-control" name="edit_work_start" value="{{old('edit_work_start', $restaurant->work_start)}}">

                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">work_end</label>
                                        <input type="text" class="form-control" name="edit_work_end" value="{{old('edit_work_end', $restaurant->work_end)}}">

                                    </div>
                                </div>
                                {{--

                                <div class="col-3 drink-vol" id="drink--vol">
                                    <div class="mb-3">
                                        <label class="form-label">Drink VOL</label>
                                        <input type="text" class="form-control" name="drink_vol" value="{{old('drink_vol', $restaurant->vol)}}">
                            </div>
                        </div>
                        --}}

                        {{-- picture--}}
                        {{--


                                <div class="col-3">
                                    <div class="mb-3">
                                        <label class="form-label">Drink Photo</label>
                                        <input type="file" class="form-control" name="photo">
                                    </div>
                                </div>
                                
                                

                                @if($drink->photo)
                                <div class="col-4">
                                    <div class="mb-3 img">
                                        <img src="{{asset($drink->photo)}}">
                </div>
            </div>
            @endif

            <div class="col-8">
                <div class="mb-3">
                    <label class="form-label">Drink description</label>
                    <textarea class="form-control" rows="10" name="drink_desc">{{old('drink_desc', $drink->desc)}}</textarea>
                </div>
            </div>
            --}}


        </div>
    </div>
    <button type="submit" class="btn btn-outline-primary">Edit Restaurant</button>
    {{--
                        @if($drink->photo)
                        <button type="submit" class="btn btn-outline-danger" name="delete_photo" value="1">Delete Photo</button>
                        @endif
                        @csrf
                        @method('put')
                    </form>
--}}



</div>
</div>
</div>
</div>
</div>


@endsection
