

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">

    <title>List of Barangay Officials</title>
     <div align="center">
        <figure>
            <img src="<?php echo e(public_path()); ?>/upload/barangay/<?php echo e(session('session_barangay_logo')); ?>" alt="Republic of the Philippines" width="100px" />
            <figcaption>Republic of the Philippines</figcaption>
             <figcaption style="text-align: center"><b style="text-decoration: underline;">Barangay Information System</b></figcaption><br>
             <figcaption>List of Barangay Officials Generated By The System.</figcaption>
        </figure>
         
    </div>
    <div class="row" style="padding:4px; background-color: #666666; margin-bottom: 4px; "></div>
    <style>
    .text-right {
        text-align: right;
    }
    
    </style>
   
     
</head>
    
   
   
<body style="background: white">

    <div class="panel-body">
      <!-- FIRST ROW -->
      <p style="font-size: 18px">
         
      </p>

      <style>
      table, td, th{
          border: 1px solid black;
          border-collapse: collapse;
      }
      .borderless{
          border-bottom: 0px;
          border-left: 0px;
          border-right: 0px;
          border-top:0px;
          border-collapse: separate;
      }
      </style>
   
         <table style="width: 100%; background-color: transparent">
             <tr>
            
              <td class="borderless" style="width: 70%">Barangay Name: <b ><?php echo e(session('session_barangay_name')); ?></b></td>
              <td class="borderless" style="width: 30%">Year: <?php echo date('F d, Y');?><b style="text-decoration: underline;"></b></td>
              
          </tr>
          
      </table>
      <br>
      <table style="font-size: 15px; width: 100%;" border="1" cellpadding="5">
          <thead style="text-align:center" >
              <tr>
                  <th colspan="1"> No.</th>
                  <th colspan="3"> Full Name </th>
                  <th colspan="3"> Barangay Name </th>
                  <th colspan="3"> Position Name </th>
                
                  <th colspan="3"> Start Term </th>

                  <th colspan="3"> End Term </th>
                  
                  
              </tr>
          </thead>
          <tbody>
            
            <?php $i = 1 ; $y = 1 ?>

            <?php $__currentLoopData = $DisplayTable; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td colspan="1" style=" text-align: center; width:8%"><?php echo e($i++); ?></td>
                <td colspan="3" style=" text-align: center; width:13%"><?php echo e($row->Fullname); ?></td>
                <td colspan="3" style=" text-align: center; width:13%"><?php echo e($row->BARANGAY_NAME); ?></td>
                <td colspan="3" style=" text-align: center; width:13%"><?php echo e($row->POSITION_NAME); ?></td>

                <td colspan="3" style=" text-align: center; width:13%"><?php echo e($row->Start_Term); ?></td>
                <td colspan="3" style=" text-align: center; width:13%"><?php echo e($row->End_Term); ?></td>

            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
        </tbody>                                 
    </table>
</div><br>
    <div class="row" style="padding:4px; background-color: #666666; margin-bottom: 4px; "></div>
     <div class="" style="font-size: 17px; font-family: arial; text-align: center">
        <br>
        <br>
       
     </div>
     <!-- end panel-body -->
     <div class="panel" style="text-align: center">
        <b>Generated by</b><br><br>
        <p style="font-family: arial">
          <u><?php echo e(session('session_full_name')); ?></u><br>
          Name and Signature<br><br>
          <u><?php echo date('F d, Y');?></u>
          <br>
          Date
        </p>
     </div>
</div>
<!-- END TABLE -->

</body>
</html>

<script type="text/javascript"> 
</script>
<!--  <label><b>CERTIFICATION</b></label>
        <p style="margin: 20px">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        I hereby certify on my official oath that the foregoing is a correct and complete record of all residents.
        </p> --><?php /**PATH D:\BITBO_INSTALLER\4. BITBo\www\resources\views/lisofbrgyofficialsprintable.blade.php ENDPATH**/ ?>