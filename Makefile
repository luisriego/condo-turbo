.PHONY: help start-all stop-all build-all restart-all ssh-register ssh-application ssh-mailer

help: ## Show this help message
	@echo 'usage: make [target]'
	@echo
	@echo 'targets:'
	@egrep '^(.+)\:\ ##\ (.+)' ${MAKEFILE_LIST} | column -t -c 2 -s ':#'

start-all: ## Runs all services: RabbitMQ, Oauth and Application
# 	make -C rabbitmq start
	make -C oauth start
	make -C app start
	$(MAKE) prepare-all

prepare-all: ## Install dependencies and run migrations in all services
	make -C oauth prepare
	make -C app prepare

stop-all: ## Stops all services: RabbitMQ, Oauth and Application
# 	make -C rabbitmq stop
	make -C oauth stop
	make -C app stop

build-all: ## Build all services: RabbitMQ, Oauth and Application
	make -C oauth build
	make -C app build

restart-all: ## Restarts all services: RabbitMQ, Oauth and Application
# 	make -C rabbitmq restart
	make -C oauth restart
	make -C app restart

ssh-oauth: ## bash into Oauth
	make -C oauth ssh-be

ssh-app: ## bash into Application
	make -C app ssh-be