{{ include('layouts/header.php', {title: 'Products'}) }}
<main class="main-login">
    <h1>Products</h1>
    <table class="table-produit">
        <tr>
            <th>Name</th>
            <th>Date Creation</th>
            <th>Couleurs</th>
            <th>Tirage</th>
            <th>Dimensions</th>
            <th>Pays Origine</th>
            <th>Categorie</th>
            <th>Condition</th>
            <th>Certifie</th>
        </tr>
        {% for product in products %}
        <tr>
            <td><a href="{{ base }}/product/show?id={{ product.id }}">{{ product.timbre_nom }}</a></td>
            <td>{{ product.date_creation }}</td>
            <td>{{ product.couleurs }}</td>
            <td>{{ product.tirage }}</td>
            <td>{{ product.dimensions }}</td>
            <td>{{ product.pays_origine }}</td>
            <td>{{ product.categorie }}</td>
            <td>{{ product.condition_etat }}</td>
            <td>{{ product.certifie }}</td>
        </tr>
        {% endfor %}

    </table>
    <a href="{{ base }}/product/create" class="btn">Product Create</a>

    {{ include('layouts/footer.php') }}