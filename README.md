<p align="center"><img src="public/rcc_img/registration_of_coffee_consumption.png"></p>

## About

The web application is used for recording the coffee consumption by employees who are assigned to various departments. All employees and their data were created using the fake() function. The application is divided into a public and a non-public part.

Public part:

- Coffee (homepage).
- Coffee Consumption (overview).
- Login

Non-public part:
- Departments (CRUD) 
- Employees (CRUD)
- Notification
- Account Management
- Payments (CRUD)

## Coffee

The Coffee section displays a page with buttons showing the names of active employees. Clicking on an employee's name records the consumption of one coffee along with the date.

<p align="center"><img src="public/rcc_img/homepage.png"></p>

## Coffee Consumption

The application displays a page with a form that includes the selection of the month, year, and employee. Upon submission, an overview of the employee's coffee consumption for the specified period (list of times) and the total number of coffees is displayed.

<p align="center"><img src="public/rcc_img/searching.png"></p>

## Login

The non-public part is accessible after logging in. I have created a login form for this purpose. After logging into their account, the admin can manage the sections in the non-public part of the application.

<p align="center"><img src="public/rcc_img/user_login.png"></p>

## Departments

Complete department management (Create, Read, Update, Delete (CRUD)).

<p align="center"><img src="public/rcc_img/admin_department.png"></p>

## Employees

Complete employees management (CRUD).

<p align="center"><img src="public/rcc_img/admin_employee.png"></p>

## Notification

A webpage that includes a month selection and a button to send an email. The email contains the following message:

<p>
    Dobrý deň *NAME*,
</p>
<p>  
za mesiac *MONTH* evidujeme spotrebu kávy v počte *COFFEE NUMBER*.
<br>
            Sumu *COFFEE NUMBER x 0.3* € musíte uhradiť do *CURRENT DAY+ 7 DAYS*.
<br>
            Váš aktuálny zostatok na účte je *BALANCE ON THE ACCOUNT* €.
</p>
<p>
    S pozdravom, Administrátor. 
</p>

<p align="center"><img src="public/rcc_img/admin_notification.png"></p>

## Account Management

The webpage displays all employees in a table format with the following columns: Last Name | First Name | Income | Expenses | Difference. Additionally, it includes buttons to export the list to PDF and XLSX formats.

<p align="center"><img src="public/rcc_img/admin_account_management.png"></p>

## Payments

Complete payment management (CRUD) - credit creation.

<p align="center"><img src="public/rcc_img/admin_payments.png"></p>

## Cookies

Implementation of cookie consent.

<p align="center"><img src="public/rcc_img/cookies.png"></p>