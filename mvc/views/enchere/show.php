{% include 'layouts/header.php' with {'title': 'Enchere Show'} %}

<main class="main-produit">
    <div class="page-produit">
        <div class="timbre">
            <div class="timbre-photo">
                <i class="fa-solid fa-chevron-left"></i>
                <div class="photo-produit-g">
                    <img src="{{ base }}/upload/{{ img }}"></p>
                </div>
                <i class="fa-solid fa-chevron-right"></i>
            </div>

            <div>
                <div class="icon-produit">
                    <form method="post" action="{{ base }}/favoris/store">
                        <div class="jaime">
                            J'aime
                            <button type="submit"><a href="{{ base }}/enchere/edit?id={{ enchere.id }}"> <i class="fa-regular fa-heart"></i></a></button>
                            <input type="hidden" name="date_ajout" value="<?php echo date('Y-m-d H:i:s'); ?>">
                            <input type="hidden" name="id_user" value="{{session.user_id}}">
                            <input type="hidden" name="id_enchere" value="{{enchere.id}}">
                        </div>
                    </form>
                    <div class="partager">
                        Partager
                        <i class="fa-regular fa-share-from-square"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="detail-produit">
            <div class="section-detail">
                <h3>{{ timbre_nom }}</h3>
                <p><strong>Date de début:</strong> {{ enchere.date_debut }}</p>
                <p><strong>Date de fin:</strong> {{ enchere.date_fin }}</p>
                <p><strong>Coup de coeur:</strong> {{ enchere.coup_de_coeur }}</p>
                <p><strong>Utilisateur:</strong> {{ enchere.id_user }}</p>
                <p><strong>Active:</strong> {{ enchere.active }}</p>
                <p><strong>Timbre:</strong> {{ enchere.id_timbre }}</p>
                <p><strong>Prix:</strong> {{ enchere.prix_min }}</p>

                <form class="form-login" method="post" action="{{ base }}/mise/store">
                    <div class="form-enchere-show">
                        <label for="prix_offert">Faire une offre:
                            <input type="number" name="prix_offert" min="{{enchere.prix_min}}" />
                        </label>
                        <button type="submit" class="btn">Miser</button>
                        <input type="hidden" name="date_heure" value="<?php echo date('Y-m-d H:i:s'); ?>">
                        <input type="hidden" name="id_user" value="{{session.user_id}}">
                        <input type="hidden" name="id_enchere" value="{{enchere.id}}">
                        <a href="{{ base }}/enchere/edit?id={{ enchere.id }}" class="btn block">Edit</a>
                    </div>
                </form>
                <form id="deleteForm" action="{{ base }}/enchere/delete" method="post">
                    <input type="hidden" name="id" value="{{ enchere.id }}">
                    <button id="deleteButton" class="btn block red">Delete</button>
                </form>

                <script>
                    document.getElementById('deleteButton').addEventListener('click', function(event) {
                        event.preventDefault(); 

                        var confirmDelete = confirm("Êtes-vous sûr de vouloir supprimer cet enregistrement ?");

                        if (confirmDelete) {
                            document.getElementById('deleteForm').submit(); 
                        }
                    });
                </script>
            </div>
        </div>

        <!-- <div class="produits-similaires">
            <h3 class="h3-produits-simulaires">Produits Similaires</h3>
            <hr />
            {% for enchere in encheres %}
            <img src="{{ base }}/upload/{{ img }}">
            {% endfor %}
        </div> -->
    </div>
</main>

{% include 'layouts/footer.php' %}