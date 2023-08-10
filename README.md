REQUIREMENTS
● Larave 6.x or latest

● MySQL or MariaDB

● Postman collection of API requests (Optional when a simple frontend is provided)

● A Git Repository of the source code.


EXERCISE DESCRIPTION

This is a 4 to 8 hours Laravel exercise. The main focus of this exercise is to gauge your

backend web API service development and database design skills. You can provide a simple

frontend design or share a Postman collection of API requests to test your work. The API must

have the following in the response:

● status_code - Must be the same as the HTTP response status codes of the resulting
request

● message - The response message. Can also be a validation error message.

● data - An array of records based on the requested results

● meta - The pagination details

○ total - Total records found

○ count - The current total records shown per page

○ per_page - The maximum records per page

○ current_page - The current page number

○ total_pages - The total pages available based on the provided per_page
value

○ links - Optional.

OUTPUT:

<img width="1231" alt="image" src="https://github.com/fgporazo/backend-exam/assets/66890979/adee14ce-0fce-46ef-9359-67551e98c227">

EXERCISE DETAILS
Create a web application that will list products from all available categories. In the list, include

the product’s thumbnail and details. If no product thumbnail is available, show a default product

image. Add a sorting and filtering options that will allow users to sort the list by its product name

alphabetically in ascending or descending order and filter the list by product category.

Below are the required modules:


● Dashboard (Landing Page)

○ List all active products showing its thumbnail image (if available) and the name of
the product from all categories.

○ The list should be paginated.

○ Show the product details with full description when a product from the list is
clicked.

○ Add a category filter that will list products based on the selected category. By
default, the selected filter should be “Show All”, which is a pseudo-category to list
all products from all categories.

○ Add a sort filter that will sort the list by its product name in ascending or
descending order.

○ (Optional) Add a search filter.

○ Soft-deleted products should not be visible in the list.

OUTPUT:

<img width="1372" alt="image" src="https://github.com/fgporazo/backend-exam/assets/66890979/e3b8d5a8-048d-4c69-9030-8afadc8cc5b1">

<img width="1374" alt="image" src="https://github.com/fgporazo/backend-exam/assets/66890979/57bb7360-e13c-44f9-b638-da8e41aec129">


● User Manager

○ List existing users sorted alphabetically by first name and last name in ascending
order.

○ Add / edit user with the following details:

(Note: username and email address must be unique)

■ Username

■ First Name

■ Middle Name

■ Last Name

■ Email Address

■ Password

○ Add validator for each input.

○ Delete user record using soft-deletion method.




● Category Manager

○ List existing categories sorted alphabetically in ascending order.

○ Add / edit category with the following details:

(Note: category name must be unique)

■ Category Name

■ Category Description

■ Product Manager

○ Add basic validation.

○ Delete category record using soft-deletion method.


OUTPUT:

<img width="1354" alt="image" src="https://github.com/fgporazo/backend-exam/assets/66890979/a2c408f8-67bd-4646-8e4e-d20baa63a291">



● Product Manager

○ List existing products, with thumbnail image, sorted by last updated or added in
descending order.

○ Add new or edit exiting products with the following details:
(Note: There’s no restriction if product name already existed as long as it has its
own unique id and SKU)

■ Product Name

■ Product SKU

■ Product Category

■ Product Description

■ Product Image (Allow image upload)

○ Delete product record using soft-deletion method


<img width="1380" alt="image" src="https://github.com/fgporazo/backend-exam/assets/66890979/4e183dbe-b318-46d0-addd-92d799d7fb6b">

