<?php
// cs_sizeを基準にして並び替える方法
// 条件 数値は小さい順
// 英語表記は任意の順番で並び替え

// 複雑な多次元配列を配列する
$options = array( 
  1 => array (
	  "value" => 98454,
	  "cs_info" => "S - 販売中",
	  "cs_size" => "S",
	  "sale_status" => "販売中" ),
  2 => array (
	  "value" => 6005,
	  "cs_info" => "38 - 残りわずか",
	  "cs_size" => "38",
	  "sale_status" => "残りわずか" ),
  3 => array (
	  "value" => 87462,
	  "cs_info" => "XL - 販売中",
	  "cs_size" => "XL",
	  "sale_status" => "販売中" ),
  4 => array (
	  "value" => 6001,
	  "cs_info" => "35 - 残り1点",
	  "cs_size" => "35",
	  "sale_status" => "残り1点" ),
  5 => array (
	  "value" => 6003,
	  "cs_info" => "36 - 残り1点",
  	"cs_size" => "36",
	  "sale_status" => "残り1点" ),
  6 => array (
	  "value" => 16580,
	  "cs_info" => "M - 残り1点",
	  "cs_size" => "M",
	  "sale_status" => "残り1点" ),
  7 => array (
	  "value" => 16580,
	  "cs_info" => "XS - 残り1点",
	  "cs_size" => "XS",
	  "sale_status" => "残り1点" ),
  8 => array (
	  "value" => 6004,
	  "cs_info" => "37 - 残り1点",
	  "cs_size" => "37",
	  "sale_status" => "残り1点" ),
  9 => array (
	  "value" => 15399,
	  "cs_info" => "39.5 - 再入荷受付中",
	"cs_size" => "39.5",
	"sale_status" => "再入荷受付中" ),
  10 => array (
	"value" => 15400,
	"cs_info" => "41.5 - 再入荷受付中",
	"cs_size" => "41.5",
	"sale_status" => "再入荷受付中" ),
  11 => array (
	"value" => 75485,
	"cs_info" => "L - 販売中",
	"cs_size" => "L",
	"sale_status" => "販売中" ),
  12 => array (
	"value" => 8424,
	"cs_info" => "36.5 - 残り1点",
	"cs_size" => "36.5",
	"sale_status" => "残り1点" ),
  13 => array (
	"value" => 6002,
	"cs_info" => "35.5 - 残り1点",
	"cs_size" => "35.5",
	"sale_status" => "残り1点" )
);

// 任意に並び替える為に配列を作成する
$sorter = array( 'XS', 'XS/S', 'S', 'M', 'M/L', 'L', 'L/XL', 'XL' );

// サイズが英語表記用の$options_enの変数を作成
$options_en = $options;

// 配列を回して$value['cs_size']が数値だったら除外して、英語表記のサイズのみ出力させる。
foreach ($options_en as $key => $value) {
  if( !( in_array($value['cs_size'], $sorter) ) ) {
      unset( $options_en[$key] );
  }
}

// 英語表記を$sorterどおりに並び替えをする
uasort( $options_en, function( $before, $after ) use ( $sorter ) {
  return array_search( $before["cs_size"], $sorter ) > array_search( $after["cs_size"], $sorter );
} );

// サイズが数値用の$options_intの変数を作成
$options_int = $options;

// 配列を回して$value['cs_size']が英語表記だったら除外して、数値のサイズのみ出力させる。
foreach ($options_int as $key => $value) {
  if( ( in_array($value['cs_size'], $sorter) ) ) {
      unset( $options_int[$key] );
  }
}

// 数値が小さい順に並べる
uasort($options_int, function ($value1, $value2) use ( $sorter ) {
   return $value1['cs_size'] - $value2['cs_size'];
});

// $options_enと$options_intを組み合わせる
$options = array_merge( $options_en, $options_int );

print_r($options);

/*
Array (
	[0] => Array (
		[value] => 16580
		[cs_info] => XS - 残り1点
		[cs_size] => XS
		[sale_status] => 残り1点
	)
	[1] => Array (
		[value] => 98454
		[cs_info] => S - 販売中
		[cs_size] => S
		[sale_status] => 販売中
	)
	[2] => Array (
		[value] => 16580
		[cs_info] => M - 残り1点
		[cs_size] => M
		[sale_status] => 残り1点
	)
	[3] => Array (
		[value] => 75485
		[cs_info] => L - 販売中
		[cs_size] => L
		[sale_status] => 販売中
	)
	[4] => Array (
		[value] => 87462
		[cs_info] => XL - 販売中
		[cs_size] => XL
		[sale_status] => 販売中
	)
	[5] => Array (
		[value] => 6001
		[cs_info] => 35 - 残り1点
		[cs_size] => 35
		[sale_status] => 残り1点
	)
	[6] => Array (
		[value] => 6003
		[cs_info] => 36 - 残り1点
		[cs_size] => 36
		[sale_status] => 残り1点
	)
	[7] => Array (
		[value] => 6002
		[cs_info] => 35.5 - 残り1点
		[cs_size] => 35.5
		[sale_status] => 残り1点
	)
	[8] => Array (
		[value] => 6004
		[cs_info] => 37 - 残り1点
		[cs_size] => 37
		[sale_status] => 残り1点
	)
	[9] => Array (
		[value] => 8424
		[cs_info] => 36.5 - 残り1点
		[cs_size] => 36.5
		[sale_status] => 残り1点
	)
	[10] => Array (
		[value] => 6005
		[cs_info] => 38 - 残りわずか
		[cs_size] => 38
		[sale_status] => 残りわずか
	)
	[11] => Array (
		[value] => 15399
		[cs_info] => 39.5 - 再入荷受付中
		[cs_size] => 39.5
		[sale_status] => 再入荷受付中
	)
	[12] => Array (
		[value] => 15400
		[cs_info] => 41.5 - 再入荷受付中
		[cs_size] => 41.5
		[sale_status] => 再入荷受付中
	)
)

*/