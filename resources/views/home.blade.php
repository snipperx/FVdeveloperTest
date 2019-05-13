@extends('layouts.main_layout')

@section('page_dependencies')

@endsection

@section('content')
    <div class="row">
        <div class="col-lg-6 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{$companiescount}}</h3>

                    <p>Companies </p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{ url('/list_compnies') }}" class="small-box-footer">More info <i
                            class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{$assetcount}}<sup style="font-size: 20px"></sup></h3>

                    <p>Total Assets</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{ url('/list_assets') }}" class="small-box-footer">More info <i
                            class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-xs-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Recently Added Companies </h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <ul class="products-list product-list-in-box">

                    @foreach($newcompony as $list)
                    <li class="item">
                        <div class="product-img">
                            <img src="{{ (!empty($list->logo)) ? Storage::disk('local')->url("public/logos/images/$list->logo") : 'http://lorempixel.com/400/200' }}"
                                 class="avatar img-rounded img-thumbnail" alt="avatar" width="100" height="100">
                        </div>
                        <div class="product-info">
                            <a href="javascript:void(0)" class="product-title">{{$list->name}}
                                <span class="label label-info pull-right">new</span></a>
                            <span class="product-description">
                         {{$list->email}}
                        </span>
                            <span class="product-description">
                                 <i class="fa fa-internet-explorer "></i>
                         {{$list->website_url}}
                        </span>
                        </div>
                    </li>
                    @endforeach
                    <!-- /.item -->
                </ul>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-center">
            <a href="{{ url('/list_compnies') }}" class="uppercase">View All Products</a>
        </div>

    </div>

    <!-- assets -->

    <div class="col-lg-6 col-xs-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Recently Added Assets</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <ul class="products-list product-list-in-box">
                    @foreach($newassets as $asset)
                    <li class="item">
                        <div class="product-info">
                            <a href="javascript:void(0)" class="product-title">{{$asset->description}}
                                <span class="label label-success pull-right">new</span></a>
                            <span class="product-description">
                          {{$asset->model}}
                        </span>
                        </div>
                        <span class="product-description">
                            <i class="fa fa-money"></i>
                         {{ 'R' .number_format($asset->amount, 2)}}
                        </span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-center">
            <a href="{{ url('/list_assets') }}" class="uppercase">View All Products</a>
        </div>
        <!-- /.box-footer -->
    </div>
@endsection

@section('page_script')

@endsection