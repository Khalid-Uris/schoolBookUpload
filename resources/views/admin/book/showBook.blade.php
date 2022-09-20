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
                    <div class="float-left font-weight-bolder">
                        <h3 class="card-title" >Books</h3>
                    </div>
                    <br>
                    @if (session('id'))
                    <div class="text-left">
                        <a href="{{route('book.index')}}" class="btn btn-primary m-2">
                            <i class="fas fa-plus"></i></a>
                    </div>
                    @endif

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Book Title</th>
                                <th>Description</th>
                                {{-- <th>Status</th> --}}
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($show as $item)
                                <tr>
                                    <td>{{ $item->book_name }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>
                                        <a href="{{ route('book.view', $item->id) }}" class="btn btn-primary m-2">
                                            <i class="fa fa-eye"></i>
                                        </a>

                                        {{-- <a href="{{ route('book.destroy', $item->id) }}"
                                            class="btn btn-danger m-2"><i class="fa fa-trash"></i></a> --}}
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
