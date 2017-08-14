<?php $__env->startSection('title', 'Banners'); ?>





<?php $__env->startSection('content'); ?>

<div class="">

  

  <div class="row">

    <div class="col-md-6">

      <h1><i class="fa fa-tag"></i> Banners</h1>

      <a href="<?php echo e(url('admin/banners/create')); ?>" class="btn btn-round btn-success btn-md"><i class="fa fa-plus"></i> Agregar</a>      

    </div>

  </div><!-- FIN ROW -->



  <div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12 bg_blanco">

                    

                    <div class="row">

                      <div class="col-md-6 col-sm-6 col-xs-12">

                        <h2>LISTA DE BANNERS</h2>

                      </div>

                    </div> <!-- FIN ROW-->

                    

                    <table class="table table-striped table-bordered table-hover sorted_table" cellspacing="0" width="100%">

                      <thead>

                        <tr>

                          <th>Fecha</th>

                          <th>Imagen</th>

                          <th>Título</th>

                          <th>Enlace</th>

                          <th>Acciones</th>

                        </tr>

                      </thead>

                      <tbody >

                      <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ba): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr rel="<?php echo e($ba->id); ?>">

                          <td><?php echo e(Carbon\Carbon::parse($ba->created_at)->format('d-M-Y')); ?></td>

                          <td>
                          <?php if($ba->tipo=="picture"): ?>
                            <img src="<?php echo e(url($ba->picture)); ?>" width="80">
                          <?php else: ?>
                             <a href="<?php echo e($ba->picture); ?>"  target="_blank">
                            <img src="/asset/images/promin_play.jpg" width="80">
                            </a>
                          <?php endif; ?>
                          </td>

                          <td><?php echo e($ba->title); ?></td>

                          <td>

                            <a href="<?php echo e($ba->link); ?>" target="_blank"> Ver enlace

                          </td>

                          <td>

                            <a href="<?php echo e(url('admin/banners/'.$ba->id.'/edit')); ?>" class="btn btn-warning btn-xs" alt="Editar"><i class="fa fa-pencil"></i></a>

                            <a data-toggle="modal" data-target="#myModal<?php echo e($ba->id); ?>" class="btn btn-danger btn-xs" alt="Eliminar"><i class="fa fa-remove"></i></a>
                            <div class="modal fade" id="myModal<?php echo e($ba->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">¿Desea eliminar este banner?</h4>
                                  </div>
                                 
                                  <div class="modal-footer">
                                    <form id="del-form<?php echo e($ba->id); ?>" action="<?php echo e(route('banners.destroy',$ba->id)); ?>" method="POST" style="display: block;">
                                        <?php echo e(csrf_field()); ?>

                                        <?php echo e(method_field('DELETE')); ?>

                                  
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

      <?php echo e($banners->links()); ?> 



</div> 

 

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>