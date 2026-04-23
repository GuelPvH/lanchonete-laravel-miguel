FROM node:20

COPY package*.json ./

WORKDIR /lanchonete

RUN apt-get update

RUN apt-get install npm -y

RUN npm init -y

RUN npm install 

RUN npm install vite 

EXPOSE 5173

CMD ["npm", "run", "dev"]