@extends('layouts.shopTemplate')
@section('title','Lobo Shop')

@section('contenido')

    <!-- Page Content -->
    <div class="container">

        <div  class="panel width:auto " style="max-width:auto;margin-left:auto;margin-right:auto;">
            <div class="panel-body">
             @if ($productos->first()==null)
             <div class="row carousel-holder">

             </div>
             @else
                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="/products_images/{{$productos->first()->image}}" alt="">
                                    <div class="carousel-caption">
                                        <div class = "cap"> {!! $productos->first()->nombre !!}</div>
                                        <div class = "capM"> ${!! $productos->first()->precio !!}</div>
                                      </div>
                            </div>
                                <div class="item">
                                    <img class="slide-image" src="/products_images/{{$productos->last()->image}}" alt="">
                                    <div class="carousel-caption">
                                            <div class = "cap"> {!!$productos->last()->nombre !!}</div>
                                            <div class = "capM"> ${!! $productos->last()->precio !!}</div>
                                      </div>
                                </div>
                        </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                            </div>
                    </div>

                </div>
                @endif
                <!-- articulos -->
                <br>
                <div class = "cap">
                    Lista de productos
                </div>
                <div class="row">

                    @foreach ($productos as $producto)

                    @if ($producto==null)

                    <div class="col-sm-4 col-lg-4 col-md-4">
                            <div class="thumbnail">
                                <img class = "img" src="/products_images/null.jpg" alt="">
                                <div class="caption">
                                    <h4 class="pull-right">$0.00</h4>
                                    <h4><a href="#">   </a>
                                    </h4>
                                    <p></p>
                                </div>
                                <div class="ratings">

                                    <p>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                    </p>
                                </div>
                            </div>
                        </div>


                    @else
                    <div class="col-sm-4 col-lg-4 col-md-4">
                            <div class="thumbnail">
                                <img class = "img" src="/products_images/{{$producto->image}}" alt="">
                                <div class="caption">
                                    <h4 class="pull-right">${!! $producto->precio !!}</h4>
                                    <h5><a href="{{ route('producto',$producto->id) }}">  {!!$producto->nombre !!}  </a>
                                    </h5>
                                    <p></p>
                                </div>
                                <div class="ratings">

                                    <p>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                        <span class="glyphicon glyphicon-star"></span>
                                    </p>
                                </div>
                            </div>
                        </div>

                    @endif
                    @endforeach

                </div>

            </div>

        </div>

    </div>
    @endsection
