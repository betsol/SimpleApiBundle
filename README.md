# SimpleApiBundle

## Description

### Features

## Installation

### Install library with Composer

`composer require betsol/simple-api-bundle ~1`

### Add bundle to your application's kernel

``` php
// app/AppKernel.php

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            ...
            new Betsol\Bundle\SimpleApiBundle\SimpleApiBundle,
        );

        ...
    }
}
```

### Introduce bundle configuration to your config file

``` yaml
# app/config/config.yml

simple_api: ~
```

## Usage

## API

## To Do

- exception handling
- extract final response generation to the separate class
- add support for simple data controller result
- add support for Doctrine's Pagination controller result

## Feedback

If you have found a bug or have another issue with the library - please [create an issue][new-issue]
in this GitHub repository.

If you have a question - file it with [StackOverflow][so-ask] and send a
link to [my E-Mail address][email]. I will be glad to help.

Have any ideas or propositions? Feel free to [contact me][email].

Cheers!

## License

The MIT License (MIT)

Copyright (c) 2014 Better Solutions, Slava Fomin II <s.fomin@betsol.ru>

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.

[so-ask]: http://stackoverflow.com/questions/ask?tags=php,symfony2
[email]: mailto:s.fomin@betsol.ru
[new-issue]: https://github.com/betsol/SimpleApiBundle/issues/new
