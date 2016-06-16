# BranchLabs_Tracking
A collection of helpful scripts to be used with tracking pixels.

Provides out of the box functionality for
* Getting the current product's information safely.
* Getting the last order's information safely.
* Getting the current category's name.
* Getting the name of a category associated with a product.
* Busting out of Magento EE's full page cache.

```
> tree app/code/community/BranchLabs/Tracking/
app/
├── code
│   └── community
│       └── BranchLabs
│           └── Tracking
│               ├── Block
│               │   ├── Cachebuster.php
│               │   └── Default.php -- Where most of the functionality is stored
│               ├── etc
│               │   ├── cache.xml
│               │   └── config.xml
│               ├── Helper
│               │   └── Data.php
│               └── Model
│                   └── Placeholder.php
└── etc
    └── modules
        └── BranchLabs_Tracking.xml
```
