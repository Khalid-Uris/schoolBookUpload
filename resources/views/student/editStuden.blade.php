@extends('admin.master')
@section('content')
<section class="container my-4">
    <div class="row">
        <div class="col-md-12 offset-md-12">
            {{-- {{route('parent.update',$edit->id)}} --}}
            <form action="{{route('student.update',$edit->id)}}" method="POST">
                @csrf
                @if (session()->has('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <div class="card card-primary">
                    <div class="card-header font-weight-bolder">
                       {{-- <h3>EDIT USER</h3> --}}
                       UPDATE USER
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="my-input">First Name</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Enter Your First Name" name="first_name"  value="{{old('first_name', $edit->first_name)}}">
                            </div>
                            @error('first_name')
                                <span class="text text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="my-input">Last Name</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Enter Your Last Name" name="last_name" value="{{$edit->last_name}}">
                            </div>
                            @error('last_name')
                                <span class="text text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <!-- phone mask -->
                        <div class="form-group mb-3">
                            <label>Contact Number</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="text" class="form-control" data-inputmask='"mask": "(999) 999-9999"' data-mask placeholder="Enter Your Contact Number" value="{{$edit->contact_number}}" name="contact_number">
                            </div>
                            @error('contact_number')
                                <span class="text text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="my-input">CNIC</label>
                            <input id="my-input" class="form-control" type="number" placeholder="Enter Your CNIC Number" name="cnic" value="{{$edit->cnic}}">
                            <span class="badge bg-danger">Enter CNIC Number without Dash</span>
                        </div>
                        @error('cnic')
                                <span class="text text-danger">{{$message}}</span>
                            @enderror
                        <div class="form-group mb-3">
                            <label>Email Address</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Enter Your Email Address" value="{{$edit->email}}" name="email">
                            </div>
                            @error('email')
                                <span class="text text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="col-lg-4">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="" selected>---Select---</option>
                                {{-- @foreach ($edit as $edits) --}}
                                {{-- @if ($product->category_id == $category->category_id) --}}
                                <option value="active">
                                    Unblock</option>
                                {{-- @else --}}
                                <option value="inactive">
                                    Block</option>
                                {{-- @endif --}}
                                {{-- @endforeach --}}
                            </select>
                            @if($errors->has('status'))
                            <span class="form-text">{{ $errors->first('status') }}</span>
                            @endif
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
