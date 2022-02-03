@extends('layouts.backend.app')
@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Productos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="/admin/products">Productos</a></li>
              <li class="breadcrumb-item active">Crear producto</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">


    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Productos</h3>
          </div>


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

          <form class="form-horizontal" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            <div class="card-header with-border">
              <h3 class="box-title">Nuevo Producto</h3>

            </div>
            <div class="card-body">
                @csrf


                @include('backend.product.form.index')

            </div>
            <div class="card-footer">
                    <a href="{{ route('product.store') }}" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-info pull-right">Guardar</button>
            </div>
          </form>


        </div>
    </div>






        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection
