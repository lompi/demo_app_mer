.PHONY: install
install: build-docker composer docker-up git-hooks

.PHONY: git-hooks
git-hooks:
	docker-compose run --rm --no-deps php php ./vendor/bin/grumphp git:init

.PHONY: composer
composer:
	docker-compose run --no-deps --rm php composer install

.PHONY: build-docker
build-docker:
	docker-compose build

.PHONY: docker-up
docker-up:
	docker-compose up -d

.PHONY: docker-down
docker-down:
	docker-compose down

.PHONY: attach
attach: docker-up
	docker-compose exec php sh

.PHONY: cs-fixer
cs-fixer:
	docker-compose run --rm --no-deps php ./vendor/bin/php-cs-fixer fix --config=.php_cs --allow-risky=yes

.PHONY: grumphp
grumphp: prepare-test-env
	docker-compose run --rm --no-deps php php -d memory_limit=-1 vendor/bin/grumphp run

.PHONY: prepare-test-env
prepare-test-env:
	docker-compose run --rm php bin/console -n --env=test cache:clear

.PHONY: test
test:
	docker-compose run php vendor/bin/simple-phpunit
