{{ include('layouts/header.php', { title: 'Users'})}}
<main class="main-login">
    <div class="form-form-login">
        <h1>Users</h1>

        {% for user in users %}

        <p><a href="{{BASE}}user/show?id={{user.id}}">{{ user.user_name }}</a></p>
        <p>{{ user['email'] }}</p>

        {% endfor %}

        <form action="{{ base }}/user/delete" method="post">
            <input type="hidden" name="id" value="{{ user.id }}">
            <button class="btn block red">Delete</button>
            <a href="{{BASE}}user/create" class="btn">User Create</a>
        </form>
    </div>

    {{ include('layouts/footer.php')}}