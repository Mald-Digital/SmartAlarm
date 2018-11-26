@extends('layouts.app')

@section('content')
<!-- Start rows -->

  <!-- Start row -->
  <div class="row">
    <div class="col-xl-12">
      <div class="card">
        <div class="card-body">
          <div class="row">

            <!-- Alarm table -->
            <div class="col-xl-6">
              <h4 class="header-title mb-3">Alarm</h4>
              <table class="table table-hover">

                <tbody>
                  @foreach($alarms as $alarm)
                  <tr>
                    <td>{{ $alarm->name }}</td>

                    <td>
                      <form method="POST" action="{{ route('alarm.update', $alarm->id) }}" enctype="multipart/form-data">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}

                        <!-- Bool Switch-->
                        <input
                        name="sensor-status"
                        id="switch1"
                        type="checkbox"

                        @if($alarm->status == 1)
                        checked="checked"
                        @endif

                        data-switch="bool"
                        value="1"
                        onclick="test()"
                        onChange="this.form.submit()"
                        />
                        <label for="switch1" data-on-label="On" data-off-label="Off"></label>
                      </form>
                    </td>

                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- End alarm table -->

            <!-- Devices table -->
            <div class="col-xl-6">
              <h4 class="header-title mb-3">Devices</h4>
              <table class="table table-hover">
                <tbody>

                  @foreach ($alarm->devices as $device)
                  <tr>
                    <td>{{ $device->name }}</td>

                    <td>

                      <form method="POST" action="{{ route('devices.update', $device->id) }}" enctype="multipart/form-data">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}

                        <!-- Bool Switch-->
                        <input
                        name="device-status{{ $device->id }}"
                        id="device-switch{{$device->id}}"
                        type="checkbox"

                        @if($device->status == 1)
                        checked="checked"
                        @endif

                        data-switch="bool"
                        value="1"
                        onclick="test()"
                        onChange="this.form.submit()"
                        />
                        <label for="device-switch{{ $device->id }}" data-on-label="On" data-off-label="Off"></label>
                      </form>
                    </td>
                  </tr>
                  @endforeach

                </tbody>
              </table>
            </div><!-- end col -->
            <!-- End devices table -->

          </div><!-- end row -->
        </div> <!-- end card-body-->
      </div> <!-- end card-->

      <div class="card">
        <div class="card-body">
          <h4 class="header-title mb-3">Log</h4>
        </div>
      </div>

    </div> <!-- end col -->
  </div>
  <!-- end row -->

<!-- end rows -->
@endsection
