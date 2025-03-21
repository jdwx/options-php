# options-php

PHP module for managing arbitrary options

## Installation

You can require it directly with Composer:

```bash
composer require jdwx/options
```

Or download the source from GitHub: https://github.com/jdwx/options-php.git

## Requirements

This module requires PHP 8.3 or later.

## Usage

This module is designed to provide a simple interface for specifying a list of options while preserving type safety, avoiding duplicates, etc. It leans heavily on the PHP class system to differentiate options.

To use these module, create child interfaces of these two interfaces:

* OptionListInterface -> MyOptionListInterface
* OptionInterface -> MyOptionInterface

Then subclasses of each of the following classes, making the subclass implement the appropriate interface:

* OptionList implements MyOptionListInterface
* BooleanOption implements MyOptionInterface
* IntegerOption implements MyOptionInterface
* ListOption implements MyOptionInterface
* StringOption implements MyOptionInterface

Then, subclass your base option classes for each specific option you want to manage. (E.g., NameOption extends StringOption). No additional methods are required in these subclasses.

In your OptionList subclass, implement the set() static method using MyOptionInterface::class to specify the type of options it will contain. Then add methods using the appropriate fetchType() method to allow easy retrieval of the option values.

Once done, you can create an instance of your OptionList subclass and add options to it. You can then retrieve the options as needed.

For a practical usage example, see the jdwx/formfield module.

## Stability

This module is relatively new and has not been extensively deployed in production yet. The interface is mainly intended for internal use and should be considered fluid until at least v1.0.0 is reached.

## History

This module was refactored out of an existing codebase in early 2025.
