$(function () {
    //for image upload
    $("#upload_link").on('click', function (e) {
        e.preventDefault();
        $("#upload:hidden").trigger('click');
    });

//for auto dropdown menu
// $(".dropdown").hover(
//                function () {
//                    $('.dropdown-menu', this).stop(true, true).fadeIn("slow");
//                    $(this).toggleClass('open');
//                    $('b', this).toggleClass("caret caret-up");
//                },
//                function () {
//                    $('.dropdown-menu', this).stop(true, true).fadeOut("slow");
//                    $(this).toggleClass('open');
//                    $('b', this).toggleClass("caret caret-up");
//                });
//for number counter
$('.timer').each(function () {
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        }, {
            duration: 1000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });

    
//for datepicker
    $(".datepicker1").datepicker({
        format: 'yyyy-mm-dd',
        'cursor':'pointer',
        'setDate':0
         
    }).on('changeDate', function (e) {
        $(this).datepicker('hide');
$('#datepicker1').wrap('<div class="hasDatepicker"></div>');
    });
//for datatables

    $('#example1').DataTable({
    "fnDrawCallback": function ( oSettings ){
    if(oSettings.fnRecordsTotal() < 11){     
        $('.dataTables_length').hide();
        $('.dataTables_paginate').hide();
    } else {
        $('.dataTables_length').show();
        $('.dataTables_paginate').show(); 
    }
},
//         "pageLength":10,
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "info": true,
        "autoWidth": false
          
    });
    
    
    
    
//for delete
 $(".delete-btn").on('click', function (event) {
    
    event.preventDefault();
//     var data = table.row( this ).data();
    var current_redirect_url = $(this).attr('href');
           swal({
 title: "Are you sure?",
 text: "You will not be able to revert it back!",
 type: "info",
 showCancelButton: true,
 confirmButtonColor: "#DD6B55",
 confirmButtonText: "Yes, delete it!",
 closeOnConfirm: false
},
function(isConfirm){
if (isConfirm) 
        {     
         window.location.href = current_redirect_url;
        } 
});
    });

//$(document).ready(function() {
//    var table = $('#example1').DataTable();
//     
//    $('#example1 tbody').on('click', 'delete-btn', function () {
//        var data = table.row( this ).data();
//        alert( 'You clicked on '+data[0]+'\'s row' );
//    } );
//} );


});
