# Clone & Rebuild Project Dependencies using Docker

Before you clone the repository to your local machine, we strongly 
suggest that you FORK a copy into your own GitHub account.
Then use this for cloning and working upon.

## Tutorial Index

|                Index                 |
|:------------------------------------:|
| [Tutorial Index](ReadMe-00-Index.md) |


## Forking a copy of the repository

Go to GitHub and log into the system.

Open a new tab and go to:
- [https://github.com/AdyGCode/ICT50120-SaaS-Library/](https://github.
com/AdyGCode/ICT50120-SaaS-Library/)

At the top right you will see "Fork". Click this to create a new fork of the project in your own GitHub account.

![Forking a copy](images/fork-01.png)

Once you have done this, you are now able to go back to your repository and clone this as needed.

## Clone using PhpStorm

Close any existing project to return to the "home dialog" of PhpStorm.

IMG

Click on Clone from Repo

![Clone From Repo in PhpStorm](images/phpstorm-clone-repo-1.png)

Enter the URL into the required space, and locate where you want the 
repository to go:

![Repository URL](images/phpstorm-clone-repo-2.png)

Click Clone

This should open the project's folder after cloning is complete.

## What about updates to my Forked copy?

If the repository is updated then you are able to pull the changes into your 
copy from the original.

> Details on this process to come.



## What about the missing Vendor and Node Modules?

> #### Problem:
> 
> A Laravel application repository that was built using the Docker 
> based "`curl` ... `sail`" combination, requires the `vendor` 
> and `node_modules` folders to be rebuilt. 
> 
> How do you do this on your local docker based development?

These steps aim to give you a guide to re-creating the deployment with the 
code at the stage you cloned it from the `main` 
(formerly known as `master`) repo.

With these instructions:
- *We presume that the Windows environment is set up using WSL2, Docker-Desktop and Ubuntu Linux.*
- *We are presuming you store the repository on your primary HDD/SSD drive, which will be `C` on a Windows system.*
- *We presume you have a folder named `Source/Repos` where your repositories are stored.*
- *Replace `USERNAME` with the username on your host (eg Windows) operating system, **not** the name used in the WSL2 Linux 
  installation.*
- *Replace `REPOFOLDER` with the folder path to your repository.*

### Running up the forked & cloned copy

1) Run Docker-Desktop

2) Open your terminal application (**Windows Terminal** or **iTerm** on Mac).
   <br>**IMPORTANT:** If you are using Windows you will 
   need to start a WSL2 Ubuntu (or preferred Linux) terminal instance.

3) Change into the repository folder:

   PC: 
   ```shell
   cd /mnt/c/Users/USERNAME/Source/Repos/REPOFOLDER
   ```
   For example:
   ```shell
    cd  /mnt/c/Users/GouldA/Source/Repos/DipIT-SaaS/ICT50120-SaaS-Library
   ```
   MacOS: 
   ```shell
   cd ~/Source/Repos/REPOFOLDER
   ```
   For example: 
   ```shell
    cd ~/Source/Repos/DipIT-SaaS/ICT50120-SaaS-Library
   ```
4) Duplicate and rename the `.env.example` file to `.env`

5) Edit the new `.env` file as there is an issue with the DB configuration. You will have to change the host to be `mariadb` 
   rather than `localhost`. Below is the configuration section for the `DB_` that functioned correctly for Adrian when testing:
```dotenv
DB_CONNECTION=mysql
DB_HOST=mariadb
DB_PORT=3306
DB_DATABASE=library
DB_USERNAME=root
DB_PASSWORD=
```

6) Execute the following (single line) command, and wait for it to complete:
```shell
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```

7) In this same shell, now execute the Laravel Sail command to bring the Docker development environment up: 
```shell 
sail up
```

8) Create a second terminal instance and execute the following commands:
```shell
sail composer install
sail composer update
sail artisan key:generate
```

09) Next, in the same second terminal instance, and when the sail up is complete, run:
```shell
   sail npm install && sail npm run dev
```

10) Finally, in the third terminal instance and execute the following command:
```shell
sail artisan migrate:fresh --step --seed
```


You are now ready to continue with your development.
