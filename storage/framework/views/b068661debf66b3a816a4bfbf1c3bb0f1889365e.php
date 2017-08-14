    <div class="overlay home large-size">
        <div class="bg bg_noticias" data-stellar-background-ratio="0.5"></div>
        <div class="container vmiddle">
            <div class="row text-center">
                <h1>Noticias</h1>
            </div>
        </div>
    </div>
    <div class="content">

        <div class="container timeline padding-top">
            <?php $__currentLoopData = $noticias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $noti): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <?php if($loop->iteration % 2 == 0): ?>
                 
            <div class="row">
                <!-- post -->
                <div class="col-sm-4 col-sm-offset-1 post">
                    <?php if($noti->type_link=="video"): ?>
                    <?php $video_id = array_reverse(explode('=',$noti->link))[0]; ?>
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo e($video_id); ?>?autoplay=0&controls=1&showinfo=0" frameborder="0" allowfullscreen=""></iframe>
                    </div>
                    <?php else: ?> 
                    <p><img src="<?php echo e($noti->link); ?>" alt="<?php echo e($noti->title); ?>" class="img-responsive"></p>
                    <?php endif; ?>
                    <h3><?php echo e($noti->title); ?></h3>
                    <small><?php echo e(Carbon\Carbon::parse($noti->created_at)->format('d M Y')); ?></small>
                    <p><?php echo e(str_limit($noti->content,182)); ?></p>                                        
                </div>
                <!-- /.post -->
                <div class="col-sm-2 vline text-center">
                    <i class="fa fa-circle"></i>
                </div>
            </div>
            <?php else: ?>
                
                
            <div class="row">
                <div class="col-sm-2 col-sm-offset-5 vline text-center">
                    <i class="fa fa-circle"></i>
                </div>
                <!-- post -->
                <div class="col-sm-4 post">
                    <?php if($noti->type_link=="video"): ?>
                    <div class="embed-responsive embed-responsive-16by9">
                        <?php 
                            $video_id = array_reverse(explode('=',$noti->link))[0];
                        ?>
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo e($video_id); ?>?autoplay=0&controls=1&showinfo=0" frameborder="0" allowfullscreen=""></iframe>
                    </div>
                    <?php else: ?> 
                    <p><img src="<?php echo e($noti->link); ?>" alt="<?php echo e($noti->title); ?>" class="img-responsive"></p>
                    <?php endif; ?>
                    <h3><?php echo e($noti->title); ?></h3>
                    <small><?php echo e(Carbon\Carbon::parse($noti->created_at)->format('d M Y')); ?></small>
                    <p><?php echo e(str_limit($noti->content,182)); ?></p>                    
                </div>
                <!-- /.post -->
            </div>
            <?php endif; ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
            
            
        </div> <!--fin container noticias-->
        
        <!-- Paginación noticias-->
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    <?php echo e($noticias->links()); ?>

                       
                    </div>
                </div>
            </div>
            <!-- FIN Paginación -->

        
    </div>