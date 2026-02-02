.DEFAULT_GOAL := up

# --------------------- DOCKER COMPOSE -------------------
up:
	docker compose up -d

down:
	docker compose down

# --------------------- APP -------------------

install:
	docker compose exec web_php composer install && docker compose exec web_php php artisan key:generate

permision:
	sudo chmod -R 777 public storage vendor

build:
	docker compose exec web_node npm run build

run:
	docker compose exec web_node npm run dev

# cache:
# 	docker compose exec web_php 
# 	php artisan cache:clear && docker compose exec web_php 
# 	php artisan config:clear && docker compose exec web_php php artisan config:cache

cache:
	docker compose exec web_php php artisan cache:clear
	docker compose exec web_php php artisan config:clear
	docker compose exec web_php php artisan config:cache