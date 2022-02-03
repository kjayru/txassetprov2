@extends('layouts.backend.app')
@section('content')






<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Nota</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="/admin/products">Notas</a></li>
              <li class="breadcrumb-item active">Editar nota</li>
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
            <h3 class="card-title">Nota</h3>
          </div>


          <form role="form" action="{{ route('post.update',$post->id) }}" method="POST" enctype="multipart/form-data">
            <div class="card-body">

                @csrf
                <input type="hidden" name="_method" value="PUT">

                @include('backend.posts.form.index')

              </div>

              <div class="card-footer">
                <a href="{{ route('post.index') }}" class="btn btn-danger">Cancelar</a>
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






  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>


<script>


$(function () {

 /* CKEDITOR.replace( '.contenidos', {
    height: 700
} );*/

        CKEDITOR.replace( contenido, {   height: 300 });
        CKEDITOR.config.allowedContent = true;
        CKEDITOR.config.contentsCss = '/css/app.css';




})

</script>

@endsection
