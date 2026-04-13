@extends('Dashboard::Layouts.dashboard')

@section('title', trans('dashboard.Edit User'))

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">{{ trans('dashboard.Users') }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">{{ trans('dashboard.Home') }}</a> / <a href="{{route('dashboard.users.index')}}">{{ trans('dashboard.Users') }}</a> / {{ trans('dashboard.Edit') }}</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                <h3 class="card-title">{{ trans('dashboard.Edit') }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{ route('dashboard.users.update', $data->id) }}">
                    @csrf
                    @method('PUT')
                    @include('appSection@user::form')

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">{{ trans('dashboard.save') }}</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
