@extends('layouts.app')

@section('content')
<!-- Start rows -->

  <!-- Start row -->
  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-body">

          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">unit_no</th>
                <th scope="col">device_type</th>
                <th scope="col">status</th>
                <th scope="col">rssi</th>
                <th scope="col">time</th>
                <th scope="col">updated_at</th>
              </tr>
            </thead>
            <tbody>

              @foreach($events as $event)
              <tr>
                <th scope="row">{{ $event->id }}</th>
                <td>{{ $event->unit_no }}</td>
                <td>{{ $event->device_type }}</td>
                <td>{{ $event->status }}</td>
                <td>{{ $event->rssi }}</td>
                <td>{{ $event->time }}</td>
                <td>{{ $event->updated_at }}</td>
              </tr>
              @endforeach

            </tbody>
          </table>

        </div> <!-- end card-body-->
      </div> <!-- end card-->
    </div> <!-- end col -->
  </div>
  <!-- end row -->

<!-- end rows -->
@endsection
