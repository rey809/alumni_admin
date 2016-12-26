$(document).ready(function() {
    $('#alumni').DataTable( {
    	responsive: true,
        "pagingType": "full_numbers"
    } );

    $('#scholar').DataTable( {
    	responsive: true,
        "pagingType": "full_numbers"
    } );
    $('#notification').DataTable( {
    	responsive: true,
        "pagingType": "full_numbers"
    } );
        
$('select').material_select();
 $('.materialboxed').materialbox();
$('.carousel').carousel();
$('.carousel').carousel('next');
$('.carousel').carousel('next', [3]); // Move next n times.
// Previous slide
$('.carousel').carousel('prev');
$('.carousel').carousel('prev', [4]); // Move prev n times.
} );

