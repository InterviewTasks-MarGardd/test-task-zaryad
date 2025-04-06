# Тестовое задание для компании "Заряд"

## Требования
Для запуска проекта требуется Docker.

## Клонирование репозитория:
```bush
git clone https://github.com/InterviewTasks-MarGardd/test-task-zaryad.git
cd test-task-zaryad
```

## Сборка и запуск проекта:
```bush
docker compose up --build
```
*Для удобства файл .env уже добавлен в git.*

## Заполнение базы данных
После запуска проекта для заполнения данных в базу данных выполните следующие шаги:

1. Перейти в запущенный образ, например:
```bush
docker compose exec app /bin/bash
```
2. Запустить парсер
```bush
php artisan app:parse-xml-command
```
*P.S. Ссылки на картинки из xml были недоступны, поэтому я заменил их на тестовое изображение. Также, т.к. у некоторых статей не было изображений, я установил им картинку "Нет изображения".*

## Доступ к проекту
```bush
http://localhost:8000/
```
Для просмотра БД доступен pgAdmin (Email: 'admin@example.com', Password: 'admin'):
```bush
http://localhost:8080/
```
