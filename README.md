# Laravel Directives 
Laravel directivies which give you more functionality by using just short line of code.

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)

[![Open Issues](https://img.shields.io/github/issues/vishalribdiya/devcraft-lara-directives]

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

It will display the value of given object's property, only if its value is not null.

If the value is null or empty it will return 'N/A'



### @time

```
@time(object.property) 
```
it will disaply the time as default date format `Y-m-d H:i:s` 

now if `$user` has `created_at` property and i want to display it i will write below code.

`@time(user.created_at)`

### Custom time format using @time()

```
@time(object.property | H:i:s)
```

Its also supporting nested properties so you will use that too.

`@time(user.address.created_at)` 


### @human_time
It will return the human readable time from given datetime. e.g `1 minute ago`

```
@human_time(object.property)
```
