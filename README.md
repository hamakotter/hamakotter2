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

<<<<<<< HEAD
#デーブル(カッコ内はテーブル名)    
=======
#テーブル(カッコ内はテーブル名)    
>>>>>>> origin/furu_tuww

つぶやきを管理するテーブル(posts)    
----
    | 列名       | 種類    | 詳細       |
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
<<<<<<< HEAD
=======

Session用のテーブル(cake_sessions)    
----

    | 列名       | 種類    |
    | id         | INT     | 
    | data      　| TEXT    |
    | expires    | INT     |
----

ログイン用のユーザーテーブル(users)    
----

    | 列名       | 種類    | 詳細       |
    | id         | INT     | id         |  
    | username 　| VERCHAR | ユーザー名 |  
    | password   | VERCHAR | パスワード |  

----
>>>>>>> origin/furu_tuww
