<?php if(session('session_permis_user_accounts')!= '1' && session('session_position') != 'Admin'): ?>
<script type="text/javascript">location.href='<?php echo e(route("Dashboard")); ?>'</script>
<?php else: ?>

<?php endif; ?>


<?php $__env->startSection('title', "User Accounts"); ?>

<?php $__env->startSection('page-css'); ?>

<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
<link href="<?php echo e(asset('assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css')); ?>" rel="stylesheet" />
<link href="<?php echo e(asset('assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css')); ?>" rel="stylesheet" />
<link href="<?php echo e(asset('assets/plugins/parsley/src/parsley.css')); ?>" rel="stylesheet" />


<link href="<?php echo e(asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.css')); ?>" rel="stylesheet" />
<link href="<?php echo e(asset('assets/plugins/bootstrap-eonasdan-datetimepicker/build/css/bootstrap-datetimepicker.min.css')); ?>" rel="stylesheet" />
<!-- ================== END PAGE LEVEL STYLE ================== -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-js'); ?>

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="<?php echo e(asset('assets/plugins/DataTables/media/js/jquery.dataTables.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/demo/table-manage-default.demo.min.js')); ?>"></script>


<script src="<?php echo e(asset('assets/plugins/parsley/dist/parsley.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/highlight/highlight.common.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/demo/render.highlight.js')); ?>"></script>

<script src="<?php echo e(asset('assets/plugins/bootstrap-daterangepicker/moment.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/bootstrap-eonasdan-datetimepicker/build/js/bootstrap-datetimepicker.min.js')); ?>"></script>

<script src="<?php echo e(asset('assets/plugins/gritter/js/jquery.gritter.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/bootstrap-sweetalert/sweetalert.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/demo/ui-modal-notification.demo.min.js')); ?>"></script>
<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script>
    $(document).ready(function() {
        App.init();
        TableManageDefault.init();
        $("#permision-table").DataTable();
        Highlight.init();
        
    });



</script>


<script>
    var SetForm = document.getElementById("SetForm");

    $("#SetBtn").on('click',function (e) {
        e.preventDefault();


        var barangay_official_name =  $('#ResSelect').children(":selected").attr("value");
        var start_term = $('#StartTermTxt').val();
        var end_term = $('#EndTermTxt').val();
        var pos_id = $('#BarangayPositionTxt').children(":selected").attr("id");
        var res_id = $('#ResSelect').children(":selected").attr("id");
        var email  = $('#EmailTxt').val();
        




        if(barangay_official_name  == "" || email == "" || start_term =="" || end_term =="")
        {
            $('#ReqBarangayOfficialNameTxt').html('Required field!').css('color', 'red');
            $('#ReqEmail').html('Required field!').css('color', 'red');
            $('#ReqStartTermTxt').html('Required field!').css('color', 'red');

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
        // var defpassword = Math.random().toString(36).substr(2, 10);
        // var defusername = Math.random().toString(10).substr(2, 2);

        var fd = new FormData();

        swal({
            title: "Wait!",
            text: "Are you sure you want to assign "+ barangay_official_name +" as "+$("#BarangayPositionTxt").find(':selected').text()+"?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            fd.append('res_id',res_id);
            fd.append('start_term',start_term);
            fd.append('end_term',end_term);
            fd.append('email',email);
            fd.append('pos_id',pos_id);
            //fd.append('username',username);
            //fd.append('duname', duname);
            //fd.append('dpass', dpass);
            
            fd.append('_token', "<?php echo e(csrf_token()); ?>");
            if (willDelete) {
                swal("Assigning successfully!", {
                    icon: "success",

                });
                setTimeout(function(){
                   $.ajax({
                    url: "<?php echo e(route('AddUser')); ?>",
                    type:'POST',
                    processData:false,
                    contentType:false,
                    cache:false,
                    data: fd,
                    success:function(data)
                    {
                        $('#defusername').val(data.username);
                        $('#defpassword').val("User1234");

                        $('#show_default').modal('show')
                                //location.reload();
                            } ,
                            error: function(error)
                            {
                                console.error(error);
                            }  
                        })
               });
            } 
            else 
            {
                swal("Operation Cancelled.", {
                    icon: "error",
                });
            }
        });
        $('#close_modal').click(function() {
            location.reload();
        });



    }
    
});

    $("#assignbtn").on('click',function (e) {
        e.preventDefault();



        var start_term = $('#aStartTermTxt').val();
        var end_term = $('#aEndTermTxt').val();
        var pos_id = $('#aBarangayPositionTxt').children(":selected").attr("id");
        var res_id = $('#aBarangayPosIDTxt').val();
        var email  = $('#aEmailTxt').val();
        var employee_number = $('#aEmpNum').val();




        if( $('#afullname').text()  == "" || email == "" || start_term =="" || end_term =="")
        {
        // $('#ReqBarangayOfficialNameTxt').html('Required field!').css('color', 'red');
        $('#aReqEmail').html('Required field!').css('color', 'red');
        $('#aReqStartTermTxt').html('Required field!').css('color', 'red');

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
        // var defpassword = Math.random().toString(36).substr(2, 10);
        // var defusername = Math.random().toString(10).substr(2, 2);
        var fd = new FormData();
        swal({
            title: "Wait!",
            text: "Are you sure you want to assign "+ $('#afullname').text() +" as "+ $("#aBarangayPositionTxt").find(':selected').text() + "?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            fd.append('res_id',res_id);
            fd.append('start_term',start_term);
            fd.append('end_term',end_term);
            fd.append('email',email);
            fd.append('pos_id',pos_id);
            fd.append('employee_number',employee_number);
            
            fd.append('_token', "<?php echo e(csrf_token()); ?>");
            if (willDelete) {
                swal("Assigning successfully!", {
                    icon: "success",

                });
                setTimeout(function(){
                   $.ajax({
                    url: "<?php echo e(route('AddUser')); ?>",
                    type:'POST',
                    processData:false,
                    contentType:false,
                    cache:false,
                    data: fd,
                    success:function(data)
                    {
                        $('#defusername').val(data.username);
                        $('#defpassword').val(employee_number);
                        $('#show_default').modal('show')
                                //location.reload();
                            } ,
                            error: function(error)
                            {
                                console.error(error);
                            }  
                        })
               });
            } 
            else 
            {
                swal("Operation Cancelled.", {
                    icon: "error",
                });
            }
        });
        


    }
    
    $(document).on('click','#close_modal',function() {
            
            location.reload();
        }); 
});

    var fullname = "", resident_id = "";
    
    $(document).on('click','.search_btn',function() {
        
        $('.list-of-residents').remove();
        var searchval = $('#stext').val();
        var faddress = "";
        var profilepic = "";
        $.ajax({
            url: "<?php echo e(route('ResidentsSearch')); ?>",
            type: "post",
            dataType:'json',
            data: { searchval: searchval, _token: "<?php echo e(csrf_token()); ?>" },
            async:false,
            success:function(data)
            {

               
                if(data.length > 0) {
                    data.map( value => {
                        value['listofresidents'].map( residents => {
                            fullname = residents['FULLNAME'];
                            profilepic = residents['PROFILE_PICTURE'];
                            image = 'background-image:url("<?php echo e(asset("upload/residentspics/")); ?>/'+profilepic+'")';
                            resident_id = residents['RESIDENT_ID'];
                            residents['FULL_ADDRESS'] == null ? faddress = "" : faddress = residents['FULL_ADDRESS']
                           $('.result-list').append(
                            '<li class="list-of-residents">\n'

                            +'<a href="#" class="result-image"></a>\n'

                            +'<div class="result-info">\n'
                                +'<h4 class="title"><a href="javascript:;">'+residents['FULLNAME']+'</a></h4>\n'
                                +'<p class="location" style="font-size: 20px; color: black;">Birth details: <h>'+residents['PLACE_OF_BIRTH']+', '+residents['DATE_OF_BIRTH']+'</h></p>\n'
                                +'<p class="desc" style="font-size: 20pxpx">'+faddress+'</p>\n'
                                 +'<button data-toggle="modal" data-target="#show_assigning" class="btn btn-yellow btn-block" id="ab_btn">Assign as Barangay Official</button>\n'
                            +'</div>\n'

                            // +'<div class="result-price" >Resident\n'
                           
                            // +'</div>\n'
                            +'</li>'
                            );

                       })
                    });
                }
                
                
                
            }
            ,
            error:function(error)
            {
                console.log(error)
            }

        });
        
        $('.result-image').attr('style',image);

    });

    $(document).on('click','#ab_btn',function() {
        $('#afullname').text(fullname);
        $('#aBarangayPosIDTxt').val(resident_id);

    });
</script>



<script type="text/javascript">


    $(document).ready(function()
    {

        $("input[type='checkbox']").change(function()
        {

            if($(this).is(':checked'))
            {


                $.ajax(
                {
                    url:'CheckPermission',
                    type:'post',
                    data:{
                        '_token':'<?php echo e(csrf_token()); ?>',
                        'PermissionName':$(this).val(),
                        'BarangayOfficialID':$(this).closest("tbody tr").find("th:eq(0)").html(),
                        'CheckboxStatus':'Checked'
                    },

                    success:function(){}
                })

            }
            else
            {   
                $.ajax(
                {
                    url:'CheckPermission',
                    type:'post',
                    data:{'_token':'<?php echo e(csrf_token()); ?>',
                    'PermissionName':$(this).val(),
                    'BarangayOfficialID':$(this).closest("tbody tr").find("th:eq(0)").html(),
                    'CheckboxStatus':'unchecked'},
                    success:function()
                    {

                    }
                })
            }
        })
    })



</script>

<script type="text/javascript">
    $(document).ready(function()
    {
        $(".viewCategory").click(function()
        {
            $("#ViewBarangayName").text($(this).closest("tbody tr").find("td:eq(1)").html());
            $("#ViewBarangaySeal").attr('src','upload/barangay/'+$(this).closest("tbody tr").find("td:eq(2)").html());
        });
    });
</script>


<script type="text/javascript">
    $(document).ready(function()
    {
        $(".editCategory").click(function()
        {   
            $("#PositionIDTxt").val($(this).closest("tbody tr").find("td:eq(0)").html());
            $("#SetFormHeader").text($(this).closest("tbody tr").find("td:eq(1)").html());
            $("#PositionNameTxt").val($(this).closest("tbody tr").find("td:eq(1)").html());


        });


        $("#StartTermTxt").datetimepicker({format: 'YYYY-mm-DD'}).on('dp.change',function(selectedDate)
        {

            StartTerm= new Date(selectedDate.date);

            StartTermMonth=StartTerm.getMonth()+1;
            FormattedStartTerm=StartTerm.getFullYear()+'-'+StartTermMonth+'-'+StartTerm.getDate();
            FormattedEndTerm=StartTerm.getFullYear()+3+'-'+StartTermMonth+'-'+StartTerm.getDate();
                        // $("#EndTermTxt").val(StartTerm.getFullYear()+3+'-'+StartTerm.getMonth()+2+'-'+StartTerm.getDate());
                        $("#EndTermMaskTxt").datetimepicker({format: 'YYYY-mm-DD'});
                        $("#StartTermTxt").val(FormattedStartTerm);

                        $("#EndTermMaskTxt").val(FormattedEndTerm);

                        $("#EndTermTxt").val(FormattedEndTerm);

                    })

        $("#aStartTermTxt").datetimepicker({format: 'YYYY-mm-DD'}).on('dp.change',function(selectedDate)
        {

            StartTerm= new Date(selectedDate.date);

            StartTermMonth=StartTerm.getMonth()+1;
            FormattedStartTerm=StartTerm.getFullYear()+'-'+StartTermMonth+'-'+StartTerm.getDate();
            FormattedEndTerm=StartTerm.getFullYear()+3+'-'+StartTermMonth+'-'+StartTerm.getDate();
                        // $("#EndTermTxt").val(StartTerm.getFullYear()+3+'-'+StartTerm.getMonth()+2+'-'+StartTerm.getDate());
                        $("#aEndTermMaskTxt").datetimepicker({format: 'YYYY-mm-DD'});
                        $("#aStartTermTxt").val(FormattedStartTerm);

                        $("#aEndTermMaskTxt").val(FormattedEndTerm);

                        $("#aEndTermTxt").val(FormattedEndTerm);

                    })


    });


</script>
<script type="text/javascript">


    function GetStatus(status,id)
    {   
        $.ajax({

            url:'SetAccountStatus',
            type:'post',
            data:{'Status':status,'_token':'<?php echo e(csrf_token()); ?>','UserID':id
        },
        success:function(data)
        {
            location.reload();


        }
    })
    }



    $("#BarangayPositionTxt").change(function()
    {

        $("#BarangayPosIDTxt").val($(this).find(':selected').val());
        $("#BarangayPosTxt").val($(this).find(':selected').text());



    })


</script>


<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>



<!-- panel-add-user-start -->
<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="javascript:;">Administration</a></li>


        <li class="breadcrumb-item active">User Accounts</li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Administration  <small> Configurations required by the system.</small></h1>
    <!-- end page-header -->
    <br><br><br><div class="row">
        <!-- begin col-12 -->
        <div class="col-md-12">
            <!-- begin result-container -->
            <div class="result-container">
                <div class="input-group input-group-lg m-b-20">
                    
                    <div class="input-group-append">
                        <a href="<?php echo e(route('AddNewUser')); ?>" class="btn btn-lime addnew_btn"><i class="fa fa-plus fa-fw"></i> Add New</a>


                    </div>
                </div>
                <!-- begin input-group -->
                <div class="input-group input-group-lg m-b-20">
                    <input type="text" class="form-control input-white" placeholder="Search Resident/Inhabitant" id="stext"/>
                    <div class="input-group-append">
                        <button class="btn btn-primary search_btn"><i class="fa fa-search fa-fw"></i> Search</button>

                        
                    </div>
                </div>
                <!-- end input-group -->
                <!-- begin dropdown -->
                

                <br>
                <div class="clear_search">
                    <ul class="result-list">


                    </ul>

                </div>

                <!-- end result-list -->
                <!-- begin pagination -->
                <div class="clearfix m-t-20">
                    <ul class="pagination pull-right">
                        <li class="disabled"><a href="javascript:;" class="page-link">«</a></li>
                        <li class="active"><a href="javascript:;" class="page-link">1</a></li>
                        <li class="page-item"><a href="javascript:;" class="page-link">2</a></li>
                        <li class="page-item"><a href="javascript:;" class="page-link">3</a></li>
                        <li class="page-item"><a href="javascript:;" class="page-link">4</a></li>
                        <li class="page-item"><a href="javascript:;" class="page-link">5</a></li>
                        <li class="page-item"><a href="javascript:;" class="page-link">6</a></li>
                        <li class="page-item"><a href="javascript:;" class="page-link">7</a></li>
                        <li class="page-item"><a href="javascript:;" class="page-link">»</a></li>
                    </ul>
                </div>
                <!-- end pagination -->
            </div>
            <!-- end result-container -->
        </div>
        <!-- end col-12 -->
    </div>
    <!-- begin row -->
    <div >

        <!-- begin col-10 -->
        <div>
            <!-- begin panel -->
            
            </form>

        </div>

        <!-- #modal-SET -->




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

<!-- panel-add-user-end -->








<!-- panel-user-accounts-start -->
<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">




    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->

    <!-- end page-header -->

    <!-- begin row -->
    <div >

        <!-- begin col-10 -->
        <div>
            <!-- begin panel -->
            
        <!-- end panel -->
    </div>
    <!-- end col-10 -->
</div>

<!-- end row -->
</div>

<!-- end #content -->
<div class="modal fade" id="show_addnew" data-backdrop="static">
    <div class="modal-dialog" style="max-width: 50%">

        <div class="modal-content">
            <div class="modal-header" style="background-color: #6c9738">
                <h4 class="modal-title" style="color: white">ADD NEW USER OR OFFICIAL</h4>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white">×</button> -->
            </div>
            <div class="modal-body">
                <form >
                    <?php echo e(csrf_field()); ?>

                    
                    <div class="note note-warning note-with-right-icon">
                      <div class="note-icon"><i class="fa fa-lightbulb"></i></div>
                      <div class="note-content text-center">
                        <h4><b>&nbsp&nbsp&nbsp&nbsp&nbspNote!</b></h4>
                        <p>&nbsp&nbspADD NEW REGISTRY OF BARANGAY IHABITANT RECORD. </p>
                      </div>
                    </div>
                    
                    <br>
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="stats-content">
                                <label for="bfirstname">&nbspResident Name<span class="text-danger">*</span></label> <span id="lblfirstname"></span>
                                <input class="form-control" id="alname" name="alname" placeholder="Lastname" style="text-transform: uppercase;" />

                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="stats-content">
                                <label for="middlename">&nbsp</label><span id="lblmiddlename"></span>

                                <input class="form-control" id="afname" name="afname" placeholder="FirstName" style="text-transform: uppercase;" />
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="stats-content">
                                <label for="lastname">&nbsp</label><span id="lbllastname"></span>

                                <input class="form-control" id="amname" name="amname" placeholder="MiddleName" style="text-transform: uppercase;"/>

                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <label style="display: block; text-align: left">&nbsp</label>
                            <input type="text" id="aqname" placeholder="Qualifier" name="aqname" style="display: block; text-align: left; color:black; background-color:white; text-transform: uppercase;" class="form-control">
                        </div>

                    </div> <br>
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <label >&nbspGender </label><br>
                            <div class="radio radio-css radio-inline">
                                <input type="radio" name="agender" id="radiogenderm" value="Male" checked />
                                <label for="radiogenderm">Male</label>
                            </div> <br>

                            <div class="radio radio-css radio-inline">
                                <input type="radio" name="agender" id="radiogenderf" />
                                <label for="radiogenderf" value="Female">Female</label>
                            </div>
                        </div>

                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="stats-content">
                                <label class=" col-form-label text-md-left">&nbspAddress<span class="text-danger">*</span></label>
                                <input type="number" name="ahouseno" id="ahouseno" placeholder="House No.*" class="form-control" style="text-transform: capitalize;"/>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="stats-content">
                                <label class="col-md-3 col-form-label text-md-right">&nbsp</label>
                                <input type="text" name="astreet_no" id="astreet_no" placeholder="Street No" class="form-control"  style="text-transform: capitalize;"/>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="stats-content">
                                <label class="col-md-3 col-form-label text-md-right">&nbsp</label>
                                <input type="text" name="astreet" id="astreet" placeholder="Street" class="form-control"  style="text-transform: capitalize;"/>
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="stats-content">
                                                <label class="col-form-label text-md-right">&nbspOptional</label>
                                                <input type="text" name="abuilding" id="ahbuilding" placeholder="Building" class="form-control" style="text-transform: capitalize;"/>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="stats-content">
                                                <label class="col-md-3 col-form-label text-md-right">&nbsp</label>
                                                <input type="text" name="ahunitno" id="ahunitno" placeholder="Unit No." class="form-control" style="text-transform: capitalize;"/>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="stats-content">
                                                <label class="col-md-3 col-form-label text-md-right">&nbsp</label>

                                                <input type="text" name="ahsubdivision" id="ahsubdivision" placeholder="Subdivision" class="form-control" style="text-transform: capitalize;"/>
                                            </div>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row">
                                       <div class="col-lg-4 col-md-6">
                                        <label style="display: block; text-align: left">&nbspBirth Date</label>
                                        <input type="date" id="abdate" name="abdate" class="form-control" data-parsley-required="true" />
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <label style="display: block; text-align: left">&nbspPlace of Birth</label>
                                        <input type="text" id="apbirth" name="apbirth" class="form-control" data-parsley-required="true" style="text-transform: capitalize;" />
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <label style="display: block; text-align: left">&nbspCivil Status</label>

                                        <select class="form-control" data-style="btn-lime" id="editcstatus" name="editcstatus">
                                            <option value="Single" selected>Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Separated">Separated</option>
                                            <option value="Widow">Widow</option>
                                            <option value="Divorced">Divorced</option>
                                            <option value="Annulled">Annulled</option>
                                            <option value="Widower">Widower</option>
                                            <option value="Single Parent">Single Parent</option>
                                        </select>
                                    </div>

                                </div>
                                <br>
                                <div class="row">

                                 <div class="col-lg-4 col-md-6">
                                    <label style="display: block; text-align: left">&nbspOccupation</label>
                                    <input type="text" id="aoccu" name="aoccu" style="display: block; text-align: left; color:black; background-color:white; text-transform: capitalize;" class="form-control">
                                </div>
                                 <div class="col-lg-4 col-md-6">
                                <label style="display: block; text-align: left">&nbspCitizenship</label>
                                <input type="text" id="acitiz" name="acitiz" class="form-control" required style="text-transform: capitalize;" />
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <label style="display: block; text-align: left">&nbspRelation to HouseHold Head</label>
                                <input type="text" id="ahead" name="ahead" class="form-control" required style="text-transform: capitalize;"/>
                            </div>
                            </div><br>
                           




                    <div class="modal-footer" align="center">
                        <a href="javascript:;" class="btn btn-lime" style="background-color: #6c9738" data-dismiss="modal" id="anewbtn" name="anewbtn">Assign</a>
                        <a href="javascript:;" class="btn btn-white" data-dismiss="modal" id="close_modal" name="close_modal">Close</a>

                    </div>
                </form>
            </div>

        </div>
    </div>
    <!-- end tab-pane -->
</div>

<div class="modal fade" id="show_default" data-backdrop="static">
    <div class="modal-dialog" style="max-width: 50%">

        <div class="modal-content">
            <div class="modal-header" style="background-color: #242a30">
                <h4 class="modal-title" style="color: white">DEFAULT USERNAME AND PASSWORD</h4>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white">×</button> -->
            </div>
            <div class="modal-body">

                <form >
                    <div class="note note-warning note-with-right-icon">
                      <div class="note-icon"><i class="fa fa-lightbulb"></i></div>
                      <div class="note-content text-center">
                        <h4><b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspNOTE!</b></h4>
                        <p>&nbsp&nbspPLEASE NOTE YOUR DEFAULT USERNAME AND PASSWORD </p>
                      </div>
                    </div>
                    
                    <br>
                    <?php echo e(csrf_field()); ?>

                    <h4><label style="display: block; text-align: center">Notice</label></h4>
                    <h3><b><label style="text-transform: capitalize; display: block; text-align: center;" ></label></b></h3>
                    <br>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <h><label style="display: block; text-align: center">&nbspUsername</label></h>
                            <input style="display: block; text-align: center; background-color: white;color: black;font-size: 20px" type='text' class='form-control' id="defusername" readonly/>
                        </div>
                    </div>


                    <div class="col-lg-12">
                        <div class="form-group">
                            <h><label style="display: block; text-align: center">&nbspPassword</label></h>
                            <input style="display: block; text-align: center; background-color: white;color: black;font-size: 20px" type="text" class='form-control' id="defpassword" readonly />
                        </div>
                    </div>

                    <div class="modal-footer" align="center">
                        <a href="javascript:;" class="btn btn-white" data-dismiss="modal" id="close_modal" name="close_modal">Close</a>

                    </div>
                </form>
            </div>

        </div>
    </div>
    <!-- end tab-pane -->
</div>
<div class="modal fade" id="show_assigning" data-backdrop="static">
    <div class="modal-dialog" style="max-width: 50%">

        <div class="modal-content">
            <div class="modal-header" style="background-color: #ffd900">
                <h4 class="modal-title" style="color: black">ASSIGN BARANGAY OFFICIAL</h4>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white">×</button> -->
            </div>
            <div class="modal-body">
                <form >
                    <?php echo e(csrf_field()); ?>

                    <h4><label style="display: block; text-align: center">Name</label></h4>
                    <h3><b><label style="text-transform: capitalize; display: block; text-align: center;" id="afullname"></label></b></h3>
                    <br>
                    <div class="row ">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>&nbsp&nbspBarangay Position</label> <span id='ReqBarangayPosTxt'></span>

                                <input type="text" id="aBarangayPosIDTxt" name="aBarangayPosIDTxt" hidden>
                                <select class="form-control form-control-lg"  name="aBarangayPositionTxt" id="aBarangayPositionTxt" placeholder="####"  required="true"  data-style="btn-lime" id="BarangayName">
                                    <option value="null"><--Select Position--></option>
                                        <?php $__currentLoopData = $DisplayBarangayPosition; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <option id="<?php echo e($value->POSITION_ID); ?>"><?php echo e($value->POSITION_NAME); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-6" >
                                <div class="form-group">
                                    <label>Email</label> <span id='aReqEmail'></span>
                                    <input type="email" name="aEmailTxt" id="aEmailTxt" placeholder="E.G.:example@gmail.com" class="form-control form-control-lg" data-parsley-type="email" data-parsley-required="true" />
                                </div>
                            </div>

                        </div>

                        <div class="row ">
                            <div class="col-md-6">
                               <div class="form-group " >
                                   <label >Start Term</label>
                                   <span id='aReqStartTermTxt'></span>

                                   <div class="input-group date" id="datetimepicker">
                                    <input type="text" class="form-control form-control-lg" id="aStartTermTxt" name="aStartTermTxt" />
                                    <div class="input-group-addon" id="aStartTermIcon" >

                                        <i class="fa fa-calendar"></i>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group ">
                                <label >End Term</label>
                                <span id='aReqEndTermTxt'></span>

                                <div class="input-group date" id="datetimepicker">
                                    <input type="text" class="form-control" id="aEndTermTxt" name="aEndTermTxt" hidden />
                                    <input type="text" class="form-control form-control-lg" id="aEndTermMaskTxt" name="aEndTermMaskTxt" readonly />
                                    <div class="input-group-addon" id="aEndTermIcon" >
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" >
                                <div class="form-group">
                                    <label>Employee Number</label> <span id='aLblEmpNum'></span>
                                    <input type="text" name="aEmpNum" id="aEmpNum" placeholder="XX-XXXXXXX / 27-1544126" class="form-control form-control-lg"/>
                                </div>
                            </div>
                    </div>

                    <div class="modal-footer" align="center">
                       <a href="javascript:;" class="btn btn-yellow" style="color: black" data-dismiss="modal" id="assignbtn" name="assignbtn">Assign</a>
                       <a href="javascript:;" class="btn btn-white aclose_modal" data-dismiss="modal" >Close</a>

                   </div>
               </form>
           </div>

       </div>
   </div>
   <!-- end tab-pane -->
</div>
<!-- end 
    <!-- panel-user-accounts-end -->

    <!-- panel-permission-start -->
    <div id="content" class="content">
        <!-- begin breadcrumb -->

        <!-- end breadcrumb -->
        <!-- begin page-header -->

        <!-- end page-header -->

        <!-- begin row -->
        <div >

            <!-- begin col-10 -->
            <div>
                <!-- begin panel -->
                <div class="panel panel-inverse" >
                    <!-- begin panel-heading -->
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>

                        </div>
                        <h4 class="panel-title">Permissions</h4>
                    </div>
                    <!-- end panel-heading -->
                    <!-- begin alert -->
                    <div class="alert alert-yellow fade show">
                        <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        Permissions per barangay officials account.
                    </div>
                    <!-- end alert -->
                    <!-- begin panel-body -->
                    <div class="panel-body "  style="overflow-x:auto;">

                       <!-- PERMISSION TABLE -->
                       <table id="permision" class="table table-striped" cellspacing="0" width="100%" >

                        <thead>
                            <tr>
                                <th hidden>Barangay ID </th>



                                <th align="center">Position</th> 

                                <th align="center">Resident Basic Info </th>
                                <th align="center">Family Profile </th>
                                
                                
                                
                                <th align="center">Ordinances</th>
                                <th align="center">Blotter</th>
                                <th align="center">Patawag </th>
                                <th align="center">System Reports </th>
                                <th align="center">Health Services </th>
                               
                                <th align="center">Data Migration</th>
                                
                                
                                <th align="center">Businesses Registration</th>
                                <th align="center">Businesses Approval</th>
                                <th align="center">Permit / Certification / Clearance</th>
                                <th align="center">PCC Evaluation</th>
                                
                            </tr>
                        </thead>

                        <tbody>
                            <?php $__currentLoopData = $DisplayPermission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $__currentLoopData = $DisplayData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <?php if($Value->POSITION_NAME == $Item->POSITION_NAME): ?>

                            <tr>
                                <th id="PermisBarangayOfficialID"  hidden ><?php echo e($Item->BARANGAY_OFFICIAL_ID); ?> </th>

                                <td ><?php echo e($Value->FULLNAME); ?> <?php echo e($Value->POSITION_NAME); ?></td> 

                                <td >
                                    <div class="checkbox checkbox-css">
                                        <input type="checkbox" id="BasicInfoCkbox<?php echo e($Item->BARANGAY_OFFICIAL_ID); ?>" value="BI" 
                                        <?php echo e($Item->PERMIS_RESIDENT_BASIC_INFO ==1? 'checked':''); ?>  />
                                        <label for="BasicInfoCkbox<?php echo e($Item->BARANGAY_OFFICIAL_ID); ?>"></label>
                                    </div>
                                </td>
                                <td >
                                    <div class="checkbox checkbox-css">
                                        <input type="checkbox" id="FamilyProfileCkbox<?php echo e($Item->BARANGAY_OFFICIAL_ID); ?>" value="FP"  
                                        <?php echo e($Item->PERMIS_FAMILY_PROFILE==1? 'checked':''); ?> />
                                        <label for="FamilyProfileCkbox<?php echo e($Item->BARANGAY_OFFICIAL_ID); ?>"></label>
                                    </div>  
                                </td>
                                
                                <td >
                                    <div class="checkbox checkbox-css">
                                        <input type="checkbox" id="Ordinances<?php echo e($Item->BARANGAY_OFFICIAL_ID); ?>" value="O"
                                        <?php echo e($Item->PERMIS_ORDINANCES==1? 'checked':''); ?>  />
                                        <label for="Ordinances<?php echo e($Item->BARANGAY_OFFICIAL_ID); ?>"></label>
                                    </div>
                                </td> 
                                <td >
                                    <div class="checkbox checkbox-css">
                                        <input type="checkbox" id="Blotter<?php echo e($Item->BARANGAY_OFFICIAL_ID); ?>"  value="Blot"
                                        <?php echo e($Item->PERMIS_BLOTTER==1? 'checked':''); ?> />
                                        <label for="Blotter<?php echo e($Item->BARANGAY_OFFICIAL_ID); ?>"></label>
                                    </div>
                                </td> 
                                <td >
                                    <div class="checkbox checkbox-css">
                                        <input type="checkbox" id="Patawag<?php echo e($Item->BARANGAY_OFFICIAL_ID); ?>" value="P"
                                        <?php echo e($Item->PERMIS_PATAWAG==1? 'checked':''); ?>  />
                                        <label for="Patawag<?php echo e($Item->BARANGAY_OFFICIAL_ID); ?>"></label>
                                    </div>
                                </td> 
                                <td >
                                    <div class="checkbox checkbox-css">
                                        <input type="checkbox" id="SystemReports<?php echo e($Item->BARANGAY_OFFICIAL_ID); ?>"  value="SR" 
                                        <?php echo e($Item->PERMIS_SYSTEM_REPORT==1? 'checked':''); ?>  />
                                        <label for="SystemReports<?php echo e($Item->BARANGAY_OFFICIAL_ID); ?>"></label>
                                    </div>
                                </td> 
                                <td >
                                    <div class="checkbox checkbox-css">
                                        <input type="checkbox" id="HealthServices<?php echo e($Item->BARANGAY_OFFICIAL_ID); ?>" value="HS"
                                        <?php echo e($Item->PERMIS_HEALTH_SERVICES==1? 'checked':''); ?>  />
                                        <label for="HealthServices<?php echo e($Item->BARANGAY_OFFICIAL_ID); ?>"></label>
                                    </div>
                                </td> 
                                <td >
                                    <div class="checkbox checkbox-css">
                                        <input type="checkbox" id="DataMigration<?php echo e($Item->BARANGAY_OFFICIAL_ID); ?>" value="DM" 
                                        <?php echo e($Item->PERMIS_DATA_MIGRATION==1? 'checked':''); ?>  />
                                        <label for="DataMigration<?php echo e($Item->BARANGAY_OFFICIAL_ID); ?>"></label>
                                    </div>
                                </td>
                                 
                                

                                <td >
                                    <div class="checkbox checkbox-css">
                                        <input type="checkbox" id="Businessess<?php echo e($Item->BARANGAY_OFFICIAL_ID); ?>" value="B"
                                        <?php echo e($Item->PERMIS_BUSINESSES==1? 'checked':''); ?>  />
                                        <label for="Businessess<?php echo e($Item->BARANGAY_OFFICIAL_ID); ?>"></label>
                                    </div>
                                </td> 

                                <td>
                                    <div class="checkbox checkbox-css">
                                        <input type="checkbox" id="BusinessApproval<?php echo e($Item->BARANGAY_OFFICIAL_ID); ?>"  value="BA"  
                                        <?php echo e($Item->PERMIS_BUSINESS_APPROVAL==1? 'checked':''); ?>  />
                                        <label for="BusinessApproval<?php echo e($Item->BARANGAY_OFFICIAL_ID); ?>"></label>
                                    </div>
                                </td>

                                <td >
                                    <div class="checkbox checkbox-css">
                                        <input type="checkbox" id="ApplicationForm<?php echo e($Item->BARANGAY_OFFICIAL_ID); ?>" value="AF"
                                        <?php echo e($Item->PERMIS_APPLICATION_FORM == 1 ? 'checked':''); ?>  />
                                        <label for="ApplicationForm<?php echo e($Item->BARANGAY_OFFICIAL_ID); ?>"></label>
                                    </div>
                                </td> 

                                <td>
                                    <div class="checkbox checkbox-css">
                                        <input type="checkbox" id="ApplicationEvaluation<?php echo e($Item->BARANGAY_OFFICIAL_ID); ?>"  value="AE"  
                                        <?php echo e($Item->PERMIS_APPLICATION_FORM_EVALUATION == 1 ? 'checked':''); ?>  />
                                        <label for="ApplicationEvaluation<?php echo e($Item->BARANGAY_OFFICIAL_ID); ?>"></label>
                                    </div>
                                </td>

                            </tr>

                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>

                    <!-- PERMISSION TABLE END -->
                </div>
                <!-- end panel-body -->
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-10 -->
    </div>

    <!-- end row -->
</div>


<!-- panel-permission-end -->



<?php $__env->stopSection(); ?>
<?php echo $__env->make('global.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\BITBO_INSTALLER\4. BITBo\www\resources\views/administration/useraccounts.blade.php ENDPATH**/ ?>