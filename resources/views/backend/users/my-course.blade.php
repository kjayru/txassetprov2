@extends('layouts.backend.app')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Course</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="/admin/users">Users</a></li>
              <li class="breadcrumb-item active">User Course</li>
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
              <h3 class="card-title">Users courses</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">





                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th>Course</th>
                        <th>Initial date</th>
                        <th>Finish date</th>
                        <th>Result</th>
                        <th>Certificated</th>

                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @if(isset($cursos))
                        @foreach($cursos as $k => $course)
                        <tr>
                            <td>{{ $k+1 }}</td>
                            <td>{{$course->id}}</td>
                            <td>{{ $course->course->titulo}} </td>
                            <td>{{ @$course->created_at  }}</td>

                            <td>



                                @if($course->aprobado==1 && $course->caducado==0)
                                {{@$course->updated_at}}
                            @elseif($course->caducado==1 && $course->aprobado==0)
                            {{@$course->updated_at}}
                            @elseif($course->reiniciado==1 && $course->parent_id!=null && $course->aprobado==0)
                            {{@$course->updated_at}}
                            @endif
                            </td>
                            <td>
                                @if($course->aprobado==1 && $course->caducado==0)
                                    Approved
                                @elseif($course->caducado==1 && $course->aprobado==0)
                                    Expired
                                @elseif($course->reiniciado==1 && $course->parent_id!=null && $course->aprobado==0)
                                    Failed
                                @endif
                            </td>
                            <td>
                                @if($course->aprobado==1 && $course->caducado==0)
                                <a href="/admin/users/courses/certified/{{$course->course->id}}/{{$course->id}}/{{$user_id}}" target="_blank" class="btn btn-primary">View</a>
                                @endif
                            </td>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr><td colspan="7">NO DATA</td></tr>
                        @endif

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

                    <form class="delete-objeto" action="/admin/users/delete" method="POST">
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
