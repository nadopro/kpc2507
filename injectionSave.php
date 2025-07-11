<!-- injection.php -->
<div class="row justify-content-center">
  <div class="col-md-6">
    <h3 class="mb-4">로그인</h3>

    <form action="index.php?cmd=login" onSubmit="return checkErrorAndSave()" method="post">
      <div class="mb-3">
        <label for="id" class="form-label">아이디</label>
        <input type="text" class="form-control" name="id" id="id" placeholder="아이디 입력" required>
      </div>

      <div class="mb-3">
        <label for="pass" class="form-label">비밀번호</label>
        <input type="password" class="form-control" name="pass" id="pass" placeholder="비밀번호 입력" required>
      </div>

      <div class="mb-3">
        <input type="checkbox" name="saveid" id="saveid"> ID저장 
        <input type="checkbox" name="savepass" id="savepass"> PW저장 
      </div>

      <div class="text-end">
        <button type="submit" class="btn btn-primary">로그인</button>
      </div>
    </form>
  </div>
</div>

<script>
  function encodeBase64(str) {
    return btoa(unescape(encodeURIComponent(str)));
  }

  function decodeBase64(str) {
    try {
      return decodeURIComponent(escape(atob(str)));
    } catch (e) {
      return "";
    }
  }

  window.onload = function () {
    const savedId = localStorage.getItem("saved_id");
    const savedPass = localStorage.getItem("saved_pass");

    if (savedId) {
      document.getElementById("id").value = savedId;
      document.getElementById("saveid").checked = true;
    }

    if (savedPass) {
      const decrypted = decodeBase64(savedPass);
      document.getElementById("pass").value = decrypted;
      document.getElementById("savepass").checked = true;
    }
  };

  function checkErrorAndSave() {
    const idInput = document.getElementById("id");
    const passInput = document.getElementById("pass");

    const id = idInput.value.trim();
    const pass = passInput.value.trim();

    const saveIdChecked = document.getElementById("saveid").checked;
    const savePassChecked = document.getElementById("savepass").checked;

    // 유효성 검사
    if (id.length < 4) {
      alert("아이디는 최소 4글자 이상이어야 합니다.");
      return false;
    }
    if (pass.length < 4) {
      alert("비밀번호는 최소 4글자 이상이어야 합니다.");
      return false;
    }

    // 저장
    if (saveIdChecked) {
      localStorage.setItem("saved_id", id);
    } else {
      localStorage.removeItem("saved_id");
    }

    if (savePassChecked) {
      localStorage.setItem("saved_pass", encodeBase64(pass));
    } else {
      localStorage.removeItem("saved_pass");
    }

    // ✅ 전송 전 암호화 (BurpSuite 노출 방지)
    passInput.value = encodeBase64(pass);

    return true; // 계속 제출 진행
  }
</script>

