<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>popson | admin</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/tailwind.css') }}">

    <style type="text/css">
        input:checked ~ .dot {
          transform: translateX(100%);
          background-color: #48bb78;
        }
        input.custome-radio:checked ~ label span{
            border: none !important;
            font-weight: 700 !important;
        }
    </style>

    @livewireStyles
</head>
<body class="font-poppins ">
    @yield('content')
    
    @livewireScripts
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.8.0/alpine.js" defer></script>
</body>
</html>