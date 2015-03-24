sideload-serializer
===================

Minimal example for sideloading visitor to jms serializer based on https://gist.github.com/paulferrett/9751776

# installation #
- composer install
- php app/console doctrine:database:create
- php app/console doctrine:schema:update --force
- php app/console doctrine:fixtures:load

# test #
Test url: /token/sxcdftrbgyijmko

You can toogle with @JMS\MaxDepth in Token and User entity.

 Token::user | User::company | Result
-------------|-------------|-------------
     2 |    0 | company id is missing
     2 |    1 | company is sideloaded
     1 |    0 | company id is missing
     1 |    1 | company id is missing
