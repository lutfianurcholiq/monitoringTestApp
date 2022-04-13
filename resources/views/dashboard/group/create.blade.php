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
                <form method="POST" action="/group">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name Group</label>
                            <input type="text" class="form-control @error('name_group') is-invalid @enderror" id="name_group" name="name_group" placeholder="Enter Name" value="{{ old('name_group') }}">
                            @error('name_group')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        {{-- <div class="form-group">
                            <label>Member</label>
                            <select class="form-control select2" multiple="multple" data-placeholder="Select Member" id="user_id" name="user_id[]" style="width: 100%;">
                                @foreach ($users as $user)
                                    @if (old('user_id') == $user->id)
                                        <option value="{{ $user->id }}" selected>{{ $user->name }}</option>                
                                        @else
                                        <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->level }})</option>                
                                    @endif
                                @endforeach
                            </select>
                            @error('user_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div> --}}
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
@endsection