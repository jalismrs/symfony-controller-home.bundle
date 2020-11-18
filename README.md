# symfony.bundle.home

Adds a route to access home with its template

## Test

`phpunit` or `vendor/bin/phpunit`

coverage reports will be available in `var/coverage`

## Configuration
```yaml
# config/packages/jalismrs_home.yaml
jalismrs_home:
    main:
        id: 'app'
    css:
        'dist/main.css'
    js:
        'dist/main.js'
```
```yaml
# config/routes.yaml
_index:
    controller: 'jalismrs_home.home_controller::index'
    path: '/{catchAll}'
    requirements:
        catchAll: "^.*$"
```
