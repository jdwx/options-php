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

A simple example of the intended usage is provided in the example directory. For a practical usage example, see the jdwx/formfield module.

## Stability

This module is relatively new and has not been extensively deployed in production yet. The interface is mainly intended for internal use and should be considered fluid until at least v1.0.0 is reached.

## History

This module was refactored out of an existing codebase in early 2025.
