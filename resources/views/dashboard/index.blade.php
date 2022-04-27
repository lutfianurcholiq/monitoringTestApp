@extends('layouts.main')

@section('container')

    <h1>Welcome back, {{ auth()->user()->name }}</h1>

    <div class="row mt-5">
      <div class="col-md-5">
        <div class="card ">
          <div class="card-header">
            <h3 class="card-title">Test Scenario Chart</h3>
            <div class="card-tools">
              {{-- <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button> --}}
            </div>
          </div>
          <div class="card-body">
            <canvas id="myChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
      <div class="col-md-7">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title text-center">Our Team </h3>
              <div class="card-tools">
                <span class="badge badge-danger"></span>
                {{-- <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button> --}}
                {{-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button> --}}
              </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="card-body">
                      {{--  --}}
                      @if (Auth::user()->group_id == NULL)
                          <div class="col-md-12 ml-2 mt-3">
                            <ul class="users-list">
                              <span class="users-list-name">Your Are not Group!! Please Update Your Profile</span>
                            </ul>
                          </div>
                      @else
                        @foreach ($users as $user)
                        {{-- @dd($user) --}}
                            @if ($user->group->id == Auth::user()->group_id)
                            <div class="col-md-12 ml-2 mt-3">
                              <ul class="users-list">
                                  <li>
                                  <img src="/image/man.png" alt="User Image" width="100px">
                                  <span class="users-list-name">{{ $user->name }}</span>
                                  {{-- <span class="users-list-date">{{ $users->created_at->diffForHumans() }}</span> --}}
                                  </li>
                              </ul>
                            </div>
                            @endif
                        @endforeach
                      @endif
                       {{--  --}}
                    </div>  
                </div>
            </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
      const ctx = document.getElementById('myChart');
      const myChart = new Chart(ctx, {
          type: 'doughnut',
          data: {
              labels: ['bug','success'],
              datasets: [{
                  label: 'test Scenario',
                  data: [{!! json_encode($bug) !!}, {!! json_encode($success) !!}],
                  backgroundColor: [
                    '#FA4676',
                    '#4AF372'
                  ],                  
              }]
          },
      });
      </script>
    




    

@endsection
