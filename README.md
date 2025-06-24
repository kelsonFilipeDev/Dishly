# Dislhy

**Dislhy** é um sistema completo de gestão de receitas desenvolvido para informatizar e centralizar o acervo culinário de uma empresa que cria, testa e publica receitas em livros gastronómicos. Este projeto organiza o trabalho de cozinheiros, degustadores e editores, garantindo rastreabilidade, padronização e controlo de qualidade em todas as etapas — da criação da receita à sua publicação.

---

## Visão Geral

Cada ator do sistema — cozinheiros, degustadores e editores — é um colaborador identificado por atributos como ID, nome, data de ingresso e salário. As receitas têm código único, nome, categoria, autor, ingredientes e modo de preparo. Ingredientes possuem unidade de medida (opcional) e são descritos detalhadamente para facilitar uso em diferentes contextos.

Cozinheiros podem fornecer nomes artísticos e histórico profissional com restaurantes onde já trabalharam. Degustadores são responsáveis por testes de qualidade com notas atribuídas. Livros reúnem receitas inéditas ou republicadas, possuem ISBN, título único e editor responsável.

O sistema garante controlo de acessos através de perfis: Básico, Médio e Avançado.

---

## Funcionalidades

- Integração com Laravel Breeze para autenticação
- Interface totalmente responsiva
- Sistema de permissões por nível de acesso
- Gestão de entidades:
  - Cozinheiros
  - Degustadores
  - Restaurantes
  - Editores
  - Receitas
  - Categorias
  - Ingredientes
  - Livros
- Listagem e consulta por livro, por cozinheiro e por período (dia, semana, mês)
- Relatórios em PDF:
  - Receitas por cozinheiro
  - Detalhes individuais de receitas
  - Testes de degustação
- Listagem de testes com ordenação por nota
- Histórico profissional dos cozinheiros (restaurantes, pratos, preços e capacidade)
- Controlo de acessos e registo de atividades
- Alteração de senha e nível de acesso
- Painel administrativo moderno, organizado e intuitivo

---

## Stack Tecnológica

### Frontend

- HTML5  
- CSS3  
- Tailwind CSS  
- JavaScript  
- Vue.js

#### Paleta de Cores

| Cor             | HEX       |
|-----------------|-----------|
| Golden Sand     | `#FFE6B4` |
| Sunset Amber    | `#FF9E4F` |
| Burnt Sienna    | `#B55233` |
| Dark Cognac     | `#5B3228` |

---

### Backend

- PHP 8.4.4  
- Laravel 10  
- Laravel Breeze  
- JSON API

---

### Base de Dados

- MySQL

---

### Ambiente de Desenvolvimento

- XAMPP (Apache + MySQL + PHP)

---

### Controlo de Versão

- Git & GitHub

---

## 👨Desenvolvido por

Projeto desenvolvido com dedicação por [Kelson Filipe Dev](https://github.com/kelsonFilipeDev) no contexto de engenharia de software, com foco em escalabilidade, manutenibilidade e segurança da informação.

---

> “Organizar receitas é simples. Torná-las acessíveis, escaláveis e bem geridas — isso sim é engenharia de software.”  
> — _Kelson Filipe Dev_
