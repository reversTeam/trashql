.PHONY: up down console composer npm
P=""

restart: down up

up:
	docker-compose up -d --build

down:
	docker-compose down

console:
	docker-compose run --user=1000 php bin/console $(P)

composer:
	docker-compose run --user=1000 php composer $(P)

test:
	docker-compose run --user=1000 php ./vendor/bin/phpunit $(P)

bash:
	docker-compose exec --user=1000 api bash

ps:
	docker-compose ps
