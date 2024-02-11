<?php 
if(@$_GET['name']=='logout'){
    session_start();
    session_destroy();
}
session_start();
if(@$_SESSION['user_id']!=''){
    header('Location: products-home.php');
}else{
?>
<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <!-- <link rel="shortcut icon" href="../assets/images/favicon.ico"> -->

                <!-- jvectormap -->
                <link href="../assets/libs/jqvmap/jqvmap.min.css" rel="stylesheet" />
        <!-- Bootstrap Css -->
        <link href="../assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />

        <link href="../assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css" />
        
        <!-- Icons Css -->
        <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />

        <!-- App Css-->
        <link href="../assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

        <link href="../assets/css/panel.css" rel="stylesheet" type="text/css" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

        <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>    

        <style>

.error-feedback,
.phone_error,
.courses_error {
  display: none;
  width: 100%;
  margin-top: 0.25rem;
  font-size: 80%;
  color: #ff002e;
}

        </style>

    </head>

    <body class="">
        <div class="bg-overlay"></div>
        <div class="account-pages my-5 pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-4 col-lg-6 col-md-8">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="">
                                    <div class="text-center">
                                        <a href="index.html" class="">
                                            <!-- <img src="../assets/images/logo-dark.png" alt="" height="50" class="auth-logo logo-dark mx-auto"> -->
                                            <!-- <img src="../assets/images/logo-light.png" alt="" height="50" class="auth-logo logo-light mx-auto"> -->
                                        </a>
                                    </div>
                                    <!-- end row -->
                                    <h4 class="font-size-18 text-muted mt-2 text-center">Welcome Back !</h4>
                                    <form class="form-horizontal" id="login_form">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label class="form-label" for="email">Email</label>
                                                    <input type="text" class="form-control" id="email" placeholder="Enter email">
                                                    <div class="error-feedback">
                                                            Please enter the Email Address
                                                    </div>
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label" for="password">Password</label>
                                                    <input type="password" class="form-control" id="password" placeholder="Enter password">
                                                    <div class="error-feedback">
                                                            Please enter the Password
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <!-- <div class="col">
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" id="customControlInline">
                                                            <label class="form-label" class="form-check-label" for="customControlInline">Remember me</label>
                                                        </div>
                                                    </div> -->
                                                    <div class="col-7 d-none">
                                                        <div class="text-md-end mt-3 mt-md-0">
                                                            <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-grid">
                                                <div class="error-feedback" style="font-size:14px;text-align:center;" id="login_error">
                                                            Please enter proper Credentials
                                                </div>
                                                    <button class="btn btn-info waves-effect waves-light" id="login" type="button">Log In</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 text-center d-none">
                            <p class="text-white-50">Don't have an account ? <a href="auth-register.html" class="fw-medium text-primary"> Register </a> </p>
                            <p class="text-white-50">© <script>document.write(new Date().getFullYear())</script> Upzet. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign</p>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end Account pages -->

        
        <!-- JAVASCRIPT -->
<script src="../assets/libs/jquery/jquery.min.js"></script>
<script src="../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/libs/metismenu/metisMenu.min.js"></script>
<script src="../assets/libs/simplebar/simplebar.min.js"></script>
<script src="../assets/libs/node-waves/waves.min.js"></script>
<script src="../assets/libs/select2/js/select2.min.js"></script>

<script src="../assets/js/pages/bootstrap-toasts.init.js"></script>

<script src="../assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

<!-- Required datatable js -->
<script src="../assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

<!-- Buttons examples -->
<script src="../assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="../assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<!-- Responsive examples -->
<script src="../assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="../assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

<script src="../assets/libs/sweetalert2/sweetalert2.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"></script>

    <!-- highletting text js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mark.js/8.11.1/jquery.mark.min.js"></script>

<script src="../assets/libs/pdfmake/build/pdfmake.min.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.1.1/js/buttons.print.min.js"></script>
<!-- materialdesign icon js-->
<script src="../assets/js/pages/materialdesign.init.js"></script>

<script src="../assets/js/app.js"></script>
<script src="../assets/js/panel.js"></script>


        <script>
            $(document).on("click","#login",function(){
                var email=$('#email').val().trim();
                var password=$('#password').val().trim();
                if(email==''||password==''){
                    if(email==''){
                        $('#email').addClass('invalid-div');
                        $('#email').removeClass('valid-div');
                        $('#email').closest('div').find('.error-feedback').show();
                    }else{
                        $('#email').addClass('valid-div');
                        $('#email').removeClass('invalid-div');
                        $('#email').closest('div').find('.error-feedback').hide();
                    }
                    if(password==''){
                        $('#password').addClass('invalid-div');
                        $('#password').removeClass('valid-div');
                        $('#password').closest('div').find('.error-feedback').show();
                    }else{
                        $('#password').addClass('valid-div');
                        $('#password').removeClass('invalid-div');
                        $('#password').closest('div').find('.error-feedback').hide();
                    }
                }
            else{
                details={formName:'login',email:email,password:password};
                $.ajax({
                        type:'post',
                        url:'products-ajax.php',
                        data:details,
                        success:function(data){
                            if(data==0){
                            document.getElementById('login_form').reset();
                                $('#login_error').hide();
                                window.location.href="products-home.php";
                            }else{
                                $('#login_error').show();
                            }
                        }
                    })

            }
            })
        </script>

    </body>
</html>
<?php } ?>