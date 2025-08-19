PORT ?= 8000

start:
	php artisan serve --host=0.0.0.0 --port=$(PORT)

setup-docker:
	make install
	cp .env.example .env
	php artisan key:generate
	npm ci
	npm run build

setup:
	make install
	cp .env.example .env
	touch database/database.sqlite
	php artisan key:generate
	php artisan migrate:fresh --force --seed
	npm ci
	npm run build
	make start

install:
	composer install

test:
	composer exec --verbose phpunit tests

test-coverage:
	XDEBUG_MODE=coverage composer exec --verbose phpunit tests -- --coverage-clover build/logs/clover.xml

test-coverage-text:
	XDEBUG_MODE=coverage composer exec --verbose phpunit tests -- --coverage-text

lint:
	./vendor/bin/pint app routes tests --test
