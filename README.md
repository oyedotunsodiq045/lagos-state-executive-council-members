# LAGOS STATE EXECUTIVE COUNCIL MEMBERS API - LSECM

This API returns the members of the Lagos State Executive Council.

# Quick Start

Import the executives.sql file, change the params in the config/Database.php file to your own

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
            title: "Dr",
            full_name: "Kadri Obafemi-Hamzat",
            portfolio: "Deputy Governor",
            email: "kohdg@lagosstate.gov.ng",
            contact: "2348032215026"
        },
        {
            id: "3",
            title: "Mrs",
            full_name: "Sherifat Folashade Jaji",
            portfolio: "Secretary to the State Government",
            email: "sjaji@lagosstate.gov.ng",
            contact: "2348023122483"
        },
        {
            id: "4",
            title: "Mr",
            full_name: "Hakeem Muri-Okunola",
            portfolio: "Head of Service",
            email: "hmo@lagosstate.gov.ng",
            contact: "2348034030236"
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

#### View on Docgen

* URL - http://soyedotunprojectdemos.000webhostapp.com/lsecm/index.html
* LOCAL_URL - http://localhost/lsecm/api/executive/index.html

![Task screenshot](screenshot.png)

### Author

Sodiq Oyedotun
[GTech Inc](http://mba-ies-fps.000webhostapp.com/sodiqoyedotun.com/index.html)

### Version

0.0.1

### License

This project is licensed under the MIT License