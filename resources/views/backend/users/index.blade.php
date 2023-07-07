@extends('layouts.backend.app')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Orders</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
              <li class="breadcrumb-item active">User Registers</li>
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
              <h3 class="card-title">Users</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">





                <table id="example1" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Birthday</th>
                        <th>SSN</th>
                        <th>License</th>
                        <th>Zip code</th>
                        <th>Fecha</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @if(count($users)>0)
                        @foreach($users as $k => $user)
                        <tr>
                            <td>{{ $k+1 }}</td>
                            <td>{{ $user->name}} {{ @$user->profile->lastname }} {{ @$user->profile->middlename }}</td>
                            <td>{{ @$user->profile->birthday  }}</td>
                            <td>{{ @$user->profile->ssn }}</td>
                            <td>{{ @$user->profile->license }}</td>
                            <td>{{ @$user->profile->zipcode }}</td>
                            <td>{{  @strftime("%d %B %Y", date (strtotime($user->profile->created_at )) )  }}</td>
                            <td>
                                <a href="/admin/users/{{$user->id}}/edit" class="btn btn-sm btn-warning legitRipple" data-tooltip="Edit" data-delay="500" data-hasqtip="0" aria-describedby="qtip-0">
                                    <i class="fas fa-pencil-alt"></i></a>


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

                    <form class="delete-objeto" action="/admin/posts/delete" method="POST">
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
