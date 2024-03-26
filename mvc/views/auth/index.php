{{ include('layouts/header.php', {title: 'Login'})}}



<main class="main-login">
      <div class="form-form-login">
      {% if errors is defined %}
    <div class="error">
        <ul>
        {% for error in errors %}
            <li>{{ error }}</li>
        {% endfor %}
        </ul>
    </div>
    {% endif %}
        <h2>Bienvenu.e!</h2>
        <form class="form-login" method="post">
        <label>Email
        <input type="email" name="email" value="{{ user.email}}">
        </label>
        <label>Password
            <input type="password" name="password">
        </label>
        <input type="submit" class="btn" value="Login">
          
          <div class="inscription-social-midia">
              <p>Complétez votre inscription avec :</p>
              <div class="login-icons">
                  <i class="fa-brands fa-facebook" aria-label="Connect with Facebook"></i>
                  <i class="fa-brands fa-google-plus-g" aria-label="Connect with Google"></i>
              </div>
          </div>
      </form>
      
      </div>
    </main>
{{ include('layouts/footer.php')}}