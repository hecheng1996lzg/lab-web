@extends('layout')

@section('css')
    <link  href="{{ asset('assets/font/iconfont.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/index.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/team.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/new.css') }}" rel="stylesheet">
@stop

@section('content')
    <main>
        <article class="header">
            <section class="header-info pWidth">
                <div class="head-img">
                    <img src="{{ asset('assets\images\team\teacher') }}\{{ $teacher->photo }}" alt="" />
                </div>
                <ul>
                    <li><strong>{{ $teacher->name }}</strong></li>
                    <li><span>{{ $teacher->title }}</span></li>
                    <li><span>{{ $teacher->email }}</span></li>
                </ul>
            </section>
        </article>
        <article class="content pWidth">
            <aside class="windowFixed">
                <ul>
                </ul>
            </aside>
            <section class="content-main">
                @if($teacher->profile)
                    <h2>个人简介</h2>
                    <p>{{ $teacher->profile }}</p>
                @endif

                @if($teacher->research_fields)
                    <h2>研究方向</h2>
                    <p>{{ $teacher->research_fields }}</p>
                @endif

                @if($teacher->prize)
                    <h2>获奖</h2>
                    <p>{{ $teacher->prize }}</p>
                @endif

                @if($teacher->teach)
                    <h2>教学</h2>
                    <p>{{ $teacher->teach }}</p>
                @endif

                @if($teacher->publishment)
                    <h2>论文发表</h2>
                    <p>{{ $teacher->publishment }}</p>
                @endif
            </section>
        </article>
    </main>
@stop
@section('script')
    <script>
        $(function () {
            var titles = $('h2');
            titles.each(function () {
                $('.windowFixed ul').append('<li><a href="#">'+$(this).html()+'</a></li>');
            })
            $('.windowFixed li').click(function () {
                $(this).addClass('active').siblings().removeClass('active');
                var scrollTop = $(titles[$(this).index()]);
                scrollTop = scrollTop.offset().top - 100;
                $('html, body').animate({
                    scrollTop: scrollTop
                }, 100);
            })
        })
    </script>
@stop