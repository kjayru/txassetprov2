@extends('layouts.frontend.cursos.app')
@section('content')
<div class="banner color__banner">
	<div class="container-fluid">
		<div class="row justify-content-between">
			<div class="col-md-4">
				<div class="breadcrum">
					<ul>
						<li><a href="/" class="breadcrum__link">Home</a></li>
						<li><span>></span><a href="/USER" class="breadcrum__link ">My profile</a></li>
					</ul>
				</div>
                
			</div>
            <div class="col-md-1 text-right">
                <div class="cart">
                    <ul>
                      <li><a href="/user" class="cart__link"><i class="fa fa-user-circle" aria-hidden="true"></i></a></li>
                      <li><a href="/cart" class="cart__link"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>	   
		</div>
	</div>
   
</div>

<!--contenido-->
<div class="todocursos">
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">

        <form action="/user/saveprofile" method="POST">
            @csrf
			<div class="todocursos__card">
				<div class="todocursos__card__header">
					Account
				</div>
				<div class="todocursos__card__body">
					<table class="todocursos__card__body_table table">
                        <tr>
                            <td class="titulo"><strong>User</strong>  </td>
                            <td><input type="text" name="user" id="user" class="form-control" value="{{$user->name}}"> </td>
                        </tr>
                        <tr>
                            <td class="titulo"><strong>Email</strong>  </td>
                            <td><input type="text" name="email" id="email" class="form-control" value="{{$user->email}}"></td>
                        </tr>
                    </table>
				</div>
                <div class="todocursos__card__header">
					About you
				</div>
                <div class="todocursos__card__body">
					<table class="todocursos__card__body_table table">
                        <tr>
                            <td class="titulo"><strong>Name</strong>  </td>
                            <td><input type="text" name="name" id="name" value="{{$user->name}}" class="form-control"></td>
                        </tr>
                        <tr>
                            <td class="titulo"><strong>Middle</strong>  </td>
                            <td><input type="text" name="middle" id="middle" class="form-control" value="{{@$user->middle}}"></td>
                        </tr>
                        <tr>
                            <td class="titulo"><strong>Last name</strong>  </td>
                            <td><input type="text" name="lastname" id="lastname" class="form-control" value="{{@$user->lastname}}"></td>
                        </tr>
                    </table>

					<div class="card__footer">
						<button type="submit" class="btn__edit__profile no-border">Save profile</button>
					</div>
				</div>
			</div>
        </form>

		</div>
		<div class="col-md-4">
			<ul class="nav__usuario">
				<li class="nav__usuario__list">
					<a href="/user" class="nav__usuario__list__item active">My profile</a>
				</li>
				<li class="nav__usuario__list">
					<a href="/user/my-courses" class="nav__usuario__list__item ">My courses</a>
				</li>
			</ul>
		</div>
	</div>
</div>
@endsection