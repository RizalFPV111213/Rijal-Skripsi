@extends('layouts.admin')

@section('title','List Portfolio')

@section('breadcrumbs', 'Portfolio')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="my-3 text-right">
                    <a href="{{route('portfolios.create')}}" class="btn btn-sm btn-success"> <i class="fa fa-plus"></i> Create</a>
                </div>

                <table class="table table-striped table-bordered" >
                    <thead class="text-light" style="background-color:#33b751 !important">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($portfolios as $portfolio)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $portfolio->title }}</td>
                            <td>{{ $portfolio->slug }}</td>
                            <td>
                                @if($portfolio->image)
                                    <div class="image-square">
                                        <img src="{{ url($portfolio->image) }}" 
                                            alt="{{ $portfolio->title }}" 
                                            class="img-fluid">
                                    </div>
                                @else
                                    <span class="text-muted">No image</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('portfolios.edit', $portfolio) }}" 
                                class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('portfolios.destroy', $portfolio) }}" 
                                    method="POST" 
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn btn-danger btn-sm" 
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>    
                </table>
            </div>
        </div>
    </div>
</div>

@endsection