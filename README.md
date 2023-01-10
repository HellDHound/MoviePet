# MoviePet
Мини-проект собран на апи https://kinopoisk.dev. Верстка практически полностью взята из интернета, за исключением некоторых правок и js скриптов, связанных с ajax. 

В папке application/migrations расположен файл .sql с необходимыми для работы проекта таблицами в бд. 

После создания таблиц будет необходимо запустить наполнение основной базы фильмов (взяты все фильмы за последние 3 года). Для этого создан скрипт application/core/database_filler_starter.php , который проверяет последнюю дату обновления бд в таблице и, если с даты последнего обновления прошла неделя, запускает обновление предполагается последующая установка запуска этого скрипта на крон в ночное(наименее активное) время. Основной скрипт отвечающий за обновление базы - application/models/database_filler_model.php.

На сайте реализованы механизмы: авторизации, регистрации, смены пароля(из лк пользователя) и механизм выхода из аккаунта. При авторизации в $_SESSION делается запись с основными данными пользователя. Заа данный функционал отвечает application/controllers/controller_registration.php и application/models/user_model.php. Также реализована возможность добавления фильмов в избранное.

Для корректной работы необходимо задать данные для подключения к вашей бд в application/helpers/database_data_helper.php.

Ключи для работы google recaptcha сгенерированы на домен moviepet.

Конфиг, на котором все запускалось в Open Server: 
  HTTP - Apache_2.4-PHP_7.2-7.4 |
  PHP - 7.2 |
  MySQL/MariaDB - MySQL-8.0-Win10 |
  PostgreSQL - не использовать |
  MongoDB - не использовать |
  Memcached - не использовать |
  Redis - не использовать |
  DNS - не использовать
