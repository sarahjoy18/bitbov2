

    <!DOCTYPE html>
    <!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
    <!--[if !IE]><!-->
    <html lang="en">
    <!--<![endif]-->
    {{--<?php echo
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header('Content-Type: text/html');?>--}}

        <head>
            <meta charset="utf-8" />
            <title> <?php echo $__env->yieldContent('title', 'BPIS'); ?></title>
            <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
            <meta content="" name="description" />
            <meta content="" name="author" />

            <!-- ================== BEGIN BASE CSS STYLE ================== -->
            
            <link href="<?php echo e(asset('assets/plugins/jquery-ui/jquery-ui.min.css')); ?>" rel="stylesheet" />
            <link href="<?php echo e(asset('assets/plugins/bootstrap/4.0.0/css/bootstrap.min.css')); ?>" rel="stylesheet" />
            <link href="<?php echo e(asset('assets/plugins/font-awesome/5.0/css/fontawesome-all.min.css')); ?>" rel="stylesheet" />
            <link href="<?php echo e(asset('assets/plugins/animate/animate.min.css')); ?>" rel="stylesheet" />
            <link href="<?php echo e(asset('assets/css/default/style.min.css')); ?>" rel="stylesheet" />
            <link href="<?php echo e(asset('assets/css/default/style-responsive.min.css')); ?>" rel="stylesheet" />
            <link href="<?php echo e(asset('assets/css/default/theme/default.css')); ?>" rel="stylesheet" id="theme" />
            <link rel='shortcut icon' type='image/x-icon' href="<?php echo e(asset('assets/img/logo/BPIS_Logo_dark.png')); ?>" />
            <!-- ================== END BASE CSS STYLE ================== -->

            <?php $__env->startSection('page-css'); ?>
            <?php echo $__env->yieldSection(); ?>

            <!-- ================== BEGIN BASE JS ================== -->
            <link href="<?php echo e(asset('assets/plugins/jquery-smart-wizard/src/css/smart_wizard.css')); ?>" rel="stylesheet" />
            
            <!-- ================== END BASE JS ================== -->
        </head>
        <body>

            <!--        CHAT START HERE-->
            
            <!--        END OF CHAT-->


            <!-- begin #page-loader -->
            
            <!-- end #page-loader -->

            <!-- begin #page-container -->
            <div id="page-container"  class=" in page-sidebar-fixed page-header-fixed">
                <!-- begin #header -->
                <div id="header" class="header navbar-default">
                    <!-- begin navbar-header -->
                    <div class="navbar-header">
                        <a href="<?php echo e(route('Dashboard')); ?>" class="navbar-brand"> <img src="<?php echo e(asset('assets/img/logo/BPIS_Logo_dark.png')); ?>" width="40" height="40" style="display: inline-block"  /> <b>BITBo</b></a>
                        <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- end navbar-header -->


                </div>
                <!-- end #header -->
            </div>





            <!-- begin #content -->
            <div class="content" id="content">

                <form action="" method="POST" name="form-wizard" id="Municipality_AddForm" class="form-control-with-bg">
                    <?php echo csrf_field(); ?>
                    <!-- begin wizard -->
                    <div id="wizard" style=" margin-left: -200px; " >
                        <!-- begin wizard-step -->
                        <ul>
                            <li class="col-md-3 col-sm-4 col-6">
                                <a href="#step-1">
                                    <span class="number">1</span>
                                    <span class="info text-ellipsis">
                                        Server Information
                                        <small class="text-ellipsis">Enter your host name,port,server username,server password</small>
                                    </span>
                                </a>
                            </li>
                            <li class="col-md-3 col-sm-4 col-6">
                                <a href="#step-2">
                                    <span class="number">2</span>
                                    <span class="info text-ellipsis">
                                        Enter Barangay Details
                                        <small class="text-ellipsis">Enter your province name, municipal name, barangay name, barangay logo, municipal logo,Land Area</small>
                                    </span>
                                </a>
                            </li>


                            <li class="col-md-3 col-sm-4 col-6">
                                <a href="#step-3">
                                    <span class="number">3</span>
                                    <span class="info text-ellipsis">
                                        Create User Account
                                        <small class="text-ellipsis">Complete Registration</small>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <!-- end wizard-step -->

                        <!-- begin wizard-content -->
                        <div>
                            <!-- begin step-1 -->
                            <div id="step-1">
                                <!-- begin fieldset -->
                                <fieldset>
                                    <!-- begin row -->
                                    <div class="row">
                                        <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">Server Information</legend>
                                        <div class="col-md-6">
                                            <!-- begin form-group -->
                                            <div class="form-group row m-b-10">
                                                <label class="col-md-3 col-form-label text-md-right">Host Name<span class="text-danger">*</span></label>
                                                <div class="col-md-6">
                                                    <input type="text" 
                                                    id="host_name_txt"
                                                    name="host_name_txt" placeholder="host name"   
                                                    data-parsley-group="step-1" data-parsley-required="false" class="form-control"


                                                    />
                                                </div>
                                            </div>
                                            <!-- end form-group -->

                                            <!-- begin form-group -->
                                            <div class="form-group row m-b-10">
                                                <label class="col-md-3 col-form-label text-md-right">Port<span class="text-danger">*</span></label>
                                                <div class="col-md-6">
                                                    <input type="text" 
                                                    id="port_txt"
                                                    name="port_txt" placeholder="port"

                                                    data-parsley-group="step-1" data-parsley-required="false" class="form-control"


                                                    />
                                                </div>
                                            </div>

                                            <div class="form-group row m-b-10">
                                                <label class="col-md-3 col-form-label text-md-right">Server Username<span class="text-danger">*</span></label>
                                                <div class="col-md-6">
                                                    <input type="text" 
                                                    id="server_username_txt"
                                                    name="server_username_txt" placeholder="username"

                                                    data-parsley-group="step-1" data-parsley-required="false" class="form-control"


                                                    />
                                                </div>
                                            </div>


                                            <div class="form-group row m-b-10">
                                                <label class="col-md-3 col-form-label text-md-right">Server Password<span class="text-danger">*</span></label>
                                                <div class="col-md-6">
                                                    <input type="text" 
                                                    id="server_password_txt"
                                                    name="server_password_txt" placeholder="password"

                                                    data-parsley-group="step-1"  class="form-control"


                                                    />
                                                </div>
                                            </div>


                                            <div class="form-group row m-b-10">
                                                <label class="col-md-3 col-form-label text-md-right">&nbsp;</label>
                                                <div class="col-md-1">
                                                    <br>
                                                    <button class="btn btn-success test_btn"> Test Connection</button>


                                                </div>
                                                
                                            </div>

                                            <!-- end form-group -->

                                            <!-- begin form-group -->
                                        <!-- <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Username <span class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <input type="text" id="municipality_name_txt"
                                                name="municipality_name_txt" placeholder="E.G.:San Jose Del Monte" 

                                                data-parsley-group="step-1" data-parsley-required="false" class="form-control" 
                                                

                                                />
                                            </div>
                                        </div> -->
                                        <!-- end form-group -->
                                        
                                        <!-- begin form-group -->
                                        <!-- <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Password <span class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <input type="password" name="municipal_seal_txt" placeholder="Smith" data-parsley-group="step-1" data-parsley-required="false" class="form-control" />
                                            </div>
                                        </div> -->
                                        <!-- end form-group -->
                                        


                                        
                                        
                                        
                                        
                                        

                                        
                                        
                                        
                                    </div>


                                </div>
                                <!-- end row -->
                            </fieldset>
                            <!-- end fieldset -->
                        </div>
                        <!-- end step-1 -->

                        <!-- begin step-2 -->
                        <div id="step-2">
                            <!-- begin fieldset -->
                            <fieldset>
                                <!-- begin row -->
                                <div class="row">
                                    <!-- begin col-8 -->
                                    <div class="col-md-8 offset-md-2">
                                        <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">enter your barangay information</legend>
                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Province Name <span class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <input type="text" name="province_name_txt" id="province_name_txt" placeholder="province name" class="form-control" data-parsley-group="step-2" data-parsley-required="false"   />
                                            </div>
                                        </div>
                                        <!-- end form-group -->
                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Municipality Name <span class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <input type="text" name="municipality_name_txt" id="municipality_name_txt" placeholder="municipal name" class="form-control" data-parsley-group="step-2" data-parsley-required="false"   />
                                            </div>
                                        </div>
                                        <!-- end form-group -->
                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Municipal Logo <span class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <input type="file"
                                                id="municipal_seal_txt"
                                                name="municipal_seal_txt" placeholder="Your municipal seal" class="form-control" data-parsley-group="step-2" data-parsley-required="false" 

                                                />
                                            </div>
                                        </div>
                                        <!-- end form-group -->
                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Barangay Name <span class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <input type="text" name="barangay_name_txt" id="barangay_name_txt" placeholder="cuyab" class="form-control" data-parsley-group="step-2" data-parsley-required="false"  />
                                            </div>
                                        </div>
                                        <!-- end form-group -->
                                        
                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Barangay Logo <span class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <input type="file"
                                                id="barangay_seal_txt"
                                                name="barangay_seal_txt" placeholder="Your barangay seal" class="form-control" data-parsley-group="step-2" data-parsley-required="false" 

                                                />
                                            </div>
                                        </div>
                                        <!-- end form-group -->

                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Land Area Size <span class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <input type="text" 
                                                id="land_area_txt"
                                                name="land_area_txt" placeholder="0.00"  
                                                class="form-control" 
                                                data-parsley-group="step-2" data-parsley-required="false" 


                                                />
                                            </div>
                                        </div>
                                        <!-- end form-group -->

                                        
                                        


                                    </div>
                                    <!-- end col-8 -->
                                </div>
                                <!-- end row -->
                            </fieldset>
                            <!-- end fieldset -->
                        </div>
                        <!-- end step-3 -->
                        <!-- begin step-4 -->
                        <div id="step-3">
                            <!-- begin fieldset -->
                            <fieldset>
                                <!-- begin row -->
                                <div class="row">
                                    <!-- begin col-8 -->
                                    <div class="col-md-8 offset-md-2">
                                        <legend class="no-border f-w-700 p-b-0 m-t-0 m-b-20 f-s-16 text-inverse">Select your login username and password</legend>
                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Username <span class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <input type="text" name="account_username_txt" placeholder="johnsmithy" class="form-control" data-parsley-group="step-2" data-parsley-required="false"  data-parsley-type="alphanum" />
                                            </div>
                                        </div>
                                        <!-- end form-group -->
                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Pasword <span class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <input type="password"
                                                id="account_password_txt"
                                                name="account_password_txt" placeholder="Your password" class="form-control" data-parsley-group="step-2" data-parsley-required="false" 

                                                data-parsley-equalto="#confirm_password_txt" />
                                            </div>
                                        </div>
                                        <!-- end form-group -->

                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Confirm Pasword <span class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <input type="password" 
                                                id="confirm_password_txt"
                                                name="confirm_password_txt" placeholder="Confirmed password"  
                                                class="form-control" 
                                                data-parsley-group="step-2" data-parsley-required="false" 


                                                data-parsley-equalto="#account_password_txt" />
                                            </div>
                                        </div>
                                        <!-- end form-group -->

                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Email <span class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <input type="email" name="email_txt" placeholder="Your email" class="form-control" data-parsley-group="step-2" data-parsley-required="false" />
                                            </div>
                                        </div>
                                        <!-- end form-group -->
                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Secret Question <span class="text-danger">*</span></label>
                                            <div class="col-md-9">
                                                <select name="secret_question_txt" placeholder="Your secret question" class="form-control m-b-10" data-parsley-required="false" list="secret_question_list"  data-parsley-group="step-2"/>                                                
                                                
                                                  <option>What is your mother's maiden name?</option>

                                            </select>
                                          </div>
                                      </div>
                                      <!-- end form-group -->

                                      <!-- begin form-group -->
                                      <div class="form-group row m-b-10">
                                        <label class="col-md-3 col-form-label text-md-right">Secret Answer <span class="text-danger">*</span></label>
                                        <div class="col-md-9">
                                            <input type="text" name="secret_answer_txt" placeholder="Answer to your secret question"  data-parsley-group="step-2" class="form-control m-b-10" data-parsley-required="false" />
                                            
                                        </div>
                                    </div>
                                    <!-- end form-group -->
                                    <div class="form-group row m-b-10">
                                        <p><a href="javascript:;"  id="register_btn" style="margin-left:800px" class="btn btn-primary btn-lg">Register</a> </p>
                                        <div class="fa-3x" style="display: none; position:absolute; margin-left:920px;" id="spnner">
                                            <i class="fas fa-circle-notch fa-spin" style="position:absolute; top:7px;"></i>
                                        </div>
                                    </div>

                                </div>

                                
                                <!-- end col-8 -->
                            </div>
                            <!-- end row -->
                        </fieldset>
                        <!-- end fieldset -->
                    </div>
                    <!-- end step-4 -->
                </div>
                <!-- end wizard-content -->
            </div>
            <!-- end wizard -->

        </form>

    </div>



    <!-- end #content -->



    <!-- begin #footer -->
    <div id="footer" class="footer">
        &copy; <script> document.write(new Date().getFullYear())
    </script> <a href="http://euc.ph/barangay-it/"> <b>Barangay IT</b></a> <i>Bringing Change to Local Government</i>
    <div class="pull-right">
        by <a href="http://euc.ph/"><b>GFMIC</b></a> & <a href="http://srg.pupqc.net/"><b>SRG</b></a>
    </div>

</div>
<!-- end #footer -->


<!-- ================== BEGIN BASE JS ================== -->
<script src="<?php echo e(asset('assets/plugins/jquery/jquery-3.2.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js')); ?>"></script>





<script src="<?php echo e(asset('assets/plugins/slimscroll/jquery.slimscroll.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/js-cookie/js.cookie.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/theme/default.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/apps.min.js')); ?>"></script>
<!-- ================== END BASE JS ================== -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="<?php echo e(asset('assets/plugins/parsley/dist/parsley.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/jquery-smart-wizard/src/js/jquery.smartWizard.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/demo/form-wizards-validation.demo.min.js')); ?>"></script>
<!-- ================== END PAGE LEVEL JS ================== -->



<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="<?php echo e(asset('assets/plugins/DataTables/media/js/jquery.dataTables.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/demo/table-manage-default.demo.min.js')); ?>"></script>

<script src="<?php echo e(asset('assets/plugins/gritter/js/jquery.gritter.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/bootstrap-sweetalert/sweetalert.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/demo/ui-modal-notification.demo.min.js')); ?>"></script>
<!-- ================== BEGIN PAGE LEVEL JS ================== -->


<script>
    $(document).ready(function() {
        App.init();
        
        FormWizardValidation.init();

        
        $(".sw-btn-next").attr('disabled','disabled');


        $(".test_btn").click(function(e){
            e.preventDefault();
            
            $.ajax({
                url:"<?php echo e(route('TestConnection')); ?>",
                type:'post',                         
                data:{'host_name_txt':$("input[name='host_name_txt']").val() 
                ,'port_txt':$("input[name='port_txt']").val()
                ,'server_username_txt':$("input[name='server_username_txt']").val()
                ,'server_password_txt':$("input[name='server_password_txt']").val()
                ,'_token':'<?php echo e(csrf_token()); ?>'},

                success:function(data)
                {       
                    
                    swal("Testing Connection Successfully","","success");
                    $(".sw-btn-next").prop('disabled',false);
                    $(".sw-btn-next").click();


                },
                error: function(){
                    swal("Invalid Connection","","error");
                }                    


            });
        })



        


        $("#register_btn").click(function(e){
            $('#register_btn').attr('disabled','disabled');
            e.preventDefault();

            adddatabase();

        });

        async function adddatabase() {
            await loaddatabase();

        }

        function loaddatabase() {
            return new Promise((resolve,reject) => {
                setTimeout(() => {
                   $('#spnner').show();
                   $.ajax({
                    url:"<?php echo e(route('Connect_DB')); ?>",
                    type:'post',     
                    async:false,                    
                    data:{'host_name_txt':$("input[name='host_name_txt']").val() 
                    ,'port_txt':$("input[name='port_txt']").val()
                    ,'server_username_txt':$("input[name='server_username_txt']").val()
                    ,'server_password_txt':$("input[name='server_password_txt']").val()
                    ,'_token':'<?php echo e(csrf_token()); ?>'},
                    
                    success:function(data)
                    {   

                        var df = new FormData();

                        df.append('account_username_txt',$("input[name='account_username_txt']").val());
                        df.append('account_password_txt',$("input[name='account_password_txt']").val());
                        df.append('email_txt',$("input[name='email_txt']").val());
                        df.append('secret_question_txt',$("select[name='secret_question_txt']").val());
                        df.append('secret_answer_txt',$("input[name='secret_answer_txt']").val());

                        df.append('municipal_name_txt',$("input[name='municipality_name_txt']").val());
                        df.append('province_name_txt',$("input[name='province_name_txt']").val());
                        df.append('barangay_name_txt',$("input[name='barangay_name_txt']").val());
                        df.append('barangay_seal_txt',$("input[name='barangay_seal_txt']")[0].files[0]);
                        df.append('municipal_seal_txt',$("input[name='municipal_seal_txt']")[0].files[0]);
                        df.append('land_area_txt',$("input[name='land_area_txt']").val());
                        df.append('_token',"<?php echo e(csrf_token()); ?>");



                        $.ajax({
                            url:"<?php echo e(route('Add_Barangay_Account')); ?>",
                            type:'post',                           
                            processData:false,
                            contentType:false,                                     
                            data:df,       
                            success:function(data)
                            {   hidespinner();
                                swal("Successfully Installed","","success").then(function(){
                                    window.location.href = 'Home';
                                });
                            },
                            error: function(){

                                swal("Installation Failed","","error");
                            }
                        });
                    },

                });
               });
            });

        }

        function hidespinner() {
           $('#spnner').hide();
       }

   });


</script>
</body>
</html>




<?php /**PATH C:\xamppv7.2\htdocs\bitbo_installer\www\resources\views/installation/installationv2.blade.php ENDPATH**/ ?>