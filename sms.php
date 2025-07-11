<form method="post">
<div class="row">
    <div class="col colLine">
        받는번호 <br>
        <input type="text" name="mobile" placeholder="010-1234-5678" class="form-control">
    </div>
    <div class="col colLine">
        <textarea name="smscontent" rows="5" class="form-control"></textarea>
    </div>
    <div class="col colLine">
        <button type="submit" class="btn btn-primary">
            <span class="material-icons">send</span>
        </button>
    </div>
</div>
</form>

<?php
    if(isset($_POST['mobile']) and isset($_POST['smscontent']))
    {
        $receiver = $_POST['mobile'];
        $memo = $_POST['smscontent'];

        echo "rcv: $receiver, memo = $memo";
    }else
    {
        echo " 보내지 않음";
    }


?>