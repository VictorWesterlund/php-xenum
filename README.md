# PHP eXtended Enums

The missing quality-of-life features from PHP 8+ Enums.

This library adds a few useful traits to your PHP Enums that compliment existing builtins.

For example,

```php
use \victorwesterlund\xEnum;

enum HelloWorld: string {
    use xEnum;

    case FOO = "BAR";
    case BAZ = "QUX";
}

// Like Enum::tryFrom() but for Enum names instead of values
HelloWorld::fromName("FOO"); // HelloWorld::FOO
// .. and of course the non-throwing version
HelloWorld::tryFromName("MOM"); // null
```

# Methods

All methods implemented by this library

Method
--|
[Enum::fromName(int\|string\|null): static](#enumfromname)
[Enum::tryFromName(int\|string\|null): static\|null](#enumtryfromname)
[Enum::names(): array](#enumnames)
[Enum::values(): array](#enumvalues)

## Enum::fromName()

Resolve an Enum case from case name or throw `ValueError` if case not found.

Similar to: [Enum::from()](https://www.php.net/manual/en/language.enumerations.backed.php)

```php
Enum::fromName(int|string|null): static
```

Example:

```php
enum HelloWorld: string {
    use xEnum;
    
    case FOO = "BAR";
    case BAZ = "QUX";
}

HelloWorld::fromName("BAR"); // HelloWorld::FOO
HelloWorld::fromName("MOM") // ValueError: 'MOM' is not a valid case for HelloWorld
```

## Enum::tryFromName()

Resolve an Enum case from case name or return `null` if no match found

Similar to: [Enum::tryFrom()](https://www.php.net/manual/en/language.enumerations.backed.php)

```php
Enum::tryFromName(int|string|null): static|null
```

Example:

```php
enum HelloWorld: string {
    use xEnum;
    
    case FOO = "BAR";
    case BAZ = "QUX";
}

HelloWorld::tryFromName("BAR"); // HelloWorld::FOO
HelloWorld::tryFromName("MOM") // null
```

## Enum::names()

Return sequential array of Enum case names

```php
Enum::names(): array
```

Example:

```php
enum HelloWorld: string {
    use xEnum;
    
    case FOO = "BAR";
    case BAZ = "QUX";
}

HelloWorld::names(); // ["FOO", "BAZ"]
```

## Enum::values()

Return sequential array of Enum case values

```php
Enum::values(): array
```

Example:

```php
enum HelloWorld: string {
    use xEnum;
    
    case FOO = "BAR";
    case BAZ = "QUX";
}

HelloWorld::values(); // ["BAR", "QUX"]
```

# How to use

Requires PHP 8.0 or newer

1. **Install from composer**
    ```
    composer require victorwesterlund/xenum
    ```

2. **`use` in your project**
    ```php
    use \victorwesterlund\xEnum;
    ```

3. **`use` with your Enums**
    ```php
    enum HelloWorld {
        use xEnum;
    }
    ```
