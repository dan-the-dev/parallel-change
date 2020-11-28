## Install dev dependencies
    composer install
    
## Run all code
    composer run
    
## Run only unit tests
    composer test

## Info about this run
    I'm not sure of the correct interpretation of the purpose. The exercise is to refactor Shopping Cart in order to offer new funcionality of adding more items to the Cart, currently supporting a single item.
    The requirements is to always stay green applying Parallel Change, but in that pattern I should also use TDD to write red tests before, so I'm not sure if this is allowed.

    For this time, I will add new tests that of course will fail, then become green. 
    The path will be:
    - add new test
    - add new functionality in parallel
    - all tests green
    - remove old funcionality and tests
    - all tests still green