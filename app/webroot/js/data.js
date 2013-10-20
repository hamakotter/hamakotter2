//(function(){

var hm = {
  latest : 0,
  oldest : 0,
  initialize : function() {
    //(url,data,type,dataType,async,error,success,complete){
    //lib.getAjax(lib.data.SRV+'/mylists.json',{p:lib.data.P},'get','json',true,function(){},function(res){
    lib.getAjax(lib.t.tweets,{},'get','json',true,function(){},function(res){
      var tweets = hm.prepareTweet(res['posts']);
      $('#tweets').append(tweets.join('\n'));
      if( res['posts'].length > 0 ) hm.latest = hm.oldest = res['posts'].shift().Post.id;
      if( res['posts'].length > 0 ) hm.oldest = res['posts'].pop().Post.id;
    });
  },
  prepareTweet : function(json) {
    var tweets = [];
    $.each(json,function(v,w) {
      var tweet = '';
      tweet += '<tr id="tweet'+w.Post.id+'" tweet-id="'+w.Post.id+'">';
      tweet += '<td>'+w.Post.tweet+'</td>';
      tweet += '<td>'+w.Post.user_name+'</td>';
      tweet += '</tr>';
      tweets.push(tweet);
    });
    return tweets;
  },
  updateNew : function() {
    lib.getAjax(lib.t.tweetsNew,{o:hm.latest},'get','json',true,function(){},function(res){
      var tweets = hm.prepareTweet(res['posts']);
      $('#tweets').prepend(tweets.join('\n'));
      if( res['posts'].length > 0 ) hm.latest = res['posts'].shift().Post.id;
    });
  },
  updateOld : function() {
    $('#old-tweets-btn').attr('disabled','disabled');
    lib.getAjax(lib.t.tweetsOld,{o:hm.oldest},'get','json',true,function(){},function(res){
      var tweets = hm.prepareTweet(res['posts']);
      $('#tweets').append(tweets.join('\n'));
      if( res['posts'].length > 0 ) hm.oldest = res['posts'].pop().Post.id;
      $('#old-tweets-btn').removeAttr('disabled');
    });
  },
  postTweet : function() {
    $('#tweet-btn').attr('disabled','disabled');
    
  }
};

$(function(){
  hm.initialize();
  $(document).on('click',"#old-tweets-btn",function(){
     hm.updateOld();
  });
  $(document).on('click',"#tweet-btn",function(){
  });
});

//})();