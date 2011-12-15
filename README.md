# ThemeEngineSandbox
Welcome to the AlphaLemon's ThemeEngineSandbox a full configured Symfony2 application that uses the ThemeEngineBundle to render the webpages. Learn
more about this bundle at the [official github repository](https://github.com/alphalemon/ThemeEngineBundle).

## Pre Installation
From the app/config folder, copy the the config.yml.dist to config.yml and the parameters.ini.dist to parameters.ini.

## Installation
Get your application from github, unpack it, open a console, move inside the sandbox folder and start the vendor installation:

    bin/vendors install

## Configure propel
After that you must configure propel. Copy the the config.yml.dist to config.yml, open it and add your database user and password to the propel section:

    propel:
        path:       "%kernel.root_dir%/../vendor/propel"
        phing_path: "%kernel.root_dir%/../vendor/phing"

        dbal:
            driver:               mysql
            user:                 [USER]
            password:             [PASSWORD]
            dsn:                  mysql:host=localhost;dbname=themeEngineSandbox
            options:              {}
            attributes:           {}
            default_connection:   default

Here you may change the database name, if you want. After that from the console run this three commands:

    app/console propel:database:create
    app/console propel:build
    app/console propel:insert-sql --force

Now you are done! Be sure that the ThemeEngineBundle/Themes is writable.

## The Web Interface
you can open the web interface at http;//[yourserver]/en/al_showThemes into a browser session. The sandbox comes with a 
predefined theme that must be imported by clicking the Import button and activated by clicking the Activate button

## The application bundle
The sandbox comes with a simple bundle that has just a demo action called **hello**, where a page is rendered using the ThemeEngine bundle:

    http//[yourserver]/hello 
