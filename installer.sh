#!/bin/bash
# Author: xfr0g & sphyxi4
# Date: 2024
# Description: An automated developer tools installer for Linux Debian and Debian-based systems.
# Note: I modified this script to redirect outputs to /dev/null for cleaner screen. Added a if-elif-else statement for easier installation.

# Colors
GREEN='\033[1;32m'
RED='\033[1;31m'
YELLOW='\033[1;33m'
WB='\033[1;37m'
NC='\033[1;0m'

# Interface
echo -e "${YELLOW} ____             _____           _      "
echo -e "${YELLOW}|  _ \  _____   _|_   _|__   ___ | |___  "
echo -e "${YELLOW}| | | |/ _ \ \ / / | |/ _ \ / _ \| / __| "
echo -e "${YELLOW}| |_| |  __/\ V /  | | (_) | (_) | \__ \ "
echo -e "${YELLOW}|____/ \___| \_/   |_|\___/ \___/|_|___/ "
echo -e "${GREEN}\t\t      by xfr0g & sphyxi4"
echo

# Check for root privilege first.
echo -e "${WB}[${RED}*${WB}] Checking for root privilege..."
sleep 3

if [[ $UID -ne 0 ]]
then
	echo
	echo -e "${WB}[${RED}*${WB}] Run this script as root."
	echo -e "${WB}[${RED}*${WB}] Quitting now."
	exit 1
else
	echo -e "${WB}[${GREEN}*${WB}] Root."
fi

# Update first before installing the tools.
echo
echo -e "${WB}[${RED}*${WB}] Updating and upgrading system first..."
apt -y update &> /dev/null
apt -y upgrade &> /dev/null
echo -e "${WB}[${GREEN}*${WB}] Done."

# Install all pre-requisites.
echo
echo -e "${WB}[${RED}*${WB}] Installing all pre-requisites..."
apt install -y software-properties-common apt-transport-https wget curl &> /dev/null
echo -e "${WB}[${GREEN}*${WB}] Done."

# We will store all our tools in a directory called DevTools in our home directory.
# Downloads == DevTools
mkdir DevTools
cd DevTools

# Select an item from the menu.
echo
echo -e "${WB}[${YELLOW}1${WB}] ${YELLOW}XAMPP"
echo -e "${WB}[${YELLOW}2${WB}] ${YELLOW}LTS Nodejs"
echo -e "${WB}[${YELLOW}3${WB}] ${YELLOW}Python3"
echo -e "${WB}[${YELLOW}4${WB}] ${YELLOW}Java Oracle JDK 21"
echo -e "${WB}[${YELLOW}5${WB}] ${YELLOW}Microsoft VSCode"
echo
echo -ne "${WB}[${GREEN}*${WB}] Select an option: ${YELLOW}"
read input

# Read user input to install only selected item.
if [[ $input -eq 1 ]]
then
	# Install XAMPP
	echo
	echo -e "${WB}[${RED}*${WB}] Installing XAMPP..."
	wget https://sourceforge.net/projects/xampp/files/XAMPP%20Linux/8.2.12/xampp-linux-x64-8.2.12-0-installer.run &> /dev/null
	chmod a+x xampp-linux-x64-8.2.12-0-installer.run
	echo -e "${WB}[${GREEN}*${WB}] Done."
	exit 1
elif [[ $input -eq 2 ]]
then
	# Install LTS Nodejs
	echo
	echo -e "${WB}[${RED}*${WB}] Installing LTS Nodejs..."
	wget https://nodejs.org/dist/v20.10.0/node-v20.10.0-linux-x64.tar.xz &> /dev/null
	mv DevTools/node-v20.10.0-linux-x64 ~/
	cp -r ~/node-v20.10.0-linux-x64/{bin,include,lib,share} /usr/
	export PATH=/usr/node-v20.10.0-linux-x64/bin:$PATH
	echo -e "${WB}[${GREEN}*${WB}] Done."
	exit 1
elif [[ $input -eq 3 ]]
then
	#Install Python3
	# Note: Python is already pre-installed in most of the Linux systems. In that case, we will just install python3-pip and python-is-python3.
	echo
	echo -e "${WB}[${RED}*${WB}] Python3 is already installed."
	echo -e "${WB}[${RED}*${WB}] Installing python3-pip and python-is-python3..."
	apt install -y python3-pip &> /dev/null
	apt install -y python-is-python3 &> /dev/null
	echo -e "${WB}[${GREEN}*${WB}] Done."
	exit 1
elif [[ $input -eq 4 ]]
then
	# Install Oracle JDK 21
	echo
	echo -e "${WB}[${RED}*${WB}] Installing Oracle JDK 21..."
	wget https://download.oracle.com/java/21/latest/jdk-21_linux-x64_bin.deb &> /dev/null
	dpkg -i jdk-21_linux-x64_bin.deb
	echo -e "${WB}[${GREEN}*${WB}] Done."
	exit 1
elif [[ $input -eq 5 ]]
then
	# Install Microsoft's Visual Studio Code
	echo
	echo -e "${WB}[${RED}*${WB}] Installing Microsoft's Visual Studio Code..."
	wget -q https://packages.microsoft.com/keys/microsoft.asc -O- | sudo apt-key add –
	add-apt-repository "deb [arch=amd64] https://packages.microsoft.com/repos/vscode stable main"
	apt update &> /dev/null
	apt install -y code &> /dev/null
	echo -e "${WB}[${GREEN}*${WB}] Done."
	exit 1
else
	echo
	echo -e "${WB}[${RED}*${WB}] Invalid option."
	echo -e "${WB}[${RED}*${WB}] Quitting now."
	exit 1
fi

# Thank you for using our script.
