@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-end">
        <div class="col-2">
           <a href="{{route('admin.tecnologies.create')}}" class="btn btn-primary">Add Tecnologies</a> 
        </div>
        

    </div>
    <div class="row justify-content-around">
        <h1 class="text-center">List tecnologies:</h1>

        @foreach ($tecnologies as $item)
            <div class="card col-3 my-2 mx-1 card-my">
                <div class="card-body">

                    <h5 class="card-title">{{$item->name}}</h5>
      
                    <p class="card-text">{{$item->description}}</p>
      
                </div>
            </div>
        @endforeach
    </div>
</div>


@endsection