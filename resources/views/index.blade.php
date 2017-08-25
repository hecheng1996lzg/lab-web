@extends('layout')

@section('css')
    <link href="{{ asset('assets/css/index.css') }}" rel="stylesheet">
@stop
@section('script')
    <script src="{{ asset('assets/script/main.js') }}"></script>
    <script>
        $(function () {
            $('.topMenu nav a').click(function (e) {
                e.preventDefault();
                var href = $(this).attr('href');
                $(this).parent().addClass('active').siblings().removeClass('active');
                menuScroll(href);
            })
            function menuScroll(href){
                var active = href.match(/menuActive=(\w+)/);
                if(!active)return false;
                active = active[1];

                $('html, body').animate({
                    scrollTop: $("#"+active).offset().top
                }, {{ $scrollTime }});

            }

            menuScroll(window.location.href);
        })
    </script>
@stop
@section('banner')
    <article class="banner">
        <div>
            <p>欢迎加入</p>
            <p>浙江大学计算机学院</p>
            <p>智能计算与系统实验室（Incas-lab）</p>
        </div>
    </article>
@stop

@section('content')
<main>
        <article id="news" class="news pWidth">
            <h1><span>最新动态</span></h1>
            <section>
                <div class="news-list">
                    <ul class="gr">
                        @foreach($news as $new)
                        <li data-newImg="{{ getImgSrc('assets\images\news\new'.$new->id) }}"><a href="{{ asset('news/'.$new->id) }}">{{ date('Y-m-d',strtotime($new->date)) }} {{ $new->title }}</a></li>
                        @endforeach
                    </ul>
                    <div class="pagination-wrapper">{{ $news->appends(['menuActive' => 'news','scrollTime' => 0])->links() }}</div>
                </div>
                <div class="news-img">
                    <div>
                        <a href="#"><img src="assets/images/news/new1.png" alt=""></a>
                    </div>
                </div>
            </section>
        </article>
        <article id="team" class="team pWidth-bg">
            <h1 class="wh"><span>研究团队</span></h1>
            <nav class="tog-tag">
                <div class="active">
                    <strong>教师</strong>
                    <ul></ul>
                </div>
                <div>
                    <strong>学生</strong>
                    <ul></ul>
                </div>
                <div>
                    <strong>访学</strong>
                    <ul></ul>
                </div>
            </nav>
            <section>
                <div class="left"></div>
                <ul class="team-main wh img-path">
                    {!! $teams['content'] !!}
                </ul>
                <div class="right"></div>
            </section>
        </article>
        <article id="direction" class="direction">
            <h1><span>研究方向</span></h1>
            <section class="pWidth">
                <ul class="img-path gr">
                    <li>
                        <img src="assets/images/direction/virtualization.jpg" alt="">
                        <div>
                            <p><strong>云计算系统虚拟化技术</strong></p>
                            <p>
                                <em>虚拟化计算系统的评测</em>
                                <span>包括性能分析预测模型、在线迁移评测方法、可配置的评测工具</span>
                            </p>
                            <p>
                                <em>虚拟化性能优化</em>
                                <span>虚拟化CPU锁优化调度、虚拟化NUMA调度优化</span>
                            </p>
                            <p>
                                <em>虚拟计算系统动态资源调度</em>
                                <span>
                                    虚拟集群和云平台系统的资源分配、动态资源调度算法，包括初始放置、负载均衡、负载状态检测、负载配置与动态优化，亲和性调度等。
                                    近年来，团队在该领域承担了国家973课题、国家自然科学基金、校企合作等项目多项，同时与华为公司、中兴公司等名企公司，与中科院等有紧密合作。
                                    已发表SCI/EI论文20多篇，申请与授权专利超过15项。
                                </span>
                            </p>
                        </div>
                    </li>
                    <li>
                        <img src="assets/images/direction/ml.jpg" alt="">
                        <div>
                            <p><strong>机器学习与数据挖掘</strong></p>
                            <p>
                                <em>数据挖掘算法</em>
                                <span>包括稀有类挖掘、同位模式挖掘、社会网络分析等方面的算法</span>
                            </p>
                            <p>
                                <em>以数据挖掘为基础的大数据分析应用研究</em>
                                <span>
                                    包括移动网络数据挖掘、交通大数据分析、环保大数据分析等等。已在SIGIR\ICDE\SDM\PAKDD以及ESWA\KAIS\JIIS
                                    等重要国际会议和期刊上发表相关SCI/EI论文30多篇。
                                </span>
                            </p>
                        </div>
                    </li>
                    <li>
                        <img src="assets/images/direction/blockchain.jpg" alt="">
                        <div>
                            <p><strong>高性能计算和区块链技术</strong></p>
                            <p>
                                <em>基于高性能的区块链平台</em>
                                <span>
                                    利用FPGA等加速提升区块链底层关键算法，优化的异步拜占庭共识算法，团队负责的学生超算团队
                                    曾率浙大队获世界超算竞赛最高计算性能奖并打破世界纪录
                                </span>
                            </p>
                            <p>
                                <em>校企合作平台</em>
                                <span>
                                    团队与杭州云象网络技术有限公司联合成立了云象区块链学生实训基地，开展区块链技术产学研紧密合作。
                                    在区块链方面已发表SCI/EI论文2篇，积累专利成果超过10项，另有出版区块链专著1部。
                                </span>
                            </p>
                        </div>
                    </li>
                    <li>
                        <img src="assets/images/direction/gis.png" alt="">
                        <div>
                            <p><strong>地理系统平台与应用研发</strong></p>
                            <p>
                                <em>地理信息系统技术与平台</em>
                                <span>
                                    经过近20年持续开发的GNet地理信息平台已经形成了包括二三维、Web端、移动端体系完整的地理信息平台，已申请专利多项
                                </span>
                            </p>
                            <p>
                                <em>广泛应用的地理信息平台</em>
                                <span>
                                    研发的地理信息应用几乎涉及每一个GIS的主要应用领域，尤其是在智慧环保、智慧水利、智慧交通、智慧海洋、智慧旅游、
                                    智慧水务等领域居国内领先水平。
                                </span>
                            </p>
                        </div>
                    </li>
                </ul>
            </section>
        </article>
        <article id="achievement" class="achievement">
            <h1><span>科研成果</span></h1>
            <nav class="tog-tag">
                <div class="active">
                    <strong>项目</strong>
                </div>
                <div>
                    <strong>论文</strong>
                </div>
                <div>
                    <strong>专利</strong>
                </div>
            </nav>
            <section class="pWidth">
                <ul class="achievement-main">
                    <li>
                        <div>
                            <h2>Journal of Intelligent Information Systems</h2>
                            <strong class="gr">2016.01.08 - 2017.01.08</strong>
                            <strong class="gr">Status: success</strong>
                            <div class="mini-tag">
                                <span><a href="#">tag01</a></span>
                                <span><a href="#">tag02</a></span>
                                <span><a href="#">tag03</a></span>
                            </div>
                            <p class="gr02">
                                Zhenguang Liu, Hao Huang, Qinming He, Kevin Chiew, and Lianhang Ma,Rare Category Detection on O(dN) Time Complexity, The Seventeenth Pacific-Asia Conference on Knowledge Discovery and Data Mining，PAKDD 2014， April, 2014 ２、 Qingyang Hu, Qinming He, Hao Huang, Kevin Chiew, and Zhenguang Liu, Learning from Crowds under Experts’ Supervision, The Seventeenth Pacific-Asia Conference on Knowledge Discovery and Data Mining，PAKDD 2014， April, 2014 ３、 Hao Huang, Yunjun Gao, Kevin Chiew, Lei Chen, Qinming He, Towards Effective and Efficient Mining of Arbitrary Shaped Clusters，ICDE,2014 ４、 Qingyang Hu_ Kevin Chiewy Hao Huangz Qinming He,Recovering Missing Labels of Crowdsourcing Workers, SDM 2014. ５、 Huang, H., Chiew, K., Gao, Y., He, Q., Li, Q.，Rare category exploration，Expert Systems with Applications，volume 41, issue 9, year 2014, pp. 4197 – 4210 ６、 Lianhang Ma, Hao Huang, Qinming He, Kevin Chiew, Zhenguang Liu: Toward Seed-Insensitive Solutions to Local Community Detection, Journal of Intelligent Information Systems, (on line) April 2014,DOI: 10.1007/s10844-014-0315-6 ７、 Feng Qian, Kevin Chiew, Qinming He and Hao Huang, Mining Regional Co-location Patterns with kNNG.
                            </p>
                        </div>
                    </li>
                    <li>
                    <div>
                        <h2>Expert Systems with Applications</h2>
                        <strong class="gr">2016.01.08 - 2017.01.08</strong>
                        <strong class="gr">Status: success</strong>
                        <p class="gr02">
                            adadadsad
                        </p>
                    </div>
                    </li>
                    <li>
                        <div>
                            <h2>Patents Patents Smart Iteration-Termination Criterion Based Live Virtual Machine Migration</h2>
                            <strong class="gr">中国, 2015103106407.</strong>
                        </div>
                    </li>
                    <li>
                        <div>
                            <h2>Journal of Intelligent Information Systems</h2>
                            <strong class="gr">2016.01.08</strong>
                            <p class="gr02">
                                Zhenguang Liu, Hao Huang, Qinming He, Kevin Chiew, and Lianhang Ma,Rare Category Detection on O(dN) Time Complexity, The Seventeenth Pacific-Asia Conference on Knowledge Discovery and Data Mining，PAKDD 2014， April, 2014 ２、 Qingyang Hu, Qinming He, Hao Huang, Kevin Chiew, and Zhenguang Liu, Learning from Crowds under Experts’ Supervision, The Seventeenth Pacific-Asia Conference on Knowledge Discovery and Data Mining，PAKDD 2014， April, 2014 ３、 Hao Huang, Yunjun Gao, Kevin Chiew, Lei Chen, Qinming He, Towards Effective and Efficient Mining of Arbitrary Shaped Clusters，ICDE,2014 ４、 Qingyang Hu_ Kevin Chiewy Hao Huangz Qinming He,Recovering Missing Labels of Crowdsourcing Workers, SDM 2014. ５、 Huang, H., Chiew, K., Gao, Y., He, Q., Li, Q.，Rare category exploration，Expert Systems with Applications，volume 41, issue 9, year 2014, pp. 4197 – 4210 ６、 Lianhang Ma, Hao Huang, Qinming He, Kevin Chiew, Zhenguang Liu: Toward Seed-Insensitive Solutions to Local Community Detection, Journal of Intelligent Information Systems, (on line) April 2014,DOI: 10.1007/s10844-014-0315-6 ７、 Feng Qian, Kevin Chiew, Qinming He and Hao Huang, Mining Regional Co-location Patterns with kNNG.
                            </p>
                        </div>
                    </li>
                    <li>
                        <div>
                            <h2>Smart Iteration-Termination Criterion Based Live Virtual Machine Migration</h2>
                            <strong class="gr">2016.01.04</strong>
                            <p class="gr02">
                                Qian Feng, Qinming He, Kevin Chiew and Hao Huang, Discovery of Regional Co-location Patterns with k-Nearest Neighbor Graph，The Seventeenth Pacific-Asia Conference on Knowledge Discovery and Data Mining，PAKDD 2013， April, 2013. ２、 Yanzhe Che, Kevin Chiew, Xiaoyan Hong, Qiang Yang, Qinming He. EDA: An Enhanced Dual-active Algorithm for Location Privacy Preserving in Mobile P2P Networks. Journal of Zhejiang University-SCIENCE C (Computers & Electronics), Vol14, No5, pp 356-373,2013 ３、 Hao Huang,Yunjun Gao, Lu Chen. Rui Li, Kevin Chiew, Qinming He, Browse with a Social Web Directory, the 36th Annual ACM SIGIR Conference, Dublin, Ireland, 28 July 2013. ４、 Hao Huang, Yunjun Gao, Kevin Chiew, Qinming He, Lu Chen, Commodity Query by Snapping, ,the 36th Annual ACM SIGIR Conference, Dublin, Ireland, 28 July 2013. ５、 Lianhang Ma, Hao Huang, Qinming He, Kevin Chiew, Jiannan Wu, Yanzhe Che. GMAC: A Seed-Insensitive Approach to Local Community Detection. 15th International Conference on Data Warehousing and Knowledge Discovery (DaWaK 2013) ,Prague, Czech Republic, August 26 - 29, 2013 ６、 Hao Huang • Qinming He • Kevin Chiew •Feng Qian • Lianhang Ma， CLOVER: a faster prior-free approach to rare-category Detection，Knowledge and Information Systems (KAIS) journal. Vol35,NO3，pp713–736, DOI 10.1007/s10115-012-0530-9, (SCI, IF2.2 ) ７、 Yanzhe Che, Qinming He, Xiaoyan Hong and Kevin Chiew, X-Region: A Framework for Location Privacy Preservation in Mobile Peer-to-Peer Networks, International Journal of Communication Systems,,2013 (online, SCI, IF0.712) ８、 Liangwei Zhu, Jianhai Chen, Qinming He, Dawei, Huang Shuang Wu.
                            </p>
                        </div>
                    </li>
                </ul>
                <div class="more active"><span data-offset="2" id="moreOffset">More...</span></div>
            </section>
        </article>
        <article class="contact" id="contact">
            <h1><span>关于我们</span></h1>
            <section class="pWidth">
                <div class="content">
                    <p>
                        浙江大学智能计算与系统Incas实验室团队专注于计算机系统结构、数据挖掘、GIS等多个领域研究，涉及云计算虚拟化、高性能计算与区块链、数据挖掘、地理信息系统、物联网、移动互联、仿真等方面。
                        从这里走出的学子规模超过60人，他们之中，有走上讲堂的教师、有走上企业的老板、走到科研机构的科学专家……
                        在何教授带领之下，来到Incas实验室的每位学子，为共同理想，秉承浙大人实事求是之精神，刻苦学习，共筑未来美好梦想。
                    </p>
                    <p><strong>联系电话：</strong>0571-86553971</p>
                </div>
                <div class="link-f">
                    <p><strong>友情链接：</strong></p>
                    <ul>
                        <li>
                            <a href="http://arc.zju.edu.cn/index"><img src="assets/images/flink/arc.png" alt=""></a>
                        </li>
                        <li>
                            <a href="http://www.yunphant.com/"><img src="assets/images/flink/yunphant.svg" alt=""></a>
                        </li>
                        <li>
                            <a href="https://scholar.google.com/schhp?hl=zh-CN"><img src="assets/images/flink/googlescholar.png" alt=""></a>
                        </li>
                        <li>
                            <a href="http://www.ccf.org.cn/"><img src="assets/images/flink/ccf.png"></a>
                        </li>
                        <li>
                            <a href="http://dblp.uni-trier.de/"><img src="assets/images/flink/dblp.png"></a>
                        </li>
                    </ul>
                </div>
            </section>
        </article>
    </main>
@stop
