<!DOCTYPE html>
<html>
<head>
    <title>prueba</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style type="text/css">
    body { font-family: 'Roboto',sans-serif; }
    .page-break { page-break-after: always; }
    .text-right { text-align: right;}
    table { font-size: 12px;
    border-spacing: 5px; }
    .img { width: 35px }
    table {
      border-collapse: collapse;
    }
    .data tr { border-bottom: 1px solid black; border-collapse: collapse; }
    th,td { text-align: center; } 
    .text-left { text-align: left; }
    </style>
<?php use App\Models\Admin\Producto; ?>
</head>
<body>
    <table style="width: 100%;">
        <tr border="1" style="border: 1px solid black;">
            <td style="width: 20%"><img src="<?php echo e(url('/assets/images/proveedora-equipos-mineros-promin-logo.png')); ?>" ></td>
            <td class="text-right">
                  <h2>Reporte de Wishlists</h2>
                  <p><strong>Cliente:</strong> <?php echo e($cliente); ?> | 
                  <strong>Línea de Negocio:</strong> <?php echo e($linea); ?> | 
                  <strong>Tipo de Producto:</strong> <?php echo e($tipo); ?> | 
                  <strong>Marca:</strong><?php echo e($marca); ?> | 
                  <strong>Modelo:</strong><?php echo e($modelo); ?></p>
                  <span>Fecha: <?php echo e(Carbon\Carbon::parse($desde)->format('d').'-'.trans('main.'.Carbon\Carbon::parse($desde)->format('m')).'-'.Carbon\Carbon::parse($desde)->format('Y')); ?> a <?php echo e(Carbon\Carbon::parse($hasta)->format('d').'-'.trans('main.'.Carbon\Carbon::parse($hasta)->format('m')).'-'.Carbon\Carbon::parse($hasta)->format('Y')); ?></span>
            </td>
        </tr>
    </table>

    <table style="width: 100%;" class="data">
        <thead>
            <tr border="1" style="border: 1px solid black;">
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
                <td><?php echo e(Carbon\Carbon::parse($wish->fecha)->format('d').'-'.trans('main.'.Carbon\Carbon::parse($wish->fecha)->format('m')).'-'.Carbon\Carbon::parse($wish->fecha)->format('Y')); ?></td>
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
</bo
</html>
