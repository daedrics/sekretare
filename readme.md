# Student Management System 

This is a school project for managing students. The project is developed using Laravel framework.
There are three types of users: 
* Student
* Professor
* Secretary

## Getting Started

These instructions will get you a copy of the project up and running on your local machine. 

### Installing

Clone the project or download it.
Then run   ```
            composer update
            ```  to install the dependencies of the project.


Then run:   


```
php artisan migrate
```
for the migrations.

Finally run:
```
php artisan db:seed
```
to create the first user. 
Then open the project on the root url and login with these credentials:
```
email: sekretare@sekretare.com
password: test1234
```


**Thats all. Thank you!**