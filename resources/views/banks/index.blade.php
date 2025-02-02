@extends('layouts.admin')

@section('title','List Bank')

@section('breadcrumbs', 'Bank')

@section('content')
    <!-- Widgets  -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="my-3 text-right">
                            <a href="{{route('banks.create')}}" class="btn btn-sm btn-success"> <i class="fa fa-plus"></i> Create</a>
                        </div>

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{session('success')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            
                        @endif

                        <table class="table table-striped table-bordered" >
                            <thead class="text-light" style="background-color:#33b751 !important">
                                <tr class="text-center">
                                    <th width="5%">No</th>
                                    <th width="15%">Name</th>
                                    <th width="15%">Number</th>
                                    <th width="20%">Nama Pemilik</th>
                                    <th width="20%">Description</th>
                                    <th width="20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($banks as $index => $bank)
                                    
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>{{$bank->name}}</td>
                                        <td>{{$bank->number}}</td>
                                        <td>{{$bank->account_holder}}</td>
                                        <td>{{$bank->description}}</td>
                                        <td>
                                        <a href="{{route('banks.edit', [$bank->id])}}" class="btn btn-sm btn-warning text-light"><i class="fa fa-pencil"></i> Edit</a>
                                                                                    
                                            <button class="btn btn-sm btn-danger" onclick="deleteConfirm('{{$bank->id}}', '{{$bank->name}}')" data-target="#modalDelete" data-toggle="modal"><i class="fa fa-trash"></i> Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <!-- /Widgets -->

    <!-- Modal Delete -->
        <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title d-inline">Delete Bank</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="message">

                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <form action="" id="url" method="POST" class="d-inline">
                    @csrf 
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                </div>
            </div>
            </div>
        </div>
    <!-- End Modal Delete -->


@endsection

@section('script')
    <script>
        function deleteConfirm(id, name){ 
            var url = '{{ route("banks.destroy", ":id") }}';  
                url = url.replace(':id', id);
            document.getElementById("url").setAttribute("action", url);
            document.getElementById('message').innerHTML ="Are you sure want to delete Bank "+name+" ?"
            $('#modalDelete').modal();
        }
  
    </script>
@endsection