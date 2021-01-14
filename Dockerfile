FROM node:alpine as build
LABEL maintainer="Bamdad Sabbagh <devops@bamdadsabbagh.com>"

ENV NODE_ENV=production
WORKDIR /app

COPY package.json tsconfig.json package-lock.json ./
RUN npm i
RUN npm i typescript @types/node

COPY . ./
RUN npm run build

# runtime
FROM node:alpine
LABEL maintainer="Bamdad Sabbagh <devops@bamdadsabbagh.com>"

ENV NODE_ENV=production
WORKDIR /app

COPY --from=build /app/dist /app/dist
COPY --from=build /app/node_modules /app/node_modules

EXPOSE 3000

USER node
CMD ["node", "/app/dist/app.js"]
