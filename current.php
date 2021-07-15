$recruits = null; $array = array(); $current = null;

$array = [
          '1' => [
              "before" => "AAA",
              "after" => "aaa"
          ],
          '2' => [
              "before" => "BBB",
              "after" => "bbb"
          ]
        ];

$current = current(
  (array) $array
);

$current['before'];
$current['after'];

print_r($current['before']);
print_r($current['after']);