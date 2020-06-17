<?php $__env->startSection('title', "Children's Profile"); ?>

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
    Notification.init();
    $('#data-table-default-1').DataTable();
  });


</script>


<script type="text/javascript">

 var table = $("#data-table-default").DataTable({
  serverSide: true,
  processing: true,    
  ajax:"<?php echo e(route('LoadChildren')); ?>",

  columns:
  [  
  { data: "RESIDENT_ID", name: "RESIDENT_ID", visible: false, searchable: false},
  { data: "FULLNAME", name: "FULLNAME"},
  { data: "SEX", name: "SEX"},

  {render:function(data, type, full, meta) {
      
    return "<button type='button' class='btn btn-success  add_profile_btn'  onClick=\"GoToTab('" + full.FULLNAME+"',"+ full.RESIDENT_ID+")\"  ><i class='fa fa-plus'></i> Add Profile</button>";

  }, searchable: false}, 
  ]
});

</script>

<script type="text/javascript">
  function GoToTab(name,id){

    $("#pill3_btn").click();
  }
  
  $('#edit-btn').click(function () {

    //Accordion #1
    var resident_id = $('#resident_id').val();
    var isregistered =  $('input:radio[name=cisregistered]:checked').val();
    var bornat =  $('input:radio[name=cbornat]:checked').val();
    
    var height = $('#cheight').val();
    var weight = $('#cweights').val();
    var brtorder = $('#cbrthorder').val();
    var mtongue = $('input:radio[name=cmtongue]:checked').val();
    var m_others = $('#cm_others').val();
    var ceccd, cmcbook;
    var cddothers = $('#cddothers').val();
   
    if ($("#ceccd").is(":checked")){ ceccd = 1; } else if ($("#ceccd").is(":not(:checked)")) { ceccd = 0; }
    if ($("#cmcbook").is(":checked")){ cmcbook = 1; } else if ($("#cmcbook").is(":not(:checked)")) { cmcbook = 0; }

    //Accordion #2
    
    var cbcg = $('input:radio[name=cbcg]:checked').val();
    var cdpt = $('input:radio[name=cdpt]:checked').val();
    var cpolio = $('input:radio[name=cpolio]:checked').val();
    var chepab = $('input:radio[name=chepab]:checked').val();
    var cmeasles = $('input:radio[name=cmeasles]:checked').val();
    var cmeaslesthers = $('#cmeaslesthers').val();
   



    //Accordion #3 
    var chlip, cdleg, cdarm, crossseyed, cdeaf, cftoes, cbehavior, cspeaking, chearing, cvision, cblind;
    var clefthanded = $('input:radio[name=clefthanded]:checked').val();
  
    if ($("#chlip").is(":checked")){ chlip = 1; } else if ($("#chlip").is(":not(:checked)")) { chlip = 0; }
    if ($("#cdleg").is(":checked")){ cdleg = 1; } else if ($("#cdleg").is(":not(:checked)")) { cdleg = 0; }
    if ($("#cdarm").is(":checked")){ cdarm = 1; } else if ($("#cdarm").is(":not(:checked)")) { cdarm = 0; }
    if ($("#crossseyed").is(":checked")){ crossseyed = 1; } else if ($("#crossseyed").is(":not(:checked)")) { crossseyed = 0; }
    if ($("#cdeaf").is(":checked")){ cdeaf = 1; } else if ($("#cdeaf").is(":not(:checked)")) { cdeaf = 0; }
    if ($("#cblind").is(":checked")){ cblind = 1; } else if ($("#cblind").is(":not(:checked)")) { cblind = 0; }
    if ($("#cftoes").is(":checked")){ cftoes = 1; } else if ($("#cftoes").is(":not(:checked)")) { cftoes = 0; }
    if ($("#cbehavior").is(":checked")){ cbehavior = 1; } else if ($("#cbehavior").is(":not(:checked)")) { cbehavior = 0; }
    if ($("#cspeaking").is(":checked")){ cspeaking = 1; } else if ($("#cspeaking").is(":not(:checked)")) { cspeaking = 0; }
    if ($("#chearing").is(":checked")){ chearing = 1; } else if ($("#chearing").is(":not(:checked)")) { chearing = 0; }
    if ($("#cvision").is(":checked")){ cvision = 1; } else if ($("#cvision").is(":not(:checked)")) { cvision = 0; }

   

    //Accordion #4
    var cnursery, ckinder, cprepa;
    var clearsat = $('input:radio[name=clearsat]:checked').val();
    var l_others = $('#l_others').val();


    if ($("#cnursery").is(":checked")){ cnursery = 1; } else if ($("#cnursery").is(":not(:checked)")) { cnursery = 0; }
    if ($("#ckinder").is(":checked")){ ckinder = 1; } else if ($("#ckinder").is(":not(:checked)")) { ckinder = 0; }
    if ($("#cprepa").is(":checked")){ cprepa = 1; } else if ($("#cprepa").is(":not(:checked)")) { cprepa = 0; }


    
    


    var cnbody, cmfboth, csiblings, crela, cmaid, ctutor, p_older, p_younger, p_age;
    if ($("#cnbody").is(":checked")){ cnbody = 1; } else if ($("#cnbody").is(":not(:checked)")) { cnbody = 0; }
    if ($("#cmfboth").is(":checked")){ cmfboth = 1; } else if ($("#cmfboth").is(":not(:checked)")) { cmfboth = 0; }
    if ($("#csiblings").is(":checked")){ csiblings = 1; } else if ($("#csiblings").is(":not(:checked)")) { csiblings = 0; }
    if ($("#crela").is(":checked")){ crela = 1; } else if ($("#crela").is(":not(:checked)")) { crela = 0; }
    if ($("#cmaid").is(":checked")){ cmaid = 1; } else if ($("#cmaid").is(":not(:checked)")) { cmaid = 0; }
    if ($("#ctutor").is(":checked")){ ctutor = 1; } else if ($("#ctutor").is(":not(:checked)")) { ctutor = 0; }
    if ($("#p_older").is(":checked")){ p_older = 1; } else if ($("#p_older").is(":not(:checked)")) { p_older = 0; }
    if ($("#p_younger").is(":checked")){ p_younger = 1; } else if ($("#p_younger").is(":not(:checked)")) { p_younger = 0; }
    if ($("#p_age").is(":checked")){ p_age = 1; } else if ($("#p_age").is(":not(:checked)")) { p_age = 0; }


     // Accordion #6
    var cmoney,cfood,cboth,cnone,chdontknow,cveggy,crice,ccereal,cpork,cnoodle,cfruitjuice,cchicken,csoup,cmilk,cbeef,cbread,cfish,cfruits;

    var ctdcc = $('#ctdcc').val();
    var cmdcc = $('#cmdcc').val();
    var tncdc = $('#tncdc').val();
    var cmncdc = $('#cmncdc').val();
    var cpublic = $('#cpublic').val();
    var ctransfare = $('#ctransfare').val();
    var cgowith = $('#cgowith').val();
    var cdevteacher = $('#cdevteacher').val();
    var ceatsmeals = $('input:radio[name=ceatsmeals]:checked').val();
    var cfoodeaten = $('input:radio[name=cfoodeaten]:checked').val();
    var chasbaon = $('input:radio[name=chasbaon]:checked').val();
    
    var fd = new FormData();
          // Accordion #1
    fd.append('resident_id', resident_id);
    fd.append('brtorder', brtorder);
    fd.append('isregistered', isregistered);
    fd.append('bornat', bornat);
    fd.append('mtongue', mtongue);
    fd.append('m_others', m_others);
    fd.append('height', height);
    fd.append('weight', weight );


    fd.append('ceccd', ceccd);
    fd.append('cmcbook', cmcbook);
    fd.append('cddothers', cddothers);

    // Accordion #2

    fd.append('cbcg', cbcg);
    fd.append('cdpt', cdpt);
    fd.append('cpolio', cpolio);
    fd.append('chepab', chepab);
    fd.append('cmeasles', cmeasles);
    fd.append('cmeaslesthers', cmeaslesthers);


    // Accordion #3
    fd.append('chlip', chlip);
    fd.append('cdleg', cdleg);
    fd.append('cdarm', cdarm);
    fd.append('crossseyed', crossseyed);
    fd.append('cdeaf', cdeaf);
    fd.append('cblind', cblind);
    fd.append('cftoes', cftoes);
    fd.append('cbehavior', cbehavior);
    fd.append('cspeaking', cspeaking);
    fd.append('chearing', chearing);
    fd.append('cvision', cvision);

     // Accordion #4
    fd.append('clefthanded', clefthanded);

    fd.append('cnursery', cnursery);
    fd.append('ckinder', ckinder);
    fd.append('cprepa', cprepa);

    fd.append('clearsat', clearsat);
    fd.append('l_others', l_others);
   

     // Accordion #5
   
    fd.append('cmfboth', cmfboth);
    fd.append('cnbody', cnbody);
    fd.append('csiblings', csiblings);
    fd.append('crela', crela);
    fd.append('cmaid', cmaid);
    fd.append('ctutor', ctutor);
    fd.append('p_older', p_older);
    fd.append('p_younger', p_younger);
    fd.append('p_age', p_age);

    //Accordion #6
    fd.append('ceatsmeals', ceatsmeals);
    fd.append('chasbaon', chasbaon);

    fd.append('ctdcc', ctdcc);
    fd.append('cmdcc', cmdcc);
    fd.append('tncdc', tncdc);
    fd.append('cmncdc', cmncdc);
    fd.append('cpublic', cpublic);
    fd.append('ctransfare', ctransfare);
    fd.append('cgowith', cgowith);
    fd.append('cdevteacher', cdevteacher);
   
  
    
    fd.append('_token',"<?php echo e(csrf_token()); ?>");
    
    Add(fd);

  });

  async function Add(fd) {
    swal("Data have been successfully Added!", {
      icon: "success",
    });

    let result;
    try
    {
      result = await $.ajax({
       url:"<?php echo e(route('ChildrensProfileAdd')); ?>",
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
 $("#data-table-default tbody").on('click', 'tr', function () {


  var fullname = table.cell( this, 1).data();  
  var resident_id = table.cell(this, 0).data();
  $('#resident_id').val(resident_id);
  $("#edit_db_name").text(fullname);
  


  // $('#edit_mother_id').val($(this).closest("tbody tr").find("td:eq(0)").html());
  // $('#editmtongue').val($(this).closest("tbody tr").find("td:eq(5)").html());
  // $('#editmdialect').val($(this).closest("tbody tr").find("td:eq(6)").html());
  // $('#editmeducationatt').val($(this).closest("tbody tr").find("td:eq(7)").html());
  // fd.append('cmoney', cmoney);
    // fd.append('cfood', cfood);
    // fd.append('cboth', cboth);
    // fd.append('cnone', cnone);
    // fd.append('chdontknow', chdontknow);
    // fd.append('cfoodeaten', cfoodeaten);
   // if ($("#cmoney").is(":checked")){ cmoney = 1; } else if ($("#cmoney").is(":not(:checked)")) { cmoney = 0; }
    // if ($("#cfood").is(":checked")){ cfood = 1; } else if ($("#cfood").is(":not(:checked)")) { cfood = 0; }
    // if ($("#cboth").is(":checked")){ cboth = 1; } else if ($("#cboth").is(":not(:checked)")) { cboth = 0; }
    // if ($("#cnone").is(":checked")){ cnone = 1; } else if ($("#cnone").is(":not(:checked)")) { cnone = 0; }
    // if ($("#chdontknow").is(":checked")){ chdontknow = 1; } else if ($("#chdontknow").is(":not(:checked)")) { chdontknow = 0; }
    // if ($("#cveggy").is(":checked")){ cveggy = 1; } else if ($("#cveggy").is(":not(:checked)")) { cveggy = 0; }
    // if ($("#crice").is(":checked")){ crice = 1; } else if ($("#crice").is(":not(:checked)")) { crice = 0; }
    // if ($("#ccereal").is(":checked")){ ccereal = 1; } else if ($("#ccereal").is(":not(:checked)")) { ccereal = 0; }
    // if ($("#cpork").is(":checked")){ cpork = 1; } else if ($("#cpork").is(":not(:checked)")) { cpork = 0; }
    // if ($("#cnoodle").is(":checked")){ cnoodle = 1; } else if ($("#cnoodle").is(":not(:checked)")) { cnoodle = 0; }
    // if ($("#cfruitjuice").is(":checked")){ cfruitjuice = 1; } else if ($("#cfruitjuice").is(":not(:checked)")) { cfruitjuice = 0; }
    // if ($("#cchicken").is(":checked")){ cchicken = 1; } else if ($("#cchicken").is(":not(:checked)")) { cchicken = 0; }
    // if ($("#csoup").is(":checked")){ csoup = 1; } else if ($("#csoup").is(":not(:checked)")) { csoup = 0; }
    // if ($("#cmilk").is(":checked")){ cmilk = 1; } else if ($("#cmilk").is(":not(:checked)")) { cmilk = 0; }
    // if ($("#cbeef").is(":checked")){ cbeef = 1; } else if ($("#cbeef").is(":not(:checked)")) { cbeef = 0; }
    // if ($("#cbread").is(":checked")){ cbread = 1; } else if ($("#cbread").is(":not(:checked)")) { cbread = 0; }
    // if ($("#cfish").is(":checked")){ cfish = 1; } else if ($("#cfish").is(":not(:checked)")) { cfish = 0; }
    // if ($("#cfruits").is(":checked")){ cfruits = 1; } else if ($("#cfruits").is(":not(:checked)")) { cfruits = 0; }
});
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
    <li class="nav-items">
      <a href="#nav-pills-tab-2" data-toggle="tab" class="nav-link" >

        <span class="d-sm-block d-none">List of Children</span>
      </a>
    </li>

    <li class="nav-items">
      <a href="#nav-pills-tab-3" data-toggle="tab"  id="pill3_btn" class="nav-link" hidden>

        <span class="d-sm-block d-none">List of Children</span>
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

          <table id="data-table-default-1" class="table table-striped table-bordered">
            
            <thead>
              <tr>
                <th hidden>Children ID </th>
                <th>Fullname</th>
                <th>Birth Order</th>
                <th>Birth Place</th>
                <th style="width: 15%">Actions </th>
              </tr>

            </thead>
            <tbody>

            </tbody>
          </table>  

        </div>
        <!-- end panel-body -->


      </div>
      <!-- end panel add new -->
      
    </div>
     <div class="tab-pane fade" id="nav-pills-tab-3">
      
      <!-- begin panel add new -->
      <div class="panel panel-inverse">
        <!-- begin panel-heading -->
        <div class="panel-heading">
          <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>

          </div>
          <h4 class="panel-title">Add Profile</h4>
        </div>
        <!-- end panel-heading -->
        <!-- begin alert -->
        <div class="alert alert-yellow fade show">
          <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span>
          </button>
          Add new profile for children.
        </div>

        <!-- end alert -->
        <!-- begin panel-body -->
        <div class="panel-body">
        <form id="AddForm" class="form-control-with-bg">
          <?php echo csrf_field(); ?>
           <h><label style="display: block; text-align: center">Residents's Name</label></h>
        <h3><b><label style="text-transform: capitalize; display: block; text-align: center" id="edit_db_name" name="edit_db_name"></label></b></h3>
        <br>
        <input id="resident_id" type="text" hidden="true" />
                    <!-- begin #accordion -->
          <div id="accordion" class="card-accordion">
            <!-- begin card -->
            <div class="card">
              <div class="card-header text-white pointer-cursor"  style="background-color: #7cb5ec" data-toggle="collapse" data-target="#collapseOne">
                 <h><label style="display: block; text-align: center; color: white">Children's Profile</label></h>
              </div>
              <div id="collapseOne" class="collapse show" data-parent="#accordion">
                <div class="card-body">
                 This includes information about the children.
                </div>
                <div class="row">
                 <div class="col-lg-5">
                  <label style="display: block; text-align: left;">&nbsp&nbsp&nbspIs registered?</label>
                  <div class=" col-md-6">
                    <div class="stats-content">

                     <div class="radio radio-css">
                      <input class="form-control" type="radio" name="cisregistered" id="cssIsregisteredYes" value=1 checked />
                      <label for="cssIsregisteredYes">Yes</label>
                      <div class="radio radio-css">
                        <input class="form-control" type="radio" name="cisregistered" id="cssIsregisteredNo" value=0 />
                        <label for="cssIsregisteredNo">No</label>
                      </div><br>
                    </div>
                  </div>
                </div>


              </div>
              <div class="col-lg-5">
                <label style="display: block; text-align: left">&nbsp&nbsp&nbspBorn at</label>
                <div class=" col-md-6">
                  <div class="stats-content">
                   <div class="radio radio-css">
                    <input type="radio" name="cbornat" id="chospital" value="Hospital" checked />
                    <label for="chospital">Hospital</label>
                  </div>
                  <div class="radio radio-css">
                    <input type="radio" name="cbornat" id="chservices" value="Health Center"  />
                    <label for="chservices">Health Center</label>
                  </div>
                  <div class="radio radio-css">
                    <input type="radio" name="cbornat" id="chome" value="Home" />
                    <label for="chome">Home</label>
                  </div><br>

                </div>
              </div>
            </div>   
              
            <div class="col-lg-2">
             <div class=" col-md-10">
              <label for="cheight">Height(cm)</label>
              <input type="number" class="form-control" name="cstats" id="cheight" /><br>

              <label for="cweights">Weight(kg)</label>
              <input type="number" class="form-control"  name="cstats" id="cweights" /><br>
              <label style="display: block; text-align: left">Birth Order</label>
              <div>
                <input class="form-control" type="number" max="15"  min="1" name="cbrthorder" id="cbrthorder" />

              </div> 
            </div>
          </div>
        </div> <br>

        <div class="row">
         <div class="col-lg-5">
          <label style="display: block; text-align: left">&nbsp&nbsp&nbspMother Tongue</label>
          <div class=" col-md-6">
            <div class="stats-content">
             <div class="radio radio-css">
              <input type="radio" name="cmtongue" id="ctagalog" value=1 checked />
              <label for="ctagalog">Tagalog</label>
            </div>
            <div class="radio radio-css">
              <input type="radio" name="cmtongue" id="cvisayan" value=0  />
              <label for="cvisayan">Visayan</label>
            </div>
            <div class="radio radio-css">
              <input type="radio" name="cmtongue" id="cilogo" value=0 />
              <label for="cilogo">Iloco</label>
            </div>
            <div class="radio radio-css">
              <input type="radio" name="cmtongue" id="cbicolnon" value=0 />
              <label for="cbicolnon">Bicolnon</label>
            </div><br>
            <div >
             <label for="cbicolnon">Others please specify:</label>
             <textarea class="form-control" type="text-area" name="cm_others" id="cm_others"></textarea>

           </div><br>   
         </div>
       </div>
     </div>
     <div class="col-lg-5">
      <label style="display: block; text-align: left">&nbsp&nbsp&nbspDoes the child have:</label>
      <div class=" col-md-6">
        <div class="stats-content">

         <div class="checkbox checkbox-css">
          <input type="checkbox" name="cddchild" id="ceccd" value=1 checked />
          <label for="ceccd">ECCD Card</label>
        </div>
        <div class="checkbox checkbox-css">
          <input type="checkbox" name="cddchild" id="cmcbook" value=0  />
          <label for="cmcbook">Mother & Child book</label>
        </div><br><br><br>
        <div >

          <label for="">Others please specify:</label>
          <textarea class="form-control" type="text-area" name="cddothers" id="cddothers"></textarea>

        </div>
      </div>
    </div>
  </div>   

</div>
  <!-- new row -->

</div>
</div>

<!-- begin card -->
<div class="card">
  <div class="card-header text-white pointer-cursor collapsed" style="background-color: #e89bbf" data-toggle="collapse" data-target="#collapseTwo">
     <h><label style="display: block; text-align: center; color: white">Vaccination and other health data</label></h> 
  </div>
  <div id="collapseTwo" class="collapse" data-parent="#accordion">
    <div class="card-body">
     Vaccination and other data
    </div>
    <div class="row">
     <div class="col-lg-5">
      <label style="display: block; text-align: left;">&nbsp&nbsp&nbsp&nbsp&nbspBCG</label>
      <div class=" col-md-6">
        <div class="stats-content">

         <div class="radio radio-css">
          <input class="form-control" type="radio" name="cbcg" id="cssRadioConcrete" value="Yes" checked />
          <label for="cssRadioConcrete">Yes</label>
          <div class="radio radio-css">
            <input class="form-control" type="radio" name="cbcg" id="cssRadioWood" value="No" />
            <label for="cssRadioWood">No</label>
          </div>
          <div class="radio radio-css">
            <input type="radio" id="cno" name="cbcg" value="Don't know" />
            <label for="cno">Don't know</label>
          </div>
          <br>
        </div>
      </div>
    </div>

    
  </div>
  <div class="col-lg-5">
    <label style="display: block; text-align: left">&nbspDPT</label>
    <div >
      <div class="radio radio-css">

        <input type="radio" id="dyes" name="cdpt" value="Yes" checked />
        <label for="dyes">Yes</label>

      </div>
      <div class="radio radio-css">

        <input type="radio" id="dno" name="cdpt" value="No" />
        <label for="dno">No</label>
      </div>
      <div class="radio radio-css">

        <input type="radio" id="dknow" name="cdpt" value="Don't know" />
        <label for="dknow">Don't know</label>
      </div>
    </div>
  </div>

  <div class="col-lg-2">
    <label style="display: block; text-align: left">&nbspOral Polio</label>
    <div >
      <div class="radio radio-css">

        <input type="radio" id="oyes" name="cpolio" value="Yes" checked />
        <label for="oyes">Yes</label>

      </div>
      <div class="radio radio-css">

        <input type="radio" id="ono" name="cpolio" value="No" />
        <label for="ono">No</label>
      </div>
      <div class="radio radio-css">

        <input type="radio" id="oknow" name="cpolio" value="Don't know" />
        <label for="oknow">Don't know</label>
      </div>
    </div>
  </div>



</div> <br>
<div class="row">
  <div class="col-lg-5">
    <div class=" col-md-6">
      <label style="display: block; text-align: left">&nbspHepa B</label>
      <div >
        <div class="radio radio-css">

          <input type="radio" id="hyes" name="chepab" value="Yes" checked />
          <label for="hyes">Yes</label>

        </div>
        <div class="radio radio-css">

          <input type="radio" id="hno" name="chepab" value="No" />
          <label for="hno">No</label>
        </div>
        <div class="radio radio-css">

          <input type="radio" id="hknow" name="chepab" value="Don't know"/>
          <label for="hknow">Don't know</label>
        </div>
      </div>
    </div>
  </div>
 
  <div class="col-lg-5">

    <label style="display: block; text-align: left">&nbspMeasles</label>
    <div >
      <div class="radio radio-css">

        <input type="radio" id="myes" name="cmeasles" value="Yes" checked />
        <label for="myes">Yes</label>

      </div>
      <div class="radio radio-css">

        <input type="radio" id="mno" name="cmeasles" value="No"/>
        <label for="mno">No</label>
      </div>
      <div class="radio radio-css">

        <input type="radio" id="mknow" name="cmeasles" value="Don't know"/>
        <label for="mknow">Don't know</label>
      </div> <br>
     
    </div>
  </div>
  <div class="col-lg-2">
    <div>
        <label style="display: block; text-align: left">Others</label>
        <textarea class="form-control" id="cmeaslesthers" ></textarea> 

      </div>
  </div>

</div>
</div>
</div>
<!-- end card -->


<!-- begin card -->
<div class="card">
  <div class="card-header text-white pointer-cursor collapsed" style="background-color: #91a5b8" data-toggle="collapse" data-target="#collapseThree">
    <h><label style="display: block; text-align: center; color: white">Physical Attributes data</label></h> 
  </div>
  <div id="collapseThree" class="collapse" data-parent="#accordion">
    <div class="card-body">
     Physical attribute of the children
    </div>
    <div class="row">
      <div class="col-lg-5">
        <div class=" col-md-6">
          <label style="display: block; text-align: left">&nbspPhysical Deformity</label>
          <div >
            <div class="checkbox checkbox-css">

              <input type="checkbox" id="chlip" name="cpdefo" value=1 checked />
              <label for="chlip">Hare Lip</label>
            </div>
            <div class="checkbox checkbox-css">

              <input type="checkbox" id="cdleg" name="cpdefo" value=0 />
              <label for="cdleg">Disabled Leg</label>
            </div>
            <div class="checkbox checkbox-css">

              <input type="checkbox" id="cdarm" name="cpdefo" value=0 />
              <label for="cdarm">Disabled Arm/Hand</label>
            </div>
            <div class="checkbox checkbox-css">

              <input type="checkbox" id="crossseyed" name="cpdefo" value=0 />
              <label for="crossseyed">Cross-Eyed (Duling or Banlag)</label>
            </div>
            <div class="checkbox checkbox-css">

              <input type="checkbox" id="cdeaf" name="cpdefo" value=0 />
              <label for="cdeaf">Deaf</label>
            </div>
             <div class="checkbox checkbox-css">

              <input type="checkbox" id="cblind" name="cpdefo" value=0 />
              <label for="cblind">Blind</label>
            </div>
            <div class="checkbox checkbox-css">

              <input type="checkbox" id="cftoes" name="cpdefo" value=0 />
              <label for="cftoes">Deformity in Fingers/Toes</label>
            </div>
          </div>
          <br>
        </div>
      </div>


      <div class="col-lg-5">

        <label style="display: block; text-align: left">&nbspProblems with</label>
        <div>
          <div class="checkbox checkbox-css">

            <input type="checkbox" id="cbehavior" name="cpwith" value=1 checked />
            <label for="cbehavior">Behavior</label>


          </div>
          <div class="checkbox checkbox-css">

            <input type="checkbox" id="cspeaking" name="cpwith" value=0 />
            <label for="cspeaking">Speaking</label>
          </div>
          <div class="checkbox checkbox-css">

            <input type="checkbox" id="chearing" name="cpwith" value=0 />
            <label for="chearing">Hearing</label>
          </div>
          <div class="checkbox checkbox-css">

            <input type="checkbox" id="cvision" name="cpwith" value=0 />
            <label for="cvision">Vision</label>
          </div>
        </div>

      </div>

      <div class="col-lg-2">

        <label style="display: block; text-align: left">&nbspLeft Handed</label>
        <div>
          <div class="radio radio-css">

            <input type="radio" id="clyes" name="clefthanded" value=1 checked />
            <label for="clyes">Yes</label>

          </div>
          <div class="radio radio-css">

            <input type="radio" id="clno" name="clefthanded" value=0 />
            <label for="clno">No</label>
          </div>
        </div>

      </div>


    </div>
  </div>
</div> 
<!-- end card -->
<!-- begin card -->
<div class="card">
  <div class="card-header text-white pointer-cursor collapsed" style="background-color: #808e9c" data-toggle="collapse" data-target="#collapseFour">
    <h><label style="display: block; text-align: center; color: white">Prior Early Childhood Experience Item</label></h> 
  </div>
  <div id="collapseFour" class="collapse" data-parent="#accordion">
    <div class="card-body">
     Early experience of the children
    </div>
    <div class="row">
      <div class="col-lg-5">
        <div class=" col-md-6">
          <label style="display: block; text-align: left">&nbspChildhood Experience</label>
          <div >
            

            <div>

               <div class="checkbox checkbox-css">
                <input type="checkbox" id="cnursery" name="expi" value=1 checked />
                <label for="cnursery">Nursery</label>
              </div>
               <div class="checkbox checkbox-css">
                <input type="checkbox" id="ckinder" name="expi" value=0 />
                <label for="ckinder">Kindergarten</label>
              </div>
               <div class="checkbox checkbox-css">
                <input type="checkbox" id="cprepa" name="expi" value=0 />
                <label for="cprepa">Preparatory</label>
              </div>
              
            </div>
          </div>
        </div>


      </div>

      <div class="col-lg-5">
       
        <label style="display: block; text-align: left">&nbspLearns at</label>
        <div>
          <div class="radio radio-css">

            <input type="radio" id="lpre" name="clearsat" value=0 />
            <label for="lpre">Public Pre-School</label>
          </div>
          <div class="radio radio-css">

            <input type="radio" id="lprivate" name="clearsat" value=1 checked />
            <label for="lprivate">Private Day Care</label>

          </div>
          <div class="radio radio-css">

            <input type="radio" id="lpublic" name="clearsat" value=0 />
            <label for="lpublic">Public Day Care</label>
          </div>
          <div class="radio radio-css">

            <input type="radio" id="lchurch" name="clearsat" value=1 checked />
            <label for="lchurch">Church-Based</label>

          </div>
          <div class="radio radio-css">

            <input type="radio" id="lhomeb" name="clearsat" value=0 />
            <label for="lhomeb">Home-Based</label>
          </div>

          <div class="radio radio-css">

            <input type="radio" id="lprivatepre" name="clearsat" checked />
            <label for="lprivatepre">Private Pre-School</label>

          </div>
          <br>
          <label style="display: block; text-align: left">Others</label>
          <div>

            <textarea class="col-lg-4 form-control" id="l_others" ></textarea> 

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="card">
  <div class="card-header text-white pointer-cursor collapsed" style="background-color: #70e08a" data-toggle="collapse" data-target="#collapseFive">
      <h><label style="display: block; text-align: center; color: white"> Other Performance Related Inputs</label></h>
  </div>
  <div id="collapseFive" class="collapse" data-parent="#accordion">
    <div class="card-body">
      Performance related inputs
    </div>
    <div class="row">
      <div class="col-lg-5">
        <div class=" col-md-6">

          <label style="display: block; text-align: left">&nbspLearns at Home with:</label>
          <div>
            
            <div class="checkbox checkbox-css">
              <input type="checkbox" id="cmfboth" name="clathomewith" value=0  />
              <label for="cmfboth">Mother/Father/Both</label>
            </div>
            <div class="checkbox checkbox-css">
              <!-- cnbody, cmfboth, csiblings, crela, chhelp, ctutor, cperfri -->
              <input type="checkbox" id="cnbody" name="clathomewith" value=1 checked />
              <label for="cnbody">Nobody</label>
            </div>
            <div class="checkbox checkbox-css">

              <input type="checkbox" id="csiblings" name="clathomewith" value=0 />
              <label for="csiblings">Siblings</label>

            </div>
            <div class="checkbox checkbox-css">
              <input type="checkbox" id="crela" name="clathomewith" value=0  />
              <label for="crela">Relatives</label>
            </div>

            <div class="checkbox checkbox-css">

              <input type="checkbox" id="cmaid" name="clathomewith" value=0  />
              <label for="cmaid">Househelp/Maid</label>

            </div>
            <div class="checkbox checkbox-css">

              <input type="checkbox" id="ctutor" name="ctutor" value=0  />
              <label for="ctutor">Tutor</label>

            </div>
            <label style="display: block; text-align: left">&nbspOthers</label>
            <div>

              <textarea class="form-control"id="cperfri" name="clathomewith_txt"></textarea> 

            </div><br>
          </div>
        </div>
      </div>
                
      <div class="col-lg-5">
        <label style="display: block; text-align: left">&nbspPlays Interact with:</label>
        <div>
           <div class="checkbox checkbox-css">

              <input type="checkbox" id="p_older" name="clathomewith" value=1 checked="true" />
              <label for="p_older">Older Siblings</label>

            </div>
             <div class="checkbox checkbox-css">

              <input type="checkbox" id="p_younger" name="clathomewith" value=0 />
              <label for="p_younger">Younger Siblings</label>

            </div>
             <div class="checkbox checkbox-css">

              <input type="checkbox" id="p_age" name="clathomewith" value=0/>
              <label for="p_age">Same Age</label>

            </div>
         
        </div>
      </div>

    </div>
  </div>
</div>
<!-- end card -->
<div class="card">
  <div class="card-header text-white pointer-cursor collapsed" style="background-color: #f07883" data-toggle="collapse" data-target="#collapseSix">
    <h><label style="display: block; text-align: center; color: white">Logistics</label></h>
  </div>
  <div id="collapseSix" class="collapse" data-parent="#accordion">
    <div class="card-body">
     Logistics
    </div>

    <div class="row">
      <div class="col-lg-4 col-md-6">
        <div class="stats-content">
          <label >&nbspTravel time to DCC<span class="text-danger"></span></label> <span id="lblfirstname"></span>
          <input class="form-control" id="ctdcc" data-parsley-required="true" />

        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="stats-content">
          <label >&nbspMode of transportation to DCC</label><span id="lblmiddlename"></span>

          <input class="form-control" id="cmdcc" data-parsley-required="true" />

        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="stats-content">
          <label >&nbspTravel time to NCDC</label><span id="lbllastname"></span>

          <input class="form-control" id="tncdc" data-parsley-required="true" />

        </div>
      </div>

    </div> <br>
    <div class="row">
      <div class="col-lg-4 col-md-6">
        <div class="stats-content">
          <label >&nbspMode of transportation to NCDC</label><span id="lblmiddlename"></span>

          <input class="form-control" id="cmncdc" data-parsley-required="true" />

        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="stats-content">
          <label >&nbspPublic Transportation<span class="text-danger"></span></label> <span id="lblfirstname"></span>
          <input class="form-control" id="cpublic" data-parsley-required="true" />

        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="stats-content">
          <label >&nbspTransportation Fare</label><span id="lblmiddlename"></span>

          <input class="form-control" id="ctransfare" data-parsley-required="true" />

        </div>
      </div>
     

    </div> <br>
     <div class="row">
        

       <div class="col-lg-4 col-md-6">
        <div class="stats-content">
          <label >&nbspGoes to school with</label><span id="lbllastname"></span>

          <input class="form-control" id="cgowith" data-parsley-required="true" />

        </div>
      </div>
      

       <div class="col-lg-4 col-md-6">
        <div class="stats-content">
          <label >&nbspChild development teacher</label><span id="lbllastname"></span>

          <input class="form-control" id="cdevteacher" data-parsley-required="true" />

        </div>
      </div>
      
    </div> <br>
    <div class="row">
      <div class="col-lg-5">
        <div class=" col-md-6">
          <label style="display: block; text-align: left">Eats Meal Before Going To School:</label>
          <div>
           <div class="radio radio-css">
            <input type="radio" id="e_always" name="ceatsmeals" value="Always" checked />
            <label for="e_always">Always</label>
          </div>
          <div class="radio radio-css">
            <input type="radio" id="e_most" name="ceatsmeals" value="Most of  the time" />
            <label for="e_most">Most of the time</label>
          </div>
          <div class="radio radio-css">
            <input type="radio" id="e_sometimes" name="ceatsmeals" value="Sometimes" />
            <label for="e_sometimes">Sometimes</label>
          </div>
          <div class="radio radio-css">
            <input type="radio" id="e_rarely" name="ceatsmeals" value="Rarely" />
            <label for="e_rarely">Rarely</label>
          </div>
          <div class="radio radio-css">
            <input type="radio" id="e_never" name="ceatsmeals" value="Never" />
            <label for="e_never">Never</label>
          </div>
          <br>

        </div>
      </div>
    </div>

    <div class="col-lg-5">

    <label style="display: block; text-align: left">&nbspHas Baon:</label>
    <div>
     <div class="radio radio-css">

      <input type="radio" id="cmoney" name="chasbaon" value=1 />
      <label for="cmoney">Money</label>
    </div>
    <div class="radio radio-css">

      <input type="radio" id="cfood" name="chasbaon" value=0 />
      <label for="cfood">Food</label>
    </div>

    <div class="radio radio-css">

      <input type="radio" id="cboth" name="chasbaon" value=0 />
      <label for="cboth">Both</label>
    </div>

    <div class="radio radio-css">

      <input type="radio" id="cnone" name="chasbaon" value=0 />
      <label for="cnone">None</label>
    </div>

    <div class="radio radio-css">

      <input type="radio" id="chdontknow" name="chasbaon" value=0 />
      <label for="chdontknow">Don't Know</label>
    </div>

  </div>

  </div>

    <div class="col-lg-2">
      
      <label style="display: block; text-align: left">&nbspFood Normally Eaten By Child:</label>
      <div>
       <div class="radio radio-css">

        <input type="radio" id="cveggy" name="cfoodeaten" value="Vegetable" />
        <label for="cveggy">Vegetable&nbsp&nbsp</label>
      </div>
      <div class="radio radio-css">

        <input type="radio" id="crice" name="cfoodeaten" value="Rice" />
        <label for="crice">Rice&nbsp&nbsp</label>
      </div>
      <div class="radio radio-css">

        <input type="radio" id="ccereal" name="cfoodeaten" value="Cereals" />
        <label for="ccereal">Cereals&nbsp&nbsp&nbsp&nbsp&nbsp</label>
      </div>
      <div class="radio radio-css">

        <input type="radio" id="cpork" name="cfoodeaten" value="Pork" />
        <label for="cpork">Pork&nbsp&nbsp&nbsp</label>
      </div>
      <div class="radio radio-css">

        <input type="radio" id="cnoodle" name="cfoodeaten" value="Noodle" />
        <label for="cnoodle">Noodle&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
      </div>
      <div class="radio radio-css">

        <input type="radio" id="cfruitjuice" name="cfoodeaten" value="Fruit Juice"/>
        <label for="cfruitjuice">Fruit Juice&nbsp&nbsp</label>
      </div>

      <div class="radio radio-css">

        <input type="radio" id="cchicken" name="cfoodeaten" value="Chicken" />
        <label for="cchicken">Chicken&nbsp&nbsp&nbsp&nbsp</label>
      </div>

      <div class="radio radio-css">

        <input type="radio" id="csoup" name="cfoodeaten" value="Soup" />
        <label for="csoup">Soup&nbsp&nbsp</label>
      </div>

      <div class="radio radio-css">

        <input type="radio" id="cmilk" name="cfoodeaten" value="Milk" />
        <label for="cmilk">Milk&nbsp&nbsp</label>
      </div>
      <div class="radio radio-css">

        <input type="radio" id="cbeef" name="cfoodeaten" value="Beef" />
        <label for="cbeef">Beef&nbsp&nbsp</label>
      </div>
      <div class="radio radio-css">

        <input type="radio" id="cbread" name="cfoodeaten" value="Bread" />
        <label for="cbread">Bread&nbsp&nbsp</label>
      </div>
      <div class="radio radio-css">

        <input type="radio" id="cfish" name="cfoodeaten" value="Fish" />
        <label for="cfish">Fish&nbsp&nbsp</label>
      </div>
      <div class="radio radio-css">

        <input type="radio" id="cfruits" name="cfoodeaten" value="Fruits" />
        <label for="cfruits">Fruits</label>
      </div>
    </div>

  </div>

</div>
</form>

</div>

</div>
<div class="modal-footer" align="center">
 
  <a href="javascript:;" class="btn btn-success"  id="edit-btn">Submit</a>
</div>
<!-- end #accordion -->
</div>


        </div>
        <!-- end panel-body -->



      </div>
      <!-- end panel add new -->
      
    </div>
    <!-- end tab-pane -->
    <!-- begin tab-pane -->
    <div class="tab-pane fade" id="nav-pills-tab-2">
     <div class="panel panel-inverse">
      <div class="panel-heading">
        <div class="panel-heading-btn">
          <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
          <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
          <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
        </div>
        <h4 class="panel-title">List of Residents</h4>
      </div>
      <!-- begin alert -->
      <div class="alert alert-yellow fade show">
        <button type="button" class="close" data-dismiss="alert">
          <span aria-hidden="true">&times;</span>
        </button>
        Add new profile for mother.
      </div>
      <div class="panel-body">
       <table id="data-table-default" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th hidden>Resident ID </th>
            <th style="">FullName </th>
            <th style="">Gender </th>

            <th style="width: 12%">Actions </th>
          </tr>
        </thead>

        <tbody>

        </tbody>
      </table>
    </div>

  </div>
</div>




<!-- #modal-update-mother -->
<div class="modal fade" id="AddProfile" data-backdrop="static">
  <div class="modal-dialog" style="max-width: 50%">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #ffffff">
        <h4 class="modal-title" style="color: white">Edit Record</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white">×</button>
      </div>
      <div class="modal-body">
       
        <div class="col-lg-12">

<br>


</div>
<div class="modal-footer" align="center">
  <a href="javascript:;" class="btn btn-white" >Close</a>
  <a href="javascript:;" class="btn btn-success"  id="edit-btn">Submit</a>
</div>
</div>
</div>
</div>
<!-- #modal-view -->

</div>
</div>

<!-- end tab-pane -->
</div>
<!-- end tab-content -->

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('global.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\BITBO_INSTALLER\4. BITBo\www\resources\views/resident/childrenprofile.blade.php ENDPATH**/ ?>