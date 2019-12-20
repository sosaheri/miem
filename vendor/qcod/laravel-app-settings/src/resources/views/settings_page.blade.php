@extends('layouts.app')

@section('content')

@if (  Auth::user()->hasRole('admin')  )


<div class="content">
        <div class="row">
          <div class="col-md-12">
            
            @include('app_settings::_settings')
            
            
          </div>
   
        </div>
      </div>


  




@else
<script>window.location = "/";</script>
@endif

@endsection
