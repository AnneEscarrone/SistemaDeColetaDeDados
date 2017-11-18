<?php

namespace App\Repositories;

use App\Repositories\Contracts\RepositoryInterface;
use Illuminate\Support\Facades\DB;
use DebugBar;

class RepositorySession implements RepositoryInterface {

    function debug_to_console($data, $context = 'Debug in Console') {

        // Buffering to solve problems frameworks, like header() in this and not a solid return.
        ob_start();

        $output = 'console.info( \'' . $context . ':\' );';
        $output .= 'console.log(' . json_encode($data) . ');';
        $output = sprintf('<script>%s</script>', $output);

        echo $output;
    }

    public function inserir($sessao) {
        $id = DB::table('sessions')->insertGetId(
                ['data' => $sessao->getData(), 'inicio' => $sessao->getInicio(), 'fim' => $sessao->getFim(), 'ip' => $sessao->getIp()]
        );
        return $id;
    }

    public function verificaSeExisteSessao() {
        $numeroRegistros = DB::table('sessions')->count('id');
        return $numeroRegistros;
    }

    public function verificaSeSessaoTemFim() {
        
        $idUltimaSessao = $this->retornarIdUltimaSessao();      
        $fim = $users = DB::table('sessions')->where('id', $idUltimaSessao)->select('fim')->get();                             
        return $fim[0]->fim;
    }
    
    public function verificaOFimSessao($id) {                    
        $fim = $users = DB::table('sessions')->where('id', $id)->select('fim')->get();                             
        return $fim[0]->fim;
    }

    public function adicionaFimDaSessao($sessao) {
        $idUltimaSessao = $this->retornarIdUltimaSessao();       
        DB::table('sessions')->where('id', $idUltimaSessao)->update(['fim' => $sessao->getFim()]);
    }

    public function retornarIdUltimaSessao() {
        $idUltimaSessao = DB::table('sessions')->max('id');        
        return $idUltimaSessao;
    }

    public function retornaTempoSessao($sessao) {

        $inicioSessao = DB::table('sessions')->where('id', $sessao)->select('inicio')->get();
        $fimSessao = DB::table('sessions')->where('id', $sessao)->select('fim')->get();
        $formatacao = array("inicio", "fim", "[", "]", "posicaoX", "posicaoY", ":", "{", "}", '"', "'");
        $inicio = str_replace($formatacao, "", $inicioSessao);
        $fim = str_replace($formatacao, "", $fimSessao);
        $tempoSessao = (int) $fim - (int) $inicio;
        if($tempoSessao>0){
            return $tempoSessao;
        }else{
            return 0;
        }
         
    }

}
