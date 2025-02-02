@extends('layouts.admin')

@section('title','List Package')

@section('breadcrumbs', 'Packages')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="my-3 text-right">
                        <a href="{{route('packages.create')}}" class="btn btn-sm btn-success"> <i class="fa fa-plus"></i> Create</a>
                    </div>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table table-striped table-bordered" >
                        <thead class="text-light" style="background-color:#33b751 !important">
                            <tr class="text-center">
                                <th>No</th>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($packages as $package)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $package->title }}</td>
                                    <td>{{ $package->slug }}</td>
                                    <td>Rp {{ number_format($package->price, 0, ',', '.') }}</td>
                                    <td>
                                        <a href="{{ route('packages.edit', $package) }}" 
                                        class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('packages.destroy', $package) }}" 
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
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No packages found.</td>
                                </tr>
                            @endforelse
                        </tbody> 
                    </table>   
                </div>
            </div>
        </div>
    </div>
@endsection