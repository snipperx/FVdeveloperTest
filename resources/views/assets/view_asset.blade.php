@extends('layouts.main_layout')
@section('page_dependencies')
    <!-- bootstrap file input -->
    <link href="/bower_components/bootstrap_fileinput/css/fileinput.min.css" media="all" rel="stylesheet"
          type="text/css"/>
@endsection
@section('content')
    <div class="row">
        <!-- New User Form -->
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-files-o pull-right"></i>
                    <h3 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                        New Asset
                    </h3>
                    <p>Enter company Asset:</p>
                    <a href="{{ url('/viewcampony/' . $Asset->id .'/asset') }}" class="btn bg-navy margin pull-right">view Company <i class="fa fa-mail-forward"></i></a>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST" action="/contacts/assets" enctype="multipart/form-data">

                    <div class="box-body">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-sm-2 control-label">Company Asset</label>

                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-building"></i>
                                    </div>
                                    <input type="text" class="form-control" id="name" name="name"
                                           value="{{ !empty($Asset->name) ? $Asset->name : '' }}"
                                           placeholder="Company Name" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="description" class="col-sm-2 control-label">Desciption</label>

                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-bars"></i>
                                    </div>
                                    <input type="text" class="form-control" id="description" name="description"
                                           value="{{ !empty($Asset->description) ? $Asset->description : '' }}"
                                           placeholder="Company Name" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('do') ? ' has-error' : '' }}">
                            <label for="model" class="col-sm-2 control-label">Model </label>

                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-barcode"></i>
                                    </div>
                                    <input type="text" class="form-control" id="model" name="model"
                                           value="{{ !empty($Asset->model) ? $Asset->model : '' }}"
                                           placeholder="Company Name" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('do') ? ' has-error' : '' }}">
                            <label for="amount" class="col-sm-2 control-label">Rand Value </label>

                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa  fa-money"></i>
                                    </div>
                                    <input type="text" class="form-control" id="amount" name="amount"
                                           value="{{ !empty($Asset->amount) ? 'R' .number_format($Asset->amount, 2): '' }}"
                                           placeholder="Enter the rand value..." readonly>
                                </div>
                            </div>
                        </div

                        <hr>
                        <div class="form-group{{ $errors->has('company_id') ? ' has-error' : '' }}">
                            <label for="company_id" class="col-sm-2 control-label">Choose Company</label>

                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-home"></i>
                                    </div>
                                    <input type="text" class="form-control" id="company_id" name="company_id"
                                           value="{{ !empty($Asset->companyName) ? $Asset->companyName : '' }}"
                                           placeholder="Company Name" readonly>
                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button id="cancel" class="btn btn-default"><i class="fa fa-arrow-left"></i> Cancel</button>

                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
            <!-- /.box -->
        </div>
        <!-- End new User Form-->
    </div>
@endsection

@section('page_script')
    <!-- InputMask -->

    <script type="text/javascript">
        //Cancel button click event
        document.getElementById("cancel").onclick = function () {
            location.href = "/contacts";
        };

        document.getElementById("viewcompony").onclick = function () {
            location.href = '/asset/'.$Asset->id.'/hhh';

        };
        viewcompony

    </script>
@endsection