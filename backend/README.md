# 🔧 Project Cost Estimator – Backend

This is the **Laravel** backend for the **Project Cost Estimation System**, built with **GraphQL** using the **Lighthouse** package. It provides all data operations for projects, staff, office expenses, and payments, including smart logic for cost and payment calculations.

---

## 🧱 Tech Stack

- **Framework**: Laravel (v11+)
- **API**: Lighthouse (GraphQL)
- **Database**: SQLite (default)
- **Language**: PHP 8+

---

## 📁 Folder Structure

```

backend/
├── app/
│   ├── GraphQL/           # GraphQL Queries, Mutations, Resolvers
│   ├── Models/            # Laravel Eloquent models (Project, Staff, Expense, Payment)
│   └── ...
├── graphql/
│   ├── schema.graphql     # GraphQL schema definition
│   └── mutations/queries  # Custom queries/mutations
├── config/
│   └── lighthouse.php     # Lighthouse config (CORS, schema, etc.)
├── routes/
│   └── graphql.php        # GraphQL endpoint routing
└── database/
└── seeders/           # Seed data

````

---

## ⚙️ Setup Instructions

### 1. Install Dependencies

```bash
cd backend
composer install
````

---

### 2. Environment Setup

Copy and edit `.env`:

```bash
cp .env.example .env
```

Update `.env`:

```env
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
```

Create the SQLite file:

```bash
touch database/database.sqlite
```

---

### 3. Generate Keys and Run Migrations

```bash
php artisan key:generate
php artisan migrate --seed
```

---

### 4. Run Development Server

```bash
php artisan serve
```

Visit: [http://localhost:8000/graphql](http://localhost:8000/graphql)

---

## 🔗 GraphQL Playground

Use [GraphQL IDEs](https://altair.sirmuel.design/) like Altair, Postman, or Apollo Studio with endpoint:

```
http://localhost:8000/graphql
```

Example Query:

```graphql
query {
  projects {
    id
    name
    assumed_hours
    staff {
      id
      name
    }
    expenses {
      amount
    }
    payments {
      amount
    }
  }
}
```

---

## 📌 Project Logic

### On Project Creation:

* **Staff**: Linked by selected `staff_ids`
* **Expenses**: Auto-calculated:

  * `staffHourly = monthly_salary / 180`
  * `expense = staffHourly × assumed_hours` per staff
* **Payments**:

  * Total = staffCost + (officeHourly × assumed\_hours)

Everything is stored automatically with related records.

---

## 🔐 CORS Setup (if needed)

Edit `config/cors.php`:

```php
return [
  'paths' => ['graphql'],
  'allowed_origins' => ['http://localhost:3000'],
  'allowed_methods' => ['*'],
  'allowed_headers' => ['*'],
  'supports_credentials' => false,
];
```

Clear and cache config:

```bash
php artisan config:clear
php artisan config:cache
```

---

## 🧪 Testing Seeded Data

You can run test queries right away after:

```bash
php artisan migrate --seed
```

---

## 🛠 Troubleshooting

* ❌ **CORS Issues**: Ensure allowed origins are set properly in `config/cors.php`
* ❌ **Schema Error**: Double check `graphql/schema.graphql` and resolver bindings
* ❌ **404 on GraphQL**: Ensure Lighthouse is installed and `graphql` route is registered

---

## 🤝 Credits

Crafted with Laravel + Lighthouse GraphQL + ❤️ by Nuraj250.
