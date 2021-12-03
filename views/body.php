<!-- Mon container (avec une max-width) dans lequel mon contenu va être placé: https://getbootstrap.com/docs/4.1/layout/overview/#containers -->
<div class="container">      <!-- Je crée une nouvelle ligne dans ma grille virtuelle: https://getbootstrap.com/docs/4.1/layout/grid/-->
        <div class="row">
          
          <!-- Par défaut (= sur mobile) mon element <main> prend toutes les colonnes (=12)
          MAIS au dela d'une certaine taille, il n'en prendra plus que 9
          https://getbootstrap.com/docs/4.1/layout/grid/#grid-options -->
          <main class="col-lg-9">
  
                      <!-- Je dispose une card: https://getbootstrap.com/docs/4.1/components/card/ -->
            
            <?php foreach($viewVars['articleList'] as $article) : ?>
            
            <article class="card">
              <div class="card-body">
                <h2 class="card-title">
                  <a href=""><?= $article->getTitle() ?></a>
                </h2>
                <p class="card-text"><?= $article->getBody() ?></p>
                <p class="infos">
                  Posté par <a href="#" class="card-link"><?= $article->getAuthor() ?></a> <?= $article->getDateFr() ?> <a href="#" class="card-link">#<?= $article->getCategory() ?></a>
                </p>
              </div>
            </article>
           
            <?php endforeach; ?>
            
            <!-- Je met un element de navigation: https://getbootstrap.com/docs/4.1/components/pagination/ -->
            <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-between">
                <li class="page-item"><a class="page-link" href="#"><i class="fas fa-arrow-left"></i> Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">Next <i class="fas fa-arrow-right"></i></a></li>
              </ul>
            </nav>
  
          </main>
  
                  <aside class="col-lg-3">
            <!-- Champ de recherche: https://getbootstrap.com/docs/4.1/components/input-group/ -->
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Rechercher un article..." aria-label="Rechercher un article..." aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button">Allez</button>
              </div>
            </div>
  
            <!-- Catégories: https://getbootstrap.com/docs/4.1/components/card/#list-groups-->
            <div class="card">
              <h3 class="card-header">Catégories</h3>
              <ul class="list-group list-group-flush">
              <?php foreach($viewVars['categoryList'] as $category) : ?>
                <li class="list-group-item"><?= $category->getName() ?></li>
                <?php endforeach; ?>
                <!-- <li class="list-group-item">TeamBack</li>
                <li class="list-group-item">TeamFront</li>
                <li class="list-group-item">Collaboration</li>
                <li class="list-group-item">Ma vie de Dev'</li> -->
              </ul>
            </div>
  
            <!-- Auteurs: https://getbootstrap.com/docs/4.1/components/card/#list-groups -->
            <div class="card">
              <h3 class="card-header">Auteurs</h3>
                <ul class="list-group list-group-flush">
                  <?php foreach($viewVars['authorList'] as $author) : ?>
                    <li class="list-group-item"><?= $author->getName() ?></li>
                  <?php endforeach; ?>
                    <!-- <li class="list-group-item">Maxime</li>
                    <li class="list-group-item">Anthony</li>
                    <li class="list-group-item">Alexandre</li>
                    <li class="list-group-item">Dario</li>
                    <li class="list-group-item">Julie</li>
                    <li class="list-group-item">Lucie</li>
                    <li class="list-group-item">Xavier</li> -->
                </ul>
            </div>
  
          </aside>
        </div><!-- /.row -->