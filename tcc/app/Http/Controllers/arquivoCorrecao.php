<?php

use App\Http\Controllers\Controller;

namespace App\Http\Controllers;

use DebugBar;

class arquivoCorrecao extends Controller {

    public function verificaNavegacaoMouseVerticalHorizontal() {

        $idSessao=104;
        $arrayCoordenadasMouseY = explode("\n", file_get_contents("arquivosCorrecao/Joao/coordenadasY".$idSessao.".txt"));
        $arrayCoordenadasMouseX = explode("\n", file_get_contents("arquivosCorrecao/Joao/coordenadasX".$idSessao.".txt"));
        if (sizeof($arrayCoordenadasMouseY) != 1) {
            $contVertical = 0;
            $contHorizontal = 0;
            $contDiagonal = 0;
            $contMovimentoNãoLineares = 0;
            $tamanhoArrayCoordenadas = sizeof($arrayCoordenadasMouseY) - 1;
            for ($i = 0; $i < $tamanhoArrayCoordenadas; $i++) {
                $tempY = $arrayCoordenadasMouseY[$i];
                $tempX = $arrayCoordenadasMouseX[$i];
                if ($tempX == $arrayCoordenadasMouseX[$i + 1]) {
                    $contVertical += 1;
                } else if ($tempY == $arrayCoordenadasMouseY[$i + 1]) {
                    $contHorizontal += 1;
                } else if ($tempX < $arrayCoordenadasMouseX[$i + 1] && $tempY < $arrayCoordenadasMouseY[$i + 1]) {
                    $diferencaX = ($tempX - intval($arrayCoordenadasMouseX[$i + 1])) * 1;
                    $diferencaY = ($tempY - intval($arrayCoordenadasMouseY[$i + 1])) * 1;
                    if ($diferencaY == $diferencaX) {
                        $contDiagonal += 1;
//                        DebugBar::info("Entrou em x aumento e y aumentou igual");
                    }
                } else if ($tempX > $arrayCoordenadasMouseX[$i + 1] && $tempY > $arrayCoordenadasMouseY[$i + 1]) {
                    $diferencaX = ($tempX - intval($arrayCoordenadasMouseX[$i + 1])) * 1;
                    $diferencaY = ($tempY - intval($arrayCoordenadasMouseY[$i + 1])) * 1;                                       
                    if ($diferencaY == $diferencaX) {
                        $contDiagonal += 1;
//                         DebugBar::info("Entrou em x dimunuiu e y aumentou igual");
                    }
                } else if ($tempX < $arrayCoordenadasMouseX[$i + 1] && $tempY > $arrayCoordenadasMouseY[$i + 1]) {
                    $diferencaX = ($tempX - $arrayCoordenadasMouseX[$i + 1]) * 1;
                    $diferencaY = ($tempY - $arrayCoordenadasMouseY[$i + 1]) * 1;                   
                    if ($diferencaY == $diferencaX) {
                        $contDiagonal += 1;
//                        DebugBar::info("Entrou em x aumentou e y dimunuiu igual");
                    }
                } else if ($tempX > $arrayCoordenadasMouseX[$i + 1] && $tempY < $arrayCoordenadasMouseY[$i + 1]) {
                    $diferencaX = ($tempX - intval($arrayCoordenadasMouseX[$i + 1])) * 1;
                    $diferencaY = ($tempY - intval($arrayCoordenadasMouseY[$i + 1])) * 1;                    
                    if ($diferencaY == $diferencaX) {
                        $contDiagonal += 1;
//                        DebugBar::info("Entrou em x dimunuiu e y diminuiu igual");
                    }
                } else {
                    $contMovimentoNãoLineares += 1;
                }
            } // colocar 90% para cima   
           
            $movimentoLineares = $contVertical + $contDiagonal + $contHorizontal;
            $resultado = ($movimentoLineares * 100) / $tamanhoArrayCoordenadas;
            DebugBar::info("navegação sequencial", $resultado);
            if ($resultado > 70 && $resultado < 85) {
                $navegacaoLinear = 0.5;
            } if ($resultado <= 70) {
                $navegacaoLinear = 0;
            } if ($resultado >= 85) {
                $navegacaoLinear = 1;
            }
        } else {
            $navegacaoLinear = 0;
        }

        $arquivo = fopen("resultadosArquivoCorrecao.arff", "a");
        fwrite($arquivo,"sessao ".$idSessao.":".$navegacaoLinear."\n");
        fclose($arquivo);
    }

}
