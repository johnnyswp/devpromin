<?php $__env->startSection('title', 'Marcas'); ?>





<?php $__env->startSection('content'); ?>

<div class="row">

  <div class="col-md-12 col-sm-12 col-xs-12">

    <h1>Agregando marca</h1>

  </div>

</div>



<?php echo e(Form::open(['route' => ['marcas.store'],'files' => true])); ?>


  <div class="row bg_blanco">

    <div class="col-xs-12 col-sm-12 col-md-3">

      <label>Linea de negocios</label>

      <?php echo e(Form::select('linea_negocio_id', $lineas, NULL, ['class'=>'form-control','id'=>'lineas'])); ?>

      <?php if($errors->has('linea_negocio_id')): ?>

          <span class="help-block">

              <strong><?php echo e($errors->first('linea_negocio_id')); ?></strong>

          </span>

      <?php endif; ?>

    </div>
    <div class="col-xs-12 col-sm-12 col-md-3" id="tipo-data">

      <label>Tipo de Producto</label>

      <?php echo e(Form::select('tipo_producto_id', $tipos, NULL, ['class'=>'form-control'])); ?>

      <?php if($errors->has('tipo_producto_id')): ?>
          <span class="help-block">
              <strong><?php echo e($errors->first('tipo_producto_id')); ?></strong>
          </span>
      <?php endif; ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6">
      <label for="">Nombre </label><?php echo e(Form::text('nombre', NULL, ['class'=>'form-control'])); ?> <!-- VALIDAR que no se repitan los nombres en una misma línea de negocio. EJ: La línea de negocio Cosben, no puede tener dos tipos de producto con el mismo nombre, ejemplo Brazo, no puede tener dos tipo de producto "Brazo" a menos de que se haya escrito "Braso"-->
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
$("#lineas").change(function() {
  $id = $(this).val();
  $.ajax({
    method: "GET",
    url: "<?php echo e(url('admin/productos/tipo')); ?>/"+$id,
    dataType: "html"
  }).done(function( msg ) {
    $('#tipo-data').html("<label>Tipo de Producto</label>"+msg);
  });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>