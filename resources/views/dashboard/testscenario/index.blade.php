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
        @if (auth()->user()->level == "Quality Assurance")
          <a href="/testscenario/create" class="btn btn-primary mb-3 "><i class="nav-icon fas fa-plus"></i> Create</a>       
        @endif
        <table id="dataTables" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>User QA</th>
            <th>Project - Module</th>
            <th>Case</th>
            <th>Type</th>
            <th>Step</th>
            <th>Result</th>
            <th>Status</th>
            <th>Date</th>
          </tr>
          </thead>
          <tbody>
          @foreach ($testSce as $test)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $test->user->name }}</td>
            <td>{{ $test->project->name}} - {{ $test->module->name_modul }}</td>
            <td>{{ $test->scenario }}</td>
            <td>{{ $test->type }}</td>
            <td>{!! $test->step !!}</td>
            @if ($test->result == "success")
                <td><span class="badge badge-success">{{ $test->result }}</span></td>
            @endif
            @if ($test->result == "bug")
                <td><span class="badge badge-danger">{{ $test->result }}</span></td>
            @endif
            @if ($test->status == "done")
            <td><span class="badge badge-success">{{ $test->status }}</span></td>
            @endif
            @if ($test->status == "failed")
            <td><span class="badge badge-danger">{{ $test->status }}</span></td>
            @endif
            <td>{{ $test->created_at->format('d, M Y') }}</td>
            {{-- <td>
                <a href="/testscenario/{{ $test->id }}/edit" class="btn btn-warning"><i class="far fa-edit"></i></a>
                <button type="button" class="btn btn-danger d-inline" data-toggle="modal" data-target="#modalDelete{{ $test->id }}" ><i class="far fa-trash-alt"></i></button>
            </td> --}}
          </tr> 
          {{-- Start Modal --}}
          {{-- <div class="modal fade" id="modalDelete{{ $test->id }}">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4>Confirmation...</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure delete this project {{ $project->name }}?</p>
                </div>
                <div class="modal-footer justify-content-end">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <form action="/project/{{ $project->id }}/" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
                </div>
              </div>
            </div>
          </div> --}}
          {{-- end modal --}}                   
          @endforeach
          </tbody>
        </table>
      </div>
  </div>
    
@endsection