<?php

use App\Http\Controllers\Controller;

namespace App\Http\Controllers;

use App\Models\keyboard;
use App\Models\mouse;
use App\Models\session;
use App\Models\event;
use App\Models\element;
use App\Repositories\RepositorySession;
use App\Repositories\RepositoryEvent;
use App\Repositories\RepositoryElement;
use App\Repositories\RepositoryMouse;
use App\Repositories\RepositoryKeyBoard;
use App\Http\Controllers\Controller;
use DebugBar;

class ControllerSession extends Controller {

    function armazenaInformacoesSessao() {
        $controllerProcessamento = new ControllerDeProcessamento();
        $sessao = new session();
        $repositorySession = new RepositorySession();
        $ipUsuario = $_SERVER["REMOTE_ADDR"];
        $sessaoJson = json_decode($_POST['sessao']);
        $sessao->setData($sessaoJson->data);
        $sessao->setIp($ipUsuario);
        $sessao->setInicio($sessaoJson->inicio);
        $idSessao = $this->verificaFimSessao($repositorySession, $sessao, $sessaoJson, $controllerProcessamento);

        foreach ($sessaoJson->eventos as $eventoJson) {
            $idElemento = $this->armazenaElemento($eventoJson);
            $idMouse = $this->armazenaEventoMouse($eventoJson);
            $idTeclado = $this->armazenaEventoTeclado($eventoJson);
            $evento = $this->armazenaEvento($eventoJson, $idTeclado, $idMouse, $idSessao, $idElemento);
            $sessao->addEvento($evento);
        }
        if ($repositorySession->verificaOFimSessao($idSessao) !== null) {
            DebugBar::info("entrou!");
            $controllerProcessamento->getSessao($idSessao);
            $controllerProcessamento->verificaUsoDoMouse($idSessao);
            $controllerProcessamento->verificaTempoDeSessao();
            $controllerProcessamento->verificaTeclasDeAtalhoDeLeitoresDeTela();
            $controllerProcessamento->verificarModoDeNavegacaoSequencial();
            $controllerProcessamento->verificaPercentualDeVezesPressionadoDelBackspace();
            $controllerProcessamento->arquivoARFF();
            $controllerProcessamento->transformaCoordenadasMouse();
            $arquivoCorrecao = new arquivoCorrecao();
            $arquivoCorrecao->verificaNavegacaoMouseVerticalHorizontal();
            echo 'Seção registrada com sucesso!';
        }
    }

    function armazenaElemento($eventoJson) {
        $repositoryElement = new RepositoryElement();
        $elemento = new element();
        if (count((array) $eventoJson->elemento) != 0) {
            $elemento->setPosicaoLeft($eventoJson->elemento->posicaoLeft);
            $elemento->setPosicaoTop($eventoJson->elemento->posicaoTop);
            $elemento->setTipo($eventoJson->elemento->tipo);
            $elemento->setIdHtml($eventoJson->elemento->id);
            $elemento->setUrl($eventoJson->elemento->url);
            $elemento->setFocus($eventoJson->elemento->focus);
            $elemento->setTexto($eventoJson->elemento->texto);
            $idElemento = $repositoryElement->inserir($elemento);
            $elemento->setId($idElemento);
            return $idElemento;
        }
    }

    function armazenaEventoMouse($eventoJson) {
        if (count((array) $eventoJson->mouse) != 0) {
            $mouse = new mouse();
            $mouse->setPosicaoTop($eventoJson->mouse->posicaoTop);
            $mouse->setPosicaoLeft($eventoJson->mouse->posicaoLeft);
            $mouse->setBotaoMouse($eventoJson->mouse->botao);
            $repositoryMouse = new RepositoryMouse();
            $idMouse = $repositoryMouse->inserir($mouse);
            $mouse->setId($idMouse);
            return $idMouse;
        }
    }

    function armazenaEventoTeclado($eventoJson) {
        if (count((array) $eventoJson->teclado) != 0) {
            $teclado = new keyboard();
            $teclado->setKeyCode($eventoJson->teclado->keyCode);
            $teclado->setTecla($eventoJson->teclado->tecla);
            $repositoryTeclado = new RepositoryKeyBoard();
            $idTeclado = $repositoryTeclado->inserir($teclado);
            $teclado->setId($idTeclado);
            return $idTeclado;
        }
    }

    function armazenaCoordenadasMouse($sessaoJson, $idSessao, $fim) {
        $arrayCoordenadasMouse = array();
        $arrayCoordenadasMouseX = array();
        $arrayCoordenadasMouseY = array();
        foreach ($sessaoJson->coordenadasMouse as $coordenadasMouseJson) {
            array_push($arrayCoordenadasMouse, $coordenadasMouseJson->posicaox, " ", $coordenadasMouseJson->posicaoy, "\n");
            array_push($arrayCoordenadasMouseX, $coordenadasMouseJson->posicaox, "\n");
            array_push($arrayCoordenadasMouseY, $coordenadasMouseJson->posicaoy, "\n");
        }
        $coordenadasMouseX = fopen("coordenadasMouse/coordenadasX" . $idSessao . ".txt", "a");
        $coordenadasX = implode("", $arrayCoordenadasMouseX);
        fwrite($coordenadasMouseX, $coordenadasX);
        fclose($coordenadasMouseX);
        $coordenadasMouseY = fopen("coordenadasMouse/coordenadasY" . $idSessao . ".txt", "a");
        $coordenadasY = implode("", $arrayCoordenadasMouseY);
        fwrite($coordenadasMouseY, $coordenadasY);
        fclose($coordenadasMouseY);

        if ($fim == true) {
            $filename = 'fft/coordenadas.txt';
            if (file_exists($filename)) {
                $coordenadasMouse = fopen("fft/coordenadas.txt", "w");
                $coordenadas = implode("", $arrayCoordenadasMouse);
                fwrite($coordenadasMouse, $coordenadas);
                fclose($coordenadasMouse);
                $arquivo = 'fft/coordenadas.txt';
                $novoArquivo = 'fft/coordenadas' . $idSessao . '.txt';
                copy($arquivo, $novoArquivo);
            } else {
                $coordenadasMouse = fopen("fft/coordenadas.txt", "w");
                $coordenadas = implode("", $arrayCoordenadasMouse);
                fwrite($coordenadasMouse, $coordenadas);
                fclose($coordenadasMouse);
                $arquivo = 'fft/coordenadas.txt';
                $novoArquivo = 'fft/coordenadas' . $idSessao . '.txt';
                copy($arquivo, $novoArquivo);
            }
        } else {
            DebugBar::info("salvando");
            $coordenadasMouse = fopen("fft/coordenadas.txt", "a");
            $coordenadas = implode("", $arrayCoordenadasMouse);
            fwrite($coordenadasMouse, $coordenadas);
            fclose($coordenadasMouse);
        }
    }

    function armazenaEvento($eventoJson, $idTeclado, $idMouse, $idSessao, $idElemento) {
        $evento = new event();
        $evento->setUrl($eventoJson->url);
        $evento->setDuracao($eventoJson->duracao);
        $evento->setTeclado($idTeclado);
        $evento->setMouse($idMouse);
        $evento->setSessao($idSessao);
        $evento->setElemento($idElemento);
        $repositoryEvento = new RepositoryEvent();
        $idEvento = $repositoryEvento->inserir($evento);
        $evento->setId($idEvento);
        return $evento;
    }

    function verificaFimSessao($repositorySession, $sessao, $sessaoJson, $controllerProcessamento) {
        if ($repositorySession->verificaSeExisteSessao() == 0 && $sessaoJson->fim === null) {
            //verifica se  existe alguma sessão antes (se não entra)
            //DebugBar::info("não tem nenhuma sessao antes");
            $sessao->setFim($sessaoJson->fim);
            $idSessao = $repositorySession->inserir($sessao);
            $sessao->setId($idSessao);
            $this->armazenaCoordenadasMouse($sessaoJson, $idSessao, $fim = false);
            return $idSessao;
        } if ($repositorySession->verificaSeExisteSessao() == 0 && $sessaoJson->fim !== null) {
            //verificar se  existe alguma sessão antes (se não entra)
            //DebugBar::info("não tem nenhuma sessao antes");
            $sessao->setFim($sessaoJson->fim);
            $idSessao = $repositorySession->inserir($sessao);
            $sessao->setId($idSessao);
            $this->armazenaCoordenadasMouse($sessaoJson, $idSessao, $fim = true);
            $controllerProcessamento->verificaNavegacaoMouseVerticalHorizontal($idSessao);
            return $idSessao;
        }if ($repositorySession->verificaSeSessaoTemFim() != null && $sessaoJson->fim === null) {
            // DebugBar::info("a sessao tem um fim ");
            $sessao->setFim($sessaoJson->fim);
            $idSessao = $repositorySession->inserir($sessao);
            $sessao->setId($idSessao);
            $this->armazenaCoordenadasMouse($sessaoJson, $idSessao, $fim = false);
            return $idSessao;
        }
        if ($repositorySession->verificaSeSessaoTemFim() === null && $sessaoJson->fim != null) {
            // DebugBar::info("não tem fim nulo");
            $sessao->setFim($sessaoJson->fim);
            $repositorySession->adicionaFimDaSessao($sessao);
            $idSessao = $repositorySession->retornarIdUltimaSessao();
            $this->armazenaCoordenadasMouse($sessaoJson, $idSessao, $fim = true);
            $controllerProcessamento->verificaNavegacaoMouseVerticalHorizontal($idSessao);
            return $idSessao;
        } else {
            if ($repositorySession->verificaSeSessaoTemFim() !== null && $sessaoJson->fim != null) {
                //    DebugBar::info("não tem fim nulo2");
                $sessao->setFim($sessaoJson->fim);
                $idSessao = $repositorySession->inserir($sessao);
                $sessao->setId($idSessao);
                $this->armazenaCoordenadasMouse($sessaoJson, $idSessao, $fim = true);
                $controllerProcessamento->verificaNavegacaoMouseVerticalHorizontal($idSessao);
                return $idSessao;
            } else {
                //  DebugBar::info("a sessao não tem fim");
                $idSessao = $repositorySession->retornarIdUltimaSessao();
                $this->armazenaCoordenadasMouse($sessaoJson, $idSessao, $fim = false);
                return $idSessao;
            }
        }
    }

}
