<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Development Dependencies

1. Docker
```
sudo apt-get install docker.io docker-compose
```
2. Make
```
sudo apt install make
```

## Development Setup

1. Clone the repo to your local machine
2. Rename .env.example to .env and make the desired changes to support your environment
3. In the project root, execute the following commands:

```
make
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
sail up -d
sail npm install
sail artisan migrate
```

4. You should see a bunch of docker containers come up
5. In a browser, navigate to http://localhost/
6. Register a new user and log in
