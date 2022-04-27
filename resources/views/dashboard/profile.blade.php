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
                </div>
        </div>

        <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-3">
      
                  <!-- Profile Image -->
                  <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                      <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="/image/man.png" alt="User profile picture">
                      </div>
                      <h3 class="profile-username text-center">{{ auth()->user()->name }}</h3>
                      <p class="text-muted text-center">{{ auth()->user()->level }}</p>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
      
        
                  <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                  <div class="card">
                    <div class="card-header p-2">
                      <ul class="nav nav-pills">
                        <li class="nav-item">Profile Update</li>
                      </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                      <div class="tab-content">
                        <div class="active tab-pane" id="settings">
                            @foreach ($users as $user)
                                @if ($user->id == auth()->user()->id)
                                    <form class="form-horizontal" action="/profile/{{ $user->id }}" method="POST">
                                    @method('put')
                                    @csrf
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name" value="{{ old('name', $user->name) }}">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" name="email" value="{{ old('email', $user->email) }}">
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                      <label for="group_id" class="col-sm-2 col-form-label">Group</label>
                                      <div class="col-sm-10">
                                        <select class="form-control" id="group_id" name="group_id" required>
                                          <option value="">Select Your Group...</option>
                                            @foreach ($groups as $group)
                                                @if (old('group_id', $user->group_id) == $group->id)
                                                    <option value="{{ $group->id }}" selected>{{ $group->name_group }}</option>                
                                                    @else
                                                    <option value="{{ $group->id }}">{{ $group->name_group }}</option>                
                                                @endif 
                                            @endforeach
                                        </select>
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                        <input type="password" class="form-control  @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop{{ $user->id }}">Submit</button>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                        <div class="modal fade" id="staticBackdrop{{ $user->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Confirm</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure to update this profile? </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Yes</button>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </form>
                                    @endif
                            @endforeach
                        </div>
                        <!-- /.tab-pane -->
                      </div>
                      <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div><!-- /.container-fluid -->
          </section>
@endsection