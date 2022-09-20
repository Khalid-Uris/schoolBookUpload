@extends('admin.master')
@section('content')
    <section class="container my-4">
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('message'))
                    <div class="alert alert-success">{{ session()->get('message') }}</div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Login And Logout Time</h3>
                        {{-- <div class="text-right">
                            <a href="" class="btn btn-primary">Add Bo</a>
                        </div> --}}
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Login/Logout Time</th>
                                    <th>Type</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($show as $item)
                                    <tr>
                                        <td>{{$item->firstname}}</td>
                                        <td>{{$item->created_at}}</td>
                                        <td>{{$item->type}}</td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>

    </section>
@endsection
