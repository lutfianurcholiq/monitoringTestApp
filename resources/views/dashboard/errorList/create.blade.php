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
                <form method="POST" action="/errorList/" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="test_scenario_id">Scenario</label>
                            <select class="form-control" id="test_scenario_id" name="test_scenario_id" required>
                            <option value="">Select Scenario...</option>
                              @foreach ($testScenarios as $test)
                                @if($test->result == "bug")
                                    @if (old('test_scenario_id') == $test->id)
                                        <option value="{{ $test->id }}" selected>{{ $test->scenario}}</option>                
                                        @else
                                        <option value="{{ $test->id }}">{{ $test->scenario }}</option>                
                                    @endif
                                @endif
                              @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                            @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="note">Note</label>
                            <textarea name="note" id="note" class="form-control @error('note') is-invalid @enderror" cols="20" rows="5" value="{{ old('note') }}"></textarea>
                            @error('note')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input name="status" id="status" class="form-control" value="progress" hidden>
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