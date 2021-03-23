# rectorphpdemo

PHP code samples to upgrade

## install

```bash
composer install
```

## rector usage examples

```bash
vendor/bin/rector process src --dry-run
```
```bash
docker run --rm -v $(pwd):/project rector/rector:latest process src --dry-run
```

will show differences but not modify files

```bash
vendor/bin/rector process src
```
```bash
docker run --rm -v $(pwd):/project rector/rector:latest process src
```
will modify files

## learn more 

- [rectorphp on github](https://github.com/rectorphp/rector)
- [list of usable nodes](https://github.com/rectorphp/php-parser-nodes-docs/)
