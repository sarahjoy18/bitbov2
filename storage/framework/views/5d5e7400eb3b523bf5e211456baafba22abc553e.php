	
	<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex">
	<div id="print_form" class="panel-body" style=" letter-spacing: 2px;">
		 <div align="center">
    		<figure>
		    <img src="<?php echo e(asset('upload/barangay/'.session('session_barangay_logo'))); ?>" alt="Republic of the Philippines" width="100px" />
		      <figcaption>Republic of the Philippines</figcaption>
		      <figcaption style="text-align: center"><b style="text-decoration: underline;">Barangay Information System</b></figcaption><br>
		      
		    </figure>

		  </div>
		<p style="text-align: center; margin-bottom: 1px; padding: -1px; font-size: large;">Republic of the Philippines</p>
		<p style="text-align: center; margin-bottom: 1px; padding: -1px; font-size: large;">Province of Rizal</p>
		<p style="text-align: center; margin-bottom: 1px; padding: -1px; font-size: large;">Municipality of Tanay</p>
		<p style="text-align: center; margin-bottom: 1px; padding: -1px; font-size: large;"><strong>BARANGAY <?php echo e(session('session_barangay_name')); ?></strong></p>
		<p style="text-align: center; margin-bottom: 1px; padding: -1px; font-size: large;">&nbsp;</p>
		<p style="text-align: center; margin-bottom: 1px; padding: -1px; font-size: large;">&nbsp;</p>
		<p style="text-align: center; margin-bottom: 1px; padding: -1px; font-size: large;"><strong>PATAWAG</strong></p>
		<p style="text-align: center; margin-bottom: 1px; padding: -1px; font-size: large;">(SUMMON)</p>
		<p style="margin-bottom: 2px; padding: -2px; ">&nbsp;</p>
		<p style="margin-bottom: 2px; padding: -2px; ">&nbsp;</p>
		<p style="margin-bottom: 2px; margin-left: 50px; padding: -2px; font-size: large;"><u id="lbl_complainant"></u></p>
		<p style="margin-bottom: 2px; margin-left: 50px; padding: -2px; font-size: large;"><strong>NAGSUSUMBONG</strong></p>
		<p style="margin-bottom: 2px; margin-left: 50px; padding: -2px; font-size: large;">(COMPLAINANT)</p>
		<p style="margin-bottom: 2px; padding: -2px;">&nbsp;</p>
		<p style="margin-bottom: 2px; padding: -2px;">&nbsp;</p>
		<p style="margin-bottom: 2px; margin-left: 50px; padding: -2px; font-size: large;"><strong>LABAN KAY:</strong></p>
		<p style="margin-bottom: 2px; margin-left: 50px; padding: -2px; font-size: large;"><u id="lbl_accused"></u></p>
		<p style="margin-bottom: 2px; margin-left: 50px; padding: -2px; font-size: large;"><strong>IPINAGSUSUMBONG</strong></p>
		<p style="margin-bottom: 2px; margin-left: 50px; padding: -2px; font-size: large;">(ACCUSED)</p>
		<p style="margin-bottom: 2px; padding: -2px;">&nbsp;</p>
		<p style="text-align: right; margin-bottom: 2px; margin-right: 100px; font-size: large;"><strong>UKOL/PARA sa: &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</strong></p> 
		<p style="text-align: left; margin-bottom: 2px; margin-left: 590px; font-size: large;"><u id="lbl_blotsub"></u></p> 
		<p style="margin-bottom: 2px; padding: -2px;">&nbsp;</p>
		<br>
		<br>
		<p style="text-align: left; margin-bottom: 2px; margin-left: 50px; margin-right: 50px; font-size: large;">&emsp;&emsp; Sa pamamagitan nito, kayo ay aking tinatawagan upang humarap sa akin ng personal sa ika- <u class="day">(araw)</u> ng <u id="month-year">(buwan at taon)</u>, sa takdang oras na <u id="time">(oras)</u> sa <u id="lbl_place"></u></p> 
		<p style="margin-bottom: 2px; padding: -2px;">&nbsp;</p>
		<p style="text-align: left; margin-bottom: 2px; margin-left: 50px; margin-right: 50px; font-size: large;">&emsp;&emsp; Sa pamamagitan nito, kayo ay aking pinaaalalahanan na sa inyong hindi pagtalima o kusang pag-iwas sa <strong>PATAWAG</strong> na ito ay mahahadlangan kayong makapagtrabaho ng kontra-demanda sa Hukuman / Tanggapan ng Pamahalaan.</p> 
		<p style="margin-bottom: 2px; padding: -2px;">&nbsp;</p>
		<p style="text-align: left; margin-bottom: 2px; margin-left: 50px; margin-right: 50px; font-size: large;">&emsp;&emsp; <strong>TUPARIN ITO</strong> at kung hindi ay parurusahan kayo sa salang paglapastangan sa Hukuman / Tanggapan ng Pamahalaan (<strong>CONTEMPT OF COURT</strong>)</p> 
		<p style="margin-bottom: 2px; padding: -2px;">&nbsp;</p>
		<p style="text-align: left; margin-bottom: 2px; margin-left: 50px; margin-right: 50px; font-size: large;">&emsp;&emsp; Ginawa ngayong ika- <u>(araw)</u> ng <u>(buwan at taon)</u>.</p>
		<p style="margin-bottom: 2px; padding: -2px;">&nbsp;</p>
		<p style="margin-bottom: 2px; padding: -2px;">&nbsp;</p>
		<br>
		<br>
		<p style="text-align: right; margin-bottom: 2px; margin-right: 50px; font-size: large;"><strong>JUAN DELA CRUZ</strong></p> 
		<p style="text-align: right; margin-bottom: 2px; margin-right: 50px; font-size: large;">Lupon Chairman/Punong Barangay</p> 
		<!-- <p style="text-align: center; margin-bottom: 2px; padding: -2px;font-size: large;">Republika ng Pilipinas, ay pinagkalooban ng pahintulot na mangalakal bilang</p>
		<p style="text-align: center; margin-bottom: 2px; padding: -2px;font-size: large;">(Republic of the Philippines, is hereby granted the permit to operate as)</p>
		<p style="text-align: center; margin-bottom: 2px; padding: -2px;font-size: large;">&nbsp;</p>
		<p style="text-align: center; margin-bottom: 2px; padding: -2px;font-size: large;" id="lbl_line_business"><u>(Line of Business)</u></p> 
		<p style="text-align: center; margin-bottom: 2px; padding: -2px;font-size: large;">&nbsp;</p>
		<p style="text-align: center;margin-bottom: 2px; padding: -2px;font-size: large;">Ngayong ika - <u>(araw)</u> ng <u>(buwan at taon)</u></p>
		<p style="text-align: center;margin-bottom: 2px; padding: -2px; font-size: large;" >(on this)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (day of)</p>
		<p style="text-align: center;margin-bottom: 2px; padding: -2px;">&nbsp;</p>
		<p style="text-align: center;margin-bottom: 2px; padding: -2px;">&nbsp;</p>
		<p style="text-align: center;margin-bottom: 2px; padding: -2px;font-size: large;">Ang pahintulot na ito ay matatapos sa ika &ndash; 31 of December (YYYY)</p>
		<p style="text-align: center;margin-bottom: 2px; padding: -2px;font-size: large;">(This permit expires on)</p>
		<p style="text-align: center;margin-bottom: 2px; padding: -2px;">&nbsp;</p>
		<p style="text-align: center;margin-bottom: 2px; padding: -2px;font-size: large;">Malibang ito&rsquo;y maagang bawiin at pawalang bias.</p>
		<p style="text-align: center;margin-bottom: 2px; padding: -2px;font-size: large;">(unless sooner revoked)</p>
		<p style="text-align: center;margin-bottom: 2px; padding: -2px;font-size: large;">&nbsp;</p>
		<p style="text-align: center;margin-bottom: 2px; padding: -2px;">&nbsp;</p>
		<p style="text-align: center;margin-bottom: 2px; padding: -2px;font-size: large;">(PUNONG BARANGAY)</p>
		<p style="text-align: center;margin-bottom: 2px; padding: -2px;font-size: large;">Punong Barangay</p> -->
		<p>&nbsp;</p>
	</div>
	</head>
	

	</html><?php /**PATH D:\BITBO_INSTALLER\4. BITBo\www\resources\views/cases/summonPrintable.blade.php ENDPATH**/ ?>