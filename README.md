API backend para gerenciamento de competições de karatê.
O sistema tem como objetivo automatizar processos de competições,
substituindo o controle manual por uma solução simples e organizada.


Funcionalidades
- Autenticação de usuários com Laravel Sanctum
- Proteção de rotas com middleware
- CRUD de competições
- Estrutura preparada para expansão (atletas, categorias e chaveamento)
  

Tecnologias
- PHP
- Laravel
- MySQL
- Laravel Sanctum


Como rodar o projeto:
1. Clonar o repositório
2. Instalar dependências:
   composer install
3. Configurar o .env
4. Rodar as migrations:
   php artisan migrate
5. Iniciar servidor:
   php artisan serve


Status:

Projeto em desenvolvimento.


Próximos passos:
- Cadastro de atletas
- Categorias
- Geração de chaveamento automático
