# 💎 Project Cost Estimator – Frontend

This is the **Next.js** frontend for the **Project Cost Estimation System**. It features a modern glassmorphism UI, GraphQL integration with Apollo Client, and modular views for Projects, Staff, Expenses, and Simulated Payments.

---

## 🚀 Tech Stack

- **Framework**: Next.js (App Router)
- **UI**: Tailwind CSS with glass UI design
- **GraphQL Client**: Apollo Client
- **API**: Laravel + Lighthouse (GraphQL)
- **Language**: TypeScript

---

## 📁 Folder Structure

```

frontend/
├── public/                  # Static assets
├── src/
│   ├── components/          # Reusable UI components (e.g. ProjectForm)
│   ├── graphql/             # GraphQL queries/mutations
│   ├── pages/               # Pages: index.tsx, add.tsx, cost.tsx, simulate.tsx
│   ├── styles/              # Global CSS
│   └── utils/               # API config
├── .env.local               # Apollo client endpoint
├── tailwind.config.js
└── tsconfig.json

````

---

## 🔧 Setup Instructions

### 1. Install Dependencies

```bash
cd frontend
npm install
````

---

### 2. Configure Environment

Create a `.env.local` file:

```env
NEXT_PUBLIC_GRAPHQL_ENDPOINT=http://localhost:8000/graphql
```

Update this if your Laravel backend runs on a different host or port.

---

### 3. Run the App

```bash
npm run dev
```

Visit [http://localhost:3000](http://localhost:3000) in your browser.

---

## 🧠 Features

* 🧱 **Project Listing**
* 🆕 **Add Project** with staff, hours, auto-expense and payment calculation
* 📊 **View Cost Summary**
* 💸 **Simulate Payment**
* 🌈 Beautiful **glass UI design** with dark/light contrast

---

## 🔗 Backend

Make sure the backend is running: [Laravel + Lighthouse GraphQL Server](http://localhost:8000/graphql)

---

## 🛠 Dev Tips

* GraphQL queries and mutations are organized in `/src/graphql/`
* UI components like `ProjectForm` are in `/src/components/`
* Use `Apollo DevTools` to inspect queries in browser

---

## 🤝 Credits

Developed with ❤️ using Next.js, Tailwind, and Apollo by Nuraj.
```
