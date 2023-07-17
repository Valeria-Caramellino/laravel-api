@extends('layouts.admin')

@section('content')

<div class="container-fluid mt-4">
    <div class="row justify-content-between">
        <h1>Modifica campi</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route("admin.project.update", $project) }}" method="post" class="needs-validation" enctype="multipart/form-data">
            @csrf

            @method('PUT')

            <label for="title">Titolo</label>
            <input type="text" name="title" id="title" value="{{ old("title") ?? $project->title }}" required class="form-control mb-4 @error('title') is-invalid @enderror">
            @error("title")
                <div class="invalid-feedback">{{$message}}</div>
            @enderror

            <label for="content">Contenuto</label>
            <textarea name="content" id="content" cols="30" rows="10" class="form-control mb-4 @error('content') is-invalid @enderror">{{ old("content")?? $project->content  }}</textarea>
            @error("content")
                <div class="invalid-feedback">{{$message}}</div>
            @enderror

            <label for="type_id">Type</label>
            <select class="form-control md-4 @error('type_id') is-invalid @enderror" name="type_id" id="type_id">
                <option value="" selected disabled>Selezione il type</option>
                @foreach($types as $type)
                    <option value="{{$type->id}}">{{$type->name}}</option>
                @endforeach
            </select>

            <div class="my-4 d-flex justify-content-between">
                @foreach ($tecnologies as $i => $item)
                <div class="form-check">
                    <label for="tecnologies{{$i}}" class="form-check-label">{{$item->name}} </label>
                    <input type="checkbox" name="tecnologies[]" id="tecnologies{{$i}}" value="{{$item->id}} " class="form-check-input">
                </div>
                @endforeach
            </div>

            <label for="image">URL Immagine</label>
         <input type="file" name="image" id="image">
            @error("image")
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
            <input type="submit" class="btn btn-primary form-control mb-4" value="modifica">
        
        </form>
    </div>
</div>

@endsection