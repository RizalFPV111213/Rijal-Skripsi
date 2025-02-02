@extends('layouts.admin')

@section('title', 'Edit Category')

@section('breadcrumbs', 'Categories' )

@section('second-breadcrumb')
	<li>Edit</li>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
						<div class="col-12 mb-3">
							<h3 align="center"></h3>
						</div>
						<form action="{{route('banks.update', [$bank->id])}}" method="POST" enctype="multipart/form-data">
							@csrf
							<input type="hidden" name="_method" value="PUT">
							<div class="col-10">
								<div class="mb-3">
									<label for="bank" class="font-weight-bold">Name Bank</label>
									<input type="text" class="form-control" id="name" name="name" value="{{ $bank->name }}" required>
								</div>
								<div class="mb-3">
									<label for="number" class="font-weight-bold">Number Bank</label>
									<input type="text" class="form-control" id="number" name="number" value="{{ $bank->number }}" required>
								</div>
								<div class="mb-3">
									<label for="description" class="font-weight-bold">Description Bank</label>
									<input type="text" class="form-control" id="description" name="description" value="{{ $bank->description }}" required>
								</div>
								<div class="mb-3">
									<label for="account_holder" class="font-weight-bold">Nama Pemilik</label>
									<input type="text" class="form-control" id="account_holder" name="account_holder" value="{{ $bank->account_holder }}" required>
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
