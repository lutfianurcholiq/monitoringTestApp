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
                <form method="POST" action="/testscenario/" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="name">Scenario</label>
                              <input type="text" class="form-control @error('scenario') is-invalid @enderror" id="scenario" name="scenario" placeholder="Enter scenario" value="{{ old('scenario') }}">
                              @error('scenario')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                              @enderror
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="type">Type</label>
                            @error('type')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                            <select class="form-control @error('type') is-invalid @enderror" id="type" name="type">
                              <option>Select Type...</option> 
                              <option value="Positive">Positive</option>
                              <option value="Negative">Negative</option>
                            </select>
                          </div>
                        </div>
                      </div>
                        <div class="form-group">
                          <div class="row">
                              <div class="col-md-6">
                                <label for="user_id">Project</label>
                                <select class="form-control" id="project_id" name="project_id" required>
                                  <option>Select Project...</option>                
                                  @foreach ($projects as $project)
                                    @if (old('project_id') == $project->id)
                                        <option value="{{ $project->id }}" selected>{{ $project->name }}</option>                
                                        @else
                                        <option value="{{ $project->id }}">{{ $project->name 
                                        }}</option>                
                                    @endif
                                  @endforeach
                                </select>
                              </div>  
                              <div class="col-md-6">
                                <label for="user_id">Module</label>
                                <select class="form-control" id="module_id" name="module_id" required>
                                  <option>Select Module...</option> 
                                  @foreach ($modules as $module)
                                    @if (old('module_id') == $module->id)
                                        <option value="{{ $module->id }}" selected>{{ $module->name_modul }}</option>                
                                        @else
                                        <option value="{{ $module->id }}">{{ $module->name_modul 
                                        }}</option>                
                                    @endif
                                  @endforeach
                                </select>
                              </div> 
                          </div>
                      </div>
                      <div class="form-group">
                        <label for="step" class="form-label @error('step') is-invalid @enderror">Scenario</label>
                            @error('step')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                          <textarea id="step" name="step" class="form-control"></textarea>
                      </div>
                      <div class="form-group">
                          <label for="result">Result</label>
                          @error('result')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                          <select class="form-control @error('result') is-invalid @enderror" id="result" name="result" required onchange="changeResult()">
                            <option>Select Result...</option> 
                            <option value="success">Success</option>
                            <option value="bug">Bug & Error</option>
                          </select>
                      </div>
                      <div id="wsimage">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="image">Image</label>
                              <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                              @error('image')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                              @enderror
                            </div>
                          </div>
                          <div class="col-md-8">
                            <div class="form-group">
                              <label for="note">Note</label>
                              <textarea name="note" id="note" class="form-control @error('note') is-invalid @enderror" cols="10" rows="2" value="{{ old('note') }}"></textarea>
                              @error('note')
                              <div class="invalid-feedback">
                                  {{ $message }}
                              </div>
                              @enderror
                          </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <input name="status" id="status" class="form-control" value="progress" hidden>
                        </div>
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