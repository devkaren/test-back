## Installation
Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)

Clone the repository

    git clone https://github.com/devkaren/test-back.git
    
Switch to the repo folder

    cd test-back
    
Install all the dependencies using composer

    composer install
    
Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Add json rpc config
    
    php artisan vendor:publish --tag="jsonrpc-config"
     
After adding jsonrpc config go to `config/jsonrpc.php` and replace:

`authValidate` value to `true`

`keys.all` value to any token or stay that same. 

NOTE: if you change token, then you need change also in frontend configuration

Start the local development server

    php artisan serve --port=4040

You can now access the server at http://127.0.0.1:4040
