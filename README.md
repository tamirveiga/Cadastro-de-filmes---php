# PROJETO: Lista de Filmes Favoritos

# 👤 Alunos:
- Eduarda Gonçalves
- Tamires Rodrigues da Veiga

# 📄 Resumo do Funcionamento:
Este projeto permite que um usuário se cadastre no banco de dados com nome de usuário e senha, acesse uma área restrita e crie sua própria lista de filmes favoritos.

## 🔧 Funcionalidades
- Login com verificação de senha.
- Tela restrita onde é possível adicionar nomes de filmes à sua lista.
- Listagem dos filmes cadastrados por usuário.
- Remoção de filmes da lista.
- Proteção de páginas por sessão.
- Logout.

Usuário/Senha para Teste:

Usuário: admin  
Senha: 1234

## ⚙️ Instalação do Banco de Dados

### 🔁 Opção 1: Importar o banco já pronto

1. Abra o **phpMyAdmin** (ex: via XAMPP).
2. Clique em **"Novo"** e crie um banco chamado `bd_login`.
3. Com o banco `bd_login` selecionado, clique na aba **"Importar"**.
4. Selecione o arquivo `bd_login.sql` incluído neste repositório e clique em **Executar**.
5. Pronto! O banco será criado com:
   - Tabelas: `tb_usuario`, `tb_filmes`
   - Usuário de teste: `admin`, senha `1234`

---

### 🧱 Opção 2: Criar manualmente pelo phpMyAdmin

1. Abra o **phpMyAdmin** e clique em **"Novo"**.
2. Crie um banco chamado `bd_login`.

#### Tabela: `tb_usuario`
- Colunas:
  - `id` (INT, Auto Increment, PRIMARY KEY)
  - `usuario` (VARCHAR 100)
  - `senha` (VARCHAR 255)

#### Tabela: `tb_filmes`
- Colunas:
  - `id_filme` (INT, Auto Increment, PRIMARY KEY)
  - `filme` (VARCHAR 255)
  - `usuario_id` (INT, chave estrangeira)

3. Após criar as tabelas, vá até a aba **"Relações"** da tabela `tb_filmes` e defina `usuario_id` como **chave estrangeira**, relacionada ao campo `id` da tabela `tb_usuario`.

---

## 🔌 Conexão com o Banco de Dados

Verifique se o arquivo `conexao.php` está configurado corretamente com os dados do seu servidor local (XAMPP padrão):

```php
$servidor = "localhost:3307";
$usuario = "root";
$senha = ""; // geralmente em branco no XAMPP
$banco = "bd_login";
