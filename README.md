# Cadastro de Usuários

Este é o meu Cadastro de Usuários para o Desafio Técnico. 

Este projeto roda sobre uma estrutura Docker. 

Certifique-se de ter o Docker e o Docker Compose instalados em seu sistema antes de prosseguir.

Siga as instruções abaixo:

## Configuração do Ambiente

### **Execute os seguintes comandos para baixar o repositório e executar as instâncias docker:**
    ```
    https://github.com/lucymary-am/caduser.git
    cd caduser
    cp .env.example .env
    docker compose up -d --build
    ```

- Aguarde a instalação e execução das migrations para começar!

## Acessando a aplicação
Acesse a aplicação a partir da URL: [http://localhost:8000](http://localhost:8000)


## Testes

Para executar testes, utilize o seguinte comando:
   ```bash
   docker exec caduser-app php artisan test
   ```
