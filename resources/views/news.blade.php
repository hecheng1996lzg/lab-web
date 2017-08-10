@extends('layout')

@section('content')
    <main>
        <article class="content pWidth">
            <aside>
                <ul>
                    <li><a href="#">段落一</a></li>
                    <li><a href="#">新闻段落二</a></li>
                    <li><a href="#">测试段落三</a></li>
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