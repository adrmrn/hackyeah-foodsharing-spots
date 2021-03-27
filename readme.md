# Foodsharing Spots - API

This project was creating during [Hackyeah - The biggest stationary hackathon in Europe](https://hackyeah.pl) in 24 hours. We were finalists in Environment category. You can read more about our team and solution [here](https://hackyeah.pl/winners-2019/#ENVIRONMENT).

This repository contains only an API. See a [live version of our demo app](http://foodsharing-spot.herokuapp.com/).
## Project overview
**Project name:** Foodsharing spots – no food waste  
**What the project is about?**  
Our application can significantly reduce problem of the food waste, that affects many of us by overbuying groceries.

**Project description:**  
We tend to overbuy groceries, which finally ends up in trash. Approximately 1/3 of globally produced food is wasted – that’s enormous waste of money, water, energy and, massive greenhouse gas and carbon dioxide emission! Why don’t we share it with others – before it gets expired? FoodSharingSpots app lets you to easily find closest spot, where you can simply leave your food, or just report your willing to share – our Patrons will take it from you.

## Installation
Requirements:
- Vagrant
- Virtualbox
- Composer

1. Install dependencies
```bash
composer install
```

2. Copy and rename file `Homestead.yaml.dist` to `Homestead.yaml`

3. Copy and rename file `.env.example` to `.env`

4. Run vagrant
```bash
vagrant up
```

5. Generate app key
```bash
vagrant ssh -c 'cd code && php artisan key:generate'
```

6. Run migrations
```bash
vagrant ssh -c 'cd code && php artisan doctrine:migrations:migrate'
```

7. Run seeder with example data sets
```bash
vagrant ssh -c 'cd code && php artisan db:seed'
```

8. To be sure, just regenerate composer autoload
```bash
composer dump-autoload
```

9. To check if project is working fine, just send `GET` request to `http://192.168.13.13/` URL. You should see `status: ok` as response.
```json
Response: 200 OK
{
  "status": "ok"
}
```

## Postman collection - API resources
In main directory is placed `postman-collection.json` file with API resources.

