<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'HelpDesk')</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f3f4f6;
            color: #1f2937;
        }

        header {
            background: #1e3a8a;
            color: white;
            padding: 20px 8%;
        }

        header h1 {
            margin: 0 0 12px;
        }

        nav a {
            color: white;
            margin-right: 20px;
            text-decoration: none;
        }

        main {
            max-width: 1100px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            padding: 24px;
            border-radius: 10px;
            box-shadow: 0 2px 8px #00000010;
        }

        .button {
            display: inline-block;
            background: #1d4ed8;
            color: white;
            padding: 10px 16px;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            cursor: pointer;
        }

        .button:hover {
            background: #1e40af;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .error {
            color: #b91c1c;
            font-size: 14px;
        }

        input, textarea, select {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
        }

        label {
            display: block;
            margin-top: 16px;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #e5e7eb;
            text-align: left;
        }

        th {
            background: #f9fafb;
        }
    </style>
</head>
<body>
    <header>
        <h1>HelpDesk</h1>

        <nav>
            <a href="{{ route('tickets.index', [], false) }}">Solicitudes</a>
            <a href="{{ route('tickets.create', [], false) }}">Nueva solicitud</a>
        </nav>
    </header>

    <main>
        @if (session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>