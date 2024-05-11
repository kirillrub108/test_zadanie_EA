Не смог стянуть данные со stocks, потому что запрос 11 мая возвращал пустой массив data.

# Стягивание данных производится командой "php artisan fetch:data --dateFrom= --dateTo=", после равно нужно указать дату в формате Y-m-d.
Стянул не всё как просили, потому что размер БД на бесплатном хостинге только 5GB.

# Данные для подключения БД:
- Server: sql11.freemysqlhosting.net
- Name: sql11705692
- Username: sql11705692
- Password: nRCybw5Hac
- Port number: 3306

# После создания файла .env, выполнения команд "composer install" и "docker-compose up -d" в файловой системе linux может потребоваться выполнение команды "sudo chmod 777 -R ./"

