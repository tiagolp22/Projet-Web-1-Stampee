{{ include('layouts/header.php', {title: 'Enchères'}) }}

<section class="flex-container">
    <aside class="aside_menu">
        <form class="aside_menu__form">
            <label for="prix">Prix: <span>(0 a 10.000)</span></label>
            <input id="prix" type="range" name="prix" min="1" max="10.000" class="aside_menu__input_range" />

            <div class="aside_menu_input_annee">
                <label for="annee">Année</label>
                <input id="annee" type="number" name="annee" class="aside_menu__input_range" />
            </div>

            <div class="aside_menu_input_pays">
                <label for="pays">Pays</label>
                <select id="pays" name="pays" class="aside_menu_input_pays_select">
                    <option value=""></option>
                    <option value="Afrique du Sud">Afrique du Sud</option>
                    <option value="Brésil">Brésil</option>
                    <option value="Canada">Canada</option>
                    <option value="Danemark">Danemark</option>
                    <option value="Finlande">Finlande</option>
                    <option value="Grèce">Grèce</option>
                    <option value="Honduras">Honduras</option>
                    <option value="Italie">Italie</option>
                </select>
            </div>

            <fieldset>
                <legend>Condition</legend>
                <div class="aside_menu_input_condition">
                    <div class="aside_menu_input_condition_option">
                        <input id="nouveau" type="checkbox" name="nouveau" value="Nouveau" />
                        <label for="nouveau">Nouveau</label>
                    </div>
                    <div class="aside_menu_input_condition_option">
                        <input id="bon_etat" type="checkbox" name="bon_etat" value="bon_etat" />
                        <label for="bon_etat">Bon état</label>
                    </div>
                    <div class="aside_menu_input_condition_option">
                        <input id="endomage" type="checkbox" name="endomage" value="Endomagé" />
                        <label for="endomage">Endomagé</label>
                    </div>
                </div>
                </div>

                <div class="aside_menu_input_autentication">
                    <p><abbr title="Copie officielle">Authentifié&nbsp;?</abbr></p>

                    <div class="aside_menu_input_autentication_options">
                          <label for="authentifie">Oui</label>
                        <input id="authentifie" type="radio" name="Oui" value="Oui" />

                        <label for="authentifie">Non</label>
                          <input id="authentifie" type="radio" name="non" value="Non" />
                    </div>
                </div>

                <button type="submit" class="btn">Soumettre</button>
        </form>
    </aside>

    <main class="container-main">

        <div class="main-grid">
        {% if encheres %} 
            {% for enchere in encheres %}
            <div class="main-grid__tuile">
                <div>
                    <img src="{{ base }}/upload/{{ enchere['image'] }}" alt="" class="main-grid__image" />
                    <h3>{{ enchere['timbre_nom'] }}</h3>
                </div>
                <a href="{{ base }}/enchere/show?id={{ enchere['id'] }}" class="btn">Miser</a>
                <a href="{{ base }}/enchere/show?id={{ enchere['id'] }}" class="btn">En savoir plus</a>
            </div>
            {% endfor %}
        {% else %}
        <h2>Malheureusement, nous n'avons pas d'enchères actives :/</h2>
        {% endif %}
        </div>

</section>
{{ include('layouts/footer.php') }}