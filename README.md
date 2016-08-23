# laravel-tdd-example
Code examples from my talk "TDD is Dead, Long Live TDD"

Relevant files are in 
src/
spec/
app/StoredHistory.php
app/Providers/AppServiceProvider.php
app/Http/Controllers/WelcomeController.php
resources/views/search.blade.php

```
composer install
```

Create simple mysql database called larapp, use generation tools to create db tables

cd into `public/` and run

```
php -S localhost:4444
```

Running code requires php7 (or remove typehints)
