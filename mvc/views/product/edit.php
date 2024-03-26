{{ include('layouts/header.php', {title: 'Product Create'})}}
<main class="main-login">
    <div class="form-form-login">
        <form class="form-login" method="post">
            <label>Nom :
                <input type="text" name="name" value="{{ stampee_timbre.timbre_nom }}">
            </label>
            {% if errors.name is defined %}
            <span class="error">{{ errors.name }}</span>
            {% endif %}

            <label>Date de Creation :
                <input type="date" name="date_creation" value="{{ stampee_timbre.date_creation }}">
            </label>
            {% if errors.date_creation is defined %}
            <span class="error">{{ errors.date_creation }}</span>
            {% endif %}

            <label>Couleurs :
                <input type="text" name="couleurs" value="{{ stampee_timbre.couleurs }}">
            </label>
            {% if errors.couleurs is defined %}
            <span class="error">{{ errors.couleurs }}</span>
            {% endif %}

            <label>Tirage :
                <input type="text" name="tirage" value="{{ stampee_timbre.tirage }}">
            </label>
            {% if errors.tirage is defined %}
            <span class="error">{{ errors.tirage }}</span>
            {% endif %}

            <label>Dimensions :
                <input type="text" name="dimensions" value="{{ stampee_timbre.dimensions }}">
            </label>
            {% if errors.dimensions is defined %}
            <span class="error">{{ errors.dimensions }}</span>
            {% endif %}

            <label>Pays origine :
                <input type="text" name="pays_origine" value="{{ stampee_timbre.pays_origine }}">
            </label>
            {% if errors.pays_origine is defined %}
            <span class="error">{{ errors.pays_origine }}</span>
            {% endif %}

            <label>Categorie :
                <input type="text" name="categorie" value="{{ stampee_timbre.categorie }}">
            </label>
            {% if errors.categorie is defined %}
            <span class="error">{{ errors.categorie }}</span>
            {% endif %}

            <label>Condition :
                <input type="text" name="condition" value="{{ stampee_timbre.condition }}">
            </label>
            {% if errors.condition is defined %}
            <span class="error">{{ errors.condition }}</span>
            {% endif %}

            <label>Certifie :
                <input type="text" name="certifie" value="{{ stampee_timbre.certifie }}">
            </label>
            {% if errors.certifie is defined %}
            <span class="error">{{ errors.certifie }}</span>
            {% endif %}

            {% if errors.image_principale is defined %}
            <label>Imagem Principal:</label>
            <img src="{{ base }}/upload/{{ stampee_timbre.image_principale }}" alt="Imagem Principal" />
            {% endif %}

            <input type="submit" class="btn" value="Enregistrer">
        </form>
    </div>
</main>

{{ include('layouts/footer.php') }}