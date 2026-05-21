<?php
namespace Services;
use Models\{Livros, Digital, Fisico};

/**
 * Classe responsável por gerenciar as operações da locadora
 */
class Locadora {
    private array $livro = [];

    public function __construct() {
        $this->carregarLivro();
    }

    /**
     * Carrega os veículos do arquivo JSON
     */
    private function carregarLivro(): void {
        if (file_exists(ARQUIVO_JSON)) {
            $dados = json_decode(file_get_contents(ARQUIVO_JSON), true);
            foreach ($dados as $dado) {
                if ($dado['tipo'] === 'Digital') {
                    $livro = new Digital ($dado['Título'], $dado['Autor']);
                } else {
                    $livro = new Fisico ($dado['Título'], $dado['Autor']);
                }
                $livro->setDisponivel($dado['disponivel']);
                $this->livro[] = $livro;
            }
        }
    }

    /**
     * Salva os veículos no arquivo JSON
     */
    private function salvarLivro(): void {
        $dados = [];
        foreach ($this->livro as $livro) {
            $dados[] = [
                'tipo' => ($livro instanceof Digital) ? 'digital' : 'fisico',
                'Título' => $livro->getTitulo(),
                'Autor' => $livro->getAutor(),
                'disponivel' => $livro->isDisponivel()
            ];
        }
        
        // Cria o diretório se não existir
        $dir = dirname(ARQUIVO_JSON);
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);
        }
        
        file_put_contents(ARQUIVO_JSON, json_encode($dados, JSON_PRETTY_PRINT));
    }

    /**
     * Adiciona um novo veículo à locadora
     */
    public function adicionarLivro(Livros $livro): void {
        $this->livro[] = $livro;
        $this->salvarLivro();
    }

    /**
     * Remove um veículo da locadora
     */
    public function deletarLivro(string $titulo, string $autor): string {
        foreach ($this->livro as $key => $livro) {
            if ($livro->getTitulo() === $titulo && $livro->getAutor() === $autor) {
                unset($this->livro[$key]);
                $this->livro = array_values($this->livro);
                $this->salvarLivro();
                return "Livro '{$titulo}' removido com sucesso!";
            }
        }
        return "Livro não encontrado.";
    }

    /**
     * Aluga um veículo por um número específico de dias
     */
    public function alugarLivro(string $titulo, int $dias = 1): string {
        foreach ($this->livro as $livro) {
            if ($livro->getTitulo() === $titulo && $livro->isDisponivel()) {
                $valorAluguel = $livro->calcularAluguel($dias);
                $mensagem = $livro->alugar();
                $this->salvarLivro();
                return $mensagem . " Valor do aluguel: R$ " . number_format($valorAluguel, 2, ',', '.');
            }
        }
        return "Livro não disponível.";
    }

    /**
     * Devolve um veículo alugado
     */
    public function devolverLivro(string $titulo): string {
        foreach ($this->livro as $livro) {
            if ($livro->getTitulo() === $titulo && !$livro->isDisponivel()) {
                $mensagem = $livro->devolver();
                $this->salvarLivro();
                return $mensagem;
            }
        }
        return "Livro não encontrado ou já está disponível.";
    }

    /**
     * Retorna a lista de todos os veículos
     */
    public function listarLivro(): array {
        return $this->livro;
    }

    /**
     * Calcula uma previsão de valor do aluguel
     */
    public function calcularPrevisaoAluguel(string $tipo, int $dias): float {
        if ($tipo === 'Digital') {
            return (new Digital('', ''))->calcularAluguel($dias);
        }
        return (new Fisico('', ''))->calcularAluguel($dias);
    }
}
