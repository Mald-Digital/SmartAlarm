@extends('layouts.app')

@section('content')
    <!-- Start rows -->

    <!-- Start row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="header-title mb-3">Iteratie 1</h4>

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Sensor</th>
                            <th scope="col">Status</th>
                            <th scope="col">Type</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach($devices as $device)
                            <tr>
                                <td>{{ $device->name }}</td>
                                <td>{{ $device->status }}</td>
                                <td>{{ $device->type }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary">Open</button>
                                    <button type="button" class="btn btn-secondary">Close</button>
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
