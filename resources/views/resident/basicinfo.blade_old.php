@extends('global.main')

@section('title', "BitBo | Residents' Basic Info")

@section('page-css')

<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
<link href="{{asset('assets/plugins/jquery-smart-wizard/src/css/smart_wizard.css')}}" rel="stylesheet" />
<link href="{{asset('assets/plugins/parsley/src/parsley.css')}}" rel="stylesheet" />
<!-- ================== END PAGE LEVEL STYLE ================== -->

<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
<link href="{{ asset('assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css') }}" rel="stylesheet" />
<!-- ================== END PAGE LEVEL STYLE ================== -->

@endsection

@section('page-js')
<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="{{asset('assets/plugins/parsley/dist/parsley.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-smart-wizard/src/js/jquery.smartWizard.js')}}"></script>
<script src="{{asset('assets/js/demo/form-wizards-validation.demo.min.js')}}"></script>
<!-- ================== END PAGE LEVEL JS ================== -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="{{asset('assets/plugins/DataTables/media/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{asset('assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{asset('assets/js/demo/table-manage-default.demo.min.js')}}"></script>
<!-- ================== END PAGE LEVEL JS ================== -->
{{--Modals--}}

<script src="{{asset('assets/plugins/gritter/js/jquery.gritter.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-sweetalert/sweetalert.min.js')}}"></script>
<script src="{{asset('assets/js/demo/ui-modal-notification.demo.min.js')}}"></script>
<!-- ================== BEGIN PAGE LEVEL JS ================== -->

<script src="{{asset('assets/plugins/highlight/highlight.common.js')}}"></script>
<script src="{{asset('assets/js/demo/render.highlight.js')}}"></script>


<script>

    $(document).ready(function() {
        App.init();
        FormWizardValidation.init();
        Notification.init();
        $('#resident_table').DataTable();
    });

</script>

<script type="text/javascript">

    $('#ArrivalReason').change(function () {
        var arrivalreason = $('#ArrivalReason').children(":selected").attr("id");
        if(arrivalreason == 3)
        {
            $('#div_transient').show();
        }
        else
        {
            $('#div_transient').hide();   
        }

    });

</script>
{{--For ADD FORM--}}
<script>
    $('#dateofbirth').change(function () {
        var dtext = $(this).val();
        var cdate = new Date(dtext);
        var dtest = new Date();
        
        var ndate = dtest.toJSON().slice(0, 10); 
        var arr = [];
        $('#educationatt option').each(function() {
            arr.push($(this).val())
        });
        var age = dtest.getFullYear() - cdate.getFullYear();
        
        if(dtext == ndate || age < 5) {
            $('#educationatt').val(arr[6]);
        } else {
            $('#educationatt').val(arr[0]);
        }
    });

    $('#educationatt').change(function () {
        var dtext = $('#dateofbirth').val();
        var cdate = new Date(dtext);
        var dtest = new Date();
        
        var ndate = dtest.toJSON().slice(0, 10); 
        var arr = [];
        $('#educationatt option').each(function() {
            arr.push($(this).val())
        });
        var age = dtest.getFullYear() - cdate.getFullYear();
        
        if(dtext == ndate || age < 5) {
            $('#educationatt').val(arr[6]);
        } else {
            $('#educationatt').val(arr[0]);
        }
    });

    $('#AddBTN').click(function()
    {

                //resident
                var fname = $('#firstname').val();
                var mname = $('#middlename').val();
                var lname = $('#lastname').val();
                var qualifier = $('#qualifier').val();
                var selectedsex = $("input:radio[name=sex_gender]:checked").val();
                var dateofbirth = $('#dateofbirth').val();
                var civilstatus = $('#civilstatus').val();
                var placeofbirth = $('#placeofbirth').val();
                var is_ofw = $("input:radio[name=is_ofw]:checked").val();
                var citizenship = $('#Citizenship').val();
                var occupation = $('#Occupation').val();
                var workstatus = $("#workstatus").children(":selected").attr("value");
                var educationatt = $("#educationatt").children(":selected").attr("value");
                var dateofstartwork = $('#dateofstartwork').val();
                var relationtohead = $('#RelationToHead').val();
                var dateofarrive = $('#dateofarrival').val();
                var is_indegenous = $("input:radio[name=radio_Indigenous]:checked").val();
                var contactnumber = $('#contactnumber').val();
                var homeownership = $('#homeownership').children(":selected").attr("value");
                var buildmaterial = $("input:radio[name=radio_home_materials]:checked").val();
                var numberofrooms = $('#numberofrooms').val();
                var streetno = $('#streetno').val();
                var barangayzone_id = $('#BarangayZone').children(":selected").attr("value");
                var personinhousehold = $("#personinhousehold").children(":selected").attr("value");
                var arrivalreason = $('#ArrivalReason').children(":selected").attr("id");
                var r_coming = $('#r_coming').val();
                var p_startdate = $('#p_startdate').val();
                var p_enddate = $('#p_enddate').val();

                var houseno = $('#houseno').val();
                var hstreet = $('#hstreet').val();
                var hphase = $('#hphase').val();
                var hbuilding = $('#hbuilding').val();
                var hunitno = $('#hunitno').val();
                var hsubdivision = $('#hsubdivision').val();

                if ($("#cssCheckbox1Toilet").is(":checked")){ var toilet = 1; } else if ($("#cssCheckbox1Toilet").is(":not(:checked)")) { var toilet = 0; }

                if ($("#cssCheckbox2Playarea").is(":checked")){ var playarea = 1; } else if ($("#cssCheckbox2Playarea").is(":not(:checked)")) { var playarea = 0; }

                if ($("#cssCheckbox3Bedroom").is(":checked")){ var bedroom = 1; } else if ($("#cssCheckbox3Bedroom").is(":not(:checked)")) { var bedroom = 0; }

                if ($("#cssCheckbox4diningroom").is(":checked")){ var dining = 1; } else if ($("#cssCheckbox4diningroom").is(":not(:checked)")) { var dining = 0; }

                if ($("#cssCheckbox5sala").is(":checked")){ var sala = 1; } else if ($("#cssCheckbox5sala").is(":not(:checked)")) { var sala = 0; }

                if ($("#cssCheckbox6kitchen").is(":checked")){ var kitchen = 1; } else if ($("#cssCheckbox6kitchen").is(":not(:checked)")) { var kitchen = 0; }
                //

                if ($("#cssCheckboxRunningwater").is(":checked")){ var runningwater = 1; } else if ($("#cssCheckboxRunningwater").is(":not(:checked)")) { var runningwater = 0; }

                if ($("#cssCheckboxElectricity").is(":checked")){ var electricity = 1; } else if ($("#cssCheckboxElectricity").is(":not(:checked)")) { var electricity = 0; }

                if ($("#cssCheckboxaircon").is(":checked")){ var aircon = 1; } else if ($("#cssCheckboxaircon").is(":not(:checked)")) { var aircon = 0; }



                if ($("#cssCheckboxmobilephone").is(":checked")){ var mobile = 1; } else if ($("#cssCheckboxmobilephone").is(":not(:checked)")) { var mobile = 0; }

                if ($("#cssCheckboxcomputer ").is(":checked")){ var computer = 1; } else if ($("#cssCheckboxcomputer ").is(":not(:checked)")) { var computer = 0; }

                if ($("#cssCheckboxinternet").is(":checked")){ var internet = 1; } else if ($("#cssCheckboxinternet").is(":not(:checked)")) { var internet = 0; }

                if ($("#cssCheckboxtv").is(":checked")){ var boxtv = 1; } else if ($("#cssCheckboxtv").is(":not(:checked)")) { var boxtv = 0; }

                if ($("#cssCheckboxcdplayer").is(":checked")){ var cdplayer = 1; } else if ($("#cssCheckboxcdplayer").is(":not(:checked)")) { var cdplayer = 0; }

                if ($("#cssCheckboxradio").is(":checked")){ var boxradio = 1; } else if ($("#cssCheckboxradio").is(":not(:checked)")) { var boxradio = 0; }

                if ($("#cssCheckboxcomics").is(":checked")){ var comics = 1; } else if ($("#cssCheckboxcomics").is(":not(:checked)")) { var comics = 0; }

                if ($("#cssCheckboxNewspaper").is(":checked")){ var newspaper = 1; } else if ($("#cssCheckboxNewspaper").is(":not(:checked)")) { var newspaper = 0; }

                if ($("#cssCheckboxPets").is(":checked")){ var pets = 1; } else if ($("#cssCheckboxPets").is(":not(:checked)")) { var pets = 0; }

                if ($("#cssCheckboxbooks").is(":checked")){ var books = 1; } else if ($("#cssCheckboxbooks").is(":not(:checked)")) { var books = 0; }

                if ($("#cssCheckboxstorybooks").is(":checked")){ var storybooks = 1; } else if ($("#cssCheckboxstorybooks").is(":not(:checked)")) { var storybooks = 0; }

                if ($("#cssCheckboxToys").is(":checked")){ var toys = 1; } else if ($("#cssCheckboxToys").is(":not(:checked)")) { var toys = 0; }

                if ($("#cssCheckboxboardgames").is(":checked")){ var boardgames = 1; } else if ($("#cssCheckboxboardgames").is(":not(:checked)")) { var boardgames = 0; }

                if ($("#cssCheckboxpuzzles").is(":checked")){ var puzzles = 1; } else if ($("#cssCheckboxpuzzles").is(":not(:checked)")) { var puzzles = 0; }

                

                var fd = new FormData();
                fd.append('firstname', fname);
                fd.append('middlename', mname);
                fd.append('lastname', lname);
                fd.append('qualifier', qualifier);
                fd.append('sex_gender', selectedsex);
                fd.append('dateofbirth', dateofbirth);
                
                fd.append('civilstatus', civilstatus);
                fd.append('placeofbirth', placeofbirth);
                fd.append('is_ofw', is_ofw);
                fd.append('citizenship', citizenship);
                fd.append('occupation', occupation);
                fd.append('workstatus', workstatus);
                fd.append('dateofstartwork', dateofstartwork);
                fd.append('relationtohead', relationtohead);
                fd.append('dateofarrive', dateofarrive);
                
                fd.append('is_indegenous', is_indegenous);
                fd.append('firstname', fname);
                fd.append('contactnumber', contactnumber);
                fd.append('arrivalreason', arrivalreason);
                fd.append('r_coming', r_coming);
                fd.append('p_startdate', p_startdate);
                fd.append('p_enddate', p_enddate);

                fd.append('houseno', houseno);
                fd.append('hstreet', hstreet);
                fd.append('hphase', hphase);
                fd.append('hbuilding', hbuilding);
                fd.append('hunitno', hunitno);
                fd.append('hsubdivision', hsubdivision);

                fd.append('homeownership', homeownership);
                fd.append('buildmaterial', buildmaterial);
                fd.append('numberofrooms',numberofrooms);
                fd.append('barangayaddress_id',barangayzone_id);
                fd.append('streetno',streetno);
                fd.append('barangayzone_id',barangayzone_id);

                fd.append('toilet', toilet);
                fd.append('playarea', playarea);
                fd.append('bedroom', bedroom);
                fd.append('dining', dining);
                fd.append('sala', sala);
                fd.append('kitchen', kitchen);
                fd.append('runningwater', runningwater);
                fd.append('electricity', electricity);
                fd.append('aircon', aircon);
                fd.append('mobile', mobile);
                fd.append('computer', computer);
                fd.append('internet', internet);
                fd.append('boxtv', boxtv);
                fd.append('cdplayer', cdplayer);
                fd.append('boxradio', boxradio);
                fd.append('comics', comics);
                fd.append('newspaper', newspaper);
                fd.append('pets', pets);
                fd.append('books', books);
                fd.append('storybooks', storybooks);
                fd.append('toys', toys);
                fd.append('boardgames', boardgames);
                fd.append('puzzles', puzzles);
                fd.append('personinhousehold',personinhousehold);
                fd.append('educationatt',educationatt);

                fd.append('_token',"{{ csrf_token() }}");

                let result;
                Add(fd);
                
            });

async function Add(fd) {

 swal("Data have been successfully added!", {
    icon: "success", 
});

 try
 {
    result = await $.ajax({
        url:"{{route('BasicInfoAdd')}}",
        type:'post',
        processData:false,
        contentType:false,
        cache:false,
        data:fd,
        success:function(data)
        {
            if (data == "good")
            {
                window.location.reload();
            }     
        }    
    })
}
catch(error)
{
    console.error(error)
}
}
</script>


</script>

<script type="text/javascript">
     // 15 POB 16 unitNO 17 PHASE 18 HOUSENO 19 STREET 20 SUBDIVI 21 BUILDING
     $(document).ready(function (){
       $("#resident_table tbody").on('click', 'tr', function () {
        var parse_numer, housenum;
        var res_id = table.cell( this, 0).data();
        var lastname = table.cell( this, 1).data();
        var firstname = table.cell( this, 2).data();
        var middlename = table.cell( this, 3).data();
        var q_name = table.cell( this, 4).data();
        var occupation = table.cell( this, 8).data();
        var citizenship = table.cell( this, 10).data();
        var r_head = table.cell( this, 11).data();
        var contactnumber = table.cell( this, 12).data();

        var bdate = table.cell( this, 13).data();
        var place_of_birth = table.cell( this, 14).data();
        var unit_no = table.cell( this, 15).data();
        var phase = table.cell( this, 16).data();
        var house_no = table.cell( this, 17).data();
        var street = table.cell( this, 18).data();
        var subdivi = table.cell( this, 19).data();
        var building = table.cell( this, 20).data();
        var started_working = table.cell( this, 21).data();
        var date_arrival = table.cell( this, 22).data();
        var fullname = lastname + ", " + firstname + " " + middlename;

        var cr = new Date();
        var dt =  new Date(bdate);
        var dob = dt.getFullYear();
        var cy = cr.getFullYear();
        var age = cy - dob;
        

        if (contactnumber != null) { parse_number = parseInt(contactnumber); }
        if (house_no != null) { housenum = parseInt(house_no); }
        $('#editage').val(age);
        $('#edit_db_name').text(fullname);
        $('#EditCatID').val(res_id);
        $('#editlname').val(lastname);
        $('#editfname').val(firstname);
        $('#editmname').val(middlename);
        $('#editqname').val(q_name);
        $('#editoccu').val(occupation);
        $('#editcitiz').val(citizenship);
        $('#edithead').val(r_head);
        $('#editcontact').val(parse_number);
        $('#edit_age').text(age);
        $('#editbdate').val(bdate);
        $('#editpbirth').val(place_of_birth);
        $('#edit_hunitno').val(unit_no);

        $('#edit_houseno').val(housenum);
        $('#edit_street').val(street);
        $('#edit_hphase').val(phase);
        $('#edit_hsubdivision').val(subdivi);

        $('#edit_hbuilding').val(building);
        $('#editsworking').val(started_working);
        $('#editarrtime').val(date_arrival);
    });

   });
</script>

<script type="text/javascript">

    $(document).ready(function(){
        $('#EditBTN').on('click', function(){


            var resident_id = $('#EditCatID').val();
            var fname = $('#editfname').val();
            var mname = $('#editmname').val();
            var lname = $('#editlname').val();
            var qname = $('#editqname').val();
            var gender = $("input:radio[name=edit_gender]:checked").val();
            var bdate = $('#editbdate').val();
            var cstatus = $('#editcstatus').children(":selected").attr("value");
            var occupation = $('#editoccu').val();
            var wstatus = $('#editwstatus').children(":selected").attr("value");
            var educationatt = $('#editeducationatt').children(":selected").attr("value");

            var startwork = $('#editsworking').val();
            var is_ofw = $("input:radio[name=edit_isofw]:checked").val();
            var is_inde = $("input:radio[name=edit_isinde]:checked").val();
            var citiz = $('#editcitiz').val();
            var head = $('#edithead').val();
            var arrt = $('#editarrtime').val();
            var editc = $('#editcontact').val();
            var arrstat = $('#editareason').children(":selected").attr("id");

            var place_birth =  $('#editpbirth').val();
            var unit_no = $('#edit_hunitno').val();
            var house_no =  $('#edit_houseno').val();
            var streetno =  $('#edit_street').val();
            var phase =  $('#edit_hphase').val();
            var subdivi =  $('#edit_hsubdivision').val();
            var building =  $('#edit_hbuilding').val();

            var fd = new FormData();

            fd.append('resident_id',resident_id);
            fd.append('editfname',fname);
            fd.append('editmname',mname);
            fd.append('editlname',lname);
            fd.append('editqname',qname);
            fd.append('editgender',gender);
            fd.append('editbdate',bdate);
            fd.append('editcstatus',cstatus);
            fd.append('editoccu',occupation);
            fd.append('editwstatus',wstatus);
            fd.append('editstartw',startwork);
            fd.append('editcitiz',citiz);
            fd.append('editrhead',head);
            fd.append('editarrtime',arrt);
            fd.append('editastatus',arrstat);
            fd.append('edit_isinde',is_inde);
            fd.append('editcontact',editc);

            fd.append('editpbirth',place_birth);
            fd.append('edit_hunitno',unit_no);
            fd.append('edit_houseno',house_no);
            fd.append('edit_street',streetno);
            fd.append('edit_hphase',phase);
            fd.append('edit_hsubdivision',subdivi);
            fd.append('edit_hbuilding',building);
            fd.append('editeducationatt',educationatt);

            fd.append('_token',"{{csrf_token()}}");
            let result;

            warning(fd);
            
        });


        function warning(fd) {

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
        }

        async function Update(fd) {

           swal("Data have been successfully Updated!", {
               icon: "success",
           });
           try
           {
               result = await $.ajax({
                   url:"{{route('BasicInfoEdit')}}",
                   type:'post',
                   processData:false,
                   contentType:false,
                   cache:false,
                   data:fd,
                   success:function(data)
                   {
                       if (data == "good")
                       {
                        window.location.reload();
                    }        
                }   
            })
           }
           catch(error)
           {
               console.error(error);
           }
       }
   });

</script>

<script type="text/javascript">

    $("#resident_table tbody").on('click', '.disableResident', function () {
       var resident_id = table.cell( 'tr', 0).data();
       alert(resident_id)
       var fd = new FormData();
       fd.append('resident_id',resident_id);

       fd.append('_token', "{{ csrf_token() }}");

       swal({
            title: "Wait!",
            text: "Are you sure you want to disable this resident?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
       .then((willDelete) => {
        if (willDelete) {
            Disable(fd);
            
        } else {
            swal("Operation Cancelled.", {
                icon: "error",
            });
        }
    });
       let result;

       async function Disable(fd) {  

         swal("Resident have been successfully Deactivated!", {
           icon: "success",
       });
         try
         {
           result = await $.ajax({
               url:"{{route('BasicInfoDelete')}}",
               type:'post', 
               processData:false,
               contentType:false,
               cache:false,
               data:fd,

               success:function(data)
               {
                    if (data == "good")
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
});




</script>

<script type="text/javascript">
   var output = '';
   var active_flag;
   var table = $("#resident_table").DataTable({
    serverSide: true,
    processing: true,    
    ajax:"{{ route('LoadResidents') }}",

    columns:
    [  
    { data: "RESIDENT_ID", name: "T.RESIDENT_ID", visible: false},
    { data: "LASTNAME", name: "T.LASTNAME"},
    { data: "FIRSTNAME", name: "T.FIRSTNAME"},
    { data: "MIDDLENAME",name: "T.MIDDLENAME"},
    { data: "QUALIFIER",name: "T.QUALIFIER", visible: false, searchable: false},
    { data: "SEX",name: "T.SEX", searchable: false},
    { data: "DATE_OF_BIRTH", name: "T.DATE_OF_BIRTH", searchable: false},
    { data: "CIVIL_STATUS", name:"T.CIVIL_STATUS",searchable:false},
    { data: "OCCUPATION", name: "T.OCCUPATION", searchable: false},
    { data: "WORK_STATUS", name: "T.WORK_STATUS", searchable: false},
    { data: "CITIZENSHIP", name: "T.CITIZENSHIP", visible: false, searchable: false},
    { data: "RELATION_TO_HOUSEHOLD_HEAD", name: "T.RELATION_TO_HOUSEHOLD_HEAD", visible: false, searchable: false},
    { data: "CONTACT_NUMBER", name: "T.CONTACT_NUMBER", visible: false, searchable: false},
    { data: "DATE_OF_BIRTH", name: "T.DATE_OF_BIRTH", visible: false, searchable: false},
    { data: "PLACE_OF_BIRTH", name: "T.PLACE_OF_BIRTH", visible: false, searchable: false},
    { data: "ADDRESS_UNIT_NO", name: "T.ADDRESS_UNIT_NO", visible: false, searchable: false},
    { data: "ADDRESS_PHASE", name: "T.ADDRESS_PHASE", visible: false, searchable: false},


    { data: "ADDRESS_HOUSE_NO", name: "T.ADDRESS_HOUSE_NO", visible: false, searchable: false},
    { data: "ADDRESS_STREET", name: "T.ADDRESS_STREET", visible: false, searchable: false},
    { data: "ADDRESS_SUBDIVISION", name: "T.ADDRESS_SUBDIVISION", visible: false, searchable: false},
    { data: "ADDRESS_BUILDING", name: "T.ADDRESS_BUILDING", visible: false, searchable: false},

    { data: "DATE_STARTED_WORKING", name: "T.DATE_STARTED_WORKING", visible: false, searchable: false},
    { data: "DATE_OF_ARRIVAL", name: "T.DATE_OF_ARRIVAL", visible: false, searchable: false},
    {render:function(data, type, full, meta){

        output = "<button type='button' class='btn btn-success editCategory' data-toggle='modal' data-target='#UpdateModal'><i class='fa fa-edit'></i> Edit&nbsp;";
        // active_flag = full.ACTIVE_FLAG;
        //  output += "</button><button type='button' class='btn btn-danger disableResident' id='disable' name='disable'><i class='fa fa-redo'></i> Disable</button>";
        // if (active_flag == 1) {
           
        // }else {
        //     output += "</button><button type='button' class='btn btn-danger' id='enable' name='disable'><i class='fa fa-redo'></i> Disable</button>";
        // }
       
        return output;
    }, searchable: false}, 
    ]
});

   $('#btnExport').on('click', function(){
        swal({
            title: "Are you sure?",
            text: "Generate Residents Record",
            icon: "warning",
            buttons: [true, "Yes"],
            dangerMode: true,
          })
        .then((willDelete) => {
            if (willDelete) 
            {
                window.location.href = "{{route('ResidentsExport')}}";
            }
            else 
            {
               Cancelled('Operation Cancelled!');
            }
        });
    });
    var property, filename, filextension, filesize;
    var fd = new FormData();
   
    $(document).on('change','#file', function() {
        property = document.getElementById('file').files[0];
        
        if (property != undefined) {
            filename = property.name;
            filextension = filename.split('.').pop().toLowerCase();
            filesize = property.size;
        }
        
    });

    $('#btnImport').on('click', function(){

       
        if (jQuery.inArray(filextension, ['xlsx','xls','csv']) == -1)
        {
            Cancelled('Invalid excel file');
        }
        else
        {
            if(filesize > 10000000)
            {
                Cancelled('The selected file is very big');
            }
            else
            {
                fd.append("file", property);    
                fd.append('_token', "{{ csrf_token() }}");
                swal({
                title: "Are you sure?",
                text: "Import Residents Record",
                icon: "warning",
                buttons: [true, "Yes"],
                dangerMode: true,
              })
                .then((willDelete) => {
                    if (willDelete) 
                    {
                        $.ajax({
                            url : "{{ route('ResidentsImport') }}",
                            method : 'POST',
                            processData:false,
                            contentType:false,
                            cache:false,
                            data : fd,
                           
                            success : function(data) {
                               // if (data == "true")
                               // {
                               //      location.reload()
                               // }
                               console.log(data)
                            },
                            error : function(error){
                                console.log("error: " + error);
                                
                            }
                        }); 
                    }
                    else 
                    {
                       Cancelled('Operation Cancelled!');
                    }
                });
            }
        }
       
        
    });

   function Cancelled(textvalue) {
        swal({
            title: 'Cancelled',
            text: textvalue,
            icon:'error',
            buttons: false,
            timer: 1000,
          });
    };
</script>


@endsection

@section('content')

<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">Residents' Information</a></li>

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

                <span class="d-sm-block d-none">Add New</span>
            </a>
        </li>
    </ul>
    <button type='button' class='btn btn-primary' style="width: 160px" data-toggle='modal' data-target='#Export_Import'><i class='fa fa-test'></i> Export/Import</button>

    <div class="modal fade" id="Export_Import" data-backdrop="static">
        <div class="modal-dialog" style="max-width: 25%">
           
            <div class="modal-content">
                <div class="modal-header" style="background-color: #348fe2">
                    <h4 class="modal-title" style="color: white">Excel/Import Residents</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white">×</button>
                </div>
                <div class="modal-body">
                <form >
                {{ csrf_field() }}
                 <h><label style="display: block; text-align: center">Export and Import</label></h>
                 <h3><b><label style="text-transform: capitalize; display: block; text-align: center;" id="view_db_name" name="view_db_name"></label></b></h3>
                 <br>
                  <div class="col-lg-12">
                    <div class="form-group">
                        <button type='button' class='btn btn-lime form-control' id="btnExport"  ><i class='fa fa-redo'></i> Export</button>
                    </div>
                </div>
                 
                  <div class="col-lg-12">
                    <div class="form-group">
                        <h><label style="display: block; text-align: center">Choose a file to import</label></h>
                        
                        <input type="file" class="form-control" id="file" name="file" required="true" >
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <h><label style="display: block; text-align: center">&nbsp</label></h>
                        <button type="button" class='btn btn-danger form-control' id="btnImport" name="btnImport"  ><i class='fa fa-redo'></i> Upload</button>
                    </div>
                </div>
                  <br><br>
                 <div class="modal-footer" align="center">
                    <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>

                </div>
                </form>
            </div>
             
        </div>
    </div>
    <!-- end tab-pane -->
</div>
<!-- end nav-pills -->
<!-- begin tab-content -->
<br><br>
<div class="tab-content">
    <!-- begin tab-pane -->
    <div class="tab-pane fade active show" id="nav-pills-tab-1">
        {{--Nav Pill Body Start--}}
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
                The following are the existing records of the residents within the system.
            </div>
            <!-- end alert -->
            <!-- begin panel-body -->

            <div class="panel-body">

                <table id="resident_table" class="table table-striped table-bordered display compact" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th hidden>Last Name </th>
                            <th >Last Name </th>
                            <th >First Name </th>
                            <th >Middle Name </th>
                            <th hidden>Qualifier </th>
                            <th >Sex </th>
                            <th >Birthdate </th>
                            <th >Civil Status </th>
                            <th >Occupation</th>
                            <th >Work Status</th>
                            <th hidden >Citizenship</th>
                            <th hidden >Relation to household</th>
                            <th hidden >Contact Number</th>
                            <th hidden >Date of birth</th>
                            <th hidden >Place of birth</th>
                            <th hidden >Unit no</th>
                            <th hidden >Phase</th>
                            <th hidden >House no</th>
                            <th hidden >Street</th>
                            <th hidden >Subdivision</th>
                            <th hidden >Building</th>
                            <th hidden >Started Work</th>
                            <th hidden >Arrival Date</th>

                            <th style="width: 16%">Actions </th>

                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>

                <!-- #modal-edit -->
                <div class="modal fade" id="UpdateModal" data-backdrop="static">
                    <div class="modal-dialog" style="max-width: 50%">
                        <form id="EditForm">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: #008a8a">
                                    <h4 class="modal-title" style="color: white">Edit Record</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white">×</button>
                                </div>
                                <div class="modal-body">
                                    {{--modal body start--}}
                                    <h><label style="display: block; text-align: center">Resident's Name</label></h>
                                    <h3><b><label style="text-transform: capitalize; display: block; text-align: center" id="edit_db_name" name="edit_db_name"></label></b></h3>
                                    <h><label style="display: block; text-align: center">Age</label></h>
                                    <h2><b><label style="text-transform: capitalize; display: block; text-align: center" id="edit_age" name="edit_age"></label></b></h2>
                                    <input id="EditCatID" type="text" class="form-control hide" name="CategoryID"/>

                                    <div class="row">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="stats-content">
                                                <label for="bfirstname">&nbspResident Name<span class="text-danger">*</span></label> <span id="lblfirstname"></span>
                                                <input class="form-control" id="editlname" name="editlname" placeholder="Lastname" data-parsley-required="true" />

                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="stats-content">
                                                <label for="middlename">&nbsp</label><span id="lblmiddlename"></span>

                                                <input class="form-control" id="editfname" name="editfname" placeholder="FirstName" data-parsley-required="true" />

                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="stats-content">
                                                <label for="lastname">&nbsp</label><span id="lbllastname"></span>

                                                <input class="form-control" id="editmname" name="editfmname" placeholder="MiddleName" data-parsley-required="true" />

                                            </div>
                                        </div>

                                    </div> <br>

                                    <div class="row">
                                        <div class="col-lg-4 col-md-6">
                                            <label class="col-form-label text-md-left">&nbspEducational Attainment<span class="text-danger">*</span></label>
                                            <div class="stats-content">
                                                <select class="form-control " data-style="btn-lime" id="editeducationatt" name="editeducationatt">
                                                    <option value="Elementary School Graduate" selected>Elementary School Graduate</option>
                                                    <option value="High School Graduate">High School Graduate</option>
                                                    <option value="College Graduate">College Graduate</option>
                                                    <option value="Technical/Vocation Graduate">Technical/Vocation Graduate</option>
                                                    <option value="Masteral/Unit Degree">Masteral/Unit Degree</option>
                                                    <option value="Doctoral/Unit Degree">Doctoral/Unit Degree</option>
                                                   
                                                </select>
                                            </div>
                                        </div>
                                    </div> <br>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6">
                                            <label >&nbspGender </label><br>
                                            <div class="radio radio-css radio-inline">
                                                <input type="radio" name="edit_gender" id="radiogenderm" value="Male" checked />
                                                <label for="radiogenderm">Male</label>
                                            </div> <br>

                                            <div class="radio radio-css radio-inline">
                                                <input type="radio" name="edit_gender" id="radiogenderf" />
                                                <label for="radiogenderf" value="Female">Female</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <label for="bfirstname">&nbspIs OFW?</label><br>
                                            <div class="radio radio-css radio-inline">
                                                <input type="radio" name="edit_isofw" id="edit_yes" value="1" checked />
                                                <label for="edit_yes">Yes</label>
                                            </div>
                                            <br>
                                            <div class="radio radio-css radio-inline">
                                                <input type="radio" name="edit_isofw" id="edit_no" value="0"/>
                                                <label for="edit_no">No</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <label for="bfirstname">&nbspIs Indigenous?</label><br>
                                            <div class="radio radio-css radio-inline">
                                                <input type="radio" name="edit_isinde" id="editinden" value="1" checked />
                                                <label for="editinden">Yes</label>
                                            </div>
                                            <br>
                                            <div class="radio radio-css radio-inline">
                                                <input type="radio" name="edit_isinde" id="editindey" value="0"/>
                                                <label for="editindey">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="stats-content">
                                                <label class=" col-form-label text-md-left">&nbspAddress<span class="text-danger">*</span></label>
                                                <input type="number" name="edit_houseno" id="edit_houseno" placeholder="House No.*" class="form-control" data-parsley-group="step-2" data-parsley-required="true" />
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="stats-content">
                                                <label class="col-md-3 col-form-label text-md-right">&nbsp</label>
                                                <input type="text" name="edit_street" id="edit_street" placeholder="Street*" class="form-control" data-parsley-group="step-2"  data-parsley-required="true" />
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="stats-content">
                                                <label class="col-md-3 col-form-label text-md-right">&nbsp</label>
                                                <input type="text" name="edit_hphase" id="edit_hphase" placeholder="Sitio*" class="form-control" data-parsley-group="step-2"  data-parsley-required="true" />
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="stats-content">
                                                <label class="col-form-label text-md-right">&nbspOptional</label>
                                                <input type="text" name="edit_hbuilding" id="edit_hbuilding" placeholder="Building" class="form-control" data-parsley-group="step-2"/>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="stats-content">
                                                <label class="col-md-3 col-form-label text-md-right">&nbsp</label>
                                                <input type="text" name="edit_hunitno" id="edit_hunitno" placeholder="Unit No." class="form-control" data-parsley-group="step-2" />
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="stats-content">
                                                <label class="col-md-3 col-form-label text-md-right">&nbsp</label>

                                                <input type="text" name="edit_hsubdivision" id="edit_hsubdivision" placeholder="Subdivision" class="form-control" data-parsley-group="step-2" />
                                            </div>
                                        </div>
                                    </div>
                                    <br>


                                    <div class="row">
                                       <div class="col-lg-4 col-md-6">
                                        <label style="display: block; text-align: left">&nbspBirth Date</label>
                                        <input type="date" id="editbdate" name="editbdate" class="form-control" data-parsley-required="true" />
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <label style="display: block; text-align: left">&nbspPlace of Birth</label>
                                        <input type="text" id="editpbirth" name="editpbirth" class="form-control" data-parsley-required="true" />
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
                                    <input type="text" id="editoccu" name="editoccu" style="display: block; text-align: left; color:black; background-color:white" class="form-control">
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <label style="display: block; text-align: left">&nbspQualifier Name</label>
                                    <input type="text" id="editqname" name="editqname" style="display: block; text-align: left; color:black; background-color:white" class="form-control">
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <label style="display: block; text-align: left">&nbspWork Status</label>
                                    <select class="form-control" data-style="btn-lime" id="editwstatus">
                                        <option value="NotApplicable" selected>Not Applicable</option>
                                        <option value="Employed">Employed</option>
                                        <option value="Unemployed">Unemployed</option>
                                        <option value="Retired">Retired</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                               <div class="col-lg-4 col-md-6">
                                <label style="display: block; text-align: left">&nbspDate Started Working</label>
                                <input type="date" id="editsworking" name="editsworking" class="form-control" data-parsley-required="true" />
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <label style="display: block; text-align: left">&nbspCitizenship</label>
                                <input type="text" id="editcitiz" name="editcitiz" class="form-control" required/>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <label style="display: block; text-align: left">&nbspRelation to HouseHold Head</label>
                                <input type="text" id="edithead" name="edithead" class="form-control" required/>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                           <div class="col-lg-4 col-md-6">
                            <label style="display: block; text-align: left">&nbspDate of Arrival</label>
                            <input type="date" id="editarrtime" name="editarrtime" class="form-control" data-parsley-required="true" />
                        </div>


                        <div class="col-lg-4 col-md-6">
                            <label style="display: block; text-align: left">&nbspContact #</label>
                            <input type="number" id="editcontact" name="editcontact" class="form-control" data-parsley-required="true" />
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label style="display: block; text-align: left">&nbspReason of Arrival</label>
                            <select class="form-control " data-style="btn-lime" name="editareason" id="editareason">
                               @foreach($resident_type as $key => $value)
                               <option id="{{ $key }}">{{ $value }}</option>
                               @endforeach
                           </select>
                       </div>

                   </div>
                   <br>

                   {{--modal body end--}}
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
                <h4 class="modal-title" style="color: white">View Record</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white">×</button>
            </div>
            <div class="modal-body">
               <div class="col-lg-12">
                <label style="display: block; text-align: left">Resident Name</label>
                <input type="text" id="viewname" name="viewname" style="display: block; text-align: left; color:black; background-color:white" class="form-control" readonly>
            </div>
            <div class="col-lg-12">
                <label style="display: block; text-align: left">Qualifier Name</label>
                <input type="text" id="viewqualifier" name="viewqualifier" style="display: block; text-align: left; color:black; background-color:white" class="form-control" readonly>
            </div>
            <div class="col-lg-12">
                <label style="display: block; text-align: left">Sex</label>
                <input type="text" id="viewsex" name="viewsex" style="display: block; text-align: left; color:black; background-color:white" class="form-control" readonly>
            </div>
            <div class="col-lg-12">
                <label style="display: block; text-align: left">Birth Date</label>
                <input type="text" id="viewbdate" name="viewbdate" style="display: block; text-align: left; color:black; background-color:white" class="form-control" readonly>
            </div>
            <div class="col-lg-12">
                <label style="display: block; text-align: left">Civil Status</label>
                <input type="text" id="viewcstatus" name="viewcstatus" style="display: block; text-align: left; color:black; background-color:white" class="form-control" readonly>
            </div>
            <div class="col-lg-12">
                <label style="display: block; text-align: left">Occupation</label>
                <input type="text" id="viewoccu" name="viewoccu" style="display: block; text-align: left; color:black; background-color:white" class="form-control" readonly>
            </div>
            <div class="col-lg-12">
                <label style="display: block; text-align: left">Work Status</label>
                <input type="text" id="viewstatus" name="viewstatus" style="display: block; text-align: left; color:black; background-color:white" class="form-control" readonly>
            </div>

            {{--modal body end--}}
        </div>
        <div class="modal-footer" align="center">
            <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>
        </div>
    </div>
</div>
</div>


</div>
<!-- end panel-body -->
</div>
<!-- end panel add new -->
{{--Nav Pill Body End--}}
</div>
<!-- end tab-pane -->
<!-- begin tab-pane -->
<div class="tab-pane fade " id="nav-pills-tab-2">
    {{--Nav Pill Body Start--}}
    {{--Table--}}
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            </div>
            <h4 class="panel-title">New Record</h4>
        </div>
        <div class="panel-body">
            <form id="AddForm" name="form-wizard" class="form-control-with-bg">
                @csrf
                <!-- begin wizard -->
                <div id="wizard">
                    <!-- begin wizard-step -->
                    <ul>
                        <li class="col-md-4 col-sm-3 col-6">
                            <a href="#step-1">
                                <span class="number">1</span>
                                <span class="info text-ellipsis">
                                    Personal Info
                                    <small class="text-ellipsis">Information about the resident</small>
                                </span>
                            </a>
                        </li>
                        <li class="col-md-4 col-sm-3 col-6">
                            <a href="#step-2">
                                <span class="number">2</span>
                                <span class="info text-ellipsis">
                                    Household Details
                                    <small class="text-ellipsis">Details about the resident's household</small>
                                </span>
                            </a>
                        </li>
                        <li class="col-md-4 col-sm-3 col-6">
                            <a href="#step-3">
                                <span class="number">3</span>
                                <span class="info text-ellipsis">
                                    Completed
                                    <small class="text-ellipsis">Registration Completed</small>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <!-- end wizard-step -->
                    <!-- begin wizard-content -->
                    <div>
                        <!-- begin step-1 -->
                        <div id="step-1">
                            <!-- begin fieldset -->
                            <fieldset>
                                <!-- begin row -->
                                <div class="row">

                                    <div class="col-md-6">

                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">First Name <span class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <input type="text" id="firstname" name="firstname" placeholder="John" data-parsley-group="step-1" data-parsley-required="true" class="form-control" />
                                            </div>
                                        </div>
                                        <!-- end form-group -->
                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Middle Name </label>
                                            <div class="col-md-6">
                                                <input type="text" id="middlename" name="middlename" placeholder="Mendez" data-parsley-group="step-1" class="form-control" />
                                            </div>
                                        </div>
                                        <!-- end form-group -->
                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Last Name <span class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <input type="text" id="lastname" name="lastname" placeholder="Smith" data-parsley-group="step-1" data-parsley-required="true" class="form-control" />
                                            </div>
                                        </div>
                                        <!-- end form-group -->
                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Qualifier</label>
                                            <div class="col-md-6">
                                                <input type="text" id="qualifier" name="qualifier" placeholder="Jr./II/III" data-parsley-group="step-1" class="form-control" />
                                            </div>
                                        </div>
                                        <!-- end form-group -->
                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Sex <span class="text-danger">&nbsp;</span></label>
                                            <div class="col-md-6">
                                                <div class="radio radio-css radio-inline">
                                                    <input type="radio" name="sex_gender" id="inlineCssRadio1" value="Male" checked />
                                                    <label for="inlineCssRadio1">Male</label>
                                                </div>
                                                <div class="radio radio-css radio-inline">
                                                    <input type="radio" name="sex_gender" id="inlineCssRadio2" />
                                                    <label for="inlineCssRadio2" value="Female">Female</label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end form-group -->
                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Date of Birth <span class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <input type="date" id="dateofbirth" name="dateofbirth" placeholder="" class="form-control" data-parsley-group="step-1" data-parsley-required="true" />
                                            </div>
                                        </div>
                                        <!-- end form-group -->
                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Place of Birth <span class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <input type="text" id="placeofbirth" name="placeofbirth" placeholder="" class="form-control" data-parsley-group="step-1" data-parsley-required="true" />
                                            </div>
                                        </div>
                                        <!-- end form-group -->
                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Civil Status <span class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <select class="form-control " data-style="btn-lime" id="civilstatus" name="CivilStatus">
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

                                        <!-- end form-group -->
                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Citizenship<span class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <input type="text" id="Citizenship" name="Citizenship" placeholder="Filipino" class="form-control" data-parsley-group="step-1" data-parsley-required="true" />
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Educational Attainment<span class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <select class="form-control " data-style="btn-lime" id="educationatt" name="educationatt">
                                                    <option value="Elementary School Graduate" selected>Elementary School Graduate</option>
                                                    <option value="High School Graduate">High School Graduate</option>
                                                    <option value="College Graduate">College Graduate</option>
                                                    <option value="Technical/Vocation Graduate">Technical/Vocation Graduate</option>
                                                    <option value="Masteral/Unit Degree">Masteral/Unit Degree</option>
                                                    <option value="Doctoral/Unit Degree">Doctoral/Unit Degree</option>
                                                    <option value="Not Applicable">Not Applicable</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- end form-group -->
                                    </div>

                                    <div class="col-md-6">

                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Is an OFW? <span class="text-danger">&nbsp;</span></label>
                                            <div class="col-md-6">
                                                <div class="radio radio-css radio-inline">
                                                    <input type="radio" name="is_ofw" id="inlineCssRadioNo" value="0" checked />
                                                    <label for="inlineCssRadioNo">No</label>
                                                </div>
                                                <div class="radio radio-css radio-inline">
                                                    <input type="radio" name="is_ofw" id="inlineCssRadioYes" value="1" />
                                                    <label for="inlineCssRadioYes">Yes</label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end form-group -->
                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Occupation <span class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <input type="text" id="Occupation" name="Occupation" placeholder="Indicate None if so" class="form-control" data-parsley-group="step-1" data-parsley-required="true" />
                                            </div>
                                        </div>
                                        <!-- end form-group -->
                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Work Status<span class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                {{--<input type="text" name="natureofwork" placeholder="" class="form-control" data-parsley-group="step-1" data-parsley-required="true" />--}}
                                                <select class="form-control " data-style="btn-lime" name="workstatus" id="workstatus">
                                                    <option value="NotApplicable" selected>Not Applicable</option>
                                                    <option value="Employed">Employed</option>
                                                    <option value="Unemployed">Unemployed</option>
                                                    <option value="Retired">Retired</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- end form-group -->
                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Date Started Working </label>
                                            <div class="col-md-6">
                                                <input type="date" id="dateofstartwork" name="dateofstartwork" class="form-control" data-parsley-group="step-1" />
                                            </div>
                                        </div>
                                        <!-- end form-group -->
                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Relationship to Household Head<span class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <input type="text" id="RelationToHead" name="RelationToHead" placeholder="Indicate Household Head if so" class="form-control" data-parsley-group="step-1" data-parsley-required="true" />
                                            </div>
                                        </div>
                                        <!-- end form-group -->
                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Date of Arrival to Barangay <span class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <input type="date" id="dateofarrival" name="dateofarrival" placeholder="" class="form-control" data-parsley-group="step-1" data-parsley-required="true" />
                                            </div>
                                        </div>
                                        <!-- end form-group -->
                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Type of resident<span class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                               <select class="form-control " data-style="btn-lime" name="ArrivalReason" id="ArrivalReason">
                                                @foreach($resident_type as $key => $value)
                                                <option id="{{ $key }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div id="div_transient"style="display: none">
                                       <div class="form-group row m-b-10" >
                                        <label class="col-md-3 col-form-label text-md-right">Reason for Coming<span class="text-danger">*</span></label>
                                        <div class="col-md-6">
                                            <textarea type="text" id="r_coming" name="r_coming" placeholder="" class="form-control" data-parsley-group="step-1"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 col-form-label text-md-right">Period of stay<br> start date<span class="text-danger">*</span></label>
                                        <div class="col-md-6">
                                            <input type="date" id="p_startdate" name="p_startdate" placeholder="" class="form-control" data-parsley-group="step-1"  />
                                        </div>
                                    </div>

                                    <div class="form-group row m-b-10">
                                        <label class="col-md-3 col-form-label text-md-right">Period of stay<br> end date<span class="text-danger">*</span></label>
                                        <div class="col-md-6">
                                            <input type="date" id="p_enddate" name="p_enddate" placeholder="" class="form-control" data-parsley-group="step-1" />
                                        </div>
                                    </div>
                                </div>

                                <!-- end form-group -->
                                <!-- begin form-group -->
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 col-form-label text-md-right">Is Indigenous? <span class="text-danger">&nbsp;</span></label>
                                    <div class="col-md-6">
                                        <div class="radio radio-css radio-inline">
                                            <input type="radio" name="radio_Indigenous" id="inlineCssRadioIndigeneousNo" value="0" checked />
                                            <label for="inlineCssRadioIndigeneousNo">No</label>
                                        </div>
                                        <div class="radio radio-css radio-inline">
                                            <input type="radio" name="radio_Indigenous" id="inlineCssRadioIndigeneousYes" value="1" />
                                            <label for="inlineCssRadioIndigeneousYes">Yes</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- end form-group -->
                                <!-- begin form-group -->
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 col-form-label text-md-right">Contact Number </label>
                                    <div class="col-md-6">
                                        <input type="number" id="contactnumber" name="contactnumber" placeholder="" class="form-control" data-parsley-group="step-1" data-parsley-required="false" />
                                    </div>
                                </div>
                                <!-- end form-group -->

                            </div>

                        </div>
                        <!-- end row -->
                    </fieldset>
                    <!-- end fieldset -->
                </div>
                <!-- end step-1 -->
                <!-- begin step-2 -->
                <div id="step-2">
                    <!-- begin fieldset -->
                    <fieldset>
                        <!-- begin row -->
                        <div class="row">

                            <div class="col-md-6">

                                <!-- begin form-group -->
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 col-form-label text-md-right">Ownership Status<span class="text-danger">*</span></label>
                                    <div class="col-md-6">
                                        <select class="form-control " data-style="btn-lime" id="homeownership" name="HomeOwnership">
                                            <option value="Owned" selected>Owned</option>
                                            <option value="Rented">Rented</option>
                                            <option value="With Parents">With Parents</option>
                                            <option value="With Relatives">With Relatives</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- end form-group -->
                                <!-- begin form-group -->
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 col-form-label text-md-right">Build Materials</label>
                                    <div class="col-md-6">
                                        <div class="radio radio-css">
                                            <input type="radio" name="radio_home_materials" id="cssRadioConcrete" value="Concrete" checked />
                                            <label for="cssRadioConcrete">Concrete</label>
                                        </div>
                                        <div class="radio radio-css">
                                            <input type="radio" name="radio_home_materials" id="cssRadioWood" value="Wood" />
                                            <label for="cssRadioWood">Wood</label>
                                        </div>
                                        <div class="radio radio-css">
                                            <input type="radio" name="radio_home_materials" id="cssRadioNipa" value="Nipa" />
                                            <label for="cssRadioNipa">Nipa</label>
                                        </div>
                                        <div class="radio radio-css">
                                            <input type="radio" name="radio_home_materials" id="cssRadio1Makeshift" value="Make-shift" />
                                            <label for="cssRadio1Makeshift">Make-shift</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- begin form-group -->
                                <div class="form-group row m-b-10">
                                    <label class="col-md-3 col-form-label text-md-right">Number of Rooms <span class="text-danger">*</span></label>
                                    <div class="col-md-6">
                                        <input type="number" id="numberofrooms" name="numberofrooms" placeholder="" class="form-control" data-parsley-group="step-2" data-parsley-required="true" />
                                    </div>
                                </div>
                                <!-- end form-group -->
                            </br>
                            <!-- begin form-group -->
                            <div class="form-group row m-b-10">
                                <label class="col-md-3 col-form-label text-md-right">Address<span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <input type="number" name="houseno" id="houseno" placeholder="House No.*" class="form-control" data-parsley-group="step-2" data-parsley-required="true" />
                                    <input type="text" name="hstreet" id="hstreet" placeholder="Street*" class="form-control" data-parsley-group="step-2"  data-parsley-required="true" />
                                    <input type="text" name="hphase" id="hphase" placeholder="Sitio*" class="form-control" data-parsley-group="step-2"  data-parsley-required="true" />


                                </div>
                            </div>
                            <div class="form-group row m-b-10">
                                <label class="col-md-3 col-form-label text-md-right">Optional<span class="text-danger"></span></label>
                                <div class="col-md-6">

                                    <input type="text" name="hbuilding" id="hbuilding" placeholder="Building" class="form-control" data-parsley-group="step-2"/>
                                    <input type="text" name="hunitno" id="hunitno" placeholder="Unit No." class="form-control" data-parsley-group="step-2" />
                                    <input type="text" name="hsubdivision" id="hsubdivision" placeholder="Subdivision" class="form-control" data-parsley-group="step-2" />
                                </div>
                            </div>
                        </br>
                        <!-- begin form-group -->
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 col-form-label text-md-right">Nature of the house</label>
                            <div class="col-md-6">
                                <div class="checkbox checkbox-css">
                                    <input type="checkbox" id="cssCheckbox1Toilet" name="withtoilet" value="0" />
                                    <label for="cssCheckbox1Toilet">With Toilet</label>
                                </div>
                                <div class="checkbox checkbox-css">
                                    <input type="checkbox" id="cssCheckbox2Playarea" name="withplayarea" value="0"  />
                                    <label for="cssCheckbox2Playarea">With Play Area</label>
                                </div>
                                <div class="checkbox checkbox-css">
                                    <input type="checkbox" id="cssCheckbox3Bedroom" value="0" name="withbedroom"/>
                                    <label for="cssCheckbox3Bedroom">With Bedroom</label>
                                </div>
                                <div class="checkbox checkbox-css">
                                    <input type="checkbox" id="cssCheckbox4diningroom" value="0" name="withdiningroom" />
                                    <label for="cssCheckbox4diningroom">Wih Dining Room</label>
                                </div>
                                <div class="checkbox checkbox-css">
                                    <input type="checkbox" id="cssCheckbox5sala" value="0" name="withsala" />
                                    <label for="cssCheckbox5sala">With Sala</label>
                                </div>
                                <div class="checkbox checkbox-css">
                                    <input type="checkbox" id="cssCheckbox6kitchen" value="0" name="kitchen" />
                                    <label for="cssCheckbox6kitchen">With Kitchen</label>
                                </div>
                            </div>
                        </div>
                        <!-- end form-group -->
                    </div>
                    <!-- end form-group -->


                    <div class="col-md-6">
                        <!-- begin form-group -->
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 col-form-label text-md-right">Utilities Available</label>
                            <div class="col-md-6">
                                <div class="checkbox checkbox-css">
                                    <input type="checkbox" id="cssCheckboxRunningwater" name="runningwater" value="0" />
                                    <label for="cssCheckboxRunningwater">Running Water</label>
                                </div>
                                <div class="checkbox checkbox-css">
                                    <input type="checkbox" id="cssCheckboxElectricity" name="electricity" value="0"  />
                                    <label for="cssCheckboxElectricity">Electricity</label>
                                </div>
                                <div class="checkbox checkbox-css">
                                    <input type="checkbox" id="cssCheckboxaircon" value="0" name="aircon"/>
                                    <label for="cssCheckboxaircon">Aircon</label>
                                </div>
                                <div class="checkbox checkbox-css">
                                    <input type="checkbox" id="cssCheckboxmobilephone" value="0" name="mobilephone" />
                                    <label for="cssCheckboxmobilephone">Mobile Phone</label>
                                </div>
                                <div class="checkbox checkbox-css">
                                    <input type="checkbox" id="cssCheckboxcomputer" value="0" name="computer" />
                                    <label for="cssCheckboxcomputer">Computer</label>
                                </div>
                                <div class="checkbox checkbox-css">
                                    <input type="checkbox" id="cssCheckboxinternet" value="0" name="internet" />
                                    <label for="cssCheckboxinternet">Internet</label>
                                </div>
                                <div class="checkbox checkbox-css">
                                    <input type="checkbox" id="cssCheckboxtv" value="0" name="tv" />
                                    <label for="cssCheckboxtv">Television</label>
                                </div>
                                <div class="checkbox checkbox-css">
                                    <input type="checkbox" id="cssCheckboxcdplayer" value="0" name="cdplayer" />
                                    <label for="cssCheckboxcdplayer">CD/DVD Player</label>
                                </div>
                                <div class="checkbox checkbox-css">
                                    <input type="checkbox" id="cssCheckboxradio" value="0" name="Radio" />
                                    <label for="cssCheckboxradio">Radio</label>
                                </div>
                            </div>
                        </div>
                        <!-- end form-group -->

                        <!-- begin form-group -->
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 col-form-label text-md-right">Entertainment Available</label>
                            <div class="col-md-6">
                                <div class="checkbox checkbox-css">
                                    <input type="checkbox" id="cssCheckboxcomics" name="comics" value="0" />
                                    <label for="cssCheckboxcomics">Comics/Magazines</label>
                                </div>
                                <div class="checkbox checkbox-css">
                                    <input type="checkbox" id="cssCheckboxNewspaper" name="newspapers" value="0"  />
                                    <label for="cssCheckboxNewspaper">Newspapers</label>
                                </div>
                                <div class="checkbox checkbox-css">
                                    <input type="checkbox" id="cssCheckboxPets" value="0" name="pets"/>
                                    <label for="cssCheckboxPets">Pets</label>
                                </div>
                                <div class="checkbox checkbox-css">
                                    <input type="checkbox" id="cssCheckboxbooks" value="0" name="books" />
                                    <label for="cssCheckboxbooks">Books</label>
                                </div>
                                <div class="checkbox checkbox-css">
                                    <input type="checkbox" id="cssCheckboxstorybooks" value="0" name="storybooks" />
                                    <label for="cssCheckboxstorybooks">Story Books</label>
                                </div>
                                <div class="checkbox checkbox-css">
                                    <input type="checkbox" id="cssCheckboxToys" value="0" name="toys" />
                                    <label for="cssCheckboxToys">Toys</label>
                                </div>
                                <div class="checkbox checkbox-css">
                                    <input type="checkbox" id="cssCheckboxboardgames" value="0" name="boardgames" />
                                    <label for="cssCheckboxboardgames">Board Games</label>
                                </div>
                                <div class="checkbox checkbox-css">
                                    <input type="checkbox" id="cssCheckboxpuzzles" value="0" name="puzzles" />
                                    <label for="cssCheckboxpuzzles">Puzzles</label>
                                </div>
                            </div>
                        </div>
                        <!-- end form-group -->

                        <div class="form-group row m-b-10">
                            <label class="col-md-3 col-form-label text-md-right">Persons Staying in the same household<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <select class="form-control " data-style="btn-lime" id="personinhousehold" name="personinhousehold">
                                    <option value="Parents" selected>Parents</option>
                                    <option value="Relatives">Relatives</option>
                                    <option value="Non-Relatives">Non-Relatives</option>
                                </select>
                            </div>
                        </div>

                    </div>


                    <!-- end row -->
                </fieldset>
                <!-- end fieldset -->
            </div>
            <!-- end step-2 -->
            <!-- begin step-3 -->
            <div id="step-3">
                <div class="jumbotron m-b-0 text-center">
                    <h2 class="text-inverse">Resident Added Successfully!</h2>
                    <p class="m-b-30 f-s-16">Please double check the provided information. Click the proceed button to finish registration.</p>
                    <p><a id="AddBTN" href="javascript:;" class="btn btn-lime">Proceed</a></p>
                </div>
            </div>
            <!-- end step-4 -->
        </div>
        <!-- end wizard-content -->
    </div>
    <!-- end wizard -->
</form>
</div>
</div>
{{--Table--}}
{{--Nav Pill Body End--}}
</div>
<!-- end tab-content -->

</div>

@endsection