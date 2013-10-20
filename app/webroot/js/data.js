(function(){

var hm = {
  latest : 0,
  oldest : 0,
  initialize : function() {
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
      tweet += '<td>'+w.Post.user_name+'</td>';
      tweet += '<td>'+w.Post.tweet+'</td>';
//      tweet += '<td>'+w.Post.address+'</td>';
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
    $('#update-btn').attr('disabled','disabled');
    var data = {
      _method : 'POST',
      'data[Post][user_name]' : $('#user_name').val(),
      'data[Post][tweet]' : $('#tweet').val(),
    };
    lib.getAjax(lib.t.tweet,data,'post','json',true,function(){},function(res){
      /*
      console.log(res['posts'].res);
      //res['posts'].res が 0 なら成功
      */
      hm.updateNew();
      $('#tweet').val('');
      $('#tweet-btn').removeAttr('disabled');
      $('#update-btn').removeAttr('disabled');
    });
  }
};

$(function(){
  hm.initialize();
  $(document).on('click',"#old-tweets-btn",function(){
     hm.updateOld();
  });
  $(document).on('click',"#tweet-btn",function(){
    hm.postTweet();
  });
  $(document).on('click',"#update-btn",function(){
    hm.updateNew();
  });
});

})();