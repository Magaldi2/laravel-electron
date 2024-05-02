**Repositório GitHub: Login System com ElectronJS**

Este repositório contém um sistema de login desenvolvido utilizando ElectronJS, Docker, Laravel, PHP, e uma API para preenchimento automático de endereços a partir de um CEP fornecido pelo usuário.

**Instruções de Instalação e Execução:**

1. **Pré-requisitos:**
   - Docker instalado na sua máquina.
   - Node.js instalado na sua máquina.
   - Git instalado na sua máquina.

2. **Clonando o Repositório:**
   ```
   git clone https://github.com/seu-usuario/login-system-electron.git
   cd login-system-electron
   ```

3. **Configurando o Ambiente:**
- Renomeie o arquivo `.env.example` para `.env` e altere o campo `DB_PASSWORD=` para `DB_PASSWORD=root`.

4. **Instalando Dependências do Node fora do Container:**
   ```
   npm install
   ```

5. **Criando a Imagem no Docker e Fazendo o Container a Partir da Imagem:**
   ```
   docker compose up -d --build
   ```

6. **Atualizando o Composer e Gerando a Key do Projeto:**
   ```
   docker exec laravel-electron bash -c "composer update && php artisan key:generate"
   ```

7. **Configurando o Banco de Dados:**
   ```
   docker exec laravel-electron bash -c "php artisan migrate --seed"
   ```

8. **Rodando o Server Node e Gerando Build:**
   ```
   docker exec laravel-electron bash -c "npm install && npm run build"
   ```

9. **Rodando o Electron Fora do Container:**
   ```
   npm start
   ```

10. **Acessando a Aplicação:**
 - Use as seguintes credenciais para fazer login:
   - **Login Admin:** xastre@admin.com | senha: saopaulo
   - **Login User:** guto@gigantesco.com | senha: password
 - Acesse o link Laravel: [http://localhost:9000/public](http://localhost:9000/public)
 - Acesse o link PHPMyAdmin: [http://localhost:9001](http://localhost:9001) (servidor:mysql_db | usuário: root | senha: root)

**Observações:**
- Certifique-se de seguir as boas práticas de desenvolvimento, como testes unitários, integração contínua, entre outros.
- Qualquer dúvida ou problema, sinta-se à vontade para entrar em contato.
