{{ include('layouts/header.php', {title: 'Registration'})}}

<main class="main-login">
    <div class="form-form-login">
        <form class="form-login" method="POST">
            <div class="container">
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
                    Privilege
                    <select name="id_privilege">
                        <option value="">Select Privilege</option>
                        {% for privilege in privileges %}
                        <option value="{{ privilege.id }}" {% if privilege.id == stampee_user.id_privilege %} selected {% endif %}>
                            {{ privilege.privilege }}
                        </option>
                        {% endfor %}
                    </select>
                </label>
                <input type="submit" class="btn" value="Save">
            </div>
        </form>
    </div>
</main>

{{ include('layouts/footer.php')}}
