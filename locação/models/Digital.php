<?php
namespace Models;
use Interfaces\Locavel;

/**
 * Classe que representa um Carro no sistema
 */
class Digital extends Livros implements Locavel {
    public function calcularAluguel(int $dias): float {
        return $dias * DIARIA_DIGITAL;
    }

    public function alugar(): string {
        if ($this->disponivel) {
            $this->disponivel = false;
            return "Digital '{$this-> titulo}' alugado com sucesso!";
        }
        return "Digital '{$this-> titulo}' não está disponível.";
    }

    public function devolver(): string {
        if (!$this->disponivel) {
            $this->disponivel = true;
            return "Digital '{$this->titulo}' devolvido com sucesso!";
        }
        return "Digital '{$this->titulo}' já está na locadora.";
    }
}