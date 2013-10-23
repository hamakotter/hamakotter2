(function(){

var hm = {
  latest : 0,
  oldest : 0,
  initialize : function() {
    lib.getAjax(lib.t.tweets,{},'get','json',true,function(){},function(res){
      var tweets = hm.prepareTweet(res['posts']);
      $('#timeline').append(tweets.join('\n'));
      if( res['posts'].length > 0 ) hm.latest = hm.oldest = res['posts'].shift().Post.id;
      if( res['posts'].length > 0 ) hm.oldest = res['posts'].pop().Post.id;
    });
  },
  prepareTweet : function(json) {
    var tweets = [];
    $.each(json,function(v,w) {
      var tweet = '';
      tweet += 'a';
      tweet += '<div id="post">';
      tweet += '<div class = "icon">';
      tweet += '<?php echo $this->Html->image(\'icon0.png\',array(\'width\' => \'100%\')); ?>';
      tweet += '</div>';
      tweet += '<div class="user"><?php echo $value[\'Post\'][\'user_name\']; ?></div>';
      tweet += '<div class="date"><?php echo $value[\'Post\'][\'created\']; ?></div>';
      tweet += '<div class="tweet"><?php echo Sanitize::html($value[\'Post\'][\'tweet\'],array(\'remove\' => true)) ?> </div>';
      tweet += '</div>'
      tweet += '<tr id="tweet'+w.Post.id+'" tweet-id="'+w.Post.id+'">';
      tweet += '<td>'+w.Post.user_name+'</td>';
      tweet += '<td>'+w.Post.tweet+'</td>';
//      tweet += '<td>'+w.Post.address+'</td>';
      tweet += '</tr>';
      tweets.push(tweet);
    });
    return tweets;
  },
  updateOld : function() {
    // $('#old-tweets-btn').attr('disabled','disabled');
    lib.getAjax(lib.t.tweetsOld,{o:hm.oldest},'get','json',true,function(){},function(res){
      var tweets = hm.prepareTweet(res['posts']);
      $('#timeline').append(tweets.join('\n'));
      if( res['posts'].length > 0 ) hm.oldest = res['posts'].pop().Post.id;
      // $('#old-tweets-btn').removeAttr('disabled');
    });
  }
};



$(function(){
  hm.initialize();
  $(window).on("scroll", function() {
  var scrollHeight = $(document).height();
  var scrollPosition = $(window).height() + $(window).scrollTop();
  if ((scrollHeight - scrollPosition) / scrollHeight === 0) {
    hm.initialize();
    hm.updateOld();
      // when scroll to bottom of the page
  }
});


})();
