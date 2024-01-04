# Laravel Microservice With Docker, RabbitMQ, Laravel Queue

The RabbitMQ have been implemented using CloudAMQP. The details can be found in the blog https://www.twilio.com/blog/rabbitmq-job-queues-laravel.

## Project Setup
### Setup Cloud Server
1. To setup the cloud server go to CloudAMQP and create a free account (without Credit card info). You'll find creadentials there to connect your laravel app with the cloud.
   
![292833344-c62c3138-5074-4ed6-8ab6-c1ab2977ea28](https://github.com/Tareq-Adnan/Laravel-Microservice-with-Docker-Rabbitmq-laravel-Queue-/assets/68398767/7aad5094-7656-493f-91be-17ff37e202df)


2. To install the project simply clone the repository and update the .env file with the proper cloud credentials.
   
![292833582-4c8e6ffb-25c4-490a-862f-e2afb7c04f23](https://github.com/Tareq-Adnan/Laravel-Microservice-with-Docker-Rabbitmq-laravel-Queue-/assets/68398767/1cece916-68e1-4fe8-a410-db792fdd9c05)


### Docker Container Setup
3. Make sure your system has docker installed. Use the command below to setup the docker image for the project. (You can see this link to setup docker for any laravel project: https://github.com/iwasherefirst2/laravel-docker)

   > docker-compose up -d --build
   
   then use this command to see the created image for your project.

   > docker-compose ps

4. Make necessary changes in your .env file for docker, like- app name or DB credentials, then install the composer dependencies.

   
### Install Composer dependencies

5. Bash into your container:

> docker-compose exec app bash

6. Install composer dependencies (this may also take a moment):

> composer install

7. Generate a key

> php artisan key:generate

<b> Note: You must Setup two different project with and these should be listen on two different port. </b>

8. Now duplicate the terminal and Run 
 > php artisan fire & php artisan queue:work
On two different terminal.

### App view
## Product Service 
Go to the link localhost:8000 or http://127.0.0.1:8000 you'll see a simple ui like the image below:
![Screenshot from 2024-01-04 11-59-06](https://github.com/Tareq-Adnan/Laravel-Microservice-with-Docker-Rabbitmq-laravel-Queue-/assets/68398767/1ca0e919-71b4-40c3-a5f8-058bb5d34bb1)


Now, here you can perform the order activity

## Order Service 
For this service, I used postman to update Product information and for placing order.

API Routes are:

Order placement:

> http://127.0.0.1:8001/api/orders
        
Sample Image:

![Screenshot from 2024-01-04 12-20-16](https://github.com/Tareq-Adnan/Laravel-Microservice-with-Docker-Rabbitmq-laravel-Queue-/assets/68398767/217c8067-5e04-4a64-9ab6-d79488a87c68)


Add Product Stock:

> http://127.0.0.1:8000/api/products

Sample Image:

![Screenshot from 2024-01-04 12-21-50](https://github.com/Tareq-Adnan/Laravel-Microservice-with-Docker-Rabbitmq-laravel-Queue-/assets/68398767/3b31878f-37a5-4cd6-997a-e03e3890ef5c)
