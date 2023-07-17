@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <h1>Add Tecnology</h1>

        @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $err)
                <li>{{$err}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{route('admin.tecnologies.store')}}" method="POST" class="needs-validation">
            @csrf

            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control mb-4 @error('name') is-invalid @enderror">
            @error('name')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror

            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control mb-4  @error('description') is-invalid  @enderror">{{old('description')}}</textarea>
            @error('description')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
            
            <input type="submit" class="btn btn-primary form-control mb-4" value="Crea Tecnology">

        </form>
    </div>

</div>


@endsection