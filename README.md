
# Project Starter

These instructions will guide you in creating a new Laravel project in Docker.


## 1. Getting installed:

### Pull down a fresh copy of Laravel

```sh
$ cd bookstore
$ git clone https://github.com/laravel/laravel.git project && rm -rf project/.git
```


### Build the Docker image

```sh
$ cd bookshop
$ docker build --no-cache --tag bookshop/app:latest --file docker/app/Dockerfile .
```


### Run the container

```sh
$ docker-compose up -d
```


## 2. Container setup

All of the following commands are run from the app container.


### Update composer library

```sh
$ composer update
```




### Laravel config

```sh
$ composer run-script post-root-package-install
$ composer run-script post-create-project-cmd
$ composer run-script post-autoload-dump
```
