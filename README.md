===========================
PROJETO: Lista de Filmes Favoritos
===========================

👤 Alunos:
- Nome do Aluno 1
- Nome do Aluno 2 (se houver)

📌 Tema:
Sistema de Cadastro de Filmes Favoritos com Login de Usuário

📄 Resumo do Funcionamento:
Este projeto permite que um usuário se cadastre no banco de dados com nome de usuário e senha, acesse uma área restrita e crie sua própria lista de filmes favoritos.

Funcionalidades:
- Login com verificação de senha.
- Tela restrita onde é possível adicionar nomes de filmes à sua lista.
- Listagem dos filmes cadastrados por usuário.
- Remoção de filmes da lista.
- Proteção de páginas por sessão.
- Logout.

🔑 Usuário/Senha para Teste:
Usuário: admin  
Senha: 123 (senha criptografada com md5 no banco)

⚙️ Instalação do Banco de Dados:

1. Abra o **phpMyAdmin** (ex: via XAMPP).

2. Em seguida, clique em **Importar** e selecione o arquivo `bd_login.sql` incluso neste repositório.

3. Após a importação, o banco estará pronto com:
   - Tabelas: `tb_usuarios`, `tb_filmes`
   - Usuário de teste: `admin`, senha `1234`

4. Verifique se o arquivo `conexao.php` está configurado corretamente com:

```php
$servidor = "localhost:3307";
$usuario = "root";
$senha = ""; // geralmente em branco no XAMPP
$banco = "bd_login";
