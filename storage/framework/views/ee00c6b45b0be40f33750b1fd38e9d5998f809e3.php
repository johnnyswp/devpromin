<?php $__env->startSection('title', 'Productos'); ?>





<?php $__env->startSection('content'); ?>
<div class="row">

  <div class="col-md-12 col-sm-12 col-xs-12">

    <h1>Editando producto</h1>

  </div>

</div>



<div class="row">

<div class="col-md-12">



  <div class="x_panel">

   <div class="x_content">

    <div class="" role="tabpanel" data-example-id="togglable-tabs">

      <ul id="myTab" class="nav nav-tabs" role="tablist">
       
        <?php if(session('state')): ?>
        <li role="presentation" <?php if(session('state')=="gen"): ?> class="active" <?php endif; ?>><a href="#datos_generales" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Datos Generales</a></li>
        <li role="presentation" <?php if(session('state')=="ent"): ?> class="active" <?php endif; ?>><a href="#control_entrada" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Control de Entrada</a></li>
        <li role="presentation" <?php if(session('state')=="gas"): ?> class="active" <?php endif; ?>><a href="#gastos" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Gastos</a></li>
        <li role="presentation" <?php if(session('state')=="bit"): ?> class="active" <?php endif; ?>><a href="#bitacora" role="tab" id="profile-tab3" data-toggle="tab" aria-expanded="false">Bitácora</a></li>
        <li role="presentation" <?php if(session('state')=="doc"): ?> class="active" <?php endif; ?>><a href="#documentos" role="tab" id="profile-tab4" data-toggle="tab" aria-expanded="false">Documentos</a></li>
        
        <?php else: ?>
        <li role="presentation" class="active"><a href="#datos_generales" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Datos Generales</a></li>
        
        <li role="presentation" class="" ><a href="#control_entrada" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Control de Entrada</a></li>

        <li role="presentation" class=""><a href="#gastos" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Gastos</a></li>

        <li role="presentation" class=""><a href="#bitacora" role="tab" id="profile-tab3" data-toggle="tab" aria-expanded="false">Bitácora</a></li>

        <li role="presentation" class=""><a href="#documentos" role="tab" id="profile-tab4" data-toggle="tab" aria-expanded="false">Documentos</a></li>
        <?php endif; ?>

      </ul>

      <div id="myTabContent" class="tab-content">

          
          <?php if(session()->has('state')): ?>
          <div role="tabpanel" class="tab-pane fade <?php if(session('state')=='gen'): ?> active in <?php endif; ?>"  id="datos_generales" aria-labelledby="home-tab"> <?php echo $__env->make('admin.pages.productos.includes.tab_datos_generales_edit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> </div>  <!-- FIN TAB -->
          <div role="tabpanel" class="tab-pane fade <?php if(session('state')=='ent'): ?> active in <?php endif; ?>"  id="control_entrada" aria-labelledby="profile-tab"> <?php echo $__env->make('admin.pages.productos.includes.tab_control_entrada', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> </div>
          <div role="tabpanel" class="tab-pane fade <?php if(session('state')=='gas'): ?> active in <?php endif; ?>"  id="gastos" aria-labelledby="profile-tab"> <?php echo $__env->make('admin.pages.productos.includes.tab_gastos', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div> <!-- FIN TAB -->
          <div role="tabpanel" class="tab-pane fade <?php if(session('state')=='bit'): ?> active in <?php endif; ?>"  id="bitacora" aria-labelledby="profile-tab"> <?php echo $__env->make('admin.pages.productos.includes.tab_bitacora', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div> <!-- FIN TAB -->
          <div role="tabpanel" class="tab-pane fade <?php if(session('state')=='doc'): ?> active in <?php endif; ?>"  id="documentos" aria-labelledby="profile-tab"> <?php echo $__env->make('admin.pages.productos.includes.tab_documentos', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <!-- EN ESTE TAB NO SE TIENE QUE VER EL BOTÓN GUARDAR, POR QUE ES INFORMATIVO--> </div> <!-- FIN TAB -->
          <?php echo e(session()->forget('state')); ?>

          <?php else: ?>
          <div role="tabpanel" class="tab-pane fade active in"  id="datos_generales" aria-labelledby="home-tab"> <?php echo $__env->make('admin.pages.productos.includes.tab_datos_generales_edit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> </div>
          <div role="tabpanel" class="tab-pane fade" id="control_entrada" aria-labelledby="profile-tab"> <?php echo $__env->make('admin.pages.productos.includes.tab_control_entrada', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> </div>
          <div role="tabpanel" class="tab-pane fade" id="gastos" aria-labelledby="profile-tab"> <?php echo $__env->make('admin.pages.productos.includes.tab_gastos', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div> <!-- FIN TAB -->
          <div role="tabpanel" class="tab-pane fade" id="bitacora" aria-labelledby="profile-tab"> <?php echo $__env->make('admin.pages.productos.includes.tab_bitacora', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?></div> <!-- FIN TAB -->
          <div role="tabpanel" class="tab-pane fade" id="documentos" aria-labelledby="profile-tab"> <?php echo $__env->make('admin.pages.productos.includes.tab_documentos', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <!-- EN ESTE TAB NO SE TIENE QUE VER EL BOTÓN GUARDAR, POR QUE ES INFORMATIVO--> </div> <!-- FIN TAB -->
          <?php endif; ?>
          <!-- FIN TAB -->

          

        

        </div> <!-- FIN CONTENIDO TABS -->

             



      </div>  <!-- FIN TABPANEL -->

    </div> <!-- FIN X_CONTENT --> 

  </div> <!-- FIN X_PANEL -->

</div> <!-- FIN col-md-12 -->

</div> <!-- FIN ROW -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">¿Desea eliminar esta imagen?</h4>
      </div>
     
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary eliminar" id="">Eliminar</button>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<script type="text/javascript">


$("#linea").change(function() {

  $id = $(this).val();

  if($id==""){
    $('#modelos > option[value=""]').prop('selected', true);
    $('#tipos > option[value=""]').prop('selected', true);
    $('#marcas > option[value=""]').prop('selected', true);
    $('#marcas, #modelos,#tipos').prop('disabled', true);
  }

  $('#modelos > option[value=""]').prop('selected', true);
  $('#tipos > option[value=""]').prop('selected', true);
  $('#marcas > option[value=""]').prop('selected', true);
  $('#marcas, #modelos').prop('disabled', true);
  $.ajax({

    method: "GET",

    url: "<?php echo e(url('admin/productos/tipo')); ?>/"+$id,

    dataType: "html"

  })

  .done(function( msg ) {

    $('#tipos-data').html(msg);
    $("#tipos").change(function() {

      $id = $(this).val();

      if($id==""){
       $('#modelos > option[value=""]').prop('selected', true);
       $('#marcas > option[value=""]').prop('selected', true);
       $('#marcas, #modelos').prop('disabled', true); 
       return false;
      }
      $('#modelos > option[value=""]').prop('selected', true);
      $('#modelos').prop('disabled', true);
      $.ajax({
        method: "GET",
        url: "<?php echo e(url('admin/productos/marcas')); ?>/"+$id,
        dataType: "html"
      })

      .done(function( msg ) {

        $('#marcas-data').html(msg);

        $("#marcas").change(function() {
          
          $id = $(this).val();

          if($id==""){
            $('#modelos > option[value=""]').prop('selected', true);
            $('#modelos').prop('disabled', true);
          }

          $.ajax({

            method: "GET",

            url: "<?php echo e(url('admin/productos/modelos')); ?>/"+$id,

            dataType: "html"

          })

          .done(function( msg ) {

            $('#modelos-data').html(msg);
            $('#modelos').prop('disabled', false);
          });

        });

      });

    });
  });

});

   $("#tipos").change(function() {

      $id = $(this).val();

      if($id==""){
       $('#modelos > option[value=""]').prop('selected', true);
       $('#marcas > option[value=""]').prop('selected', true);
       $('#marcas, #modelos').prop('disabled', true);
       return false;
      }
      
      $('#modelos > option[value=""]').prop('selected', true);
      $('#modelos').prop('disabled', true);
      $.ajax({
        method: "GET",
        url: "<?php echo e(url('admin/productos/marcas')); ?>/"+$id,
        dataType: "html"
      })

      .done(function( msg ) {

        $('#marcas-data').html(msg);

        $("#marcas").change(function() {
          
          $id = $(this).val();

          if($id==""){

          }

          $.ajax({

            method: "GET",

            url: "<?php echo e(url('admin/productos/modelos')); ?>/"+$id,

            dataType: "html"

          })

          .done(function( msg ) {
            $('#modelos-data').html(msg);
            $('#modelos').prop('disabled', false);

        });

      });

    });
     });


    $("#marcas").change(function() {
      
      $id = $(this).val();

      if($id==""){
        $('#modelos > option[value=""]').prop('selected', true);
        $('#modelos').prop('disabled', true);
        return false;
      }

      $.ajax({

        method: "GET",

        url: "<?php echo e(url('admin/productos/modelos')); ?>/"+$id,

        dataType: "html"

      })

      .done(function( msg ) {

        $('#modelos-data').html(msg);
        $('#modelos').prop('disabled', false);

      });

    });

$('input[name="priceVenta"]').on('blur', function(){
  $('input[name="pv"]').val($('input[name="priceVenta"]').val());
});


</script>

<script>

$(document).ready(function() {

$('.serie').on('blur', function(){
  var tipo = $("#tipos option:selected").text();
  tipo = tipo.replace(' ', '-');

  var serie = $(this).val();
  serie = serie.replace(' ', '-');

  $('#sku').html('MX-<?php echo e($producto->id); ?>-'+tipo+'-'+serie);
});


  $('input[name="pv"]').val($('input[name="priceVenta"]').val());
  $('input[name="gastos"]').val($('input[name="total"]').val());
  $('#gastosVenta').html($('#gastosTotal').html());
  $("#fileUpload").on('change', function () {
     //Get count of selected files
     var countFiles = $(this)[0].files.length;
     var imgPath = $(this)[0].value;
     var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
     var image_holder = $("#image-holder");

     

     //image_holder.empty();

     

     if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {

     

         if (typeof (FileReader) != "undefined") {



             //loop for each file selected for uploaded.

             for (var i = 0; i < countFiles; i++) {
            var reader = new FileReader();
            reader.onload = function (e) {
                var html = "<img  src='/assets/images/loading_apple.gif' class='thumb-image loading' width='150' height='150'/>";
                $(html).appendTo(image_holder);
            }
            //image_holder.show();
            reader.readAsDataURL($(this)[0].files[i]);
            var fd = new FormData();    
            fd.append( 'file', $(this)[0].files[i]);
            $.ajax({
              url: "<?php echo e(url('admin/add-galery')); ?>?id=<?php echo e($producto->id); ?>",
              data: fd,
              processData: false,
              contentType: false,
              type: 'POST',
              dataType: 'json',
              success: function(data){
              	var image_holder = $("#image-holder");
              	$('.loading').remove();
              	var html = "<img rel='"+data.id+"' src='"+data.picture+"' class='img-thumbnail delete' id='"+data.id+"' width='150'/>";
                $(html).appendTo(image_holder);
                	$('.delete').on('click', function(event){
                    	event.preventDefault();
                    	var	id = $(this).prop('id');
                    	$('.eliminar').prop('id', id);
                    	$('#myModal').modal('show');
                    });
     
                    $('.eliminar').on('click', function(event){
                    	event.preventDefault();
                    	var	id = $(this).prop('id');
                    	$.ajax({
                          url: "<?php echo e(url('admin/delete-galery')); ?>?id="+id,
                          processData: false,
                          contentType: false,
                          type: 'POST',
                          dataType: 'json',
                          success: function(data){
                          	$('img[rel="'+data.id+'"]').remove();
                            $('#myModal').modal('hide');
                          }
                        });
                    });
               
                console.log(data);
              }
            });

             }



         } else {

             alert("This browser does not support FileReader.");

         }

     } else {

         alert("Pls select only images");

     }

 });

$('.delete').on('click', function(event){
	event.preventDefault();
	var	id = $(this).prop('id');
	$('.eliminar').prop('id', id);
	$('#myModal').modal('show');
});

$('.eliminar').on('click', function(event){
	event.preventDefault();
	var	id = $(this).prop('id');
	$.ajax({
      url: "<?php echo e(url('admin/delete-galery')); ?>?id="+id,
      processData: false,
      contentType: false,
      type: 'POST',
      dataType: 'json',
      success: function(data){
      	$('img[rel="'+data.id+'"]').remove();
        $('#myModal').modal('hide');
      }
    });
});

$('#link_video').on('blur', function(){
  var ID = '';
  url = $(this).val();
  url = url.replace(/(>|<)/gi,'').split(/(vi\/|v=|\/v\/|youtu\.be\/|\/embed\/)/);
  if(url[2] !== undefined) {
    ID = url[2].split(/[^0-9a-z_\-]/i);
    ID = 'https://www.youtube.com/embed/'+ID[0];
  } else {
    ID = url;
  }

  $('#preview_video').prop('src', ID);
  $(this).val(ID);

});
$('#email-tags')

  .on('tokenfield:createtoken', function (e) {
    var data = e.attrs.value.split('|')
    e.attrs.value = data[1] || data[0]
    e.attrs.label = data[1] ? data[0] + ' (' + data[1] + ')' : data[0]
  })

  .on('tokenfield:createdtoken', function (e) {
    // Über-simplistic e-mail validation
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    var valid = re.test(e.attrs.value)
    if (!valid) {
      $(e.relatedTarget).addClass('invalid')
      //$(e.relatedTarget).remove()
      
    }
  })

  .on('tokenfield:edittoken', function (e) {
    if (e.attrs.label !== e.attrs.value) {
      var label = e.attrs.label.split(' (')
      e.attrs.value = label[0] + '|' + e.attrs.value
    }
  })

  .tokenfield();

$('.send-email-pro').on('click',function(){
  var id = $(this).attr('id');
  var mail = $('#email-tags').val();
  if(mail==""){
    new PNotify({
        title: 'Notificación',
        text: 'No ha escrito los remitentes.',
        type: 'error',
        styling: 'brighttheme'
    });
    return false;
  }
  $.ajax({
    url: '/admin/send-email-pro/'+id,
    type: 'POST',
    dataType: 'html',
    data: {mail: mail},
  })
  .done(function() {
    new PNotify({
        title: 'Notificación',
        text: 'Email enviado correctamente.',
        type: 'success',
        styling: 'brighttheme'
    });
    return false;
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
  });
});
});

  

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>