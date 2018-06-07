<?php
try {

	// 接続
	$pdo = new PDO('sqlite:hoge.sqlite');

	// SQL実行時にもエラーの代わりに例外を投げるように設定
	// (毎回if文を書く必要がなくなる)
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// デフォルトのフェッチモードを連想配列形式に設定
	// (毎回PDO::FETCH_ASSOCを指定する必要が無くなる)
	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);


	// 選択 (プリペアドステートメント)
	$stmt = $pdo->prepare("SELECT * FROM fruit WHERE price = ?");
	$stmt->execute(['200']);
	$r2 = $stmt->fetchAll();

	// 結果を確認
	var_dump($r2);exit;

} catch (Exception $e) {

	echo $e->getMessage() . PHP_EOL;

}