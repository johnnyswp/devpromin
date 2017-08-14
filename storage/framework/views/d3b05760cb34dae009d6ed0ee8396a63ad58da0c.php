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
</head>
<body>
    <table style="width: 100%;">
        <tr border="1" style="border: 1px solid black;">
            <td style="width: 20%"><img src="<?php echo e(url('/assets/images/proveedora-equipos-mineros-promin-logo.png')); ?>" ></td>
            <td class="text-right">
                <h2>Reporte de <?php echo e($type); ?> de <?php echo e($producto->nombre); ?></h2>
                <span>Fecha: <?php echo e(Carbon\Carbon::now()->format('d').'-'.trans('main.'.Carbon\Carbon::now()->format('m')).'-'.Carbon\Carbon::now()->format('Y')); ?></span>
            </td>
        </tr>
    </table>

    <table style="width: 100%;" class="data">
    <?php if($type == 'gastos'): ?>
        <thead>
            <tr border="1" style="border: 1px solid black;">
                <th>Fecha</th>
                <th>Usuario</th>
                <th>Cantidad</th>
                <th >Descripción</th>
                <th class="text-right">Precio Unit.</th>
                <th class="text-right">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php $total = 0; ?>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gasto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr border="1" style="border: 1px solid black;">
                <td><?php echo e(Carbon\Carbon::parse($gasto->created_at)->format('d').'-'.trans('main.'.Carbon\Carbon::parse($gasto->created_at)->format('m')).'-'.Carbon\Carbon::parse($gasto->created_at)->format('Y')); ?></td>
                <td ><?php echo e($gasto->user()); ?></td>
                <td ><?php echo e($gasto->cantidad); ?></td>
                <td ><?php echo e($gasto->descripcion); ?></td>
                <td class="text-right">$ <?php echo e(number_format($gasto->precio, 2, '.', ',')); ?></td>
                <td class="text-right">$ <?php echo e(number_format($gasto->cantidad*$gasto->precio, 2, '.', ',')); ?></td>
            </tr>
            <?php $total = $total+($gasto->cantidad*$gasto->precio); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <tr border="1" style="border: 1px solid black;">
                <td class="text-right" colspan="5"><strong>Total: </strong></td>
                <td class="text-right"><strong>$ <?php echo e(number_format($total, 2, '.', ',')); ?></strong></td>
                <td >&nbsp;</td>
            </tr>
        </tbody>
    <?php else: ?>
        <thead>
            <tr border="1" style="border: 1px solid black;">
                <th>Fecha</th>
                <th>Usuario</th>
                <th>Comentarios</th>
                <th>Responsable</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bitacora): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr border="1" style="border: 1px solid black;">
                <td><?php echo e(Carbon\Carbon::parse($bitacora->created_at)->format('d').'-'.trans('main.'.Carbon\Carbon::parse($bitacora->created_at)->format('m')).'-'.Carbon\Carbon::parse($bitacora->created_at)->format('Y')); ?></td>
                <td><?php echo e(App\Models\Admin\Bitacora::responsable($bitacora->responsable)); ?></td>
                <td><?php echo e($bitacora->comentario); ?></td>
                <td><?php echo e(App\Models\Admin\Bitacora::responsable($bitacora->responsable)); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    <?php endif; ?>
    </table>
</bo
</html>
