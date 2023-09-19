@extends('layouts.backend.app')
@section('content')
@php
    use App\Models\ExamQuestion;
@endphp
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
              <li class="breadcrumb-item"><a href="/admin/exams">Exam</a></li>
             
              <li class="breadcrumb-item active"> Questions</li>
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

            <section class="content">
                <div class="row">
                  <div class="col-12">
                    <div class="card">
          
                      <!-- /.card-header -->
                      <div class="card-body">
          
                          <div class="row">
                              <div class="col-md-3">
                                  <a href="{{route('option.create',['opt'=>$exam_id])}}" class="btn btn-block btn-outline-primary btn-flat mb-5">Create Question</a>
                              </div>
                          </div>
          
          
                        <table id="example1" class="table table-bordered table-hover">
                          <thead>
                              <tr>
                                  <th></th>
                                  <th>Quesion</th>
                                  <th>Answer</th>
                                  <th>Date</th>
                                  <th></th>
                              </tr>
                          </thead>
                              <tbody>
                                @foreach ($questions as $k=> $preg)
                             
                                <tr>
                                    <th>{{$k+1}}</th>
                                    <td>{{$preg->question}}</td>
                                    <td>{{ExamQuestion::getResult($preg->id)}}</td>
                                    <td>{{$preg->created_at}}</td>
                                    <td>
                                        <a href="/admin/exams/options/{{$exam_id}}/{{$preg->id}}/edit" class="btn btn-sm btn-warning legitRipple"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="#" data-id="{{$preg->id}}" data-toggle="modal" data-target="#delobjeto" class="btn btn-sm btn-danger btn-object-delete"><i class="far fa-trash-alt"></i></a>
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

        </div>
    </div>






        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


  <div class="modal fade" id="delobjeto">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">

            <form class="delete-objeto" action="/admin/exams/options/{{$exam_id}}/delete" method="POST">
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
