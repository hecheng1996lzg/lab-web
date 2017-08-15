@extends('layout')

@section('content')
    <main>
        <article class="content pWidth">
            <aside class="windowFixed">
                <ul>
                </ul>
            </aside>
            <section class="content-main">
            {!! $content !!}
                <div class="bottom">
                    <span>发布日期：{{ $new->date }}</span>
                </div>

            </section>
        </article>
    </main>
@stop

@section('css')
    <link  href="{{ asset('assets/font/iconfont.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/index.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/team.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/new.css') }}" rel="stylesheet">
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