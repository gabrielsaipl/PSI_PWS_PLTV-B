
<div class="login-page">
    <div class="form">
    <form class="login-form" method="post" action="index.php?c=login&a=login">
        <h2>Efetuar Login</h2>
      <input type="text" id="email" name="email" placeholder="email" required oninvalid="this.setCustomValidity('Introduza o seu email')" oninput="this.setCustomValidity('')"/>
      <input type="password" id="password" name="password" placeholder="palavra-passe" required oninvalid="this.setCustomValidity('Introduza a sua password')" oninput="this.setCustomValidity('')"/>
      <button>login</button>
    </form>
  </div>
</div>
