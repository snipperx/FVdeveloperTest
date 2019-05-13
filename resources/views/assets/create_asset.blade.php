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
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST" action="/contacts/assets" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="box-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger alert-dismissible fade in">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;
                                </button>
                                <h4><i class="icon fa fa-ban"></i> Invalid Input Data!</h4>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-sm-2 control-label">Company Asset</label>

                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-building"></i>
                                    </div>
                                    <input type="text" class="form-control" id="name" name="name"
                                           value="{{ old('name') }}" placeholder=" Asset" required>
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
                                           value="{{ old('description') }}" placeholder=" Description">
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
                                           value="{{ old('model') }}" placeholder="Model">
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
                                           value="{{ old('amount') }}" onchange="convertMoney(this.value, 1);"
                                           placeholder="Enter the rand value...">
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
                                    <select id="company_id" name="company_id" class="form-control">
                                        <option value="">*** Select a Company ***</option>
                                        @foreach($compony as $compony)
                                            <option value="{{ $compony->id }}" {{ (old('phys_province') == $compony->id) ? ' selected' : '' }}>{{ $compony->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button id="cancel" class="btn btn-default"><i class="fa fa-arrow-left"></i> Cancel</button>
                        <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-database"></i> Add
                        </button>
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
            location.href = "/list_assets";
        };

        function convertMoney(value, type) {
            if (value.length > 1) {
                var str = value.toString().split('.');
                if (str[0].length >= 4) {
                    str[0] = str[0].replace(/(\d)(?=(\d{3})+$)/g, '$1,');
                }
                if (str[1] && str[1].length >= 5) {
                    str[1] = str[1].replace(/(\d{3})/g, '$1 ');
                }
                value = str + '. 00';
            } else value = value + '. 00';
            if (type == 1) $('#amount').val(value);
            else if (type == 2) $('#').val(value);

            //console.log(value);
        }
    </script>
@endsection