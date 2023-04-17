SRC_DIR=${PWD}/src
SRC_VUE_DIR=${PWD}/vue-project


build_image_php_server:
	docker build -f Dockerfile.php-server --no-cache -t custom_php8.2:latest ${PWD}

run_php_server:
	docker run -it --rm --name lesson4 -v ${SRC_DIR}:/var/www/html -p 127.0.0.1:80:80 custom_php8.2:latest php -S 0.0.0.0:80 -t /var/www/html


composer_require:
	docker run --rm --interactive --tty \
	  --volume ${SRC_DIR}:/app \
	  composer:2.5.5 require webit/bcmath

composer_install:
	docker run --rm --interactive --tty \
	  --volume ${SRC_DIR}:/app \
	  composer:2.5.5 install --ignore-platform-reqs --no-scripts


npm_add:
	docker run --rm --interactive --tty \
	  --volume ${SRC_DIR}:/usr/src/app -w /usr/src/app \
	  node:19-alpine3.16 npm init vue@latest

npm_install:
	docker run --rm --interactive --tty \
    	  --volume ${SRC_VUE_DIR}:/usr/src/app -w /usr/src/app \
    	  node:19-alpine3.16 npm install

npm_run_dev:
	docker run --rm --interactive --tty \
		  -p 127.0.0.1:8080:8080 \
    	  --volume ${SRC_VUE_DIR}:/usr/src/app -w /usr/src/app \
    	  node:19-alpine3.16 npm run dev

npm_run_build:
	docker run --rm --interactive --tty \
    	  --volume ${SRC_VUE_DIR}:/usr/src/app -w /usr/src/app \
    	  node:19-alpine3.16 npm run build

build:
	docker build --no-cache -t custom_multistage:latest --progress plain .
#--target build-js

run:
	docker run -it --rm --name lesson4 -p 127.0.0.1:80:80 custom_multistage:latest php -S 0.0.0.0:80 -t /var/www/html