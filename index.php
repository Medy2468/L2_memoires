<?php 
    include_once "header.php"; 
    require_once "models/domaine.php";
    require_once "models/Sujet.php"; 
    $domaines = getDomaines();
     //var dump($domaine)
?> 


<div class="container"> <!--Mon contenu-->
    <div class="row bg-dark text-white">
        <div class="col-md-4 col-sm-4 col-lg-4 mt-2">
            <p><a href="/Mes projets/L2_memoires/public/image/recherche.jpg"><img src="/Mes projets/L2_memoires/public/image/recherche.jpg" alt="image de recherche" width="40%"></a></p>
            <a href="" class="btn btn-outline-primary btn-lg rounded-circle shadow-none">Espace superviseur</a>
        </div>
        <div class="col-md-8 col-sm-8 col-lg-8">
            <div class="row mt-2">
                <div class="col md-6 text-center">
                    <p>NSANGOU Medy Lord Exauce,Superviseur</p>
                </div>
                <div class="col md-6">
                    <button class="btn btn-primary btn-lg float-right">Se connecter</button>
                </div>
            </div>
            
             <div class="row">
                <div class="col-md-6">
                    Pour nous contacter: <h6>00221 78 151 38 51</h6>
                </div>
                <div class="col-md-3 offset-3">
                    
                    Envoyer un mail au: <h6><a href="">lordnsangou@L2ISI.com</a></h6>

                </div>
             </div>
            <div class="row">
                <div class="col-md text-center">
                    <h4 class="alert alert-primary">Bienvenue ! Nous vous facilitions la recherche de votre sujet de mémoire</h4>
                </div>
            </div>
        </div>
    </div>
    <?php
    	if (isset($_GET['page'])) {
    		$p = $_GET['page'];
    		if ($p == "nouveauSujet") {
    			include_once "pages/ajoutSujet.php";
    		}
    	}else{ ?>

    	<div class="row">
        <div class="card col-md-12">
            <div class="card-header">
                <div class="row">
                    <span class="h2 text-primary">Nos Domaines</span>
                </div>
            </div>
            <div class="card-body">
                <?php foreach($domaines as $dom) {?>
                    <button value="<?= $dom['idDomaine']?>" onclick="chargerSujet(this)" class="btn btn-outline-info btn-lg shadow-none"><?= $dom['nomDomaine']?></button> <!--à remplir plus tard avec la bd -->
                <?php }?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card col-md-12">
            <div class="card-header">
                <div class="row">
                    <span class="h2 text-primary">
                        Sujets du domaine 
                        <span id="nomDomaine" class="text-uppercase h2"></span>
                    </span>
                    <a href="?page=nouveauSujet" class=" btn btn-primary offset-7">Nouveau Sujet</a>
                </div>
            </div>
            <div class="card-body" id="infoSujets">
                
            </div>
        </div>
    </div>
 
<?php } ?>

 </div>   

       <script src="/Mes projets/L2_memoires/public/js/jquery-3.3.1.js"></script>      
        <script>
            function chargerSujet(element)
            {
                // alert(element.value);
                $.ajax({
                    type: "get", 
                    url: "http://localhost/Mes%20projets/L2_memoires/public/ajax/getSujetByDomaine.php",
                    data: {idDomaine:element.value},
                    dataType: "JSON",
                    success: function(resultat){
                        // console.log(resultat);
                        $("#infoSujets").empty();
                        if(resultat == "0")
                        {
                            // alert("Ce domaine n'a pas de sujets.");
                            $("#infoSujets").append(`<h3>Aucun sujet pour ce domaine.</h3>`);
                            $("#nomDomaine").html("");
                        }
                        else
                        {
                            // alert("OK");
                            $("#nomDomaine").html(resultat[0].nomDomaine);
                            let contenu = `
                            <table class="table table-bordered">
                                <tr>
                                    <th>Libellé</th>
                                    <th>Description</th>
                                    <th>Problématique</th>
                                </tr>`;
                            resultat.forEach(elt => 
                                {
                                    contenu += `
                                        <tr>
                                            <td>${elt.libelleSujet}</td>
                                            <td>${elt.description}</td>
                                            <td>${elt.problematique}</td>
                                        </tr>`;
                                }
                            );
                            contenu += `</table>`;
                            $("#infoSujets").append(contenu);
                        }
                    },
                    error: function(){
                        alert("erreur");
                    }
                });
            }
        </script>


</body>
</html>