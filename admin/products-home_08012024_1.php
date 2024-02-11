<?php

session_start();
if(@$_SESSION['user_id']==''){
    header('Location: index.php');
}else{

?>
<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Product Upload</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->

        <!-- Plugins css -->
        <link href="../assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />

        <!-- Bootstrap Css -->
        <link href="../assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="../assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

        <style>
            .custom-icon {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                width: 25px;
                height: 25px;
                border-radius: 50%;
                background-color: red;
                cursor: pointer;
                font-size: 20px;
                color: #fff;
            }    
            .image-show i{
                position: absolute;
                right: 0;
                top: -10px;
            }
            .image-show img{
                height: 150px;
                width: 100%;
                object-fit: cover;
            }
            .dropzone{
                min-height:150px;
            }
            .dropzone .dz-message{
                margin:0;
            }
            .page-content{
                padding:calc(0px + 24px) calc(5px / 2) 60px calc(24px / 2)
            }
            .title-card{
                text-align:center;
            }
            .details-card{
                display:none;
                position: absolute;
                top: 0;
                width: 100%;
                /* height: 100%; */
                left: 100%;
            }
            .success-text{
                position: absolute;
                left: 100%;
                top: 3%;
                display:none;
            }
        </style>

    </head>

    <body data-sidebar="dark">
    
    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">          

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content ms-0">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Upload Products</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Products</a></li>
                                            <li class="breadcrumb-item active">Upload Products</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12" style="position:absolute">
                                <div class="card" id="images-card">
                                    <div class="card-body">
                                        <div>
                                            <form action="#" id="drop-area" class="dropzone">
                                                <div class="fallback">
                                                    <input name="file" type="file" class="d-none" multiple="multiple" id="file-upload">
                                                </div>
                                                <div class="dz-message needsclick">
                                                    <div class="mb-3">
                                                        <i class="display-4 text-muted mdi mdi-cloud-upload-outline"></i>
                                                    </div>
                                                    
                                                    <h4>Drop files here to upload</h4>
                                                </div>
                                            </form>
                                        </div>
        
                                        <div class="text-center mt-4">
                                            <button type="button" class="btn btn-primary waves-effect waves-light" onclick="uploadImages()">Send Files <i class="fas fa-arrow-alt-circle-right"></i> </button>
                                        </div>
                                    </div>
                                    <div class="row card-body images-preview">
                                    </div>
                                </div>
                                <div class="card details-card">
                                    <form class="card-body row">            
                                    
                                    <div class="col-md-12 mb-2">
                                        <div class="col-md-4">
                                            <label for="product-name">Product Name</label>
                                            <input type="text" id="product-name" name="product-name" class="form-control" placeholder="Product Name">
                                        </div>
                                    </div>
                                    
                                        <div class="col-md-4">
                                        <h6 for="primary-colors" class="title-card">SPECIFICATIONS</h6>    
                                            <div class="col-md-12">
                                                <label for="primary-colors">PRIMARY COLOR(S)</label>
                                                <input type="text" class="form-control" id="primary-color" placeholder="PRIMARY COLOR(S)">
                                            </div>
                                            <div class="col-md-12">
                                                <label for="accent-color">Stone Category</label>
                                                <select name="stone_cat" id="stone_cat" class="form-select">
                                                    <option value="0">Granite</option>
                                                    <option value="1">Quartz</option>
                                                    <option value="2">Quartzite</option>
                                                    <option value="3">Marble</option>
                                                    <option value="4">Onyx</option>
                                                    <option value="5">Semi Precious</option>
                                                    <option value="6">Porcelain</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="other-industry">Origin</label>
                                                <input type="text" class="form-control" id="prod_origin" placeholder="Origin" value="">
                                            </div>
                                            <div class="col-md-12">
                                                <label for="other-industry">SKU Number</label>
                                                <input type="text" class="form-control" id="prod_sku" placeholder="SKU" value="">
                                            </div>
                                            <div class="col-md-12">
                                                <label for="prod_series">SERIES</label>
                                                <input type="text" class="form-control" id="prod_series" placeholder="SERIES">
                                            </div>
                                            <div class="col-md-12">
                                                <label for="finishes">AVAILABLE FINISHES</label>
                                                <select name="prod_finish" id="prod_finish" class="form-select">
                                                    <option value="0">Polished</option>
                                                    <option value="1">Honed</option>
                                                    <option value="2">Matte</option>
                                                    <option value="3">Leather</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="price-range">PRICE RANGE</label>
                                                <input type="tel" class="form-control number-field" id="price-range" placeholder="PRICE RANGE">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                        <h6 for="primary-colors" class="title-card">SIZES</h6>
                                            <div class="col-md-12">
                                                <div class="col-md-12">
                                                    <label for="primary-colors">SLABS</label>
                                                    <input type="text" class="form-control mt-2" id="slab-size1" placeholder="Size" value="2CM">
                                                    <input type="text" class="form-control mt-2" id="slab-size2" placeholder="Size" value="3CM">
                                                    <input type="text" class="form-control mt-2" id="slab-id1" placeholder="ID#">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                        <h6 for="primary-colors" class="title-card">APPLICATIONS</h6>
                                            <div class="col-md-12">
                                                <h6 for="primary-colors">FLOORING</h6>
                                                <div class="col-md-12 d-flex mb-2">
                                                    <div class="col">
                                                        <h5 class="font-size-14">Residential</h5>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="flooring-residential" id="flooring-residential-yes" value="0" checked="">
                                                            <label class="form-check-label" for="flooring-residential-yes">
                                                                Yes
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="flooring-residential" id="flooring-residential-no" value="1">
                                                            <label class="form-check-label" for="flooring-residential-no">
                                                                No
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <h5 class="font-size-14">Commercial</h5>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="flooring-commercial" id="flooring-commercial-yes" value="0" checked="">
                                                            <label class="form-check-label" for="flooring-commercial-yes">
                                                                Yes
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="flooring-commercial" id="flooring-commercial-no" value="1">
                                                            <label class="form-check-label" for="flooring-commercial-no">
                                                                No
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h6 for="primary-colors">COUNTERS</h6>
                                                <div class="col-md-12 d-flex">
                                                    <div class="col">
                                                        <h5 class="font-size-14">Residential</h5>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="counter-residential" id="counter-residential-yes" value="0" checked="">
                                                            <label class="form-check-label" for="counter-residential-yes">
                                                                Yes
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="counter-residential" id="counter-residential-no" value="1">
                                                            <label class="form-check-label" for="counter-residential-no">
                                                                No
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <h5 class="font-size-14">Commercial</h5>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="counter-commercial" id="counter-commercial-yes" value="0" checked="">
                                                            <label class="form-check-label" for="counter-commercial-yes">
                                                                Yes
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="counter-commercial" id="counter-commercial-no" value="1">
                                                            <label class="form-check-label" for="counter-commercial-no">
                                                                No
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <h6 for="primary-colors">WALL</h6>
                                                <div class="col-md-12 d-flex">
                                                    <div class="col">
                                                        <h5 class="font-size-14">Residential</h5>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="wall-residential" id="wall-residential-yes" value="0" checked="">
                                                            <label class="form-check-label" for="wall-residential-yes">
                                                                Yes
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="wall-residential" id="wall-residential-no" value="1">
                                                            <label class="form-check-label" for="wall-residential-no">
                                                                No
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <h5 class="font-size-14">Commercial</h5>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="wall-commercial" id="wall-commercial-yes" value="0" checked="">
                                                            <label class="form-check-label" for="wall-commercial-yes">
                                                                Yes
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="wall-commercial" id="wall-commercial-no" value="1">
                                                            <label class="form-check-label" for="wall-commercial-no">
                                                                No
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <h6 for="primary-colors">Others</h6>
                                                <div class="col-md-12 d-flex">
                                                    <div class="col">
                                                        <h5 class="font-size-14">Exterior Usage</h5>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="exterior" id="exterior-yes" value="0" checked="">
                                                            <label class="form-check-label" for="exterior-yes">
                                                                Yes
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="exterior" id="exterior-no" value="1">
                                                            <label class="form-check-label" for="exterior-no">
                                                                No
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center mt-4">
                                            <button type="button" class="btn btn-primary waves-effect waves-light" onclick="detailSubmit()">Submit</button>
                                        </div>

                                    </form>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        <div class="toast-container position-fixed p-3 top-0 end-0" id="toastPlacement" data-original-class="toast-container position-absolute p-3">
                            <div class="fade show">
                                <div id="borderedToast1" class="toast overflow-hidden mt-3 fade hide" role="alert" aria-live="assertive" aria-atomic="true">
                                    <div class="align-items-center text-white bg-danger border-0 toast-bg">
                                        <div class="d-flex">
                                            <div class="toast-body">
                                                
                                            </div>
                                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
                
                
            </div>
            <!-- end main content-->

        </div>
        <button type="button" class="btn btn-primary d-none" id="borderedToast1Btn">Primary toast</button>
        <!-- END layout-wrapper -->


        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="../assets/libs/jquery/jquery.min.js"></script>
        <script src="../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="../assets/libs/simplebar/simplebar.min.js"></script>
        <script src="../assets/libs/node-waves/waves.min.js"></script>
        <!-- Bootstrap Toasts Js -->
        <script src="../assets/js/pages/bootstrap-toasts.init.js"></script>

        <!-- dropzone js -->
        <!-- <script src="../assets/libs/dropzone/min/dropzone.min.js"></script> -->

        <script src="../assets/js/app.js"></script>

        <script>

$('#file-upload').on('change',function(e){
    handleFiles(e.target.files);
})

var filesArray=[];

$(document).ready(function () {
    var dropArea = $('#drop-area');

    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
      dropArea.on(eventName, function (e) {
        e.preventDefault();
        e.stopPropagation();
      });
    });

    ['dragenter', 'dragover'].forEach(eventName => {
      dropArea.on(eventName, function () {
        dropArea.addClass('highlight');
      });
    });

    ['dragleave', 'drop'].forEach(eventName => {
      dropArea.on(eventName, function () {
        dropArea.removeClass('highlight');
      });
    });

    // Handle dropped files
    dropArea.on('drop', function (e) {
      var files = e.originalEvent.dataTransfer.files;
      handleFiles(files);
    });
  });

  
  function handleFiles(files) {
        var formData=new FormData();
      for (var i = 0; i < files.length; i++) {
        var file = files[i];
        formData.append('images[]',files[i]);
        filesArray.push(files[i].name);
      }


                
    formData.append('formName','uploadImages');                

    $.ajax({

        type:'post',
        data:formData,
        contentType:false,
        processData:false,
        url:'products-ajax.php',
        success:function(data){
            let imageData=JSON.parse(data);
            $('.images-preview').html('');
            console.log(filesArray);
            for(i=0;i<filesArray.length;i++){
                if(filesArray[i]!=null){
                $('.images-preview').append('<div class="col-md-1 preview-div-'+i+'"><a href="javascript:void(0)" class="image-show"><i class="bi bi-x custom-icon" onclick="deleteImage('+i+')"></i><img src="../images/'+filesArray[i]+'" alt=""></a></div>');
                }
            }
        }

    })

    }


  function deleteImage(id){
    filesArray[id]=null; 
    $('.preview-div-'+id).remove();
  }

            $('.needsclick').on('click',function(){
                $('#file-upload').trigger('click');
            })

            const uploadImages=()=>{

                let newArray = filesArray.filter(value => value !== null);
                if(newArray.length==0){

                    $('.toast-bg').addClass('bg-danger'); 
                    $('.toast-body').html('No Images uploaded');
                    $('#borderedToast1Btn').trigger('click');

                }else{

                    $('.details-card').animate({ 'left': '0' }, 100);
                    $('.details-card').show();
                    $('#images-card').hide();

                }

            }

            const detailSubmit = ()=>{

                console.log(filesArray);

                let prodName=$('#product-name').val();
                let primColor= $('#primary-color').val();
                let stoneCat= $('#stone_cat').val();
                let prodOrigin= $('#prod_origin').val();
                let prodSku= $('#prod_sku').val();
                let prodSeries= $('#prod_series').val();
                let prodFinish= $('#prod_finish').val();
                let priceRange= $('#price-range').val();

                let slabSize1=$('#slab-size1').val();
                let slabSize2=$('#slab-size2').val();
                let slabId1=$('#slab-id1').val();

                let flooringResidential=$('input[name="flooring-residential"]:checked').val();
                let flooringCommercial=$('input[name="flooring-commercial"]:checked').val();
                let counterResidential=$('input[name="counter-residential"]:checked').val();
                let counterCommercial=$('input[name="counter-commercial"]:checked').val();
                let wallResidential=$('input[name="wall-residential"]:checked').val();
                let wallCommercial=$('input[name="wall-commercial"]:checked').val();
                let exterior=$('input[name="exterior"]:checked').val();

                if(prodName=='' || primColor=='' || stoneCat=='' || prodOrigin=='' || prodSku=='' || prodSeries=='' || prodFinish=='' || slabSize1=='' || slabId1=='' || slabSize2=='' || priceRange=='' ) {

                    if(prodName==''){
                        $('#product-name').css('border','1px solid red');
                    }else{
                        $('#product-name').css('border','');
                    }

                    if(primColor==''){
                        $('#primary-color').css('border','1px solid red');
                    }else{
                        $('#primary-color').css('border','');
                    }

                    if(stoneCat==''){
                        $('#stone_cat').css('border','1px solid red');
                    }else{
                        $('#stone_cat').css('border','');
                    }

                    if(prodOrigin==''){
                        $('#prod_origin').css('border','1px solid red');
                    }else{
                        $('#prod_origin').css('border','');
                    }

                    if(prodSku==''){
                        $('#prod_sku').css('border','1px solid red');
                    }else{
                        $('#prod_sku').css('border','');
                    }

                    if(prodSeries==''){
                        $('#prod_series').css('border','1px solid red');
                    }else{
                        $('#prod_series').css('border','');
                    }
                    if(prodFinish==''){
                        $('#prod_finish').css('border','1px solid red');
                    }else{
                        $('#prod_finish').css('border','');
                    }

                    if(priceRange==''){
                        $('#price-range').css('border','1px solid red');
                    }else{
                        $('#price-range').css('border','');
                    }

                    if(slabSize1==''){
                        $('#slab-size1').css('border','1px solid red');
                    }else{
                        $('#slab-size1').css('border','');
                    }

                    if(slabId1==''){
                        $('#slab-id1').css('border','1px solid red');
                    }else{
                        $('#slab-id1').css('border','');
                    }

                    if(slabSize2==''){
                        $('#slab-size2').css('border','1px solid red');
                    }else{
                        $('#slab-size2').css('border','');
                    }

                }else{

                    let postData={prodName, primColor , stoneCat , prodOrigin , prodSeries, prodFinish, prodSku, priceRange,slabSize1, slabId1, slabSize2, flooringResidential , flooringCommercial , counterResidential , counterCommercial , wallResidential , wallCommercial , exterior , formName : "productUpload" };

                    var formData=new FormData();
                    for(  i=0;i<filesArray.length;i++  ){
                        if(filesArray[i]!=null){
                            formData.append('images[]',filesArray[i]);  
                        }
                    }
                    $('#images-card').hide();
                                
                    formData.append('postData',JSON.stringify(postData));
                    formData.append('formName','productUpload');                

                    $.ajax({

                        type:'post',
                        data:formData,
                        contentType:false,
                        processData:false,
                        url:'products-ajax.php',
                        success:function(data){
                            
                            if(data==0){
                                $('.toast-bg').removeClass('bg-danger'); 
                                $('.toast-bg').addClass('bg-success'); 
                                $('.toast-body').html('Product added Succefully');
                                $('#borderedToast1Btn').trigger('click');
                                setTimeout(() => {
                                    window.location.href="../products.php"; 
                                }, 1500);
                            }else{
                                alert('Something went Wrong');
                            }

                        }

                    })


                }
 
            }

            $(document).on('focus','input', function(){
                $(this).css('border','');
            })

            $(document).on('input','.number-field',function(e){
                $(this).val($(this).val().replace(/[^0-9]/gi, ''));
            })

        </script>

    </body>
</html>
<?php 
}
?>