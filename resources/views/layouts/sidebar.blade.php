<div class="sidebar" data-color="white" data-active-color="danger">
         
        <div class="logo">
          
          <a href="/" class="simple-text logo-normal">
            App Moratoria 2019/2020
  
          </a>
        </div>
        <div class="sidebar-wrapper">
          <ul class="nav">

          

                    @if ( Auth::user()->hasRole('admin'))

                        <li class="active ">
                            <a href="{{ url('/') }}">
                            <i class="nc-icon nc-bank"></i>
                            <p>Panel Admin</p>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('/gestionUsuarios') }}">
                            <i class="fa fa-users-cog"></i>
                            <p>Gestion de usuarios</p>
                            </a>
                        </li>
                        
                    @else

                        <li >
                            <a href="/">
                            <i class="nc-icon nc-tv-2"></i>
                            <p>Panel Contribuyentes</p>
                            </a>
                        </li>
                        
                    @endif



            
            
             <li>
                <a href="{{ url('/miUsuario', Auth::user()->id) }}">
                  <i class="nc-icon nc-single-02"></i>
                  <p>Perfil Contribuyente</p>
                </a>
              </li>

              @if ( Auth::user()->hasRole('admin'))
              <li>
                  <a href="{{ url('/historico' ) }}">
                    <i class="nc-icon nc-tile-56"></i>
                    <p>Historial de Pagos</p>
                  </a>
              </li>

              @else

              <li>
                  <a href="{{ url('/miHistorico', Auth::user()->id) }}">
                    <i class="nc-icon nc-tile-56"></i>
                    <p>Historial de Financiamientos y Pagos</p>
                  </a>
              </li>

              @endif

            <!-- <li>
              <a href="./pago.html">
                <i class="nc-icon nc-money-coins"></i>
                <p>Pagos</p>
              </a>
            </li> -->

            @if ( Auth::user()->hasRole('admin'))
              <li>
                  <a href="{{ url('/configuracion' ) }}">
                    <i class="nc-icon nc-tile-56"></i>
                    <p>Configuración</p>
                  </a>
              </li>

              @endif
            <li>  
                <a href="{{ url('/logout') }}">
                  <i class="nc-icon nc-button-power"></i>
                  <p>Salir</p>
                </a>
              </li>       
  
  
  
             
          </ul>
        </div>
      </div>
      <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
          <div class="container-fluid">
            <div class="navbar-wrapper">
              <div class="navbar-toggle">
                <button type="button" class="navbar-toggler">
                  <span class="navbar-toggler-bar bar1"></span>
                  <span class="navbar-toggler-bar bar2"></span>
                  <span class="navbar-toggler-bar bar3"></span>
                </button>
              </div>
              <a class="navbar-brand" href="#pablo"></a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-bar navbar-kebab"></span>
              <span class="navbar-toggler-bar navbar-kebab"></span>
              <span class="navbar-toggler-bar navbar-kebab"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">
          
            </div>
          </div>
        </nav>
        <!-- End Navbar -->