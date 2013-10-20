var lib = {
	t:{
    tweets : '/hamakotter2/posts.json',
    tweetsNew : '/hamakotter2/posts/newer.json',
    tweetsOld : '/hamakotter2/posts/older.json',
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