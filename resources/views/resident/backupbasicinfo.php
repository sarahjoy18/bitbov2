@extends('global.main')

@section('title', "Residents' Basic Info")

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


<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="{{asset('assets/plugins/DataTables/media/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{asset('assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{asset('assets/js/demo/table-manage-default.demo.min.js')}}"></script>
<!-- ================== END PAGE LEVEL JS ================== -->
{{--Modals--}}

<script src="{{asset('assets/plugins/gritter/js/jquery.gritter.js')}}"></script>
<!-- <script src="{{asset('assets/plugins/jquery-smart-wizard/src/js/jquery.smartWizard.js')}}"></script> -->
<!-- <script src="{{asset('assets/plugins/jquery-smart-wizard/src/js/jqueryforme.js')}}"></script> -->
<script src="{{asset('assets/js/demo/form-wizards.demo.min.js')}}"></script>
<script src="{{asset('assets/js/demo/ui-modal-notification.demo.min.js')}}"></script>
<!-- ================== BEGIN PAGE LEVEL JS ================== -->

<script src="{{asset('assets/plugins/highlight/highlight.common.js')}}"></script>
<script src="{{asset('assets/js/demo/render.highlight.js')}}"></script>
<script src="{{asset('assets/js/moment.js')}}"></script>


<script>

    $(document).ready(function() {
        App.init();
        FormWizard.init();
        Notification.init();
        $('#resident_table').DataTable();
        $('#nbody').show();
    });

</script>

<script type="text/javascript">

    $('#ArrivalReason').change(function () {
        var arrivalreason = $('#ArrivalReason').children(":selected").attr("id");
        if(arrivalreason == 3) { 
            $('#div_transient').show(); 
            $('#showmigrants').hide();
        } else if (arrivalreason == 2) { 
            $('#showmigrants').show();
            $('#div_transient').hide();
            $('#fromwhat').attr('placeholder','Enter Country');
        } else {
            $('#showmigrants').hide();
            $('#div_transient').hide();
        }
        
    });
    $('#migrants').change(function() {
        var migrants = $('#migrants').val()
        if(migrants == "Country") {
            $('#fromwhat').attr('placeholder','Enter Country');
        } else if(migrants == "Barangay") {
            $('#fromwhat').attr('placeholder','Enter Barangay');
        } else if(migrants == "Province") {
            $('#fromwhat').attr('placeholder','Enter Province');
        }
    });

</script>
{{--For ADD FORM--}}
<script>
    $(document).ready(function() {
        $('#addVar').click();
    });

    $('#dateofbirth').change(function () {
        var dtest = new Date();
        var ndate = dtest.toJSON().slice(0, 10); 
        $('#dateofbirth').val() > ndate ? $('#dateofbirth').val(ndate) : $('#dateofbirth').val()
        validatedate("fordisplay");
        checkage()
    });

    $('#educationatt').change(function () {
        var dobselect = "#dateofbirth";
        checkage(dobselect)
    });
    
    $('#civilstatus').change(function () {
        checkage()
    });

    $(document).on('keyup change','#multidoba',function(){
        var dtest = new Date();
        var ndate = dtest.toJSON().slice(0, 10); 
        $('#multidoba').val() > ndate ? $('#multidoba').val(ndate) : $('#multidoba').val()
        var multidoba = $(this).val();
        checkmultiage(multidoba);
    });

    $(document).on('change','#multicvstat',function(){
        var multidoba = $(this).val();
        checkmultiage(multidoba);
    });

    $(document).on('change','#multieducatt',function(){
        var multidoba = $(this).val();
        checkmultiage(multidoba);
    });

    $(document).on('change','#multityper',function(){
        var value = $(this).val();
        if(value == 'Migrants') {
            $('#multifromwhat').attr('placeholder','Enter Country');
            $('#multishowmigrants').show()
            $('.div_multi_transient').hide(); 
        }else if(value == 'Transients') {
            $('.div_multi_transient').show(); 
            $('#multishowmigrants').hide();
        } else {
            $('#multishowmigrants').hide()
            $('.div_multi_transient').hide(); 
        }
    });

    $(document).on('change', '#migrants', function() {
        var migrants = $(this).val();
        if(migrants == "Country") {
            $('#multifromwhat').attr('placeholder','Enter Country');
        } else if(migrants == "Barangay") {
            $('#multifromwhat').attr('placeholder','Enter Barangay');
        } else if(migrants == "Province") {
            $('#multifromwhat').attr('placeholder','Enter Province');
        }
        
    });

    function checkmultiage(multidoba) {
        var dtext = $('#multidoba').val();
        
        var cdate = new Date(dtext);
        var dtest = new Date();
        
        var ndate = dtest.toJSON().slice(0, 10); 
        var arr = [];
        var arrcs = [];
        $('#multicvstat option').each(function() {
            arr.push($(this).val())
        });
        $('#multieducatt option').each(function() {
            arrcs.push($(this).val())
        });
        var age = dtest.getFullYear() - cdate.getFullYear();
        
        if(dtext == ndate || age < 5 ) {
            $('#multicvstat').val(arr[0]);
            $('#multieducatt').val(arrcs[6  ]);        
        }
        if (age >= 1 ) {
            $('#multioccup').show();
        } else {
            $('#multioccup').hide();
        }
    }

    function checkage(dobselect) {
        var dtext = "";
        if(dobselect == "#dateofbirth") {
           dtext  = $(dobselect).val();
       } 
       else {
        dtext = $('#dateofbirth').val()
    }
    var cdate = new Date(dtext);
    var dtest = new Date();

    var ndate = dtest.toJSON().slice(0, 10); 
    var arr = [];
    var arrcs = [];
    $('#educationatt option').each(function() {
        arr.push($(this).val())
    });
    var age = dtest.getFullYear() - cdate.getFullYear();

    if(dtext == ndate || age < 5 ) {
        $('#educationatt').val(arr[6]);
    }

    $('#civilstatus option').each(function() {
        arrcs.push($(this).val())
    });

    if(age >= 0 && age <= 18  ) {
        $('#civilstatus').val(arrcs[0]);

    }
    if(age == 0) { $('#showoccu').hide() } else $('#showoccu').show()
}

$("#Occupation").keyup(function(){
    if($(this).val() == "") {
        $('#showwork').hide();
    }
    else {
        $('#showwork').show();
    }
})

$(document).on('keyup','.multioccupation',function(){
    if($(this).val() == "") {
        $('.multi_showwork').hide();
    }
    else {
        $('.multi_showwork').show();
    }
});

var n = []; var inf = []; var c = []; var a = []; var e = [];  var dobs = []; var age = [];
var cdate = []; var rgdate = []; var ryear = []; var rmont = []; var rday = []; var cyear = []; var cmon = []; var cday = [];
var current_year = []; var dob_year = []; var days = []; var start = [];  var end = []; var fnames = []; var mnames = []; var lnames = [];
var multireltohead=[];

$(document).on('click','.sw-btn-prev', function() {
    $('#summary_tabl tbody tr').remove();
    $('#summary_housing tbody tr').remove();
    $('#summary_utility tbody tr').remove();
    $('#summary_entertainment tbody tr').remove();
    $("#smrynewborn").css("background-color", "");
    $("#smryinfant").css("background-color", "");
    $("#smrychild").css("background-color", "");
    $("#smryadolescent").css("background-color", "");
    $("#smryelderly").css("background-color", "");

    n = []; inf = []; c = []; a = []; e = []; dobs = []; age = []; cdate = []; rgdate = []; ryear = []; rmont = []; rday = []; 
    cyear = []; cmon = []; cday = []; current_year = []; days = []; dob_year = [];
    start = []; end = []; fnames = []; mnames = []; lnames = []; multireltohead = [];
    $(".sw-btn-next").attr("disabled", false);
    $('#step-2').hide();
    window.location.href = '#step-1';
});


/*! 
 * SmartWizard v4.2.2
 * The awesome jQuery step wizard plugin with Bootstrap support
 * http://www.techlaboratory.net/smartwizard
 *
 * Created by Dipu Raj
 * http://dipuraj.me
 *
 * Licensed under the terms of the MIT License
 * https://github.com/techlab/SmartWizard/blob/master/LICENSE
 */

 ;(function ($, window, document, undefined) {
    "use strict";
    // Default options
    var defaults = {
            selected: 0,  // Initial selected step, 0 = first step
            keyNavigation: true, // Enable/Disable keyboard navigation(left and right keys are used if enabled)
            autoAdjustHeight: true, // Automatically adjust content height
            cycleSteps: false, // Allows to cycle the navigation of steps
            backButtonSupport: true, // Enable the back button support
            useURLhash: true, // Enable selection of the step based on url hash
            showStepURLhash: true, // Show url hash based on step
            lang: {  // Language variables for button
                next: 'Next',
                previous: 'Previous'
            },
            toolbarSettings: {
                toolbarPosition: 'bottom', // none, top, bottom, both
                toolbarButtonPosition: 'right', // left, right
                showNextButton: true, // show/hide a Next button
                showPreviousButton: true, // show/hide a Previous button
                toolbarExtraButtons: [] // Extra buttons to show on toolbar, array of jQuery input/buttons elements
            },
            anchorSettings: {
                anchorClickable: true, // Enable/Disable anchor navigation
                enableAllAnchors: false, // Activates all anchors clickable all times
                markDoneStep: true, // Add done css
                markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                removeDoneStepOnNavigateBack: false, // While navigate back done step after active step will be cleared
                enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
            },
            contentURL: null, // content url, Enables Ajax content loading. Can also set as data data-content-url on anchor
            contentCache: true, // cache step contents, if false content is fetched always from ajax url
            ajaxSettings: {}, // Ajax extra settings
            disabledSteps: [], // Array Steps disabled
            errorSteps: [], // Highlight step with errors
            hiddenSteps: [], // Hidden steps
            theme: 'default', // theme for the wizard, related css need to include for other than default theme
            transitionEffect: 'none', // Effect on navigation, none/slide/fade
            transitionSpeed: '400'
        };

    // The plugin constructor
    function SmartWizard(element, options) {
        // Merge user settings with default, recursively
        this.options = $.extend(true, {}, defaults, options);
        // Main container element
        this.main = $(element);
        // Navigation bar element
        this.nav = this.main.children('ul');
        // Step anchor elements
        this.steps = $("li > a", this.nav);
        // Content container
        this.container = this.main.children('div');
        // Content pages
        this.pages = this.container.children('div');
        // Active step index
        this.current_index = null;
        // Call initial method
        this.init();
    }

    $.extend(SmartWizard.prototype, {

        init: function () {
            // Set the elements
            this._setElements();
            // Add toolbar
            this._setToolbar();
            // Assign plugin events
            this._setEvents();

            var idx = this.options.selected;
            // Get selected step from the url
            if(this.options.useURLhash){
                // Get step number from url hash if available
                var hash = window.location.hash;
                if(hash && hash.length > 0){
                    var elm = $("a[href*='" + hash + "']", this.nav);
                    if(elm.length > 0){
                        var id = this.steps.index(elm);
                        idx = (id >= 0) ? id : idx;
                    }
                }
            }

            if(idx > 0 && this.options.anchorSettings.markDoneStep && this.options.anchorSettings.markAllPreviousStepsAsDone){
                // Mark previous steps of the active step as done
                this.steps.eq(idx).parent('li').prevAll().addClass("done");
            }

            // Show the initial step
            this._showStep(idx);
        },

// PRIVATE FUNCTIONS

_setElements: function () {
            // Set the main element
            this.main.addClass('sw-main sw-theme-' + this.options.theme);
            // Set anchor elements
            this.nav.addClass('nav nav-tabs step-anchor'); // nav-justified  nav-pills
            // Make the anchor clickable
            if(this.options.anchorSettings.enableAllAnchors !== false && this.options.anchorSettings.anchorClickable !== false){ this.steps.parent('li').addClass('clickable'); }
            // Set content container
            this.container.addClass('sw-container tab-content');
            // Set content pages
            this.pages.addClass('step-content');

            // Disabled steps
            var mi = this;
            if(this.options.disabledSteps && this.options.disabledSteps.length > 0){
                $.each(this.options.disabledSteps, function(i, n){
                    mi.steps.eq(n).parent('li').addClass('disabled');
                });
            }
            // Error steps
            if(this.options.errorSteps && this.options.errorSteps.length > 0){
              $.each(this.options.errorSteps, function(i, n){
                mi.steps.eq(n).parent('li').addClass('danger');
            });
          }
            // Hidden steps
            if(this.options.hiddenSteps && this.options.hiddenSteps.length > 0){
              $.each(this.options.hiddenSteps, function(i, n){
                mi.steps.eq(n).parent('li').addClass('hidden');
            });
          }

          return true;
      },
      _setToolbar: function () {
            // Skip right away if the toolbar is not enabled
            if(this.options.toolbarSettings.toolbarPosition === 'none'){ return true; }

            // Create the toolbar buttons
            var btnNext = (this.options.toolbarSettings.showNextButton !== false) ? $('<button></button>').text(this.options.lang.next).addClass('btn btn-default sw-btn-next').attr('type','button') : null;
            var btnPrevious = (this.options.toolbarSettings.showPreviousButton !== false) ? $('<button></button>').text(this.options.lang.previous).addClass('btn btn-default sw-btn-prev').attr('type','button') : null;
            var btnGroup = $('<div></div>').addClass('btn-group navbar-btn sw-btn-group pull-' + this.options.toolbarSettings.toolbarButtonPosition).attr('role','group').append(btnPrevious, btnNext);

            // Add extra toolbar buttons
            var btnGroupExtra = null;

            if(this.options.toolbarSettings.toolbarExtraButtons && this.options.toolbarSettings.toolbarExtraButtons.length > 0){
                btnGroupExtra = $('<div></div>').addClass('btn-group navbar-btn sw-btn-group-extra pull-' + this.options.toolbarSettings.toolbarButtonPosition).attr('role','group');
                $.each(this.options.toolbarSettings.toolbarExtraButtons, function( i, n ) {
                    btnGroupExtra.append(n.clone(true));
                });
            }

            var toolbarTop, toolbarBottom;
            // Append toolbar based on the position
            switch(this.options.toolbarSettings.toolbarPosition){
                case 'top':
                toolbarTop = $('<nav></nav>').addClass('navbar btn-toolbar sw-toolbar sw-toolbar-top');
                toolbarTop.append(btnGroup);
                if(this.options.toolbarSettings.toolbarButtonPosition === 'left'){
                    toolbarTop.append(btnGroupExtra);
                }else{
                    toolbarTop.prepend(btnGroupExtra);
                }
                this.container.before(toolbarTop);
                break;
                case 'bottom':
                toolbarBottom = $('<nav></nav>').addClass('navbar btn-toolbar sw-toolbar sw-toolbar-bottom');
                toolbarBottom.append(btnGroup);
                if(this.options.toolbarSettings.toolbarButtonPosition === 'left'){
                    toolbarBottom.append(btnGroupExtra);
                }else{
                    toolbarBottom.prepend(btnGroupExtra);
                }
                this.container.after(toolbarBottom);
                break;
                case 'both':
                toolbarTop = $('<nav></nav>').addClass('navbar btn-toolbar sw-toolbar sw-toolbar-top');
                toolbarTop.append(btnGroup);
                if(this.options.toolbarSettings.toolbarButtonPosition === 'left'){
                    toolbarTop.append(btnGroupExtra);
                }else{
                    toolbarTop.prepend(btnGroupExtra);
                }
                this.container.before(toolbarTop);

                toolbarBottom = $('<nav></nav>').addClass('navbar btn-toolbar sw-toolbar sw-toolbar-bottom');
                toolbarBottom.append(btnGroup.clone(true));
                if(this.options.toolbarSettings.toolbarButtonPosition === 'left'){
                    toolbarBottom.append(btnGroupExtra.clone(true));
                }else{
                    toolbarBottom.prepend(btnGroupExtra.clone(true));
                }
                this.container.after(toolbarBottom);
                break;
                default:
                toolbarBottom = $('<nav></nav>').addClass('navbar btn-toolbar sw-toolbar sw-toolbar-bottom');
                toolbarBottom.append(btnGroup);
                if(this.options.toolbarSettings.toolbarButtonPosition === 'left'){
                    toolbarBottom.append(btnGroupExtra);
                }else{
                    toolbarBottom.prepend(btnGroupExtra);
                }
                this.container.after(toolbarBottom);
                break;
            }
            return true;
        },
        _setEvents: function () {
            // Anchor click event
            var mi = this;
            $(this.steps).on( "click", function(e) {
                e.preventDefault();
                if(mi.options.anchorSettings.anchorClickable === false) { return true; }
                var idx = mi.steps.index(this);
                if(mi.options.anchorSettings.enableAnchorOnDoneStep === false && mi.steps.eq(idx).parent('li').hasClass('done')) { return true; }

                if(idx !== mi.current_index) {
                    if(mi.options.anchorSettings.enableAllAnchors !== false && mi.options.anchorSettings.anchorClickable !== false){
                        mi._showStep(idx);
                    }else{
                        if(mi.steps.eq(idx).parent('li').hasClass('done')){
                            mi._showStep(idx);
                        }
                    }
                }
            });

            // Next button event
            $('.sw-btn-next', this.main).on( "click", function(e) {
                e.preventDefault();
                var registrationForm = $('#AddForm');

                $.validator.setDefaults({
                    highlight: function(element) {
                        $(element)
                        .closest('.form-group')
                        .addClass('has-error');
                    },
                    unhighlight: function(element) {
                        $(element)
                        .closest('.form-group')
                        .removeClass('has-error');
                    },
                })

                if(registrationForm.length){

                  registrationForm.validate({
                    onfocusout: false,
                    invalidHandler: function(form, validator) {
                        var errors = validator.numberOfInvalids();
                        if (errors) {                    
                            validator.errorList[0].element.focus();
                        }
                    },

                    rules:{
                      firstname: {
                          required: true,
                          nowhitespace: true,
                          lettersonly: true
                      },
                      middlename: {

                          nowhitespace: true,
                          lettersonly: true
                      },
                      lastname: {
                          required: true,
                          nowhitespace: true,
                          lettersonly: true
                      },
                      qualifier: {
                          nowhitespace: true,
                          lettersonly: true
                      },
                      dateofbirth: {
                          required: true

                      },
                      placeofbirth: {
                          required: true,
                        
                          lettersonly: true
                      },
                      Citizenship: {
                        required: true,
                        nowhitespace: true,
                        lettersonly: true
                    },
                    houseno: {
                        required: true,


                    },
                    hstreet: {
                        required: true,

                    },
                    hphase: {
                        required: true,


                    },
                },
                messages:{
                  firstname: {
                      required: 'This field is required',
                      nowhitespace: 'No white space allowed',
                      lettersonly: 'letters only'
                  },
                  middlename: {
                      nowhitespace: 'No white space allowed',
                      lettersonly: 'letters only'
                  },
                  lastname: {
                      required: 'This field is required',
                      nowhitespace: 'No white space allowed',
                      lettersonly: 'letters only'
                  },
                  qualifier: {
                      nowhitespace: 'No white space allowed',
                      lettersonly: 'letters only'
                  },
                  dateofbirth: {
                      required: 'This field is required'
                  },
                  placeofbirth: {
                      required: 'This field is required',
                      nowhitespace: 'No white space allowed',
                      lettersonly: 'letters only'
                  },
                  Citizenship: {
                      required: 'This field is required',
                      nowhitespace: 'No white space allowed',
                      lettersonly: 'letters only'
                  },
              },

              errorPlacement: function(error, element) 
              {
                if (element.is(":radio")) 
                {
                    error.appendTo(element.parents('.gender'));
                }
                else if(element.is(":checkbox")){
                    error.appendTo(element.parents('.hobbies'));
                }
                else 
                { 
                    error.insertAfter( element );
                }
            }

        });
              }

              if($('#AddForm').valid()) {

                 if(mi.steps.index(this) !== mi.current_index) {
                    loadsummary();
                    mi._showNext();
                }

            }

            

        });

            // Previous button event
            $('.sw-btn-prev', this.main).on( "click", function(e) {
                e.preventDefault();
                if(mi.steps.index(this) !== mi.current_index) {
                    mi._showPrevious();
                }
            });

            // Keyboard navigation event
            if(this.options.keyNavigation){
                $(document).keyup(function(e){
                    mi._keyNav(e);
                });
            }

            // Back/forward browser button event
            if(this.options.backButtonSupport){
                $(window).on('hashchange', function(e) {
                    if(!mi.options.useURLhash) { return true; }
                    if(window.location.hash) {
                        var elm = $("a[href*='"+window.location.hash+"']", mi.nav);
                        if(elm && elm.length > 0){
                            e.preventDefault();
                            mi._showStep(mi.steps.index(elm));
                        }
                    }
                });
            }

            return true;
        },
        _showNext: function () {
            var si = this.current_index + 1;
            // Find the next not disabled step
            for(var i = si; i < this.steps.length; i++){
                if(!this.steps.eq(i).parent('li').hasClass('disabled') && !this.steps.eq(i).parent('li').hasClass('hidden')){
                    si=i;
                    break;
                }
            }

            if(this.steps.length <= si){
              if(!this.options.cycleSteps){ return false; }
              si = 0;
          }
          this._showStep(si);
          return true;
      },
      _showPrevious: function () {
        var si = this.current_index - 1;
            // Find the previous not disabled step
            for(var i = si; i >= 0; i--){
                if(!this.steps.eq(i).parent('li').hasClass('disabled') && !this.steps.eq(i).parent('li').hasClass('hidden')){
                    si=i;
                    break;
                }
            }
            if(0 > si){
              if(!this.options.cycleSteps){ return false; }
              si = this.steps.length - 1;
          }
          this._showStep(si);
          return true;
      },
      _showStep: function (idx) {
            // If step not found, skip
            if(!this.steps.eq(idx)){ return false; }
            // If current step is requested again, skip
            if(idx == this.current_index){ return false; }
            // If it is a disabled step, skip
            if(this.steps.eq(idx).parent('li').hasClass('disabled') || this.steps.eq(idx).parent('li').hasClass('hidden')){ return false; }
            // Load step content
            this._loadStepContent(idx);
            return true;
        },
        _loadStepContent: function (idx) {
            var mi = this;
            // Get current step elements
            var curTab = this.steps.eq(this.current_index);
            // Get the direction of step navigation
            var stepDirection = '';
            var elm = this.steps.eq(idx);
            var contentURL = (elm.data('content-url') && elm.data('content-url').length > 0) ? elm.data('content-url') : this.options.contentURL;

            if(this.current_index !== null && this.current_index !== idx){
                stepDirection = (this.current_index < idx) ? "forward" : "backward";
            }

            // Trigger "leaveStep" event
            if(this.current_index !== null && this._triggerEvent("leaveStep", [curTab, this.current_index, stepDirection]) === false){ return false; }

            if(contentURL && contentURL.length > 0 && (!elm.data('has-content') || !this.options.contentCache)){
                // Get ajax content and then show step
                var selPage = (elm.length>0) ? $(elm.attr("href"),this.main) : null;

                var ajaxSettings = $.extend(true, {}, {
                    url: contentURL,
                    type: "POST",
                    data: ({step_number : idx}),
                    dataType: "text",
                    beforeSend: function(){
                        elm.parent('li').addClass('loading');
                    },
                    error: function(jqXHR, status, message){
                        elm.parent('li').removeClass('loading');
                        $.error(message);
                    },
                    success: function(res){
                        if(res && res.length > 0){
                            elm.data('has-content',true);
                            selPage.html(res);
                        }
                        elm.parent('li').removeClass('loading');
                        mi._transitPage(idx);
                    }
                }, this.options.ajaxSettings);

                $.ajax(ajaxSettings);
            }else{
                // Show step
                this._transitPage(idx);
            }
            return true;
        },
        _transitPage: function (idx) {
            var mi = this;
            // Get current step elements
            var curTab = this.steps.eq(this.current_index);
            var curPage = (curTab.length>0) ? $(curTab.attr("href"),this.main) : null;
            // Get step to show elements
            var selTab = this.steps.eq(idx);
            var selPage = (selTab.length>0) ? $(selTab.attr("href"),this.main) : null;
            // Get the direction of step navigation
            var stepDirection = '';
            if(this.current_index !== null && this.current_index !== idx){
                stepDirection = (this.current_index < idx) ? "forward" : "backward";
            }

            var stepPosition = 'middle';
            if(idx === 0){
                stepPosition = 'first';
            }else if(idx === (this.steps.length-1)){
                stepPosition = 'final';
            }

            this.options.transitionEffect = this.options.transitionEffect.toLowerCase();
            this.pages.finish();
            if(this.options.transitionEffect === 'slide'){ // normal slide
                if(curPage && curPage.length > 0){
                    curPage.slideUp('fast',this.options.transitionEasing,function(){
                        selPage.slideDown(mi.options.transitionSpeed,mi.options.transitionEasing);
                    });
                }else{
                    selPage.slideDown(this.options.transitionSpeed,this.options.transitionEasing);
                }
            }else if(this.options.transitionEffect === 'fade'){ // normal fade
                if(curPage && curPage.length > 0){
                    curPage.fadeOut('fast',this.options.transitionEasing,function(){
                        selPage.fadeIn('fast',mi.options.transitionEasing,function(){
                            $(this).show();
                        });
                    });
                }else{
                    selPage.fadeIn(this.options.transitionSpeed,this.options.transitionEasing,function(){
                        $(this).show();
                    });
                }
            }else{
                if(curPage && curPage.length > 0) { curPage.hide(); }
                selPage.show();
            }
            // Change the url hash to new step
            this._setURLHash(selTab.attr("href"));
            // Update controls
            this._setAnchor(idx);
            // Set the buttons based on the step
            this._setButtons(idx);
            // Fix height with content
            this._fixHeight(idx);
            // Update the current index
            this.current_index = idx;

            // Trigger "showStep" event
            this._triggerEvent("showStep", [selTab, this.current_index, stepDirection, stepPosition]);
            return true;
        },
        _setAnchor: function (idx) {
            // Current step anchor > Remove other classes and add done class
            this.steps.eq(this.current_index).parent('li').removeClass("active danger loading");
            if(this.options.anchorSettings.markDoneStep !== false && this.current_index !== null){
                this.steps.eq(this.current_index).parent('li').addClass("done");
                if(this.options.anchorSettings.removeDoneStepOnNavigateBack !== false){
                    this.steps.eq(idx).parent('li').nextAll().removeClass("done");
                }
            }

            // Next step anchor > Remove other classes and add active class
            this.steps.eq(idx).parent('li').removeClass("done danger loading").addClass("active");
            return true;
        },
        _setButtons: function (idx) {
            // Previous/Next Button enable/disable based on step
            if(!this.options.cycleSteps){
                if(0 >= idx){
                  $('.sw-btn-prev', this.main).addClass("disabled");
              }else{
                  $('.sw-btn-prev', this.main).removeClass("disabled");
              }
              if((this.steps.length-1) <= idx){
                  $('.sw-btn-next', this.main).addClass("disabled");
              }else{
                  $('.sw-btn-next', this.main).removeClass("disabled");
              }
          }
          return true;
      },

// HELPER FUNCTIONS

_keyNav: function (e) {
    var mi = this;
            // Keyboard navigation
            switch(e.which) {
                case 37: // left
                mi._showPrevious();
                e.preventDefault();
                break;
                case 39: // right
                mi._showNext();
                e.preventDefault();
                break;
                default: return; // exit this handler for other keys
            }
        },
        _fixHeight: function (idx) {
            // Auto adjust height of the container
            if(this.options.autoAdjustHeight){
                var selPage = (this.steps.eq(idx).length > 0) ? $(this.steps.eq(idx).attr("href"),this.main) : null;
                this.container.finish().animate({minHeight: selPage.outerHeight()}, this.options.transitionSpeed, function(){});
            }
            return true;
        },
        _triggerEvent: function (name, params) {
            // Trigger an event
            var e = $.Event(name);
            this.main.trigger(e, params);
            if (e.isDefaultPrevented()) { return false; }
            return e.result;
        },
        _setURLHash: function (hash) {
            if(this.options.showStepURLhash && window.location.hash !== hash){
                window.location.hash = hash;
            }
        },

// PUBLIC FUNCTIONS

theme: function (v) {
    if(this.options.theme === v) { return false; }
    this.main.removeClass('sw-theme-' + this.options.theme);
    this.options.theme = v;
    this.main.addClass('sw-theme-' + this.options.theme);
            // Trigger "themeChanged" event
            this._triggerEvent("themeChanged", [this.options.theme]);
        },
        next: function () {
            this._showNext();
        },
        prev: function () {
            this._showPrevious();
        },
        reset: function () {
            // Trigger "beginReset" event
            if(this._triggerEvent("beginReset") === false){ return false; }

            // Reset all elements and classes
            this.container.stop(true);
            this.pages.stop(true);
            this.pages.hide();
            this.current_index = null;
            this._setURLHash(this.steps.eq(this.options.selected).attr("href"));
            $(".sw-toolbar", this.main).remove();
            this.steps.removeClass();
            this.steps.parents('li').removeClass();
            this.steps.data('has-content', false);
            this.init();

            // Trigger "endReset" event
            this._triggerEvent("endReset");
        },
        stepState: function (stepArray, state) {
            var mi = this;
            stepArray = $.isArray(stepArray) ? stepArray : [stepArray];
            var selSteps = $.grep( this.steps, function( n, i ) {
                return ($.inArray(i, stepArray) !== -1 && i !== mi.current_index);
            });
            if(selSteps && selSteps.length > 0){
                switch (state)
                {
                    case 'disable':
                    $(selSteps).parents('li').addClass('disabled');
                    break;
                    case 'enable':
                    $(selSteps).parents('li').removeClass('disabled');
                    break;
                    case 'hide':
                    $(selSteps).parents('li').addClass('hidden');
                    break;
                    case 'show':
                    $(selSteps).parents('li').removeClass('hidden');
                    break;
                }
            }
        }
    });

    // Wrapper for the plugin
    $.fn.smartWizard = function(options) {
        var args = arguments;
        var instance;

        if (options === undefined || typeof options === 'object') {
            return this.each( function() {
                if ( !$.data( this, "smartWizard") ) {
                    $.data( this, "smartWizard", new SmartWizard( this, options ) );
                }
            });
        } else if (typeof options === 'string' && options[0] !== '_' && options !== 'init') {
            instance = $.data(this[0], 'smartWizard');

            if (options === 'destroy') {
                $.data(this, 'smartWizard', null);
            }

            if (instance instanceof SmartWizard && typeof instance[options] === 'function') {
                return instance[options].apply( instance, Array.prototype.slice.call( args, 1 ) );
            } else {
                return this;
            }
        }
    };

})(jQuery, window, document);
function loadsummary() {

 
   
   multireltohead[0] = "Household Head";
     
    $('#step-2').show();
    console.log(fnames.length);
    
    console.log(multireltohead);
    $("input[name=firstname]").each(function() {
        fnames.push($(this).val())
    });

    $("input[name=middlename]").each(function() {
        mnames.push($(this).val())
    });
    
    $("input[name=lastname]").each(function() {
        lnames.push($(this).val())
    });

    $("input[name=dateofbirth]").each(function() {
        dobs.push($(this).val())
    });

    if(fnames.length >= 1) {
       
    }

     $("#multireltohead option:selected").each(function(){
             multireltohead.push($(this).val())
        });

        $("input[name=multifname]").each(function() {
            fnames.push($(this).val())
        });

        $("input[name=multimname]").each(function() {
            mnames.push($(this).val())
        });

        $("input[name=multilname]").each(function() {
            lnames.push($(this).val())
        });
    

        $("input[name=multidoba]").each(function() {
            dobs.push($(this).val())
        });
   
    

    

    
    


    for(var i=0; i<dobs.length; i++) {
        cdate.push(new Date(Date.now()));
        rgdate.push(new Date(dobs[i]));
        ryear[i] = parseInt(rgdate[i].getFullYear());
        rmont[i] = parseInt(String(rgdate[i].getMonth() + 1).padStart(2, '0'));
        rday[i] = parseInt(String(rgdate[i].getDate()).padStart(2, '0'));
        cyear[i] = parseInt(cdate[i].getFullYear());
        cmon[i] = parseInt(cdate[i].getMonth() + 1);
        cday[i] = parseInt(String(cdate[i].getDate()).padStart(2, '0'));
        age[i] = cyear[i] - ryear[i];

        if (rday[i] >= 32) { rday[i] = 1; }
        if (rmont[i] >= 13) { rmont[i] = 1; }

        current_year[i] = new Date(cyear[i],cmon[i],cday[i]);
        dob_year[i] = new Date(ryear[i],rmont[i],rday[i]);
        const oneDay = 1000 * 60 * 60 * 24; 
            //days[i] = DaysBetween(dob_year,current_year);
            start[i] = Date.UTC(current_year[i].getFullYear(), current_year[i].getMonth(), current_year[i].getDate()); 
            end[i] = Date.UTC(dob_year[i].getFullYear(), dob_year[i].getMonth(), dob_year[i].getDate()); 
            days[i] = Math.round(Math.abs((start[i] - end[i] ) / oneDay));

            if (age[i]==0 || age[i]<0) {

                if (days[i] <= 28 && days[i] >= 0) { 
                     //fcolors[i]="#ffcdcc";
                     n[i]="Yes";inf[i]="No";c[i]="No";a[i]="No";e[i]="No";
                 }
                 if (days[i] >= 29) {
                    n[i]="No";inf[i]="Yes";c[i]="No";a[i]="No";e[i]="No";
                }
            }
            if (age[i] >= 1 && age[i] <= 10) {
                n[i]="No";inf[i]="No";c[i]="Yes";a[i]="No";e[i]="No";
            }
            if (age[i] >= 11 && age[i] <= 59) {
                n[i]="No";inf[i]="No";c[i]="No";a[i]="Yes";e[i]="No";
            }
            if (age[i] >= 60) {
                n[i]="No";inf[i]="No";c[i]="No";a[i]="No";e[i]="Yes";
            }
            console.log(age)


        }

        var j=1;
        $('#summary_tabl').closest('table').find('tbody').append(

            '<tr>\n'
            +'<td style="font-weight: bold; border: 1px solid black; text-align: center;">List\'s of household members<p></p></td>\n'

            +'<tr>\n'
            +'<td>Name of Member</td>\n'
            +'<td>Relationship to Household Head</td>\n'
            +'<td>New Born</td>\n'
            +'<td>Infant</td>\n'
            +'<td>Child</td>\n'
            +'<td>Adolescent</td>\n'
            +'<td>Elderly</td>\n'
            +'<tr>\n'
            +'<tr>\n'
            );
        console.log(fnames)
        console.log(mnames)
        console.log(lnames)
        console.log(multireltohead)
        console.log(dobs.length)
        var ncolors = []; var icolors = []; var ccolors = []; var acolors = []; var ecolors = [];
        var length = 0;
        for (var i=0; i<dobs.length; i++ ) {

            n[i]=="Yes"?ncolors[i]="#ddefc9":ncolors[i]="#ffcdcc";
            i[i]=="Yes"?icolors[i]="#ddefc9":icolors[i]="#ffcdcc";
            c[i]=="Yes"?ccolors[i]="#ddefc9":ccolors[i]="#ffcdcc";
            a[i]=="Yes"?acolors[i]="#ddefc9":acolors[i]="#ffcdcc";
            e[i]=="Yes"?ecolors[i]="#ddefc9":ecolors[i]="#ffcdcc";
            if(fnames[i] != undefined && lnames[i] != undefined ) {
            $('#summary_tabl').closest('table').find('tbody').append(
                '<tr>\n'
                
                +'<td colspan="1" style="font-weight:bold" id="multimembers" name="multimembers">'
                +j++ +'.    '+fnames[i] +' '+mnames[i]+' '+lnames[i]
                +'</td> \n'
                +'<td id="smryrelation">'+multireltohead[i]+'</td>\n'
                +'<td id="smrynewborn" style="background-color:'+ncolors[i]+'">'+n[i]+'</td>\n'
                +'<td id="smryinfant" style="background-color:'+icolors[i]+'">'+inf[i]+'</td>\n'
                +'<td id="smrychild" style="background-color:'+ccolors[i]+'">'+c[i]+'</td>\n'
                +'<td id="smryadolescent" style="background-color:'+acolors[i]+'">'+a[i]+'</td>\n'
                +'<td id="smryelderly" style="background-color:'+ecolors[i]+'">'+e[i]+'</td>\n'


                ); 
            length+=1;
            }


        }

        $('#summary_tabl').closest('table').find('tbody').append(

            +'<tr>\n'
            +'<tr>\n'
            +'<td></td>\n'
            +'<td></td>\n'
            +'<td></td>\n'
            +'<td></td>\n'
            +'<td></td>\n'
            +'<td></td>\n'
            +'<td></td>\n'
            +'<tr>\n'
            +'<tr>\n'
            +'<td style="font-weight: bold">TOTAL: '+length+'</td>\n'
            +'<td></td>\n'
            +'<td></td>\n'
            +'<td style="font-weight: bold"></td>\n'
            +'<td></td>\n'
            +'<td></td>\n'
            +'<td></td>\n' 
            +'<tr>\n'
            +'<tr>\n'+'<tr>\n'+'<tr>\n'+'<tr>\n'+'<tr>\n'+'<tr>\n'+'<tr>\n'+'<tr>\n'

            );  


        $('#summary_housing').closest('table').find('tbody').append(

            '<tr>\n'
            +'<td style="font-weight: bold; text-align: center;">Nature of the House<p></p></td>\n'

            +'<tr>\n'
            +'<td>With Toilet</td>\n'
            +'<td>With Play Area</td>\n'
            +'<td>With Bedroom</td>\n'
            +'<td>With Dining Room</td>\n'
            +'<td>With Sala</td>\n'
            +'<td>With Kitchen</td>\n'
            +'<tr>\n'
            +'<tr>\n'
            );              

        if($("#cssCheckbox1Toilet").is(":checked")){smrytoilet="&#10003;"}else{smrytoilet="&times;"}
        if($("#cssCheckbox2Playarea").is(":checked")){smryparea="&#10003;"}else{smryparea="&times;"}
        if($("#cssCheckbox3Bedroom").is(":checked")){smrybedroom="&#10003;"}else{smrybedroom="&times;"}
        if($("#cssCheckbox4diningroom").is(":checked")){smrydroom="&#10003;"}else{smrydroom="&times;"}
        if($("#cssCheckbox5sala").is(":checked")){smrysala="&#10003;"}else{smrysala="&times;"}
        if($("#cssCheckbox6kitchen").is(":checked")){smrykitcheb="&#10003;"}else{smrykitcheb="&times;"}
   // val="&#10003;"

   $('#summary_housing').closest('table').find('tbody').append(
    '<tr>\n'

    +'<td id=""><span id="smrytoilet" style="font-weight: bold; font-size: 20px">'+smrytoilet+'</span></td> \n'
    +'<td id=""><span id="smryparea" style="font-weight: bold; font-size: 20px">'+smryparea+'</span></td>\n'

    +'<td id="" style="background-color:"><span id="smrybedroom" style="font-weight: bold; font-size: 20px">'+smrybedroom+'</span></td>\n'
    +'<td id="" style="background-color:"><span id="smrydroom" style="font-weight: bold; font-size: 20px">'+smrydroom+'</span></td>\n'
    +'<td id="" style="background-color:"><span id="smrysala" style="font-weight: bold; font-size: 20px">'+smrysala+'</span></td>\n'
    +'<td id="" style="background-color:"><span id="smrykitcheb" style="font-weight: bold; font-size: 20px">'+smrykitcheb+'</span></td>\n'
    );              


   $('#summary_utility').closest('table').find('tbody').append(

    '<tr>\n'
    +'<td style="font-weight: bold; text-align: center;">Utilities Available<p></p></td>\n'

    +'<tr>\n'
    +'<td>Running Water</td>\n'
    +'<td>Electricity</td>\n'
    +'<td>Aircon</td>\n'
    +'<td>Mobile Phone</td>\n'
    +'<td>Computer</td>\n'
    +'<td>Internet</td>\n'
    +'<td>Television</td>\n'
    +'<td>CD/DVD Player</td>\n'
    +'<td>Radio</td>\n'
    +'<tr>\n'
    +'<tr>\n'
    );              

   if($("#cssCheckboxRunningwater").is(":checked")){smrytoilet="&#10003;"}else{smrytoilet="&times;"}
   if($("#cssCheckboxElectricity").is(":checked")){smryparea="&#10003;"}else{smryparea="&times;"}
   if($("#cssCheckboxaircon").is(":checked")){smrybedroom="&#10003;"}else{smrybedroom="&times;"}
   if($("#cssCheckboxmobilephone").is(":checked")){smrydroom="&#10003;"}else{smrydroom="&times;"}
   if($("#cssCheckboxcomputer").is(":checked")){smrysala="&#10003;"}else{smrysala="&times;"}
   if($("#cssCheckboxinternet").is(":checked")){smrykitcheb="&#10003;"}else{smrykitcheb="&times;"}

   if($("#cssCheckboxtv").is(":checked")){smrytv="&#10003;"}else{smrytv="&times;"}
   if($("#cssCheckboxcdplayer").is(":checked")){smryplayer="&#10003;"}else{smryplayer="&times;"}
   if($("#cssCheckboxradio").is(":checked")){smryradio="&#10003;"}else{smryradio="&times;"}
   // val="&#10003;"

   $('#summary_utility').closest('table').find('tbody').append(
    '<tr>\n'

    +'<td id=""><span id="smrytoilet" style="font-weight: bold; font-size: 20px">'+smrytoilet+'</span></td> \n'
    +'<td id=""><span id="smryparea" style="font-weight: bold; font-size: 20px">'+smryparea+'</span></td>\n'

    +'<td id="" style="background-color:"><span id="smrybedroom" style="font-weight: bold; font-size: 20px">'+smrybedroom+'</span></td>\n'
    +'<td id="" style="background-color:"><span id="smrydroom" style="font-weight: bold; font-size: 20px">'+smrydroom+'</span></td>\n'
    +'<td id="" style="background-color:"><span id="smrysala" style="font-weight: bold; font-size: 20px">'+smrysala+'</span></td>\n'
    +'<td id="" style="background-color:"><span id="smrykitcheb" style="font-weight: bold; font-size: 20px">'+smrykitcheb+'</span></td>\n'
    +'<td id="" style="background-color:"><span id="smrykitcheb" style="font-weight: bold; font-size: 20px">'+smrytv+'</span></td>\n'
    +'<td id="" style="background-color:"><span id="smrykitcheb" style="font-weight: bold; font-size: 20px">'+smryplayer+'</span></td>\n'
    +'<td id="" style="background-color:"><span id="smrykitcheb" style="font-weight: bold; font-size: 20px">'+smryradio+'</span></td>\n'
    );              

   $('#summary_entertainment').closest('table').find('tbody').append(

    '<tr>\n'
    +'<td style="font-weight: bold; text-align: center;">Utilities Available<p></p></td>\n'

    +'<tr>\n'
    +'<td>Comics/Magazines</td>\n'
    +'<td>Newspapers</td>\n'
    +'<td>Pets</td>\n'
    +'<td>Books</td>\n'
    +'<td>Story Books</td>\n'
    +'<td>Toys</td>\n'
    +'<td>Board Games</td>\n'
    +'<td>Puzzles</td>\n'

    +'<tr>\n'
    +'<tr>\n'
    );              

   if($("#cssCheckboxradio").is(":checked")){smrytoilet="&#10003;"}else{smrytoilet="&times;"}
   if($("#cssCheckboxcomics").is(":checked")){smryparea="&#10003;"}else{smryparea="&times;"}
   if($("#cssCheckboxNewspaper").is(":checked")){smrybedroom="&#10003;"}else{smrybedroom="&times;"}
   if($("#cssCheckboxPets").is(":checked")){smrydroom="&#10003;"}else{smrydroom="&times;"}
   if($("#cssCheckboxbooks").is(":checked")){smrysala="&#10003;"}else{smrysala="&times;"}
   if($("#cssCheckboxstorybooks").is(":checked")){smrykitcheb="&#10003;"}else{smrykitcheb="&times;"}

   if($("#cssCheckboxboardgames").is(":checked")){smrytv="&#10003;"}else{smrytv="&times;"}
   if($("#cssCheckboxpuzzles").is(":checked")){smryplayer="&#10003;"}else{smryplayer="&times;"}
   
   // val="&#10003;"

   $('#summary_entertainment').closest('table').find('tbody').append(
    '<tr>\n'

    +'<td id=""><span id="smrytoilet" style="font-weight: bold; font-size: 20px">'+smrytoilet+'</span></td> \n'
    +'<td id=""><span id="smryparea" style="font-weight: bold; font-size: 20px">'+smryparea+'</span></td>\n'

    +'<td id="" style="background-color:"><span id="smrybedroom" style="font-weight: bold; font-size: 20px">'+smrybedroom+'</span></td>\n'
    +'<td id="" style="background-color:"><span id="smrydroom" style="font-weight: bold; font-size: 20px">'+smrydroom+'</span></td>\n'
    +'<td id="" style="background-color:"><span id="smrysala" style="font-weight: bold; font-size: 20px">'+smrysala+'</span></td>\n'
    +'<td id="" style="background-color:"><span id="smrykitcheb" style="font-weight: bold; font-size: 20px">'+smrykitcheb+'</span></td>\n'
    +'<td id="" style="background-color:"><span id="smrykitcheb" style="font-weight: bold; font-size: 20px">'+smrytv+'</span></td>\n'
    +'<td id="" style="background-color:"><span id="smrykitcheb" style="font-weight: bold; font-size: 20px">'+smryplayer+'</span></td>\n'

    );   
   
}



function validatedate(value,fd) {


    var dateofbirth = $('#dateofbirth').val();
    var cdate = new Date(Date.now());
    var rgdate = new Date(dateofbirth);
    var ryear = parseInt(rgdate.getFullYear());
    var rmont = parseInt(String(rgdate.getMonth() + 1).padStart(2, '0')) ;
    var rday = parseInt(String(rgdate.getDate()).padStart(2, '0') ) ;
    var cyear = parseInt(cdate.getFullYear());
    var cmon = parseInt(cdate.getMonth() + 1);
    var cday = parseInt(String(cdate.getDate()).padStart(2, '0'));

    var age = cyear - ryear;

    if (rday >= 32){
        rday = 1;
    }
    if (rmont >= 13){
        rmont = 1;
    }
    var current_year = new Date(cyear,cmon,cday);
    var dob_year = new Date(ryear,rmont,rday); 
    var days = DaysBetween(dob_year,current_year);
    console.log(age)
    if(value == "fordisplay") {
        if (age >= 1 ) {
            age == 1 ? $("#age").val(age + " year old") : $("#age").val(age + " year's old")
        }
        else if ( age < 1 ){
            days <= 1 ? $("#age").val(days + " day old") : $("#age").val(days + " day's old")
        }

    }
    else if (value == "editdisplay") {

    }
    else
        if ( value == "forajax" ) {

            if (age==0 || age<0) {


                if ( days <= 28 && days >= 0 ) {

                    var status = "newborn";
                    fd.append("status",status);
                    Add(fd);
                }
                else if ( days >= 29 ) {

                    var status = "infant";
                    fd.append("status",status);
                    Add(fd);
                }
            }
            else if (age >= 1 && age <= 10) {
                console.log('this is for children');
                console.log('child');
                var status = "child";
                fd.append("status",status);
                Add(fd);
            }
            else if (age >= 11 && age <= 19) {
                console.log('adolescent');
                console.log('child');
                var status = "adolescent";
                fd.append("status",status);
                Add(fd);
            }
            else if ( age >= 60 ) {
                console.log('elderly');
                console.log('elderly');
                var status = "elderly";
                fd.append("status",status);
                Add(fd);
            }
            else {
                Add(fd);
            }

        }



    }

    function DaysBetween(DateofBirth, CurrentYear) {

        const oneDay = 1000 * 60 * 60 * 24; 
        const start = Date.UTC(CurrentYear.getFullYear(), CurrentYear.getMonth(), CurrentYear.getDate()); 
        const end = Date.UTC(DateofBirth.getFullYear(), DateofBirth.getMonth(), DateofBirth.getDate()); 
        return Math.round(Math.abs((start - end ) / oneDay));
    }
    async function Add(fd) {

     swal("Data have been successfully added!", {
        icon: "success", 
    });

     try
     {
        // fd.map((e)=>{
        //     console.log(e);
        // })
        result = await $.ajax({
            url:"{{route('BasicInfoAdd')}}",
            type:'post',           
            data:fd,
            success:function(data)
            {
             console.log(data);
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

 function displayAge(birth, target) {
  let months = target.diff(birth, 'months', true)
  let birthSpan = {year: Math.floor(months/12), month: Math.floor(months)%12, day: Math.round((months%1)*target.daysInMonth(),0)}
              // you can adjust below logic as your requirements by yourself
              if (birthSpan.year < 1 && birthSpan.month < 1) {
                return birthSpan.day + ' day' + (birthSpan.day > 1 ? 's' : '')
            } else if (birthSpan.year < 1) {
                return birthSpan.month + ' month' + (birthSpan.month > 1 ? 's ' : ' ') + birthSpan.day + ' day' + (birthSpan.day > 1 ? 's' : '')
            } else if (birthSpan.year < 2) {
                return birthSpan.year + ' year' + (birthSpan.year > 1 ? 's ' : ' ') + birthSpan.month + ' month' + (birthSpan.month > 1 ? 's ' : '')
            } else {
                return birthSpan.year + ' year' + (birthSpan.year > 1 ? 's' : '')
            }

        }
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

        // var cr = new Date();
        // var dt =  new Date(bdate);
        // var dob = dt.getFullYear();
        // var cy = cr.getFullYear();
        // var age = cy - dob;


        var cdate = new Date(Date.now());
        var rgdate = new Date(bdate);
        var ryear = parseInt(rgdate.getFullYear());
        var rmont = parseInt(String(rgdate.getMonth() + 1).padStart(2, '0')) ;
        var rday = parseInt(String(rgdate.getDate()).padStart(2, '0') ) ;
        var cyear = parseInt(cdate.getFullYear());
        var cmon = parseInt(cdate.getMonth() + 1);
        var cday = parseInt(String(cdate.getDate()).padStart(2, '0'));

        var age = cyear - ryear;

        if (rday >= 32){
            rday = 1;
        }
        if (rmont >= 13){
            rmont = 1;
        }
        var current_year = new Date(cyear,cmon,cday);
        var dob_year = new Date(ryear,rmont,rday); 
        var days = DaysBetween(dob_year,current_year);

        if (contactnumber != null) { parse_number = parseInt(contactnumber); }
        if (house_no != null) { housenum = parseInt(house_no); }
        if(age >= 1) { 
            $('#edit_age').text(age); 
        }else if (age < 1) {


            get_bday = displayAge(bdate,moment());
            $('#edit_age').text(get_bday);
                // if(days>= 1 && days<= 28 || days>= 1 && days<= 31 || days>= 1 && days<= 30 ){

            //     $('#edit_age').text(days + " days");
            // }

        }


        $('#edit_age').val();

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
                           if (data == "true")
                           {
                            location.reload()
                        }
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
<script type="text/javascript">



  $('#mfn').change(function() {

    if($(this).val()=="Mother" || $(this).val()=="Father") {
        $('#childrendiv').show();

    } else {
        $('#childrendiv').hide()
    }
}); 




  $("#addVar").on("click",function(){


    $(this).closest('table').find('tbody').append(
        '<tr>\n' 

        +'<td><label style="text-align: left">&nbspFirst Name</label><input type="text" id=multifname name=multifname class="form-control multifname" placeholder="John">&nbsp\n'
        +'<label style="text-align: left">&nbspMiddle Name</label><input id=multimname name=multimname class="form-control multimname" placeholder="Doe">&nbsp\n'
        +'<label style="text-align: left">&nbspLast Name</label><input id=multilname name=multilname class="form-control multilname" placeholder="Smith" value="'+$('#lastname').val()+'">&nbsp\n'
        +'<label style="text-align: left">&nbspDate of Birth</label><input type="date" id=multidoba name=multidoba class="form-control multidoba">&nbsp\n'
        +'<label style="text-align: left">&nbspPlace of Birth</label><input id=multipoba name=multipoba class="form-control multipoba"  placeholder="Place of Birth">&nbsp\n'
        +'<label style="text-align: left">&nbspDate of Arrival</label><input type="date" id=multidoar name=multidoar class="form-control multidoar"  placeholder="Date of Arrival">\n'
        +'<label class="col-md-3 col-form-label text-md-right">Immunization/Last received vaccine</label><input type="date"id="multibimmunization" name="multibimmunization" class="form-control" placeholder="last received vaccine" />\n'
        +'<label class="col-md-3 col-form-label text-md-right">Family Visited</label><textarea id="multifvisited" name="multifvisited" class="form-control" placeholder="e.g government hospital, rhu/health center, brgy health station, private hospital, private clinic" ></textarea>\n'
        +'<label class="col-md-3 col-form-label text-md-right">Reason for Visit</label>\n'
        +'<textarea id="multirvisit" name="multirvisit" class="form-control" placeholder="e.g injured, prenatal/posnatal, gave birth,dental,medicinecheckup,medical requirment, NHTS/CCT/4P\'s private clinic"></textarea>\n'
        +'<label class="col-md-3 col-form-label text-md-right">Disability</label><input type="text" id="multidisability" name="multidisability" placeholder="" class="form-control"/>\n'




        +'</td>&nbsp\n'
        
        

        +'<td> <label style="text-align: left">&nbspCivil Status</label><select id=multicvstat name=multicvstat class="form-control multicvstat">\n'
        +'<option value="Single" selected>Single</option>\n'
        +'<option value="Married">Married</option>\n'
        +'<option value="Separated">Separated</option>\n'
        +'<option value="Widow">Widow</option>\n'
        +'<option value="Divorced">Divorced</option>\n'
        +'<option value="Annulled">Annulled</option>\n'
        +'<option value="Widower">Widower</option>\n'
        +'<option value="Single Parent">Single Parent</option>\n'

        +'</select>&nbsp\n'
        +'<label style="text-align: left">&nbspGender</label><select class="form-control multisex " id="multisex" name="multisex">\n'
        +'<option value="Male" selected>Male</option>\n'
        +'<option value="Female">Female</option>\n'
        +'</select>&nbsp\n'
        +'<label style="text-align: left">&nbspCitizenship</label><input id=multictizi name=multictizi class="form-control multictizi" placeholder="Citizenship">&nbsp\n'
        +'<label style="text-align: left">&nbspEducational Attainment</label><select id=multieducatt name=multieducatt class="form-control multieducatt"  >\n'
        +'<option value="Elementary School Graduate" selected>Elementary School Graduate</option>\n'

        +'<option value="High School Graduate">High School Graduate</option>\n'
        +'<option value="College Graduate">College Graduate</option>\n'
        +'<option value="Technical/Vocation Graduate">Technical/Vocation Graduate</option>\n'
        +'<option value="Masteral/Unit Degree">Masteral/Unit Degree</option>\n'
        +'<option value="Doctoral/Unit Degree">Doctoral/Unit Degree</option>\n'
        +'<option value="Not Applicable">Not Applicable</option>\n'
        +'</select>&nbsp\n'
        +'<label style="text-align: left">&nbspPlace of delivery</label><input type="text" id=multipdelivery name=multipdelivery class="form-control multifname" placeholder="e.g hospital, home">&nbsp\n'
        +'<label class="col-md-3 col-form-label text-md-right">Birth Attendant</label><textarea  id="multibattendant" name="multibattendant" placeholder="e.g , doctor, nurse, midwife, hilot" class="form-control"  ></textarea>\n'

        +'<label class="col-md-3 col-form-label text-md-right">Place of school</label><input type="text" id="multipschool" name="multipschool" class="form-control" />\n'
        +'<label class="col-md-3 col-form-label text-md-right">Place of delivery</label><input type="text" id="multipdelivery" name="multipdelivery" class="form-control" />\n'



        +'<div style="display: none" id="multioccup"><label style="text-align: left">&nbspOccupation</label><input id=multioccupation name=multioccupation class="form-control multioccupation" placeholder="e.g programmer" >&nbsp\n <div style="display: none" class="multi_showwork"><label style="text-align: left">&nbsp\n\nWork Status</label><select class="form-control multiws" data-style="btn-lime" name="multiws" id="multiws"><option value="NotApplicable" selected>Not Applicable</option><option value="Employed">Employed</option><option value="Unemployed">Unemployed</option><option value="Retired">Retired</option></select><label style="text-align: left">Date Started Working </label><input type="date" id="multidsw" name="multidsw" class="form-control multidsw"  /><label style="text-align: left">Is an OFW? <span class="text-danger">&nbsp;</span></label><div class="radio radio-css radio-inline"><input type="radio" name="multisofw" class="multisofw" id="MultiinlineCssRadioNo" value="0" checked /> <label for="MultiinlineCssRadioNo">No</label></div><div class="radio radio-css radio-inline"><input type="radio" class="multisofw" name="multisofw" id="MultiinlineCssRadioYes" value="1" /><label for="MultiinlineCssRadioYes">Yes</label></div></div></td>&nbsp\n'


        
        +'</div>\n'
        +'</td>&nbsp\n' 


        +'<td><label style="text-align: left">&nbspRelation to Household head</label><select id=multireltohead name=multireltohead class="form-control multireltohead">&nbsp\n'
        +'<option value="Spouse">Spouse </option>\n'
        +'<option value="Daughter">Daughter </option>\n'
        +'<option value="Stepson">Stepson</option>\n'
        +'<option value="Stepdaughter">Stepdaughter </option>\n'
        +'<option value="Son-in-law>Son-in-law</option>\n'
        +'<option value="Daughter-in-law">Daughter-in-law</option>\n'

        +'<option value="Grandson">Grandson </option>\n'
        +'<option value="Granddaughter">Granddaughter </option>\n'
        +'<option value="Father">Father </option>\n'
        +'<option value="Mother">Mother </option>\n'
        +'<option value="Brother">Brother </option>\n'
        +'<option value="Sister">Sister </option>\n'
        +'<option value="Uncle">Uncle </option>\n'
        +'<option value="Aunt">Aunt </option>\n'
        +'<option value="Nephew">Nephew </option>\n'
        +'<option value="Niece">Niece </option>\n'
        +'<option value="Other relative">Other relative</option>\n'
        +'<option value="Nonrelative">Nonrelative </option>\n'
        +'<option value="Boarder">Boarder </option>\n'
        +'<option value="Domestic helper">Domestic helper </option>\n'

        +'</select>&nbsp\n'
        +'<label style="text-align: left">&nbspContact Number</label><input id=multicontactc name=multicontactc class="form-control multicontactc" placeholder="(+639)">\n&nbsp'
        +'<label style="text-align: left">&nbspResident Type</label><select id=multityper name=multityper class="form-control multityper" >\n'

        +'<option value="Native Residents" selected>Native Residents</option>\n'

        +'<option value="Migrants">Migrants</option>\n'
        +'<option value="Transients">Transients</option>\n'

        +'</select>&nbsp\n'
        +'<div style="display: none" id="multishowmigrants">\n'
        +'<select class="form-control multim" data-style="btn-lime" name="multim" id="multim">\n'

        +'<option value="Country">From Other Country</option>\n'
        +'<option value="Barangay">From Other Barangay</option>\n'
        +'<option value="Province">From Other Province</option>\n'
        +'\n' 
        + '</select>&nbsp\n'
        +'<input id=multifromwhat name=multifromwhat class="form-control multifromwhat" placeholder="">\n'
        +'<label class="col-md-3 col-form-label text-md-right">Type of document</label><input type="text" id="multimdocument" name="multimdocument" placeholder="" class="form-control"/>\n'
        +'<label class="col-md-3 col-form-label text-md-right">When ctc is issued</label>\n'
        +'<input type="date" id="multimwhenissued" name="multimwhenissued" placeholder="" class="form-control"/>\n'
        +'<label class="col-md-3 col-form-label text-md-right">Where ctc is issued</label>\n'
        +'<input type="text" id="multimwhereissued" name="multimwhereissued" placeholder="" class="form-control"/>\n'

        +'</div>\n'


        +'<div style="display: none" class="div_multi_transient">\n'
        +'<label style="text-align: left">Reason for Coming<span class="text-danger">*</span></label> <textarea type="text" id="multirc" name="multirc" placeholder="" class="form-control multirc"></textarea>\n'


        +'<label style="text-align: left">Period of stay<br> start date<span class="text-danger">*</span></label>  <input type="date" id="multipstartdate" name="multipstartdate" placeholder="" class="form-control multipstartdate"/>\n'
        +'<label style="text-align: left">Period of stay<br> end date<span class="text-danger">*</span></label>  <input type="date" id="multipenddate" name="multipenddate" placeholder="" class="form-control multipenddate"/>\n'

        +'<label class="col-md-3 col-form-label text-md-right">Type of document</label><input type="text" id="multitdocument" name="multitdocument" placeholder="" class="form-control"/>\n'
        +'<label class="col-md-3 col-form-label text-md-right">When ctc is issued</label>\n'
        +'<input type="date" id="multiwhentissued" name="multiwhentissued" placeholder="" class="form-control"/>\n'
        +'<label class="col-md-3 col-form-label text-md-right">Where ctc is issued</label>\n'
        +'<input type="text" id="multiwheretissued" name="multiwheretissued" placeholder="" class="form-control"/>\n'

        +'</div>\n'



        +'<label style="text-align: left">&nbspResident Status</label><select id=multires name=multires class="form-control multires" >\n'

        +'<option value="Not A Parent" selected>Not A Parent</option>\n'
        +'<option value="Father">Father</option>\n'
        +'<option value="Mother">Mother</option>\n'

        +'</select>&nbsp\n'
        +'<label style="text-align: left">Is Registered Voter? <span class="text-danger">&nbsp;</span></label><div class="radio radio-css radio-inline"><input type="radio" name="multiirv" class="multiirv" id="MultiinlineRegisteredVoterNo" value="0" checked /><label for="MultiinlineRegisteredVoterNo">No</label></div><div class="radio radio-css radio-inline"><input type="radio" class="multiirv" name="multiirv" id="MultiinlineRegisteredVoterYes" value="1" /><label for="MultiinlineRegisteredVoterYes">Yes</label>\n'
        +'<td><a class="btn btn-danger" onclick="if($(\'#prodvartable tbody tr\').length>1)$(this).closest(\'tr\').remove()"><i class="fa fa-minus text-white"></i></a></td>\n' 
        +'</tr>\n'

        );
});

$("#register-btn").click(function(e){
    e.preventDefault();
    // start main household
    alert('insert')
                
              //resident
              var typeofdocument, wctcissued, wherectcissued; 
              var fname = $('#firstname').val();
              var mname = $('#middlename').val();
              var lname = $('#lastname').val();
              var qualifier = $('#qualifier').val();
              var selectedsex = $("input:radio[name=sex_gender]:checked").val();
              var dateofbirth = $('#dateofbirth').val();
              var civilstatus = $('#civilstatus').val();
              var placeofbirth = $('#placeofbirth').val();
              var is_ofw = $("input:radio[name=is_ofw]:checked").val();
              var is_registered_voter = $("input:radio[name=is_registered_voter]:checked").val();
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
              var fromwhat = $('#fromwhat').val();
              var r_coming = $('#r_coming').val();
              var p_startdate = $('#p_startdate').val();
              var p_enddate = $('#p_enddate').val();

              var houseno = $('#houseno').val();
              var hstreet = $('#hstreet').val();
              var hphase = $('#hphase').val();
              var hbuilding = $('#hbuilding').val();
              var hunitno = $('#hunitno').val();
              var hsubdivision = $('#hsubdivision').val();

              // new columns
              var pdelivery = $('#pdelivery').val();
              var battendant = $('#battendant').val();
              var bimmunization = $('#bimmunization').val();
              var fvisited = $('#fvisited').val();
              var rvisit = $('#rvisit').val();
              var disability = $('#disability').val();
              var pschool = $('#pschool').val();
              var religion = $('#religion').val();
              var lotownership = $('#lotownership').val();
              var sdtraining = $('#sdtraining').val();
              if(arrivalreason == 2) {
                typeofdocument = $('#mdocument').val();
                wctcissued = $('#mwhenissued').val();
                wherectcissued = $('#mwhereissued').val();
              }
              else if(arrivalreason == 3) {
                typeofdocument = $('#mdocument').val();
                wctcissued = $('#mwhenissued').val();
                wherectcissued = $('#mwhereissued').val();
              }
              else{
                typeofdocument = "";
                wctcissued = "";
                wherectcissued = "";
              }
              

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

                

                    // start multiple textbox
                    var multi_fname = [];
                    var multi_mname = [];
                    var multi_lname = [];
                    var multi_poba = [];
                    var multi_doba = [];
                    var multi_doar = [];
                    var multi_ctizi = [];
                    var multi_cvstat = [];
                    var multi_sex = [];
                    
                    var multi_educatt = [];
                    var multi_is_ofw = [];
                    var multi_occupation = [];
                    var multi_work_status = [];
                    var multi_dsw = [];
                    var multi_reltohead = [];
                    var multi_contactc = [];
                    var multi_typer = [];
                    var multim=[];
                    var multirc = [];
                    var multi_irv = [];
                    var multi_p_startdate = [];
                    var multi_p_enddate = [];

                    var multi_migrants = [];
                    var multi_fromwhat = [];
                    var multi_res = [];


                    $(".multifname").each(function(){
                        multi_fname.push($(this).val());
                    });

                    $(".multimname").each(function(){
                        multi_mname.push($(this).val());
                    });

                    $(".multilname").each(function(){
                        multi_lname.push($(this).val());
                    });

                    $(".multipoba").each(function(){
                        multi_poba.push($(this).val());
                    });

                    $(".multidoba").each(function(){
                        multi_doba.push($(this).val());
                    });

                    $(".multidoar").each(function(){
                        multi_doar.push($(this).val());
                    });

                    $(".multicvstat option:selected").each(function(){
                        multi_cvstat.push($(this).val());
                    });

                    $(".multisex option:selected").each(function(){
                        multi_sex.push($(this).val());
                    });

                    $(".multictizi").each(function(){
                        multi_ctizi.push($(this).val());
                    });
                    
                    $(".multieducatt option:selected").each(function(){
                        multi_educatt.push($(this).val());
                    });
                    $(".multioccupation").each(function(){
                        multi_occupation.push($(this).val());
                    });

                    $(".multisofw:checked").each(function(){
                        multi_is_ofw.push($(this).val());
                    });
                    $(".multiws").each(function(){
                        multi_work_status.push($(this).val());
                    });

                    $(".multidsw").each(function(){
                        multi_dsw.push($(this).val());
                    });

                    $(".multireltohead option:selected").each(function(){
                        multi_reltohead.push($(this).val());
                    });

                    $(".multicontactc").each(function(){
                        multi_contactc.push($(this).val());
                    });


                    $(".multityper option:selected").each(function(){
                        multi_typer.push($(this).val());
                    });

                    $(".multim option:selected").each(function(){
                        multim.push($(this).val());
                    });


                    $(".multirc").each(function(){
                        multirc.push($(this).val());
                    });

                    $(".multipstartdate").each(function(){
                        multi_p_startdate.push($(this).val());
                    });

                    $(".multipenddate").each(function(){
                        multi_p_enddate.push($(this).val());
                    });

                    $(".multiirv:checked").each(function(){
                        multi_irv.push($(this).val());
                    });

                    $(".multifromwhat").each(function(){
                        multi_fromwhat.push($(this).val());
                    });

                    $(".multires option:selected").each(function(){
                        multi_res.push($(this).val());
                    });


                    // end multiple textbox


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
                fd.append('is_registered_voter', is_registered_voter);
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
                fd.append('fromwhat', fromwhat);
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

                fd.append('pdelivery',pdelivery);
                fd.append('battendant',battendant);
                fd.append('bimmunization',bimmunization);
                fd.append('fvisited',fvisited);
                fd.append('rvisit',rvisit);
                fd.append('disability',disability);
                fd.append('pschool',pschool);
                fd.append('religion',religion);
                fd.append('lotownership',lotownership);
                fd.append('typeofdocument',typeofdocument);
                fd.append('wctcissued',wctcissued);
                fd.append('wherectcissued',wherectcissued);
                fd.append('sdtraining',sdtraining);
                //multiple append list of houshold members


               
                var multistatus = [];

                
              

                for(var i=0; i<multi_doba.length; i++) {
                    cdate.push(new Date(Date.now()));
                        rgdate.push(new Date(multi_doba[i]));
                        ryear[i] = parseInt(rgdate[i].getFullYear());
                        rmont[i] = parseInt(String(rgdate[i].getMonth() + 1).padStart(2, '0'));
                        rday[i] = parseInt(String(rgdate[i].getDate()).padStart(2, '0'));
                        cyear[i] = parseInt(cdate[i].getFullYear());
                        cmon[i] = parseInt(cdate[i].getMonth() + 1);
                        cday[i] = parseInt(String(cdate[i].getDate()).padStart(2, '0'));
                        age[i] = cyear[i] - ryear[i];

                        if (rday[i] >= 32) { rday[i] = 1; }
                        if (rmont[i] >= 13) { rmont[i] = 1; }

                        current_year[i] = new Date(cyear[i],cmon[i],cday[i]);
                        dob_year[i] = new Date(ryear[i],rmont[i],rday[i]);
                        const oneDay = 1000 * 60 * 60 * 24; 
                        //days[i] = DaysBetween(dob_year,current_year);
                        start[i] = Date.UTC(current_year[i].getFullYear(), current_year[i].getMonth(), current_year[i].getDate()); 
                        end[i] = Date.UTC(dob_year[i].getFullYear(), dob_year[i].getMonth(), dob_year[i].getDate()); 
                        days[i] = Math.round(Math.abs((start[i] - end[i] ) / oneDay));

                        if (age[i]==0 || age[i]<0) {

                            if (days[i] <= 28 && days[i] >= 0) { 
                                 //fcolors[i]="#ffcdcc";
                               multistatus[i] = "newborn";
                            }
                            else if (days[i] >= 29) {
                               multistatus[i] = "infant";
                            }
                        }
                        else if (age[i] >= 1 && age[i] <= 10) {
                                multistatus[i] = "child";
                        }
                        else if (age[i] >= 11 && age[i] <= 19) {
                                multistatus[i] = "adolescent";
                        }
                        else if (age[i] >= 60) {
                                multistatus[i] = "elderly";
                        }
                    }
                get_data = {


                firstname: fname,
                middlename: mname,
                lastname: lname,
                qualifier: qualifier,
                sex_gender: selectedsex,
                dateofbirth: dateofbirth,
                
                civilstatus: civilstatus,
                placeofbirth: placeofbirth,
                is_ofw: is_ofw,
                is_registered_voter: is_registered_voter,
                citizenship: citizenship,
                occupation: occupation,
                workstatus: workstatus,
                dateofstartwork: dateofstartwork,
                relationtohead: relationtohead,
                dateofarrive: dateofarrive,
                
                is_indegenous: is_indegenous,
                firstname: fname,
                contactnumber: contactnumber,
                arrivalreason: arrivalreason,
                fromwhat: fromwhat,
                r_coming: r_coming,
                p_startdate: p_startdate,
                p_enddate: p_enddate,

                houseno: houseno,
                hstreet: hstreet,
                hphase: hphase,
                hbuilding: hbuilding,
                hunitno: hunitno,
                hsubdivision: hsubdivision,

                homeownership: homeownership,
                buildmaterial: buildmaterial,
                numberofrooms:numberofrooms,
                barangayaddress_id:barangayzone_id,
                streetno:streetno,
                barangayzone_id:barangayzone_id,

                toilet: toilet,
                playarea: playarea,
                bedroom: bedroom,
                dining: dining,
                sala: sala,
                kitchen: kitchen,
                runningwater: runningwater,
                electricity: electricity,
                aircon: aircon,
                mobile: mobile,
                computer: computer,
                internet: internet,
                boxtv: boxtv,
                cdplayer: cdplayer,
                boxradio: boxradio,
                comics: comics,
                newspaper: newspaper,
                pets: pets,
                books: books,
                storybooks: storybooks,
                toys: toys,
                boardgames: boardgames,
                puzzles: puzzles,
                personinhousehold:personinhousehold,
                educationatt:educationatt,

                pdelivery:pdelivery,
                battendant:battendant,
                bimmunization:bimmunization,
                fvisited:fvisited,
                rvisit:rvisit,
                disability:disability,
                pschool:pschool,
                religion:religion,
                lotownership:lotownership,
                typeofdocument:typeofdocument,
                wctcissued:wctcissued,
                wherectcissued:wherectcissued,
                sdtraining:sdtraining,







                multi_fname :  multi_fname,
                multi_mname :multi_mname,
                multi_lname:multi_lname,
                multi_poba:multi_poba,
               
                multi_doar:multi_doar,
                multi_ctizi:multi_ctizi,
                multi_cvstat:multi_cvstat,
                multi_sex:multi_sex,
                multi_educatt:multi_educatt,
                multi_occupation:multi_occupation,
                multi_work_status:multi_work_status,
                multi_dsw:multi_dsw,
                multi_is_ofw:multi_is_ofw,
                multi_irv:multi_irv,
                multi_reltohead:multi_reltohead,
                multi_contactc:multi_contactc,
                multi_typer:multi_typer,
                multim:multim,
                multirc:multirc,
                multi_p_startdate:multi_p_startdate,
                multi_p_enddate:multi_p_enddate,
                multi_migrants:multi_migrants,
                multi_fromwhat:multi_fromwhat,
                multi_res:multi_res,
                multistatus:multistatus,
                multi_doba : multi_doba,
                _token: "{{ csrf_token() }}"
                };
           
                let result;
                //validatemultiage();
                //validate("forajax",fd);

               Add(get_data);

    // end main household


});

</script>


  
</script>
@endsection

@section('content')
<style type="text/css">
label {
    display: block;   
}

input.error {
    border: 1px solid red;
}

label.error {
    font-weight: normal;
    color: red;
    text-align: left;
}
</style>
<div id="content" class="content" >
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



                </div>
                <!-- end panel-body -->
            </div>
            <!-- end panel add new -->
            {{--Nav Pill Body End--}}
        </div>

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
                 <form id="AddForm">
                    @csrf
                    <div id="wizard">

                        <ul>
                            <li class="col-md-6 col-sm-3 col-6">
                                <a href="#step-1">
                                    <span class="number">1</span>
                                    <span class="info text-ellipsis">
                                        Personal Information
                                        <small class="text-ellipsis">Information about the resident and household information</small>
                                    </span>
                                </a>
                            </li>
                            <li class="col-md-6 col-sm-3 col-6">
                                <a href="#step-2" >
                                    <span class="number">2</span>
                                    <span class="info text-ellipsis">
                                        Summary
                                        <small class="text-ellipsis">Details about the resident's household</small>
                                    </span>
                                </a>
                            </li>

                        </ul>

                        <div id="step-1"  style="display: none" id="nbody">
                            
                            <!-- begin fieldset -->
                            <fieldset><br>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">First Name <span class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <input type="text" id="firstname" name="firstname" placeholder="John" class="form-control" />
                                            </div>
                                        </div>
                                        <!-- end form-group -->
                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Middle Name </label>
                                            <div class="col-md-6">
                                                <input type="text" id="middlename" name="middlename" class="form-control" />
                                            </div>
                                        </div>
                                        <!-- end form-group -->
                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Last Name <span class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <input type="text" id="lastname" name="lastname" placeholder="Smith"  class="form-control" />
                                            </div>
                                        </div>
                                        <!-- end form-group -->
                                        <!-- begin form-group -->
                                        <div class="form-group row m-b-10" style="display: none">
                                            <label class="col-md-3 col-form-label text-md-right">Qualifier</label>
                                            <div class="col-md-6">
                                                <input type="text" id="qualifier" name="qualifier" class="form-control" />
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
                                                <input type="date" id="dateofbirth" name="dateofbirth" placeholder="" class="form-control"  />

                                            </div>

                                        </div>
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Place of delivery<span class="text-danger">*</span></label>
                                            <div class="col-md-6">
                                                <input type="text" id="pdelivery" name="pdelivery" placeholder="e.g in home , hospital" class="form-control"  />

                                            </div>

                                        </div>
                                        <div class="form-group row m-b-10">
                                            <label class="col-md-3 col-form-label text-md-right">Birth Attendant</label>
                                            <div class="col-md-6">
                                                <textarea  id="battendant" name="battendant" placeholder="e.g , doctor, nurse, midwife, hilot" class="form-control"  ></textarea>
                                            </div>

                                        </div>
                                        <div class="form-group row m-b-10">
                                           <label class="col-md-3 col-form-label text-md-right">Age</label>
                                           <div class="col-md-6">
                                            <input type="text" id="age" name="age" class="form-control" style="background-color: white;" readonly />

                                        </div>
                                    </div>


                                    <div class="form-group row m-b-10">
                                       <label class="col-md-3 col-form-label text-md-right">Immunization/Last received vaccine</label>
                                       <div class="col-md-6">
                                        <input type="date" id="bimmunization" name="bimmunization" class="form-control"
                                        placeholder="last received vaccine" />

                                    </div>


                                </div>

                                <div class="form-group row m-b-10">
                                   <label class="col-md-3 col-form-label text-md-right">Family Visited</label>
                                   <div class="col-md-6">
                                    <textarea id="fvisited" name="fvisited" class="form-control"
                                    placeholder="e.g government hospital, rhu/health center, brgy health station, private hospital, private clinic" ></textarea>

                                </div>




                            </div>
                            <div class="form-group row m-b-10">
                               <label class="col-md-3 col-form-label text-md-right">Reason for Visit</label>
                               <div class="col-md-6">
                                <textarea id="rvisit" name="rvisit" class="form-control"
                                placeholder="e.g injured, prenatal/posnatal, gave birth, dental, medicine checkup,
                                medical requirment, NHTS/CCT/4P's private clinic" ></textarea>

                            </div>
                        </div>
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 col-form-label text-md-right">Disability</label>
                            <div class="col-md-6">
                                <input type="text" id="disability" name="disability" placeholder="" class="form-control"/>
                            </div>
                        </div>
                        <!-- end form-group -->
                        <!-- begin form-group -->
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 col-form-label text-md-right">Place of Birth <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input type="text" id="placeofbirth" name="placeofbirth" placeholder="" class="form-control"/>
                            </div>
                        </div>

                        <div class="form-group row m-b-10">
                            <label class="col-md-3 col-form-label text-md-right">Civil Status <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <select class="form-control " data-style="btn-lime" id="civilstatus" name="civilstatus">
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
                            <label class="col-md-3 col-form-label text-md-right">Citizenship</label>
                            <div class="col-md-6">
                                <input type="text" id="Citizenship" name="Citizenship" placeholder="Filipino" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 col-form-label text-md-right">Educational Attainment</label>
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

                        <div class="form-group row m-b-10">
                            <label class="col-md-3 col-form-label text-md-right">Place of school</label>
                            <div class="col-md-6">
                                <input type="text" id="pschool" name="pschool" class="form-control" />
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
                            <label class="col-md-3 col-form-label text-md-right">Is Registered Voter? <span class="text-danger">&nbsp;</span></label>
                            <div class="col-md-6">
                                <div class="radio radio-css radio-inline">
                                    <input type="radio" name="is_registered_voter" id="inlineRegisteredVoterNo" value="0" checked />
                                    <label for="inlineRegisteredVoterNo">No</label>
                                </div>
                                <div class="radio radio-css radio-inline">
                                    <input type="radio" name="is_registered_voter" id="inlineRegisteredVoterYes" value="1" />
                                    <label for="inlineRegisteredVoterYes">Yes</label>
                                </div>
                            </div>
                        </div>
                        <!-- end form-group -->
                        <!-- begin form-group -->

                        <div class="form-group row m-b-10" style="display: none" id="showoccu">
                            <label class="col-md-3 col-form-label text-md-right">Occupation </label>
                            <div class="col-md-6">
                                <input type="text" id="Occupation" name="Occupation" placeholder="Indicate None if so" class="form-control"  />
                            </div>
                        </div>
                        <!-- end form-group -->
                        <!-- begin form-group -->
                        <div style="display: none" id="showwork">
                            <div class="form-group row m-b-10" >
                                <label class="col-md-3 col-form-label text-md-right">Work Status<span class="text-danger">*</span></label>
                                <div class="col-md-6" >
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
                                    <input type="date" id="dateofstartwork" name="dateofstartwork" class="form-control"  />
                                </div>
                            </div>
                            <div class="form-group row m-b-10">
                                <label class="col-md-3 col-form-label text-md-right">Place of work</label>
                                <div class="col-md-6">
                                    <input type="text" id="placeofwork" name="placeofwork" class="form-control"  />
                                </div>
                            </div>
                            <div class="form-group row m-b-10" >
                                <label class="col-md-3 col-form-label text-md-right">Occupation Status<span class="text-danger"></span></label>
                                <div class="col-md-6" >

                                    <select class="form-control " data-style="btn-lime" name="workstatus" id="workstatus">
                                        <option value="Permanent" selected>Permanent</option>
                                        <option value="Casual">Casual</option>

                                        <option value="Contractual">Contractual</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row m-b-10">
                                <label class="col-md-3 col-form-label text-md-right">Monthly income</label>
                                <div class="col-md-6">
                                    <input type="text" id="mincome" name="mincome" class="form-control"  />
                                </div>
                            </div>

                            <div class="form-group row m-b-10">
                                <label class="col-md-3 col-form-label text-md-right">Health Insurance</label>
                                <div class="col-md-6">
                                    <input type="text" id="hinsurance" name="hinsurance" class="form-control"  />
                                </div>
                            </div>
                        </div>

                        <!-- end form-group -->
                        <!-- begin form-group -->
                        <div class="form-group row m-b-10" style="display: none">
                            <label class="col-md-3 col-form-label text-md-right">Relationship to Household Head<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input type="text" id="RelationToHead" name="RelationToHead" placeholder="Indicate Household Head if so" class="form-control"/>
                            </div>
                        </div>
                        <!-- end form-group -->
                        <!-- begin form-group -->
                        <div class="form-group row m-b-10">
                            <label class="col-md-3 col-form-label text-md-right">Date of Arrival to Barangay <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input type="date" id="dateofarrival" name="dateofarrival" placeholder="" class="form-control"/>
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
                    <div style="display: none" id="showmigrants">
                        <div class="form-group row m-b-10" >
                            <label class="col-md-3 col-form-label text-md-right">Migrants<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                             <select class="form-control " data-style="btn-lime" name="migrants" id="migrants">

                                <option value="Country">From Other Country</option>
                                <option value="Barangay">From Other Barangay</option>
                                <option value="Province">From Other Province</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group row m-b-10">
                        <label class="col-md-3 col-form-label text-md-right"><span class="text-danger"></span></label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" id="fromwhat" name="fromwhat" placeholder=""/>
                        </div>
                    </div>

                    <div class="form-group row m-b-10">
                        <label class="col-md-3 col-form-label text-md-right">Type of document<span class="text-danger"></span></label>
                        <div class="col-md-6">
                            <input type="text" id="mdocument" name="mdocument" placeholder="" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group row m-b-10">
                        <label class="col-md-3 col-form-label text-md-right">When ctc is issued<span class="text-danger"></span></label>
                        <div class="col-md-6">
                            <input type="date" id="mwhenissued" name="mwhenissued" placeholder="" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group row m-b-10">
                        <label class="col-md-3 col-form-label text-md-right">Where ctc is issued<span class="text-danger"></span></label>
                        <div class="col-md-6">
                            <input type="text" id="mwhereissued" name="mwhereissued" placeholder="" class="form-control"/>
                        </div>
                    </div>
                </div>

                <div id="div_transient" style="display: none">
                 <div class="form-group row m-b-10" >
                    <label class="col-md-3 col-form-label text-md-right">Reason for Coming<span class="text-danger">*</span></label>
                    <div class="col-md-6">
                        <textarea type="text" id="r_coming" name="r_coming" placeholder="" class="form-control"></textarea>
                    </div>
                </div>

                <div class="form-group row m-b-10">
                    <label class="col-md-3 col-form-label text-md-right">Period of stay<br> start date<span class="text-danger">*</span></label>
                    <div class="col-md-6">
                        <input type="date" id="p_startdate" name="p_startdate" placeholder="" class="form-control"/>
                    </div>
                </div>

                <div class="form-group row m-b-10">
                    <label class="col-md-3 col-form-label text-md-right">Period of stay<br> end date<span class="text-danger"></span></label>
                    <div class="col-md-6">
                        <input type="date" id="p_enddate" name="p_enddate" placeholder="" class="form-control"/>
                    </div>
                </div>
                <div class="form-group row m-b-10">
                    <label class="col-md-3 col-form-label text-md-right">Type of document</label>
                    <div class="col-md-6">
                        <input type="text" id="tdocument" name="tdocument" placeholder="" class="form-control"/>
                    </div>

                </div>
                <div class="form-group row m-b-10">
                    <label class="col-md-3 col-form-label text-md-right">When ctc is issued<span class="text-danger"></span></label>
                    <div class="col-md-6">
                        <input type="date" id="tissued" name="tissued" placeholder="" class="form-control"/>
                    </div>
                </div>
                <div class="form-group row m-b-10">
                    <label class="col-md-3 col-form-label text-md-right">Where ctc is issued</label>
                    <div class="col-md-6">
                        <input type="text" id="issued" name="tissued" placeholder="" class="form-control"/>
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
                    <input type="number" id="contactnumber" name="contactnumber" placeholder="" class="form-control" />
                </div>
            </div>

            <div class="form-group row m-b-10">
                <label class="col-md-3 col-form-label text-md-right">Resident Status<span class="text-danger">*</span></label>
                <div class="col-md-6">
                 <select class="form-control " data-style="btn-lime" name="mfn" id="mfn">
                    <option value="Not Applicable">Not a parent</option>
                    <option value="Father">Father</option>
                    <option value="Mother">Mother</option>


                </select>
            </div>
        </div>

        <div class="form-group row m-b-10">
            <label class="col-md-3 col-form-label text-md-right">Religion</label>
            <div class="col-md-6">
                <input type="text" id="religion" name="religion" placeholder="" class="form-control" />
            </div>
        </div>
        <div class="form-group row m-b-10">
            <label class="col-md-3 col-form-label text-md-right">Ethnicity</label>
            <div class="col-md-6">
                <input type="text" id="ethnicity" name="ethnicity" placeholder="" class="form-control" />
            </div>
        </div>

        <div class="form-group row m-b-10" >
            <label class="col-md-3 col-form-label text-md-right">Skills develoment training</label>
            <div class="col-md-6">
                <textarea type="text" id="sdtraining" name="sdtraining" placeholder="" class="form-control"></textarea>
            </div>
        </div>


    </div>


</div>
<div style="display: none;" id="childrendiv">
    <div class="alert alert-danger fade show">List of household members</div>
    
    

    <div class="row" style="padding: 10px; ">

        <table id="prodvartable" class="table table-bordered display compact table-hover" style="overflow: auto" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th style="text-align: center"></th>
                    <th style="text-align: center"></th>
                    <th style="text-align: center"></th>

                    <th style="text-align: left;"><a id="addVar" class="btn btn-success"><i class="fa fa-plus text-white"></i></a></th>
                </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
                <th style="text-align: center"></th>
                <th style="text-align: center"></th>
                <th style="text-align: center"></th>

                <th style="text-align: center"></th>

            </tfoot>
        </table>
    </div>


</div><br><br>
<div class="alert alert-yellow fade show">Housing information</div> 

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

        <div class="form-group row m-b-10">
            <label class="col-md-3 col-form-label text-md-right">Ownership Status of lot</label>
            <div class="col-md-6">
                <select class="form-control " data-style="btn-lime" id="lotownership" name="lotownership">
                    <option value="Owned" selected>Rented-free without consent of owner</option>
                    <option value="Rented">Rented-free consent of owner</option>
                    <option value="With Parents">Rented</option>
                    <option value="With Relatives">Owned/being amortized</option>
                </select>
            </div>
        </div>


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


        <div class="form-group row m-b-10">
            <label class="col-md-3 col-form-label text-md-right">Number of Rooms <span class="text-danger">*</span></label>
            <div class="col-md-6">
                <input type="number" id="numberofrooms" value="1"  name="numberofrooms" placeholder="" class="form-control"/>
            </div>
        </div>
        <!-- end form-group -->
        <br>
        <!-- begin form-group -->
        <div class="form-group row m-b-10">
            <label class="col-md-3 col-form-label text-md-right">Address<span class="text-danger">*</span></label>
            <div class="col-md-6">
                <input type="number" name="houseno" id="houseno" placeholder="House No.*" class="form-control"/>
                <input type="text" name="hstreet" id="hstreet" placeholder="Street*" class="form-control"  />
                <input type="text" name="hphase" id="hphase" placeholder="Sitio*" class="form-control" />


            </div>
        </div>
        <div class="form-group row m-b-10">
            <label class="col-md-3 col-form-label text-md-right">Optional<span class="text-danger"></span></label>
            <div class="col-md-6">

                <input type="text" name="hbuilding" id="hbuilding" placeholder="Building" class="form-control"/>
                <input type="text" name="hunitno" id="hunitno" placeholder="Unit No." class="form-control"/>
                <input type="text" name="hsubdivision" id="hsubdivision" placeholder="Subdivision" class="form-control"/>
            </div>
        </div>
        <br>
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
</div>

<!-- end fieldset -->
{{--<div class="text-center" >

    <p class="m-b-2 f-s-12">Please double check the provided information. Click the proceed button to finish registration.</p><br><br>
    <p><a id="AddBTN" href="javascript:;" class="btn btn-primary">Proceed</a></p>
</div>--}}

</fieldset>

</div>


</div>


<!-- end wizard -->


<!-- end form-group -->

</form>
<div id="step-2" style="display: none">


    

  <table id="summary_tabl" class="table table-bordered" style="font-size: 15px">
    <tbody></tbody>                                 
</table>

<table id="summary_utility" class="table table-bordered" style="font-size: 15px">
    <tbody></tbody>                                 
</table>
<table id="summary_housing" class="table table-bordered" style="font-size: 15px">
    <tbody></tbody>                                 
</table>



<table id="summary_entertainment" class="table table-bordered" style="font-size: 15px">
    <tbody></tbody>                                 
</table>


<button class="btn btn-lg btn-lime" style="margin-right: 1100px;" id="register-btn">Register Resident</button>




</div>
</div>  

<!-- end panel body -->

{{--multi child--}}

</div>


{{--step 2--}}

<!-- end content -->


</div>

</div>
<!-- end section content -->
@endsection