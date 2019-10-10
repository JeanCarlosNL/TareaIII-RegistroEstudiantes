<?php

function filtro($lista,$propiedad,$value){
    
    $filtro=[];

    foreach($lista as $elemento){
          if($elemento[$propiedad] == $value) array_push ($filtro,$elemento);
    }

    return $filtro;

}

function ultimoElemento($lista){

    $contarLista=count($lista);
    $ultimoElemento = $lista[$contarLista-1];
    return $ultimoElemento;
}

function getIndex($lista, $property, $value){
    $index = 0;
    $aux = 0;

    foreach($lista as $elemento){
        if($elemento[$property]==$value){
            $index = $aux;
            break;
        }
        $aux++;

    }
    return $index;
}
