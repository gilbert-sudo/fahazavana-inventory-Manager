<?php
include('classes/Mysql.php');

?>
<div class="cadastro-cliente">
    <h3 class="page-header">Ajouter un produit</h3>
    <form class="form-cliente" method="post" enctype="multipart/form-data" action="php/add-product.php">

        <div class="row">
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Nom</label>
                <input type="text" required type="text" class="form-control" name="descricao" placeholder="Entrez la description du produit">
            </div>
           
        </div>

        <div class="row">

            <div class="form-group col-sm-5">
                <label for="exampleInputEmail1">Fournisseur</label>
                <label for="exampleInputEmail1">Utilisateur</label>
                <?php

                $sql = $db->prepare("SELECT * FROM tb_fornecedores");
                $sql->execute();
                $reg = $sql->fetchAll();
                $a = count($reg);
                $cont = 0;

                ?>
                <select name="fornecedor" size="1" style="width: 292px; height: 38px; border-radius: 4px">
                    <?php while ($cont < $a) { ?>
                        <option value="<?php echo $reg[$cont]['id']; ?>">
                            <?php echo $reg[$cont]['nome'] ?>
                        </option>
                    <?php $cont++;
                    }
                    ?>
                </select>

            </div>

        </div>
        <div class="row">
            <?php if (isset($_SESSION['access']) && $_SESSION['access'] == 1) : ?>
                <div class="form-group col-md-3">
                    <label>Prix d'achat</label>
                    <input type="number" required type="number" class="form-control" name="custo" placeholder="Entrez le montant du coût du produit" step="0.01">
                </div>
            <?php endif; ?>
            <?php if (!isset($_SESSION['access'])) : ?>
                    <input type="hidden" required class="form-control" name="custo" value="false">
            <?php endif; ?>
            <div class="form-group col-md-3">
                <label>Prix de vente</label>
                <input type="number" required type="number" class="form-control" name="venda" placeholder="Entrez le prix de vente " step="0.01">
            </div>
            <div class="form-group col-md-3">
                <label>La quantité</label>
                <input min="0" step="0.1" oninput="validity.valid||(value='');" required type="number" class="form-control" name="quantidade" placeholder="Entrez la quantité du produit">
            </div>
        </div>
        <div class="row">

            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Catégorie: </label>
                <?php
                $sql = $db->prepare("SELECT * FROM tb_categorie");
                $sql->execute();
                $reg = $sql->fetchAll();
                $a = count($reg);
                $cont = 0;
                ?>
                <select name="principio" size="1" style="width: 252px; height: 38px;margin-right:20px; border-radius: 4px">
                    <?php while ($cont < $a) { ?>
                        <option value="<?php echo $reg[$cont]['nom']; ?>">
                            <?php echo $reg[$cont]['nom'] ?>
                        </option>
                    <?php $cont++;
                    }
                    ?>

                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Alert rupture</label>
                <input type="text" type="text" class="form-control" name="codInterno" placeholder="Entrez le code interne">
            </div>

        </div>

        <hr>
        <?php showErr(); ?>
        <hr />

        <div class="row">
            <div class="col-md-12">
                <button type="submit" name="acao" class="btn btn-primary">Enregistrer</button>
                <a href="?pg=produtos" class="btn btn-danger">Retour</a>
            </div>
        </div>

    </form>
</div>