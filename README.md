# Настройка проекта для тестирования

## Запуск docker-compose.yml

Запуск `docker-compsose.yml` необходимо осуществлять в терминале в папке с проектом:

```bash
docker-compose up -d
```

## Усановка зависимостей composer
```bash
docker-compose run --rm composer install
```

## Настройка MySql
```bash
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
```bash
docker-compose exec -it php chmod -R 777 .
docker-compse exce -it php chmod 660 storage/oauth-private.key
docker-compse exce -it php chmod 660 storage/oauth-public.key
```

## Запуск сидеров:
```bash
docker-compose run --rm artisan app:run-seeders
```

#