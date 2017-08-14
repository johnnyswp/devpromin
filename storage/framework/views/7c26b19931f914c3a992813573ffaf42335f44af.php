<div class="row">

   <div class="col-md-12"><br></div>

</div> <!-- FIN ROW-->



<div class="row">

   <div class="col-md-12"><h2>Bitácora de seguimiento</h2></div>

</div> <!-- FIN ROW-->



<div class="row">

   <div class="col-md-12">

		<a href="<?php echo e(url('admin/pdf/bitacoras/'.$producto->id)); ?>" class="btn btn-info btn-sm" alt="Descargar"><i class="fa fa-cloud-download"></i> Descargar PDF</a>

   </div>

</div> <!-- FIN ROW-->



<div class="row">

	<div class="col-md-12">

		<div class="table-responsive">

  			<table class="table table-striped table-bordered table-hover">

				<thead>

					<tr>

						<th class="text-center" width="5%">Fecha</th>

						<th class="text-center" width="3%">Usuario</th>

						<th class="text-center" width="80%">Comentarios</th>

						<th class="text-center" width="3%">Responsable</th>

						<th class="text-center" width="3%">Eliminar</th>

					</tr>

				</thead>

				<tbody>

					<?php $__currentLoopData = $bitacoras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bitacora): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>

						<td><?php echo e(Carbon\Carbon::parse($bitacora->created_at)->format('d').'-'.trans('main.'.Carbon\Carbon::parse($bitacora->created_at)->format('m')).'-'.Carbon\Carbon::parse($bitacora->created_at)->format('Y')); ?></td>

						<td class="text-center"><?php echo e($bitacora->responsable); ?></td>

						<td class="text-left"><?php echo e($bitacora->comentario); ?></td>

						<td class="text-center"><?php echo e(App\Models\Admin\Bitacora::responsable($bitacora->responsable)); ?></td>

						<td class="text-center">
              <a data-toggle="modal" data-target="#bitacoraModal<?php echo e($bitacora->id); ?>" class="btn btn-danger btn-xs" alt="Eliminar"><i class="fa fa-remove"></i></a>
              <div class="modal fade" id="bitacoraModal<?php echo e($bitacora->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">¿Desea eliminar este bitacora?</h4>
                    </div>
                   
                    <div class="modal-footer">
                      <form id="del-form<?php echo e($bitacora->id); ?>" action="<?php echo e(route('bitacoras.delete')); ?>" method="POST" style="display: block;">
                          <?php echo e(csrf_field()); ?>

                          <input type="hidden" name="bitacora_id" value="<?php echo e($bitacora->id); ?>">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                          <button type="submit" class="btn btn-primary">Eliminar</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
						</td>

					</tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

				</tbody>

			</table>

		</div>

	</div> <!-- FIN tabla -->

</div> <!-- FIN ROW-->



<div class="row">

   <div class="col-md-12"><hr></div>

</div> <!-- FIN ROW-->



<div class="row">

	<div class="col-md-12"><h2>Agrega un seguimiento</h2></div>

</div> <!-- FIN ROW-->



<div class="row">
<?php echo e(Form::open(['route' => ['bitacoras.create'],'files' => true])); ?>

    <input type="hidden" name="producto_id" value="<?php echo e($producto->id); ?>">
	<div class="col-md-12">

     	<label for="">Comentario </label>
      <?php echo e(Form::textarea('comentario', NULL, ['class'=>'form-control','style'=>"height: 100px;"])); ?>

      <?php if($errors->has('comentario')): ?>
          <span class="help-block">
              <strong><?php echo e($errors->first('comentario')); ?></strong>
          </span>
        <?php endif; ?>
       
    </div>

    <div class="col-md-4">

    	<label for="">Responsable </label>
      <?php echo e(Form::select('responsable', $accesos, 0, ['class'=>'form-control'])); ?> <!--mostrar los usuarios que se han agregado al sistema-->
      <?php if($errors->has('responsable')): ?>
          <span class="help-block">
              <strong><?php echo e($errors->first('responsable')); ?></strong>
          </span>
        <?php endif; ?>

    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
      <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-floppy-o"></i> Guardar</button>    
    </div>
<?php echo e(Form::close()); ?>

</div> <!-- FIN ROW-->





