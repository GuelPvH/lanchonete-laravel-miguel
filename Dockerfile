FROM php

RUN apt-get updadte

RUN apt-get install nodejs npm -y

RUN npm install vite -y

