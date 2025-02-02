@extends('layouts.admin')

@section('title', 'Create Category')

@section('breadcrumbs', 'Categories' )

@section('second-breadcrumb')
    <li>Create</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-12 mb-3">
                        <h3 align="center"></h3>
                    </div>
                    <form action="{{route('banks.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-10">
                            <div class="mb-3">
                                <label for="bank" class="font-weight-bold">Name Bank</label>
                                <input type="text" name="name" placeholder="Bank name..." class="form-control {{$errors->first('name') ? "is-invalid" : ""}}" value="{{old('name')}}" required>
                                <div class="invalid-feedback"> {{$errors->first('name')}}</div>
                            </div>
                            <div class="mb-3">
                                <label for="number" class="font-weight-bold">Number Bank</label>
                                <input type="text" name="number" placeholder="Number Bank..." class="form-control {{$errors->first('number') ? "is-invalid" : ""}}" required>{{old('number')}}
                                <div class="invalid-feedback"> {{$errors->first('number')}}</div>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="font-weight-bold">Description Bank</label>
                                <input type="text" name="description" placeholder="Description Bank..." class="form-control {{$errors->first('description') ? "is-invalid" : ""}}" required>{{old('description')}}
                                <div class="invalid-feedback"> {{$errors->first('description')}}</div>
                            </div>
                            <div class="mb-3">
                                <label for="account_holder" class="font-weight-bold">Nama Pemilik</label>
                                <input type="text" name="account_holder" placeholder="Nama Pemilik..." class="form-control {{$errors->first('account_holder') ? "is-invalid" : ""}}" required>{{old('account_holder')}}
                                <div class="invalid-feedback"> {{$errors->first('account_holder')}}</div>
                            </div>
                            <div class="mb-3 mt-4">
                                <a href="{{route('banks.index')}}" class="btn btn-md btn-secondary">Back</a>
                                <button type="submit" class="btn btn-md btn-success">Save</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
