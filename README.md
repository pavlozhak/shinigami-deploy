## Shinigami deploy

![Image of Shinigami](https://i.pinimg.com/originals/68/5b/05/685b050c5193fca616bec977a59ab469.png)

### Installation steps

- Install composer  

`composer install --prefer-dist`  

- Create `.env` file  

- Migrate DB  

`php artisan migrate`   

- Add default data to DB  

`php artisan db:seed`  

- Create storage link  

`php artisan storage:link`  

- You may up database server and PMA from docker

`docker-compose up -d`
