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
		$('.news-list>ul li').mouseover(function(){
			var oldImg = $('.news-img a');
			var newHref = $(this).children('a').attr('href');
			var newImg = $('<a href="'+newHref+'"><img src="'+ $(this).attr('data-newImg') +'" alt=""></a>');
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

	// 实验室研究团队
	this.team = function(){
		var len;
		$('.team .left').click(function (e) {
			start(-1);
		})
		$('.team .right').click(function(e){
			start(1);
		})
		$('body').on('click','.team-main li',function(){
			$(this).hasClass('index-1')&&start(-1,this);
			$(this).hasClass('index-3')&&start(1,this);
		})
		function start(dir,self){
            /* 只有俩人时切换方式 */
            if($('.team-main').children('li').length==2){
                var sbClass = dir==-1? 'index-3':'index-1';
                $('.team-main .index-2').attr('class',sbClass);
                $(self).attr('class','index-2');
                return false;
            }
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

		/**
		 * 根据类型老师、学生、访学，返回对应查询状态及 年份和内容的html
		 * 不传年份默认返回最新一年的数据
		 *
		 * 研究团队 team
		 * 参数：
		 *      1: [必须] type
		 *          1: 教师
		 *          2：学生
		 *          3：访学
		 *      2: [可选] year
		 * 返回：json
		 *      1: status
		 *      	1: 1成功
		 *      	2: 2失败
		 *      2: data
		 *          year
		 *          content
		 */

		$('.team nav>div>strong').click(function (e) {
			var index = $(this).parent().index();
			$(this).parent().addClass('active').siblings().removeClass('active');
			var self = $(this);
			$.ajax({
				url:'team',
				type:'get',
				data:{
					type: index+1,
				},
				dataType:'json',
				success:function (response) {
					if(response.status === 1){
						updateTeam(response.data);
					}
				}
			})
		})

		$(document).on('click','.team nav>div ul li a',function (e) {
			e.preventDefault();
			var self = $(this);
			var index = $('.team nav>div.active').index();
			var year = self.html();
			$.ajax({
				url:'team',
				type:'get',
				data:{
					type: index+1,
					year: year,
				},
				dataType:'json',
				success:function (response) {
					if(response.status === 1){
						updateTeam(response.data);
					}
				}
			})
		})

		function updateTeam(data) {
			var contentHtml = data.content;
			$('.team-main').html(contentHtml);

			var yearHtml = data.year;
			$('.team nav>div.active ul').html(yearHtml);

            toggleShow();
            len = $('.team-main li').length - 1;
        }

		function toggleShow() {
            /* 针对人数显示隐藏箭头 */
            var list = $('.team-main').children('li');
            var num = list.length;
            switch (num){
				case 1:
					list.first().removeClass('index-1').addClass('index-2');
                    $('.left,.right').hide();
                    break;
				case 2:
                    $('.left,.right').hide();
                    break;
				case 3:
                    $('.left,.right').show();
                    break;
            }
        }
        toggleShow();
	} // end of this.team

	this.direction = function(){
		$('.direction p').click(function () {
			$(this).toggleClass('active');
			$(this).find('span').fadeToggle();
		})
	}

	// 实验室研究成果
	this.achievement = function(){

		/**
		 * 根据类型：论文、项目、专利，返回对应查询内容的html
		 *
		 * 研究成果 achievement
		 * 参数：
		 *      * index: 相应的div标签出现的次序
		 *			* 0： project(项目)
		 *			* 1： articles(论文)
		 *			* 2： patent(专利)
		 * 返回：json
		 *      * status
		 *      	* 1： 成功
		 *      	* 2： 失败
		 *      * content： 相应选项卡的HTML内容
		 *      * limit: 加载了几条
		 *
		 */
		function getData(index,offset) {
			$.ajax({
				url:'achivement',
				type:'get',
				data:{
					index: index,
					offset: offset? offset:0,
				},
				dataType:'json',
				success:function (response) {
					if(response.status === 1){
						if(offset){
							appendAchievement(response.content);
							offset = offset-0+response.limit;
							$('#moreOffset').data('offset',offset);
						}else{
							updateAchievement(response.content);
						}
					}
				}
			})
		}

        // 在项目/论文/专利间相互切换
        $('.achievement nav>div').click(function() {
            $(this).addClass('active').siblings().removeClass('active');
            var index = $(this).index();
            getData(index);
        })

        // 更新研究成果（项目/论文/专利）中的列表HTML
		function updateAchievement(data) {
			$('.achievement-main').html(data);
            setHeight();
        }

		function appendAchievement(data) {
			$('.achievement-main').append(data);
			setHeight();
		}

		// 显示默认栏目（项目）的内容
		var index = $('.achievement nav>div.active').index();
		getData(index);

		// more 点击事件
		$('#moreOffset').click(function () {
			var offset = $(this).data('offset');
			var index = $('.achievement .tog-tag').children('div.active').index();
			getData(index,offset);
		})
		
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

	}
}

$(function () {
	var page = new Page();
	page.init();
})


