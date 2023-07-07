@extends('layouts.backend.app')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Chapters</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>

              <li class="breadcrumb-item"><a href="/admin/courses">Courses</a></li>
              <li class="breadcrumb-item active">Chapters</li>
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

            <!-- /.card-header -->
            <div class="card-body">

                <div class="row">
                    <div class="col-md-3">
                        <a href="{{ route('chapters.create',['id'=>$course_id]) }}" class="btn btn-block btn-outline-primary btn-flat mb-5">Create Chapter</a>
                    </div>
                </div>


              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th></th>
                    <th>Title</th>
                    <th>Excerpt</th>
                    <th>Date</th>

                    <th>Contents</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($chapters as $key=>$chapter)
                    <tr>
                        <th>{{$key+1}}</th>
                        <td>{{@$chapter->title}}</td>
                        <td>{{@$chapter->contenido}}</td>

                        <td>{{ @$chapter->created_at->format("Y-m-d")}}</td>
                        <td>
                          <a href="/admin/chaptercontent/{{@$chapter->id}}" class="btn btn-sm btn-warning">Content</a> 
                          | <a href="/admin/chapterequiz/{{@$chapter->id}}" class="btn btn-sm btn-warning">Quiz</a>
                        </td>
                        
                        <td width="8%">
                            <a href="/admin/chapters/{{@$chapter->id}}/edit" class="btn btn-sm btn-warning legitRipple">
                                <i class="fas fa-pencil-alt"></i></a>

                            <a href="#" data-id="{{ @$chapter->id }}"  data-toggle="modal" data-target="#delobjeto" class="btn btn-sm btn-danger btn-object-delete"><i class="far fa-trash-alt"></i></a>


                        </td>
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

                    <form class="delete-objeto" action="/admin/chapters/delete" method="POST">
                        @csrf

                        <div class="modal-header">
                            <h4 class="modal-title">Confirm Deletion</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-center">

                            <input type="hidden" name="_method" value="delete" >

                            <input type="hidden" name="id" id="id">
                            <p>Are you sure to delete this item?</p>

                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-outline-light">Eliminate</button>
                        </div>
                    </form>

                </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->

        </div>

@endsection
