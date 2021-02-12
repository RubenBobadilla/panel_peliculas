var url = 'http://localhost/proj_laravel_feb_2021/proyecto-peliculas/public/';
window.addEventListener("load", function() {

      // BUSCADOR
  $('#buscador').submit(function(e){
    $(this).attr('action',url+'/busc/'+$('#buscador #search').val());
  });

});