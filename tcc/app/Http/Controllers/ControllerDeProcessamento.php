<?php

use App\Http\Controllers\Controller;

namespace App\Http\Controllers;

use App\Repositories\RepositoryEvent;
use App\Repositories\RepositorySession;
use DebugBar;

class ControllerDeProcessamento extends Controller {

    public $sessaoAtual;
    private $mouse;
    private $tempo;
    private $navegacaoLinear;
    private $atalhoLeitor;
    private $navegacaoSequencial;
    private $usoDelBackspace;

    public function getSessao($sessao) {
        return $this->sessaoAtual = $sessao;
    }

    public function formataInformacoes($array) {
        $formatacao = array("posicao_top", "posicao_left", "posicaotop", "posicaoleft", "posicaoTop", "posicaoLeft", "tecla", ":", "{", '"', "}", "[", "]", "posicaoX", "posicaoY", "[", "]");
        $saida = str_replace($formatacao, "", $array);
        $arraySaida = explode(",", $saida);
        return $arraySaida;
    }

    public function verificaUsoDoMouse($idSessao) {
        $filenameX = 'coordenadasMouse/coordenadasX' . $idSessao . '.txt';
        $filenameY = 'coordenadasMouse/coordenadasY' . $idSessao . '.txt';
        if (file_exists($filenameX) && file_exists($filenameY)) {
            $arrayCoordenadasMouseY = explode("\n", file_get_contents("coordenadasMouse/coordenadasY" . $idSessao . ".txt"));
            $arrayCoordenadasMouseX = explode("\n", file_get_contents("coordenadasMouse/coordenadasX" . $idSessao . ".txt"));
            $distanciaTotal = 0;
            for ($i = 1; $i < sizeof($arrayCoordenadasMouseX); $i++) {
                $xa = $arrayCoordenadasMouseX[$i - 1];
                $ya = $arrayCoordenadasMouseY[$i - 1];
                $xb = $arrayCoordenadasMouseX[$i];
                $yb = $arrayCoordenadasMouseY[$i];
                $distancia = sqrt(pow(intval($ya) - intval($yb), 2) + pow(intval($xa) - intval($xb), 2));
                $distanciaTotal = $distanciaTotal + $distancia;
            }
            $this->mouse = $distanciaTotal;
        }
    }

    public function transformaCoordenadasMouse() {
        system("python fft.py ");
        // para não sobreescrever a frequencia 
        sleep(4);
    }

    public function verificaTempoDeSessao() {
        $repositorySessao = new RepositorySession();
        $tempoSessao = $repositorySessao->retornaTempoSessao($this->sessaoAtual);
        $this->tempo = $tempoSessao;
    }

    public function verificaNavegacaoMouseVerticalHorizontal($idSessao) {
        $filenameX = 'coordenadasMouse/coordenadasX' . $idSessao . '.txt';
        $filenameY = 'coordenadasMouse/coordenadasY' . $idSessao . '.txt';
        if (file_exists($filenameX) && file_exists($filenameY)) {
            $arrayCoordenadasMouseY = explode("\n", file_get_contents("coordenadasMouse/coordenadasY" . $idSessao . ".txt"));
            $arrayCoordenadasMouseX = explode("\n", file_get_contents("coordenadasMouse/coordenadasX" . $idSessao . ".txt"));
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
                }  

                $movimentoLineares = $contVertical + $contDiagonal + $contHorizontal;
                $resultado = ($movimentoLineares * 100) / $tamanhoArrayCoordenadas;
                DebugBar::info("navegação sequencial", $resultado);
                DebugBar::info("navegacao diagonal: ",$contDiagonal);
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
        }
    }

    public function verificaTeclasDeAtalhoDeLeitoresDeTela() {
        $repositoryEventos = new RepositoryEvent();
        $teclasUtilizadas = $repositoryEventos->retornaTeclasPressionadas($this->sessaoAtual);
        $teclas = $this->formataInformacoes($teclasUtilizadas);
        $arrayTeclasAtalhoLeitor = array("insert+t", "insert+b", "insert+tab", "capsLock+t", "capsLock+b", "capsLock+tab");
        $contAtalho = 0;
        for ($i = 0; $i < sizeof($teclas); $i++) {
            $cont = 0;
            $y = 0;
            while ($cont < sizeof($arrayTeclasAtalhoLeitor)) {
                for ($y = 0; $y < sizeof($arrayTeclasAtalhoLeitor); $y++) {
                    if ($teclas[$i] == $arrayTeclasAtalhoLeitor[$y]) {
                        $contAtalho += 1;
                    }
                    $cont++;
                }
            }
        }
        if ($contAtalho <= 2) {
            $this->atalhoLeitor = 0;
        } else if ($contAtalho >= 3) {
            $this->atalhoLeitor = 1;
        }
    }

    public function verificarModoDeNavegacaoSequencial() {
        $repositoryEventos = new RepositoryEvent();
        $arrayTeclasPressionadas = $repositoryEventos->retornaTeclasPressionadas($this->sessaoAtual);
        $teclas = $this->formataInformacoes($arrayTeclasPressionadas);
        /* percentual de grupos de tab ou de teclas variadas */
        $grupo = $this->percentualGruposNavegacaoSequencial($teclas);
        if ($grupo[0] != 0) {
            $totalGrupoTab = ($grupo[0] * 100) / ($grupo[0] + $grupo[1]);
            DebugBar::info("navegação linear", $totalGrupoTab);
            if ($totalGrupoTab <= 40) {
                $this->navegacaoSequencial = 0;
            } if ($totalGrupoTab >= 50) {
                $this->navegacaoSequencial = 1;
            } if ($totalGrupoTab < 50 && $totalGrupoTab > 40) {
                $this->navegacaoSequencial = 0.5;
            }
        } else {
            $this->navegacaoSequencial = 0;
        }
    }

    public function percentualGruposNavegacaoSequencial($teclas) {
        $grupoEspecifico = true;
        $grupoVariado = true;
        $contEspecifico = 0;
        $contVariado = 0;
        for ($i = 0; $i < sizeof($teclas); $i++) {
            if ($teclas[$i] == "tab" || $teclas[$i] == "shift+tab" || $teclas[$i] == "home" || $teclas[$i] == "end" || $teclas[$i] == "page down" || $teclas[$i] == "page up") {
                $grupoVariado = true;
                if ($grupoEspecifico == true) {
                    $grupoEspecifico = false;
                    $contEspecifico += 1;
                }
            }
            if ($teclas[$i] != "tab" && $teclas[$i] != "shift+tab" && $teclas[$i] != "home" && $teclas[$i] != "end" && $teclas[$i] != "page down" && $teclas[$i] != "page up") {
                $grupoEspecifico = true;
                if ($grupoVariado == true) {
                    $grupoVariado = false;
                    $contVariado += 1;
                }
            }
        }
        return array($contEspecifico, $contVariado);
    }

    public function percentualGruposDelBackSpace($teclas) {
        $grupoEspecifico = true;
        $grupoVariado = true;
        $contEspecifico = 0;
        $contVariado = 0;

        for ($i = 0; $i < sizeof($teclas); $i++) {
            if ($teclas[$i] == "delete" || $teclas[$i] == "backspace") {
                $grupoVariado = true;
                if ($grupoEspecifico == true) {
                    $grupoEspecifico = false;
                    $contEspecifico += 1;
                }
            }
            if ($teclas[$i] != "delete" && $teclas[$i] != "backspace") {
                $grupoEspecifico = true;
                if ($grupoVariado == true) {
                    $grupoVariado = false;
                    $contVariado += 1;
                }
            }
        }


        return array($contEspecifico, $contVariado);
    }

    public function verificaPercentualDeVezesPressionadoDelBackspace() {
        // percentual de vezes teclas: dell e backspace
        $repositoryEvento = new RepositoryEvent();
        $teclasUtilizadas = $repositoryEvento->retornaTeclasPressionadas($this->sessaoAtual);
        $teclas = $this->formataInformacoes($teclasUtilizadas);
        $grupo = $this->percentualGruposDelBackSpace($teclas);
        $totalGrupoDelBackpace = ($grupo[0] * 100) / ($grupo[0] + $grupo[1]);
        $this->usoDelBackspace = $totalGrupoDelBackpace;
    }

    function arquivoARFF() {
        $arrayVetor = array($this->mouse, $this->tempo, $this->navegacaoLinear, $this->atalhoLeitor, $this->navegacaoSequencial, $this->usoDelBackspace);
        $arquivo = fopen("vetor.arff", "a");
        $vetor = implode(",", $arrayVetor);
        fwrite($arquivo, $vetor);
        fclose($arquivo);
    }

}
