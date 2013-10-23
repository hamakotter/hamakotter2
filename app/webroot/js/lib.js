var lib = {
	t:{
    tweets : 'http://festival.hamako-ths.ed.jp/cakephp/posts/timeline.json',
    tweetsNew : 'http://festival.hamako-ths.ed.jp/cakephp/posts/newer.json',
    tweetsOld : 'http://festival.hamako-ths.ed.jp/cakephp/posts/older.json',
    tweet : 'http://festival.hamako-ths.ed.jp/cakephp/posts/add',
	},
	getAjax:function(url,data,type,dataType,async,error,success,complete){
		return $.ajax({
			url:url,
			type:type,
			data:data,
			dataType:dataType,
			cache:true,
			async:async,
			error:error,
			success:success,
			complete:complete
		});
	},
};
