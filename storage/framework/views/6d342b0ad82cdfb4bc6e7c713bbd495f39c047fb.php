<?php $__env->startSection('title', 'Modelos'); ?>





<?php $__env->startSection('content'); ?>

<div class="row">

  <div class="col-md-12 col-sm-12 col-xs-12">

    <h1>Editando modelo</h1>

  </div>

</div>



<?php echo e(Form::model($modelo, ['route' => ['modelos.update', $modelo->id],'files' => true])); ?>


  <input type="hidden" name="_method" value="PUT">

  <div class="row bg_blanco">

    <div class="col-xs-12 col-sm-12 col-md-3">

      <label>Tipo de Producto</label>

      <?php echo e(Form::select('tipo_producto_id', $tipos, NULL, ['class'=>'form-control','id'=>'tipos'])); ?>

      <?php if($errors->has('tipo_producto_id')): ?>

          <span class="help-block">

              <strong><?php echo e($errors->first('tipo_producto_id')); ?></strong>

          </span>

      <?php endif; ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-3" id="marcas-data">

      <label>Marcas</label> <!-- dependiendo el tipo de producto que se seleccione, son las marcas que deben de aparecer -->

      <?php echo e(Form::select('marcas_id', $marcas, NULL, ['class'=>'form-control','id'=>'marcas'])); ?>

      <?php if($errors->has('marcas_id')): ?>

          <span class="help-block">

              <strong><?php echo e($errors->first('marcas_id')); ?></strong>

          </span>

      <?php endif; ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6">

      <label for="">Nombre </label><?php echo e(Form::text('nombre', NULL, ['class'=>'form-control'])); ?> <!-- VALIDAR que no se repitan los nombres de modelo en el mismo tipo de producto. -->
      <?php if($errors->has('nombre')): ?>

          <span class="help-block">

              <strong><?php echo e($errors->first('nombre')); ?></strong>

          </span>

      <?php endif; ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

      <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-floppy-o"></i> Guardar</button>    

    </div>

  </div> <!-- FIN ROW -->

<?php echo e(Form::close()); ?>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script type="text/javascript">
$("#tipos").change(function() {
  $id = $(this).val();
  $.ajax({
    method: "GET",
    url: "<?php echo e(url('admin/productos/marcas')); ?>/"+$id,
    dataType: "html"
  }).done(function( msg ) {
    $('#marcas-data').html("<label>Marcas</label>"+msg);
  });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>