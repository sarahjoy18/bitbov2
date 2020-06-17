 


<?php $__env->startSection('page-css'); ?>

<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
<link href="<?php echo e(asset('assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css')); ?>" rel="stylesheet" />
<link href="<?php echo e(asset('assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css')); ?>" rel="stylesheet" />

<!-- ================== END PAGE LEVEL STYLE ================== -->
<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
<link href="<?php echo e(asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css')); ?>" rel="stylesheet" />
<link href="<?php echo e(asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.css')); ?>" rel="stylesheet" />


<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-init-app'); ?>
<script>
    $(document).ready(function() {
        App.init();
        TableManageDefault.init();

    });

</script>
    
<script type="text/javascript">
     var ACTIVE_FLAG = 1;
    $(document).ready(function(){
        changebc();
    });
    function changebc() {
        $(".tablecell").each(function() {
                            // get text into variable
                            var colText = $(this).text();
                            // need to create an action
                             if (ACTIVE_FLAG == 1) {
                            // do green
                                $(this).addClass("cellGreen");
                            }
                            else {
                            // do red
                                $(this).addClass("cellRed");
                            }
                         
                        });
    }

    $('#filterbtn').on('click', function() {

        var status = $('#editcstatus').val();
        var fromdate = $('#fromdate').val();
        var todate = $('#todate').val();
        var fd =  new FormData();

        
        fd.append('editcstatus', status);
        fd.append('fromdate', fromdate);
        fd.append('todate', todate);
        fd.append('_token',"<?php echo e(csrf_token()); ?>");
        let result;

        filterdisplay(fd);

    });

    async function filterdisplay(fd) {       
        await loadfilter(fd);  
        sample();    
        
    }

    function sample() {
     $('#spnner').hide();

 }

 function loadfilter(fd) {
    return new Promise((resolve,reject) => {

        setTimeout(() => {
            $('#spnner').show();

            //var  FULLNAME, 
            var ORDINANCE_AUTHOR, ORDINANCE_TITLE, ORDINANCE_CATEGORY_NAME, ORDINANCE_SANCTION ,ORDINANCE_REMARKS;
            ACTIVE_FLAG = 1;
            $.ajax({
                url:"<?php echo e(route('LisfofOrdiananceFilter')); ?>",
                type:'post',
                processData:false,
                contentType:false,
                
                data:fd,

                success:function(data)
                {
                  
                    
                    
                   
                    $('#data-table-default').DataTable().rows().remove().draw();
                    data.map( value => { 
                        
                        //FULLNAME = value.FULLNAME;
                        ORDINANCE_AUTHOR = value.ORDINANCE_AUTHOR;
                        ORDINANCE_TITLE = value.ORDINANCE_TITLE;                                                          
                        ORDINANCE_CATEGORY_NAME = value.ORDINANCE_CATEGORY_NAME;
                        ORDINANCE_REMARKS = value.ORDINANCE_REMARKS;
                        ORDINANCE_SANCTION = value.ORDINANCE_SANCTION;
                           
                        // $(".tablecell").each(function() {
                        //     // get text into variable
                        //     // var colText = $(this).text();
                        //     // need to create an action
                        //      if (ACTIVE_FLAG == 1) {
                        //     // do green
                        //         $(this).css("cellGreen");
                        //     }
                        //     else {
                        //     // do red
                        //         $(this).addClass("cellRed");
                        //     }
                        // console.log(ACTIVE_FLAG++)
                        // });
                          
                        $("#data-table-default").DataTable().row.add
                        (
                            
                            [
                                //FULLNAME,
                                ORDINANCE_AUTHOR,
                                ORDINANCE_TITLE,
                                ORDINANCE_CATEGORY_NAME,
                                ORDINANCE_REMARKS,
                                ORDINANCE_SANCTION,
                                
                            ]

                        ).draw();
                      

                    }) 

                    resolve();
                }
                ,error:function(){
                    reject('something went wrong')
                }
            })
        });
    });
    
    
}
</script>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('table-js'); ?>

<script src="<?php echo e(asset('assets/plugins/DataTables/media/js/jquery.dataTables.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/demo/table-manage-default.demo.min.js')); ?>"></script>


<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="<?php echo e(asset('assets/plugins/highlight/highlight.common.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/demo/render.highlight.js')); ?>"></script>
<!-- ================== END PAGE LEVEL JS ================== -->


<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-js'); ?>

<?php if(Request::ajax()): ?>
<?php $__env->startSection('page-init-table'); ?> <?php echo $__env->yieldSection(); ?>
<?php $__env->startSection('page-init-app'); ?> <?php $__env->stopSection(); ?>

<?php else: ?>
<?php $__env->startSection('page-init-app'); ?> <?php echo $__env->yieldSection(); ?>
<?php $__env->startSection('table-js'); ?> <?php echo $__env->yieldSection(); ?>

<?php endif; ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<style type="text/css">
    .cellRed
    {
        background-color: Red;
    }

    .cellGreen
    {
        background-color: #ddefc9;
    }


</style>
<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="javascript:;">Queries and Reports</a></li>
        
        <li class="breadcrumb-item active">List of Ordinances</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">List of Ordinances<br><small>You can filter Ordinance reports.</small></h1>
    <!-- end page-header -->

    <!-- begin row -->
    <div >
        <form method="POST" action="<?php echo e(route('LisfofOrdianancePrint')); ?>" >
            <?php echo e(csrf_field()); ?>

            <div class="row">
                <div class="col-lg-2 col-md-6">
                    <div class="stats-content">
                        <label style="display: block; text-align: left">Category</label>

                        <select class="form-control" data-style="btn-lime" id="editcstatus" name="editcstatus">
                            <option id="All">All</option>
                            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pos_name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option id ="<?php echo e($key); ?>"><?php echo e($pos_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        
                    </div>
                </div>

                <div class="col-lg-2 col-md-6">
                    <div class="stats-content">
                        <label style="display: block; text-align: left">     &nbspFrom Date</label>
                        <input type="date" id="fromdate" name="fromdate" class="form-control">
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="stats-content">
                        <label style="display: block; text-align: left">     &nbspTo Date</label>
                        <input type="date" id="todate" name="todate" class="form-control">
                    </div>
                </div>


                <div class="col-lg-1">
                    <div class="stats-content">
                     <label for="lastname">&nbsp</label><span id="lbllastname"></span>
                     <button type="submit" class='btn btn-lime form-control' >
                        <i class='fa fa-print'></i> print
                    </button>
                </div>
            </div>
            <div class="stats-content">
             <label for="filter">&nbsp</label><span id="filter"></span>
             <a id="filterbtn" href="javascript:;" class='btn btn-primary form-control' >
                <i class='fa fa-redo'></i> filter
            </a>
            
            
        </div>
        <div class="panel-body">
            <div class="fa-3x" style="display: none; "id="spnner">
                <i class="fas fa-spinner fa-spin" style="color: black"></i>
                                <!-- <i class="fas fa-circle-notch fa-spin"></i>
                                <i class="fas fa-sync fa-spin"></i>
                                <i class="fas fa-cog fa-spin"></i>
                                <i class="fas fa-spinner fa-pulse"></i> -->
                            </div>
                        </div>
                        
                    </div>
                    
                </form>


                <br><br>
                <!-- begin col-10 -->
                <div><br>
                    <!-- begin panel -->
                    <div class="panel panel-inverse">
                        <!-- begin panel-heading -->
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>

                            </div>
                            <h4 class="panel-title">Ordinances</h4>
                        </div>
                        <!-- end panel-heading -->
                        <!-- begin alert -->
                        <div class="alert alert-yellow fade show">
                            <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            Residents Records groups all the forms being issued by the barangay.
                        </div>
                        <!-- end alert -->
                        <!-- begin panel-body -->
                        <div class="panel-body">


                            <br>
                            
                            <!-- begin row -->
                            <div class="row">
                                <!-- begin col-6 -->
                                <div class="col-lg-12">
                                    <!-- begin nav-pills -->


                                    <div class="tab-content">
                                        <!-- begin tab-pane -->
                                        <div class="tab-pane fade active show" id="nav-pills-tab-1">


                                           <!-- end row -->
                                           <div id="LoadTable">
                                           <table id="data-table-default" class="table table-striped table-bordered display compact" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>
                                                        
                                                                   
                                                        <!-- <th >Assigned Official</th> -->
                                                        <th >Author</th>
                                                        <th >Title</th>
                                                        <th >Category</th>
                                                        <th >Remarks</th>
                                                        <th >Sanction</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   <?php $__currentLoopData = $ordinances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                     <tr >
                                                      
                                                        <!-- <td class="tablecell" name="td_name"></td> -->
                                                        <td class="tablecell"> <?php echo e($record->ORDINANCE_AUTHOR); ?></td>
                                                        <td class="tablecell"><?php echo e($record->ORDINANCE_TITLE); ?></td>
                                                        <td class="tablecell"><?php echo e($record->ORDINANCE_CATEGORY_NAME); ?></td>
                                                        <td class="tablecell"><?php echo e($record->ORDINANCE_REMARKS); ?></td>
                                                        <td class="tablecell"><?php echo e($record->ORDINANCE_SANCTION); ?></td>

                                                       <!--  <td ></td>
                                                        <td ><?php echo e($record->ORDINANCE_AUTHOR); ?></td>
                                                        <td ><?php echo e($record->ORDINANCE_TITLE); ?></td>
                                                        <td ><?php echo e($record->ORDINANCE_CATEGORY_NAME); ?></td>
                                                        <td ><?php echo e($record->ORDINANCE_REMARKS); ?></td>
                                                        <td ><?php echo e($record->ORDINANCE_SANCTION); ?></td> -->
                                                    </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
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
                    <div>
                        <?php $__env->stopSection(); ?>

                        
<?php echo $__env->make('global.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\BITBO_INSTALLER\4. BITBo\www\resources\views/queriesreports/listofordinance.blade.php ENDPATH**/ ?>