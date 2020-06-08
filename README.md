TeachersTurf Web Api

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/8d489d8f35334ef79f76c5369f1f2c87)](https://app.codacy.com/gh/BuildForSDG/Expert-System-for-Connecting-Qualified-Teachers-To-Schools-WebApi-?utm_source=github.com&utm_medium=referral&utm_content=BuildForSDG/Expert-System-for-Connecting-Qualified-Teachers-To-Schools-WebApi-&utm_campaign=Badge_Grade_Settings)


<img src="https://github.com/BuildForSDG/Team-080-Expert-System-for-Connecting-Qualified-Teachers-To-Schools-WebApi-Backend/blob/develop/storage/app/public/TeacherTurfSignUpPage.png" height="400" />
<img src="https://github.com/BuildForSDG/Team-080-Expert-System-for-Connecting-Qualified-Teachers-To-Schools-WebApi-Backend/blob/develop/storage/app/public/TeacherTurfLoginPage.png" height="400"/>
<img src="https://github.com/BuildForSDG/Team-080-Expert-System-for-Connecting-Qualified-Teachers-To-Schools-WebApi-Backend/blob/develop/storage/app/public/TeacherTurfDasboardPage.png" height="400"/>
<img src="https://github.com/BuildForSDG/Team-080-Expert-System-for-Connecting-Qualified-Teachers-To-Schools-WebApi-Backend/blob/develop/storage/app/public/TeacherTurfLoadingPage.png" height="400"/>
<img src="https://github.com/BuildForSDG/Team-080-Expert-System-for-Connecting-Qualified-Teachers-To-Schools-WebApi-Backend/blob/develop/storage/app/public/TeacherTurfInterviewPage.png" height="400" />



## About

TeachersTurf help connects qualified teachers with schools in other to increase access to quality eduction in Nigeria. 


## Why

This project targets the Goal 4 to promote quality eduction in sub saharan africa.

#### Following are the Models
* Answer
* City
* Country
* Degree
* Institution
* InstitutionType
* Level
* Profile
* Qualification
* Question
* Quize
* State
* User
* UserType


#### Usage
Clone the project via git clone or download the zip file.

##### .env
Copy contents of .env.example file to .env file. Create a database and connect your database in .env file.
##### Composer Install
cd into the project directory via terminal and run the following  command to install composer packages.
###### `composer install`
##### Generate Key
then run the following command to generate fresh key.
###### `php artisan key:generate`
##### Run Migration
then run the following command to create migrations in the databbase.
###### `php artisan migrate`

### API EndPoints
##### User
* User GET `http://localhost:8000/api/register`

##### Profile
* Post GET All `http://localhost:8000/api/profiles`
* Post GET Single `http://localhost:8000/api/profiles/1`
* Post POST Create `http://localhost:8000/api/profiles/create`
* Post POST Update `http://localhost:8000/api/profiles`
* Post DELETE destroy `http://localhost:8000/api/profiles/1`

##### City
* Post GET All `http://localhost:8000/api/cities`
* Post GET Single `http://localhost:8000/api/cities/1`
* Post POST Create `http://localhost:8000/api/cities/create`
* Post POST Update `http://localhost:8000/api/cities`
* Post DELETE destroy `http://localhost:8000/api/cities/1`


 ##### Country
* Post GET All `http://localhost:8000/api/countries`
* Post GET Single `http://localhost:8000/api/countries/1`
* Post POST Create `http://localhost:8000/api/countries/create`
* Post POST Update `http://localhost:8000/api/countries`
* Post DELETE destroy `http://localhost:8000/api/countries/1`

##### Degree
* Post GET All `http://localhost:8000/api/degrees`
* Post GET Single `http://localhost:8000/api/degrees/1`
* Post POST Create `http://localhost:8000/api/degrees/create`
* Post POST Update `http://localhost:8000/api/degrees`
* Post DELETE destroy `http://localhost:8000/api/degrees/1`

##### Institution
* Post GET All `http://localhost:8000/api/institutions`
* Post GET Single `http://localhost:8000/api/institutions/1`
* Post POST Create `http://localhost:8000/api/institutions/create`
* Post POST Update `http://localhost:8000/api/institutions`
* Post DELETE destroy `http://localhost:8000/api/institutions/1`

##### Institution Type
* Post GET All `http://localhost:8000/api/institutiontypes`
* Post GET Single `http://localhost:8000/api/institutiontypes/1`
* Post POST Create `http://localhost:8000/api/institutiontypes/create`
* Post POST Update `http://localhost:8000/api/institutiontypes`
* Post DELETE destroy `http://localhost:8000/api/institutiontypes/1`

##### Level
* Post GET All `http://localhost:8000/api/levels`
* Post GET Single `http://localhost:8000/api/levels/1`
* Post POST Create `http://localhost:8000/api/levels/create`
* Post POST Update `http://localhost:8000/api/levels`
* Post DELETE destroy `http://localhost:8000/api/levels/1`

##### Qualification
* Post GET All `http://localhost:8000/api/qualifications`
* Post GET Single `http://localhost:8000/api/qualifications/1`
* Post POST Create `http://localhost:8000/api/qualifications/create`
* Post POST Update `http://localhost:8000/api/qualifications`
* Post DELETE destroy `http://localhost:8000/api/qualifications/1`
           
##### Question
* Post GET All `http://localhost:8000/api/questions`
* Post GET Single `http://localhost:8000/api/questions/1`
* Post POST Create `http://localhost:8000/api/questions/create`
* Post POST Update `http://localhost:8000/api/questions`
* Post DELETE destroy `http://localhost:8000/api/questions/1`

##### Quize
* Post GET All `http://localhost:8000/api/quizes`
* Post GET Single `http://localhost:8000/api/quizes/1`
* Post POST Create `http://localhost:8000/api/quizes/create`
* Post POST Update `http://localhost:8000/api/quizes`
* Post DELETE destroy `http://localhost:8000/api/quizes/1`

##### State
* Post GET All `http://localhost:8000/api/states`
* Post GET Single `http://localhost:8000/api/states/1`
* Post POST Create `http://localhost:8000/api/states/create`
* Post POST Update `http://localhost:8000/api/states`
* Post DELETE destroy `http://localhost:8000/api/states/1`

##### Subject
* Post GET All `http://localhost:8000/api/subjects`
* Post GET Single `http://localhost:8000/api/subjects/1`
* Post POST Create `http://localhost:8000/api/subjects/create`
* Post POST Update `http://localhost:8000/api/subjects`
* Post DELETE destroy `http://localhost:8000/api/subjects/1`

##### Subject
* Post GET All `http://localhost:8000/api/usertypes`
* Post GET Single `http://localhost:8000/api/usertypes/1`
* Post POST Create `http://localhost:8000/api/usertypes/create`
* Post POST Update `http://localhost:8000/api/usertypes`
* Post DELETE destroy `http://localhost:8000/api/usertypes/1`
## Authors


* @boyeoffice
 Olakunle Boye
 https://github.com/boyeoffice

* https://github.com/rebirthtobi

 @rebirthtobi
 Tobi Taiwo

* https://github.com/richardiyama

@richardiyama
 Richard Iyama Oluwaseun

* https://github.com/shinnida220
 @Emmanuel

* https://github.com/stteem
 @stteem
 Uwem Uke

* https://github.com/tobylonge
 @tobylonge
 Oluwatobi Alonge

## Contributing
If this project sounds interesting to you and you'd like to contribute, thank you!
First, you can send a mail to buildforsdg@andela.com to indicate your interest, why you'd like to support and what forms of support you can bring to the table.


## LICENSE
MIT
