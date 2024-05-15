FROM node:20.13.1-alpine as build-stage

WORKDIR /app

COPY package*.json ./ 

RUN npm install

COPY . .

RUN npm run build

# Etapa de produção
FROM nginx:1.26.0-alpine as production-stage

# Copiar arquivos de construção para o diretório do servidor Nginx
COPY --from=build-stage /app/dist /usr/share/nginx/html

# Expor a porta 80
EXPOSE 80

# Iniciar o Nginx
CMD ["nginx", "-g", "daemon off;"]
