# Nurse App

A laravel / livewire app where nurses can add patients, edit their personal details, and delete them. Additional they
can add have a detailed view of their information, history of the blood pressure readings, and create and edit new blood
pressure readings. Also, patients can be exported in a .csv file.

### Usage

- git clone https://github.com/nikola-n/nurse-app.git
- cp .env.example .env
- adjust your database settings and create database
- composer install
- php artisan key:generate
- npm install && npm run dev
- php artisan migrate --seed to seed your database with patients and blood pressure records
- if you want to export the patients after clicking on the export button run php artisan queue:work to dispatch the job.
- tests are added for the livewire components, if you run the tests the database will be refreshed and records will be lost.
