# Laravel Directives 
Laravel directivies which give you more functionality by using just short line of code.


## Installation

You can install the package via composer:

```
composer require dev-craft/lara-directives
```

## Usage

### @show

It will disaply the value of given object's property, only if its value is not null.

If the value is null or empty it will return 'N/A'


```
@show(object.property) 
```
