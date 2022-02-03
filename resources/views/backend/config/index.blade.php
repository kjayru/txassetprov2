@extends('layouts.backend.app')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Configuración</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
              <li class="breadcrumb-item active">Configuración</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    @if(session('info'))
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success">
                        {{ session('info')}}
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">


                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                        <h3 class="card-title">Actualizar Acceso</h3>
                        </div>


                        <form role="form" action="{{ route('configs.update',$user->id) }}" method="POST">
                        <div class="card-body">

                            @csrf
                            <input type="hidden" name="_method" value="PUT">

                            @include('backend.config.form.index')

                            </div>

                            <div class="card-footer">

                            <button type="submit" class="btn btn-info pull-right">Actualizar</button>
                            </div>
                        </form>


                    </div>
                </div>

          </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>





@endsection
