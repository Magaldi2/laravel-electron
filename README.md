# Login System com ElectronJS

Este repositório contém um sistema de login desenvolvido utilizando:
- <img src="https://static-00.iconduck.com/assets.00/electron-icon-472x512-8swdbwbh.png" alt="ElectronJS" width="24" height="24"> **ElectronJS** : Framework para criar aplicativos de desktop multiplataforma usando tecnologias web (HTML, CSS e JavaScript).
- <img src="https://static-00.iconduck.com/assets.00/docker-icon-icon-2048x1479-cres2he9.png" alt="Docker" width="24" height="24"> **Docker** : Plataforma para desenvolver, enviar e executar aplicativos em contêineres.
- <img src="https://static-00.iconduck.com/assets.00/laravel-icon-497x512-uwybstke.png" alt="Laravel" width="24" height="24"> **Laravel** : Framework PHP para desenvolvimento de aplicativos web robustos e escaláveis.
- <img src="https://cdn-icons-png.flaticon.com/512/5968/5968332.png" alt="PHP" width="24" height="24"> **PHP** : Linguagem de programação amplamente usada para desenvolvimento web.
- <img src="https://www.svgrepo.com/show/303251/mysql-logo.svg" alt="MySQL" width="24" height="24"> **MySQL** : Sistema de gerenciamento de banco de dados relacional.
- E uma API para preenchimento automático de endereços a partir de um CEP fornecido pelo usuário.



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

### Testes
- Para rodar os teste basta usar o seguitne código:
   ```
   docker exec laravel-electron bash -c "php artisan test"
   ```

### Acessando a Aplicação via web:
- Acesse o link Laravel: http://localhost:9000/public
- Acesse o link PHPMyAdmin: http://localhost:9001 (servidor:mysql_db | usuário: root | senha: root)

## Observações

- Certifique-se de seguir as boas práticas de desenvolvimento, como testes unitários, integração contínua, entre outros.
- Se tiver alguma dúvida ou problema, sinta-se à vontade para entrar em contato.

## Repositorio Baseado para a aplicação ElectronJS junto com PHP
   - ELECTRON-4-PHP de aj-tech -> https://github.com/aj-techsoul/ELECTRON-4-PHP

## Developers
   - Daniel Rossi
     - GitHub -> https://github.com/danirso
   - Leonardo Carbelim
     - GitHub ->  https://github.com/LevvonDev
   - Lucas Berti
     - GitHub -> https://github.com/Bertidev
   - Lucas Magaldi
     - GitHub -> https://github.com/MAgalDI02
   - Matheus Anitelli
     - GitHub -> https://github.com/mttue7

