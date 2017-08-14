<div class="row">

   <div class="col-md-12"><br></div>

</div> <!-- FIN ROW-->



<div class="row">

   <div class="col-md-12"><h2>Lista de Documentación</h2></div>

</div> <!-- FIN ROW-->



<div class="row">

	<div class="col-md-12">

		<div class="table-responsive">

  			<table class="table table-striped table-bordered table-hover">

				<thead>

					<tr>

						<th class="text-center" width="10%">Fecha</th>

						<th class="text-center">Documento</th>

						<th class="text-center">Comentarios</th>

						<th class="text-center">Acciones</th>

					</tr>

				</thead>

				<tbody>

                    <?php $__currentLoopData = $documentos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $documento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

					<tr>

						<td><?php echo e(Carbon\Carbon::parse($documento->created_at)->format('d').'-'.trans('main.'.Carbon\Carbon::parse($documento->created_at)->format('m')).'-'.Carbon\Carbon::parse($documento->created_at)->format('Y')); ?></td>

						<td class="text-center"><?php echo e(array_reverse(explode('/',$documento->documento))[0]); ?></td>

						<td><?php echo e($documento->comentario); ?></td>

						<td class="text-center">
               <a href="<?php echo e($documento->documento); ?>" class="btn btn-info btn-xs" alt="Descargar" download="download"><i class="fa fa-cloud-download"></i></a>
               <a data-toggle="modal" data-target="#docModal<?php echo e($documento->id); ?>" class="btn btn-danger btn-xs" alt="Eliminar"><i class="fa fa-remove"></i></a>
               <div class="modal fade" id="docModal<?php echo e($documento->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                 <div class="modal-dialog" role="document">
                   <div class="modal-content">
                     <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                       <h4 class="modal-title" id="myModalLabel">¿Desea eliminar este Documento?</h4>
                     </div>
                    
                     <div class="modal-footer">
                       <form id="del-form<?php echo e($documento->id); ?>" action="<?php echo e(route('documentos.delete')); ?>" method="POST" style="display: block;">
                           <?php echo e(csrf_field()); ?>

                           <input type="hidden" name="documento_id" value="<?php echo e($documento->id); ?>">
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

<?php echo e(Form::open(['route' => ['documentos.create'],'files' => true])); ?>


<input type="hidden" name="producto_id" value="<?php echo e($producto->id); ?>">

<div class="row">

	<div class="col-md-12"><h2>Agrega un documento</h2></div>

</div> <!-- FIN ROW-->



<div class="row">

	<div class="col-md-6">

     	<?php echo e(Form::file('documento', NULL)); ?>

      <?php if($errors->has('documento')): ?>
          <span class="help-block">
              <strong><?php echo e($errors->first('documento')); ?></strong>
          </span>
        <?php endif; ?>
    </div>

</div> <!-- FIN ROW-->   



<div class="row">

    <div class="col-md-6">

     	<label for="">Comentario </label><?php echo e(Form::textarea('comentario_doc', NULL, ['class'=>'form-control','style'=>"height: 100px;"])); ?>

      <?php if($errors->has('comentario_doc')): ?>
          <span class="help-block">
              <strong><?php echo e($errors->first('comentario_doc')); ?></strong>
          </span>
        <?php endif; ?>

    </div>

</div> <!-- FIN ROW-->

<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">

      <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-floppy-o"></i> Guardar</button>    

    </div>

</div>

<?php echo e(Form::close()); ?>




