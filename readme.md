#Shotgun

A quiz maker app.

###How to Use

Clone the project:

```
git clone https://github.com/anchetaWern/shotgun.git
```

Navigate to the project directory and install the dependencies with [Composer](https://getcomposer.org/):

```
composer update
```

Create the database using something like phpmyadmin or heidisql, configure the database on `app/config/database.php` file and run the migrations:

```
php artisan migrate
```

If you need information regarding how to use the actual app, you can check out my blog post: [Introduction to Shotgun](http://wern-ancheta.com/blog/2015/10/25/introduction-to-shotgun/).

##License

The MIT License (MIT) Copyright (c)

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.