.PHONY: default
default: 
	docker run --rm     -v "$(CURDIR)":/opt     -w /opt     laravelsail/php81-composer:latest bash -c "composer install";