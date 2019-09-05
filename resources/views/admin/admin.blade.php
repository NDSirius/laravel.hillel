<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel.hillel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        nav {
            margin: 100px 0;
            background-color: #E64A19;
        }

        /* убираем отступы и поля, а также list-style для "ul",
         * и добавляем "position:relative" */
        nav ul {
            padding:0;
            margin:0;
            list-style: none;
            position: relative;
        }

        /* применяем inline-block позиционирование к элементам навигации */
        nav ul li {
            margin: 0px -7px 0 0;
            display:inline-block;
            background-color: #E64A19;
        }

        /* стилизуем ссылки */
        nav a {
            display:block;
            padding:0 10px;
            color:#FFF;
            font-size:20px;
            line-height: 60px;
            text-decoration:none;
        }

        /* изменяем цвет фона при наведении курсора */
        nav a:hover {
            background-color: #000000;
        }
        nav ul ul {
            display: none;
            position: absolute;
            top: 100%;
        }

        /* отображаем выпадающий список при наведении */
        nav ul li:hover > ul {
            display:inherit;
        }

        /* первый уровень выпадающего списка */
        nav ul ul li {
            min-width:170px;
            float:none;
            display:list-item;
            position: relative;
        }
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>

<div class="flex-center position-ref full-height">
    <div class="top-right links">

        <a href="{{ route('logout') }}"
           onclick="event.preventDefault();
      document.getElementById('logout-form').submit();">
            Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>


    <div class="content">
        <div class="title m-b-md">
            Amdin Page
        </div>
        <nav>
            <ul>
                <li><a>Products</a>
                    <ul>
                        <li><a  href="{{ route('product') }}">Show products</a></li>
                        <li><a href="{{ route ('admin.products.create') }}">Create product</a></li>
                    </ul>
                </li>
                <li><a >Categories</a>
                    <ul>
                        <li><a href="{{ route ('category') }}">Show categories</a></li>
                        <li><a href="{{ route ('admin.categories.create') }}">Create category</a></li>
                    </ul>
                </li>
                <li><a >Users</a>
                    <ul>
                        <li><a href="{{ route ('admin.admin.users') }}">Show users</a></li>
                    </ul>
                </li>
                <li><a >Orders</a>
                    <ul>
                        <li><a href="{{ route ('admin.admin.orders') }}">Show orders</a></li>
                        <li><a href="{{ route ('admin.orders.create') }}">Create orders</a></li>
                        <li><a href="{{ route ('admin.orders.edit') }}">Edit orders</a></li>

                    </ul>
                </li>

            </ul>
        </nav>

    </div>
</div>
</body>
</html>
