<div class="content">
    
        <div class="container breadcrumbs">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="{{url('/')}}"><i class="fa fa-home"></i> Inicio</a></li>
                        <li><i class="fa fa-angle-right"></i></li>
                        <li class="active">{{$linea->nombre}}</li>
                    </ol>
                </div>
            </div>
        </div>
        <form method="GET" action="">
        <div class="container sorting no_pad_top">
            <div class="row">
                <div class="col-sm-3">
                <select class="form-control" name="linea" id="linea" onchange="this.form.submit()">
                    @foreach($lineas as $val)
                        <option value="{{$val->id}}" @if($val->id==$linea->id) selected="selected" @endif>{{$val->nombre}}</option>
                    @endforeach
                </select>
                </div>
                <div class="col-sm-3">
                    <select class="form-control" name="tipo" id="tipos" onchange="this.form.submit()">
                    <option value="">Todos los Tipo de Productos</option>
                    @foreach($tipos as $val)
                        <option value="{{$val->id}}" @if($val->id==$input->tipo) selected="selected" @endif>{{$val->nombre}}</option>
                    @endforeach
                </select>
                </div>
                <div class="col-sm-3">
                    <select class="form-control" name="marca" id="marcas" onchange="this.form.submit()">
                    <option value="">Todas las Marcas</option>
                    @foreach($tipos as $val)
                        <option value="{{$val->id}}" @if($val->id==$input->marca) selected="selected" @endif>{{$val->nombre}}</option>
                    @endforeach
                </select>
                </div>
                <div class="col-sm-3 text-right grid-show">
                    <span>Mostrar</span>
                    {{Form::select('numb', ['100'=>'100','50'=>'50','20'=>'20'], $input->numb, ['class'=>'form-control','style'=>'width: 100px;', 'onChange'=>'this.form.submit()'])}}
                    <span>por página</span>
                </div>
            </div>
        </div>
        </form>


        <div class="container catalog catalog-square">

            <div class="row text-center">
                @foreach($productos as $producto)
                <div class="col-md-3 col-sm-6 citem">
                    <div class="cimg" style="min-height: 200px; max-height: 200px;">
                        <a href="{{url('linea-negocio/'.str_slug($producto->linea()).'/'.str_slug($producto->nombre).'-'.$producto->id)}}" class="aimg" title="{{$producto->nombre}}"><img src="{{$producto->image()}}" alt="{{$producto->nombre}}"></a>
                        <a href="pago-seguro.php" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Comprar</a>
                        <a href="#whish" class="btn btn2 whish " producto='{{$producto->id}}'><i class="fa fa-heart corazon"></i></a>
                    </div>
                    <h5>
                        <a href="{{url('linea-negocio/'.str_slug($producto->linea()).'/'.str_slug($producto->nombre).'-'.$producto->id)}}" class="black" title="{{$producto->nombre}}">{{$producto->nombre}}</a>
                        <small>{{$producto->modelo()}}</small>
                    </h5>
                    
                    <div class="cost">$ {{number_format($producto->priceVenta, 2, '.', ',')}}</div>
                
                </div>
                @endforeach
            </div>

            <!-- /.row -->
        </div>
        <!-- /.container -->

        <!-- CONTAINER -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    {{$productos->links()}}
                </div>
            </div>
        </div>
 