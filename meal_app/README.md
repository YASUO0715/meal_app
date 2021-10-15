
# 食事投稿App

## About this app
---
* 食事を気軽にCRUDできるアプリ
* ログイン時のお気に入り機能を搭載
* 初期データとして、複数のユーザ・画像をファクトリーで登録しています。

## テーブル定義
---
* categoriesテーブル・・・食事の栄養成分情報が含まれるの食事のカテゴリ情報を格納
* postsテーブル・・・各投稿の情報を格納、categoriestableへの外部キーあり
* likesテーブル・・・poststable,Userstableへの外部キーあり


## 実装機能
---

* CRUD
  * 食事がCRUDできるようになっています
  * バリデーションも実装済

* お気に入り
  * ユーザIDに紐付けられ「お気に入り」がカウントできるようになっています。

* ファイルアップロード
   * 商品の画像は、ファイルアップロードできるようにしました


## 画面
---
一覧画面

![index01](app/images/index01.png)


新規登録画面

![create01](app/images/create01.png)
![create01](app/images/create02.png)


詳細画面

*ログイン時
![show01](app/images/show01.png)

*ログアウト時
![show02](app/images/show02.png)


編集画面

![edit01](app/images/edit01.png)



