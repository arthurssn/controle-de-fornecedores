# Controle de Fornecedores

Este é um projeto de controle de fornecedores desenvolvido por Arthur Novaes.

## Descrição

Este projeto tem como objetivo criar um sistema de controle de fornecedores para uma empresa. Ele permite cadastrar
novos fornecedores, visualizar fornecedores existentes e realizar outras operações relacionadas à gestão de
fornecedores.

## Funcionalidades

- Cadastro de fornecedores
- Visualização de fornecedores cadastrados
- Edição de informações de fornecedores
- Exclusão de fornecedores

## Como usar

1. Faça um clone deste repositório:

```bash
git clone https://github.com/arthurssn/controle-de-fornecedores.git
```

2. Navegue até o diretório do projeto:

```bash
cd controle-de-fornecedores
```

3. Iniciar aplicação:

```bash
docker-compose up --build
```

4. Configure um banco de dados:

```bash
docker exec -it app_db psql -U postgres -d postgres
```

```bash
CREATE DATABASE control
```

5. Copie o arquivo .env.example para .env:

```bash
cp .env.example .env
```

6. Execute as migrações e semeie o banco de dados:

```bash
docker exec -it serve ash
```

```bash
php artisan migrate
```

```bash
php artisan seed
```

7. Instale as dependências do front-end e inicie o servidor de desenvolvimento:

```bash
npm install
```

```bash
npm run dev
```

8. Acesse a aplicação em seu navegador:

   [http://localhost:8001](http://localhost:8001)
