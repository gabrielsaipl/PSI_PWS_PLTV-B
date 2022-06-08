
<div class="login-page">
    <div class="form">
    <form class="login-form" method="post" action="?c=login&a=login">
        <h2>Efetuar Login</h2>
      <input type="text" id="username" name="name" placeholder="username" required placeholder="Enter Name" oninvalid="this.setCustomValidity('Introduza o nome de utilizador')" oninput="this.setCustomValidity('')"/>
      <input type="password" id="password" name="password" placeholder="password" required placeholder="Enter Name" oninvalid="this.setCustomValidity('Introduza o nome de utilizador')" oninput="this.setCustomValidity('')"/>
      <button>login</button>
    </form>
  </div>
</div>