<?php $__env->startSection('page-css'); ?>

<link href="<?php echo e(asset('assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css')); ?>" rel="stylesheet" />
<link href="<?php echo e(asset('assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css')); ?>" rel="stylesheet" />


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div id="content" class="content">
	<ol class="breadcrumb pull-right">
		<li class="breadcrumb-item"><a href="javascript:;">Permit/Certification/Clearance</a></li>
		<li class="breadcrumb-item"><a href="javascript:;">Request</a></li>
		<li class="breadcrumb-item"><a href="javascript:;">Certification</a></li>
	</ol>

	<h1 class="page-header">Request Certification<small>DILG Requirements</small></h1>

	<div class="panel panel-inverse">
		<div class="panel-heading">
			<div class="panel-heading-btn">
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
			</div>
			<h4 class="panel-title">Resident</h4>
		</div>
		<div class="alert alert-yellow fade show">
			<button type="button" class="close" data-dismiss="alert">
				<span aria-hidden="true">&times;</span>
			</button>
			The following are the existing records of the residents within the system.
		</div>
		<div class="panel-body">
			<table id="tbl_resident_lst" class="table table-striped table-bordered">
				<thead>
					<tr>
						<th width="10%">Name</th>
						<th width="20%">Address</th>
						<th>Birthdate</th>
						<th>Sex</th>
						<th>Civil Status</th>

						<th width="25%">Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php $__currentLoopData = $resident; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr class="gradeC" id="<?php echo e($row->RESIDENT_ID); ?>">
						<td><?php echo e($row->RESIDENT_NAME); ?></td>
						<td><?php echo e($row->ADDRESS); ?> </td>
						<td id="birthday"><?php echo e($row->DATE_OF_BIRTH); ?></td>
						<td><?php echo e($row->SEX); ?></td>
						<td><?php echo e($row->CIVIL_STATUS); ?></td>
						<td>
							<a id="btnViewForms" class="btn btn-primary m-r-5 m-b-5" data-toggle="modal" data-target="#modal-SelectCertificate" style="color: #fff">
								<i class="fa fa-file-alt" style="color:#fff">&nbsp;</i>Request Certification</a>	
							</td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>
			</div>
		</div>
		
		<input type="text" id="txt_resident_no"  hidden />	
		<input type="text" id="txt_issuance_type" hidden/>

		
		<div class="modal fade" id="modal-SelectCertificate" data-backdrop="static">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header"  style="background: #000" id="modalHeader">
						<h4 class="modal-title" style="color: #fff"> Generate Resident Certificate</h4>
						<button type="button" class="close" onclick="hideModal()" aria-hidden="true" style="color: #fff">×</button>
					</div>
					<div class="modal-body">
						<h2 id="lbl_resname" >Resident:</h2>
						<input type="text" id="txt_resid" hidden />
						<div class="col-md-10">
							<label>Select Certificate:</label>
							<select class="form-control" id="sel_certificate_type" style="color: black;" >
								<option selected disabled value=""></option>
								<option value="">Barangay Certificate Residency</option>
								<option value="">Barangay Certificate Calamity Loan SSS-GSIS</option>
								<option value="">Barangay Certificate Calamity Loan OFW</option>
								<option value="">Barangay Certificate SPES</option>
								<option value="">Barangay Certificate Solo Parent</option>
								<option value="">Barangay Certificate Indigency</option>
							</select>
						</div>
				

						
						<div class="col-md-10" id="divResidency">
							<legend class="m-t-10"></legend>
							<h5 id="divFilloutInstruction">Fill out the following information:</h5>

							<label>Purpose</label> 
							<textarea class="form-control" id="txtarea_purpose_residency"></textarea>
						</div>
						
						<div class="col-md-10" id="divLoanSSSGSIS">
							<legend class="m-t-10"></legend>
							<h5 id="divFilloutInstruction">Fill out the following information:</h5>

							<label>SSS/GSIS No</label>
							<input type="text" id="txt_sssgsis_no_loansssgsis" class="form-control">
							<br>
							<label>Name of Calamity/Disaster</label>
							<input type="text" id="txt_calamityname_loansssgsis" class="form-control">
							<br>
							<label>Date of Calamity/Disaster</label>
							<input type="date" id="txt_calamitydate_loansssgsis" class="form-control">
						</div>
						
						<div class="col-md-10" id="divLoanOFW">
							<legend class="m-t-10"></legend>
							<h5 id="divFilloutInstruction">Fill out the following information:</h5>

							<label>SSS No</label>
							<input type="text" id="txt_sss_loanofw" class="form-control">
							<br>
							<label>Name of Calamity/Disaster</label>
							<input type="text" id="txt_calamityname_loanofw" class="form-control">
							<br>
							<label>Date of Calamity/Disaster</label>
							<input type="date" id="txt_calamitydate_loanofw" class="form-control">
							<br>
							<label>Country</label>
							<input type="text" id="txt_country_loanofw" class="form-control">
						</div>
						
						<div class="col-md-10" id="divSoloParent">
							<legend class="m-t-10"></legend>
							<h5 id="divFilloutInstruction">Fill out the following information:</h5>

							<label>Category of Single Parent</label>
							<input type="text" id="txt_single_parent_category" class="form-control">
							<br>
							<label>Requestor name</label>
							<input type="text" id="txt_requester_name" class="form-control">

							<br>
							<label>Child/ren under custody</label>
							<div class="row">
								<div class="col-md-10">
									<p><button type="button" id="btnAddCustody" class="btn btn-primary">Add</button></p>
								</div>
							</div>

							<div id="divChildCustody_1" class="row-control"> Child 1<br>
								<input type="text"  class="form-control" placeholder="Name" id="lbl_child_name_1">
								<br>
								<input type="text"  class="form-control" placeholder="Age" id="lbl_child_age_1">
								<br>
								<div class="col-md-8" class="form-control">
									<label>Is PWD? &nbsp</label>
                                    	<div class="radio radio-css radio-inline" >
                                            <input type="radio" id="radiobtn_yes_1" name="group1" value="option1" >
											<label for="radiobtn_yes_1">Yes</label>
										</div>
                                    	<div class="radio radio-css radio-inline">
                                            <input type="radio"  id="radiobtn_no_1" name="group1" value="option2" >
                                            <label for="radiobtn_no_1">No</label>
                                        </div>
                                    </div>
							</div>

							<div id="divChildCustody_2" class="row-control"><legend class="m-t-8"></legend> Child 2<br>
								
								<input type="text"  class="form-control" placeholder="Name" id="lbl_child_name_2">
								<br>
								<input type="text" class="form-control" placeholder="Age" id="lbl_child_age_2">
								<br>
								<div class="col-md-8" class="form-control">
									<label>Is PWD? &nbsp</label>
                                    	<div class="radio radio-css radio-inline">
                                            <input type="radio" id="radiobtn_yes_2" value="option1" name="group2">
											<label for="radiobtn_yes_2">Yes</label>
										</div>
                                    	<div class="radio radio-css radio-inline">
                                            <input type="radio"  id="radiobtn_no_2" value="option2" name="group2" >
                                            <label for="radiobtn_no_2">No</label>
                                        </div>
                                    </div>
								<div align="right"><button type="button" class="btn btn-danger btnRemoveCustody2" id="btnRemoveCustody_2" align="right">Remove</button></div>
								<br>
								
							</div>

						</div>
						
						<div class="col-md-10" id="divIndigency">
							<legend class="m-t-10"></legend>
							<h5 id="divFilloutInstruction">Fill out the following information:</h5>

							<label>Purpose</label> 
							<textarea class="form-control" id="txtarea_purpose_indigency"></textarea>
						</div>

						<div id="divApplicantName">
								<br><legend class="m-t-10"></legend>
								<div class="col-md-10" id="divBusinessPermit">
									<label>Applicant's Name</label>
									<input type="text" id="txt_applicant_name" class="form-control">
								</div>
							</div>
						<legend class="m-t-10"></legend>
						<div align="right">
							<a onclick="hideModal()" class="btn btn-white m-r-5" >Close</a>
							<button  id="btnRequest" class="btn btn-inverse m-r-9" style="background: #000">Request</button>
						</div>				
					</div>
				</div>
			</div>
		</div>



	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-js'); ?>

<script src="<?php echo e(asset('assets/plugins/DataTables/media/js/jquery.dataTables.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/demo/table-manage-default.demo.min.js')); ?>"></script>

<script src="<?php echo e(asset('assets/plugins/gritter/js/jquery.gritter.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/bootstrap-sweetalert/sweetalert.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/demo/ui-modal-notification.demo.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/bootstrap-sweetalert/sweetalert.min.js')); ?>"></script>

<script>
	$(document).ready(function() {
		App.init();
		TableManageDefault.init();
		// $("table[id='tbl_resident_lst']").DataTable();	
		$("table[id='tbl_resident_lst']").DataTable({
			"bSort" : false
		});
		$('#divResidency').hide();
		$('#divLoanSSSGSIS').hide();
		$('#divLoanOFW').hide();
		$('#divSoloParent').hide()
		$('#divIndigency').hide();
		$('#divChildCustody_2').hide();
	});

	//ADD CHILD CUSTODY
	$('#btnAddCustody').on('click', function(){
		$('#divChildCustody_2').show();
	});

	$('#btnRemoveCustody_2').on('click', function(){
		$('#divChildCustody_2').hide();
		$('#lbl_child_name_2').val("");
		$('#lbl_child_age_2').val("");
		$("#radiobtn_yes_2").prop("checked", false);
		$("#radiobtn_no_2").prop("checked", false);
	});
	//VIEW CERTIFICATE
	$('#tbl_resident_lst').on('click', '#btnViewForms', function(){
		let row = $(this).closest("tr")
		,name = $(row.find("td")[0]).text();

		$("input[id='txt_resid']").val(row.attr("id"));
		$('#lbl_resname').text(name);
	});
	//SELECT CERTIFICATE
	$('#sel_certificate_type').on('change', function(){
			var certificate_type = $('#sel_certificate_type option:selected').text();
			if(certificate_type == "Barangay Certificate Residency"){
				//show
				$('#divResidency').show();
				//hide
				$('#divLoanSSSGSIS').hide();
				$('#divLoanOFW').hide();
				$('#divSoloParent').hide()
				$('#divIndigency').hide();
			}

			else if(certificate_type == "Barangay Certificate Calamity Loan SSS-GSIS"){
				//show
				$('#divLoanSSSGSIS').show();
				// hide
				$('#divResidency').hide();
				$('#divLoanOFW').hide();
				$('#divSoloParent').hide()
				$('#divIndigency').hide();
			}

			else if(certificate_type == "Barangay Certificate Calamity Loan OFW"){
				//show
				$('#divLoanOFW').show();
				//hide
				$('#divResidency').hide();
				$('#divLoanSSSGSIS').hide();
				$('#divSoloParent').hide()
				$('#divIndigency').hide();
			}
			else if(certificate_type == "Barangay Certificate SPES"){
				//show
				$('#divResidency').hide();
				$('#divLoanSSSGSIS').hide();
				$('#divLoanOFW').hide();
				$('#divSoloParent').hide()
				$('#divIndigency').hide();
				//hide
			}
			else if(certificate_type == "Barangay Certificate Solo Parent"){
				//hide
				$('#divResidency').hide();
				$('#divLoanSSSGSIS').hide();
				$('#divLoanOFW').hide();
				$('#divIndigency').hide();
				//show
				$('#divSoloParent').show()
			}
			else if(certificate_type == "Barangay Certificate Indigency"){
				//show
				$('#divIndigency').show();
				//hide
				$('#divResidency').hide();
				$('#divLoanSSSGSIS').hide();
				$('#divLoanOFW').hide();
				$('#divSoloParent').hide()
			}
	});

	$('#btnRequest').on('click', function(){

		var certificate_type = $('#sel_certificate_type option:selected').text();
		var form_type = "Request Barangay Certification Form";
		// var resident_id = $('#').val();

		var isCheckedYes1 = $('#radiobtn_yes_1:checked').val()?true:false;
		 var isCheckedYes2 = $('#radiobtn_yes_2:checked').val()?true:false;
		 var isCheckedNo1 = $('#radiobtn_no_1:checked').val()?true:false;
		 var isCheckedNo2 = $('#radiobtn_no_2:checked').val()?true:false;
		 var is_pwd_1, is_pwd_2;

		 if(isCheckedYes1 == true)
		 	is_pwd_1 = "Yes";
		 else if (isCheckedNo1 == true)
		 	is_pwd_1 = "No";
		 else
		 	is_pwd_1="";

		  if(isCheckedYes2 == true)
			 is_pwd_2 = "Yes";
		 else if (isCheckedNo2 == true)
		 	is_pwd_2 = "No";
		 else
		 	is_pwd_2 = "";

		// alert(form_type+' '+certificate_type);

		let data = {
			'_token' : " <?php echo e(csrf_token()); ?>"
			// residency - A
			,'A_PURPOSE' : $('#txtarea_purpose_residency').val()
			// calamity loan sss-gsis -B
			,'B_SSS_NO' : $("input[id='txt_sssgsis_no_loansssgsis']").val() 
			,'B_CALAMITY_NAME' : $("input[id='txt_calamityname_loansssgsis']").val() 
			,'B_CALAMITY_DATE' : $("input[id='txt_calamitydate_loansssgsis']").val() 
			//calamity loan  ofw - C
			,'C_SSS_NO' : $("input[id='txt_sss_loanofw']").val() 
			,'C_CALAMITY_NAME' : $("input[id='txt_calamityname_loanofw']").val() 
			,'C_CALAMITY_DATE' : $("input[id='txt_calamitydate_loanofw']").val() 
			,'C_COUNTRY' : $("input[id='txt_country_loanofw']").val() 
			//solo parent - E
			,'E_CATEGORY_SINGLE_PARENT' : $("input[id='txt_single_parent_category']").val() 
			,'E_REQUESTOR_NAME' : $("input[id='txt_requester_name']").val() 
			,'E_CHILD_NAME' : $("input[id='lbl_child_name_1']").val() 
			,'E_CHILD_AGE' : $("input[id='lbl_child_age_1']").val() 
			,'E_IS_PWD' : is_pwd_1
			,'E_CHILD_NAME_2' : $("input[id='lbl_child_name_2']").val() 
			,'E_CHILD_AGE_2' : $("input[id='lbl_child_age_2']").val() 
			,'E_IS_PWD_2' : is_pwd_2
			//indigency - F
			,'F_PURPOSE' : $('#txtarea_purpose_indigency').val()
			//general 
			,'CERTIFICATE_TYPE' : certificate_type
			,'FORM_TYPE' : form_type
			,'RESIDENT_ID' : $("input[id='txt_resid']").val()
			,'APPLICANT_NAME' : $("input[id='txt_applicant_name']").val()
		};

		console.log(data);

		$.ajax({
			url : "<?php echo e(route('CRUDRequestCertificate')); ?>",
			method : 'POST',
			data : data,
			success : function(response) {
				swal({
					title: 'Success',
					text: 'Request Done!',
					icon: 'success',
				});
				window.location.reload();
				console.log(response["message"]);
			},
			error : function(error){
				console.log("error: " + error);
			}
		});	
	});

	function Cancelled(){
		swal({
			title: 'Cancelled',
			text: "Cancelled Generating Certificate",
			icon:'error',
			buttons: false,
			timer: 1000,
		});
	};

	function getAge(dateString) {
		var today = new Date();
		var birthDate = new Date(dateString);
		var age = today.getFullYear() - birthDate.getFullYear();
		var m = today.getMonth() - birthDate.getMonth();
		if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
			age--;
		}
		return age;
	}

	function hideModal(){

		$("#modal-SelectCertificate").modal('hide');
	}

	</script>
	
	<?php $__env->stopSection(); ?>

<?php echo $__env->make('global.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\BITBO_INSTALLER\4. BITBo\www\resources\views/permit_certification_clearance/certificate.blade.php ENDPATH**/ ?>