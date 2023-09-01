# api_php_puro
Construção de uma API implementando com PHP puro

++Instruções de uso+++

Cria um banco local no Mysql com os dados com o seguinte comand: 

CREATE DATABASE `api` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */

Importar o dum do arquivo:  api.sql

Utilizando a Api:

Para utilizar o método de consultar as campanhas deve-se obter o access token:
{url_localhost}/public_html/api/apiKey :
    método GET 
    busca a key para buscar o token

{url_localhost}/public_html/api/token : 
    método POST 
    busca o access para válido para consultar a api
    parametros body: api_key : contendo api key válida

{url_localhost}/public_html/api/campanha/{ID} : 
    método GET 
    busca os dados de uma campanha com id
    parametros: id da campanha
    retorno: json com dados da campanha

{url_localhost}/public_html/api/campanha/: 
    método GET 
    busca os dados de todas as campanhas da base
    retorno: json com dados da campanha


{url_localhost}/public_html/api/campanha/{ID}: 
    método DELETE 
    deleta uma campanha informando o id
    retorno: json mensagem de sucesso ou erro

{url_localhost}/public_html/api/campanha: 
    método POST 
    Cria uma campanha
    parametros do body: json contendo os dados da campanha
    retorno: json mensagem de sucesso ou erro

{url_localhost}/public_html/api/campanha/{ID}: 
    método PUT 
    altera os dadoe de uma campanha informando o id
    parametros do body: json contendo os dados da campanha
    retorno: json mensagem de sucesso ou erro


Testes via postman: utilizar o arquivo teste_postman.json com os testes prontos bastando mudar as chamadas e verificar os retornos.

Melhorias:
Implementar com um framework utilizando rotas exemplo: Laravel
Implementar testes unitário com PHPUnit

