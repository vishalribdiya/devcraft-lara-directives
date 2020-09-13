# Laravel Directives 
Laravel directivies which give you more functionality by using just short line of code.


## Installation

You can install the package via composer:

```
composer require "dev-craft/lara-directives":"dev-master"
```

## Usage

### @show

```
@show(object.property) 
```
Where Object should be the variable name and the property should be its property.

e.g lets say i have `$user` variable and i want to show the `username` from it. it will write below code.

`@show(user.username)`

It will disaply the value of given object's property, only if its value is not null.

If the value is null or empty it will return 'N/A'


