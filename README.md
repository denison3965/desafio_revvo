# Passos para iniciar o projeto

## 1 Inicie os containers Docker:
docker-compose up -d

## 2 Acesse o container principal da aplicação:
docker exec -it app bash

## 3 Instale as dependências do projeto utilizando o Composer:
composer i

## 4 Execute o script de migração para configurar o banco de dados:
php src/config/migration.php

## 5 A aplicação estará disponível na seguinte URL:
http://localhost:8080/api/courses/list.php