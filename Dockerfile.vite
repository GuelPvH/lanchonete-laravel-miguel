FROM node:20

WORKDIR /lanchonete

COPY package*.json ./

RUN apt-get update 

RUN apt-get install npm -y

RUN npm init -y 

RUN npm install vite

EXPOSE 5173

COPY . .

CMD ["npm", "run", "dev"]