<?php $__env->startSection('title', 'Líneas de Negocio'); ?>





<?php $__env->startSection('content'); ?>

<div class="row">

  <div class="col-md-12 col-sm-12 col-xs-12">

    <h1>Editando línea de negocio</h1>

  </div>

</div>



<?php echo e(Form::model($linea, ['route' => ['linea-negocios.update', $linea->id],'files' => true])); ?>


  <div class="row bg_blanco">
        <input type="hidden" name="_method" value="PUT">
        <div class="col-xs-12 col-sm-12 col-md-3">
          <label for="">Tipo</label>
          <ul class="lista_radio_inline">
            <li><label class="radio-inline"><input type="radio" value="mx" name="tipo" <?php if($linea->tipo=="mx"): ?> checked <?php endif; ?>>MX</label></li>
            <li><label class="radio-inline"><input type="radio" value="unidades" name="tipo" <?php if($linea->tipo=="unidades"): ?> checked <?php endif; ?>>Unidades</label></li>
          </ul>
          <?php if($errors->has('tipo')): ?>
              <span class="help-block">
                  <strong><?php echo e($errors->first('tipo')); ?></strong>
              </span>
          <?php endif; ?>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6">
          <label for="">Nombre </label><?php echo e(Form::text('nombre', NULL, ['class'=>'form-control'])); ?>

          <?php if($errors->has('nombre')): ?>
              <span class="help-block">
                  <strong><?php echo e($errors->first('nombre')); ?></strong>
              </span>
          <?php endif; ?>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-3">
          <label for="">Siglas </label><?php echo e(Form::text('siglas', NULL, ['class'=>'form-control'])); ?>

          <?php if($errors->has('siglas')): ?>
              <span class="help-block">
                  <strong><?php echo e($errors->first('siglas')); ?></strong>
              </span>
          <?php endif; ?>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
          <label for="">Descripción (SEO) </label><?php echo e(Form::textarea('descripcion', NULL, ['class'=>'form-control','rows'=>'3'])); ?>

          <?php if($errors->has('descripcion')): ?>
              <span class="help-block">
                  <strong><?php echo e($errors->first('decripcion')); ?></strong>
              </span>
          <?php endif; ?>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
          <label for="">Palabras clave (SEO) </label><?php echo e(Form::textarea('keywork', NULL, ['class'=>'form-control','rows'=>'3'])); ?>

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
          <img src="<?php echo e(asset($linea->picture)); ?>" alt="" class="img-thumbnail" id="preview" width="120">
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
          <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-floppy-o"></i> Guardar</button>    
        </div>

  </div> <!-- FIN ROW -->

<?php echo e(Form::close()); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>