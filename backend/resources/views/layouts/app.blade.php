<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
</head>
<body>
    <nav>
        <a href="/admin">Dashboard</a> |
        <a href="/admin/staff">Staff</a> |
        <a href="/admin/expenses">Expenses</a> |
        <a href="/admin/projects">Projects</a> |
        <a href="/admin/payments">Payments</a>
    </nav>
    <hr>
    <div>
        @yield('content')
    </div>
</body>
</html>
