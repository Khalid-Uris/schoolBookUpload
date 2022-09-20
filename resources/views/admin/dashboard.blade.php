@extends('admin.master')
@section('content')
    <section class="container my-4">
        <div class="row">
            {{-- Total books --}}
            <div class="col-lg-6 ">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$totalBooks}}</h3>

                        <p>Books</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-plus"></i>
                    </div>

                </div>
            </div>

            {{-- All Student --}}
            <div class="col-lg-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                  <div class="inner">
                    <h3>{{$totalStudent}}</h3>

                    <p>Student Registrations</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person-add"></i>
                  </div>

                </div>
              </div>


        </div>
    </section>
@endsection
