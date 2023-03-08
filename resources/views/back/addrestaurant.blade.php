@extends('back.app')

@section('content')
{{-- <form class="card card-header col-md-5" style='translateX(-50%); margin:1% 0 0 28%; '
        action="{{ route('backend-restaurant-add') }}" method="post">




<label for="title">Restaurant name</label>

<input type="text" name="title" value="">

<select style="margin-top: 10px" class="form-select" name="city_id" aria-label="Default select example">

    <option selected>select country</option>

    @forelse($cities as $key => $city)
    <option value="{{ $city->id }}">{{ $city->title }}</option>




    @empty
    <option value="">none</option>
    @endforelse
</select>

<label for="address">Address</label>
<input type="text" name="address" value="">
<label for="work_start">Working begins</label>
<input type="text" name="work_start" value="">
<label for="work_end">Working ends</label>

<input type="text" name="work_end" value="">
<button type='submit'>Add Restaurant</button>
@csrf
</form>
--}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li class="list-group-item" style="font-size: 30px;">{{ $error }}</li>


                            @endforeach
                        </ul>
                    </div>
                    @endif

                </div>
                <div class="card-body">
                    <form action="{{route('backend-restaurant-add')}}" method="post" enctype="multipart/form-data">

                        <div class="container">
                            <div class="row">

                                <div class="col-8">
                                    <div class="mb-3">
                                        <label class="form-label">Restaurant title</label>

                                        <input type="text" class="form-control" name="title" value="{{old('title')}}">


                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="mb-3">
                                        <label class="form-label">City from</label>
                                        <select class="form-select" name="city_id">

                                            <option selected>select country</option>

                                            @foreach($cities as $key => $city)

                                            <option value="{{ $city->id }}" @if($city->id == old('city_id')) selected @endif>{{$city->title}}</option>




                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="mb-3">
                                        <label class="form-label">address</label>

                                        <input type="text" class="form-control" name="address" value="{{old('address')}}">


                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="mb-3">
                                        <label class="form-label">work_start</label>
                                        <input type="text" class="form-control" name="work_start" value="{{old('work_start')}}">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label class="form-label">work_end</label>
                                        <input type="text" class="form-control" name="work_end" value="{{old('work_end')}}">
                                    </div>
                                </div>
                                {{--

                                <div class="col-3 drink-vol" id="drink--vol">
                                    <div class="mb-3">
                                        <label class="form-label">Drink VOL</label>
                                        <input type="text" class="form-control" name="drink_vol" value="{{old('drink_vol')}}">
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="mb-3">
                                <label class="form-label">Drink Photo</label>
                                <input type="file" class="form-control" name="photo">
                            </div>
                        </div>

                        <div class="col-9">
                            <div class="mb-3">
                                <label class="form-label">Drink description</label>
                                <textarea class="form-control" rows="10" name="drink_desc">{{old('drink_desc')}}</textarea>
                            </div>
                        </div>--}}

                </div>
            </div>

            <button type="submit" class="btn btn-outline-primary">Add New</button>
            @csrf
            </form>
        </div>
    </div>
</div>
</div>
</div>

@endsection
