<?php if(session('session_position') != 'Admin' ): ?>
<script type="text/javascript">location.href='<?php echo e(route("Dashboard")); ?>'</script>
<?php else: ?>

<?php endif; ?>

<?php $__env->startSection('title', "Ordinance Category Setup"); ?>

<?php $__env->startSection('page-css'); ?>

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
    <script>
        $(document).ready(function() {
            App.init();
            TableManageDefault.init();
            Notification.init();
        });

    </script>

    
    <script>
        var Editform = document.getElementById("EditForm");

        $("a[id='EditBTN']").on('click',function () {
            var catname = $('#EditCatName').val()
            if(catname == "")
            {
                $('#reqcatnameedit').html('Required field!').css('color', 'red');
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
                            setTimeout(function(){ Editform.submit(); }, 1000);
                        } else {
                            swal("Operation Cancelled.", {
                                icon: "error",
                            });
                        }
                    });

            }

        });
    </script>

    
    <script type="text/javascript">
        $(document).ready(function()
        {
            $(".viewCategory").click(function()
            {
                $("#ViewCategName").text($(this).closest("tbody tr").find("td:eq(1)").html());
            });
        });
    </script>

    
    <script type="text/javascript">
        $(document).ready(function()
        {
            $(".editCategory").click(function()
            {
                $("#EditCatID").val($(this).closest("tbody tr").find("td:eq(0)").html());
                $("#EditCatName").val($(this).closest("tbody tr").find("td:eq(1)").html());
            });
        });
    </script>

    
    <script>
        var Addform = document.getElementById("AddForm");

        $('#AddBTN').click(function(){
            var catname = $('#AddCatName').val()
            if(catname == ""){
                $('#reqcatnameadd').html('Required field!').css('color', 'red');
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

                })
            }
            else {
                swal({
                    title: 'Success!',
                    text: 'Category successfully added.',
                    icon: 'success',

                } );
                setTimeout(function(){ Addform.submit(); }, 1000);

            }
        });
    </script>


    <script type="text/javascript">
        
        function GetStatus(status,id)
            { 
                if(status == 1)
                    {

                        swal({
                        title: "Wait!",
                        text: "Are you sure you want to delete this?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                            })
                        .then((willDelete) => {
                            if (willDelete) {
                                swal("Data has been disable!", {
                                    icon: "success",

                                });
                                setTimeout(function()
                                { 
                                    $.ajax(
                                        {
                                            url:'OrdinanceCategoryDelete',
                                            type:'post',
                                            data:{'Status':status,'_token':'<?php echo e(csrf_token()); ?>','CategoryID':id},
                                            success:function(data)
                                                {
                                                    location.reload();


                                                }
                                        });
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
                        title: "Wait!",
                        text: "Are you sure you want to activate this?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                            })
                        .then((willDelete) => {
                            if (willDelete) {
                                swal("Data has been activated!", {
                                    icon: "success",

                                });
                                setTimeout(function()
                                { 
                                    $.ajax(
                                        {
                                            url:'OrdinanceCategoryDelete',
                                            type:'post',
                                            data:{'Status':status,'_token':'<?php echo e(csrf_token()); ?>','CategoryID':id},
                                            success:function(data)
                                                {
                                                    location.reload();


                                                }
                                        });
                                 }, 1000);
                            } else {
                                swal("Operation Cancelled.", {
                                    icon: "error",
                                });
                            }
                        });  
                    }    

                    
                
            }

    </script>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>

    <!-- begin #content -->
    <div id="content" class="content">
        <!-- begin breadcrumb -->
        <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item"><a href="javascript:;">Administration</a></li>
            <li class="breadcrumb-item"><a href="javascript:;">Site Configuration</a></li>
            <li class="breadcrumb-item"><a href="javascript:;">Category Setup</a></li>
            <li class="breadcrumb-item active">Ordinance Category</li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Category Setup <small> Configurations required by the system.</small></h1>
        <!-- end page-header -->

        <!-- begin row -->
        <div >

            <!-- begin col-10 -->
            <div>
                <!-- begin panel -->
                <div class="panel panel-inverse">
                    <!-- begin panel-heading -->
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>

                        </div>
                        <h4 class="panel-title">Ordinance Category</h4>
                    </div>
                    <!-- end panel-heading -->
                    <!-- begin alert -->
                    <div class="alert alert-yellow fade show">
                        <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        Ordinance Category groups all the ordinances of the barangay.
                    </div>
                    <!-- end alert -->
                    <!-- begin panel-body -->
                    <div class="panel-body">
                        <button type='button' class='btn btn-lime'data-toggle='modal' data-target='#AddModal' >
                            <i class='fa fa-plus'></i> Add New
                        </button>

                        <br>
                        <br>
                        <table id="data-table-default" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th hidden>Category ID </th>
                                <th>Category Name </th>
                             
                                <th style="width: 35%">Actions </th>
                            </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $displaydata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr >
                                        <td hidden><?php echo e($value->ORDINANCE_CATEGORY_ID); ?></td>
                                        <td><?php echo e($value->ORDINANCE_CATEGORY_NAME); ?></td>
                                      
                                        <td>

                                            <button type='button' class='btn btn-warning viewCategory'data-toggle='modal' data-target='#ViewModal' >
                                                <i class='fa fa-eye'></i> View
                                            </button>

                                            <button type='button' class='btn btn-success editCategory' data-toggle='modal' data-target='#UpdateModal'>
                                                <i class='fa fa-edit'></i> Edit
                                            </button>

                                            <?php if($value->ACTIVE_FLAG==1): ?>                                        
                                                <button type='button' class='btn btn-danger '  onclick="GetStatus('<?php echo e($value->ACTIVE_FLAG); ?>','<?php echo e($value->ORDINANCE_CATEGORY_ID); ?>')">
                                                    <i class='fa fa-times'></i> Disable
                                                </button>                                            
                                            <?php else: ?>                                              
                                                <button type='button' class='btn btn-lime '  onclick="GetStatus('<?php echo e($value->ACTIVE_FLAG); ?>','<?php echo e($value->ORDINANCE_CATEGORY_ID); ?>')">
                                                    <i class='fa fa-redo'></i> Activate
                                                </button>                                            
                                            <?php endif; ?>






                                        </td>

                                    </tr>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   

                            </tbody>
                        </table>

                        <!-- #modal-EDIT -->
                        <div class="modal fade" id="UpdateModal">
                            <div class="modal-dialog" style="max-width: 30%">
                                <form id="EditForm" method="post" action="<?php echo e(route('OrdinanceCategoryEdit')); ?>"> 
                                    <?php echo csrf_field(); ?>
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: #008a8a">
                                            <h4 class="modal-title" style="color: white">Edit Category</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white">×</button>
                                        </div>
                                        <div class="modal-body">
                                            
                                            <label class="form-label hide">Category ID</label>
                                            <input id="EditCatID" type="text" class="form-control hide" name="CategoryID"/>

                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Ordinance Category</label> <span id='reqcatnameedit'></span>
                                                    <input style="text-transform: capitalize;" id="EditCatName" name="EditCatName" class="form-control"  placeholder="e.g.: Peace and Order" required="true">
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>
                                            <a id="EditBTN" href="javascript:;" class="btn btn-success">Update</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- #modal-view -->
                        <div class="modal fade" id="ViewModal">
                            <div class="modal-dialog" style="max-width: 30%">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: #f59c1a">
                                        <h4 class="modal-title" style="color: white">View Category</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white">×</button>
                                    </div>
                                    <div class="modal-body">
                                        
                                        <h2 id="ViewCategName" align="center"></h2>
                                        <label style="display: block; text-align: center">Category Name</label>

                                        
                                    </div>
                                    <div class="modal-footer">
                                        <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- #modal-add -->
                        <div class="modal fade" id="AddModal">
                            <div class="modal-dialog" style="max-width: 30%">
                                <form id="AddForm" action="<?php echo e(route('AddOrdinanceCateg')); ?>" method="post">
                                    <?php echo csrf_field(); ?>

                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color:#6C9738;">
                                            <h4 class="modal-title" style="color: white">Add Ordinance Category</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white">×</button>
                                        </div>
                                        <div class="modal-body">
                                            
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Ordinance Category</label> <span id='reqcatnameadd'></span>
                                                    <input style="text-transform: capitalize;" id="AddCatName"  name="AddCatName" class="form-control"  placeholder="e.g.: Peace and Order" required="true">
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>
                                            <a id="AddBTN" href="javascript:;" class="btn btn-lime">Add</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    <!-- end panel-body -->
                </div>
                <!-- end panel -->
            </div>
            <!-- end col-10 -->
        </div>

        <!-- end row -->
    </div>

    <!-- end #content -->




<?php $__env->stopSection(); ?>
<?php echo $__env->make('global.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\BITBO_INSTALLER\4. BITBo\www\resources\views/administration/ordinancecat.blade.php ENDPATH**/ ?>