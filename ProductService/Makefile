build:
	sudo docker compose build --no-cache
stop:
	sudo docker compose stop
up:
	sudo docker compose up

gom:
	sudo docker compose exec product_app php artisan make:migration $(filter-out $@,$(MAKECMDGOALS))
goc:
	sudo docker compose exec product_app php artisan make:controller $(filter-out $@,$(MAKECMDGOALS))
gomo:
	sudo docker compose exec product_app php artisan make:model $(filter-out $@,$(MAKECMDGOALS))
migrate:
	sudo sudo docker compose exec product_app php artisan migrate

compose:
	sudo sudo docker compose exec product_app $(filter-out $@,$(MAKECMDGOALS))