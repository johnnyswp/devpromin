<?php $__env->startSection('title', 'Noticias'); ?>





<?php $__env->startSection('content'); ?>

<div class="row">

  <div class="col-md-12 col-sm-12 col-xs-12">

    <h1>Agregando noticia</h1>

  </div>

</div>
<?php if(count($errors) > 0): ?>

<div class="row">

                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
</div>
            <?php endif; ?>
<style type="text/css">

  textarea { height: 100px !important; }

</style>

<?php echo e(Form::open(['route' => ['noticias.store'],'files' => true])); ?>


  <div class="row bg_blanco">
    
      
        <div class="col-xs-12 col-sm-12 col-md-6">
          <label for="">Título </label><?php echo e(Form::text('title', old('title'), ['class'=>'form-control'])); ?>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
          <label for="">Contenido </label><?php echo e(Form::textarea('content', NULL, ['class'=>'form-control'])); ?>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-3">
          <label for="">Tipo de Noticia</label>
          <ul class="lista_radio_inline">
            <li><label class="radio-inline"><input type="radio" class="type" name="type" value="Interna">Interna</label></li>
            <li><label class="radio-inline"><input type="radio" class="type" name="type" checked="checked" value="Promin.mx">Promin.mx</label></li>
          </ul>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-3" id="status" >
          <label for="">Status de Noticia</label>
          <ul class="lista_radio_inline">
            <li><label class="radio-inline"><input type="radio" class="state"  name="state" value="normal">Normal</label></li>
            <li><label class="radio-inline"><input type="radio" class="state"  name="state" value="urgente">URGENTE</label></li> <!-- sólo si se selecciona esta opción, mostrar el textarea, para que ahí se capturen los emails-->
          </ul>
        </div>

        

        <div class="col-xs-12 col-sm-12 col-md-6" >
          <label for="">Imagen / Video de Noticia</label>
          <ul class="lista_radio_inline">
            <li ><label class="radio-inline"><input type="radio" class="video" name="type_link" value="imagen" checked="">Imagen</label></li> <!-- si se selecciona esta opción mostar el input de imagen, el link del video no se verá -->
            <li ><label class="radio-inline"><input type="radio" class="video" name="type_link" value="video">Video</label></li> <!-- si se elige esta opción, sólo mostrar el input para que peguen el link -->
          </ul>
            <div class="col-md-12" id="img">
              <label for="">Selecciona la imagen para la noticia</label>
              <span><br>Tamaño recomendado: ancho 2000px y alto 1333px.</span>
              <span><br>Peso sugerido: 350Kb</span>
              <input class="preview" type="file" name="imagen">
              <br>
              <img id="preview" src="https://cdn3.iconfinder.com/data/icons/linecons-free-vector-icons-pack/32/camera-256.png" width="200" class="img-thumbnail">
            </div>
            <div class="col-md-12 col-xs-12" id="video" style="display: none">
              <label for="">Link (video de YouTube)</label><?php echo e(Form::text('link', NULL, ['class'=>'form-control'])); ?>

            </div>
        </div>


       
      
        <div class="col-xs-12 col-sm-12 col-md-12" id="mails" style="display: none">
          <label for="">Para: </label> <span>Ingresa los emails separados por coma.</span>
          <?php echo e(Form::textarea('froms', NULL, ['placeholder'=>'Ejemplo: info@promin.mx, contacto@promin.mx','class'=>'form-control'])); ?>

        </div>




        <div class="col-xs-12 col-sm-12 col-md-12">
          <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-floppy-o"></i> Guardar</button>    
        </div>


    
  </div> <!-- FIN ROW -->

<?php echo e(Form::close()); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('js-script'); ?>

<script type="text/javascript">

  $('.type').on('change', function() {

    if($(this).val()=='Promin.mx'){
      //$('#status').css('display', 'none');
      $('#mails').css('display', 'none');
      
    }else{
      //$('#status').css('display', 'block');  
      $('#mails').css('display', 'block');      
      
    }

  });

  $('.state').on('change', function() {
    if($(this).val()=='normal'){
      $('#mails').css('display', 'none');
    }else{
      $('#mails').css('display', 'block');      
    }

  });



  $('.video').on('change', function() {

    if($(this).val()=='video'){

      $('#img').css('display', 'none');

      $('#video').css('display', 'block');

    }else{

      $('#img').css('display', 'block');

      $('#video').css('display', 'none');

    }

  });

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>