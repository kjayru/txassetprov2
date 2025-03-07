@extends('layouts.backend.app')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Course</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
              <li class="breadcrumb-item active">Course</li>
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
                        <a href="{{ route('courses.create') }}" class="btn btn-block btn-outline-primary btn-flat mb-5">Create Course</a>
                    </div>
                </div>


              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th></th>
                    <th>Title</th>
                    <th>Excerpt</th>
                    <th>Price</th>
                    
                    <th></th>
                    <th>Chapters</th>
                    <th>Date</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    @foreach($courses as $key=>$course)
                    <tr>
                        <th>{{$key+1}}</th>
                        <td>{{$course->titulo}}</td>
                        <td>{{$course->resumen}}</td>
                        <td>{{ $course->precio}}</td>
                       <td><a href="#" class="btn btn-sm btn-success btn__getcourses"  data-id="{{$course->id}}" data-examid="{{@$course->examcourse->exam_id}}" data-toggle="modal" data-target="#examModal">Assign exam</a></td>
                        <td><a href="/admin/chapters/{{$course->id}}" class="btn btn-sm btn-warning">Capitulos</a></td>
                        
                        <td>{{ $course->created_at->format("Y-m-d")}}</td>
                        <td width="8%">
                            <a href="/admin/courses/{{$course->id}}/edit" class="btn btn-sm btn-warning legitRipple">
                                <i class="fas fa-pencil-alt"></i></a>

                            <a href="#" data-id="{{ $course->id }}" data-toggle="modal" data-target="#delobjeto" class="btn btn-sm btn-danger btn-object-delete"><i class="far fa-trash-alt"></i></a>


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

                    <form class="delete-objeto" action="/admin/courses/delete" method="POST">
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



        <!-- Modal -->
<div class="modal fade" id="examModal" tabindex="-1" aria-labelledby="examModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered  modal-lg">
    <div class="modal-content">
          <form action="{{route('course.exam')}}" method="POST">
            @csrf
            <div class="modal-header">
              <h5 class="modal-title" id="examModalLabel">EXAM</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <div class="form-group">
                <label for="course-selector">Select exam</label>
                <select name="exam" id="course-selector" class="custom-select">
                  <option value="">Select</option>

                </select>
              </div>

              <input type="hidden" name="course_id" id="course_id">
            </div>

            <div class="modal-footer">
              
              <button type="submit" class="btn btn-primary">Save </button>
            </div>
        </form>
    </div>
  </div>
</div>

@endsection
