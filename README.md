# Controle de Fornecedores

Este é um projeto de controle de fornecedores desenvolvido por Arthur Novaes.

## Descrição

Este projeto tem como objetivo criar um sistema de controle de fornecedores para uma empresa. Ele permite cadastrar
novos fornecedores, visualizar fornecedores existentes e realizar outras operações relacionadas à gestão de
fornecedores.

## Funcionalidades

-   Cadastro de fornecedores
-   Visualização de fornecedores cadastrados
-   Edição de informações de fornecedores
-   Exclusão de fornecedores

## Como usar

1. Faça um clone deste repositório:

```bash
git clone https://github.com/arthurssn/controle-de-fornecedores.git
```

2. Navegue até o diretório do projeto:

```bash
cd controle-de-fornecedores
```

3. Copie o arquivo .env.example para .env:

```bash
cp .env.example .env
```

4. Iniciar aplicação:

```bash
docker-compose up --build
```

5. Crie um banco de dados, de prerência chamado 'control'. Se for diferente, altere o arquivo .env.

6. Execute as migrações e semeie o banco de dados:

```bash
docker exec -it serve ash
```

```bash
php artisan migrate
```

```bash
php artisan db:seed
```

7. Instale as dependências do front-end e inicie o servidor de desenvolvimento (Requere Node.js V16+). Use o nvm para instalar a versão correta do Node.js.

```bash:
nvm install 16.15.0
nvm use
```

```bash
npm install
```

```bash
npm run dev
```

8. Acesse a aplicação em seu navegador:

    [http://localhost:8001](http://localhost:8001)
