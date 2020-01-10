## Assessment task ##
1. [ Task description ](#task-description)
2. [ Requirements ](#requirements)
3. [ Project Set Up ](#setup)
4. [ Project Overview ](#overview)

<a name="task-description"></a>
### Task description ###
Create the following functionality in PHP OOP style without using any PHP framework. 
Imagine a store where products have prices per unit but also volume prices. 
E.g., bananas may be £1.00 each or 5 for £3.00.

Create an API that takes products in arbitrary order (similar to a checkout line)
and then returns the correct final price for the entire shopping basket based on the prices as applicable

Please use following products: 
```
Code | Price 
-------------------------------------------------- 
ZA | £2.00 each or 4 for £7.00 
YB | £12.00 
FC | £1.25 or £6 for a six pack
GD | £0.15
```
A top level point of sale terminal service is needed that looks something like this pseudo-code: 
```
$terminal->setPricing(...) 
$terminal->scanItem("ZA") $
terminal->scanItem("FC") 
$result = $terminal->getTotal()
```

It is up to you to design and implement the rest of the code as you wish, including how you specify the product prices. 
Following test cases must be shown to work in your program:
1. Scan items in this order: ZA,YB,FC,GD,ZA,YB,ZA,ZA; Verify the total price is £32.40. 
2. Scan items in this order: FC,FC,FC,FC,FC,FC,FC; Verify the total price is £7.25. 
3. Scan items in this order: ZA,YB,FC,GD; Verify the total price is £15.40.

<a name="requirements"></a>
### Requirements ###
* Docker
* Linux console
* PHP 7.4 compatible IDE for better experience

<a name="setup"></a>
### Project Set Up ###
* Clone repository;
* Type `make install` to install PHPUnit;
* Type `make dump-autoload` to generate autoload classes;
* Type `make test` to run tests;

You can try to break or test the system in `index.php`. To run this code enter `make exec` 

<a name="setup"></a>
### Project Overview ###
There is a short description of the project, its file structure and architectural solutions. 
The `src` folder contains the main files to solve [ the given task ](#task-description):
* `Contracts` folder provides us with interfaces that allow us to control integrity and some contracts in the 
    application:
    * `Terminal` is a contract for our shop "interface";
    * `Storage` contract can be useful when changing data storage or expanding business logic;
* I assumed that any VO(Value Objects) should be located in the `Entities` folder. For example now I only have a Price
 entity there, which provides functionality to work with a single price entity(e.g. price calculations, price value, productKey value).
 In theory, this `Price` entity can be divided into two entities - `Price` and `Product`, but since we don't have any specific
  information about product properties (such as color or size), I decided not to do it.
* `Storages` is my implementation of collections or some data providers. There are classes that should work with data storages in my opinion.
* `ShopTerminal` is the main interface for access to all functionality.
 
For the `tests`, I used the data sets that are provided in the task description. 
I added only high-level tests, because in my implementation the logic is quite primitive and does not require specific
 unit-tests in my opinion.
 
`Validators` store static rules to check user input.