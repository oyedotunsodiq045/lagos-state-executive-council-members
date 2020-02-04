# LAGOS STATE EXECUTIVE COUNCIL MEMBERS API - LSECM

This API returns an/list (of) executive(s) of the Lagos State Council Members.

# Quick Start

Import the executive.sql file, change the params in the config/Database.php file to your own

### Testing

### Executives

#### Get all Executives

* Method - GET

* URL - http://localhost/lsecm/api/executive/read.php

* Sample Response

```
{
    "status": true,
    "message": "Executives Found",
    "data": [
        {
            id: "1",
            title: "Mr",
            full_name: "Babajide Sanwo-Olu",
            portfolio: "Governor",
            email: "bosgov@lagosstate.gov.ng",
            contact: "2349017077777"
        },
        {
            id: "2",
            title: "Mr",
            full_name: "Babajide Sanwo-Olu",
            portfolio: "Governor",
            email: "bosgov@lagosstate.gov.ng",
            contact: "2349017077777"
        },
        {
            id: "3",
            title: "Mr",
            full_name: "Babajide Sanwo-Olu",
            portfolio: "Governor",
            email: "bosgov@lagosstate.gov.ng",
            contact: "2349017077777"
        },
        {
            id: "4",
            title: "Mr",
            full_name: "Babajide Sanwo-Olu",
            portfolio: "Governor",
            email: "bosgov@lagosstate.gov.ng",
            contact: "2349017077777"
        },
        ...
    ]
}
```

#### Get an Executive

* Method - GET

* URL - http://localhost/lsecm/api/executive/read_single.php?id=1

* Sample Response

```
{
    "status": true,
    "message": "Executive Found",
    "data": {
        id: "1",
        title: "Mr",
        full_name: "Babajide Sanwo-Olu",
        portfolio: "Governor",
        email: "bosgov@lagosstate.gov.ng",
        contact: "2349017077777"
    }
}
```

#### Search an Executive - name, email or contact

* Method - GET

* URL - http://localhost/lsecm/api/executive/search.php?s=babajide

* Sample Response

```
{
    "status": true,
    "message": "Searched Executive Found",
    "data": [
        {
            id: "1",
            title: "Mr",
            full_name: "Babajide Sanwo-Olu",
            portfolio: "Governor",
            email: "bosgov@lagosstate.gov.ng",
            contact: "2349017077777"
        }
    ]
}
```

### Author

### Version

0.0.1

### License

This project is licensed under the MIT License