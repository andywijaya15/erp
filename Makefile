.PHONY: fresh seed migrate

fresh:
	php artisan migrate:fresh --seed

migrate:
	php artisan migrate

seed:
	php artisan db:seed

pint:
	./vendor/bin/pint