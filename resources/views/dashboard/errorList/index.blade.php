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

        <div class="card">
            <div class="card-body">
            {{-- @if (auth()->user()->level == "Frontend Developer" || auth()->user()->level == "Backend Developer" || auth()->user()->level == "Data Management" || auth()->user()->level == "Quality Assurance")
                <a href="/errorList/create" class="btn btn-primary mb-3 "><i class="nav-icon fas fa-plus"></i> Create</a>
            @endif --}}
              <table id="dataTables" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>User QA</th>
                  <th>Project - Module</th>
                  <th>Case</th>
                  <th>Error</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($errorList as $el)
                        <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $el->user->name }}</td>
                        <td>{{ $el->project->name }} - {{ $el->module->name_modul }}</td>
                        <td>{{ $el->cased }}</td>
                        <td>{{ $el->note }}</td>
                        <td>
                            <button type="button" class="border-radius-none" data-toggle="modal" data-target="#staticBackdrop{{ $el->id }}">
                            <img src="{{ asset('storage/'. $el->image) }}" alt="" width="200px">
                            </button>
                        </td>
                        <td>
                        @if (auth()->user()->level == "Frontend Developer" || auth()->user()->level == "Backend Developer" || auth()->user()->level == "Data Management")
                            @if ($el->status == 'progress')
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm{{ $el->id }}">
                                    <i class="fas fa-check"></i>
                                </button>
                            @else
                                <a href="" class="btn btn-success"><i class="fas fa-check-double"></i></a>
                            @endif
                        @else
                            @if ($el->status == 'progress')
                                <span class="badge badge-danger">{{ $el->status }}</span>
                            @else
                                <span class="badge badge-success">{{ $el->status }}</span>
                            @endif
                        @endif
                        </td>
                        </tr>
                        {{-- start modal confirm --}}
                        <div class="modal fade" id="confirm{{ $el->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    <p>is this error already running?</p>
                                    <form action="/errorList/{{ $el->id }}" method="post">
                                      @method('put')
                                      @csrf
                                        <div class="form-group">
                                            <input name="status" id="status" class="form-control" value="success" readonly hidden>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Yes</button>
                                    </form>
                                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        {{-- end modal confirm --}}

                        <!-- start Modal -->
                        <div class="modal fade" id="staticBackdrop{{ $el->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                {{-- <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5> --}}
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    <div class="text-center">
                                        <img src="{{ asset('storage/'. $el->image) }}" alt="" width="900px" height="500px" >
                                    </div>
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