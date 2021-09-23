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
                    prev next
                </div>
                <?php
                    /**
                    * array_filter function
                    * prev function
                    * next function
                    * end function sample
                    **/

                    $target_key = '260';

                    /**
                    * array
                    **/
                    $news = array( 
                        10 => array( 'id' => 210, 'title' => 'aaa' ),
                        30 => array( 'id' => 250, 'title' => 'bbb' ),
                        50 => array( 'id' => 260, 'title' => 'ccc' ),
                        70 => array( 'id' => 270, 'title' => 'ddd' ),
                        90 => array( 'id' => 300, 'title' => 'eee' )
                    );

                    /**
                    * array_filter function
                    **/
                    $filter_next = array_filter( $news, function ( $entry ) {
                        if($entry['id'] == '260' ) {
                            return true;
                        } else {
                            return false;
                        }
                    }
                    );

                    /**
                    * prev end function
                    **/
                    function array_prev_pointer( $array, $target ) {
                        $length = count( $array ); $return = current($array); $li = 1;
                        foreach( $array as $key => $value ) {
                        $return = next($array);
                        if( $value['id'] == $target ) {
                            if( $length == $li ) {
                                $return = end($array);
                            } else {
                                $return = prev($array);
                                $return = prev($array);
                            }
                            return $return;
                        }
                        $li++;
                        }
                    }

                    /**
                    * next end function
                    **/
                    function array_next_pointer( $array, $target ) {
                        $length = count( $array ); $return = current($array); $li = 1;
                        foreach( $array as $key => $value ) {
                        $return = next($array);
                        if( $length == $li ) {
                            return false;
                        } else {
                            if( $value['id'] == $target ) {
                            return $return;
                            }
                        }
                        }
                    }

                    $prev_data = array_prev_pointer($news, $target_key);
                    $next_tada = array_next_pointer($news, $target_key);

                    var_dump($prev_data['id']); //  250
                    var_dump($next_tada['id']); //  300

                ?>
            </div>
        </div>
    </body>
</html>
