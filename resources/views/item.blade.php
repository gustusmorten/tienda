@extends('layouts.shopTemplate')
@section('title','Lobo Shop')

@section('contenido')


    <!-- Page Content -->
    <div class="container">

        <div class="panel width:auto " style="max-width:640;margin-left:auto;margin-right:auto;">
            <div class="panel-body">

                <div class="items">
                    <img class="img-items" src="/products_images/{{$producto->image}}" alt="">
                    <div class="caption-full">
                        <h4 class="pull-right">${!!$producto->precio!!}</h4>
                        <h4><a href="#">{!!$producto->nombre!!}</a>
                        </h4>

                    </div>
                    <div class="ratings">

                        <p>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            4.0 stars
                        </p>
                    </div>
                </div>

                <div class="well">

                    <div class="text-right">
                        <a  href="{{ route('shopingCart.add',$producto->id) }}" class="btn btn-success">Añadir al carrito</a>
                    </div>

                    <hr>

                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->
