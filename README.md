# 💼 Project Cost Estimation System

A full-stack web application for managing and estimating project costs. This system includes:

- 💻 **Frontend**: Next.js + Apollo Client + Tailwind CSS (Glass UI)
- 🔧 **Backend**: Laravel 11 + Lighthouse (GraphQL) + SQLite
- ⚙️ Smart logic to auto-calculate staff costs, office expenses, and payments.

---

## 📁 Project Structure

```

project-cost-estimator/
├── backend/              # Laravel + Lighthouse GraphQL API
│   ├── app/Models/
│   ├── app/GraphQL/
│   ├── graphql/schema.graphql
│   └── ...
├── frontend/             # Next.js + TailwindCSS (Glass UI)
│   ├── src/pages/
│   ├── src/components/
│   ├── src/graphql/
│   └── ...

````

---

## 🚀 Features

- Create and manage projects with team members.
- Auto-calculate:
  - Staff expenses based on hours and monthly salary
  - Office expenses based on fixed hourly cost
  - Total payments
- Beautiful glass UI with light and dark themes.

---

## ⚙️ Tech Stack

### Frontend

- Next.js
- TypeScript
- Apollo Client
- Tailwind CSS (Glassmorphism UI)

### Backend

- Laravel 11
- Lighthouse GraphQL
- SQLite
- PHP 8+

---

## 🔧 Setup Instructions

### Prerequisites

- Node.js 18+
- PHP 8.2+
- Composer

---

### 1️⃣ Backend Setup (Laravel + GraphQL)

```bash
cd backend
composer install
cp .env.example .env
touch database/database.sqlite
php artisan key:generate
php artisan migrate --seed
php artisan serve
````

> 📍 Backend runs at: `http://localhost:8000/graphql`

Ensure CORS is configured for frontend access:
`config/cors.php`:

```php
return [
  'paths' => ['graphql'],
  'allowed_origins' => ['http://localhost:3000'],
  'allowed_methods' => ['*'],
  'allowed_headers' => ['*'],
];
```

Then:

```bash
php artisan config:clear
php artisan config:cache
```

---

### 2️⃣ Frontend Setup (Next.js + Apollo)

```bash
cd frontend
npm install
npm run dev
```

> 📍 Frontend runs at: `http://localhost:3000`

---

## 🔄 Smart Cost Logic

* **Staff Cost** = `(monthly_salary / 180) × assumed_hours`
* **Office Expense** = `office_hourly_rate × assumed_hours`
* **Total Payment** = `staff_total_cost + office_expense`
* Data is auto-generated on project creation.

---

## 🔍 Example GraphQL Query

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
      id
      amount
    }
    payments {
      id
      amount
      status
    }
  }
}
```

---

## 🖼 UI Highlights

* Glassmorphism cards and inputs
* Mobile responsive layout
* Sidebar navigation with routes:

  * Home
  * Add Project
  * Cost Summary
  * Simulate Payment (optional)

---

## 🧪 Testing

* Use Altair or Postman for GraphQL queries.
* All seeders provide demo data out of the box (`php artisan migrate --seed`).

---

## 📦 Future Enhancements

* Role-based admin/user auth
* Export report PDF/CSV
* Project timeline Gantt chart
* Real-time estimation updates

---

## 🤝 Author

Built by Nuraj
Custom stack with Laravel + Lighthouse and modern Glass UI design.

---

## 📝 License

MIT – use it for client projects or internal tools.
