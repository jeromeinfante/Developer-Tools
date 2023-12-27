# Environment Installation

A guide for the installation of the IDE, environment, tools,  etc.


# XAMPP

#### Change the version number (if not the same).
```bash
cd Downloads

sudo wget https://sourceforge.net/projects/xampp/files/XAMPP%20Linux/8.2.12/xampp-linux-x64-8.2.12-0-installer.run
  
chmod +x xampp-linux-x64-8.2.12-0-installer.run

sudo ./xampp-linux-x64-8.2.12-0-installer.run

sudo systemctl disable apache2

sudo systemctl stop apache2

sudo /opt/lampp/lampp start

sudo /opt/lampp/lampp stop
```
# Nodejs
Download the LTS nodejs 
* https://nodejs.org/dist/v20.10.0/node-v20.10.0-linux-x64.tar.xz

```bash
cd Downloads

sudo tar -xvf node-v20.10.0-linux-x64.tar.xz

cd 

sudo mv Downloads/node-v20.10.0-linux-x64 ./

sudo cp -r node-v20.10.0-linux-x64/{bin,include,lib,share} /usr/

export PATH=/usr/node-v20.10.0-linux-x64/bin:$PATH
```

# Python

Download the tar.gz (PyCharm)
* https://www.jetbrains.com/pycharm/download/download-thanks.html?platform=linux&code=PCC

#### Change the version number (if not the same).
```bash
cd Downloads

tar -xvzf pycharm-community-2023.3.2.tar.gz

cd

mv Downloads/pycharm-community-2023.3.2 ./

cd pycharm-community-2023.3.2/bin/

chmod u+x pycharm.sh

./pycharm.sh
```

#### Python Environment
```bash
sudo apt install python-is-python3
```

# Java
```bash 
cd Downloads

# Java jdk 17
sudo wget https://download.oracle.com/java/17/latest/jdk-17_linux-x64_bin.deb

# Java jdk 21
sudo wget https://download.oracle.com/java/21/latest/jdk-21_linux-x64_bin.deb

# Change the version if you want to install 17
sudo dpkg -i sudo dpkg -i jdk-21_linux-x64_bin.deb
```

Download the tar.gz (IntelliJ)
* https://www.jetbrains.com/idea/download/download-thanks.html?platform=linux&code=IIC

#### Change the version number (if not the same).
```bash
sudo Downloads

tar -xvzf ideaIC-2023.3.2.tar.gz

cd

mv Downloads/idea-IC-233.13135.103 ./

cd idea-IC-233.13135.103/bin/

chmod u+x idea.sh

./idea.sh
```

# Vs Code
```bash
sudo apt-get update

sudo apt install software-properties-common apt-transport-https wget

wget -q https://packages.microsoft.com/keys/microsoft.asc -O- | sudo apt-key add –

sudo add-apt-repository "deb [arch=amd64] https://packages.microsoft.com/repos/vscode stable main"

sudo apt-get install code
```

#### Deb Package
Download the .deb file
* https://code.visualstudio.com/docs/?dv=linux64_deb
```
cd Downloads

sudo dpkg -i code_1.85.1-1702462158_amd64.deb
```

# Git
```bash
sudo apt install git-all
```

# Github Desktop 
```bash
cd Downloads

sudo wget https://github.com/shiftkey/desktop/releases/download/release-3.1.1-linux1/GitHubDesktop-linux-3.1.1-linux1.deb

sudo gdebi GitHubDesktop-linux-3.1.1-linux1.deb
```
