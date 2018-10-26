.PHONY: build
build:
	docker-compose build

.PHONY: start
start: env
	docker volume create --name=goingapp-app-device-scanner-main-app-sync
	docker volume create --name=goingapp-app-device-scanner-main-db-scanner
	docker volume create --name=goingapp-app-device-scanner-main-db-api
	docker-compose up -d
	docker-sync start

.PHONY: stop
stop:
	docker-compose stop
	docker-sync stop

.PHONY: rm
rm: stop
	docker-compose down -v
	docker-compose rm -v

.PHONY: env
env:
	export TMPDIR=/tmp