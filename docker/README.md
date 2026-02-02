# Install Docker on Windown
## 1. Install wsl on windown
https://learn.microsoft.com/en-us/windows/wsl/install-manual#step-1---enable-the-windows-subsystem-for-linux

## 2. Create Folder wsl on D: drive
2.1. download https://drive.google.com/file/d/1dXRJ72S7PFdNbOwPlcgu4nk3p6thcoH_/view?usp=drive_link
2.2. extract folder and install file .exe

## 3. Install Docker
https://docs.docker.com/engine/install/ubuntu/#install-using-the-repository
Run service: * `sudo service docker start`

sudo service docker start

## 4. Install Make
* `sudo apt-get -y install make`

# Command

## check docker
* `docker ps`
* `docker ps -a`
* `docker images`
* `docker volume ls`

## Run
* `sudo dockerd`
* `docker-compose up`
* `docker run -d --name my_container -p 8080:80 my_image`

## Stop container

* `docker stop abcdef123456`
* `docker stop $(docker ps -q)`

## Remove

* `docker rm -vf $(docker ps -aq)`
* `docker rmi -f $(docker images -aq)`
* `docker volume prune -a -f`