@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Edit Portfolio</h1>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('portfolios.update', $portfolio) }}" 
                  method="POST" 
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" 
                           class="form-control @error('title') is-invalid @enderror" 
                           id="title" 
                           name="title" 
                           value="{{ old('title', $portfolio->title) }}" 
                           required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" 
                              id="description" 
                              name="description" 
                              rows="3" 
                              required>{{ old('description', $portfolio->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" 
                           class="form-control @error('image') is-invalid @enderror" 
                           id="image" 
                           name="image">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    
                    @if($portfolio->image)
                        <div class="mt-2">
                            <img src="{{ url($portfolio->image) }}" 
                                alt="Current Image" 
                                width="200">
                        </div>
                    @endif
                </div>

                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('portfolios.index') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection