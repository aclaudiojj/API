## Instalação 

Primeiro de tudo instale o docker and docker-compose.

Depois disso, siga os passos:

1. docker-compose up -d
2. docker exec -ti app bash
3. composer install
4. php artisan migrate

Projeto pode ser acessado em http://localhost/api/shoes

## APIs

- GET http://localhost/api/shoes
  - Lista de todos os dados cadastrados no recurso.
- GET http://localhost/shoes/{ID} 
  - Lista um específico registro do recurso.
- POST http://localhost/api/shoes
  - Cadastra um registro específico no recurso. Os dados expostsos para o recurso são `brand`, `color` e `size`, sendo todos texto.
- PUT http://localhost/api/shoes/{ID}
  - Atualiza um registro específico no recurso. Os dados expostsos para o recurso são `brand`, `color` e `size`, sendo todos texto.
- DELETE http://localhost/api/shoes/{ID}
  - Remove um registro específico do recurso.
- GET http://localhost/shoes/list
  - Identidade visual com os dados cadastrados no recurso.
