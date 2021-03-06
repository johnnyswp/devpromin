<?php $__env->startSection('title', 'Noticias'); ?>





<?php $__env->startSection('content'); ?>

<div class="">

  

  <div class="row">

    <div class="col-md-6">

      <h1><i class="fa fa-tag"></i> Noticias</h1>

      <a href="<?php echo e(url('admin/noticias/create')); ?>" class="btn btn-round btn-success btn-md"><i class="fa fa-plus"></i> Agregar</a>

      <a class="btn btn-round btn-primary btn-md" role="button" data-toggle="collapse" href="#herramientas" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-filter"></i> <i class="fa fa-search"></i></a>

    </div>

  </div><!-- FIN ROW -->

<form method="get">

  <div class="collapse" id="herramientas">

     <div class="well" style="overflow: auto">
      
      <div class="row">
        
        <div class="col-md-3">
            <label>Tipo</label>
            <?php echo e(Form::select('type', ['all'=>'Todos','interna'=>'Interna','promin'=>'Promin.mx'], $input->type, ['class'=>'form-control','onChange'=>'this.form.submit()'])); ?>

        </div>

        <div class="col-md-3">
            <label>Status</label>            
            <?php echo e(Form::select('status', ['all'=>'Todos','normal'=>'Normal','urgente'=>'Urgente'], $input->status, ['class'=>'form-control','onChange'=>'this.form.submit()'])); ?>

        </div>

        <div class="col-md-3">
            <label>Ordenar</label>            
            <?php echo e(Form::select('order', ['asc'=>'Ascendente','desc'=>'Descendente','news'=>'Más reciente','last'=>'Más antigua'], $input->order, ['class'=>'form-control','onChange'=>'this.form.submit()'])); ?>

        </div>

        <div class="col-md-3">
          <div class="input-group buscador_margin">
            <input name="q" type="text" class="form-control" placeholder="Buscar...">
            <span class="input-group-btn">
              <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
            </span>
          </div>
        </div>
        
      </div> <!-- FIN ROW -->

    </div>

  

  </div>



  <div class="row">

    <div class="col-md-12 col-sm-12 col-xs-12 bg_blanco">

        

        <div class="row">

          <div class="col-md-6 col-sm-6 col-xs-12">

            <h2>LISTA DE NOTICIAS</h2>

          </div>

          <div class="col-md-3 col-sm-4 col-xs-12">

            <a href="" class="btn btn-info btn-sm btn_margin"><i class="fa fa-cloud-download"></i> Descargar PDF</a>

          </div>  

          <div class="col-md-3 col-sm-4 col-xs-12 pull-right">

            <div class="form-group">

              <label class="control-label col-md-6 text-right">Mostrar </label>

              <div class="col-md-6">

                <?php echo e(Form::select('numb', ['100'=>'100','50'=>'50','10'=>'10'], '$input->numb', ['class'=>'form-control', 'onChange'=>'this.form.submit()'])); ?>


              </div>

            </div>

          </div>

        </div> <!-- FIN ROW-->

        <table class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">

                      <thead>

                        <tr>

                          <th>Fecha</th>

                          <th width="20%">Título</th>

                          <th width="40%">Contenido</th>

                          <th>Tipo</th>

                          <th>Status</th>

                          <th>Acciones</th>

                        </tr>

                      </thead>

                      <tbody>
    
                        <?php $__currentLoopData = $noticias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $noti): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr <?php if($noti->state=="urgente"): ?> class="danger" <?php endif; ?>>

                          <td><?php echo e(Carbon\Carbon::parse($noti->created_at)->format('d').'-'.trans('main.'.Carbon\Carbon::parse($noti->created_at)->format('m')).'-'.Carbon\Carbon::parse($noti->created_at)->format('Y')); ?></td>

                          <td><?php echo e($noti->title); ?></td>

                          <td><?php echo e($noti->content); ?></td>

                          <td><?php echo e($noti->type); ?></td>

                          <td>
                            <?php if($noti->state=="urgente"): ?>
                            <span class="sts_sinstock"><i class="fa fa-exclamation-triangle"></i> URGENTE</span>
                            <?php else: ?>
                            <span class="sts_activo"><i class="fa fa-check"></i> Normal</span>
                            <?php endif; ?>
                          </td>

                          <td>

                            <a href="<?php echo e(url('admin/noticias/'.$noti->id.'/edit')); ?>" class="btn btn-warning btn-xs" alt="Editar"><i class="fa fa-pencil"></i></a>
                            <a data-toggle="modal" data-target="#myModal<?php echo e($noti->id); ?>" class="btn btn-danger btn-xs" alt="Eliminar"><i class="fa fa-remove"></i></a>
                            <div class="modal fade" id="myModal<?php echo e($noti->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel" style="color:black">Desea eliminar esta noticia?</h4>
                                  </div>
                                 
                                  <div class="modal-footer">
                                    <form id="del-form<?php echo e($noti->id); ?>" action="<?php echo e(route('noticias.destroy',$noti->id)); ?>" method="POST" style="display: block;">
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

       



</div> 

</form>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>