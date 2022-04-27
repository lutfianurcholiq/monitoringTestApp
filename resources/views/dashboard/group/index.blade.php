@extends('layouts.main')

@section('container')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
              @if (session()->has('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div> 
              @endif
            </div>
          </div>
    </div>

    <div class="card">
        <div class="card-body">
        <a href="/group/create" class="btn btn-primary mb-3 "><i class="nav-icon fas fa-plus"></i> Create</a>
          <table id="dataTables" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Name Group</th>
              {{-- <th>User</th> --}}
              <th>Created</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($groups as $group)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $group->name_group }}</td>
              {{-- <td>{{ $group->users()->get()->implode('name', ', ') }}</td> --}}
              <td>{{ $group->created_at->format('d, M Y') }}</td>
              <td>
                  <a href="/group/{{ $group->id }}/edit" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                  <button type="button" class="btn btn-danger d-inline" data-toggle="modal" data-target="#modalDelete{{ $group->id }}" ><i class="far fa-trash-alt"></i></button>
              </td>
            </tr>
            {{-- Start Modal --}}
            <div class="modal fade" id="modalDelete{{ $group->id }}">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4>Confirmation...</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>Are you sure delete this group {{ $group->name_group }}?</p>
                  </div>
                  <div class="modal-footer justify-content-end">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <form action="/group/{{ $group->id }}" method="POST">
                      @method('delete')
                      @csrf
                      <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            {{-- end modal --}}
            @endforeach
            </tbody>
          </table>
        </div>
    </div>
    
@endsection