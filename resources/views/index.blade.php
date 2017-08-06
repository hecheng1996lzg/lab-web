@extends('layout')

@section('css')
    <link href="{{ asset('assets/css/index.css') }}" rel="stylesheet">
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
                        <li data-newImg="new1.png"><a href="{{ asset('news/'.$new->id) }}">{{ date('Y-m-d',strtotime($new->date)) }} {{ $new->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="news-img">
                    <div>
                        <img src="assets/images/news/new1.png" alt="">
                    </div>
                </div>
            </section>
        </article>
        <article id="team" class="team pWidth-bg">
            <h1 class="wh"><span>研究团队</span></h1>
            <nav class="tog-tag">
                <div>
                    <strong>教师</strong>
                </div>
                <div class="active">
                    <strong>学生</strong>
                </div>
                <div>
                    <strong>访学</strong>
                </div>
            </nav>
            <section>
                <div class="left"></div>
                <ul class="team-main wh img-path">
                    <li class="index-1">
                        <img src="images/team/team1.jpg" alt="">
                        <strong>姓名：教师一</strong>
                        <span>职务：教授</span>
                        <span>邮箱：qqemail@qq.com</span>
                        <span>电话：0571-09101012</span>
                        <span>个人主页：<a href="#">www.baidu.com</a></span>
                    </li>
                    <li class="index-2">
                        <img src="images/team/team2.jpg" alt="">
                        <strong>姓名：学生一</strong>
                        <span>毕业状况：在校</span>
                        <span>研究方向：研究方向</span>
                    </li>
                    <li class="index-3">
                        <img src="images/team/team3.jpg" alt="">
                        <strong>姓名：访学一</strong>
                        <span>单位：单位</span>
                        <span>研究方向：研究方向</span>
                        <span>电话：0571-09101012</span>
                        <span>个人主页：<a href="#">www.baidu.com</a></span>
                    </li>
                </ul>
                <div class="right"></div>
            </section>
        </article>
        <article id="direction" class="direction">
            <h1><span>研究方向</span></h1>
            <section class="pWidth">
                <ul class="img-path gr">
                    <li>
                        <img src="images/direction/direction1.jpg" alt="">
                        <div>
                            <p><strong>云计算系统虚拟化技术</strong></p>
                            <p>
                                <em>虚拟化计算系统的评测</em>
                                <span>包括性能分析预测模型、在线迁移评测方法、可配置的评测工具</span>
                            </p>
                            <p>
                                <em>虚拟计算系统动态资源调度</em>
                                <span>包括负载均衡、负载状态的检测、负载配置与动态优化</span>
                            </p>
                            <p>
                                <em>开源云平台技术研究</em>
                                <span>基于Openstack上的二次开发与性能优化。已发表SCI/EI论文20多篇</span>
                            </p>
                        </div>
                    </li>
                    <li>
                        <img src="images/direction/direction2.jpg" alt="">
                        <div>
                            <p><strong>机器人学习与数据挖掘研究</strong></p>
                            <p>
                                <em>数据挖掘算法</em>
                                <span>包括稀有类挖掘、同位模式挖掘、社会网络分析等方面的算法</span>
                            </p>
                            <p>
                                <em>数据挖掘应用研究</em>
                                <span>包括犯罪数据挖掘、移动网络数据挖掘。已发表相关SCI/EI论文30多篇</span>
                            </p>
                        </div>
                    </li>
                    <li>
                        <img src="images/direction/direction3.jpg" alt="">
                        <div>
                            <p><strong>地理系统开发环境及应用开发研究</strong></p>
                            <p>
                                <em>地理信息系统平台研究与开发</em>
                                <span>目前已经完成产品化的WebGIS、嵌入式GIS等体系完整的地理信息平台，已申请专利多项</span>
                            </p>
                            <p>
                                <em>研发地理信息相关应用系统</em>
                                <span>已经应用的领域包括：环保、化工、市政、水利、土地、金融、农业、交通、物流、公安，导航和社会公众服务等领域</span>
                            </p>
                        </div>
                    </li>
                    <li>
                        <img src="images/direction/direction4.png" alt="">
                        <div>
                            <p><strong>物联网与移动互联网基础支持软件技术</strong></p>
                            <p>
                                <em>物联网软件基础支持平台</em>
                                <span>包括融合实时、关系、空间等数据的广谱数据中间层、高性能多协议服务总线、大规模仿真与控制中间件等</span>
                            </p>
                            <p>
                                <em>移动互联网终端及中心技术</em>
                                <span>特别跨平台智能移动终端中间件、面向移动互联网的内容分发技术（CDN）等。相关系统支撑软件居国内产业界领先水平</span>
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
                            <strong class="gr">Status: success</strong>
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
                <div class="more active"><span>More...</span></div>
            </section>
        </article>
        <article class="contact">
            <h1><span>关于我们</span></h1>
            <section class="pWidth">
                <div class="content">
                    <p>浙江大学软件工程实验室（原VLIS研究中心）由丁轶群博士于2011年成立，依托浙江大学计算机理论和应用工程基础研究，扎根
                        于工业界前沿与先进技术领域，致力在云计算平台技术基础上研究关键领域面临的超大规模信息系统问题，通过理论探索和工程
                        实践的有机结合，寻求关键领域信息化发展的突破。
                    </p>
                    <p>软件工程实验室研发团队经过多年的发展，已经具备了稳定的研发梯队，其中包括教授/副教授8人（教师团队列表），博士、硕士
                        研究生百余人，以及本科生数十人，形成了年轻、富有活力的研发团队。 软件工程实验室从事云计算大规模信息工程研究已近十
                        余年，承担了数十项国内外大规模信息系统的研发，在全球化大规模信息系统开发、分布式系统研发、云计算平台研发、容器技
                        术等方面积累了丰富的科研和工程经验。
                    </p>
                    <p><strong>联系方式：</strong>xx老师 18866666666</p>
                </div>
                <div class="link-f">
                    <p><strong>友情链接：</strong></p>
                    <ul>
                        <li>
                            <a href="#"><img src="images/flink/link%20(1).gif" alt=""></a>
                        </li>
                        <li>
                            <a href="#"><img src="images/flink/link%20(1).jpg" alt=""></a>
                        </li>
                        <li>
                            <a href="#"><img src="images/flink/link%20(1).png" alt=""></a>
                        </li>
                        <li>
                            <a href="#"><img src="images/flink/link%20(2).jpg" alt=""></a>
                        </li>
                        <li>
                            <a href="#"><img src="images/flink/link%20(3).jpg" alt=""></a>
                        </li>
                        <li>
                            <a href="#"><img src="images/flink/link%20(4).jpg" alt=""></a>
                        </li>
                    </ul>
                </div>
            </section>
        </article>
    </main>
@stop