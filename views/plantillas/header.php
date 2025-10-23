<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo ?? 'Sistema Escolar'; ?></title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style type="text/tailwindcss">
        @theme {
            --color-primary: #8B1A1A;
            --color-secondary: #5c1010;
            --color-accent: #3498db;
            --color-success: #27ae60;
            --color-danger: #e74c3c;
            --color-warning: #f39c12;
        }
    </style>
    <!-- Nuestros Css -->
    <link rel="stylesheet" href="public/Assets/css/style.css">
</head>
<body class="m-0 p-0">