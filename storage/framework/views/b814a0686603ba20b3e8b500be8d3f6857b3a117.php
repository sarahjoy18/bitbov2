<?php $__env->startSection('title', "Pending Summon"); ?>

<?php $__env->startSection('page-css'); ?>

    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    <link href="<?php echo e(asset('assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('assets/plugins/jquery-timepicker/jquery.timepicker.min.css')); ?>" rel="stylesheet" />
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
    <script src="<?php echo e(asset('assets/plugins/jquery-timepicker/jquery.timepicker.min.js')); ?>" ></script>
    <script src="<?php echo e(asset('custom/jasonday-printThis-edc43df/printThis.js')); ?>"></script>
    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script>
        $(document).ready(function() {
            App.init();
            TableManageDefault.init();
            Notification.init();

            $('#data-table-default').on('click', '#PrintBTN', function(){

                var patawagIDP = $('#patawagIDP').val();
                var datetime;
                var split;

                var fd = new FormData();
                fd.append('patawagIDP', patawagIDP);
                fd.append('_token',"<?php echo e(csrf_token()); ?>");

                $.ajax({
                    url:"<?php echo e(route('PrintPatawag')); ?>",
                    method:'POST',
                    data:fd,
                    processData: false, 
                    contentType: false,
                    success:function(response) {

                    cname = '';
                    fname = '';
                    lname = '';

                    name = '';
                    bsubject = '';
                    place = '';
                    datetime = '';
                    split = '';
                    
                    //get data here
                    $.each(response["for_print"], function(){
                        cname = this["complaint_name"];

                        fname = this["firstname"];
                        lname = this["lastname"]
                        name = this["Respondent"];

                        bsubject = this["blotter_name"];
                        
                        datetime = this["patawag_sched_datetime"];
                        get_convert = moment(datetime).format('MMMM d, YYYY h:mm a');
                        
                        date = get_convert.split(" ")[0];
                        time = get_convert.split(" ")[1];

                        place = this["patawag_sched_place"];
                    });
                    
                    //set value here
                    
                    $("#lbl_complainant").text(cname);
                    $("#lbl_accused").text(name);
                    $("#lbl_place").text(place);
                    $("#lbl_blotsub").text(bsubject);
                    $("#time").text(time);
                    $("#month-year").text(date);
                    
                    
                    //print here
                    $("#print_form").printThis({
                         debug: false,               // show the iframe for debugging
                         debug: false,               // show the iframe for debugging
                         importCSS: true,            // import page CSS
                         importStyle:true,           // import style tags
                         // printContainer: true,       // grab outer container as well as the contents of the selector
                         loadCSS: "",              // path to additional css file - use an array [] for multiple
                         pageTitle: "fdas",              // add title to print page
                         removeInline: false,        // remove all inline styles from print elements
                         printDelay: 1000,            // variable print delay
                         header: null,               // prefix to html
                         footer: "",               // postfix to html
                         base: false ,               // preserve the BASE tag, or accept a string for the URL
                         formValues: true,           // preserve input/form values
                         canvas: false,              // copy canvas elements (experimental)
                         doctypeString: null,        // enter a different doctype for older markup
                         removeScripts: false,       // remove script tags from print content
                         copyTagClasses: false       // copy classes from the html & body tag               
                     });
                },
                error : function(error){
                    alert('failed');
                }
               });
            });        
        });

    </script>



     
    <script>
        var updateSummon = document.getElementById("UpdateSummonForm");

        $(document).ready(function(){

        $("a[id='EditBTN']").on('click',function () {
       
            var newSchedDate = $('#updateScheduledDate').val();
            var newSchedTime = $('#updateScheduledTime').val();
            var newSchedPlace = $('#updateScheduledPlace').val();
            var patawagID = $('#patawagID').val();
           
            var fd = new FormData();
            fd.append('updateScheduledDate', newSchedDate);
            fd.append('updateScheduledTime', newSchedTime)
            fd.append('updateScheduledPlace', newSchedPlace);
            fd.append('patawagID', patawagID);
            fd.append('_token',"<?php echo e(csrf_token()); ?>");

            
            // alert(patawagID);
            // alert(newSchedDate);
            // alert(newSchedPlace);
            // alert(newSchedTime);

             swal({
                    title: "Wait!",
                    text: "Are you sure you want to edit this?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                    .then((willResolve) => { 
                        if (willResolve) {
                            swal("Data have been successfully updated!", {
                                icon: "success",

                            });
                        }
            try
            {
                $.ajax({
                    url:"<?php echo e(route('UpdatePatawag')); ?>",
                    type:'POST',
                    data:fd,
                    processData:false,
                    contentType:false,
                    cache:false,

                    
                    success:function()
                    {
                        location.reload();
                    }    
               });

            }
            catch(error)
            {
                console.error(error)
            }
           
          
            });

                
        });

    });
    </script>




    <script type="text/javascript">

         $("#data-table-default").on('click','#editSummon',function()
            {
                
                var scheduledDate= $(this).closest("tbody tr").find("td:eq(2)").html();
                var scheduledTime = $(this).closest("tbody tr").find("td:eq(3)").html();
                
                $('#updateScheduledDate').datepicker({
                        value:scheduledDate,
                        minDate:0,
                        dateFormat: "yy-mm-dd"
                    });

                $('#updateScheduledTime').timepicker({ 
                    timeFormat:'h:i A',
                    value:scheduledTime,
                    interval:5,
                    minTime:'7:00 am',
                    maxTime:'5:00 pm'
                });

                $('#updateScheduledDate').val(scheduledDate);
                $('#updateScheduledTime').val(scheduledTime);
                $("#patawagID").val($(this).closest("tbody tr").find("td:eq(0)").html());
                // $("#updateScheduledTime").val($(this).closest("tbody tr").find("td:eq(3)").html());
                $("#updateScheduledPlace").val($(this).closest("tbody tr").find("td:eq(4)").html());
            });

         $("#data-table-default").on('click','#PrintBTN',function()
            {
                $("#patawagIDP").val($(this).closest("tbody tr").find("td:eq(0)").html());
            });
    </script>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>

    <!-- begin #content -->
    <div id="content" class="content">
        <!-- begin breadcrumb -->
        <ol class="breadcrumb pull-right">
            <li class="breadcrumb-item"><a href="javascript:;">Cases </a></li>
            <li class="breadcrumb-item active">Pending Summon  </li>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Cases <small> Records of reported cases within the barangay.</small></h1>
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
                        <h4 class="panel-title">Pending Summon</h4>
                    </div>
                    <!-- end panel-heading -->
                    <!-- begin alert -->
                    <div class="alert alert-yellow fade show">
                        <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        Blotter displays all the pending summons within the barangay.
                    </div>
                    <!-- end alert -->
                    <!-- begin panel-body -->
                    <div class="panel-body">
                        <table id="data-table-default" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th hidden>Patawag ID </th>
                                <th>Blotter Code</th>
                                <th>Scheduled Date </th>
                                <th>Scheduled Time </th>
                                <th>Scheduled Place </th>
                                <th>Status </th>
                                <th style="width: 16.5%">Actions </th>
                            </tr>
                            </thead>

                            <tbody>
                        <?php $__currentLoopData = $disppatawag; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patawag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php
                            $date = explode(' ', $patawag->patawag_sched_datetime);
                        ?>

                            <tr >
                                <td hidden><?php echo e($patawag->patawag_id); ?></td>
                                <td><?php echo e($patawag->blotter_code); ?></td>
                                <td><?php echo e($date[0]); ?></td>
                                <td><?php echo e(date("h:i A", strtotime($date[1]))); ?></td>
                                <td><?php echo e($patawag->patawag_sched_place); ?></td>
                                <td><?php echo e($patawag->status); ?></td>
                                <td>

                                    <button type='button' class='btn btn-success' id="editSummon" data-toggle='modal' data-target='#UpdateModal'>
                                        <i class='fa fa-edit'></i> Edit
                                    </button>   
                                    <button type='button' id="PrintBTN" class='btn btn-warning'>
                                        <i class='fa fa-print'></i> Print
                                    </button> 
                                   <!--  <button type='button' id="PrintBTN" class='btn btn-lime'>
                                        <i class='fa fa-check'></i> Done
                                    </button>   -->
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>
                    </div>
                </div>


                       
                        <!-- #modal-hearing -->
                        <div class="modal fade" id="UpdateModal">
                            <div class="modal-dialog" style="max-width: 35%">
                                <form id="UpdateSummonForm" method="POST">
                                    <?php echo csrf_field(); ?>

                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color:#008a8a;">
                                            <h4 class="modal-title" style="color: white">Update Summon</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white">×</button>
                                        </div>
                                        <div class="modal-body">
                                       
                                            <label class="form-label hide">Patawag ID</label>
                                                <input type="text" id="patawagID" name="patawagID" type="text" class="form-control hide"/>

                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Scheduled Date</label> <span id='reqScheduledDateEdit'></span>
                                                            <input type="text" id="updateScheduledDate" name="updateScheduledDate" class="form-control" required="true">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Scheduled Time</label> <span id='reqScheduledTimeEdit'></span>
                                                            <input type="text" id="updateScheduledTime" name="updateScheduledTime" class="form-control" required="true">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Scheduled Place</label> <span id='reqScheduledPlaceEdit'></span>
                                                    <input id="updateScheduledPlace" name="updateScheduledPlace" class="form-control" required="true" placeholder="Where the hearing will happen" >
                                                </div>
                                            </div>
                                        
                                        </div>
                                        <div class="modal-footer">
                                            <a id="CloseBTN" href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>
                                            <a id="EditBTN" name="EditBTN" href="javascript:;" class="btn btn-success">Update</a>
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

    <div class="fillers" id="fillers" hidden>
        <input type="text" id="patawagIDP" hidden />   
        <?php echo $__env->make('cases.summonPrintable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    </div>

    <!-- end #content -->




<?php $__env->stopSection(); ?>
<?php echo $__env->make('global.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\BITBO_INSTALLER\4. BITBo\www\resources\views/cases/pendingSummon.blade.php ENDPATH**/ ?>