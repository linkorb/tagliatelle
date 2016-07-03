# Tagliatelle: PDF generator for price-tags, badges, labels, etc

Tagliatelle allows you to define templates and page formats, and generate PDF labels based on record data (a csv, array, etc).

## Usage as a command-line tool

After cloning this repository to your local machine, make sure to install the dependencies:

    composer install

Then you can invoke Tagliatelle from the commandline as follows:

    ./bin/tagliatelle example/template.xml example/page.xml example/data.csv output.pdf
    
You can inspect the `example/template.xml` and `example/page.xml` to see how this works.
The `example/data.csv` file simply contains some test data that you can use.

Calling the above command will generate a new `output.pdf`, that you can preview like this:

    open output.pdf

## Usage as a library

Add the following to your composer.json of your project:

    "require": {
        "linkorb/tagliatelle": "~1.0"
    }
   
Run `composer update` to install the new project dependency.

Next, refer to the `example/` directory to see how to use the library.

You can either manually construct the templates and pages (`example/manual.php`) or use the included
loaders to load the template and page formats from xml files (`example/loaders.php`).

## Pasta!

In case you are very confused about what you just read, and you just came here for pasta, check out:

    https://www.youtube.com/watch?v=yrWJ2-fUw98
    
## License

MIT. Please refer to the [license file](LICENSE.md) for details.

## Brought to you by the LinkORB Engineering team

<img src="http://www.linkorb.com/d/meta/tier1/images/linkorbengineering-logo.png" width="200px" /><br />
Check out our other projects at [linkorb.com/engineering](http://www.linkorb.com/engineering).

Btw, we're hiring!
