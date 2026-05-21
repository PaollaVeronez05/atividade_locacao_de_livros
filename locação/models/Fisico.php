<?php
namespace Models;
use Interfaces\Locavel;

/**
 * Classe que representa uma Moto no sistema
 */
class Fisico extends Livros implements Locavel {
    public function calcularAluguel(int $dias): float {
        return $dias * DIARIA_FISICO;
    }

    public function alugar(): string {
        if ($this->disponivel) {
            $this->disponivel = false;
            return " livro Físico '{$this-> titulo}' alugada com sucesso!";
        }
        return "livro Físico '{$this-> titulo}' não está disponível.";
    }

    public function devolver(): string {
        if (!$this->disponivel) {
            $this->disponivel = true;
            return "Fisico '{$this->titulo}' devolvida com sucesso!";
        }
        return "Fisico '{$this->titulo}' já está na locadora.";
    }
}