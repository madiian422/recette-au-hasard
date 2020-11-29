<main id="main">


    < <?php require 'db.php';

        $sql = 'SELECT * FROM recette';
        $statement = $connection->prepare($sql);
        $statement->execute();
        $recette = $statement->fetchAll(PDO::FETCH_OBJ);

        ?> <section id="menu" class="menu">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Menu</h2>

            </div>

            <div class="row">

                <div class="col-lg-4">


                    <?php foreach ($recette as $recettes) : ?>
                        <h2><?= $recettes->nom_recette; ?></h2>
                        <span>
                            <button class="btn btn-primary">Voir plus</button><br>
                        </span><br>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>

        </section><!-- End Why Us Section -->


</main><!-- End #main -->