<!-- injection.php -->
<div class="row justify-content-center">
  <div class="col-md-6">
    <h3 class="mb-4">로그인</h3>

    <form action="index.php?cmd=loginsafe" method="post">
      <div class="mb-3">
        <label for="id" class="form-label">아이디</label>
        <input type="text" class="form-control" name="id" id="id" placeholder="아이디 입력" required>
      </div>

      <div class="mb-3">
        <label for="pass" class="form-label">비밀번호</label>
        <input type="password" class="form-control" name="pass" id="pass" placeholder="비밀번호 입력" required>
      </div>

      <div class="text-end">
        <button type="submit" class="btn btn-primary">로그인</button>
      </div>
    </form>
  </div>
</div>
