PHPUnit Mocks
=============


Clone the project
-------------

To clone the project you have to have the permission.

If you have already the permission run the command below.

``git clone git@github.com:Mapsred/phpunit_tp_1.git``


Install the dependencies
-------------

To install PHPUnit we using Composer

We have used the command below to install the last version of phpunit

``composer require phpunit/phpunit``

Using composer we install the project dependencies (phpunit/phpunit)

``composer install``


Use PHPUnit
-----------------

With the command below we can access to the list of all the command of phpunit

``./vendor/bin/phpunit``


Run the tests
-----------------

We want to run the phpunit tests for the ``\Utils\Exchange`` class

``./vendor/bin/phpunit tests/ExchangeTest.php``