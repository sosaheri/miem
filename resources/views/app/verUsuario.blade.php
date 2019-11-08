@extends('layouts.app')

@section('content')

<div class="content">
        <div class="row">
          <div class="col-md-4">
            <div class="card card-user">
              <div class="image">
                <img src="{{ asset('app/assets/img/background-perfil.jpg') }}" alt="...">
              </div>
              <div class="card-body">
                <div class="author">
                  <a href="#">
                    <img class="avatar border-gray" src="{{ asset('app/assets/img/user.png') }}" alt="...">
                    <h5 class="title">{{ $user->name}}</h5>
                  </a>
                  
                </div>
                <p>En este panel se puede actualizar la información personal de los usuarios</p>
              </div>
              <div class="card-footer">
                <hr>
                <div class="button-container">
                  <div class="row">
                   
                    
                    <div class="col-lg-12 mr-auto">
                      <h5>24,6$
                        <br>
                        <small>Monto Financiado</small>
                      </h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
         
          </div>
          <div class="col-md-8">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Editar Perfil</h5>
              </div>
              <div class="card-body">

                
              <form method="POST" action="{{ route('updateUsuario', $user->id) }}" role="form" enctype="multipart/form-data">
              
                <input type="hidden" name="_method" value="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

               
                  <div class="row">

                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Usuario</label>
                        <input type="text" name="name" class="form-control" placeholder="Usuario" value="{{ $user->name}}">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email </label>
                        <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $user->email}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>input</label>
                        <input type="text" class="form-control" placeholder="Nombre" value="">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>input</label>
                        <input type="text" class="form-control" placeholder="Apellido" value="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Dirección</label>
                        <input type="text" class="form-control" placeholder="Dirección" value="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Ciudad</label>
                        <input type="text" class="form-control" placeholder="Ciudad" value="">
                      </div>
                    </div>
                    
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Código Postal</label>
                        <input type="number" class="form-control" placeholder="Código Postal">
                      </div>
                    </div>
                    
                  </div>

                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" class="btn btn-primary btn-round">Actualizar datos</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
  

@endsection
