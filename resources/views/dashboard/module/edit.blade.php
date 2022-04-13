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
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary">
                <form method="POST" action="/module/{{ $module->id }}">
                    @method('put')
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name Module</label>
                            <input type="text" class="form-control @error('name_modul') is-invalid @enderror" id="name_modul" name="name_modul" placeholder="Enter Name" value="{{ old('name_modul', $module->name_modul) }}">
                            @error('name_modul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="project_id">Project</label>
                                <select class="form-control" id="project_id" name="project_id" required>
                                    @foreach ($projects as $project)
                                        @if (old('project_id', $module->project_id) == $project->id)
                                            <option value="{{ $project->id }}" selected>{{ $project->name }}</option>                
                                            @else
                                            <option value="{{ $project->id }}">{{ $project->name }}</option>                
                                        @endif 
                                    @endforeach
                                </select>
                          </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
@endsection