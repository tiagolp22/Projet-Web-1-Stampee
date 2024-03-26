{{ include('layouts/header.php', {title: 'Ajouter un produit'}) }}

<main class="main-login">

    <div class="form-form-login">

        <form class="form-login" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_user" value="{{session.user_id}}">
            <label>Nom :
                <input type="text" name="timbre_nom" value="{{ stampee_timbre.timbre_nom }}">
            </label>
            {% if errors.timbre_nom is defined %}
            <span class="error">{{ errors.timbre_nom }}</span>
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
                <input type="text" name="condition_etat" value="{{ stampee_timbre.condition_etat }}">
            </label>
            {% if errors.condition_etat is defined %}
            <span class="error">{{ errors.condition_etat }}</span>
            {% endif %}

            <label>Certifie :
                <input type="text" name="certifie" value="{{ stampee_timbre.certifie }}">
            </label>
            {% if errors.certifie is defined %}
            <span class="error">{{ errors.certifie }}</span>
            {% endif %}

            <label>Image Principale:
                <input type="file" name="image_principale">
            </label>
            {% if errors.image_principale is defined %}
            <span class="error">{{ errors.image_principale }}</span>
            {% endif %}

            <label>Images:
                <input type="file" name="images[]" multiple>
            </label>
            {% if errors.images is defined %}
            <span class="error">{{ errors.images }}</span>
            {% endif %}

            <input type="submit" class="btn" value="Enregistrer">
        </form>
    </div>
</main>

{{ include('layouts/footer.php') }}