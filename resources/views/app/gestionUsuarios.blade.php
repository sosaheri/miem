@extends('layouts.app')

@section('content')





<div class="content">
    @if ($message = Session::get('success'))

    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6">
          <div class="alert alert-success alert-with-icon alert-dismissible fade show" data-notify="container">
            <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
              <i class="nc-icon nc-simple-remove"></i>
            </button>
            <span data-notify="icon" class="nc-icon nc-bell-55"></span>
            <span data-notify="message">{{ $message }} </span>
          </div>
        </div> 
    </div>

    @endif




    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"> Usuarios Registrados</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    Nombre
                  </th>
                  <th>
                    Correo
                  </th>
                  <th>
                    Ver / Editar
                  </th>
                  <th class="text-right">
                    Eliminar
                  </th>
                </thead>
                <tbody>

                  @foreach($users as $user)
                        <tr>
                          <td>
                              {{ $user->name }}
                          </td>
                          <td>
                              {{ $user->email }}
                          </td>
                          <td >
                              <a href="{{ route('verUsuario', $user->id ) }}"> <i class="nc-icon nc-zoom-split"></i> / <i class="nc-icon nc-ruler-pencil"></i>  </a>
                          </td>
                          <td class="text-right">
                            <form action="">
                              <a href="{{ url('eliminarUsuario', $user->id ) }}"> <i class="nc-icon nc-simple-remove"></i> </a>
                              <input type="hidden" name="_method" value="POST">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </form>
                            </td>
                        </tr>
                  @endforeach
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  

@endsection
