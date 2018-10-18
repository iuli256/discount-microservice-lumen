

## Context
The solution is built on top of lumen (https://lumen.laravel.com/) a lightweight Laravel based php framework ('the perfect solution for building Laravel microservices' their presentation says).  

## Solution environment 
The project is built on top of Lumen microframework and also I have used Guzzle in order to call other api for Product and Customer
In order to run the solution you have to define the url for the api of Product and customer which is basically the public folder
of the current application. In my case I had a VM with Ubuntu on ip 10.10.10.210 so the setting from env was API=http://10.10.10.210/lumen/public/

## Solution features - Extensibility 
Discount Types are represented by classes implementing the IDiscount interface found in the ..\app\Discount\Interfaces.
Each such class has to implement the methods
- isDisountApplicable() : checking if the current discount is applicable to certain request context 
- applyDiscount : compute the actual discount as a value
- getName : receive the human readable name of the discount type

If a new discount type needs to be added, it will be implemented as a new implementation of the IDiscount interface, with the appropriate condition check and applyDiscount mechanics
	
	 
## Relevant code inside the solution 

Here is a selection of files included in the solution that are relevant to the problem presented (so as to differentiate them from the framework files).
Sourcecode includes comments describing the detailed functionality implemented.


  * ..\lumen\app\Discount\DiscountTools.php : 
	implements the "tools" type of discount. has methods to check if applicable as well as compute the discount
  * ..\lumen\app\Discount\DiscountAll.php : 
	implements the "all" type of discount. has methods to check if applicable as well as compute the discount
	
  * ..\lumen\app\Discount\DiscountSwitches.php
	implements the "switches" type of discount. has methods to check if applicable as well as compute the discount
  * ..\app\Http\Controllers\DiscountController.php
	main API endpoint controller - 	discount()
	dynamically checks all discount classes in app()->basePath().'/app/Discount' and applies the one that matches.
  * ..\lumen\app\Exceptions\Handler.php
	adds logging to exceptions
  * ..\lumen\app\Product.php
	mock calls to external api's for retrieving product data 
  * ..\lumen\app\Customer.php
	mock calls to external api's for retrieving customer data 
  * ..\lumen\app\Communication.php
	calls api's for products, customers 
  
  * ..\lumen\public\products.json
  * ..\lumen\public\customers.json
      data mocking external products and customer API's 
      
  * ..\lumen\tests\ExampleTest.php
	integration tests : 
	testBasicExample()
	testDiscountAllGetDiscount()
