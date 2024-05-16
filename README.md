# FORMULÁRIO DE ENVIO DE CURRÍCULO

Este projeto consiste em uma aplicação para o envio de currículos em formato PDF para um backend. Após o envio, as informações do currículo são armazenadas no banco de dados e, em seguida, é enviado um e-mail contendo os dados do formulário.

Através dessa solução, os usuários podem facilmente submeter seus currículos de forma eficiente, enquanto o sistema automatiza o processo de armazenamento e notificação para os responsáveis pelo recrutamento.

Esta aplicação é útil para simplificar o processo de recrutamento, oferecendo uma maneira rápida e conveniente para os candidatos submeterem seus currículos e para os recrutadores receberem e processarem essas informações de maneira organizada.



## Tecnologias e Frameworks Utilizados

- **Laravel 11**
- **Vue.js 3**
- **Bootstrap 5**
- **Docker**: Versão 26.1.2 ou superior.
- **PHP**: Versão 8.2.18.
- **Node.js**: Versão 20.13.1.
- **NPM**: Versão 10.5.2.
- **Postgresql**: versão 15.6

## Requisitos

- **Docker**: Versão 26.1.2 ou superior.
- **PHP**: Versão 8.2.18
- **Composer**: Versão 2.6.6

## Instalação e Configuração

Para instalar e configurar o projeto, siga os passos abaixo:

1. Clone o repositório para sua máquina local.
2. Configure o `.env` da pasta `back` de ambiente conforme necessário.
3. Faça `composer install` na pasta `back`
4. (Opicional) Faça `npm install` na pasta `front`. É nescessário o node e o npm na versão utilizada nesse projeto ou superior.

## Como Usar

### Utilizando o [Docker](https://docs.docker.com/engine/)

- Na raiz do projeto faça:

```bash
docker compose build
```

```bash
docker compose up
```

Acesse a aplicação em `http://localhost`.

## Informações

- O Arquivo `.env.example` demonstra uma configuração padrão.

## Testes da Aplicação

Para executar os testes da aplicação entre no container onde esta o projeto laravel e faça

```bash
php artisan test
```

## Contribuição

Sinta-se à vontade para contribuir com este projeto através de pull requests. Qualquer contribuição é bem-vinda!

## Licença

Este projeto está licenciado sob a [MIT License](LICENSE).