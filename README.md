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

| id         | INT     |   
| user_name　| VERCHAR |   
| tweet      | TEXT    |  
| address    | VERCHAR |  
| created    | DATE    |  
| modifed    | DATE    |  

----

NGユーザーを管理する(ng_users)  
----

| id | IPアドレス |  

----

NGワードの管理(ng_words)  
----

| id | NGワード |  

----
