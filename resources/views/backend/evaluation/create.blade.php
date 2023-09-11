@extends('layouts.backend.app')
@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Question</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="/admin/courses">Courses</a></li>
              <li class="breadcrumb-item"><a href="/admin/chapter/{{$id}}">Chapters</a></li>
              <li class="breadcrumb-item active">Create question</li>
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

            <form class="form-horizontal" id="frm-question" action="{{ route('chapterequiz.store') }}" method="POST" enctype="multipart/form-data">

              <div class="card-body">
                  @csrf
               
                <input type="hidden" name="parent_id" value="{{$id}}">
                  @include('backend.evaluation.form.index')

              </div>
              <div class="card-footer">
                      <a href="{{ route('chapterequiz.index',['chapter'=>$id]) }}" class="btn btn-danger">Cancel</a>
                  <button type="submit" class="btn btn-info pull-right">Save</button>
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

        CKEDITOR.replace( description, {   height: 300 });
        CKEDITOR.config.allowedContent = true;
        CKEDITOR.config.contentsCss = '/css/app.css';




})

</script>
@endsection
