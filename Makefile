init: down up composer-install

up:
	docker compose up -d --build

down:
	docker compose down --remove-orphans

composer-install:
	docker compose exec php-cli composer install

cs-fix:
	docker compose exec php-cli vendor/bin/php-cs-fixer fix

cs-check:
	docker compose exec php-cli vendor/bin/php-cs-fixer fix --diff

phpstan-check:
	docker compose exec php-cli vendor/bin/phpstan analyse

clear-cache:
	rm -rf var/cache/.phpstan var/cache/.phpunit.cache && rm var/cache/php-cs-fixer.cache

composer-validate:
	docker compose exec php-cli composer validate

test:
	docker compose exec php-cli vendor/bin/phpunit --colors=always
