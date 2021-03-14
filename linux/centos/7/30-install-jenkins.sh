#!/bin/bash

wget
if [[ $? -eq 127 ]]; then
	yum install -y wget
fi 

wget -O /etc/yum.repos.d/jenkins.repo https://pkg.jenkins.io/redhat-stable/jenkins.repo

rpm --import https://pkg.jenkins.io/redhat-stable/jenkins.io.key

yum -y upgrade

yum -y install jenkins java-1.8.0-openjdk-devel
