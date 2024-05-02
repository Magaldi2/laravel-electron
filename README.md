# Login System com ElectronJS

Este repositório contém um sistema de login desenvolvido utilizando **ElectronJS**, **Docker**, **Laravel**, **PHP** e uma API para preenchimento automático de endereços a partir de um CEP fornecido pelo usuário.

## Instruções de Instalação e Execução

### Pré-requisitos

Antes de começar, certifique-se de ter os seguintes pré-requisitos instalados na sua máquina:

- **Docker -> Link para download: https://www.docker.com/products/docker-desktop/** 
- **Node.js -> Link para download: https://nodejs.org/en/download**
- **Git -> Link para download: https://git-scm.com/downloads**

### Passos para Configuração

1. **Clonando o Repositório:**
   ```
   git clone https://github.com/seuusuario/laravel-electron.git
   cd laravel-electron
   ```


2. **Configurando o Ambiente:**

- Abra a pasta `laravel-electron` e vá para o arquivo `.env.example`.
- Faça uma cópia do arquivo e cole na mesma pasta.
- Renomeie o arquivo copiado de `.env.example` para `.env`.
- No arquivo `.env`, altere o campo `DB_PASSWORD=` para `DB_PASSWORD=root`.

3. **Instalando Dependências do Node fora do Container:**
   ```
   npm install
   ```

4. **Criando a Imagem no Docker e Fazendo o Container a Partir da Imagem:**
   ```
   docker compose up -d --build
   ```

5. **Atualizando o Composer e Gerando a Key do Projeto:**
   ```
   docker exec laravel-electron bash -c "composer update && php artisan key:generate"
   ```

6. **Configurando o Banco de Dados:**
   ```
   docker exec laravel-electron bash -c "php artisan migrate --seed"
   ```

7. **Rodando o Server Node e Gerando Build:**
   ```
   docker exec laravel-electron bash -c "npm install && npm run build"
   ```

8. **Rodando o Electron Fora do Container:**
   ```
   npm start
   ```


9. **Acessando a Aplicação:**

- Use as seguintes credenciais para fazer login:
  - **Login Admin:** xastre@admin.com | senha: saopaulo
  - **Login User:** guto@gigantesco.com | senha: password

### Acessando a Aplicação via web:
- Acesse o link Laravel: http://localhost:9000/public
- Acesse o link PHPMyAdmin: http://localhost:9001 (servidor:mysql_db | usuário: root | senha: root)

## Observações

- Certifique-se de seguir as boas práticas de desenvolvimento, como testes unitários, integração contínua, entre outros.
- Se tiver alguma dúvida ou problema, sinta-se à vontade para entrar em contato.

## Repositorio de Baseado para a aplicação Electron
   - ELECTRON-4-PHP de aj-tech -> https://github.com/aj-techsoul/ELECTRON-4-PHP

## Developers
   - Daniel Rossi
   - Leonardo Carbelim
   - Lucas Berti
   - Lucas Magaldi  
   - Matheus Anitelli

