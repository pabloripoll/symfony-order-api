# Basic Product Order API REST

## Requirements
* Symfony 5
* PHP 7.4
* MariaDB 10.5
* Apache 2.4.41

## Get the API credentials through admin user login
Method: [POST]
Route: /login
Request params:
```bash
json : 
{
    user: "admin@admin.com",
    password: "password",
}
```
response:
```bash
{
    Authorization: "Bearer <- Jwt string->"
}
```
#### Include above response in each following requests header on the following examples: 

## Create a new Product
Method: [POST]
Route: /product
Request params:
```bash
{
    json: 
    {
        name : "Double Burger",
        price : 20
    }
}
```
Response:
```bash
{
    id: 1,
    name: "Double Burger",
    price: 20,
}
```

## Create a new Order
Method: [POST]
Route: /order
Request params:
```bash
json : 
{

}
```
Response:
```bash
{
    id: 1,
    total_price: 0,
}
```

## Add or update Products List to an Order
Method: POST
Route: /order/product/add
Request params:
```bash
json : 
{
    id : 1,
    total_price : 30,
    products : [
        {
            id : 1,
            quantity : 1
        },
        {
            id : 2,
            quantity : 2
        }
    ]
}
```
Response:
```bash
{
    id : 1,
    total_price : 30,
    products : [
        {
            id : 1,
            quantity : 1
        },
        {
            id : 2,
            quantity : 2
        }
    ]
}
```

## Get an Order by ID
Method: GET
Route: /order/{orderID}
Response:
```bash
{
    id: 1,
    total_price: 30,
    products:
    [
        {
            id: 1,
            quantity: 1,
        },
        {
            id: 2,
            quantity: 2,
        }
    ]
}
```