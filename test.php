<?php
    $array = [
        ["id" => 1, "date" => "12.01.2020", "name" => "test1"],
        ["id" => 2, "date" => "02.05.2020", "name" => "test2"],
        ["id" => 4, "date" => "08.03.2020", "name" => "test4"],
        ["id" => 1, "date" => "22.01.2020", "name" => "test1"],
        ["id" => 2, "date" => "11.11.2020", "name" => "test4"],
        ["id" => 3, "date" => "06.06.2020", "name" => "test3"],
    ];
 
    //task1
    function unique_keys($arr){
        $uniqueKeys = array_keys(
            array_unique(
                array_map(function($item) {
                    return $item['id'];
                }, $arr)
                )
            );
            
            define("keys", $uniqueKeys);
            print_r($uniqueKeys);
          $uniqueArray = array_filter($arr, function($itemKey) {
                return in_array($itemKey, keys);
          }, ARRAY_FILTER_USE_KEY);
          return $uniqueArray;
    }
    unique_keys($array);

    // task2
    function cmp_function($a, $b){
        return ($a['id'] > $b['id']);
    }

    uasort($array, 'cmp_function');
    print_r($array);

    
    //task3
    $id_arr = 1;
    $filter_arr = array_filter($array, function ($value) use ($id_arr) {
                return ($value["id"] == $id_arr);
            });
    
    //task4
    function cmp_desc_function($a, $b){
        return ($a['name'] < $b['name']);
    }
    uasort($array, 'cmp_desc_function');
    $idArray = array_column($array,'id','name');
    print_r($idArray);

    //task5
    /*select goods.id as good_id, goods.name 
    from goods_tags join goods on goods_tags.goods_id = goods.id
    where (select count(id) from tags) = (select count(tag_id) from goods_tags where good_id = goods_tags.good_id)
    GROUP BY good_id */

    //task6
    // select department_id from evaluations where gender=true group by department_id having min(value) > 5
?>