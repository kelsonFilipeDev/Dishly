# Dislhy

Acervo de Receitas Dislhy
Uma empresa deseja informatizar o acervo de receitas que ela inventa, que iremos chamar de Dislhy, e comercializa sob a forma de livros. Estão envolvidos na elaboração das receitas e dos livros os cozinheiros, os degustadores (que controlam a qualidade  das receitas), e os editores dos livros. Todas estas pessoas são empregados da empresa, e são caracterizados por  um id, nome, data de ingresso na firma, e salário recebido. Cada receita tem um código único, um nome, foi  inventada por um cozinheiro numa dada data, e pertence a uma categoria. Podem existir diferentes receitas com  ○ mesmo nome, mas um mesmo cozinheiro não elabora duas receitas com o mesmo nome. Uma categoria é  extraída de uma lista de categorias fixas elaborada pela empresa (Ex: carne, ave, bolo, torta, sopa, etc.). É norma  da empresa não permitir a elaboração de receitas que não pertençam a categorias registradas pela firma, sendo  possível não existirem receitas para categorias recém-criadas. Diversos ingredientes (ex: açúcar, farinha, leite)  são usados para elaborar uma receita, cada um deles usado numa certa quantidade (ex: 2) e numa certa medida  (ex: colher de chá, xícara, ml). A medida pode ser opcional para certos ingredientes (ex: ovo). Uma receita possui  também uma descrição de seu modo de preparação, e o número de porções que rende. Cada ingrediente possui  um nome único e uma descrição, particularmente útil para ingredientes exóticos tais como blachan, kiri ou um  eboshi. Os cozinheiros renomados podem, para efeito de publicidade dos livros, fornecer um nome fantasia, bem como uma lista de restaurantes importantes nos quais já trabalhou. Cada restaurante possui um id que o  identifica, um nome, um endereço e o tipo de sua categoria (por exemplo, luxo, simples, ...). Também, sobre os  restaurantes pretende-se saber os tipos de pratos que são confensionados e os seus respectivo preços bem  como a sua capacidade máxima. Todo cozinheiro deve produzir um certo número de receitas por mês, sendo que  os cozinheiros recém-contratados têm um prazo de até 45 dias para entregar suas primeiras receitas. Receitas  podem ser testadas por degustadores. Cada teste envolve um degustador, é executado numa data, e envolve a  atribuição de uma nota. Podem existir receitas sem teste, mas todo degustador contratado pela firma já executou  pelo menos um teste. A empresa edita livros de receitas, nos quais, obviamente, constam diversas receitas. Essas  receitas podem ou não ser inéditas, ou seja, já terem sido publicadas em outros livros. Além de suas receitas,  cada livro é caracterizado por um título único, um código ISBN (também único), e pelo editor do livro.  
Considerações: o atributo endereço e data precisam ser decompostos. Cada utilizador do sistema deve ter um  nível de acesso que pode ser: Básico - Têm acesso as informações básicas do sistema, Médio - Têm acesso as  informações Média do sistema, Avançado - Têm acesso as informações avançadas do sistema.

Desenvolvido com com amor e dedicação por [Kelson Filipe Dev](https://github.com/kelsonFilipeDev)

## Funcionalidades

- Integração com Laravel Breeze
- Totalmente responsivo
- Autenticação de utilizadores
- Registar:
  - Cozinheiros
  - Degustadores
  - Restaurantes
  - Editores dos livros
  - Receitas
  - Categorias
  - Ingredientes
  - Livros
- Listar receitas por livros
- Listar consultar, alterar, eliminar as entidades acima citados para registo
- Listar os preços e os pratos que são confensionados nos restaurantes que o cozinheiro já trabalhou
- Listar os restaurantes em que cada cozinheiro já trabalhou
- Gerar um relatório em pdf de cada receita e das receitas por cada cozinheiro
- Gerar um ficheiro pdf para cada teste
- Listar e consultar os testes das receitas
- listar os testes por nota em ordem decrescente e crescente
- Listar e consultar todas as receitas feitas (por dia, por semana, por mês)
- Listar e consultar todas as receitas feitas (por dia, por semana, por mês) por Cozinheiros
- Controlar o numero de acessos ao sistema
- Permitir a mudança de senha do funcionário e de nível de acesso
- Painel de administração moderno e intuitivo

## Stack Tecnológica
 
### Frontend
- HTML5
- CSS3
- Tailwind
- JavaScript
- Vue.js

  # Esquema de cores do layout
  - GOLDEN SAND: HEX: #FFE6B4
  - SUNSET AMBER: HEX: #FF9E4F
  - BURNT SIENNA: HEX: #B55233
  - DARK COGNAC: HEX: #5B3228

### Backend
- PHP 8.4.4
- Laravel 10
- Laravel Breeze
- JSON

### Base de Dados
- MySQL

### Ambiente Local
- XAMPP

### Controlo de Versão
- Git & GitHub
