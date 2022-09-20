@extends('admin.master')
@section('content')
    <section class="container my-4">
        <div class="row">
            <div class="col-md-12 offset-md-12">

                <form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (session()->has('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    <div class="card card-primary">
                        <div class="card-header font-weight-bolder">
                            {{-- <h3>EDIT USER</h3> --}}
                            ADD STUDENT
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="my-input">Book Title</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Enter Your Book Title"
                                        value="{{ old('book_name') }}" name="book_name">
                                </div>
                                @error('book_name')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Upload Book</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile" name="file"
                                            value="{{ old('file') }}">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                                {{-- <span class="badge bg-danger">Choose Only PDF File</span> --}}
                                @error('file')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" rows="3" placeholder="Enter here" name="description"
                                    value="{{ old('description') }}"></textarea>
                                @error('description')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </section>
@endsection
