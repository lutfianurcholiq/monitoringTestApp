<!DOCTYPE html>
<html lang="en">
@include('layouts.header')
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <b>{{ $title }}</b>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <form action="/register" method="post">
        @csrf
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter Name" value="{{ old('name') }}">
          @error('name')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter email" value="{{ old('email') }}">
          @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="form-group">
          <label for="level" class="form-label @error('level') is-invalid @enderror">Level</label>
          <select class="form-control" id="level" name="level" value="{{ old('level') }}">
            <option>Selectd Level...</option>
            <option value="Quality Assurance">Quality Assurance</option>
            <option value="System Analyst">System Analyst</option>
            <option value="Technical Writing">Technical Writing</option>
            <option value="Backend Developer">Backend Developer</option>
            <option value="Data Management">Data Management</option>
            <option value="Frontend Developer">Frontend Developer</option>
          </select>
          @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter Password">
              @error('password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="password">Password Confirm</label>
              <input type="password" class="form-control @error('password_confirm') is-invalid @enderror" id="password_confirm" name="password_confirm" placeholder="Enter password confirmation ">
              @error('password_confirm')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
        </div>
      </form>
      <p class="mb-0 mt-3">Have Account? <a href="/login" class="text-center">Login Now</a></p>
    </div>
  </div>
</div>
</body>
</html>
