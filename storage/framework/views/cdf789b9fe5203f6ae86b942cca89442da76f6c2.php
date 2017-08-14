<?php $__env->startSection('title', 'Líneas de Negocio'); ?>





<?php $__env->startSection('content'); ?>

<div class="row">

  <div class="col-md-12 col-sm-12 col-xs-12">

    <h1>Agregando línea de negocio</h1>

  </div>

</div>



<form action="<?php echo e(route('linea-negocios.store')); ?>" method="post" enctype="multipart/form-data">

  <?php echo e(csrf_field()); ?>


  <div class="row bg_blanco">   

    <div class="col-xs-12 col-sm-12 col-md-3">

      <label for="">Tipo</label>

      <ul class="lista_radio_inline">

        <li><label class="radio-inline"><input type="radio" value="mx" name="tipo" <?php if(old('tipo')=="mx" or old('tipo')==""): ?> checked <?php endif; ?>>MX</label></li>

        <li><label class="radio-inline"><input type="radio" value="unidades" name="tipo" <?php if(old('tipo')=="unidades"): ?> checked <?php endif; ?>>Unidades</label></li>

      </ul>

      <?php if($errors->has('tipo')): ?>

          <span class="help-block">

              <strong><?php echo e($errors->first('tipo')); ?></strong>

          </span>

      <?php endif; ?>

    </div>

    

    <div class="col-xs-12 col-sm-12 col-md-6">

      <label for="">Nombre </label><input type="text" class="form-control" name="nombre" value="<?php echo e(old('nombre')); ?>">

      <?php if($errors->has('nombre')): ?>

          <span class="help-block">

              <strong><?php echo e($errors->first('nombre')); ?></strong>

          </span>

      <?php endif; ?>

    </div>



    <div class="col-xs-12 col-sm-12 col-md-3">

      <label for="">Siglas </label><input type="text" class="form-control" name="siglas" value="<?php echo e(old('siglas')); ?>">

      <?php if($errors->has('siglas')): ?>

          <span class="help-block">

              <strong><?php echo e($errors->first('siglas')); ?></strong>

          </span>

      <?php endif; ?>

    </div>



    <div class="col-xs-12 col-sm-12 col-md-12">
      <label for="">Descripción (SEO) </label><textarea class="form-control" name="descripcion"><?php echo e(old('descripcion')); ?></textarea>
      <?php if($errors->has('descripcion')): ?>
          <span class="help-block">
              <strong><?php echo e($errors->first('descripcion')); ?></strong>
          </span>
      <?php endif; ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
      <label for="">Palabras clave (SEO) </label><textarea class="form-control" name="keywork"><?php echo e(old('keywork')); ?></textarea>
      <?php if($errors->has('keywork')): ?>
          <span class="help-block">
              <strong><?php echo e($errors->first('keywork')); ?></strong>
          </span>
      <?php endif; ?>
    </div>

    <div class="col-md-12">
      <label for="">Imagen</label>
      <span><br>Tamaño recomendado: ancho 2000px y alto 1333px.</span>
      <span><br>Peso sugerido: 350Kb</span>
      <input type="file" name="picture" class="preview">
      <?php if($errors->has('picture')): ?>
          <span class="help-block">
              <strong><?php echo e($errors->first('picture')); ?></strong>
          </span>
      <?php endif; ?>
      <br>
      <img src="<?php echo e(url('asset_admin/images/default.jpg')); ?>" width="200" id="preview" class="img-thumbnail">
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
      <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-floppy-o"></i> Guardar</button>    
    </div>
  </div> <!-- FIN ROW -->
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>