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
                        Company Details for {{$company->name}}
                    </h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal"  enctype="multipart/form-data">

                    <div class="box-body">

                        <div class="text-center">
                            <img src="{{ (!empty($company->logo)) ? Storage::disk('local')->url("public/logos/images/$company->logo") : 'http://placehold.it/60x50' }}"
                                 class="avatar img-rounded img-thumbnail" alt="avatar" width="200" height="200">
                        </div>

                        <hr>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-sm-2 control-label">Company Name</label>

                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-building"></i>
                                    </div>
                                    <input type="text" class="form-control" id="name" name="name"
                                           value="{{ !empty($company->name) ? $company->name : '' }}"
                                           placeholder="Company Name" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-sm-2 control-label">Email</label>

                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <input type="email" class="form-control" id="email" name="email"
                                           value="{{ !empty($company->email) ? $company->email : '' }}"
                                           placeholder="Email Address" readonly>
                                    {{--<a href="mailto:{{ $company->email }}">{{ $company->email }}</a>--}}
                                </div>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('do') ? ' has-error' : '' }}">
                            <label for="website_url" class="col-sm-2 control-label">website </label>

                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-internet-explorer"></i>
                                    </div>
                                    <input type="email" class="form-control" id="email" name="email"
                                           value="{{ !empty($company->website_url) ? $company->website_url : '' }}"
                                           placeholder="Email Address" readonly>
                                </div>
                            </div>
                        </div>

                            <hr class="hr-text" data-content="Company Asset for {{$company->name}}">


                    </div>
                    <!-- /.box-body -->

                    <!-- /.box-footer -->
                </form>
                <div class="box-footer">
                    <button id="cancel" class="btn btn-default"><i class="fa fa-arrow-left"></i> Cancel</button>
                </div>
            </div>
            <!-- /.box -->
        </div>
        <!-- End new User Form-->
    </div>
@endsection

@section('page_script')

    <!-- canvas-to-blob.min.js is only needed if you wish to resize images before upload. This must be loaded before fileinput.min.js -->
    <script src="/bower_components/bootstrap_fileinput/js/plugins/canvas-to-blob.min.js"
            type="text/javascript"></script>
    <!-- the main fileinput plugin file -->
    <!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview. This must be loaded before fileinput.min.js -->
    <script src="/bower_components/bootstrap_fileinput/js/plugins/sortable.min.js" type="text/javascript"></script>
    <!-- purify.min.js is only needed if you wish to purify HTML content in your preview for HTML files. This must be loaded before fileinput.min.js -->
    <script src="/bower_components/bootstrap_fileinput/js/plugins/purify.min.js" type="text/javascript"></script>
    <!-- the main fileinput plugin file -->
    <script src="/bower_components/bootstrap_fileinput/js/fileinput.min.js"></script>
    <!-- optionally if you need a theme like font awesome theme you can include it as mentioned below -->
    <script src="/bower_components/bootstrap_fileinput/themes/fa/theme.js"></script>
    <!-- End Bootstrap File input -->

    <script type="text/javascript">
        //Cancel button click event
        document.getElementById("cancel").onclick = function () {
            location.href = "/contacts";
        };

    </script>
@endsection