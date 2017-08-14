<div class="row">
  <div class="col-md-12"><h2>Ubicación</h2></div>
</div> <!-- FIN ROW -->

<?php if(session('error')): ?>
    <div class="alert alert-danger">
        <ul>
           <li><?php echo e(session('error')); ?></li>
        </ul>
    </div>
<?php endif; ?>

<?php echo e(Form::model($producto, ['route' => ['productos.update', $producto->id],'files' => true, 'method' => 'post'])); ?>


<input type="hidden" name="_method" value="PUT">
<input type="hidden" name="type" value="general">
<input type="hidden" name="gastos" value="">
<input type="hidden" name="producto_id" value="<?php echo e($producto->id); ?>">
<div class="row">

  <div class="col-md-6">

    <div class="form-group">

      <label class="control-label col-md-4">Línea de negocio</label>

      <div class="col-md-8">

        <?php echo e(Form::select('linea_negocio_id', $lineas, NULL, ['class'=>'form-control', 'id'=>'linea'])); ?>


      </div>
      <div class="col-md-4">
        
      </div>
      <div class="col-md-8">
        <?php if($errors->has('linea_negocio_id')): ?>
          <span class="help-block">
              <strong><?php echo e($errors->first('linea_negocio_id')); ?></strong>
          </span>
        <?php endif; ?>
      </div>
      
      </div>

  </div>

  

  <div class="col-md-6">

    <div class="form-group">

      <label class="control-label col-md-4">Tipo de Producto</label>

      <div class="col-md-8"  id="tipos-data">

        <?php echo e(Form::select('tipo_producto_id', $tipos, NULL, ['class'=>'form-control', 'id'=>'tipos'])); ?>


      </div>
      <div class="col-md-4">
        
      </div>
      <div class="col-md-8">
        <?php if($errors->has('tipo_producto_id')): ?>
          <span class="help-block">
              <strong><?php echo e($errors->first('tipo_producto_id')); ?></strong>
          </span>
        <?php endif; ?>
      </div>
    </div>

  </div>

</div> <!-- FIN ROW -->





<div class="row">

  

  <div class="col-md-6">

    <div class="form-group">

      <label class="control-label col-md-4">Marca</label>

      <div class="col-md-8" id="marcas-data">
         <?php echo e(Form::select('marcas_id', $marcas, NULL, ['class'=>'form-control', 'id'=>'marcas'])); ?>


      </div>
      <div class="col-md-4">
        
      </div>
      <div class="col-md-8">
        <?php if($errors->has('marcas_id')): ?>
          <span class="help-block">
              <strong><?php echo e($errors->first('marcas_id')); ?></strong>
          </span>
        <?php endif; ?>
      </div>
    </div>

  </div>



  <div class="col-md-6">

    <div class="form-group">

      <label class="control-label col-md-4">Modelo</label>

      <div class="col-md-8" id="modelos-data">
        <?php echo e(Form::select('modelo_id', $modelos, NULL, ['class'=>'form-control', 'id'=>'modelos'])); ?>


      </div>
      <div class="col-md-4">
        
      </div>
      <div class="col-md-8">
        <?php if($errors->has('modelo_id')): ?>
          <span class="help-block">
              <strong><?php echo e($errors->first('modelo_id')); ?></strong>
          </span>
        <?php endif; ?>
      </div>
    </div>

  </div>



</div> <!-- FIN ROW -->



<div class="row">

  <div class="col-md-12"><hr></div>

</div> <!-- FIN ROW -->



<div class="row">

  <div class="col-md-12"><h2>Identificación</h2></div>

</div> <!-- FIN ROW -->



<div class="row">

  <div class="col-md-3">

    <label for="">Serie </label><?php echo e(Form::text('serie', NULL, ['class'=>'form-control serie'])); ?>

    <?php if($errors->has('serie')): ?>
      <span class="help-block">
          <strong><?php echo e($errors->first('serie')); ?></strong>
      </span>
    <?php endif; ?>
  </div>

  <div class="col-md-3">

    <label for="">MX </label>

    <br>

    <p id="mx">MX-<?php echo e($producto->id); ?>-<?php echo e(str_slug($producto->tipo())); ?></p>

  </div>

  <div class="col-md-6">

    <label for="">SKU </label>

    <br>

    <p id="sku">MX-<?php echo e($producto->id); ?>-<?php echo e(str_slug($producto->tipo())); ?>-<?php echo e(str_slug($producto->serie)); ?></p>

  </div>

</div> <!-- FIN ROW -->



<div class="row">

  <div class="col-md-3">

    <label for="">No. de Factura de Compra </label><?php echo e(Form::text('nFact', NULL, ['class'=>'form-control'])); ?>

    <?php if($errors->has('nFact')): ?>
      <span class="help-block">
          <strong><?php echo e($errors->first('nFact')); ?></strong>
      </span>
    <?php endif; ?>
  </div>

  <div class="col-md-3">

    <label for="">No. de Pedimento </label><?php echo e(Form::text('nPedi', NULL, ['class'=>'form-control'])); ?>

    <?php if($errors->has('nPedi')): ?>
      <span class="help-block">
          <strong><?php echo e($errors->first('nPedi')); ?></strong>
      </span>
    <?php endif; ?>
  </div>

  <div class="col-md-3">

    <label for="">Horómetro </label><?php echo e(Form::text('horometro', NULL, ['class'=>'form-control'])); ?> <!-- es forzoso este campo para guardar-->
    <?php if($errors->has('horometro')): ?>
      <span class="help-block">
          <strong><?php echo e($errors->first('horometro')); ?></strong>
      </span>
    <?php endif; ?>
  </div>

  <div class="col-md-3">

    <label for="">Asesor </label>

    <?php echo e(Form::select('asesor_id', $accesos, NULL, ['class'=>'form-control', 'id'=>'ase'])); ?>

    <?php if($errors->has('asesor_id')): ?>
      <span class="help-block">
          <strong><?php echo e($errors->first('asesor_id')); ?></strong>
      </span>
    <?php endif; ?>
  </div>

</div> <!-- FIN ROW -->



<div class="row">

  <div class="col-md-12"><hr></div>

</div> <!-- FIN ROW -->



<div class="row">

  <div class="col-md-12">

    <h2>Galería</h2>

    <span>Tamaño recomendado: ancho 800px y alto 533px.</span>

    <span><br>Peso sugerido: 90Kb</span>

    <input id="fileUpload" type="file" name="galeria" multiple>
    <?php if($errors->has('galeria')): ?>
      <span class="help-block">
          <strong><?php echo e($errors->first('galeria')); ?></strong>
      </span>
    <?php endif; ?>
  </div>

</div> <!-- FIN ROW -->



<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<script>

    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });

  </script>

<div class="row">
  <div class="col-md-6">
    <label for="">Link de Video</label>
    <?php echo e(Form::text('link_video', NULL, ['class'=>'form-control','placeholder'=>'https://www.youtube.com/embed/w40XNaTJURE', 'id'=>'link_video'])); ?>

    <?php if($errors->has('link_video')): ?>
      <span class="help-block">
          <strong><?php echo e($errors->first('link_video')); ?></strong>
      </span>
    <?php endif; ?>
    <small>Preview</small>
    <div style="position:relative;height:0;padding-bottom:56.25%; border: 1px solid white;"><iframe id="preview_video" src="<?php echo e($producto->link_video); ?>" width="640" height="360" frameborder="0" allowfullscreen style="position:absolute;width:100%;height:100%;left:0;"></iframe></div>
  </div>
</div>

<div class="row">

  <div class="col-md-12">

    <div class="drag" id="image-holder">
    <?php $__currentLoopData = $imgs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <img rel="<?php echo e($img->id); ?>" src="<?php echo e($img->picture); ?>" class="img-thumbnail <?php if($img->video!= 1): ?> delete <?php endif; ?>" id="<?php echo e($img->id); ?>" width="150">
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

  </div>

</div>  <!-- FIN ROW -->


<div class="row">

  <div class="col-md-12"><hr></div>

</div> <!-- FIN ROW -->



<div class="row">

  <div class="col-md-12"><h2>Oferta</h2></div>

</div> <!-- FIN ROW -->



<div class="row">

  <div class="col-md-3">

    <label for="">Precio Interno<br><span id="gastosVenta">$ 0.00</span></label> <!-- Precio Interno es igual a la suma de de todos conceptos en el tab Gastos-->

  </div>

  <div class="col-md-3">

    <label for="">Precio Venta </label><?php echo e(Form::text('priceVenta', NULL, ['class'=>'form-control','placeholder'=>'$0.00'])); ?> <!-- Validar que la cantidad que se capture, jamás sea inferior al precio interno, de lo contrario, no se podrá guardar el registro. Si se eligió publicarlo en la web, el concepto precio venta debe de capturarse forzosamente .-->
    <?php if($errors->has('priceVenta')): ?>
      <span class="help-block">
          <strong><?php echo e($errors->first('priceVenta')); ?></strong>
      </span>
    <?php endif; ?>
  </div>

</div> <!-- FIN ROW -->



<div class="row">

  <div class="col-md-12">

    <label for="">Descripción </label><?php echo e(Form::textarea('descripcion', NULL, ['class'=>'form-control','style'=>"height: 100px;", 'maxlength'=>'160'])); ?>

    <?php if($errors->has('descripcion')): ?>
      <span class="help-block">
          <strong><?php echo e($errors->first('descripcion')); ?></strong>
      </span>
    <?php endif; ?>
  </div>

</div> <!-- FIN ROW -->



<div class="row">

  <div class="col-md-6">

    <label for="">Link MercadoLibre </label><?php echo e(Form::text('linkMercadoLibre', NULL, ['class'=>'form-control'])); ?>

    <?php if($errors->has('linkMercadoLibre')): ?>
      <span class="help-block">
          <strong><?php echo e($errors->first('linkMercadoLibre')); ?></strong>
      </span>
    <?php endif; ?>
  </div>

  <div class="col-md-6">

    <label for="">Link Machinery Trader </label><?php echo e(Form::text('LinkMachineryTrader', NULL, ['class'=>'form-control'])); ?>

    <?php if($errors->has('LinkMachineryTrader')): ?>
      <span class="help-block">
          <strong><?php echo e($errors->first('LinkMachineryTrader')); ?></strong>
      </span>
    <?php endif; ?>
  </div>

</div> <!-- FIN ROW -->



<div class="row">

  <div class="col-md-12"><hr></div>

</div> <!-- FIN ROW -->



<div class="row">

   <div class="col-md-12"><h2>Medidas y peso</h2></div>

</div> <!-- FIN ROW -->



<div class="row">

  <div class="col-md-3">

    <label for="">Alto en cms</label><?php echo e(Form::text('alto', NULL, ['class'=>'form-control'])); ?>

    <?php if($errors->has('alto')): ?>
      <span class="help-block">
          <strong><?php echo e($errors->first('alto')); ?></strong>
      </span>
    <?php endif; ?>
  </div>

  <div class="col-md-3">

    <label for="">Largo en cms</label><?php echo e(Form::text('largo', NULL, ['class'=>'form-control'])); ?>

    <?php if($errors->has('largo')): ?>
      <span class="help-block">
          <strong><?php echo e($errors->first('largo')); ?></strong>
      </span>
    <?php endif; ?>
  </div>

  <div class="col-md-3">

    <label for="">Ancho en cms</label><?php echo e(Form::text('ancho', NULL, ['class'=>'form-control'])); ?>

    <?php if($errors->has('ancho')): ?>
      <span class="help-block">
          <strong><?php echo e($errors->first('ancho')); ?></strong>
      </span>
    <?php endif; ?>
  </div>

  <div class="col-md-3">

    <label for="">Peso en kgs</label><?php echo e(Form::text('peso', NULL, ['class'=>'form-control'])); ?>

    <?php if($errors->has('peso')): ?>
      <span class="help-block">
          <strong><?php echo e($errors->first('peso')); ?></strong>
      </span>
    <?php endif; ?>
  </div>

</div> <!-- FIN ROW -->



<div class="row">

  <div class="col-md-12"><hr></div>

</div> <!-- FIN ROW -->



<div class="row">

   <div class="col-md-12"><h2>Búsqueda</h2></div>

</div> <!-- FIN ROW -->



<div class="row">

  <div class="col-md-12">

    <label for="">Palabras clave. Puedes usar sinónimos o términos relacionados al producto, seperándolos con comas.</label><?php echo e(Form::textarea('keywork', NULL, ['class'=>'form-control','placeholder'=>'Ejemplo: excavadora, escabadora, escavadora','style'=>"height: 100px;", 'maxlength'=>'160'])); ?>

    <?php if($errors->has('keywork')): ?>
      <span class="help-block">
          <strong><?php echo e($errors->first('keywork')); ?></strong>
      </span>
    <?php endif; ?>
  </div>

</div> <!-- FIN ROW -->



<div class="row">

  <div class="col-md-12"><hr></div>

</div> <!-- FIN ROW -->



<div class="row">

  <div class="col-md-6">

    <h2>¿Se publica en PROMIN.mx?</h2>

    <ul class="lista_radio_inline">

      <li><label class="radio-inline"><?php echo e(Form::radio('state', 'public')); ?> Si</label></li>

      <li><label class="radio-inline"><?php echo e(Form::radio('state', 'hidden')); ?> No</label></li>

    </ul>
    <?php if($errors->has('state')): ?>
      <span class="help-block">
          <strong><?php echo e($errors->first('state')); ?></strong>
      </span>
    <?php endif; ?>
  </div>

  <div class="col-md-6">
    <h2>¿Es producto destacado?</h2>
    <ul class="lista_radio_inline">
      <li><label class="radio-inline"><?php echo e(Form::radio('destacado', '1')); ?> Si</label></li>
      <li><label class="radio-inline"><?php echo e(Form::radio('destacado', '0')); ?> No</label></li>
    </ul>
    <?php if($errors->has('destacado')): ?>
      <span class="help-block">
          <strong><?php echo e($errors->first('destacado')); ?></strong>
      </span>
    <?php endif; ?>
  </div>
</div> <!-- FIN ROW -->

<div class="row">

  <div class="col-md-12">

    <hr>

    <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-floppy-o"></i> Guardar</button>

  </div>

</div>

<?php echo e(Form::close()); ?>


