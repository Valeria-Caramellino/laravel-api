@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-12 d-flex justify-content-end">
                <a href="{{route('admin.project.edit',$project)}}" class="btn btn-primary my-4 mx-2">Modifica campo</a>
                <form action="{{ route('admin.project.destroy', $project) }}" method="post" class="my-4">
                @csrf
                @method('DELETE')
                    <input class="btn btn-danger" type="submit" value="Cancella il prodotto">
                </form> 
            </div>
            
            <div class="col-6 p-5">
                <img class="w-100" src="{{asset('storage/'. $project->image)  }}" alt="{{ $project->title }}">
            </div>
            <div class="col-6 p-5 d-flex flex-column justify-content-center">
                <h2>{{ $project->title }}</h2>
                <hr>
                <p><span class="fw-bold">Descrizione: </span> {{ $project->content }}</p>
                <hr>
                <h5>Type: {{$project->type ? $project->type->name : 'Senza categoria'}}</h5>
                <hr>
                <h5>Tecnology:</h5>
                
                @forelse ($project->tecnologies as $item)
                <span >{{$item->name}} </span>
                @empty
                <span >Nessuna selezionata</span>
                @endforelse
                
            </div>
        </div>
    </div>
@endsection