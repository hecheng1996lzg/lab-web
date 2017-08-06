<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
    @yield('css')
    <script src="{{ asset('assets/script/jquery-3.1.1.js') }}"></script>
</head>
<body>
<header>
    <article class="pWidth-bg topMenu gr-bg">
        <section>
            <img src="{{ asset('assets/images/logo2.png') }}" alt="">
            <p class="wh">
                <strong>智能计算与系统实验室（Incas-lab）</strong>
                <span class="gr02"> Intelligent Computing and System</span>
            </p>
        </section>
        <section>
            <div class="search">
                <form>
                    <input type="text" value="" placeholder="search...">
                    <button></button>
                </form>
            </div>
            <nav>
                <ul class="wh">
                    <li class="active"><a href="#">首页</a></li>
                    <li><a href="#news">最新动态</a></li>
                    <li><a href="#team">研究团队</a></li>
                    <li><a href="#direction">研究方向</a></li>
                    <li><a href="#achievement">科研成果</a></li>
                    <li><a href="#">关于我们</a></li>
                    <li><a href="#">联系我们</a></li>
                </ul>
            </nav>
        </section>
    </article>
    @yield('banner')
</header>

@yield('content')

<footer class="gr-bg">
    <article class="pWidth">
        <p>&copy; Copy Rights 2017 ZJSYS All Rights Served</p>
    </article>
</footer>
</body>
</html>