{{ include('layouts/header.php', {title: 'Registration'})}}
<main class="main-login">
    <div class="form-form-login">
        <h2>User Show</h2>
        <hr>
        <p><strong>Name:</strong> {{ user.user_name }}</p>
        <p><strong>Address:</strong> {{ user.email }}</p>
        <a href="{{base}}/user/edit?id={{user.id}}" class="btn block">Edit</a>
        <form action="{{base}}/user/delete" method="post">
            <input type="hidden" name="id" value="{{ user.id }}">
            <button class="btn block red">Delete</button>
        </form>
    </div>
    {{ include('layouts/footer.php')}}