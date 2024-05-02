**Repositório GitHub: Login System com ElectronJS**

Este repositório contém um sistema de login desenvolvido utilizando ElectronJS, Docker, Laravel, PHP, e uma API para preenchimento automático de endereços a partir de um CEP fornecido pelo usuário.

**Instruções de Instalação e Execução:**

1. **Pré-requisitos:**
   - Docker instalado na sua máquina.
   - Git instalado na sua máquina.

2. **Clonando o Repositório:**
  ```
  - git clone https://github.com/seu-usuario/login-system-electron.git
  - cd login-system-electron
  ```

3. **Configurando o Ambiente:**
- Renomeie o arquivo `.env.example` para `.env` e altere o campo `DB_PASSWORD=` para `DB_PASSWORD=root`.
- Execute o comando para criar a imagem no Docker e fazer o container a partir da imagem:
  ```
  docker compose up -d --build
  ```

4. **Atualizando o Composer e Gerando a Key do Projeto:**
  ```
  docker exec laravel-electron bash -c "composer update && php artisan key:generate"
  ```

5. **Configurando o Banco de Dados:**
  ```
  docker exec laravel-electron bash -c "php artisan migrate --seed"
  ```

6. **Executando a Aplicação:**
- Abra o navegador e acesse o link Laravel: [http://localhost:9000/public](http://localhost:9000/public)
- Acesse o link PHPMyAdmin para gerenciar o banco de dados: [http://localhost:9001](http://localhost:9001)

7. **Desenvolvimento:**
- O código fonte do sistema está na pasta `src`.
- Desenvolva as funcionalidades conforme necessário, seguindo as melhores práticas de desenvolvimento e testes.

8. **API de Preenchimento Automático de Endereço:**
- Utilize a API fornecida para preencher automaticamente o endereço a partir do CEP fornecido pelo usuário durante o cadastro.

**Repositório de Referência:**
- [Link para o Repositório no GitHub](https://github.com/seu-usuario/login-system-electron)

**Observações:**
- Certifique-se de seguir as boas práticas de desenvolvimento, como testes unitários, integração contínua, entre outros.
- Qualquer dúvida ou problema, sinta-se à vontade para entrar em contato.
