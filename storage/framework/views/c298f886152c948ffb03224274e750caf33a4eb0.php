 <!-- CHECK IF USER LOGIN -->
<?php if(session('session_position') == ''): ?>
<script type="text/javascript">location.href='<?php echo e(route("Login")); ?>'</script>
<?php endif; ?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<?php echo
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header('Content-Type: text/html');?>

<head>
    <meta charset="utf-8" />
    <title> <?php echo $__env->yieldContent('title', 'BitBo'); ?></title>
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
    <link rel='shortcut icon' type='image/x-icon' href="<?php echo e(asset('assets/img/logo/BitBo_Logo_Only.png')); ?>" />
    <!-- ================== END BASE CSS STYLE ================== -->

    <?php $__env->startSection('page-css'); ?>
    <?php echo $__env->yieldSection(); ?>

    <!-- ================== BEGIN BASE JS ================== -->
    
    <!-- ================== END BASE JS ================== -->
</head>
<body oncontextmenu="return false;"  onkeyup="DisableInspectElement(event)">

    <!--        CHAT START HERE-->
    
    <!--        END OF CHAT-->


    <!-- begin #page-loader -->
    
    <!-- end #page-loader -->

    <!-- begin #page-container -->
    <div id="page-container"  class="fade in page-sidebar-fixed page-header-fixed">
        <!-- begin #header -->
        <div id="header" class="header navbar-default">
            <!-- begin navbar-header -->
            <div class="navbar-header">
                <a href="<?php echo e(route('Dashboard')); ?>" class="navbar-brand"> <img src="<?php echo e(asset('assets/img/logo/BitBo_Logo_Only.png')); ?>" width="40" height="40" style="display: inline-block"  /> <b>BitBo</b></a>
                <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- end navbar-header -->

            <!-- begin header-nav -->
            <ul class="navbar-nav navbar-right">
                
                    
                        
                            
                            
                        
                    `
                

                <li class="dropdown navbar-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo e(asset('assets/img/logo/BitBo_User_Logo.jpg')); ?>" alt="" />
                        <span class="d-none d-md-inline">

                            <?php echo e(session('session_position') == 'Admin' ? 'Barangay Admin' : session('session_position')); ?>




                        </span> <b class="caret"></b>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="javascript:;" class="dropdown-item"  data-toggle='modal' data-target='#AccountModal'>Edit Account</a>
                        <a href="javascript:;" class="dropdown-item"  data-toggle='modal' data-target='#ChangePassModal'>Change Password</a>
                        <div class="dropdown-divider"></div>
                        <a href="<?php echo e(route('SignOut')); ?>" class="dropdown-item">Log Out</a>
                    </div>
                </li>
            </ul>
            <!-- end header navigation right -->
        </div>
        <!-- end #header -->

        <!-- #modal-EDIT ACCOUNT START -->
        <div class="modal fade" id="AccountModal">
            <div class="modal-dialog" style="max-width: 30%">
                <form id="AccountForm" method="POST" >
                    <?php echo csrf_field(); ?>

                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #008a8a">
                            <h4 class="modal-title" style="color: white">Your Account</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white">×</button>
                        </div>
                        <div class="modal-body">
                            

                            <?php if(session('session_position') == 'Admin'): ?>

                            <?php else: ?>

                            <div class="col-lg-12">
                                <div class="form-group">
                                   <h3>   <label>Name</label> </h3>
                                   <!-- Edited by SJ 06162020 - Changed to session('session_full_name') -->
                                   <h1><small><?php echo e(session('session_full_name')); ?></small></h1>
                               </div>
                           </div>
                           <?php endif; ?>


                           <div class="col-lg-12">
                            <div class="form-group">
                               <h3>   <label>Position</label> </h3>
                               <h1><small> <?php echo e(session('session_position')); ?></small></h1>
                           </div>
                       </div>


                       <?php if(session('session_position')=='Admin'): ?>
                       <div class="col-lg-12">
                        <div class="form-group">
                           <h3>   <label>Municipality</label> </h3>
                           <h1><small><?php echo e(session('session_municipal_name')); ?></small></h1>
                       </div>
                   </div>


                   <div class="col-lg-12">
                    <div class="form-group">
                       <h3>   <label>Province </label> </h3>
                       <h1><small><?php echo e(session('session_province_name')); ?></small></h1>
                   </div>
               </div>
               <?php else: ?>

               <div class="col-lg-12">
                <div class="form-group">
                   <h3>   <label>Barangay</label> </h3>
                   <h1><small><?php echo e(session('session_barangay_name')); ?></small></h1>
               </div>
           </div>

           <?php endif; ?>



           <div class="col-lg-12">
            <div class="form-group">
                <h3>   <label>Email</label>  <span id='ReqEmail'></span> </h3>
                <input type="email" name="EmailMainTxt" id="EmailMainTxt" placeholder="e.g:example@gmail.com" class="form-control" data-parsley-group="step-2" data-parsley-required="true"   value="<?php echo e(session('session_email')); ?>" />
            </div>
        </div>



        
    </div>
    <div class="modal-footer">
        <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>

        <a id="UpdateBtn"  class="btn btn-success" style="color:white;">Update</a>
    </div>
</div>
</form>
</div>
</div>
<!-- #modal-EDIT ACCOUNT  END-->








<button class="btn cp-default-password-modal-btn hide" data-target="#cp-default-password-modal" data-toggle="modal"></button>
<!-- #modal-CHANGE DEFAULT PASSWORD START-->
<div class="modal fade" id="cp-default-password-modal" data-backdrop='static'>
            <div class="modal-dialog" style="max-width: 30%">
                <form id="AccountForm" method="POST" >
                    <?php echo csrf_field(); ?>

                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #008a8a">
                            <h4 class="modal-title" style="color: white">Change Default Password</h4>
                            
                        </div>
                        <div class="modal-body">
                            
                
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <h3>   <label>New Password</label>  <span id='ReqOldPassTxt'></span> </h3>
                                        <input type="password"
                                        id="new-password-txt"
                                        name="new_password_txt" placeholder="Your new password" class="form-control" data-parsley-group="step-2" data-parsley-required="true"

                                        data-parsley-equalto="#new-password-txt" />
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <h3>   <label>Re-type password</label>  <span id='ReqNewPassTxt'></span> </h3>
                                        <input type="password"
                                        id="re-type-password-txt"
                                        name="re_type_password_txt" placeholder="Re-type your password" class="form-control" data-parsley-group="step-2" data-parsley-required="true"

                                        data-parsley-equalto="#new-password-txt" />
                                    </div>
                                </div>
                            
                        </div>
                        <div class="modal-footer">
                            
        
                            <button id="change-default-password-btn"  class="btn btn-success" style="color:white;">Save Changes</button>
                        </div>
                    </div>
                    </form>
                    </div>
                    </div>
<!-- #modal-CHANGE DEFAULT PASSWORD END-->




<!-- #modal-ÇHANGE PASSWORD -->
<div class="modal fade" id="ChangePassModal">
    <div class="modal-dialog" style="max-width: 30%">
        <form id="ChangePassForm" method="POST" >
            <?php echo csrf_field(); ?>

            <div class="modal-content">
                <div class="modal-header"  style="background-color: #f59c1a">
                    <h4 class="modal-title" style="color: white">Change Password</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white">×</button>
                </div>
                <div class="modal-body">
                    
                    <label class="form-label hide">Barangay ID</label>


                    <div class="col-lg-12">
                        <div class="form-group">
                            <h3>   <label>Old password</label>  <span id='ReqOldPassTxt'></span> </h3>
                            <input type="password"
                            id="OldPasswordTxt"
                            name="OldPasswordTxt" placeholder="Your old password" class="form-control" data-parsley-group="step-2" data-parsley-required="true"

                            data-parsley-equalto="#OldPasswordTxt" />
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <h3>   <label>New password</label>  <span id='ReqNewPassTxt'></span> </h3>
                            <input type="password"
                            id="NewPasswordTxt"
                            name="NewPasswordTxt" placeholder="Your new password" class="form-control" data-parsley-group="step-2" data-parsley-required="true"

                            data-parsley-equalto="#NewPasswordTxt" />
                        </div>
                    </div>


                    
                </div>
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>

                    <a id="ChangePassBtn"  class="btn btn-warning" style="color:white;" >Change Password</a>
                </div>
            </div>
        </form>
    </div>
</div>


<div id="sidebar" class="sidebar sidebar-transparent gradient-enabled" >
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar user -->
        <ul class="nav">
            

            <li class="nav-profile <?php if(Route::currentRouteName() == 'BusinessCategory'): ?> { echo 'active'; } <?php endif; ?>      ">
                <a href="javascript:;" data-toggle="nav-profile">
                    <div class="cover with-shadow"></div>
                    <div class="image">
                        <img src="<?php echo e(asset('assets/img/logo/BitBo_User_Logo.jpg')); ?>" alt="" />
                    </div>
                    <div class="info">
                        <b class="caret pull-right"></b>
                        <?php echo e(session('session_position')); ?>

                        <small> 
                            Barangay <?php echo e(session('session_barangay_name')); ?>

                        </small>

                    </div>
                </a>
            </li>
            <li >
                <ul class="nav nav-profile <?php echo e(Route::currentRouteName() == 'BusinessCategory' || 'IssuanceCategory' || 'OrdinanceCategory' || 'BlotterSubjects' ? 'active' : ''); ?>">
                    <li class="has-sub <?php echo e(Route::currentRouteName() == 'BusinessCategory' || 'IssuanceCategory' || 'OrdinanceCategory' || 'BlotterSubjects' ? 'expand' : ''); ?>   <?php echo e(session('session_position') == 'Data Protection Officer' || session('session_position') == 'Admin' ? '' : 'hide'); ?> ">
                        <a href="#">
                            <b class="caret"></b>
                            <i class="fa fa-cog"></i>
                            <span>Administration</span>
                        </a>
                        <ul class="sub-menu" style="display: <?php echo e(Route::currentRouteName() == 'BusinessCategory' || 'IssuanceCategory' || 'OrdinanceCategory' || 'BlotterSubjects' ? 'block' : 'none'); ?>;">
                            <li class="<?php echo e(Route::currentRouteName() == 'UserAccounts' ? 'active' : ''); ?> <?php echo e(session('session_position') == 'Data Protection Officer' || session('session_position') == 'Admin' ? '' : 'hide'); ?> "><a href="<?php echo e(route('UserAccounts')); ?> ">

                            User Accounts </a></li>

                            <li class="<?php echo e(Route::currentRouteName() == 'Migration' ? 'active' : ''); ?> "><a href="<?php echo e(route('Migration')); ?>">Migrate Data</a></li>

                            <li class="has-sub <?php echo e(Route::currentRouteName() == 'BusinessCategory' || 'IssuanceCategory' || 'OrdinanceCategory' || 'BlotterSubjects' ? 'active' : ''); ?>  <?php echo e(session('session_position') == 'Admin' ? '' : 'hide'); ?> ">
                                <a href="javascript:;">
                                    <b class="caret"></b>
                                    Site Configuration
                                </a>
                                <ul class="sub-menu">
                                    <li class="<?php echo e(Route::currentRouteName() == 'BarangaySetup' ? 'active' : ''); ?>"><a href="<?php echo e(route('BarangaySetup')); ?>">Barangay Setup</a></li>
                                    <li class="has-sub <?php echo e(Route::currentRouteName() == 'BusinessCategory' || 'IssuanceCategory' || 'OrdinanceCategory' || 'BlotterSubjects' ? 'active' : ''); ?>">
                                        <a href="javascript:;">
                                            <b class="caret"></b>
                                            Category Setup
                                        </a>
                                        <ul class="sub-menu">
                                            <li class="<?php echo e(Route::currentRouteName() == 'BusinessCategory' ? 'active' : ''); ?>"><a href="<?php echo e(route('BusinessCategory')); ?>">Business Category</a></li>
                                            <li class="<?php echo e(Route::currentRouteName() == 'OrdinanceCategory' ? 'active' : ''); ?>"><a href="<?php echo e(route('OrdinanceCategory')); ?>">Ordinance Category</a></li>
                                            <!--<li class="<?php echo e(Route::currentRouteName() == 'IssuanceCategory' ? 'active' : ''); ?>"><a href="<?php echo e(route('IssuanceCategory')); ?>">Issuance Category</a> </li>-->
                                            <li class="<?php echo e(Route::currentRouteName() == 'BlotterSubjects' ? 'active' : ''); ?>"><a href="<?php echo e(route('BlotterSubjects')); ?>">Blotter Subjects</a></li>
                                            <li class="<?php echo e(Route::currentRouteName() == 'Position' ? 'active' : ''); ?>"><a href="<?php echo e(route('Position')); ?>">Position</a></li>

                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
</li>
</ul>
<!-- end sidebar user -->

<!-- begin sidebar nav -->
<ul class="nav" >
    <li class="nav-header">Navigation </li>

    <li class="<?php echo e(Route::currentRouteName() == 'Dashboard' ? 'active' : ''); ?>"><a href="<?php echo e(route('Dashboard')); ?>"><i class="fa fa-th-large"></i>
        <span>Dashboard</span></a>
    </li>

    <li class="has-sub <?php echo e(Route::currentRouteName() == 'Resident'         ||
    Route::currentRouteName() == 'HouseholdProfile' || 
    Route::currentRouteName() == 'MothersProfile'   ||
    Route::currentRouteName() == 'FathersProfile'   ||
    Route::currentRouteName() == 'ChildrensProfile' 
    ? 'active' : ''); ?> <?php echo e(session('session_permis_resident_basic_info') == 1 ? '' : 'hide'); ?> ">
    <a href="#">
        <b class="caret"></b>
        <i class="fas fa-users"></i>
        <span>Residents</span>
    </a>
    <ul class="sub-menu">

        <li class="<?php echo e(Route::currentRouteName() == 'Resident' ? 'active' : ''); ?>"><a href="<?php echo e(route('Resident')); ?>">Residents' Information</a></li>

        <li class="has-sub <?php echo e(session('session_permis_family_profile') == 1 ? '' : 'hide'); ?> active">
            <a href="javascript:;">
                <b class="caret"></b>
                Family Profile <span class="label label-theme m-l-5">NEW</span>
            </a>    
            <ul class="sub-menu">
                <li class="<?php echo e(Route::currentRouteName() == 'HouseholdProfile' ? 'active' : ''); ?>"><a href="<?php echo e(route('HouseholdProfile')); ?>">Households' Profile </a></li>
                <li class="<?php echo e(Route::currentRouteName() == 'MothersProfile'   ? 'active' : ''); ?>"><a href="<?php echo e(route('MothersProfile')); ?>">Mothers' Profile </a></li>
                <li class="<?php echo e(Route::currentRouteName() == 'FathersProfile'   ? 'active' : ''); ?>"><a href="<?php echo e(route('FathersProfile')); ?>">Fathers' Profile </a></li>
                <li class="<?php echo e(Route::currentRouteName() == 'ChildrensProfile' ? 'active' : ''); ?>"><a href="<?php echo e(route('ChildrensProfile')); ?>">Children's Profile </a></li>
            </ul>
        </li>

        
    </ul>
</li>

<li class="has-sub <?php echo e(session('session_permis_barangay_officials') == 1 ? '' : 'hide'); ?>">
    
    <ul class="sub-menu">
        <li><a href="#">Position Reference</a></li>
        <li><a href="#">Barangay Officials</a></li>
    </ul>
</li>




<li class="<?php echo e(session('session_permis_ordinances') == 1 ? '' : 'hide'); ?> <?php echo e(Route::currentRouteName() == 'Ordinance' ? 'active' : ''); ?> "><a href="<?php echo e(route('Ordinance')); ?>">
    <i class="fa fa-file-alt"></i>
    <span>Ordinances</span></a>
</li>

<li class="has-sub  <?php echo e(Route::currentRouteName() == 'Blotter' || Route::currentRouteName() == 'PendingPatawag' ? 'active' : ''); ?>  <?php echo e(session('session_permis_blotter') == 1 && session('session_permis_patawag') == 1 ? '' : 'hide'); ?> ">
    <a href="javascript:;">
        <b class="caret"></b>
        <i class="fas fa-gavel"></i>
        <span>Cases</span>
    </a>
    <ul class="sub-menu">
        <li class="<?php echo e(Route::currentRouteName() == 'Blotter' ? 'active' : ''); ?>" ><a href="<?php echo e(route('Blotter')); ?>">Blotter</a></li>
        <li class="<?php echo e(Route::currentRouteName() == 'PendingPatawag' ? 'active' : ''); ?>" ><a href="<?php echo e(route('PendingPatawag')); ?>">Patawag</a></li>
    </ul>
</li>



 <li class="has-sub <?php echo e(Route::currentRouteName() == 'BusinessApplication' || Route::currentRouteName() == 'BusinessEvaluation'  ? 'active' : ''); ?> ">
        <a href="javascript:;">
            <b class="caret"></b>
            <i class="fas fa-file-alt"></i>
            <span>Business</span>
        </a>
        <ul class="sub-menu">
            <li class="<?php echo e(session('session_permis_businesses') == 1 ? '' : 'hide'); ?> <?php echo e(Route::currentRouteName() == 'BusinessApplication' ? 'active' : ''); ?>"> <a href="<?php echo e(route('BusinessApplication')); ?>">Registration</a></li>
            <li class="<?php echo e(session('session_permis_business_approval') == 1 ? '' : 'hide'); ?> <?php echo e(Route::currentRouteName() == 'BusinessEvaluation' ? 'active' : ''); ?>"><a href="<?php echo e(route('BusinessEvaluation')); ?>">Evaluation</a></li>
        </ul>
    </li>

 <li class="has-sub <?php echo e(session('session_permis_barangay_application_form') == 1 ? '' : 'hide'); ?>

                    <?php echo e(Route::currentRouteName() == 'RequestPermit' ||
                        Route::currentRouteName() == 'RequestCertification' ||
                        Route::currentRouteName() == 'RequestClearance' ||
                        Route::currentRouteName() == 'PCCEvaluation' ||
                        Route::currentRouteName() == 'Issuance'
                    ? 'active' : ''); ?> 
                    

 ">
        <a href="javascript:;">
            <b class="caret"></b>
            <i class="fas fa-file-alt"></i>
            <span>Permit / Certification / Clearance</span>
        </a>
        <ul class="sub-menu">
            <li class="has-sub <?php echo e(Route::currentRouteName() == 'RequestPermit' ||
                                    Route::currentRouteName() == 'RequestCertification' ||
                                    Route::currentRouteName() == 'RequestClearance'
                                    ? 'active' : ''); ?>">
                <a href="javascript:;">
                    <b class="caret"></b>
                    Application
                </a>
                <ul class="sub-menu ">
                    <li class="<?php echo e(Route::currentRouteName() == 'RequestPermit' ? 'active' : ''); ?>"><a href="<?php echo e(route('RequestPermit')); ?>">Permit</a></li>
                    <li class="<?php echo e(Route::currentRouteName() == 'RequestCertification' ? 'active' : ''); ?>"><a href="<?php echo e(route('RequestCertification')); ?>">Certification</a></li>
                    <li class="<?php echo e(Route::currentRouteName() == 'RequestClearance' ? 'active' : ''); ?>"><a href="<?php echo e(route('RequestClearance')); ?>">Clearance</a></li>
                </ul>
            </li>            
        <li class="<?php echo e(session('session_permis_barangay_application_evaluation') == 1 ? '' : 'hide'); ?> <?php echo e(Route::currentRouteName() == 'PCCEvaluation' ? 'active' : ''); ?>"><a href="<?php echo e(route('PCCEvaluation')); ?>">Evaluation</a></li>
        <li  class="<?php echo e(Route::currentRouteName() == 'Issuance' ? 'active' : ''); ?>" ><a href="<?php echo e(route('Issuance')); ?>">Issuance </a></li>
        </ul>
    </li>
    
<li class="has-sub <?php echo e(Route::currentRouteName() == 'HealthServices'                     ||
Route::currentRouteName() == 'NewBorn'                            ||
Route::currentRouteName() == 'DisplayResidentInfant'              ||
Route::currentRouteName() == 'DisplayResidentChild'               ||
Route::currentRouteName() == 'DisplayResidentPregnant'            ||
Route::currentRouteName() == 'DisplayResidentPostpartum'          ||

Route::currentRouteName() == 'DisplayResidentFamilyPlanning'      ||
Route::currentRouteName() == 'DisplayResidentFPuserVisitation'    ||

Route::currentRouteName() == 'DisplayResidentChronicCough'        ||
Route::currentRouteName() == 'DisplayResidentChronicDiseases'     ||

Route::currentRouteName() == 'DisplayResidentPWD'                 ||
Route::currentRouteName() == 'DisplayResidentAdolescent'          ||
Route::currentRouteName() == 'DisplayResidentElderly'             


? 'active' : ''); ?> <?php echo e(session('session_permis_health_services') == 1 ? '' : 'hide'); ?>">

<a href="javascript:;">
    <b class="caret"></b>
    <i class="fas fa-medkit"></i>
    <span>Health Services </span>
</a>
<ul class="sub-menu">
    <li class="<?php echo e(Route::currentRouteName() == 'NewBorn'                   ? 'active' : ''); ?>"><a href="<?php echo e(route('NewBorn')); ?>">Newborn</a></li>
    <li class="<?php echo e(Route::currentRouteName() == 'DisplayResidentInfant'     ? 'active' : ''); ?>"><a href="<?php echo e(route('DisplayResidentInfant')); ?>">Infant</a></li>
    <li class="<?php echo e(Route::currentRouteName() == 'DisplayResidentChild'      ? 'active' : ''); ?>"><a href="<?php echo e(route('DisplayResidentChild')); ?>">Child</a></li>
    <li class="<?php echo e(Route::currentRouteName() == 'DisplayResidentPregnant'   ? 'active' : ''); ?>"><a href="<?php echo e(route('DisplayResidentPregnant')); ?>">Pregnant</a></li>
    <li class="<?php echo e(Route::currentRouteName() == 'DisplayResidentPostpartum' ? 'active' : ''); ?>"><a href="<?php echo e(route('DisplayResidentPostpartum')); ?>">Post-Partum</a></li>
    <li class="has-sub active">
        <a href="javascript:;">
            <b class="caret "></b>
            Family Planning
        </a>
        <ul class="sub-menu">
            <li class="<?php echo e(Route::currentRouteName() == 'DisplayResidentFamilyPlanning'   ? 'active' : ''); ?>"><a href="<?php echo e(route('DisplayResidentFamilyPlanning')); ?>">Family Planning User/NonUser</a></li>
            <li class="<?php echo e(Route::currentRouteName() == 'DisplayResidentFPuserVisitation' ? 'active' : ''); ?>"><a href="<?php echo e(route('DisplayResidentFPuserVisitation')); ?>">Family Planning Visitation</a></li>
        </ul>
    </li>
    <li class="has-sub active">
        <a href="javascript:;">
            <b class="caret"></b>
            Illnesses
        </a>
        <ul class="sub-menu">
            <li class="<?php echo e(Route::currentRouteName() == 'DisplayResidentChronicCough' ? 'active' : ''); ?>"><a href="<?php echo e(route('DisplayResidentChronicCough')); ?>">Chronic Cough</a></li>
            
            <li class="<?php echo e(Route::currentRouteName() == 'DisplayResidentChronicDiseases' ? 'active' : ''); ?>"><a href="<?php echo e(route('DisplayResidentChronicDiseases')); ?>">Chronic Disease</a></li>
        </ul>
    </li>
    <li class="<?php echo e(Route::currentRouteName() == 'DisplayResidentPWD'        ? 'active' : ''); ?>"><a href="<?php echo e(route('DisplayResidentPWD')); ?>">PWD's</a></li>
    <li class="<?php echo e(Route::currentRouteName() == 'DisplayResidentAdolescent' ? 'active' : ''); ?>"><a href="<?php echo e(route('DisplayResidentAdolescent')); ?>">Adolescent</a></li>
    <li class="<?php echo e(Route::currentRouteName() == 'DisplayResidentElderly'    ? 'active' : ''); ?>"><a href="<?php echo e(route('DisplayResidentElderly')); ?>">Elderly</a></li>
</ul>
</li>

<li class="has-sub <?php echo e(Route::currentRouteName() == 'listofresidents' || Route::currentRouteName() == 'ListofBarangayOfficials' || Route::currentRouteName() == 'ListofBusinesses' || Route::currentRouteName() == 'LisfofOrdianance' || Route::currentRouteName() == 'ListOfBlotters' ? 'active' : ''); ?> <?php echo e(session('session_permis_system_reports') == 1 ? '' : 'hide'); ?>">
    <a href="javascript:;">
        <b class="caret"></b>
        <i class="fas fa-search"></i>
        <span>Queries/Reports</span>
    </a>
    <ul class="sub-menu">
        <li class="<?php echo e(Route::currentRouteName() == 'listofresidents' ? 'active' : ''); ?>"><a href="<?php echo e(route('listofresidents')); ?>">List of Residents</a></li>
        <li class="<?php echo e(Route::currentRouteName() == 'ListofBarangayOfficials' ? 'active' : ''); ?>"><a href="<?php echo e(route('ListofBarangayOfficials')); ?>">List of Officials</a></li>
        <li class="<?php echo e(Route::currentRouteName() == 'ListofBusinesses' ? 'active' : ''); ?>"><a href="<?php echo e(route('ListofBusinesses')); ?>">List of Businesses</a></li>
        <li class="<?php echo e(Route::currentRouteName() == 'LisfofOrdianance' ? 'active' : ''); ?>"><a href="<?php echo e(route('LisfofOrdianance')); ?>">List of Ordinances</a></li>
        <li class="<?php echo e(Route::currentRouteName() == 'ListOfBlotters' ? 'active' : ''); ?>"><a href="<?php echo e(route('ListOfBlotters')); ?>">List of Blotters</a></li>
        <li class=""><a href="<?php echo e(route('HouseholdList')); ?>">Rbi Report</a></li>
        
    </ul>
</li>


<!-- begin sidebar minify button -->
<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
<!-- end sidebar minify button -->
</ul>
<!-- end sidebar nav -->
</div>
<!-- end sidebar scrollbar -->
</div>
<!-- begin #sidebar  CHANGE BG HERE!!-->
<div class="sidebar-bg" style="background-image: url(<?php echo e(asset('assets/img/side_nav/new_cover_sidenav.jpg)')); ?>"></div>
<!-- end #sidebar -->

<!-- begin #content -->
<?php echo $__env->yieldContent('content'); ?>


<!-- end #content -->



<!-- begin #footer -->
<div id="footer" class="footer">
    &copy; <script> document.write(new Date().getFullYear())
</script> <a href="http://euc.ph/barangay-it/"> <b>BitBo</b></a> <i>Bringing Change to Local Government</i>
<div class="pull-right">
    by <a href="http://euc.ph/"><b>GFMIC</b></a> & <a href="http://newsrg.pupqc.net/"><b>SRG</b></a>
</div>

</div>
<!-- end #footer -->

<!-- begin scroll to top btn -->
<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
<!-- end scroll to top btn -->
</div>
<!-- end page container -->

<!-- ================== BEGIN BASE JS ================== -->
<script src="<?php echo e(asset('assets/plugins/jquery/jquery-3.2.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>

<script src="<?php echo e(asset('assets/plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js')); ?>"></script>

<script src="<?php echo e(asset('assets/plugins/slimscroll/jquery.slimscroll.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/js-cookie/js.cookie.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/theme/default.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/apps.min.js')); ?>"></script>
<!-- ================== END BASE JS ================== -->
<script src="<?php echo e(asset('assets/js/moment.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('node_modules/jquery-form-validator/form-validator/jquery.form-validator.min.js')); ?>"></script>

<script type="text/javascript" src="<?php echo e(asset('node_modules/jquery-form-validator/form-validator/jquery.additional-methods.min.js')); ?>"></script>



<?php $__env->startSection('page-js'); ?>
<?php echo $__env->yieldSection(); ?>
<?php $__env->startSection('page-functions'); ?> 
<?php echo $__env->yieldSection(); ?>

<?php $__env->startSection('page-add'); ?>
<?php echo $__env->yieldSection(); ?>
<script src="<?php echo e(asset('assets/plugins/gritter/js/jquery.gritter.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/bootstrap-sweetalert/sweetalert.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/demo/ui-modal-notification.demo.min.js')); ?>"></script>



<script>
// document.onkeydown = function(e) {
//   if(event.keyCode == 123) {
//      return false;
//   }
//   if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
//      return false;
//   }
//   if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
//      return false;
//   }
//   if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
//      return false;
//   }
//   if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
//      return false;
//   }
// }

    $.ajax({
            url:'CheckIfFirstLoggedIn',
            success:function(data){
                if(data == 1)
                {
                    $(".cp-default-password-modal-btn").click();
                }                
            }

        });
    

    
        $("#change-default-password-btn").click(function(e){
        e.preventDefault();
        var new_password = $("#new-password-txt").val();
        var re_type_password = $("#re-type-password-txt").val();
        var token = "<?php echo e(csrf_token()); ?>";

        if(new_password != "" && re_type_password != "" )
        {
            if(new_password == re_type_password  )
            {
            $.ajax({
                url:'ChangeDefaultPassword',
                type:'post',
                data:{
                    new_password : re_type_password,
                    _token       : token
                },
                success:function(data){
                    swal("Password has been successfully change!", {
                            icon: "success",
                        }).then(function(){
                        
                            location.reload();
                        
                        });
                        
                },
                error:function(){
                    swal("error", {
                            icon: "error",
                        });
                }
            });
            }else{
                swal("Your re-typed password does not match in your new password.",'','error');    
            }
        }
        else{
            swal("Please fill up the necessary fields.",'','error');
        }

    });
    

    var Accountform = document.getElementById("AccountForm");

    $(document).ready(function(){

        $("a[id='UpdateBtn']").on('click',function () {

            var email = $('#EmailMainTxt').val()

            if(email == "" )
            {
                $('#ReqEmail').html('Required field!').css('color', 'red');

                swal({
                    title: 'Ooops!',
                    text: 'Please fill out the necessary fields!',
                    icon: 'error',
                    buttons: {
                        confirm: {
                            visible: true,
                            className: 'btn btn-danger',
                            closeModal: true,
                        }
                    }

                });
            }
            else
            {
                swal({
                    title: "Wait!",
                    text: "Are you sure you want to edit this?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("Data have been successfully updated!", {
                            icon: "success",

                        });
                        setTimeout(function(){ 
                            $.ajax({
                                url:'<?php echo e(route("EditAccount")); ?>',
                                type:'post',

                                cache:false,
                                data:{'_token':'<?php echo e(csrf_token()); ?>','EmailTxt':email,'UserID':'<?php echo e(session("session_user_id")); ?>'},
                                success:function()
                                {


                                    location.reload();
                                }


                            })
                        }, 1000);
                    } else {
                        swal("Operation Cancelled.", {
                            icon: "error",
                        });
                    }
                });

            }

        });


        $("a[id='ChangePassBtn']").on('click',function () {


            var oldpass = $('#OldPasswordTxt').val()
            var newpass = $('#NewPasswordTxt').val()


            if(oldpass == "" || newpass == ""   )
            {
                $('#ReqOldPassTxt').html('Required field!').css('color', 'red');
                $('#ReqNewPassTxt').html('Required field!').css('color', 'red');

                swal({
                    title: 'Ooops!',
                    text: 'Please fill out the necessary fields!',
                    icon: 'error',
                    buttons: {
                        confirm: {
                            visible: true,
                            className: 'btn btn-danger',
                            closeModal: true,
                        }
                    }

                });
            }
            else
            {

              $.ajax({
                 url:'<?php echo e(route("CheckOldPassword")); ?>',
                 type:'post',

                 cache:false,
                 data: {'_token':'<?php echo e(csrf_token()); ?>','OldPasswordTxt':oldpass,'UserID':'<?php echo e(session("session_user_id")); ?>'},
                 success:function(data)
                 {


                    if(data == '1')
                    {

                     swal({
                        title: "Wait!",
                        text: "Are you sure you want to change your password ?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                     .then((willDelete) => {
                        if (willDelete) {
                            swal("Password have been successfully updated!", {
                                icon: "success",

                            });
                            setTimeout(function(){ 
                                $.ajax({
                                    url:'<?php echo e(route("ChangePassword")); ?>',
                                    type:'post',

                                    cache:false,
                                    data:{'_token':'<?php echo e(csrf_token()); ?>','NewPasswordTxt':newpass,'UserID':'<?php echo e(session("session_user_id")); ?>'},
                                    success:function()
                                    {

                                        location.reload();
                                    }


                                })
                            }, 1000);
                        } else {
                            swal("Operation Cancelled.", {
                                icon: "error",
                            });
                        }
                    });

                 }
                 else
                 {
                    swal({
                        title: 'Ooops!',
                        text: 'Your old password is incorrect!',
                        icon: 'error',
                        buttons: {
                            confirm: {
                                visible: true,
                                className: 'btn btn-danger',
                                closeModal: true,
                            }
                        }

                    });



                }

            }

        })


          }


      });
        
    })






</script>
</body>
</html>
<?php /**PATH D:\BITBO_INSTALLER\4. BITBo\www\resources\views/global/main.blade.php ENDPATH**/ ?>