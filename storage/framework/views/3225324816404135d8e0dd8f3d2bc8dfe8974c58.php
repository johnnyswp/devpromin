<div class="content">
    
        <div class="container breadcrumbs">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo e(url('/')); ?>"><i class="fa fa-home"></i> Inicio</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li class="active"><?php echo e($linea->nombre); ?></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li class="active"><?php echo e($tipo->nombre); ?></li>
                    </ol>
                </div>
            </div>
        </div>
        <form method="GET">
        <div class="container sorting no_pad_top">
            <div class="row">
                <form method="GET">
                <div class="col-sm-3">
                    <?php echo e(Form::select('tipo', $tipos, $tipo->id, ['class'=>'form-control', 'id'=>'tipos', 'onChange'=>'this.form.submit()'])); ?>

                </div>
                </form>
                <form method="GET">
                <div class="col-sm-3">
                    <?php echo e(Form::select('marca', $marcas, $input->marca, ['class'=>'form-control', 'id'=>'marcas', 'onChange'=>'this.form.submit()'])); ?>

                </div>
                <div class="col-sm-6 text-right grid-show">
                    <span>Mostrar</span>
                    <?php echo e(Form::select('numb', ['100'=>'100','50'=>'50','20'=>'20'], $input->numb, ['class'=>'form-control','style'=>'width: 100px;', 'onChange'=>'this.form.submit()'])); ?>

                    <span>por página</span>
                </div>
                </form>
            </div>
        </div>
        


        <div class="container catalog catalog-square">

            <div class="row text-center">
                <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-3 col-sm-6 citem">
                    <div class="cimg">
                        <a href="<?php echo e(url('linea-negocio/'.str_slug($producto->linea()).'/'.str_slug($producto->serie).'-'.str_slug($producto->marca()).'-'.str_slug($producto->modelo()).'-'.$producto->id)); ?>" class="aimg" title="<?php echo e($producto->linea().' '.$producto->serie.' '.$producto->marca().' '.$producto->modelo()); ?>"><img src="<?php echo e($producto->image()); ?>" alt="<?php echo e($producto->linea().' '.$producto->serie.' '.$producto->marca().' '.$producto->modelo()); ?>"></a>
                        <a href="pago-seguro.php" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Comprar</a>
                        <?php 

                        #if()
                        ?>
                        <a href="#whish" class="btn btn2 whish " producto='<?php echo e($producto->id); ?>'><i class="fa fa-heart corazon"></i></a>

                    </div>
                    <h5>
                        <a href="<?php echo e(url('linea-negocio/'.str_slug($producto->linea()).'/'.str_slug($producto->serie).'-'.str_slug($producto->marca()).'-'.str_slug($producto->modelo()).'-'.$producto->id)); ?>" class="black" title="<?php echo e($producto->linea().' '.$producto->serie.' '.$producto->marca().' '.$producto->modelo()); ?>"><?php echo e($producto->nombre); ?></a>
                        <small><?php echo e($producto->modelo()); ?></small>
                    </h5>
                    
                    <div class="cost">$ <?php echo e(number_format($producto->priceVenta, 2, '.', ',')); ?></div>
                
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <!-- /.row -->
        </div>
        <!-- /.container -->

        <!-- CONTAINER -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php echo e($productos->links()); ?>

                </div>
            </div>
        </div>
 