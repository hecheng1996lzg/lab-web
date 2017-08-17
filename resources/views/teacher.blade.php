@extends('layout')

@section('css')
<link href="{{ asset('assets/font/demo.css') }}" rel="stylesheet"/>
<link href="{{ asset('assets/font/iconfont.css') }}" rel="stylesheet"/>
<link href="{{ asset('assets/css/index.css') }}" rel="stylesheet"/>
<link href="{{ asset('assets/css/team.css') }}" rel="stylesheet"/>
@stop

@section('content')
    <main>
        <article class="header">
            <section class="header-info pWidth">
                <div class="head-img">
                    <img src="{{ $teacher->photo }}" alt="" />
                </div>
                <ul>
                    <li><strong>{{ $teacher->name }}</strong></li>
                    <li><span>{{ $teacher->title }}</span></li>
                    <li><span>{{ $teacher->email }}</span></li>
                </ul>
            </section>
        </article>
        <article class="content pWidth">
            <aside>
                <ul>
                    <li><a href="#"><i class="icon iconfont icon-shouye"></i>简介</a></li>
                    <li><a href="#"><i class="icon iconfont icon-xihuan"></i>研究兴趣</a></li>
                    <li><a href="#"><i class="icon iconfont icon-gonglve"></i>教学&科研</a></li>
                </ul>
            </aside>
            <section>
                <div class="content-title">
                    <h1>个人简介</h1>
                </div>
                <div class="content-main">
                    <p>{{ $teacher->profile }}</p>
                </div>
                <div class="content-title">
                    <h1>研究方向</h1>
                </div>
                <div class="content-main">
                    <p>{{ $teacher->research_fields }}</p>
                </div>
                @if ($teacher->prize)
                    <div class="content-title">
                        <h1>获奖</h1>
                    </div>
                    <div class="content-main">
                        <p>{{ $teacher->prize }}</p>
                    </div>
                @endif
                @if ($teacher->teach)
                    <div class="content-title">
                        <h1>教学</h1>
                    </div>
                    <div class="content-main">
                        <p>{{ $teacher->teach }}</p>
                    </div>
                @endif
                <div class="content-title">
                    <h1>论文发表</h1>
                </div>
                <div class="content-main">
                    <p>{{ $teacher->publishment }}</p>
                </div>
            </section>
        </article>
    </main>
@stop
