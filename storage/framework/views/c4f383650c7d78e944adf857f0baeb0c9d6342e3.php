<?php $__env->startSection('title', "Mother's Profile"); ?>

<?php $__env->startSection('page-css'); ?>

    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    <link href="<?php echo e(asset('assets/plugins/jquery-smart-wizard/src/css/smart_wizard.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('assets/plugins/parsley/src/parsley.css')); ?>" rel="stylesheet" />
    <!-- ================== END PAGE LEVEL STYLE ================== -->

    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    <link href="<?php echo e(asset('assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css')); ?>" rel="stylesheet" />
    <!-- ================== END PAGE LEVEL STYLE ================== -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-js'); ?>
   

    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="<?php echo e(asset('assets/plugins/DataTables/media/js/jquery.dataTables.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/demo/table-manage-default.demo.min.js')); ?>"></script>
    
    <script src="<?php echo e(asset('assets/plugins/gritter/js/jquery.gritter.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/bootstrap-sweetalert/sweetalert.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/demo/ui-modal-notification.demo.min.js')); ?>"></script>
    <!-- ================== BEGIN PAGE LEVEL JS ================== -->

    <script src="<?php echo e(asset('assets/plugins/highlight/highlight.common.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/demo/render.highlight.js')); ?>"></script>

    <script>
        $(document).ready(function() {
            App.init();
        
            TableManageDefault.init();
            Notification.init();
            
        });


    </script>
    
   
    <script type="text/javascript">
        $('#data-table-default').on('click','.edit-mother-btn', function () {
            


            var lastname = $(this).closest("tbody tr").find("td:eq(1)").html();
            var firstname = $(this).closest("tbody tr").find("td:eq(2)").html();
            var middlename = $(this).closest("tbody tr").find("td:eq(3)").html();

            var fullname = lastname + ", " + firstname + " " + middlename;

            $("#edit_db_name").text(fullname);

            $('#edit_mother_id').val($(this).closest("tbody tr").find("td:eq(0)").html());
            $('#editmtongue').val( $(this).closest("tbody tr").find("td:eq(6)").html());
            $('#editmdialect').val($(this).closest("tbody tr").find("td:eq(7)").html());
            $('#editmeducationatt').val($(this).closest("tbody tr").find("td:eq(8)").html());

           
          
        });
    </script>
    <script type="text/javascript">
        $('#edit-btn').click(function () {


            var mother_id = $('#edit_mother_id').val();
            var is_pregnant = $("input:radio[name=editispregnant]:checked").val();
            var m_tongue = $('#editmtongue').val();
            var m_other_dialect = $('#editmdialect').val();
            var meduc_attain = $('#editmeducationatt').val();



            var fd = new FormData();
            fd.append('mother_id',mother_id);
            fd.append('is_pregnant',is_pregnant);
            fd.append('m_tongue',m_tongue);
            fd.append('other_dialect',m_other_dialect);
            fd.append('m_educattain',meduc_attain);
            fd.append('_token',"<?php echo e(csrf_token()); ?>");

            swal({
                    title: "Wait!",
                    text: "Are you sure you want to edit this?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
            })
            .then((willDelete) => {
                    if (willDelete) {
                         Update(fd);
                       
                    } else {
                        swal("Operation Cancelled.", {
                            icon: "error",
                        });
                    }
            });
          

        });

        async function Update(fd) {
            swal("Data have been successfully Updated!", {
                  icon: "success",
                });

              let result;
              try
              {
                  result = await $.ajax({
                       url:"<?php echo e(route('MothersProfileEdit')); ?>",
                       type:'post',
                       processData:false,
                       contentType:false,
                       cache:false,
                       data:fd,
                       success:function(data)
                       {
                          if (data == "good" )
                          {
                              location.reload();
                          } 
                       }   
                    })
              }
              catch(error)
              {
                console.error(error);
              }
        }
    </script>
     
    <script type="text/javascript">

      $(document).ready(function() {
        $('#tag-btn').click(function() {

            var is_pregnant =  $("input:radio[name=mispregnant]:checked").val();
            var m_tongue = $('#mtongue').val();
            var other_dialect =  $('#mdialect').val();
            var m_educattain = $('#meducationatt').children(":selected").attr("value");
            var resident_id = $('#mother_id').val();

            var fd = new FormData();
           
            fd.append('is_pregnant',is_pregnant);
            fd.append('m_tongue',m_tongue);
            fd.append('other_dialect',other_dialect);
            fd.append('m_educattain',m_educattain);
            fd.append('resident_id',resident_id);
            fd.append('_token',"<?php echo e(csrf_token()); ?>");

            Add(fd);

        });
      });

       async function Add(fd) {
       swal("Data have been successfully Added!", {
                  icon: "success",
                });

          let result;
          try
          {
              result = await $.ajax({
                   url:"<?php echo e(route('MothersProfileAdd')); ?>",
                   type:'post',
                   processData:false,
                   contentType:false,
                   cache:false,
                   data:fd,
                   success:function(data)
                   {
                      if (data == "good" )
                      {
                          location.reload();
                      } 
                   }   
                })
          }
          catch(error)
          {
            console.error(error);
          }
    }  
    </script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


   <div id="content" class="content">
        <!-- begin breadcrumb -->
        <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
            <li class="breadcrumb-item"><a href="javascript:;">Mother's Information</a></li>

        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Basic Information  <small>DILG Requirements</small></h1>
        <!-- end page-header -->

    <!-- begin nav-pills -->
        <ul class="nav nav-pills">
            <li class="nav-items">
                <a href="#nav-pills-tab-1" data-toggle="tab" class="nav-link active">

                    <span class="d-sm-block d-none">Records</span>
                </a>
            </li>
            
        </ul>
        <!-- end nav-pills -->
        <!-- begin tab-content -->
        <div class="tab-content">
            <!-- begin tab-pane -->
            <div class="tab-pane fade active show" id="nav-pills-tab-1">
                
                    <!-- begin panel add new -->
                    <div class="panel panel-inverse">
                        <!-- begin panel-heading -->
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>

                            </div>
                            <h4 class="panel-title">Existing Records</h4>
                        </div>
                        <!-- end panel-heading -->
                        <!-- begin alert -->
                        <div class="alert alert-yellow fade show">
                            <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            The following are the existing records of mother's within the system.
                        </div>
                        <!-- end alert -->
                        <!-- begin panel-body -->
                        <div class="panel-body">

                            <table id="data-table-default" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th hidden>Mother ID </th>
                                    <th hidden>LastName</th>
                                    <th hidden>MiddleName</th>
                                    <th hidden>FirstName</th>
                                    <th >Full Name</th>
                                    <th>Is pregnant</th>
                                    <th>Mother Tongue</th>
                                    <th>Mother's Other Dialect</th>
                                    <th>Educational Attainment</th>
                                    <th hidden>Status</th>
                                    <th style="width: 15%">Actions </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $MotherTable; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               
                                <tr >

                                    <td hidden><?php echo e($profile->MOTHERS_ID); ?></td>
                                    <td hidden><?php echo e($profile->LASTNAME); ?></td>
                                    <td hidden><?php echo e($profile->FIRSTNAME); ?></td>
                                    <td hidden><?php echo e($profile->MIDDLENAME); ?></td>
                                    <td ><?php echo e($profile->LASTNAME); ?> <?php echo e($profile->FIRSTNAME); ?> <?php echo e($profile->MIDDLENAME); ?></td>
                                    <?php if($profile->IS_PREGNANT == '1'): ?> 
                                    <td style="background-color: <?php echo e($profile->ACTIVE_FLAG == 1 ? '#ddefc9' : '#ffcdcc'); ?>">Yes</td>
                                    <?php else: ?>
                                    <td style="background-color: <?php echo e($profile->ACTIVE_FLAG == 1 ? '#ddefc9' : '#ffcdcc'); ?>">No</td>
                                    <?php endif; ?>
                                    <td style="background-color: <?php echo e($profile->ACTIVE_FLAG == 1 ? '#ddefc9' : '#ffcdcc'); ?>"><?php echo e($profile->MOTHER_MOTHER_TONGUE); ?></td>
                                    <td style="background-color: <?php echo e($profile->ACTIVE_FLAG == 1 ? '#ddefc9' : '#ffcdcc'); ?>"><?php echo e($profile->MOTHER_OTHER_DIALECTS); ?></td>
                                    <td style="background-color: <?php echo e($profile->ACTIVE_FLAG == 1 ? '#ddefc9' : '#ffcdcc'); ?>"><?php echo e($profile->MOTHER_EDUCATIONAL_ATTAINMENT); ?></td>
                                    <?php if($profile->ACTIVE_FLAG == 1): ?>
                                    <td hidden style="background-color: <?php echo e($profile->ACTIVE_FLAG == 1 ? '#ddefc9' : '#ffcdcc'); ?>">Active</td>
                                    <?php else: ?>
                                    <td hidden style="background-color: <?php echo e($profile->ACTIVE_FLAG == 1 ? '#ddefc9' : '#ffcdcc'); ?>">Inactive</td>
                                    <?php endif; ?>
                                    
                                    <td style="background-color: <?php echo e($profile->ACTIVE_FLAG == 1 ? '#ddefc9' : '#ffcdcc'); ?>">
                                        <button type='button' class='btn btn-success edit-mother-btn' data-toggle='modal' data-target='#UpdateMother'>
                                            <i class='fa fa-edit'></i> Edit&nbsp&nbsp
                                        </button>
                                    </td>

                                </tr>
                                
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table> 


                          </div>
                        <!-- end panel-body -->


                            
                    </div>
                    <!-- end panel add new -->
                
            </div>
            <!-- end tab-pane -->
            <!-- begin tab-pane -->
           
                    
                

                 <!-- #modal-update-mother -->
                            <div class="modal fade" id="UpdateMother" data-backdrop="static">
                                <div class="modal-dialog" style="max-width: 30%">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: #008a8a">
                                            <h4 class="modal-title" style="color: white">Edit Record</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white">×</button>
                                        </div>
                                        <div class="modal-body">
                                                <h><label style="display: block; text-align: center">Mother's Name</label></h>
                                             <h3><b><label style="text-transform: capitalize; display: block; text-align: center" id="edit_db_name" name="edit_db_name"></label></b></h3>
                                             <br>
                                             <input id="edit_mother_id" type="text" class="form-control hide" name="MotherName"/>

                                            <div class="col-lg-12">
                                                <label style="display: block; text-align: left">Is pregnant?</label>
                                                <div class="radio radio-css">
                                                    <input type="radio" name="editispregnant" id="editcssRadioConcrete" value=1 checked />
                                                    <label for="editcssRadioConcrete">Yes</label>
                                                </div>
                                                <div class="radio radio-css">
                                                    <input type="radio" name="editispregnant" id="editcssRadioWood" value=0 />
                                                    <label for="editcssRadioWood">No</label>
                                                </div>
                                            </div>
                                            <br>
                                             <div class="col-lg-12">
                                                <label style="display: block; text-align: left">Mother Tongue</label>
                                                
                                                <select class="form-control " data-style="btn-lime" id="editmtongue" name="editmtongue">
                                                             
                                                        <option value="Tagalog" selected>Tagalog</option>
                                                        <option value="Visayan">Visayan</option>
                                                        <option value="Iloco">Iloco</option>
                                                        <option value="Bicolnon">Bicolnon</option>
                                                            
                                                </select>
                                               
                                            </div>
                                            <br>
                                            <div class="col-lg-12">
                                                <label style="display: block; text-align: left">Other dialects spoken at home</label>
                                                <input type="text" id="editmdialect" name="editmdialect" style="display: block; text-align: left; color:black; background-color:white" class="form-control" >
                                            </div>
                                            <br>
                                            <div class="col-lg-12">
                                                <label style="display: block; text-align: left">Education Attainment</label>
                                                <select class="form-control " data-style="btn-lime" id="editmeducationatt" name="editmeducationatt">
                                                             
                                                        <option value="Elementary School Graduate" selected>Elementary School Graduate</option>
                                                        <option value="High School Graduate">High School Graduate</option>
                                                        <option value="College Graduate">College Graduate</option>
                                                        <option value="Technical/Vocation Graduate">Technical/Vocation Graduate</option>
                                                        <option value="Masteral/Unit Degree">Masteral/Unit Degree</option>
                                                        <option value="Doctoral/Unit Degree">Doctoral/Unit Degree</option>
                                                            
                                                </select>
                                            </div>
                                            <br>
                                                        
                                            
                                        </div>
                                        <div class="modal-footer" align="center">
                                            <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>
                                            <a href="javascript:;" class="btn btn-success"  id="edit-btn">Update</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                 <!-- #modal-view -->
                            <div class="modal fade" id="UpdateModal" data-backdrop="static">
                                <div class="modal-dialog" style="max-width: 30%">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: #008a8a">
                                            <h4 class="modal-title" style="color: white">Edit Record</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white">×</button>
                                        </div>
                                        <div class="modal-body">
                                             <h3><b><label style="text-transform: capitalize;" id="view_db_name" name="view_db_name"></label></b></h3>
                                             <br>
                                             <input id="mother_id" type="text" class="form-control hide" name="MotherName"/>

                                            <div class="col-lg-12">
                                                <label style="display: block; text-align: left">Is pregnant?</label>
                                                <div class="radio radio-css">
                                                    <input type="radio" name="mispregnant" id="cssRadioConcrete" value=1 checked />
                                                    <label for="cssRadioConcrete">Yes</label>
                                                </div>
                                                <div class="radio radio-css">
                                                    <input type="radio" name="mispregnant" id="cssRadioWood" value=0 />
                                                    <label for="cssRadioWood">No</label>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="col-lg-12">
                                                <label style="display: block; text-align: left">Mother Tongue</label>
                                                
                                                <select class="form-control " data-style="btn-lime" id="mtongue" name="mtongue">
                                                             
                                                        <option value="Tagalog" selected>Tagalog</option>
                                                        <option value="Visayan">Visayan</option>
                                                        <option value="Iloco">Iloco</option>
                                                        <option value="Bicolnon">Bicolnon</option>
                                                            
                                                </select>
                                               
                                            </div>
                                            <br>
                                            <div class="col-lg-12">
                                                <label style="display: block; text-align: left">Other dialects speak at home</label>
                                                 <input type="text" id="mdialect" name="mdialect" style="display: block; text-align: left; color:black; background-color:white" class="form-control" >
                                                
                                            </div>
                                            <br>
                                            <div class="col-lg-12">
                                                <label style="display: block; text-align: left">Education Attainment</label>
                                                <select class="form-control " data-style="btn-lime" id="meducationatt" name="edithomeownership">
                                                             
                                                        <option value="Elementary School Graduate" selected>Elementary School Graduate</option>
                                                        <option value="High School Graduate">High School Graduate</option>
                                                        <option value="College Graduate">College Graduate</option>
                                                        <option value="Technical/Vocation Graduate">Technical/Vocation Graduate</option>
                                                        <option value="Masteral/Unit Degree">Masteral/Unit Degree</option>
                                                        <option value="Doctoral/Unit Degree">Doctoral/Unit Degree</option>
                                                            
                                                </select>
                                            </div>
                                            <br>
                                                        
                                            
                                        </div>
                                        <div class="modal-footer" align="center">
                                            <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>
                                            <a href="javascript:;" class="btn btn-success"  id="tag-btn">Tag</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
            </div>
            
            <!-- end tab-pane -->
              </div>
        <!-- end tab-content -->

        </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('global.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\BITBO_INSTALLER\4. BITBo\www\resources\views/resident/mothersprofile.blade.php ENDPATH**/ ?>