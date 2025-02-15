# Sistema de Agendamento de Livros

## 📖 Sobre o Projeto
O **Sistema de Agendamento de Livros** é uma aplicação Web desenvolvida em PHP, usando o padrão de arquitetura MVC. 
O objetivo é facilitar a gestão de agendamentos de livros em bibliotecas, permitindo que usuários realizem reservas e administradores gerenciem os agendamentos.

## 🚀 Funcionalidades

### 📌 Funcionalidades Gerais:
- Cadastro e login de usuários;
- Visualização dos livros cadastrados no sistema e suas informações;
- Realização do agendamento de livros disponíveis e sua devolução;
- Visualização do histórico de agendamentos;
- Alterar idioma do sistema entre potuguês e inglês

### 📌 Funcionalidades para Administradores:
- Cadastrar novos gêneros e livros no sistema;
- Visualizar todos os agendamentos feitos no sistema;
- Gerenciar todos os usuários cadastrados;
- Excluir livros que ainda não tenham sido agendados;
- Excluir gêneros que não possuam livros vinculados;
- Tornar um livro inativo caso não esteja em agendamento;
- Modificar o título e o gênero dos livros.

## 🛠️ Tecnologias Utilizadas
- **Linguagem:** PHP
- **Banco de Dados:** MySQL
- **Arquitetura:** MVC (Model-View-Controller)

## 📂 Como Executar o Projeto
### 1️⃣ Requisitos:
- PHP instalado no servidor/local
- MySQL ou outro gerenciador de banco de dados compatível
- Servidor local como XAMPP, WAMP ou Docker (opcional)

### 2️⃣ Clonando o Repositório:
```bash
 git clone https://github.com/viniciuscassemira/PHP_MVC_Library.git
 cd PHP_MVC_Library
```

### 3️⃣ Configurando o Banco de Dados:
1. Crie um banco de dados no MySQL.
2. Importe e execute o arquivo `script.sql`localizado na pasta `Database`.
3. Configure as credenciais do banco no arquivo de conexão (`config.php`).

### 4️⃣ Executando o Projeto:
- Após ter configurado a conexão com o banco, execute o seguinte comando em seu terminal na pasta `App`:
  ```bash
  php -S localhost:8000
  ```
  Acesse: `http://localhost:8000`

### 4️⃣ Acessando com usuário Admin:
- O banco que foi criado no 3º passo possui um usuário já cadastrado como Administrador, podendo configurar novos usuários, livros e demais parâmetros com ele.
* Email: admin@admin.com
* Senha: admin@123

## 🤝 Contribuição
Fique à vontade para abrir uma issue ou enviar um pull request com melhorias.
