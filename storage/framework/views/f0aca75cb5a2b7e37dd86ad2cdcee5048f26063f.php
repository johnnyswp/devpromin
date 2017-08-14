<div class="col-md-12">
  <h2>Reporte de Wishlists</h2>
  <p><strong>Cliente:</strong> <?php echo e($cliente); ?> | 
  <strong>Línea de Negocio:</strong> <?php echo e($linea); ?> | 
  <strong>Tipo de Producto:</strong> <?php echo e($tipo); ?> | 
  <strong>Marca:</strong><?php echo e($marca); ?> | 
  <strong>Modelo:</strong><?php echo e($modelo); ?></p>
  <p>Periodo: <?php echo e($desde); ?> a <?php echo e($hasta); ?></p>
  <a href="<?php echo e(url($rout)); ?>" class="btn btn-info btn-sm" title="Reporte-Wishlists" download><i class="fa fa-cloud-download"></i> Descargar PDF</a>
</div>
<?php use App\Models\Admin\Producto; use Carbon\Carbon; ?>
<div class="col-md-12">
  <div class="table-responsive">
    <table class="table table-bordered table-stripped table-hover">
      <thead>
        <tr>
          <th>Fecha</th>
          <th>Cliente</th>
          <th>Email</th>
          <th>Línea de negocio</th>
          <th>Imagen</th>
          <th>Tipo de Producto</th>
          <th>Marca</th>
          <th>Modelo</th>
          <th class="text-right">Precio</th>  
        </tr>
      </thead>
      <tbody>
      <?php $__currentLoopData = $wishlists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wish): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e(Carbon::parse($wish->fecha)->format('d').'-'.trans('main.'.Carbon::parse($wish->fecha)->format('m')).'-'.Carbon::parse($wish->fecha)->format('Y')); ?></td>
          <td><?php echo e($wish->nombre); ?> <?php echo e($wish->apellido); ?> <?php echo e($wish->s_apellido); ?></td>
          <td><a href="mailto:<?php echo e($wish->email); ?>"><?php echo e($wish->email); ?></a></td>
          <td><?php echo e($wish->linea); ?></td>
          <td><img src="<?php echo e(url(Producto::find($wish->producto_id)->image())); ?>" width="80" alt=""></td>
          <td><?php echo e($wish->tipo); ?></td>
          <td><?php echo e($wish->marca); ?></td>
          <td><?php echo e($wish->modelo); ?></td>
          <td class="text-right">$ <?php echo e(number_format($wish->precio, 2, '.', ',')); ?></td>
        </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
  </div>
</div>
