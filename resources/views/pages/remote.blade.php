@extends('layouts.app')

@section('content')
    <!-- Start rows -->

    <!-- Start row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="header-title mb-3">Alarm</h4>

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Alarm</th>
                            <th scope="col">Status</th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach($devices as $device)
                            <tr>
                                <td>{{ $device->name }}</td>
                                <td>{{ $device->type }}</td>
                                <td>
                                    <form method="POST" action="{{ route('devices.update', $device->id) }}" enctype="multipart/form-data">
                                        {{ method_field('PUT') }}
                                        {{ csrf_field() }}

                                        <!-- Bool Switch-->
                                        <input
                                          name="sensor-status"
                                          id="switch1"
                                          type="checkbox"

                                          @if($device->status == 1)
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

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Sensor</th>
                            <th scope="col">Type</th>
                            <th scope="col">Status</th>

                            <!-- <th scope="col"></th> -->
                        </tr>
                        </thead>

                        <tbody>

                        @foreach($devices as $device)
                            <tr>
                                <td>{{ $device->name }}</td>
                                <!-- <td>{{ $device->status }}</td> -->
                                <td>{{ $device->type }}</td>
                                <td>
                                    <form method="POST" action="{{ route('devices.update', $device->id) }}" enctype="multipart/form-data">
                                        {{ method_field('PUT') }}
                                        {{ csrf_field() }}

                                        <!-- Bool Switch-->
                                        <input
                                          name="sensor-status"
                                          id="switch1"
                                          type="checkbox"

                                          @if($device->status == 1)
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

                </div> <!-- end card-body-->
            </div> <!-- end card-->

        </div> <!-- end col -->
    </div>
    <!-- end row -->

    <!-- end rows -->
@endsection
