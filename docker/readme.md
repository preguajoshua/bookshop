
# Docker Commands

```sh
# Start container
$ docker-compose up -d

# Stop container
$ docker-compose down
```


```sh
# Rebuild image
$ cd bookshop
$ docker build --no-cache --tag bookshop/app:latest --file docker/app/Dockerfile .
```
