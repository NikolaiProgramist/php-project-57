setup:
	composer install
	cp .env.example .env
	php artisan key:generate
	php artisan migrate --force
	php artisan db:seed
	npm ci
	npm run build
	php artisan serve --host=0.0.0.0 --port=$PORT

test:
	composer exec --verbose phpunit tests

test-coverage:
	XDEBUG_MODE=coverage composer exec --verbose phpunit tests -- --coverage-clover build/logs/clover.xml

test-coverage-text:
	XDEBUG_MODE=coverage composer exec --verbose phpunit tests -- --coverage-text

lint:
	./vendor/bin/pint app routes tests --test
