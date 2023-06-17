# Templateshx
![alt text](https://img.shields.io/github/directory-file-count/puzzleshockk1/templateXZ?style=flat-square)<br /> 


Templateshx is an opensource web store where people can sell their files, html templates.

[Demo](https://store.puzzleshock
) <br />  
[Discord](https://discord.gg/nBAQNBTn2T 
) 

## How to install
### Install Dependencies 
First, you need to install some dependencies. Run the following commands:
```
 apt -y install php8.1 php8.1-{common,cli,gd,mysql,mbstring,bcmath,xml,fpm,curl,zip} mariadb-server nginx tar unzip git redis-server
```



git clone https://github.com/puzzleshockk1/Templateshx.git 
### Clone repo
Next, clone the Templateshx repository from GitHub using the following command:
```
git clone https://github.com/puzzleshockk1/Templateshx.git 
```
### Configure MariaDB
Create a new database and user for Templateshx. Run the following commands to log in to MariaDB and set up the necessary credentials:
```
sudo mysql -u root -p

```
`
CREATE DATABASE templateshx;
CREATE USER 'templateshxuser'@'localhost' IDENTIFIED BY 'your_password';
GRANT ALL PRIVILEGES ON templateshx.* TO 'templateshxuser'@'localhost';
FLUSH PRIVILEGES;
EXIT;


`
### Configure Nginx
```
sudo nano /etc/nginx/sites-available/default

```
### I am looking for volunteer developers if you want to help me please contact me on discord #puzzle_shock 
