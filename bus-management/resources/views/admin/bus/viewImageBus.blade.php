@extends('layouts.admin')

@section('content')
    <div class="d-sm mb-4">
        <p class="h4 mb-0 mr-2 font-weight-bold">Image of Bus Name: <span class="text-primary">{{$bus->bus_name}}</span>
            <a class="btn btn-primary float-right mb-3" href="{{url('admin/bus')}}"><i class="fas fa-arrow-circle-left rounded"> Go back</i></a>
        </p> 
    </div>
    <div class="row mt-4">
        @foreach (json_decode($image) as $img)
        <div class="col-md-3">
            <div class="card text-white bg-sencondary mb-3" style="max-width: 20rem">
                <div class="card-body">
                    <img src="{{asset('admin/upload/img-bus/'.$img)}}" width="200" height="200" class="card-img-top rounded" alt="{{$img}}"/>
                </div>
            </div>
        </div>    
        @endforeach
    </div>
@endsection