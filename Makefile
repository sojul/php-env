DIR := ${CURDIR}

build:
	docker-compose build --no-cache

up:
	docker-compose up

install: build up

start:
	docker-compose start

stop:
	docker-compose stop

destroy: stop
	docker-compose down

config:
	docker-compose config

bash:
	docker-compose exec php /bin/bash

mysql:
	docker-compose exec mysql mysql -upoe -p

shell:
	docker-compose exec php /usr/local/bin/php -a

autoload:
	docker-compose exec php composer dump-autoload