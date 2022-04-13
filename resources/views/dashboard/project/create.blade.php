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
                <form method="POST" action="/project/">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                        <label for="name">Name Project</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter Name" value="{{ old('name') }}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="group_id">Group</label>
                            <select class="form-control" id="group_id" name="group_id" required>
                              @foreach ($groups as $group)
                                @if (old('group_id') == $group->id)
                                    <option value="{{ $group->id }}" selected>{{ $group->name_group }}</option>                
                                    @else
                                    <option value="{{ $group->id }}">{{ $group->name_group }}</option>                
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