@extends('layouts.backend.app')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Contacts</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
              <li class="breadcrumb-item active">Contacts</li>
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
              <h3 class="card-title">Contacts</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <div class="row">

                </div>

                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Origin</th>
                        <th>Message</th>
                        <th>Date</th>

                    </tr>
                    </thead>

                    <tbody>
                        @foreach($contacts as  $k =>$con)
                       <tr>
                           <td >{{ $k+1}}</td>
                           <td >{{ $con->name}}</td>
                           <td >{{ $con->phone}}</td>
                           <td >{{ $con->email}}</td>
                           <td >{{ $con->origen}}</td>
                           <td >{{ $con->message}}</td>
                           <td >{{ $con->created_at->format("Y-m-d")}}</td>

                        </tr>
                        @endforeach
                    </tbody>
                  </table>



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



        <div class="modal fade" id="delobjeto">
            <div class="modal-dialog">
                <div class="modal-content bg-danger">

                    <form class="delete-objeto" action="/admin/posts/delete" method="POST">
                        @csrf

                        <div class="modal-header">
                            <h4 class="modal-title">Confirmar Eliminación</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-center">

                            <input type="hidden" name="_method" value="delete" >

                            <input type="hidden" name="id" id="id">
                            <p>¿Esta seguro de eliminar este item?</p>

                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-outline-light">Eliminar</button>
                        </div>
                    </form>

                </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->

        </div>

@endsection
