init: docker-up composer-install migrate

docker-up:
	docker-compose up -d --build

down:
	docker-compose down --remove-orphans

migrate:
	docker-compose exec php-cli composer console migrations:migrate

composer-install:
	docker-compose exec php-cli composer install

list_console_commands:
	docker-compose exec php-cli composer console
