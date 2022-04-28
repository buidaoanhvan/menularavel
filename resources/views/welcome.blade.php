<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0px;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
            background: #1bc2a2;
        }

        ul li {
            display: block;
            position: relative;
            float: left;
            background: #1bc2a2;
        }

        li ul {
            display: none;
        }

        ul li a {
            display: block;
            padding: 1em;
            text-decoration: none;
            white-space: nowrap;
            color: #fff;
        }

        ul li a:hover {
            background: #2c3e50;
        }

        li:hover > ul {
            display: block;
            position: absolute;
        }

        li:hover li {
            float: none;
        }

        li:hover a {
            background: #1bc2a2;
        }

        li:hover li a:hover {
            background: #2c3e50;
        }

        .main-navigation li ul li {
            border-top: 0;
        }

        ul ul ul {
            left: 100%;
            top: 0;
        }

        ul:before,
        ul:after {
            content: " ";
            /* 1 */
            display: table;
            /* 2 */
        }

        ul:after {
            clear: both;
        }

        .box-form {
            position: absolute;
            width: 500px;
            height: 500px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 10px;
            padding: 20px;
            box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
        }

        .title {
            text-align: center;
            margin-bottom: 20px;
        }

        label, input, select {
            display: block;
        }

        input {
            width: 300px;
            padding: 10px;
        }

        select {
            width: 325px;
            height: 30px;
        }

        button {
            margin-top: 10px;
        }
    </style>
</head>

<body>
<ul class="main-navigation">
    @foreach($menus as $menu)
        <li>
            <a href="#">{{ $menu->name }}</a>
            @include('submenu',['submenu' => $menu->subMenu])
        </li>
    @endforeach
</ul>

<div class='box-form'>
    <h1 class="title">Chỉnh Sửa Menu</h1>
    <div class="form-gr">
        <form action="{{ route('menus.store') }}" method="POST">
            @csrf
            <label for="input-menu-root">Thêm Menu Cha</label>
            <input type="text" id="input-menu-root" placeholder="Nhập tên menu cha" name="name"/>
            <input type="text" id="input-menu-root" placeholder="Nhập slug menu cha" name="slug"/>
            <button type="submit">them menu cha</button>
        </form>
    </div>
    <hr style="margin: 20px 0px">
    <div class="form-gr">
        <label for="input-menu-root">Thêm Menu Con</label>
        <form action="{{ route('menus.store') }}" method="POST">
            @csrf
            <input type="text" id="input-menu-root" placeholder="Nhập tên menu cha" name="name"/>
            <input type="text" id="input-menu-root" placeholder="Nhập slug menu cha" name="slug"/>
            <label for="input-menu-root">Thuộc Danh Mục Cha</label>
            <select id="menus" name="parent_id">
                @foreach($menuseting as $menu)
                    <option value="{{$menu->id}}">{{$menu->name}}</option>
                @endforeach
            </select>
            <button type="submit">them menu con</button>
        </form>
    </div>
</div>
</body>

</html>
