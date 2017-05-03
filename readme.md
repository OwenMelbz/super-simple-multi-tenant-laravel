# Simple Multi Tenant Laravel App

## Database Schema for a Tenant
- /database/migrations/2017_05_03_195020_create_tenants_table.php
- /database/migrations/2014_10_12_000000_create_users_table.php

## Middleware which detects which tenant is active via domain
- /app/Http/Middleware/TenancyContract.php

## Tenant Model which stores some helper functions
- /Users/owen/Sites/multi/app/Tenant.php

## User model which uses the trait
- /Users/owen/Sites/multi/app/User.php
