### Иснтрукция по установке приложения
=====================================

### 1. Скачиваем git-репозиторий :
```sh
git clone https://github.com/KAPACNK/immo-tz.git
```

### 2. Переходим в папку с проектом :
```sh
cd immo-tz
```

### 3. Устанавливаем пакеты :
```sh
composer update
```

### 4. Запускаем docker :
```sh
docker-compose up -d 
```

### 5. Устанавливаем права на папку web/assets :
```sh
chmod -R 777 web/assets/
```

### 6. Применяем миграции :
```sh
docker exec -it immo-tz_php_1 php yii migrate
```

### 7. Получаем данные валют :
```sh
docker exec -it immo-tz_php_1 php yii currency/fetch
```

## Проект будет доступен по адрессу http://localhost:8000

### Примеры запросов:

#### Получить список валют с пагинацией 
Запрос:
```
http://localhost:8000/api/currencies?limit=5&offset=10
```
Ответ:
```json
[
    {
        "id": 11,
        "name": "USD",
        "rate": 73.6067,
        "insert_dt": "2020-08-13 15:33:52"
    },
    {
        "id": 12,
        "name": "EUR",
        "rate": 87.0399,
        "insert_dt": "2020-08-13 15:33:52"
    },
    {
        "id": 13,
        "name": "INR",
        "rate": 98.3659,
        "insert_dt": "2020-08-13 15:33:52"
    },
    {
        "id": 14,
        "name": "KZT",
        "rate": 17.5513,
        "insert_dt": "2020-08-13 15:33:52"
    },
    {
        "id": 15,
        "name": "CAD",
        "rate": 55.6026,
        "insert_dt": "2020-08-13 15:33:52"
    }
]
```

#### Получить валюту по id
Запрос:
```
http://localhost:8000/api/currency/20
```
Ответ:
```json
{
    "id": 20,
    "name": "PLN",
    "rate": 19.7963,
    "insert_dt": "2020-08-13 13:39:22"
}
```


