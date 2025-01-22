# Cadastro de Usuários

Este é o meu Cadastro de Usuários para o Desafio Técnico. 

Este projeto roda sobre uma estrutura Docker. 

Certifique-se de ter o Docker e o Docker Compose instalados em seu sistema antes de prosseguir.

Siga as instruções abaixo:

## Configuração do Ambiente

### **Faça o clone do repositório:**
    ```bash
    https://github.com/lucymary-am/caduser.git
    cd caduser
    ```

### **Renomeie o arquivo `.env.example` para `.env`:**
    ```bash
    cp .env.example .env
    ```

### **Build e rode instâncias Docker:**
    ```bash
    docker compose up -d --build
    ```

- Este comando irá construir as imagens necessárias e iniciar os contêineres.
- Aguarde a instalação e execução das migrations para começar!

## Acessando a aplicação
Acesse a aplicação em: [http://localhost:8000](http://localhost:8000)


## Executando Testes

Para executar testes, utilize o seguinte comando:
   ```bash
   docker exec caduser-app php artisan test
   ```
