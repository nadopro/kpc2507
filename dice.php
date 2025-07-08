<form method="post">
<div class="row">
    <div class="col-2 colLine">횟수</div>
    <div class="col-8 colLine">
        <input type="text" name="count" placeholder="실행 횟수" class="form-control">
    </div>
    <div class="col-2 colLine">
        <button type="submit" class="btn btn-primary form-control">실행</div>
    </div>
</div>
</form>
<?php
    if(isset($_POST['count']))
    {
        $count = $_POST['count'];

        $dice = array();

        for($i=1; $i<=6; $i++)
            $dice[$i] = 0;

        for($i=1; $i<=$count; $i++)
        {
            $rand = rand(1, 6);
            $dice[$rand] ++;
        }

        ?>
        <div class="row">
            <div class="col colLine">
        <?php
        for($i=1; $i<=6; $i++)
        {
            echo "[$i] $dice[$i]<br>";
        }
        ?>  
            </div>
        </div>

        <?php
    }
?>