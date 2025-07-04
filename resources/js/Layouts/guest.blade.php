<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>{{ $title ?? 'Dishly' }}</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
  @vite('resources/css/app.css')

  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
  </style>
</head>
<body class="bg-[#FFE6B4] text-[#5B3228] min-h-screen flex flex-col">
  @include('components.public.header')

  <main class="flex-grow flex items-center justify-center px-6">
    {{ $slot }}
  </main>

  @include('components.public.footer')
</body>
</html>