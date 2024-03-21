{{ include('layouts/header.php', { title: 'Users'})}}

<h1>Users</h1>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Privilege</th>
            <th>Since</th>
        </tr>
    </thead>
    <tbody>
        {% for user in user%}

        <tr>
            <td><a href="{{BASE}}user/show?id={{user.id}}">{{ user.name }}</a></td>
            <td>{{ user['username'] }}</td>
            <td>{{ user['email'] }}</td>
            <td>{{ user['privilege_id'] }}</td>
            <td>{{ user['created_at'] }}</td>
        </tr>

        {% endfor %}

    </tbody>
</table>
<a href="{{BASE}}user/create" class="btn">User Create</a>

