<footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
              
            </nav>
            <div class="credits ml-auto">
              <span class="copyright">
                ©
                <script>
                  document.write(new Date().getFullYear())
                </script>, made with <i class="fa fa-heart heart"></i> by <a href="https://larepaweb.com.ve">Arepa Web Group</a>
              </span>
            </div>
          </div>
        </div>
    </footer>

    
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src=" {{ asset('app/assets/js/core/jquery.min.js') }}"></script>
  <script src=" {{ asset('app/assets/js/core/popper.min.js') }}"></script>
  <script src=" {{ asset('app/assets/js/core/bootstrap.min.js') }}"></script>
  <script src=" {{ asset('app/assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
 
  <!-- Chart JS -->
  <script src=" {{ asset('app/assets/js/plugins/chartjs.min.js') }}"></script>
  <!--  Notifications Plugin    -->
  <script src=" {{ asset('app/assets/js/plugins/bootstrap-notify.js') }}"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src=" {{ asset('app/assets/js/paper-dashboard.min.js?v=2.0.0') }}" type="text/javascript"></script>
  <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src=" {{ asset('app/assets/demo/demo.js') }} "></script>
<script>
$(document).ready(function() {
  // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
  demo.initChartsPages();
});
</script>


</body>
</html>
