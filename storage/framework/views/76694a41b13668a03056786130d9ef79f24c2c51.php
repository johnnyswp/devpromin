<?php $__env->startSection('title', 'Acessos'); ?>





<?php $__env->startSection('content'); ?>

<div class="row">

  <div class="col-md-12 col-sm-12 col-xs-12">

    <h1>Editando acceso</h1>

  </div>

</div>

<?php echo e(Form::model($user, ['route' => ['accesos.update', $user->id],'files' => true])); ?>


  <input type="hidden" name="_method" value="PUT">

  <div class="row bg_blanco">

        <div class="row">

          <div class="col-xs-12 col-sm-12 col-md-3">

            <label>Tipo de Acceso</label>

            <?php echo e(Form::select('admin', $type, $user->role(), ['class'=>'form-control'])); ?>




          </div>

        

          <div class="col-xs-12 col-sm-12 col-md-3">

            <label for="">Usuario </label><input type="text" class="form-control" name="email" placeholder="Ej. example@promin.mx" value="<?php echo e($user->email); ?>"> <!-- VALIDAR que no se repitan los nombres de usuario -->

            <?php if($errors->has('email')): ?>

                <span class="help-block">

                    <strong><?php echo e($errors->first('email')); ?></strong>

                </span>

            <?php endif; ?>

          </div>

        </div>

        

        <div class="row">

          <div class="col-xs-12 col-sm-12 col-md-3">

            <label for="">Nombre </label><input type="text" name="name" class="form-control" value="<?php echo e($user->name); ?>">

            <?php if($errors->has('name')): ?>

                <span class="help-block">

                    <strong><?php echo e($errors->first('name')); ?></strong>

                </span>

            <?php endif; ?> 

          </div>

          <div class="col-xs-12 col-sm-12 col-md-3">

            <label for="">Apellido paterno </label><input type="text" name="last_name" class="form-control" value="<?php echo e($user->last_name); ?>"> 

            <?php if($errors->has('last_name')): ?>

                <span class="help-block">

                    <strong><?php echo e($errors->first('last_name')); ?></strong>

                </span>

            <?php endif; ?>

          </div>

          <div class="col-xs-12 col-sm-12 col-md-3">

            <label for="">Apellido materno </label><input type="text" name="parental_name" class="form-control" value="<?php echo e($user->parental_name); ?>"> 

            <?php if($errors->has('parental_name')): ?>

                <span class="help-block">

                    <strong><?php echo e($errors->first('parental_name')); ?></strong>

                </span>

            <?php endif; ?>

          </div>

        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-3">

            <label for="">Password </label><input type="password" name="password" class="form-control" value="<?php echo e(old('password')); ?>"> 

            <?php if($errors->has('password')): ?>

                <span class="help-block">

                    <strong><?php echo e($errors->first('password')); ?></strong>

                </span>

            <?php endif; ?>

          </div>
          <div class="col-xs-12 col-sm-12 col-md-3">

            <label for="">Repita su password </label><input type="password" name="password_confirmation" class="form-control" value="<?php echo e(old('password_confirmation')); ?>"> 

            <?php if($errors->has('password_confirmation')): ?>

                <span class="help-block">

                    <strong><?php echo e($errors->first('password_confirmation')); ?></strong>

                </span>

            <?php endif; ?>

          </div>
        </div>


        <div class="row">

          <div class="col-xs-12 col-sm-12 col-md-12">

            <label for="">Imagen </label><input type="file" name="picture" class="preview"> 

            <?php if($errors->has('picture')): ?>

                <span class="help-block">

                    <strong><?php echo e($errors->first('picture')); ?></strong>

                </span>

            <?php endif; ?>

            <br> 

            <img src="<?php echo e(asset($user->picture)); ?>" alt="" class="img-thumbnail" id="preview" width="120">

          </div>

        </div>



        <div class="col-xs-12 col-sm-12 col-md-12">

          <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-floppy-o"></i> Guardar</button>    

        </div>

  </div> <!-- FIN ROW -->

<?php echo e(Form::close()); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>