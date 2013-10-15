#仕様
*つぶやける  
*NGできてハッピー  
*ツイ消し  
*つぶやき規制  
*NGできてハッピー  

#仕様 
* つぶやける  
* NGできてハッピー  
* ツイ消し  
* つぶやき規制  

#ファイル名  
* PostsController.php (Controller)
* Post.php (Model)
* Posts.ctp (View)

#デーブル(カッコ内はテーブル名)    

つぶやきを管理するテーブル(posts)    
----

    | id         | INT     | id         |  
    | user_name　| VERCHAR | ユーザー名 |  
    | tweet      | TEXT    | 呟き       |  
    | address    | VERCHAR | IPアドレス |  
    | created    | DATE    | 作成日時   |  
    | modifed    | DATE    | 修正日時   |  

----

NGユーザーを管理する(ng_users)  
----

| id | IPアドレス |  

----

NGワードの管理(ng_words)  
----

| id | NGワード |  

----
