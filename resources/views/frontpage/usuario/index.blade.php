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
					  <li><a href="#" class="cart__link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><img src="/images/logout.svg" style="with:20px;"></a></li>
                    </ul>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
					</form>
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
			<div class="todocursos__card">
				<div class="todocursos__card__header">
					Account
				</div>
				<div class="todocursos__card__body">
					<table class="todocursos__card__body_table table">
                        <tr>
                            <td class="titulo"><strong>User</strong>  </td>
                            <td>{{@$user->name}}</td>
                        </tr>
                        <tr>
                            <td class="titulo"><strong>Email</strong>  </td>
                            <td>{{@$user->email}}</td>
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
                            <td>{{@$user->profile->firstname}}</td>
                        </tr>
                        <tr>
                            <td class="titulo"><strong>Middle</strong>  </td>
                            <td>{{@$user->profile->middlename}}</td>
                        </tr>
                        <tr>
                            <td class="titulo"><strong>Last name</strong>  </td>
                            <td>{{@$user->profile->lastname}}</td>
                        </tr>
                    </table>

					<div class="card__footer">
						<a href="/user/edit" class="btn__edit__profile">Edit profile</a>
					</div>
				</div>
			</div>
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