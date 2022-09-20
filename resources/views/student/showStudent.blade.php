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
                        <div>
                            <h3 class="card-title">Students</h3>
                        </div>
                        <br>
                        <div class="text-left">
                            <a href="{{route('student.index')}}" class="btn btn-primary m-2">
                                <i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Contact Number</th>
                                    <th>CNIC Number</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($show as $item)
                                    <tr>
                                        <td>{{ $item->first_name }}</td>
                                        <td>{{ $item->last_name }}</td>
                                        <td>{{ $item->contact_number }}</td>
                                        <td>{{ $item->cnic }}</td>
                                        <td>{{ $item->email }}</td>
                                        @if ($item->status=='active')
                                        <td><span class="badge bg-success">Unblock</span></td>
                                        @else
                                        <td><span class="badge bg-danger">Block</span></td>
                                        @endif

                                        {{-- <td class="text-center">
                                            <label class="switch">
                                                <input data-id="{{ $item->id }}" class="is-trainee-block"
                                                    type="checkbox" data-onstyle="success" data-offstyle="danger"
                                                    data-toggle="toggle" data-on="Active" data-off="InActive"
                                                    {{ $item->status ? 'checked' : '' }}>
                                                <span class="slider round"></span>
                                                <br>
                                            </label>
                                        </td> --}}
                                        <td>
                                            <a href="{{ route('student.edit', $item->id) }}" class="btn btn-primary m-2">
                                                <i class="fa fa-pen"></i>
                                            </a>
                                            {{-- @if ($item->status == 1)
                                        <a href="{{route('student.updateStatus',['student_id'=>$item->id,'status_code'=>0])}}" class="btn btn-danger"><i class="fa fa-ban"></i></a>
                                        @else
                                        <a href="{{route('student.updateStatus',['student_id'=>$item->id,'status_code'=>1])}}" class="btn btn-danger m-2"><i class="fa fa-check"></i></a>
                                        @endif --}}

                                            <a href="{{ route('student.destroy', $item->id) }}"
                                                class="btn btn-danger m-2"><i class="fa fa-trash"></i></a>
                                        </td>
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
