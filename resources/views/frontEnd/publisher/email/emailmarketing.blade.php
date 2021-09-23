@extends('frontEnd.publisher.layouts.master')
@section('mainContent')
    <div class="row">
        <div class="col-lg-12">
            <h1 style="text-align: center;border-bottom:5px solid black;">Email Marketing </h1>
        </div>


        <section class="content">
            <div class="container-fluid">
                <div class="row" style=" margin-right: 21px;margin-left: 8px;">
                    <!-- left column -->
                    <div class="col-md-4">
                        <!-- general form elements -->
                        <div class="card card-primary" style="background: white;">
                            <div class="card-header"
                                style="    background: #007bff;
                                                                                                                                                                                                                                                    height: 47px;">
                                <h2
                                    style=" padding-top: 7px;
                                                                                                                                                                                                                                            color: white;
                                                                                                                                                                                                                                            text-align: center;
                                                                                                                                                                                                                                            margin-left: 0px;">
                                    Add
                                    New
                                    Email
                                </h2>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="post" action="{{ route('save_email') }}"
                                enctype="multipart/form-data" style="margin-left: 20px;">
                                @if (session('message'))
                                    <p style="color:rgb(255, 30, 0);" class="text-center">
                                        {{ session('message') }}
                                    </p>
                                @endif
                                @foreach ($errors->all() as $error)
                                    <p style="color:rgb(197, 41, 41);" class="text-center">
                                        {{ $error }}
                                    </p>
                                @endforeach

                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Proper Email</label>
                                        <input type="email" name="email" class="form-control" required php
                                            id="exampleInputEmail1" placeholder="riaz@gmail.com">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Password</label>
                                        <input type="text" name="password" class="form-control" required php
                                            id="exampleInputEmail1" placeholder="12345678">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Recovery Email</label>
                                        <input type="email" name="recovery_email" class="form-control"
                                            id="exampleInputEmail1" placeholder="rafat@gmail.com">
                                    </div>


                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->


                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-8">



                        <div class="card" style="background: white;">
                            <div class="card-header"
                                style="background: #007bff;
                                                                                                                                                                                                                                        height: 47px;">
                                <h2
                                    style=" padding-top: 7px;
                                                                                                                                                                                                                                color: white;
                                                                                                                                                                                                                                text-align: center;
                                                                                                                                                                                                                                margin-left: 0px;">
                                    List
                                    Of
                                    Emails
                                </h2>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" style="height:578px;overflow:auto;">
                                @if (session('delete_message'))
                                    <p style="color:aqua;" class="text-center">
                                        {{ session('delete_message') }}
                                    </p>
                                @endif
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>

                                        <tr>
                                            <th style="background: #4c14c9;color: white;">Id</th>
                                            <th style="background: #4c14c9;color: white;">Email</th>
                                            <th style="background: #4c14c9;color: white;">status</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @forelse($data as $v_data)
                                            <tr>

                                                <td>{{ $v_data->id }}</td>
                                                <td style="background: white;">
                                                    <p> {{ $v_data->email }}</p>
                                                </td>
                                                @if ($v_data->status == 1)
                                                    <td style="background: #bdc914;color: white;">Pending</td>
                                                @elseif($v_data->status==2)
                                                    <td style="background: #29c914;color: white;">Accept</td>
                                                @else
                                                    <td style="background: #c92914;color: white;">Reject</td>
                                                @endif
                                            </tr>

                                        @empty
                                            <tr class='text-center' style="color:red">
                                                <td colspan="12">No available data</td>
                                            </tr>
                                        @endforelse



                                    </tbody>

                                    <tfoot>

                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        {{ $data->links() }}
                        <!-- /.card -->

                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    </div>




@endsection
