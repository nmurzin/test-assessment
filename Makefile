ENV=local
dir=${CURDIR}
project=test-assessment
image=php:7-cli

exec:
	docker run -it --rm --name $(project) -v "$(dir)":/var/www -w /var/www $(image) php index.php

dump-autoload:
	docker run --rm --interactive --tty --volume $(dir):/app composer dump-autoload