# Ryan's Solution
## Setup(The same as original setup，just add extra seeder data)
```
touch database/database.sqlite
cp .env.example .env
composer install
php artisan key:generate
php artisan migrate:fresh --seed
php artisan serve --port=8000
```
## API endpoint
1. Create[POST] or Update[PUT] an patient answer for a question:
```
http://127.0.0.1:8000/api/questions
```
2. View patient's answers:
```
http://127.0.0.1:8000/api/showPatientWithAnswer/{patient_id}
```

## Testing
I just added some test due to the time, run test with following commands:
```$xslt
vendor/bin/phpunit
```
A list of testing should be done :
1. Return patient's answer with valid patient_id.
2. Return error with invalid patient_id.
3. Return success response if add answer action pass all validation.
4. Return error if the relationship of question and answers does not exist.
5. Return error if post more than 1 answer for radio or select type question.
6. Return error if question_id / patient_id / answer_id does not exist.

## Further Improvement
So sorry for this quick solution, if I have more time I will implement following features:
1. Use config file to manage error response type and context.
2. Create a model/table to handle question type(checkbox,select/ratio) and improve the relationship
3. Implement more testing case.


<h3 align="center">
  <br>
  <a href="https://www.bigpicturemedical.com"><img src="/public/logo.svg" alt="Big Picture" width="200" height="200px"></a>
  <br>
</h3>

# Setup
To get up and running quickly we have configured the project to use the Sqlite database driver.
You should be able to run the following commands locally and get up and running straight away:
```
touch database/database.sqlite
cp .env.example .env
composer install
php artisan key:generate
php artisan migrate:fresh --seed
php artisan serve --port=8000
```

# Background
In this example codebase, we have 2 models: Patient and Question.
The models are not related to one another currently, however, we want to update the codebase so that a Patient can provide Answers to Questions, expose it via a web API, and store it in the database.

# Assignment
 1. Create an eloquent model and migration for the *Answer* class
 2. Ensure that a Patient can have many Answers, and a Question can have many Answers.
 3. Implement API endpoints to create and update an Answer. 
 4. Implement an API endpoint to view the patient's Answers.

### Conditions / Caveats
- **Rule**: An Answer cannot be created without a corresponding Patient and Question.
- **Rule**: Questions that have a type of *checkbox* can store multiple answers, whereas a *radio* and *select* types can only store one answer.
- **Goal**: Ensure that when an answer is created for a question that the the above rules are enforced. 

### Guidelines
Unit tests to support your solution would greatly welcomed. 
If you do not have time, please explain what you would have tested for, and how.


> [bigpicturemedical.com](https://www.bigpicturemedical.com) &nbsp;&middot;&nbsp;

