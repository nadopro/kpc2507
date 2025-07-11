<script>
    function checkError()
    {
        var mobile = document.getElementById("mobile");
        var regex = /^010-[0-9]{4}-[0-9]{4}$/;

        if(!regex.test(mobile.value))
        {
            // 실패
            alert('전화번호 형식은 010-1234-5678 입니다.');
            mobile.focus();
            return false;
        }

        return true;
    }
</script>

<form method="post" onSubmit="return checkError()">
<div class="row">
    <div class="col colLine">
        받는번호 <br>
        <input type="text" id="mobile" name="mobile" placeholder="010-1234-5678" class="form-control">
        <br>
        <input type="text" name="mobile1" required placeholder="010-1234-5678" class="form-control">
        <!--
        <br>
        <input type="text" name="mobile2" pattern="010-[0-9]{4}-[0-9]{4}" placeholder="010-1234-5678" class="form-control">
        -->
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

        include "auto_sms.php";
    }else
    {
        echo " 보내지 않음";
    }


?>