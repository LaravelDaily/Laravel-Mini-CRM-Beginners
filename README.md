# Mini-CRM in Laravel for Beginners

This is a small task for Laravel newcomers to create their first small project and practice their skills on basic CRUD application.

This repository is a solution to the project description below.

![](https://laraveldaily.com/uploads/2024/09/minicrm-screenshot-1.png)

![](https://laraveldaily.com/uploads/2024/09/minicrm-screenshot-2.png)

---

## Project Description

### Intro

- Install Laravel and Laravel Breeze starter kit
- Use plain Blade, no Vue/Livewire needed in this project

---

### Manage Users

- Change column `users.name` into separate `first_name` and `last_name`
- Use SoftDeletes in all Models
- CRUD for managing users
- Use pagination in this and all other CRUDs
- Seed 10 "fake" users for testing

---

### Introduce Roles

- Install Spatie Laravel Permission package
- Seed two roles: "admin" and "user"
- Seed one Admin user, Breeze registration should add users with "User" role
- The "Users" CRUD from above should be available only to Admin user

---

### Three More CRUDs

Create three more CRUDs, here are their DB columns:

**Clients** (all columns are string)
- contact_name
- contact_email
- contact_phone_number
- company_name
- company_address
- company_city
- company_zip
- company_vat

**Projects**

- title (string)
- description (text)
- user_id (foreign key)
- client_id (foreign key)
- deadline_at (date)
- status: one of the options of 'open', 'in progress', 'blocked', 'cancelled', 'completed'

**Tasks**

- title (string)
- description (text)
- user_id (foreign key)
- client_id (foreign key)
- project_id (foreign key)
- deadline_at (date)
- status: one of the options of 'open', 'in progress', 'pending', 'waiting client', 'blocked', 'closed'

Create Factories and Seeders for all those tables, seed 20-50 fake records.

Introduce Permissions: Admin role can manage everything, User role can see all entries and create/update them but NOT delete them.
