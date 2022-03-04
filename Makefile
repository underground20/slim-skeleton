init: docker-up composer-install

docker-up:
	docker-compose up -d --build

down:
	docker-compose down --remove-orphans

composer-install:
	docker-compose exec php-cli composer install

list_console_commands:
	docker-compose exec php-cli composer console
