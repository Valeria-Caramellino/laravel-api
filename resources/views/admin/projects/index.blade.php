@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-between">
        @foreach ($projects as $project)
            <div class="card card-my p-0 mb-4" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset("storage/".$project->image )  }}" alt="{{ $project->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $project->title }}</h5>
                    <p class="card-text">{{ $project->content }}</p>
                </div>
                <div>
                    <a href="{{ route('admin.project.show', $project) }}">
                        <button class="btn btn-primary w-100">Show This</button>
                    </a>  
                </div>
                
            </div>
        @endforeach
    </div>
</div>
@endsection