<div class="row">

   <div class="col-md-12"><br></div>

</div> <!-- FIN ROW-->



<div class="row">

    <div class="col-md-12"><h2>Listado de Gastos</h2></div>
    <div class="col-md-12">
   	    <?php if(session('error')): ?>
        <div class="alert alert-danger">
            <ul>
               <li><?php echo e(session('error')); ?></li>
               <?php echo e(session()->forget('error')); ?>

            </ul>
        </div>
        <?php endif; ?>
    </div>

</div> <!-- FIN ROW-->



<div class="row">

   <div class="col-md-12">

		<a href="<?php echo e(url('admin/pdf/gastos/'.$producto->id)); ?>" class="btn btn-info btn-sm" alt="Descargar"><i class="fa fa-cloud-download"></i> Descargar PDF</a>

   </div>

</div> <!-- FIN ROW-->



<div class="row">

	<div class="col-md-12">

		<div class="table-responsive">

  			<table class="table table-striped table-bordered table-hover">

				<thead>

					<tr>

						<th class="text-center" width="8%">Fecha</th>

						<th class="text-center" width="5%">Usuario</th>

						<th class="text-center" width="5%">Cantidad</th>

						<th class="text-center">Descripción</th>

						<th class="text-right" width="10%">Precio Unit.</th>

						<th class="text-right" width="10%">Subtotal</th>

						<th class="text-center" width="5%">Eliminar</th>

					</tr>

				</thead>

				<tbody>
				    <?php $total = 0; ?>
                    <?php $__currentLoopData = $gastos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gasto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>

						<td><?php echo e(Carbon\Carbon::parse($gasto->created_at)->format('d').'-'.trans('main.'.Carbon\Carbon::parse($gasto->created_at)->format('m')).'-'.Carbon\Carbon::parse($gasto->created_at)->format('Y')); ?></td>

						<td class="text-center"><?php echo e($gasto->user()); ?></td>

						<td class="text-center"><?php echo e($gasto->cantidad); ?></td>

						<td class="text-center"><?php echo e($gasto->descripcion); ?></td>

						<td class="text-right">$ <?php echo e(number_format($gasto->precio, 2, '.', ',')); ?></td>

						<td class="text-right">$ <?php echo e(number_format($gasto->cantidad*$gasto->precio, 2, '.', ',')); ?></td>

						<td class="text-center">
                            <a data-toggle="modal" data-target="#myModal<?php echo e($gasto->id); ?>" class="btn btn-danger btn-xs" alt="Eliminar"><i class="fa fa-remove"></i></a>
                        </td>
                            <div class="modal fade" id="myModal<?php echo e($gasto->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">¿Desea eliminar este gasto?</h4>
                                  </div>
                                 
                                  <div class="modal-footer">
                                    <form id="del-form<?php echo e($gasto->id); ?>" action="<?php echo e(route('gastos.delete')); ?>" method="POST" style="display: block;">
                                        <?php echo e(csrf_field()); ?>

                                        <input type="hidden" name="gasto_id" value="<?php echo e($gasto->id); ?>">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">Eliminar</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
						

					</tr>
					<?php $total = $total+($gasto->cantidad*$gasto->precio); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<tr>

						<td class="text-right" colspan="5"><strong>Total: </strong></td>

						<td class="text-right" id="gastosTotal"><strong>$ <?php echo e(number_format($total, 2, '.', ',')); ?></strong></td>

						<td class="text-center">&nbsp;</td>

					</tr>

				</tbody>

			</table>

		</div>

	</div> <!-- FIN tabla -->

</div> <!-- FIN ROW-->



<div class="row">

   <div class="col-md-12"><hr></div>

</div> <!-- FIN ROW-->



<div class="row">

	<div class="col-md-12"><h2>Agrega un gasto</h2></div>

</div> <!-- FIN ROW-->



<div class="row">
<?php echo e(Form::open(['route' => ['gastos.create'],'files' => true])); ?>

    <input type="hidden" name="producto_id" value="<?php echo e($producto->id); ?>">
    <input type="hidden" name="total" value="<?php echo e($total); ?>">
    <input type="hidden" name="pv" value="">
	<div class="col-md-2">

     	<label for="">Cantidad </label>
     	<?php echo e(Form::text('cantidad', NULL, ['class'=>'form-control'])); ?>

     	<?php if($errors->has('cantidad')): ?>
          <span class="help-block">
              <strong><?php echo e($errors->first('cantidad')); ?></strong>
          </span>
        <?php endif; ?>

    </div>

    <div class="col-md-7">

    	<label for="">Descripción </label>
    	<?php echo e(Form::text('descripcion', NULL, ['class'=>'form-control'])); ?>

    	<?php if($errors->has('descripcion')): ?>
          <span class="help-block">
              <strong><?php echo e($errors->first('descripcion')); ?></strong>
          </span>
        <?php endif; ?>

    </div>

    <div class="col-md-3">

       <label for="">Precio </label>
       <?php echo e(Form::text('precio', NULL, ['class'=>'form-control'])); ?>

       <?php if($errors->has('precio')): ?>
          <span class="help-block">
              <strong><?php echo e($errors->first('precio')); ?></strong>
          </span>
        <?php endif; ?>

	</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
      <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-floppy-o"></i> Guardar</button>    
    </div>
<?php echo e(Form::close()); ?>

</div> <!-- FIN ROW-->





