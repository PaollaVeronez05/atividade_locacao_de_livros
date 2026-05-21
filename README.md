# Locadora de Veículos - Sistema Web em PHP

![STATUS](https://img.shields.io/badge/STATUS-CONCLUÍDO-00C853?style=for-the-badge)
![DATA](https://img.shields.io/badge/ATUALIZADO-MAIO%202026-9E9E9E?style=for-the-badge)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![BOOTSTRAP](https://img.shields.io/badge/BOOTSTRAP-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)
![JSON](https://img.shields.io/badge/JSON-000000?style=for-the-badge&logo=json&logoColor=white)
![COMPOSER](https://img.shields.io/badge/COMPOSER-885630?style=for-the-badge&logo=composer&logoColor=white)

---

## Índice

- [Sobre o Projeto](#sobre-o-projeto)
- [Tecnologias e Ferramentas](#tecnologias-e-ferramentas)
- [Funcionalidades](#funcionalidades)
- [Estrutura e Arquitetura](#estrutura-e-arquitetura)
- [POO e Conceitos Aplicados](#poo-e-conceitos-aplicados)
- [Perfis de Usuário](#perfis-de-usuário)
- [Instalação e Execução](#instalação-e-execução)
- [Estrutura do Projeto](#estrutura-do-projeto)
- [Objetivo Acadêmico](#objetivo-acadêmico)
- [Aprendizados](#aprendizados)

---

# Sobre o Projeto

O **Locadora de Veículos** é um sistema web desenvolvido em PHP com foco na aplicação prática de conceitos de **Programação Orientada a Objetos (POO)**, autenticação de usuários e arquitetura MVC.

A aplicação permite o gerenciamento completo de veículos de uma locadora, incluindo:

- Cadastro de veículos
- Controle de aluguel e devolução
- Autenticação de usuários
- Controle de permissões por perfil
- Persistência de dados utilizando arquivos JSON

O sistema foi desenvolvido com interface responsiva utilizando Bootstrap e organização modular baseada em serviços, modelos e interfaces.

---

# Tecnologias e Ferramentas

## Desenvolvimento Principal

<p align="left">
  <a href="https://skillicons.dev">
    <img src="https://skillicons.dev/icons?i=php,bootstrap,js,github,vscode" />
  </a>
</p>

## Ferramentas Utilizadas

- **PHP:** Desenvolvimento backend e regras de negócio.
- **Bootstrap:** Interface responsiva e estilização.
- **Composer:** Gerenciamento de dependências.
- **JSON:** Persistência local de dados.
- **GitHub:** Versionamento do projeto.
- **VS Code:** Ambiente de desenvolvimento.

---

# Funcionalidades

## Sistema de Login

- Autenticação de usuários via sessão.
- Controle de permissões por perfil.

---

## Gerenciamento de Veículos

- Cadastro de carros e motos.
- Exclusão de veículos.
- Controle de disponibilidade.
- Visualização da frota.

---

## Sistema de Locação

- Aluguel de veículos.
- Devolução de veículos.
- Atualização automática do status.

---

## Simulação de Valores

- Cálculo de locação baseado:
  - Tipo do veículo
  - Quantidade de dias

---

## Persistência de Dados

Armazenamento de informações em arquivos:

```bash
usuarios.json
veiculos.json
```

---

# Estrutura e Arquitetura

O projeto foi organizado seguindo separação modular de responsabilidades:

```bash
📂 locadora-veiculos
├── 📂 config
├── 📂 data
├── 📂 interfaces
├── 📂 models
├── 📂 public
├── 📂 services
├── 📂 views
├── 📂 vendor
├── 📄 composer.json
└── 📄 README.md
```

---

# POO e Conceitos Aplicados

## Encapsulamento

Proteção de atributos internos das classes.

---

## Herança

Especialização das classes:

- `Carro`
- `Moto`

a partir da classe abstrata:

- `Veiculo`

---

## Interface

Implementação da interface:

```php
Locavel
```

Padronizando métodos de aluguel e devolução.

---

## Polimorfismo

Comportamentos diferentes para diferentes tipos de veículos.

---

## Abstração

Representação simplificada de uma locadora real.

---

# Estrutura das Classes

| Classe | Responsabilidade |
|---|---|
| `Veiculo` | Classe abstrata principal |
| `Carro` | Modelo específico de carro |
| `Moto` | Modelo específico de moto |
| `Auth` | Autenticação de usuários |
| `Locadora` | Controle geral da locadora |

---

# Perfis de Usuário

## Administrador

Permissões completas:

- Adicionar veículos
- Excluir veículos
- Gerenciar locações
- Gerenciar sistema

---

## Usuário

Permissões limitadas:

- Visualizar veículos
- Consultar disponibilidade
- Simular locações

---

# Instalação e Execução

## Clone o repositório

```bash
git clone https://github.com/seu-usuario/locadora-veiculos.git
```

---

## Acesse a pasta do projeto

```bash
cd locadora-veiculos
```

---

## Instale as dependências

```bash
composer install
```

---

## Inicie o servidor local

```bash
php -S localhost:8000 -t public
```

---

## Acesse no navegador

```bash
http://localhost:8000
```

---

# Estrutura do Projeto

```bash
📂 locadora-veiculos
 ┣ 📂 config
 ┣ 📂 data
 ┃ ┣ 📄 usuarios.json
 ┃ ┗ 📄 veiculos.json
 ┣ 📂 interfaces
 ┣ 📂 models
 ┣ 📂 public
 ┣ 📂 services
 ┣ 📂 views
 ┣ 📂 vendor
 ┣ 📄 composer.json
 ┣ 📄 composer.lock
 ┗ 📄 README.md
```

---

# Objetivo Acadêmico

Projeto desenvolvido com finalidade educacional para prática de:

- PHP Orientado a Objetos
- Arquitetura MVC
- Interfaces e Classes Abstratas
- Persistência de Dados
- Controle de Sessão
- Desenvolvimento Web Responsivo

---

# Aprendizados

Durante o desenvolvimento deste projeto foram reforçados conhecimentos sobre:

- Estruturação backend em PHP
- Organização MVC
- Programação Orientada a Objetos
- Manipulação de JSON
- Controle de autenticação
- Desenvolvimento responsivo com Bootstrap

---

<p align="center">
  <b>SENAI "A. Jacob Lafer" - Santo André, 2026</b><br>
  Curso Técnico em Desenvolvimento de Sistemas
</p>
