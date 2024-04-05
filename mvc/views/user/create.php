{{ include('layouts/header.php', {title: 'Registration'})}}

<main class="main-login">
    <div class="form-form-login">
        <form class="form-login" method="POST">

            {% if errors is defined %}
            <div class="error">
                <ul>
                    {% for error in errors %}
                    <li>{{ error }}</li>
                    {% endfor %}
                </ul>
            </div>
            {% endif %}
            <h2>Registration</h2>
            <label>Name
                <input type="text" name="user_name" value="{{ steampee_user.user_name}}">
            </label>
            <label>Email
                <input type="email" name="email" value="{{ steampee_user.email}}">
            </label>
            <label>Password
                <input type="password" name="password">
            </label>
            <label>
                <input type="hidden" name="id_privilege" value="2">
            </label>
            <input type="submit" class="btn" value="Save">

        </form>
    </div>
</main>

{{ include('layouts/footer.php')}}