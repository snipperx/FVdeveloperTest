@extends('layouts.main_layout')
@section('page_dependencies')

@endsection
@section('content')
    <div class="box">
        <div class="box-header with-border">

            <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                Assets List
            </h4>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                    <i class="fa fa-minus"></i></button>

            </div>

        </div>
        <p>

        </p>
        <a class="btn btn-app pull-right" a href="{{ url('/create_asset') }}">
            <i class="fa fa-plus-circle"></i> ADD
        </a>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Description</th>
                <th>Model</th>
                <th>Cost</th>
                <th></th>

            </tr>
            </thead>
            <tbody>
            @foreach($assets as $list)
                <tr>
                    <td></td>
                    <td>{{ !empty($list->name) ? $list->name : '' }}</td>
                    <td>{{ !empty($list->description) ? $list->description : '' }}</td>
                    <td>{{ !empty($list->model) ? $list->model : '' }}</td>
                    <td>{{ !empty($list->amount) ?  'R' .number_format($list->amount, 2): '' }}</td>

                    {{--<td>--}}
                        {{--<div class="text-center">--}}
                            {{--<img src="{{ (!empty($list->logo)) ? Storage::disk('local')->url("public/logos/images/$list->logo") : 'http://lorempixel.com/400/200' }}"--}}
                                 {{--class="avatar img-rounded img-thumbnail" alt="avatar" width="100" height="100">--}}
                        {{--</div>--}}
                    {{--</td>--}}
                    {{--<td><a href="{{ url('/viewassets/' . $list->id .'/list') }}" class="btn btn-xs btn-info btn-flat pull-left">view Companview </a><td>--}}
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Description</th>
                <th>Model</th>
                <th>Cost</th>
                <th></th>
            </tr>
            </tfoot>
        </table>
        <div align="center">
            {{$assets->links()}}
        </div>
    </div>

@endsection

@section('page_script')

@endsection