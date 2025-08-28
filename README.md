# 🍔 CHEF-OPS: Sistema de Gestão de Estoque para Hamburguerias

## 📋 Sobre o Projeto

O **CHEF-OPS** é um sistema web desenvolvido para resolver o problema de gestão de insumos e análise de consumo em hamburguerias. A ferramenta permite que o gerente realize a contagem diária de estoque, registre pedidos de fornecedores e utilize dados analíticos para otimizar as operações e reduzir o desperdício. Eu (Caio Henrique Mota Cuadra) autor do sistema, tive essa ideia pois muitos sistemas têm um algoritmo de "controle de estoque", porém nenhum que vi se tornou efetivo a ponto de que possamos inserir nossas contagens e o sistema fazer os cálculos de consumo. Dessa forma que fiz podemos tratar de contagens que nós mesmos fazemos e registrando pedidos que realmente fazemos, trazendo assim, uma média assertiva e concreta.

É RECOMENDADO QUE PARA INSERIR NÚMEROS QUEBRADOS COMO 0.5 VOCÊ USE O '.' E NÃO ','!! OU SEJA: INSIRA 0.5 AO INVÉS DE 0,5!

Este projeto foi desenvolvido como uma solução para um problema de negócio real, demonstrando habilidades de arquitetura de software, lógica de negócio e análise de dados.

## ✨ Funcionalidades Principais

* **Registro de Contagem de Estoque:** Inserção diária da quantidade de cada insumo no estoque.
* **Gestão de Insumos:** Cadastro e controle dos itens de estoque (carne, pão, queijo, etc.).
* **Controle de Pedidos:** Registro de novos pedidos de fornecedores com data de chegada.
* **Análise de Dados Inteligente:** Algoritmo que calcula a média de consumo de cada insumo (diária, semanal, mensal) para auxiliar na tomada de decisão.

## 🛠️ Tecnologias Utilizadas

* **Linguagem:** PHP 8.x
* **Banco de Dados:** MySQL
* **Estrutura:** HTML, CSS, JavaScript (para a interface do usuário)
* **Arquitetura:** Padrão MVC (Model-View-Controller)
* **Gerenciamento de Versão:** Git e GitHub

## 🚀 Como Rodar o Projeto

Siga os passos abaixo para ter uma cópia do projeto em seu ambiente local:

**1. Clone o Repositório:**

git clone [https://github.com/caiocuadra/SISTEMA-CHEFOPS.git](https://github.com/caiocuadra/SISTEMA-CHEFOPS.git)

**2. Configure o Servidor Local:**

Certifique-se de ter um ambiente de servidor local como XAMPP ou Laragon. Coloque a pasta do projeto no diretório htdocs ou www.

**3. Configure o Banco de Dados:**

Crie um banco de dados MySQL com o nome de sua preferência.

Importe o arquivo sql_schema.sql  usando o phpMyAdmin ou outra ferramenta.

Atenção: Se o arquivo config.php ou MySql.php contiver credenciais, preencha-as corretamente com as suas.

**4. Acesse o Sistema:**

Abra seu navegador e acesse a URL do projeto (ex: http://localhost/SISTEMA-CHEFOPS/).

👨‍💻 Autor
Caio Henrique Mota Cuadra

GitHub - https://github.com/caiocuadra

LinkedIn - https://www.linkedin.com/in/caio-cuadra-b219a0262/?originalSubdomain=br

E-mail - caiocuadra10@gmail.com
