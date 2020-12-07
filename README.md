# PlugSocial BuzzinaSocial

## Installation

Given below are the steps you need to follow, to install the materialize-html-laravel-template on your system:

**Step 1**: Open the terminal in your root directory(Materialize-html-laravel-template) & to install the composer packages run the following command:

```bash
 composer install
```

**Step 2**: In the root directory, you will find a file named .env.example, rename the given file name to .env and run this command.
```bash
mv .env.example .env
```

**Step 3**: Run the following command to generate the key (and you can also edit your database credentials here).
```bash
php artisan key:generate
```

**Step 4**: By running the following command, you will be able to get all the dependencies in your node_modules folder:
```bash
npm install
```

**Step 5**: To run the project, you need to run following command in the project directory. It will compile the php files & all the other project files. If you are making any changes in any of the .php file then you need to run the given command again.
```bash
npm run dev
```

**Step 6**: To serve the application you need to run the following command in the project directory. (This will give you an address with port number 8000.)

Now navigate to the given address you will see your application is running.
```bash
php artisan serve
```

To change the port address, run the following command:
```bash
php artisan serve --port=8080 // For port 8080
sudo php artisan serve --port=80 // If you want to run it on port 80, you probably need to sudo.
```

Watching for changes: If you want to watch all the changes you make in the application then run the following command in the root directory.
```bash
npm run watch
```

Building for Production: If you want to run the project and make the build in the production mode then run the following command in the root directory, otherwise the project will continue to run in the development mode.
```bash
npm run prod
```
Required Permissions

If you are facing any issues regarding the permissions, then you need to run the following command in your project directory:
```bash
sudo chmod -R o+rw bootstrap/cache
sudo chmod -R o+rw storage
```


