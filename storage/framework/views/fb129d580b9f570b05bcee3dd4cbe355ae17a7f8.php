<?PHP
use Carbon\Carbon;
function valid($array, $value)
{
    if(in_array($value, explode(',', $array))) 
        echo '<img src="'.url('/asset_admin/images/check_1.png').'" style="width: 10px; height: 10px;">';
    else 
        echo '<img src="'.url('/asset_admin/images/check_2.png').'" style="width: 10px; height: 10px;">';
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Reporte de <?php echo e($producto->nombre); ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<style type="text/css">
    .page-break { page-break-after: always; }
    .text-right,body { text-align: right; font-family: 'Roboto',sans-serif;}
    table { font-size: 10px; font-weight: 700;
    border-spacing: 5px; }
    .img { width: 25px }
    table {
      border-collapse: collapse;
    }
    .data tr { border-bottom: 1px solid black; border-collapse: collapse; }
    th,td { text-align: left; } 

    </style>
</head>
<body >
<div>

                <table style="width: 100%;">
                    <tr>
                        <td style="width: 10%"><img src="<?php echo e(url('/assets/images/proveedora-equipos-mineros-promin-logo.png')); ?>" ></td>
                        <td class="text-right">
                            <h2>Reporte de MX <?php echo e($producto->id.' '.$producto->tipo().' '.$producto->serie); ?></h2>
                            <span>Fecha: <?php echo e(Carbon::now()->format('d')); ?>-<?php echo e(trans('main.'.Carbon::now()->format('m'))); ?>-<?php echo e(Carbon::now()->format('Y')); ?></span>
                        </td>
                    </tr>
                </table>

    
    <table style="width: 100%;" border="0" cellpadding="10">

        <tr>
            <td valign="top">
                Nombre de motor: <strong><?php echo e($producto->nombreMotor); ?></strong>
                <br>
                Tipo de motor: <strong><?php echo e($producto->tipoMotor); ?></strong>
                <br>
                Modelo de motor: <strong><?php echo e($producto->modeloMotor); ?></strong>
                <br>
                Serie de motor: <strong><?php echo e($producto->SerieMotor); ?></strong>
                <br><br>
                MOTOR
                <br>
                <label><?php echo e(valid($producto->motor, 'Radiador')); ?> Radiador</label>
                <br>
                <label><?php echo e(valid($producto->motor, 'Ventilador')); ?> Ventilador</label>
                <br>
                <label><?php echo e(valid($producto->motor, 'Banda ventilador')); ?> Banda ventilador</label>
                <br>
                <label><?php echo e(valid($producto->motor, 'Bomba de agua')); ?> Bomba de agua</label>
                <br>
                <label><?php echo e(valid($producto->motor, 'Bomba de transferencia')); ?> Bomba de transferencia</label>
                <br>
                <label><?php echo e(valid($producto->motor, 'Banda de inyección')); ?> Banda de inyección</label>
                <br>
                <label><?php echo e(valid($producto->motor, 'Turbocargador')); ?> Turbocargador</label>
                <br><br><hr><br>
                TREN DE RODAJE
                
                <br>
                <label><?php echo e(valid($producto->trenRodaje, 'Ruedas guía')); ?> Ruedas guía</label>
                <br>
                <label><?php echo e(valid($producto->trenRodaje, 'Ruedas guía')); ?> Sproket</label>
                <br>
                <label><?php echo e(valid($producto->trenRodaje, 'Rodillos superiores')); ?> Rodillos superiores</label>
                <br>
                <label><?php echo e(valid($producto->trenRodaje, 'Rodillos inferiores')); ?> Rodillos inferiores</label>
                <br>
                <label><?php echo e(valid($producto->trenRodaje, 'Cadenas')); ?> Cadenas</label>
                <br>
                <label><?php echo e(valid($producto->trenRodaje, 'Zapatas')); ?> Zapatas</label>
                <br>
                <label><?php echo e(valid($producto->trenRodaje, 'Llantas')); ?> Llantas</label>
                <br><br><hr><br>
                SISTEMA ELÉCTRICO
                <br>
                <label><?php echo e(valid($producto->sistemaElectrico, 'Motor de arranque')); ?> Motor de arranque</label>
                <br>
                <label><?php echo e(valid($producto->sistemaElectrico, 'Generador')); ?> Generador</label>
                <br>
                <label><?php echo e(valid($producto->sistemaElectrico, 'Alternador')); ?> Alternador</label>
                <br>
                <label><?php echo e(valid($producto->sistemaElectrico, 'Regulador')); ?> Regulador</label>
                <br>
                <label><?php echo e(valid($producto->sistemaElectrico, 'Precalentador')); ?> Precalentador</label>
                <br>
                <label><?php echo e(valid($producto->sistemaElectrico, 'Paro automático')); ?> Paro automático</label>
                <br>
                <label><?php echo e(valid($producto->sistemaElectrico, 'Baterías')); ?> Baterías</label>
                <br>
                <label><?php echo e(valid($producto->sistemaElectrico, 'Instalación')); ?> Instalación</label>
                <br>
                <label><?php echo e(valid($producto->sistemaElectrico, 'Claxon')); ?> Claxon</label>
                <br>
                <label><?php echo e(valid($producto->sistemaElectrico, 'Luces')); ?> Luces</label>
                <br>
                <label><?php echo e(valid($producto->sistemaElectrico, 'Calaveras')); ?> Calaveras</label>
                <br><br><hr><br>
                TABLERO DE INSTRUMENTOS
                <br>
                <label><?php echo e(valid($producto->tableroInstrumentos, 'Horómetro')); ?> Horómetro</label>
                <br>
                <label><?php echo e(valid($producto->tableroInstrumentos, 'Amperímetro')); ?> Amperímetro</label>
                <br>
                <label><?php echo e(valid($producto->tableroInstrumentos, 'Termómetro')); ?> Termómetro</label>
                <br>
                <label><?php echo e(valid($producto->tableroInstrumentos, 'Refrigerante de motor')); ?> Refrigerante de motor</label>
                <br>
                <label><?php echo e(valid($producto->tableroInstrumentos, 'Aceite de motor')); ?> Aceite de motor</label>
                <br>
                <label><?php echo e(valid($producto->tableroInstrumentos, 'Aceite de transmisión')); ?> Aceite de transmisión</label>    
                <br>
                <label><?php echo e(valid($producto->tableroInstrumentos, 'Tacómetro')); ?> Tacómetro</label>
                <br>
                <label><?php echo e(valid($producto->tableroInstrumentos, 'Manómetros')); ?> Manómetros</label>
                <br>
                <label><?php echo e(valid($producto->tableroInstrumentos, 'Aceite de motor')); ?> Aceite de motor</label>
                <br>
                <label><?php echo e(valid($producto->tableroInstrumentos, 'Aceite de transmisión')); ?> Aceite de transmisión</label>
                <br>
                <label><?php echo e(valid($producto->tableroInstrumentos, 'Combustible aire')); ?> Combustible aire</label>    
            </td>   
            <td valign="top">
                FRENOS
                <br>
                <label><?php echo e(valid($producto->frenos, 'De mano')); ?> De mano</label>
                <br>
                <label><?php echo e(valid($producto->frenos, 'De pie')); ?> De pie</label>
                <br><br><hr><br>
                SISTEMA HIDRÁULICO
                <br>
                <label><?php echo e(valid($producto->sistemaHidraulico, 'Bomba hidráulica')); ?> Bomba hidráulica</label>
                <br>
                <label><?php echo e(valid($producto->sistemaHidraulico, 'Banco de válvulas')); ?> Banco de válvulas</label>
                <br>
                <label><?php echo e(valid($producto->sistemaHidraulico, 'Mangueras y conexiones')); ?> Mangueras y conexiones</label>
                <br>
                <label><?php echo e(valid($producto->sistemaHidraulico, 'Pistones hidráulicos')); ?> Pistones hidráulicos</label>
                <br>
                <label><?php echo e(valid($producto->sistemaHidraulico, 'Acumulador de nitrógeno')); ?> Acumulador de nitrógeno</label>
                <br><br><hr><br>
                EQUIPOS
                <br>
                <label><?php echo e(valid($producto->equipos, 'Cuchillas')); ?> Cuchillas</label>
                <br>
                <label><?php echo e(valid($producto->equipos, 'Gavilanes')); ?> Gavilanes</label>
                <br>
                <label><?php echo e(valid($producto->equipos, 'Escarificador')); ?> Escarificador</label>
                <br>
                <label><?php echo e(valid($producto->equipos, 'Empujador')); ?> Empujador</label>
                <br>
                <label><?php echo e(valid($producto->equipos, 'Cargador')); ?> Cargador</label>
                <br>
                <label><?php echo e(valid($producto->equipos, 'Retroexcavador')); ?> Retroexcavador</label>
                <br>
                <label><?php echo e(valid($producto->equipos, 'Cucharón o bote')); ?> Cucharón o bote</label>
                <br>
                <label><?php echo e(valid($producto->equipos, 'Lanza de arrastre')); ?> Lanza de arrastre</label>
                <br>
                <label><?php echo e(valid($producto->equipos, 'Tirón o alacrán')); ?> Tirón o alacrán</label>
                <br>
                <label><?php echo e(valid($producto->equipos, 'Gancho')); ?> Gancho</label>
                <br>
                <label><?php echo e(valid($producto->equipos, 'Pluma')); ?> Pluma</label>
                <br>
                <label><?php echo e(valid($producto->equipos, 'Cables')); ?> Cables</label>
                <br>
                <label><?php echo e(valid($producto->equipos, 'de sostén')); ?> de sostén</label>
                <br>
                <label><?php echo e(valid($producto->equipos, 'de levante')); ?> de levante</label>
                <br>
                <label><?php echo e(valid($producto->equipos, 'de arrastre')); ?> de arrastre</label>
                <br><br><hr><br>
                FILTROS, NIVELES Y TAPONES
                <br>
                <label><?php echo e(valid($producto->filtros, 'Combustible')); ?> Combustible</label>
                <br>
                <label><?php echo e(valid($producto->filtros, 'Aceite de motor')); ?> Aceite de motor</label>
                <br>
                <label><?php echo e(valid($producto->filtros, 'Transmisión')); ?> Transmisión</label>
                <br>
                <label><?php echo e(valid($producto->filtros, 'Hidráulico')); ?> Hidráulico</label>
                <br>
                <label><?php echo e(valid($producto->filtros, 'Aire')); ?> Aire</label>
                <br>
                <label><?php echo e(valid($producto->filtros, 'Refrigerante')); ?> Refrigerante</label>
                <br><br><hr><br>
                CARROCERÍA
                <br>
                <label><?php echo e(valid($producto->carroceria, 'Asientos')); ?> Asientos</label>
                <br>
                <label><?php echo e(valid($producto->carroceria, 'Cristales')); ?> Cristales</label>
                <br>
                <label><?php echo e(valid($producto->carroceria, 'Volante')); ?> Volante</label>
                <br>
                <label><?php echo e(valid($producto->carroceria, 'Perillas')); ?> Perillas y placas</label>
                <br>
                <label><?php echo e(valid($producto->carroceria, 'Rines')); ?> Rines</label>
                <br>
                <label><?php echo e(valid($producto->carroceria, 'Tanque combustible')); ?> Tanque combustible</label>
                <br>
                <label><?php echo e(valid($producto->carroceria, 'Tanque hidráulico')); ?> Tanque hidráulico</label>
                <br>
                <label><?php echo e(valid($producto->carroceria, 'Silenciador')); ?> Silenciador</label>
                <br>
                <label><?php echo e(valid($producto->carroceria, 'Hojalatería')); ?> Hojalatería</label>
                <br>
                <label><?php echo e(valid($producto->carroceria, 'Pintura')); ?> Pintura</label>
                <br>
                <label><?php echo e(valid($producto->carroceria, 'Limpiaparabrisas')); ?> Limpiaparabrisas</label>
                <br>
                <label><?php echo e(valid($producto->carroceria, 'Casta')); ?> Casta</label>
                <br>
                <label><?php echo e(valid($producto->carroceria, 'Parabrisas')); ?> Parabrisas y cristales</label>
                <br>
                <label><?php echo e(valid($producto->carroceria, 'Estribos')); ?> Estribos</label>
                <br>
                <label><?php echo e(valid($producto->carroceria, 'Tapas de motor')); ?> Tapas de motor</label>
                <br>
                <label><?php echo e(valid($producto->carroceria, 'Tolvas')); ?> Tolvas</label>
            </td>
            <td valign="top">
            RODILLOS Y VIBRATORIOS
                <br>
                <label><?php echo e(valid($producto->rodillosVibratorios, 'Bandas')); ?> Bandas</label>
                <br>
                <label><?php echo e(valid($producto->rodillosVibratorios, 'Clutch')); ?> Clutch</label>
                <br>
                <label><?php echo e(valid($producto->rodillosVibratorios, 'Acelerador remoto')); ?> Acelerador remoto</label>
                <br>
                <label><?php echo e(valid($producto->rodillosVibratorios, 'Raspadores')); ?> Raspadores</label>
                <br><br><hr><br>
                TRANSMICIÓN
                <br>
                <label>Marca: <strong><?php echo e($producto->transmicionMarca); ?></strong>
                <br>
                <label>Modelo: <strong><?php echo e($producto->transmicionModelo); ?></strong>
                <br>
                <label>Serie: <strong><?php echo e($producto->transmicionMserie); ?></strong>
                <br>
                <label><?php echo e(valid($producto->transmicion, 'Clutch')); ?> Clutch</label>
                <br>
                <label><?php echo e(valid($producto->transmicion, 'Crucetas')); ?> Crucetas</label>
                <br>
                <label><?php echo e(valid($producto->transmicion, 'Flecha cardan')); ?> Flecha cardan</label>
                <br>
                <label><?php echo e(valid($producto->transmicion, 'Caja de velocidades')); ?> Caja de velocidades</label>
                <br>
                <label><?php echo e(valid($producto->transmicion, 'Diferencial')); ?> Diferencial</label>
                <br>
                <label><?php echo e(valid($producto->transmicion, 'Manos finales')); ?> Manos finales</label>
                <br><br><hr><br>
                VARIOS
                <br>
                <label><?php echo e(valid($producto->varios, 'Espejos laterales')); ?> Espejos laterales</label>
                <br>
                <label><?php echo e(valid($producto->varios, 'Retrovisor')); ?> Retrovisor</label>
                <br>
                <label><?php echo e(valid($producto->varios, 'Alarma de reversa')); ?> Alarma de reversa</label>
                <br>
                <label><?php echo e(valid($producto->varios, 'Kit de martillo')); ?> Kit de martillo</label>
                <br>
                <label><?php echo e(valid($producto->varios, 'Guarda o limpiador')); ?> Guarda o limpiador</label>
                <br><br>
                <label>Otros: <strong><?php echo e($producto->variosOtros); ?></strong>
                <br><br>
                <label>Combustible: <strong><?php echo e($producto->combustible); ?></strong>
                <br><br>
                <label>Toma de fotografías: <strong><?php echo e($producto->tomaFotos); ?></strong>
                <br><br>
                <label>Avaluó de llantas: <strong><?php echo e($producto->avaluoLlantas); ?></strong>
                <br><br>
                <label>Status llantas: <strong><?php echo e($producto->statusLlantas); ?></strong>
                <br><br>
                <label>Observaciones llantas: <strong><?php echo e($producto->observacionesLlantas); ?></strong>
                <br><br><hr><br>
                Status:
                <br>
                <label><strong><?php echo e($producto->status); ?></strong>
                <br><br><hr><br>
                Observaciones Generales:
                <br>
                <label><strong><?php echo e($producto->observacioneGenerales); ?></strong>
                <br>
                <label><strong><?php echo e($producto->observaciones); ?></strong>
            </td>
        </tr>
    </table>
</div>
</body>
</html>