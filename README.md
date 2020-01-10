## Assessment task ##
1. [ Library overview ](#library)
2. [ Requirements ](#requirements)
3. [ Project Set Up ](#setup)
4. [ Project Overview ](#overview)

<a name="library"></a>
### Library overview ###
This application allows you to calculate the optimal price of products based on the specific prices for each quantity
 of products.

<a name="requirements"></a>
### Requirements ###
* Docker
* UNIX console
* PHP 7.4 compatible IDE for better experience

<a name="setup"></a>
### Project Set Up ###
* Clone repository;
* Type `make install` to install PHPUnit;
* Type `make dump-autoload` to generate autoload classes;
* Type `make test` to run tests;

You can try to break or test the system in `index.php`. To run this code enter `make exec` 

<a name="overview"></a>
### Project Overview ###
There is a short description of the project, its file structure and architectural solutions. 
The `src` folder contains the main files to solve [ the given task ](#library):
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

As an improvement in this application, I would like to increase test coverage. I was also thinking about redesigning the
 data layer, allowing it to work with any abstract storage. 
What I also missed was using the library as a stand-alone unit. I should add the ability to connect through a composer
 and use it in any project.