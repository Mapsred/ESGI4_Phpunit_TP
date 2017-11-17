PHPUnit Mocks
=============


Clone the project
-------------

To install the project run the command below.

``git clone git@github.com:Mapsred/phpunit_tp_1.git``

After installing the project successfully. Place you command terminal in the project.


Install the dependencies
-------------

To install PHPUnit we using Composer

Optional : We have used the command below to install the last version of phpunit

``composer require phpunit/phpunit``

Use composer to install the project dependencies (phpunit/phpunit)

``composer install``


Use PHPUnit
-----------------

With the command below we can access to the list of all the phpunit commands

``./vendor/bin/phpunit``


Run the tests
-----------------

We want to run the phpunit tests for the ``\Utils\Exchange`` class

``./vendor/bin/phpunit tests/ExchangeTest.php``