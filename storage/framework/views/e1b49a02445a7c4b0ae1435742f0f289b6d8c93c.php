<?php $__env->startSection('page-css'); ?>

<link href="<?php echo e(asset('assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css')); ?>" rel="stylesheet" />
<link href="<?php echo e(asset('assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css')); ?>" rel="stylesheet" />


<link href="<?php echo e(asset('assets/plugins/DataTables/extensions/Responsive/css/smart_wizard.css')); ?>" rel="stylesheet" />
<link href="<?php echo e(asset('assets/plugins/DataTables/extensions/Responsive/css/parsley.css')); ?>" rel="stylesheet" />

<script src="<?php echo e(asset('assets/plugins/pace/pace.min.js')); ?>"></script>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div id="content" class="content">
	<ol class="breadcrumb pull-right">
		<li class="breadcrumb-item"><a href="javascript:;">Permit/Certification/Clearance</a></li>
		<li class="breadcrumb-item"><a href="javascript:;">Issuance</a></li>
	</ol>

	<h1 class="page-header">Issuance <small>DILG Requirements</small></h1>

	<ul class="nav nav-pills">
		<li class="nav-items">
			<a href="#nav-pills-tab-1" data-toggle="tab" class="nav-link" >

				<span class="d-sm-block d-none">Businesses</span>
			</a>
		</li>
		<li class="nav-items">
			<a href="#nav-pills-tab-2" data-toggle="tab" class="nav-link" id="">

				<span class="d-sm-block d-none">Residents</span>
			</a>
		</li>
	</ul>	

	<div class="tab-content">	
		
		<div class="tab-pane fade active show" id="nav-pills-tab-1">
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
					<h4 class="panel-title">Issuance Verification </h4>
				</div>
				<div class="alert alert-yellow fade show">
					<button type="button" class="close" data-dismiss="alert">
						<span aria-hidden="true">&times;</span>
					</button>
					The following are the existing records of the residents within the system.
				</div>
				<div class="panel-body">
					<table id="tbl_business_approved_lst" class="table table-striped table-bordered">
						<thead>
							<tr>
								<!--<th>Form Number</th>-->
								<th>Business Number</th>
								<th>Business Name</th>
								<th>Applicant's Name</th>
								<th>Owner's Name</th>
								<th>Requested Date</th>
								<th>Requested Clearance</th>
								<th >Action</th>
								<th hidden>FORM_ID</th>
								<th hidden>CLEARANCE_ID</th>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $approved_application_form; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr class="gradeC" id="	">
								<!--<th><?php echo e($row->FORM_NUMBER); ?></th>-->
								<td><?php echo e($row->BUSINESS_OR_NUMBER); ?></td> 
								<td><?php echo e($row->BUSINESS_NAME); ?></td> 
								<td><?php echo e($row->APPLICANT_NAME); ?></td> 
								<td><?php echo e($row->BUSINESS_OWNER_FIRSTNAME); ?> <?php echo e($row->BUSINESS_OWNER_MIDDLENAME); ?> <?php echo e($row->BUSINESS_OWNER_LASTNAME); ?> </td> 
								<td><?php echo e($row->FORM_DATE); ?></td>
								<td><?php echo e($row->REQUESTED_PAPER_TYPE); ?></td>
								<td>
									<button type="button" class="btn btn-yellow" id="btnPrintClearance"  data-toggle="modal">
										<i class="fa fa-file-alt">&nbsp</i> Print <?php echo e($row->REQUESTED_PAPER_TYPE); ?>

									</button>
								</td> 
								<td hidden><?php echo e($row->FORM_ID); ?></td> 
								<td hidden><?php echo e($row->REQUESTED_PAPER_TYPE_ID); ?></td>
							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		
		<div class="tab-pane fade" id="nav-pills-tab-2">
			<div class="panel panel-inverse">
				<!-- begin panel-heading -->
				<div class="panel-heading">
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
					<h4 class="panel-title">Issuance Verification </h4>
				</div>
				<!-- end panel-heading -->
				<div class="alert alert-yellow fade show">
					<button type="button" class="close" data-dismiss="alert">
						<span aria-hidden="true">×</span>
					</button>
					The following are the existing records of the residents within the system.
				</div>
				
				<!-- begin panel-body -->
				<div class="panel-body">
					<table id="tbl_approved_issuance_resident" class="table table-striped table-bordered">
						<thead>
							<tr id="">
								<th>Resident Name</th> 
								<th>Address</th>
								<th>Age</th>
								<th>Civil Status</th>
								<th>Sex</th>
								<th>Requested Certificate</th>
								<th >Action</th>
								<th hidden >REQUESTED_PAPER_TYPE</th>
								<th hidden >FORM_PAPER_TYPE</th>
								<th hidden >FORM_ID</th>
								<th hidden >REQUESTED_PAPER_TYPE</th>
									
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $application_form_resident; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr id="<?php echo e($row->RESIDENT_ID); ?>">
								<td><?php echo e($row->RESIDENT_NAME); ?></td> 
								<td><?php echo e($row->ADDRESS); ?></td> 
								<td><?php echo e($row->AGE); ?></td> 
								<td><?php echo e($row->CIVIL_STATUS); ?></td>
								<td><?php echo e($row->SEX); ?></td>
								<td><?php echo e($row->REQUESTED_PAPER_TYPE); ?></td>
								<td><button type="button" class="btn btn-yellow" id="btnPrintCertificate" >
									<i class="fa fa-circle"></i> Print <?php echo e($row->REQUESTED_PAPER_TYPE); ?>

								</button></td>
								<td hidden><?php echo e($row->REQUESTED_PAPER_TYPE); ?></td> 
								<td hidden><?php echo e($row->FORM_PAPER_TYPE); ?></td> 
								<td hidden><?php echo e($row->FORM_ID); ?></td> 
								<td hidden><?php echo e($row->REQUESTED_PAPER_TYPE_ID); ?></td>
							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					</table>
				</div>
				<!-- end panel-body -->
			</div> 
		</div>
		
	</div>		
	
	
	<div class="modal fade" id="modal-PrintClearance" data-backdrop="static">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header"  style="background: #FFD900" >
					<h4 class="modal-title" style="color: #fff">Print</h4>
					<button type="button" class="close" onclick="hideModal()" aria-hidden="true" style="color: #fff">×</button>
				</div>
				<div class="modal-body">
					<h3><b><label id="lbl_approved_business_name" >Business:</label></b></h3>
					<form>
						<input class="form-control" type="text" readonly="" id="txt_approved_business_id" >
						<input class="form-control" type="text" readonly="" id="txt_approved_form_id" >
						<input class="form-control" type="text" readonly="" id="txt_clearance_id" >
					</form>
				
				<legend class="m-t-10"></legend>
				<div align="right">
					<a onclick="hideModal()" class="btn btn-white m-r-5" >Close</a>
					<button  class="btn btn-yellow m-r-9" style="background: #FFD900" id="btnEvaluate">Print</button>
				</div>		
			</div>
		</div>
	</div>
</div>
</div>

<div class="fillers" id="fillers" hidden>
	<?php echo $__env->make('certificateandforms.fm_bbp_001_printable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->make('certificateandforms.fm_bc_001a_printable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->make('certificateandforms.fm_bc_001b_printable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->make('certificateandforms.fm_bc_001c_printable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->make('certificateandforms.fm_bc_001d_printable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->make('certificateandforms.fm_bc_001e_printable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


	<?php echo $__env->make('certificateandforms.fm_bcert_001a_printable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->make('certificateandforms.fm_bcert_001b_printable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->make('certificateandforms.fm_bcert_001c_printable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->make('certificateandforms.fm_bcert_001d_printable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->make('certificateandforms.fm_bcert_001e_printable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->make('certificateandforms.fm_bcert_001f_printable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-js'); ?>

<script>
	$(document).ready(function() {
		App.init();
		TableManageDefault.init();
		$("table[id='tbl_pending_issuance']").DataTable();
		$("table[id='tbl_business_approved_lst']").DataTable({
			"bSort" : false

		});
		$("table[id='tbl_approved_issuance_resident']").DataTable();
	});

	$('#tbl_business_approved_lst').on('click', '#btnPrintClearance', function(){
		let row = $(this).closest("tr")
		, business_name =  $(row.find("td")[2]).text()
		, requested_paper_type = $(row.find("td")[6]).text()
		, clearance_id = $(row.find("td")[9]).text()
		, form_id =  $(row.find("td")[8]).text();

		$("#txt_approved_business_id").val(row.attr("id"));
		$('#lbl_approved_business_name').text(business_name);
		$('#txt_approved_form_id').val(form_id);
		$('#txt_clearance_id').val(clearance_id);


		let data = {
			'_token' : " <?php echo e(csrf_token()); ?>"
			,'FORM_ID' : form_id
			,'REQUESTED_PAPER_TYPE' : requested_paper_type
		};

		$.ajax({
			url : "<?php echo e(route('SpecificBusiness')); ?>",
			method : 'POST',
			data : data,
			success : function(response) {
				var request_paper = response["requested_paper_type"];
				// alert(request_paper);
				if(request_paper == "Barangay Business Permit"){
					var company_name, address, nature_business, tax_year, quarter, or_no, or_date, or_amount, barangay_permit, business_tax, garbage_fee, signboard, ctc;
					$.each(response["business_permit"], function(){
						company_name = this["BUSINESS_NAME"];
						address = this["BUSINESS_ADDRESS"];
						nature_business = this["BUSINESS_NATURE_NAME"];
						tax_year = this["TAX_YEAR"];
						quarter = this["QUARTER"];
						or_no = this["OR_NO"];
						or_date = this["OR_DATE"];
						or_amount = this["OR_AMOUNT"];
						barangay_permit = this["BARANGAY_PERMIT"];
						business_tax = this["BUSINESS_TAX"];
						garbage_fee = this["GARBAGE_FEE"];
						signboard = this["SIGNBOARD"];
						ctc = this["CTC"];
					});
						//set value here
						$("#lbl_company_name").text(company_name);
						$("#lbl_business_address").text(address);
						$("#lbl_line_business").text(nature_business);
						$("#lbl_or_number").text(or_no);
						$("#lbl_or_date").text(or_date);
						$("#lbl_or_amount").text(or_amount);
						$("#lbl_barangay_permit").text(barangay_permit);
						$("#lbl_business_tax").text(business_tax);
						$("#lbl_garbage_fee").text(garbage_fee);
						$("#lbl_signboard").text(signboard);
						$("#lbl_ctc").text(ctc);
						$("#lbl_tax_year").text(tax_year);
						$("#lbl_qtr").text(quarter);

						 //print here
						 $("#fmbbp001").printThis({
						 	debug: false,              
						 	debug: false,              
						 	importCSS: true,         
						 	importStyle:true,    
						 	loadCSS: "",              
						 	pageTitle: "fdas",              
						 	removeInline: false,       
						 	printDelay: 1000,       
						 	header: null,              
						 	footer: "",              
						 	base: false ,               
						 	formValues: true,           
						 	canvas: false,              
						 	doctypeString: null,       
						 	removeScripts: false,     
						 	copyTagClasses: false    	        
						 });
				   		// console.log('helloworld');
			   	}
			   	else if (request_paper == "Barangay Clearance Building"){
			   		var owner, address, project_name, project_location, or_no, or_date, or_amount, control_no;

			   		$.each(response["barangay_clearance"], function(){
			   			owner = this["BUSINESS_OWNER"];
			   			address  = this["BUSINESS_ADDRESS"];
			   			project_name  = this["PROJECT_NAME"];
			   			project_location = this["PROJECT_LOCATION"];
			   			or_no = this["OR_NO"];
			   			or_date = this["OR_DATE"];
			   			or_amount = this["OR_AMOUNT"];
			   			control_no = this["CONTROL_NO"];
			   		});
						//set value here
						$("#lbl_control_no_a").text(control_no);
						$("#lbl_or_no_a").text(or_no);
				   		// $("#lbl_issued_date_a").text();
				   		$("#lbl_or_date_a").text(or_date);
				   		$("#lbl_amount_a").text(or_amount);
				   		$("#lbl_applicant_a").text(owner);
				   		$("#lbl_scope_of_work_name_a").text(project_name);
				   		$("#lbl_address_a").text(address);
				   		// $("#lbl_wordings_a").text();
				   		$("#lbl_construction_location_a").text(project_location);
				   		// $("#").text(); 	
				   		

						 //print here
						 $("#fmbc001a").printThis({
						 	debug: false,              
						 	debug: false,              
						 	importCSS: true,         
						 	importStyle:true,    
						 	loadCSS: "",              
						 	pageTitle: "fdas",              
						 	removeInline: false,       
						 	printDelay: 1000,       
						 	header: null,              
						 	footer: "",              
						 	base: false ,               
						 	formValues: true,           
						 	canvas: false,              
						 	doctypeString: null,       
						 	removeScripts: false,     
						 	copyTagClasses: false    	        
						 });
				}
				else if (request_paper == "Barangay Clearance Business"){
					var company_name, address, nature_business, or_no, or_date, or_amount, control_no;

					$.each(response["barangay_clearance"], function(){
						company_name = this["BUSINESS_NAME"];
						address = this["BUSINESS_ADDRESS"];
						nature_business = this["LINE_OF_BUSINESS_NAME"];
						or_no = this["OR_NO"];
						or_date = this["OR_DATE"];
						or_amount = this["OR_AMOUNT"];
						control_no = this["CONTROL_NO"];

					});
					//set value here
			   		// $("#").text();
			   		$("#lbl_control_no_b").text(control_no);
			   		$("#lbl_or_no_b").text(or_no);
			   		$("#lbl_or_date_b").text(or_date);
			   		$("#lbl_amount_b").text(or_amount);
			   		$("#lbl_company_name_b").text(company_name);
			   		$("#lbl_address_b").text(address);
			   		$("#lbl_nature_of_business_b").text(nature_business);
			   		

					 //print here
					 $("#fmbc001b").printThis({
					 	debug: false,              
					 	debug: false,              
					 	importCSS: true,         
					 	importStyle:true,    
					 	loadCSS: "",              
					 	pageTitle: "fdas",              
					 	removeInline: false,       
					 	printDelay: 1000,       
					 	header: null,              
					 	footer: "",              
					 	base: false ,               
					 	formValues: true,           
					 	canvas: false,              
					 	doctypeString: null,       
					 	removeScripts: false,     
					 	copyTagClasses: false    	        
					 });
				}
				else if (request_paper == "Barangay Clearance Zonal"){
					var oct_tct, tax_declaration, area, location, registered_owner, area_classification, address, purpose, or_no, or_date, or_amount, control_no;

					$.each(response["barangay_clearance"], function(){

						oct_tct = this["OCT_TCT_NUMBER"];
						tax_declaration = this["TAX_DECLARATION"];
						area = this["BUSINESS_AREA"];
						location = this["PROJECT_LOCATION"];
						registered_owner = this["BUSINESS_OWNER"];
						area_classification = this["AREA_CLASSIFICATION"];
						address = this["BUSINESS_ADDRESS"];
						purpose = this["PURPOSE"];
						or_no = this["OR_NO"];
						or_date = this["OR_DATE"];
						or_amount = this["OR_AMOUNT"];
						control_no = this["CONTROL_NO"];

					});
					//set value here
					$("#lbl_control_no_c").text(control_no);
					$("#lbl_or_no_c").text(or_no);
					$("#lbl_or_date_c").text(or_date);
					$("#lbl_amount_c").text(or_amount);
					$("#lbl_oct_tct_c").text(oct_tct);
					$("#lbl_tax_declaration_c").text(tax_declaration);
					$("#lbl_area_c").text(area);
					$("#lbl_location_c").text(location);
					$("#lbl_registered_owner_c").text(registered_owner);
					$("#lbl_area_classification_c").text(area_classification);
					$("#lbl_owner_c").text(registered_owner);
					$("#lbl_address_c").text(address);
					$("#lbl_purpose_c").text(purpose);

					 //print here
					 $("#fmbc001c").printThis({
					 	debug: false,              
					 	debug: false,              
					 	importCSS: true,         
					 	importStyle:true,    
					 	loadCSS: "",              
					 	pageTitle: "fdas",              
					 	removeInline: false,       
					 	printDelay: 1000,       
					 	header: null,              
					 	footer: "",              
					 	base: false ,               
					 	formValues: true,           
					 	canvas: false,              
					 	doctypeString: null,       
					 	removeScripts: false,     
					 	copyTagClasses: false    	        
					 });
				}
				else if (request_paper == "Barangay Clearance Tricycle"){
					var tricycle_operator, company_name, address, driver_license, mudguard_no, cr_no, or_no_driver, or_no, or_date, or_amount, control_no;

					$.each(response["barangay_clearance"], function(){
						tricycle_operator = this["APPLICANT_NAME"];
						company_name = this["BUSINESS_NAME"];
						address = this["BUSINESS_ADDRESS"];
						driver_license = this["D_DRIVER_LICENSE_NO"];
						mudguard_no = this["D_MUDGUARD_NO"];
						cr_no = this["D_CR_NO"];
						or_no_driver = this["D_OR_NO"];
						or_no = this["OR_NO"];
						or_date = this["OR_DATE"];
						or_amount = this["OR_AMOUNT"];
						control_no = this["CONTROL_NO"];
					});
					//set value here
					$("#lbl_control_no_d").text(control_no);
					$("#lbl_or_no_d").text(or_no);
					$("#lbl_or_date_d").text(or_date);
					$("#lbl_amount_d").text(or_amount);
					$("#lbl_tricycle_operator_d").text(tricycle_operator);
					$("#lbl_company_name_d").text(company_name);
					$("#lbl_address_d").text(address);
					$("#lbl_drivers_license_d").text(driver_license);
					$("#lbl_mudguard_no_d").text(mudguard_no);
					$("#lbl_cr_no_d").text(cr_no);
					$("#lbl_or_no_driver_d").text(or_no_driver);



				 	//print here
					$("#fmbc001d").printThis({
					 	debug: false,              
					 	debug: false,              
					 	importCSS: true,         
					 	importStyle:true,    
					 	loadCSS: "",              
					 	pageTitle: "fdas",              
					 	removeInline: false,       
					 	printDelay: 1000,       
					 	header: null,              
					 	footer: "",              
					 	base: false ,               
					 	formValues: true,           
					 	canvas: false,              
					 	doctypeString: null,       
					 	removeScripts: false,     
					 	copyTagClasses: false    	        
					});
				}
				else if (request_paper == "Barangay Clearance General Purposes"){
					alert('General Purposes!');
					var activity, company_name, address, or_no, or_date, or_amount, control_no;

					$.each(response["barangay_clearance"], function(){

						activity = this["PURPOSE"];
						company_name = this["BUSINESS_NAME"];
						address = this["BUSINESS_ADDRESS"];
						or_no = this["OR_NO"];
						or_date = this["OR_DATE"];
						or_amount = this["OR_AMOUNT"];
						control_no = this["CONTROL_NO"];
					});
					//set value here
					$("#lbl_control_no_e").text(control_no);
					$("#lbl_or_no_e").text(or_no);
					$("#lbl_or_date_e").text(or_date);
					$("#lbl_amount_e").text(or_amount);
					$("#lbl_activity_e").text(activity);
					$("#lbl_company_name_e").text(company_name);
					$("#lbl_address_e").text(address);


					 //print here
					$("#fmbc001e").printThis({
					 	debug: false,              
					 	debug: false,              
					 	importCSS: true,         
					 	importStyle:true,    
					 	loadCSS: "",              
					 	pageTitle: "fdas",              
					 	removeInline: false,       
					 	printDelay: 1000,       
					 	header: null,              
					 	footer: "",              
					 	base: false ,               
					 	formValues: true,           
					 	canvas: false,              
					 	doctypeString: null,       
					 	removeScripts: false,     
					 	copyTagClasses: false    	        
					});
				}
			},
			error : function(error){
				console.log("error: " + error);
			}
			});	
	});


	$('#tbl_approved_issuance_resident').on('click', '#btnPrintCertificate', function(){
		let row = $(this).closest("tr")
		, resident_name =  $(row.find("td")[0]).text()
		, requested_paper_type = $(row.find("td")[5]).text()
		, certificate_id = $(row.find("td")[10]).text()
		, form_id =  $(row.find("td")[9]).text();

		$("#txt_approved_business_id").val(row.attr("id"));
		$('#txt_approved_form_id').val(form_id);
		$('#txt_clearance_id').val(certificate_id);


		let data = {
			'_token' : " <?php echo e(csrf_token()); ?>"
			,'FORM_ID' : form_id
			,'REQUESTED_PAPER_TYPE' : requested_paper_type
		};
		console.log(data);
		$.ajax({
			url : "<?php echo e(route('SpecificResident')); ?>",
			method : 'POST',
			data : data,
			success : function(response) {
				var request_paper = response["requested_paper_type"];
					// 	A
					if(request_paper == "Barangay Certificate Residency"){
						var civil_status, address, sex, purpose;
						var control_no, or_no, or_date, or_amount, applicant;
						$.each(response["barangay_certificate"], function(){
							control_no = this["CONTROL_NO"];
							or_no = this["OR_NO"];
							or_date = this["OR_DATE"];
							or_amount = this["OR_AMOUNT"];
							applicant = this["RESIDENT_NAME"]; 
							civil_status = this["CIVIL_STATUS"];
							address = this["ADDRESS"];
							sex = this["SEX_ADDRESS "];
							purpose = this["PURPOSE"];
						});
							//set value hrefe
							$("#lbl_control_no_a_r").text(control_no);
							$("#lbl_or_no_a_r").text(or_no);
							$("#lbl_or_date_a_r").text(or_date);
							$("#lbl_amount_a_r").text(or_amount);
							$("#lbl_applicant_a_r").text(applicant);
							$("#lbl_civil_status_a_r").text(civil_status);
							$("#lbl_address_a_r").text(address);
							$("#lbl_applicant2_a_r").text(applicant);
							$("#lbl_sex_a_r").text(sex);
							$("#lbl_purpose_a_r").text(purpose);
							
							 //print here
							 $("#fmbcert001a").printThis({
							 	debug: false,              
							 	debug: false,              
							 	importCSS: true,         
							 	importStyle:true,    
							 	loadCSS: "",              
							 	pageTitle: "fdas",              
							 	removeInline: false,       
							 	printDelay: 1000,       
							 	header: null,              
							 	footer: "",              
							 	base: false ,               
							 	formValues: true,           
							 	canvas: false,              
							 	doctypeString: null,       
							 	removeScripts: false,     
							 	copyTagClasses: false    	        
							 });
					}
					// B
					else if (request_paper == "Barangay Certificate Calamity Loan SSS-GSIS"){
						var  sss, civil_status, address, calamity_name, calamity_date;
						var control_no, or_no, or_date, or_amount, applicant;
						$.each(response["barangay_certificate"], function(){
							control_no = this["CONTROL_NO"];
							or_no = this["OR_NO"];
							or_date = this["OR_DATE"];
							or_amount = this["OR_AMOUNT"];
							applicant = this["RESIDENT_NAME"]; 
							sss = this["SSS_NO"];
							civil_status = this["CIVIL_STATUS"];
							address = this["ADDRESS"];
							calamity_name = this["CALAMITY_NAME"];
							calamity_date = this["CALAMITY_DATE"];
						});
							//set value here
							$("#lbl_control_no_b_r").text(control_no);
							$("#lbl_or_no_b_r").text(or_no);
							$("#lbl_or_date_b_r").text(or_date);
							$("#lbl_amount_b_r").text(or_amount);
							$("#lbl_applicantB_r").text(applicant);
							$("#lbl_sss_gsisB_r").text(sss);
							$("#lbl_civil_statusB_r").text(civil_status);
							$("#lbl_addressB_r").text(address);
							$("#lbl_calamity_name_r").text(calamity_name);
							$("#lbl_calamity_date_r").text(calamity_date);
							
							 //print here
							 $("#fmbcert001b").printThis({
							 	debug: false,              
							 	debug: false,              
							 	importCSS: true,         
							 	importStyle:true,    
							 	loadCSS: "",              
							 	pageTitle: "fdas",              
							 	removeInline: false,       
							 	printDelay: 1000,       
							 	header: null,              
							 	footer: "",              
							 	base: false ,               
							 	formValues: true,           
							 	canvas: false,              
							 	doctypeString: null,       
							 	removeScripts: false,     
							 	copyTagClasses: false    	        
							 });
					}
					// C
					else if (request_paper == "Barangay Certificate Calamity Loan OFW"){
						var sss, civil_status, address, calamity_name, calamity_date, country;
						var control_no, or_no, or_date, or_amount, applicant;
						$.each(response["barangay_certificate"], function(){
							control_no = this["CONTROL_NO"];
							or_no = this["OR_NO"];
							or_date = this["OR_DATE"];
							or_amount = this["OR_AMOUNT"];
							applicant = this["RESIDENT_NAME"]; 
							sss = this["SSS_NO"];
							civil_status = this["CIVIL_STATUS"];
							address = this["ADDRESS"];
							calamity_name = this["CALAMITY_NAME"];
							calamity_date = this["CALAMITY_DATE"];
							country = this["COUNTRY"];
						});
							//set value here
							$("#lbl_control_no_c_r").text(control_no);
							$("#lbl_or_no_c_r").text(or_no);
							$("#lbl_or_date_c_r").text(or_date);
							$("#lbl_amount_c_r").text(or_amount);
							$("#lbl_sss_noC_r").text(sss);
							$("#lbl_civil_statusC_r").text(civil_status);
							$("#lbl_addressC_r").text(address);
							$("#lbl_calamity_name_c_r").text(calamity_name);
							$("#lbl_calamity_date_c_r").text(calamity_date);
							$("#lbl_applicant2C_r").text(applicant);
							$("#lbl_country_c_r").text(country);
							
							 //print here
							 $("#fmbcert001c").printThis({
							 	debug: false,              
							 	debug: false,              
							 	importCSS: true,         
							 	importStyle:true,    
							 	loadCSS: "",              
							 	pageTitle: "fdas",              
							 	removeInline: false,       
							 	printDelay: 1000,       
							 	header: null,              
							 	footer: "",              
							 	base: false ,               
							 	formValues: true,           
							 	canvas: false,              
							 	doctypeString: null,       
							 	removeScripts: false,     
							 	copyTagClasses: false    	        
							 });
					}
					// D
					else if (request_paper == "Barangay Certificate SPES"){
						var address, sex_address;
						var control_no, or_no, or_date, or_amount, applicant;
						$.each(response["barangay_certificate"], function(){
							control_no = this["CONTROL_NO"];
							or_no = this["OR_NO"];
							or_date = this["OR_DATE"];
							or_amount = this["OR_AMOUNT"];
							applicant = this["RESIDENT_NAME"]; 
							address = this["ADDRESS"];
							sex_address = this["SEX_ADDRESS"];
						});
						var he_she; 
						if (sex_address == "her")
							he_she = "she";
						else
							he_she = "he";
							//set value here
							$("#lbl_control_no_d_r").text(control_no);
							$("#lbl_or_no_d_r").text(or_no);
							$("#lbl_or_date_d_r").text(or_date);
							$("#lbl_amount_d_r").text(or_amount);
							$("#lbl_addressD_r").text(address);
							$("#lbl_sexD_r").text(he_she);
							$("#lbl_sex2D_r").text(sex_address);
							$("#lbl_applicantD_r").text(applicant);
							
							 //print here
							 $("#fmbcert001d").printThis({
							 	debug: false,              
							 	debug: false,              
							 	importCSS: true,         
							 	importStyle:true,    
							 	loadCSS: "",              
							 	pageTitle: "fdas",              
							 	removeInline: false,       
							 	printDelay: 1000,       
							 	header: null,              
							 	footer: "",              
							 	base: false ,               
							 	formValues: true,           
							 	canvas: false,              
							 	doctypeString: null,       
							 	removeScripts: false,     
							 	copyTagClasses: false    	        
							 });
					}
					// E
					else if (request_paper == "Barangay Certificate Solo Parent"){
						var age, address, requestor, single_parent_category, child_name, chile_age, child_pwd, child_name_2, chile_age_2, child_pwd_2;
						var control_no, or_no, or_date, or_amount, applicant;
						$.each(response["barangay_certificate"], function(){
							control_no = this["CONTROL_NO"];
							or_no = this["OR_NO"];
							or_date = this["OR_DATE"];
							or_amount = this["OR_AMOUNT"];
							applicant = this["RESIDENT_NAME"]; 
							age = this["AGE"];
							address = this["ADDRESS"];
							requestor = this["REQUESTOR_NAME"];
							single_parent_category = this["CATEGORY_SINGLE_PARENT"];
							child_name = this["CHILD_NAME"];
							chile_age = this["CHILD_AGE"];
							child_pwd = this["IS_PWD"];
							child_name_2 = this["CHILD_NAME_2"];
							chile_age_2 = this["CHILD_AGE_2"];
							child_pwd_2 = this["IS_PWD_2"];
						});
							//set value here
							$("#lbl_control_no_e_r").text(control_no);
							$("#lbl_or_no_e_r").text(or_no);
							$("#lbl_or_date_e_r").text(or_date);
							$("#lbl_amount_e_r").text(or_amount);
							$("#lbl_applicantE_r").text(applicant);
							$("#lbl_ageE_r").text(age);
							$("#lbl_addressE_r").text(address);
							$("#lbl_applicant2E_r").text(applicant);
							$("#lbl_single_parent_category_r").text(single_parent_category);
							$("#lbl_child_name1").text(child_name);
							$("#lbl_child_age1").text(chile_age);
							$("#lbl_child_pwd1").text(child_pwd);
							$("#lbl_child_name2").text(child_name_2);
							$("#lbl_child_age2").text(chile_age_2);
							$("#lbl_child_pwd2").text(child_pwd_2);
							$("#lbl_requestor_name_e_r").text(requestor);
							
							 //print here
							 $("#fmbcert001e").printThis({
							 	debug: false,              
							 	debug: false,              
							 	importCSS: true,         
							 	importStyle:true,    
							 	loadCSS: "",              
							 	pageTitle: "fdas",              
							 	removeInline: false,       
							 	printDelay: 1000,       
							 	header: null,              
							 	footer: "",              
							 	base: false ,               
							 	formValues: true,           
							 	canvas: false,              
							 	doctypeString: null,       
							 	removeScripts: false,     
							 	copyTagClasses: false    	        
							 });
					}
					// F
					else if (request_paper == "Barangay Certificate Indigency"){
						var age, civil_status, address, sex_address, purpose;
						var control_no, or_no, or_date, or_amount, applicant;
						$.each(response["barangay_certificate"], function(){
							control_no = this["CONTROL_NO"];
							or_no = this["OR_NO"];
							or_date = this["OR_DATE"];
							or_amount = this["OR_AMOUNT"];
							applicant = this["RESIDENT_NAME"]; 
							age = this["AGE"];
							civil_status = this["CIVIL_STATUS"];
							address = this["ADDRESS"];
							sex_address = this["SEX_ADDRESS"];
							purpose = this["PURPOSE"];

						});
							//set value here
							$("#lbl_control_no_f_r").text(control_no);
							$("#lbl_or_no_f_r").text(or_no);
							$("#lbl_or_date_f_r").text(or_date);
							$("#lbl_amount_f_r").text(or_amount);
							$("#lbl_applicantF_r").text(applicant);
							$("#lbl_ageF_r").text(age);
							$("#lbl_civil_statusF_r").text(civil_status);
							$("#lbl_addressF_r").text(address);
							$("#lbl_sexF_r").text(sex_address);
							$("#lbl_purposeF_r").text(purpose);
							
							 //print here
							 $("#fmbcert001f").printThis({
							 	debug: false,              
							 	debug: false,              
							 	importCSS: true,         
							 	importStyle:true,    
							 	loadCSS: "",              
							 	pageTitle: "fdas",              
							 	removeInline: false,       
							 	printDelay: 1000,       
							 	header: null,              
							 	footer: "",              
							 	base: false ,               
							 	formValues: true,           
							 	canvas: false,              
							 	doctypeString: null,       
							 	removeScripts: false,     
							 	copyTagClasses: false    	        
							 });
					}

			

				},
				error : function(error){
					console.log("error: " + error);
				}
			});	

	});

	// for modal
	function hideModal(){$('#modal-Evaluate').modal('hide');$('#modal-PrintClearance').modal('hide');}
</script>


<script src="<?php echo e(asset('custom/jasonday-printThis-edc43df/printThis.js')); ?>"></script>

<script src="<?php echo e(asset('assets/plugins/DataTables/media/js/jquery.dataTables.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/demo/table-manage-default.demo.min.js')); ?>"></script>

<script src="<?php echo e(asset('assets/plugins/gritter/js/jquery.gritter.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/bootstrap-sweetalert/sweetalert.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/demo/ui-modal-notification.demo.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/bootstrap-sweetalert/sweetalert.min.js')); ?>"></script>


<script src="<?php echo e(asset('assets/plugins/parsley/dist/parsley.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/jquery-smart-wizard/src/js/jquery.smartWizard.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/demo/form-wizards-validation.demo.min.js')); ?>"></script>

<?php $__env->stopSection(); ?>















































<?php echo $__env->make('global.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bitbo_installer\www\resources\views/permit_certification_clearance/issuance.blade.php ENDPATH**/ ?>