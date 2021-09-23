<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
                padding: 0 10px;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                display: inline-block;
                margin: 0 0 15px;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Size_sort
                </div>
                <?php
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

                結合
                https://qiita.com/yukibe/items/242e55a9a69a4a7fa3db

                連想配列で要素を削除 unset関数
                https://pisuke-code.com/php-delete-element-in-foreach/
                https://techacademy.jp/magazine/12288

                並び替え
                https://snome.jp/programming/php-intro-8/

                */
                ?>
            </div>
        </div>
    </body>
</html>
