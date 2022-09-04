# Post Clone Rebuild of Dependencies using Docker

> #### Problem:
> 
> A Laravel application repository that was built using the Docker based "`curl` ... `sail`" combination, requires the `vendor` 
> and `node_modules` folders to be rebuilt. 
> 
> How do you do this on your local docker based development?

These steps aim to give you a guide to re-creating the deployment with the code at the stage you cloned it from the `main` 
(formerly known as `master`) repo.

With these instructions:
- *We presume that the Windows environmetn is set up using WSL2, Docker-Desktop and Ubuntu Linux.*
- *We are presuming you store the repository on your primary HDD/SSD drive, which will be `C` on a Windows system.*
- *We presume you have a folder named `Source/Repos` where your repositories are stored.*
- *Replace `USERNAME` with the username on your host (eg Windows) operating system, **not** the name used in the WSL2 Linux 
  installation.*
- *Replace `REPOFOLDER` with the folder path to your repository.*


1) Run Docker-Desktop
2) Open your terminal application (**Windows Terminal** or **iTerm** on Mac).
   <br>**IMPORTANT:** If you are using Windows you will 
   need to start a WSL2 terminal instance.
3) Change into the repository folder:
   <br>PC: 
   ```shell
   cd cd /mnt/c/Users/USERNAME/Source/Repos/REPOFOLDER
   ```
   For example:
   ```shell
    cd  /mnt/c/Users/GouldA/Source/Repos/DipIT-SaaS/ICT50120-SaaS-Library
   ```
   <br>MacOS: 
   ```shell
   cd ~/Source/Repos/REPOFOLDER
   ```
   For example: 
   ```shell
    cd ~/Source/Repos/DipIT-SaaS/ICT50120-SaaS-Library
   ```
4) Duplicate and rename the `.env.example` file to `.env`
5) Execute the following (single line) command:
```shell
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```
6) execute the Laravel Sail command to bring the Docker development environment up: 
```shell 
sail up
```
7) Create a second terminal instance, and when the sail up is complete, run:
```shell
   sail npm install && sail npm run dev
```
8) Create a third terminal instance and execute the following command: 
```shell
sail artisan key:generate
```

## Database Settings: `.env`
One issue you will have is that the settings for the `.env` file DB configuration will need tweaking. Below is a 
configuration that functioned correctly for Adrian when testing:
```dotenv
DB_CONNECTION=mysql
DB_HOST=mariadb
DB_PORT=3306
DB_DATABASE=library
DB_USERNAME=root
DB_PASSWORD=
```

You are now ready to continue with your development.

