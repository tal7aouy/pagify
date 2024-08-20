# Pagify

![GitHub Workflow Status](https://img.shields.io/github/workflow/status/tal7aouy/pagify/CI)
![Packagist](https://img.shields.io/packagist/v/tal7aouy/pagify)
![License](https://img.shields.io/github/license/tal7aouy/pagify)
![PHP](https://img.shields.io/badge/php-%3E%3D8.0-blue)

**Pagify** is a modern PHP library for handling JSON pagination efficiently. Designed to be simple yet powerful, this library helps you paginate data seamlessly for APIs and web applications.

## Features

-   **Easy Integration**: Simple to use with minimal setup.
-   **Flexible Configuration**: Customize page size and pagination behavior.
-   **Error Handling**: Graceful handling of invalid parameters.
-   **CLI Tool**: Command-line utility for quick testing and usage.
-   **Logging**: Built-in logging for debugging and monitoring.

## Installation

You can install Pagify using Composer:

```bash
composer require tal7aouy/pagify
```

## Usage

### Basic Usage

```php
use Tal7aouy\Pagify\JsonPaginator;
use Tal7aouy\Pagify\PaginatorFactory;

$items = range(1, 100); // Example data
$totalItems = count($items);
$paginator = PaginatorFactory::createPaginator($items, $totalItems, 1, 10);

echo $paginator->toJson();
```

### CLI Tool

To use the CLI tool, run:

```bash
./pagify <currentPage> <perPage>
```

Example:

```bash
./pagify 2 10
```

## Configuration

You can configure default settings in `config/paginator.php`:

```php
return [
    'default_per_page' => 10,
];
```

## Testing

### Unit Tests

Run unit tests with PestPHP:

```bash
composer test
```

### Example Test

```php
it('paginates data correctly', function () {
    // Test code here...
});
```

## Contributing

Contributions are welcome! Please open an issue or submit a pull request. For more details, see [CONTRIBUTING.md](CONTRIBUTING.md).

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---

Made with ❤️ by [Mhammed Talhaouy](https://github.com/tal7aouy)
