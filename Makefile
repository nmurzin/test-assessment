ENV=local
dir=${CURDIR}
externalDir=/var/www
project=test-assessment
image=php:7-cli

exec:
	docker run -it --rm --name $(project) -v $(dir):$(externalDir) -w $(externalDir) $(image) php index.php

test:
	docker run -it --rm --name $(project) -v $(dir):$(externalDir) -w $(externalDir) php ./vendor/bin/phpunit tests

dump-autoload:
	docker run --rm --interactive --tty --volume $(dir):$(externalDir) -w $(externalDir) composer dump-autoload

install:
	docker run --rm --interactive --tty --volume $(dir):$(externalDir) -w $(externalDir) composer install