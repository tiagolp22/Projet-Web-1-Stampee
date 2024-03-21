{{ include('layouts/header.php', {title: 'Ajouter un produit'}) }}

<div class="container">
    <h2>Ajouter un produit</h2>
    <form method="post">
        <label>Nom :
            <input type="text" name="name" value="{{ product.name }}">
        </label>
        {% if errors.name is defined %}
            <span class="error">{{ errors.name }}</span>
        {% endif %}
        <label>Description :
            <textarea name="description">{{ product.description }}</textarea>
        </label>
        {% if errors.description is defined %}
            <span class="error">{{ errors.description }}</span>
        {% endif %}
        <label>Prix :
            <input type="number" name="price" value="{{ product.price }}" step="0.01">
        </label>
        {% if errors.price is defined %}
            <span class="error">{{ errors.price }}</span>
        {% endif %}
        <input type="submit" class="btn" value="Enregistrer">
    </form>
</div>

{{ include('layouts/footer.php') }}
