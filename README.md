# Cinema Booking

## Setup

All environments expects the following dependencies to be installed:
-   [Composer](https://getcomposer.org/), a PHP package manager

Once all the above dependencies are installed, you can proceed with the rest of the setup:

Step 1: Clone the Project
git clone https://github.com/hamzaawan7/cinema-booking

```

Step 2: Install Dependencies

composer install
```

```

Step 3: Configure Environment
You'll then need to setup your environment variables

cp .env.example .env
```

```

Step 4: Generate Application Key

php artisan key:generate
```

```

Step 5: Migrate the Database and Seeder

php artisan migrate:fresh --seed
```

```

Step 6: Start the Development Server

php artisan serve
```

```

Next follow the step  

```

