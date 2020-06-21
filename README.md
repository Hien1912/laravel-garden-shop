
# Procfile

- echo "web: vendor/bin/heroku-php-apache2 public/" > Procfile

# Heroku config

- heroku config:set APP_NAME=GardenShop
- ...
