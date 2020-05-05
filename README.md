# IT490: Systems Integration | Group 5 | *Healthaholic*
America is facing a high-level problem of obesity and in order to help solve this problem people need help maintaining their nutrition information, so this website provides nutritional facts and gives recommendations on what type of exercise needs to be done to digest the food they are eating. Also, if we have time then the feature we will be adding is that we would be able to tell customers the nearby restaurants and would give the nutritional data of the menus to the customer. 
To provide a website for those who are health conscious, so they can keep their health in good condition based on their input of their personal information and provide suggestions of what they can do to stay healthy.  

# Front-end | Website
This will have the user interface (UI) and the users will be able to interact with the website and as per their choices on the site, the result would be displayed.
* `Register`: User will input required details, message will be sent through RabbitMQ, and inserted into an SQL database.
* `Login`: User will input required details, message will be sent through RabbitMQ & authenticated.
* `API`: User will be able to submit queries and pull information based on their request. 

# RabbitMQ
Will be used to help communication between the different services; an intermediary service. Assists with sending and receiving messages, primarily for sending registration requests and assisting with login authentication. 

# Back-end | Database & API
This will be used to store user information. Will store information such as `ID`, `Name`, `Email`, `Password`, etc. 

# Resources
* [Oracle VM VirtualBox](https://www.virtualbox.org/)
* [Ubuntu 18.04 LTS](https://releases.ubuntu.com/18.04.4/)
* [Apache](https://httpd.apache.org/docs/)
* [PHPMyAdmin](https://docs.phpmyadmin.net/en/latest/)
* [RabbitMQ](https://www.rabbitmq.com/documentation.html)
* [Edamam API](https://developer.edamam.com/)

# Authors
* Ami Patel [RabbitMQ]
* Krishan Patel [Backend]
* Purav Patel [Backend]
* Nishaben Patel [Frontend]
* Dhruv Patel [RabbitMQ]
 
