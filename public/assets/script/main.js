function Page(){
	this.init = function(){
		this.topMenu();
		this.news();
		this.team();
		this.direction();
		this.achievement();
	}
	this.topMenu = function(){
		$(window).scroll(function (e) {
			if($(window).scrollTop()>0){
				$('header').addClass('scroll-topMenu');
			}else{
				$('header').removeClass('scroll-topMenu');
			}
		})
	}
	this.news = function () {
		var oldIndex = 0;
		$('.news-list li').mouseover(function(){
			var oldImg = $('.news-img img');
			var newImg = $('<img src="assets/images/news/'+ $(this).attr('data-newImg') +'" alt="">');
			var index = $(this).index();
			if(index<oldIndex){
				oldImg.slideUp(function(){$(this).remove()});
				$('.news-img div').prepend(newImg);
			}else{
				newImg.appendTo('.news-img div').hide().slideDown(function(){oldImg.remove()});
			}
			oldIndex = index;
		});
	}
	this.team = function(){
		var len = $('.team-main li').length - 1;
		$('.team .left').click(function (e) {
			start(-1);
		})
		$('.team .right').click(function(e){
			start(1);
		})
		$('body').on('click','.team-main li',function(){
			$(this).hasClass('index-1')&&start(-1);
			$(this).hasClass('index-3')&&start(1);
		})
		function start(dir){
			for(var i=1;i<4;i++){
				var dom = $('.team-main .index-'+i);
				var domIndex = dom.index();
				var index = domIndex+dir;
				if(index<0)index = len;
				if(index>len)index = 0;
				dom.removeClass('index-'+i);
				$('.team-main li:eq('+index+')').addClass('index-'+i);
			}
		}

		/*
		 * ajax
		 * toggle student
		 */
		$('.team nav>div>strong').click(function (e) {
			$(this).parent().addClass('active').siblings().removeClass('active');
			var self = $(this);
			$.ajax({
				url:'php/index.php',
				type:'post',
				dataType:'json',
				success:function (data) {
					data = $('<ul> <li class="active"><a href="#">2007</a></li> <li><a href="#">2008</a></li> <li><a href="#">2009</a></li> <li><a href="#">2010</a></li> <li><a href="#">2011</a></li> <li><a href="#">2012</a></li> <li><a href="#">2013</a></li> <li><a href="#">2014</a></li> <li><a href="#">2015</a></li> <li><a href="#">2016</a></li> <li><a href="#">2017</a></li> </ul>');
					self.siblings('ul').remove();
					self.parent().append(data);
				}
			})
		})

		/*
		 * ajax
		 * toggle year
		 */
		$(document).on('click','.team nav>div ul li a',function (e) {
			e.preventDefault();
			$(this).parent().addClass('active').siblings().removeClass('active');
			var self = $(this);
			$.ajax({
				url:'php/index.php',
				type:'post',
				dataType:'json',
				success:function (data) {
					data = '<li class="index-1"> <img src="images/team/team4.jpg" alt=""> <strong>姓名叉叉</strong> <span>信息1叉叉</span> <span>信息2叉叉</span> <p>简介叉叉叉叉简介叉叉叉叉简介叉叉叉叉简介叉叉叉叉简介叉叉叉叉简介叉叉叉叉简介叉叉叉叉简介叉叉叉叉简介叉叉叉叉 </p> </li> <li class="index-2"> <img src="images/team/team5.jpg" alt=""> <strong>姓名叉叉</strong> <span>信息1叉叉</span> <span>信息2叉叉</span> <p> 简介叉叉叉叉简介叉叉叉叉简介叉叉叉叉简介叉叉叉叉简介叉叉叉叉简介叉叉叉叉简介叉叉叉叉简介叉叉叉叉简介叉叉叉叉 </p> </li> <li class="index-3"> <img src="images/team/team6.png" alt=""> <strong>姓名叉叉</strong> <span>信息1叉叉</span> <span>信息2叉叉</span> <p> 简介叉叉叉叉简介叉叉叉叉简介叉叉叉叉简介叉叉叉叉简介叉叉叉叉简介叉叉叉叉简介叉叉叉叉简介叉叉叉叉简介叉叉叉叉 </p> </li>';
					$('.team-main').html(data);
				}
			})
		})
	}
	this.direction = function(){
		$('.direction p').click(function () {
			$(this).toggleClass('active');
			$(this).find('span').fadeToggle();
		})
	}
	this.achievement = function(){
		var dataHeight = [];
		var minHeight = 100;
		function setHeight(){
			dataHeight = [];
			$('.achievement-main li').each(function(){
				var padding = $(this).children('div').css('padding-top');
				padding = padding.replace('px','');
				dataHeight.push($(this).children('div').height()-padding);
				$(this).children('div').css('height',minHeight+'px');
			});
		}
		$(document).on('click','.achievement li',function () {
			var height = Math.max(minHeight,dataHeight[$(this).index()]);
			$(this).children('div').css('height',height+'px');
			$(this).addClass('active').siblings().removeClass('active').children('div').css('height',minHeight+'px');
		});
		setHeight();

		/*
		 * ajax
		 * toggle project
		 */
		$('.achievement nav>div').click(function (e) {
			$(this).addClass('active').siblings().removeClass('active');
			var type = $(this).index();
			$.ajax({
				url:'php/index.php',
				type:'post',
				dataType:'json',
				success:function (data) {
					if(type==0){
						data = '<li> <div> <h2>Journal of Intelligent Information Systems</h2> <strong class="gr">2016.01.08 - 2017.01.08</strong> <strong class="gr">Status: success</strong> <div class="mini-tag"> <span><a href="#">tag01</a></span> <span><a href="#">tag02</a></span> <span><a href="#">tag03</a></span> </div> <p class="gr02">Zhenguang Liu, Hao Huang, Qinming He, Kevin Chiew, and Lianhang Ma,Rare Category Detection on O(dN) Time Complexity, The Seventeenth Pacific-Asia Conference on Knowledge Discovery and Data Mining，PAKDD 2014， April, 2014 ２、 Qingyang Hu, Qinming He, Hao Huang, Kevin Chiew, and Zhenguang Liu, Learning from Crowds under Experts’ Supervision, The Seventeenth Pacific-Asia Conference on Knowledge Discovery and Data Mining，PAKDD 2014， April, 2014 ３、 Hao Huang, Yunjun Gao, Kevin Chiew, Lei Chen, Qinming He, Towards Effective and Efficient Mining of Arbitrary Shaped Clusters，ICDE,2014 ４、 Qingyang Hu_ Kevin Chiewy Hao Huangz Qinming He,Recovering Missing Labels of Crowdsourcing Workers, SDM 2014. ５、 Huang, H., Chiew, K., Gao, Y., He, Q., Li, Q.，Rare category exploration，Expert Systems with Applications，volume 41, issue 9, year 2014, pp. 4197 – 4210 ６、 Lianhang Ma, Hao Huang, Qinming He, Kevin Chiew, Zhenguang Liu: Toward Seed-Insensitive Solutions to Local Community Detection, Journal of Intelligent Information Systems, (on line) April 2014,DOI: 10.1007/s10844-014-0315-6 ７、 Feng Qian, Kevin Chiew, Qinming He and Hao Huang, Mining Regional Co-location Patterns with kNNG. </p> </div> </li> <li> <div> <h2>Journal of Intelligent Information Systems</h2> <strong class="gr">2016.01.08 - 2017.01.08</strong> <strong class="gr">Status: success</strong> <div class="mini-tag"> <span><a href="#">tag01</a></span> <span><a href="#">tag02</a></span> <span><a href="#">tag03</a></span> </div> <p class="gr02"> Zhenguang Liu, Hao Huang, Qinming He, Kevin Chiew, and Lianhang Ma,Rare Category Detection on O(dN) Time Complexity, The Seventeenth Pacific-Asia Conference on Knowledge Discovery and Data Mining，PAKDD 2014， April, 2014 ２、 Qingyang Hu, Qinming He, Hao Huang, Kevin Chiew, and Zhenguang Liu, Learning from Crowds under Experts’ Supervision, The Seventeenth Pacific-Asia Conference on Knowledge Discovery and Data Mining，PAKDD 2014， April, 2014 ３、 Hao Huang, Yunjun Gao, Kevin Chiew, Lei Chen, Qinming He, Towards Effective and Efficient Mining of Arbitrary Shaped Clusters，ICDE,2014 ４、 Qingyang Hu_ Kevin Chiewy Hao Huangz Qinming He,Recovering Missing Labels of Crowdsourcing Workers, SDM 2014. ５、 Huang, H., Chiew, K., Gao, Y., He, Q., Li, Q.，Rare category exploration，Expert Systems with Applications，volume 41, issue 9, year 2014, pp. 4197 – 4210 ６、 Lianhang Ma, Hao Huang, Qinming He, Kevin Chiew, Zhenguang Liu: Toward Seed-Insensitive Solutions to Local Community Detection, Journal of Intelligent Information Systems, (on line) April 2014,DOI: 10.1007/s10844-014-0315-6 ７、 Feng Qian, Kevin Chiew, Qinming He and Hao Huang, Mining Regional Co-location Patterns with kNNG. </p> </div> </li> <li> <div> <h2>Journal of Intelligent Information Systems</h2> <strong class="gr">2016.01.08 - 2017.01.08</strong> <strong class="gr">Status: success</strong> <div class="mini-tag"> <span><a href="#">tag01</a></span> <span><a href="#">tag02</a></span> <span><a href="#">tag03</a></span> </div> <p class="gr02"> Zhenguang Liu, Hao Huang, Qinming He, Kevin Chiew, and Lianhang Ma,Rare Category Detection on O(dN) Time Complexity, The Seventeenth Pacific-Asia Conference on Knowledge Discovery and Data Mining，PAKDD 2014， April, 2014 ２、 Qingyang Hu, Qinming He, Hao Huang, Kevin Chiew, and Zhenguang Liu, Learning from Crowds under Experts’ Supervision, The Seventeenth Pacific-Asia Conference on Knowledge Discovery and Data Mining，PAKDD 2014， April, 2014 ３、 Hao Huang, Yunjun Gao, Kevin Chiew, Lei Chen, Qinming He, Towards Effective and Efficient Mining of Arbitrary Shaped Clusters，ICDE,2014 ４、 Qingyang Hu_ Kevin Chiewy Hao Huangz Qinming He,Recovering Missing Labels of Crowdsourcing Workers, SDM 2014. ５、 Huang, H., Chiew, K., Gao, Y., He, Q., Li, Q.，Rare category exploration，Expert Systems with Applications，volume 41, issue 9, year 2014, pp. 4197 – 4210 ６、 Lianhang Ma, Hao Huang, Qinming He, Kevin Chiew, Zhenguang Liu: Toward Seed-Insensitive Solutions to Local Community Detection, Journal of Intelligent Information Systems, (on line) April 2014,DOI: 10.1007/s10844-014-0315-6 ７、 Feng Qian, Kevin Chiew, Qinming He and Hao Huang, Mining Regional Co-location Patterns with kNNG. </p> </div> </li>'
					}else if(type==1){
						data = '<li> <div> <h2>Expert Systems with Applications</h2> <strong class="gr">Status: success</strong> </div> </li> <li> <div> <h2>Expert Systems with Applications</h2> <strong class="gr">Status: success</strong> </div> </li>';
					}else if(type==2){
						data = '<li> <div> <h2>Patents Patents Smart Iteration-Termination Criterion Based Live Virtual Machine Migration</h2> <strong class="gr">中国, 2015103106407.</strong> </div> </li> <li> <div> <h2>Patents Patents Smart Iteration-Termination Criterion Based Live Virtual Machine Migration</h2> <strong class="gr">中国, 2015103106407.</strong> </div> </li>';
					}
					$('.achievement-main').html(data);
					setHeight();
				}
			})
		})
	}
}

$(function () {
	var page = new Page();
	page.init();
})


