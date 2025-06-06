# Настройка проекта для тестирования

## Запуск docker-compose.yml

Запуск `docker-compsose.yml` необходимо осуществлять в терминале в папке с проектом:

```console
docker-compose up -d
```

> [!IMPORTANT]
> Переименовать .env.example в .env

## Установка зависимостей composer

```console
docker-compose run --rm composer install
```

## Настройка MySql

```console
docker-compose exec -it mysql mysql -u root -p'root'
grant all privileges on *.* to 'laravel'@'%';
flush privileges;
create database test character set utf8 collate utf8_general_ci;
exit;
```

> **Адрес к phpmyadmin:** [**localhost**](http://localhost:81) <br> 
> **Доступ к phpmyadmin:** <br>
> Логин: **laravel** <br>
> Пароль **laravel**

## Изменение прав доступа

```console
docker-compose exec -it php chmod -R 777 .
```

## Запуск мигараций:

```console
docker-compose run --rm artisan migrage
```

## Создание ключенй для Laravel Passport

```console
docker-compose exec -it php php artisan passport:keys
```

## Смена пользователя папки storage

```console
docker-compose exec -it php chown www-data:www-data -R storage
```

## Создание клиента для Laravel Passport

```console
docker-compose exec php php artisan passport:client --personal
```

## Запуск сидеров:

```console
docker-compose run --rm artisan app:run-seeders
```

> [!NOTE]
> В корне лежит дамп базы на всякий случай

# Документацация эндпоинтов

Документация эндпроинтов находистя по адресу: [**localhost/api/docs**](http://localhost/api/docs)

## Устанвока зависииостей Nodejs

docker-compose run --rm nodejs npm install
docker-compose restart nodejs

## Запуск Laravel Reverb

```console
docker-compose exec -it supervisor supervisorctl start all
```

> [!NOTE]
> Команда запустит Laravel Reverb и Laravel Pulse (можно посмотреть работу Reverb'a, а также можно посмотреть логи в файле **storage/logs/supervisor_output.log**).
> Laravel Pulse доступен по адресу [**localhost/pulse**](http://localhost/pulse)

> [!IMPORTANT]
> Посмотреть сами сообещния можно на главной странице [**localhost**](http://localhost:80) (файл **welcome.blade.php**)

Прослушивание события исполнителем с id 2 заказа с id 1:

```js
Echo.private(`order.1.worker.2.notification`).listen(
  "StatusOrderChangedNotification",
  (e) => {
    console.log(e);
  }
);
```

![laravel pulse](/assets/images/pulse.png)

> [!IMPORTANT]
> В файле web.php прописан вход пользователя для главной страницы, дабы подключаться к приватному каналу

## Запуск тестов

```console
docker-compose exec -it php php artisan test
```

Результаты работы тестов:
![Тесты](/assets/images/test.png)
