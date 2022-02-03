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
              <li class="breadcrumb-item active">Productos</li>
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
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Carga de productos</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">





                <form  method="POST" action="/admin/products/proceso" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                     <div class="form-group">
                         <label for="archivo">Cargue el archivos</label>
                         <input type="file" class="form-control-file" id="archivo" name="archivo" required>
                     </div>
                     <div class="form-group text-center">

                        <button class="btn btn-danger" type="submit">Procesar</button>
                     </div>
                </form>


            </div>
            <!-- /.card-body -->
          </div>

          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>





@endsection





