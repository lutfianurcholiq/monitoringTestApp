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
            <div class="row mt-3">
              <div class="col-md-12">
                @if (session()->has('failed'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{ session('failed') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div> 
                @endif
              </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
          @if (auth()->user()->level == "System Analyst")
            <a href="/module/create" class="btn btn-primary mb-3 "><i class="nav-icon fas fa-plus"></i> Create</a>  
          @endif
          <table id="dataTables" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Project</th>
              <th>Created</th>
              @if (auth()->user()->level == "System Analyst")
                <th>Action</th>   
              @endif
            </tr>
            </thead>
            <tbody>
            @foreach ($modules as $module)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $module->name_modul }}</td>
              <td>{{ $module->project->name }}</td>
              <td>{{ $module->created_at->format('d, M Y') }}</td>
              @if (auth()->user()->level == "System Analyst")
                <td>
                    <a href="/module/{{ $module->id }}/edit" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                    <button type="button" class="btn btn-danger d-inline" data-toggle="modal" data-target="#modalDelete{{ $module->id }}" ><i class="far fa-trash-alt"></i></button>
                </td>
              @endif
            </tr>
            {{-- Start Modal --}}
            <div class="modal fade" id="modalDelete{{ $module->id }}">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4>Confirmation...</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>Are you sure delete this modul {{ $module->name_modul }}?</p>
                  </div>
                  <div class="modal-footer justify-content-end">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <form action="/module/{{ $module->id }}" method="POST">
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