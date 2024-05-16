Claro, aqui está uma versão melhorada do README:

---

# FORMULÁRIO DE ENVIO DE CURRÍCULO

Este projeto consiste em uma aplicação para o envio de currículos (formatos PDF, DOC e DOCX) para o backend. Após o envio, as informações do currículo são armazenadas no banco de dados e, em seguida, é enviado um e-mail contendo os dados do formulário.

Através dessa solução, os usuários podem facilmente submeter seus currículos de forma eficiente, enquanto o sistema automatiza o processo de armazenamento e notificação para os responsáveis pelo recrutamento.

## Tecnologias e Frameworks Utilizados

- **Laravel 11**
- **Vue.js 3**
- **Bootstrap 5**
- **Docker**: Versão 26.1.2 ou superior.
- **PHP**: Versão 8.2.18.
- **Node.js**: Versão 20.13.1.
- **NPM**: Versão 10.5.2.
- **PostgreSQL**: Versão 15.6


## Requisitos

Para executar este projeto, você precisará dos seguintes requisitos:

- **Docker**: Versão 26.1.2 ou superior.
- **PHP**: Versão 8.2.18
- **Composer**: Versão 2.6.6

## Instalação e Configuração

Siga os passos abaixo para instalar e configurar o projeto:

1. Clone o repositório para sua máquina local.
2. Configure o arquivo `.env` na pasta `back` conforme necessário.
3. Execute `composer install` na pasta `back`.
4. (Opcional) Execute `npm install` na pasta `front`. Certifique-se de que o Node.js e o npm estejam na versão utilizada neste projeto ou superior.

## Como Usar

### Utilizando o Docker

1. Na raiz do projeto, execute:

```bash
docker compose build
```

```bash
docker compose up
```

Acesse a aplicação em `http://localhost`.

## Informações Adicionais

- O arquivo `.env.example` contém uma configuração padrão para o arquivo `.env`.
- Os resultados dos testes serão mostrados nos logs do `docker compose up`.

## Testes da Aplicação

Para executar os testes da aplicação, entre no container onde o projeto Laravel está localizado:

```bash
docker exec -it <id_do_container> bash
```

E execute:

```bash
php artisan test
```

## Informações que são salvas no banco de dados
- Nome do Candidato
- Endereço de E-mail
- Número de Telefone
- Cargo Desejado
- Escolaridade
- Observações
- Nome do Anexo Enviado
- Tipo do Anexo Enviado
- Ip do usuário
- Data e Hora do Envio dos dados 
- Data e Hora do Envio do E-mail

## Contribuição

Sinta-se à vontade para contribuir com este projeto através de pull requests. Toda contribuição é bem-vinda!

## Licença

Este projeto está licenciado sob a [Licença MIT](LICENSE).