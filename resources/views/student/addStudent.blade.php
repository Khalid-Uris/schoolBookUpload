@extends('student.master')
@section('content')
    <section class="container my-4">
        <div class="row">
            <div class="col-md-12 offset-md-12">

                <form action="{{ Route('student.store') }}" method="POST">
                    @csrf
                    @if (session()->has('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    @if (Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif

                    <div class="card card-primary">
                        <div class="card-header font-weight-bolder">
                            REGISTER STUDENT
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="my-input">First Name</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Enter Your First Name"
                                        name="first_name" value="{{ old('first_name') }}">
                                </div>
                                @error('first_name')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="my-input">Last Name</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Enter Your Last Name"
                                        name="last_name" value="{{ old('last_name') }}">
                                </div>
                                @error('last_name')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- phone mask -->
                            <div class="form-group mb-3">
                                <label>Contact Number</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input type="text" class="form-control" data-mask
                                        placeholder="Enter Your Contact Number" name="contact_number"
                                        value="{{ old('contact_number') }}">
                                </div>
                                @error('contact_number')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- <div class="form-group">

                                <label for="my-input">CNIC</label>
                                <input id="my-input" class="form-control" type="number"
                                    placeholder="Enter Your CNIC Number" name="cnic" value="{{ old('cnic') }}">
                                <span class="badge bg-danger">Enter CNIC Number without Dash</span>
                                <div>
                                    @error('cnic')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                                    @error('cnic')
                                        <span class="text-danger error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> --}}
                            <div class="form-group mb-3">
                                <label for="my-input">CNIC</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="number" class="form-control" placeholder="Enter Your CNIC Number"
                                        name="cnic" value="{{ old('cnic') }}">

                                </div>
                                <span class="badge bg-danger">Enter CNIC Number Without Dash</span>
                                <div>
                                    {{-- @error('cnic')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror --}}
                                    @error('cnic')
                                        <span class="text-danger error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label>Email Address</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Enter Your Email Address"
                                        value="{{ old('email') }}" name="email">
                                </div>
                                {{-- @error('email')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror --}}
                                @error('email')
                                    <span class="text-danger error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label>Password</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    </div>
                                    <input type="password" class="form-control" placeholder="Enter Your Password"
                                        name="password" value="{{ old('password') }}">
                                </div>
                                <!-- /.input group -->
                                @error('password')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label>Retype Password</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    </div>
                                    <input type="password" class="form-control" placeholder="Enter Your Retype Password"
                                        name="retype_password" value="{{ old('retype_password') }}">
                                </div>
                                @error('retype_password')
                                    <span class="text text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- @if (session('id'))
                            <div class="col-lg-4">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="" selected>---Select---</option>
                                    <option value="active">
                                        Unblock</option>
                                    <option value="inactive">
                                        Block</option>
                                </select>
                            </div>
                            @endif --}}

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
