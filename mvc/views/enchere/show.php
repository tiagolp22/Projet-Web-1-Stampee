{{ include('layouts/header.php', {title: 'Product Show'}) }}
<main class="main-login">
    <div class="form-form-login">
        <h2>Product Show</h2>
        <hr>
        <p><strong>Name:</strong> {{ product.timbre_nom }}</p>
        <p><strong>Date Creation:</strong> {{ product.date_creation }}</p>
        <p><strong>Couleurs:</strong> {{ product.couleurs }}</p>
        <p><strong>Tirage:</strong> {{ product.tirage }}</p>
        <p><strong>Dimensions:</strong> {{ product.dimensions }}</p>
        <p><strong>Pays Origine:</strong> {{ product.pays_origine }}</p>
        <p><strong>Categorie:</strong> {{ product.categorie }}</p>
        <p><strong>Condition:</strong> {{ product.condition_etat }}</p>
        <p><strong>Certifie:</strong> {{ product.certifie }}</p>
        <p>Image:</p><img src="{{ base }}/upload/{{ img }}"></strong></p>
        
        <a href="{{ base }}/product/edit?id={{ product.id }}" class="btn block">Edit</a>
        <form action="{{ base }}/product/delete" method="post">
            <input type="hidden" name="id" value="{{ product.id }}">
            <button class="btn block red">Delete</button>
        </form>
    </div>

    {{ include('layouts/footer.php') }}