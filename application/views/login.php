<div class="login-box">
  <div class="login-logo">
    <!-- <a href="../../index2.html"> --><b>SFSM</b>Inc.<!-- </a> -->
  </div>
  <!-- /.login-logo -->
  <!-- <div id="homepage_banner" class="text-center slider-mod" style="background:url('<?php echo base_url();?>assets/img/banner1.jpg'); background-position:center;background-size:cover;"> -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form method="post" id="login-form">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="<?php echo base_url(); ?>Login/forgotPass">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="<?php echo base_url(); ?>Login/register" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  <!-- </div> -->
</div>
</div>
<!-- /.login-box -->
  <script src="<?php echo base_url(); ?>assets/template/plugins/jquery/jquery.min.js"></script>
  <!-- <script type="text/javascript" src="<?php echo base_url()?>assets/js/log-in.js"></script> -->
  <script type="text/javascript">
    $(document).ready(function(){
      $('#login-form').on('submit', function(e){
        e.preventDefault();
        window.top.location = '<?php echo base_url()?>admin/home/index';
      });
    });
  </script>