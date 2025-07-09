<form method="post">
<div class="row">
    <div class="col-2 colLine">생성수</div>
    <div class="col-8 colLine">
        <input type="text" name="count" placeholder="실행 횟수" class="form-control">
    </div>
    <div class="col-2 colLine">
        <button type="submit" class="btn btn-primary form-control">실행</div>
    </div>
</div>
</form>

<?php

$name1 = "강,강,고,곽,구,권,김,김,김,김,이,이,박,민,최,최,정,오,오,독고,선우,하,한,서,박,김,박,우,김,오";
$name2 = "석,연,윤,인,정,효,석,영,소,호,진,택,대,미,민,상,영,예,중,지,찬,학,현,재,종,기,동,은,홍,선,혜,용,상,창,덕,윤,건,표,태,영,승,종,박";
$name3 = "하,민,구,훈,우,림,태,은,정,선,근,석,영,한,광,성,우,호,재,연,조,임,진,훈,길,석,복,정,준,진,민,진,혜,헌,수,미,하,규,아,은,현,숙,빈,옥,태,식,자,엽,일,랑,섭,국,만,섭,기,혁,애,완,주,란,홍";

    if(isset($_POST["count"]))
    {
        $count = $_POST["count"];
        ?>
        <table class='table table-bordered'>
            <tr>
                <td>순서</td>
                <td>이름</td>
            </tr>

            <?php
                for($i=1; $i <=$count ; $i++)
                {
                    $split1 = explode(",", $name1);
                    $split2 = explode(",", $name2);
                    $split3 = explode(",", $name3);

                    $r1 = rand(0, count($split1)-1);
                    $r2 = rand(0, count($split2)-1);
                    $r3 = rand(0, count($split3)-1);

                    $n1 = $split1[$r1];
                    $n2 = $split2[$r2];
                    $n3 = $split3[$r3];

                    $name = $n1 . $n2 . $n3;

                    echo "
                    <tr>
                        <td>$i</td>
                        <td>$name</td>
                    </tr>
                    ";

                }
            ?>
        </table>    
        <?php
    }

?>