# API PHP Puro - Exemplo de Construção de API com PHP

Este é um exemplo de construção de uma API simples utilizando PHP puro. A API permite consultar, criar, atualizar e excluir campanhas, usando autenticação de token Bearer para segurança. 

## Instruções de Uso

1. **Configuração do Banco de Dados**

   - Crie um banco de dados MySQL local com o nome `api`.
   - Importe o dump do banco de dados a partir do arquivo `api.sql`.

2. **Obtenção do Access Token**

   - Para utilizar os métodos da API, é necessário obter um access token.
   - Acesse `{url_localhost}/public_html/api/apiKey` usando o método GET para obter a chave da API.
   - Em seguida, utilize a chave obtida para acessar `{url_localhost}/public_html/api/token` via método POST e passando a chave no corpo da requisição para receber o token.

3. **Endpoints da API**

   - **Obter Dados de uma Campanha por ID:**

     ```
     {url_localhost}/public_html/api/campanha/{ID}
     Método: GET
     Parâmetros: ID da campanha
     Retorno: JSON com dados da campanha
     ```

   - **Obter Dados de Todas as Campanhas:**

     ```
     {url_localhost}/public_html/api/campanha/
     Método: GET
     Retorno: JSON com dados de todas as campanhas
     ```

   - **Deletar uma Campanha por ID:**

     ```
     {url_localhost}/public_html/api/campanha/{ID}
     Método: DELETE
     Parâmetros: ID da campanha
     Retorno: JSON com mensagem de sucesso ou erro
     ```

   - **Criar uma Nova Campanha:**

     ```
     {url_localhost}/public_html/api/campanha
     Método: POST
     Parâmetros do Corpo: JSON contendo os dados da campanha
     Retorno: JSON com mensagem de sucesso ou erro
     ```

   - **Atualizar uma Campanha por ID:**

     ```
     {url_localhost}/public_html/api/campanha/{ID}
     Método: PUT
     Parâmetros do Corpo: JSON contendo os dados da campanha
     Retorno: JSON com mensagem de sucesso ou erro
     ```

4. **Testes**

   - Utilize o arquivo `teste_postman.json` com testes pré-configurados no Postman.
   - Faça as chamadas conforme necessário e verifique as respostas.

## Testes Unitários

- rodar no terminal da raiz do projeto: vendor/bin/phpunit Test
- Implementar classes de testes unitários dentro da pasta Test
- Classe CampanhaTest implementada pra alguns testes

## Melhorias Futuras

- Implementação da API com um framework, como o Laravel, para melhor organização e escalabilidade.
- Implementação de testes unitários utilizando PHPUnit para garantir a qualidade do código.

Sinta-se à vontade para clonar e personalizar este exemplo de API de acordo com suas necessidades. Para sugestões e melhorias, fique à vontade para contribuir para este repositório.
