<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Trang Admin')
    </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    
    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/tailwind.output.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">

    
    <!-- Alpine.js -->
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
    
    <!-- Local JS - Init Alpine -->
    <script src="{{ asset('admin/assets/js/init-alpine.js') }}"></script>
    
    <!-- Chart.js CSS -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"
    />
    <link href="{{ asset('assets/libs/%40mdi/font/css/materialdesignicons.min.css') }}" rel="stylesheet"
        type="text/css" />
    
    <!-- Chart.js JS -->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
      defer
    ></script>
    <link rel="stylesheet" href="{{ asset('admin/assets/css/tailwind.css') }}" />
    <!-- Local JS - Charts -->
    <script src="{{ asset('admin/assets/js/charts-lines.js') }}" defer></script>
    <script src="{{ asset('admin/assets/js/charts-pie.js') }}" defer></script>
</head>
<body>
  <div class="flex bg-gray-50 dark:bg-gray-900 min-h-screen">
    @include('admin.inc.sidebar') 
    <div class="flex flex-col flex-1">
            @include('admin.inc.header')
            @yield('content')
        </div>
  </div>
        
    @include('admin.inc.footer')
</body>

</html>