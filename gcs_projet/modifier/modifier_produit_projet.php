<?php
	include('config.php');
	$id_prix = $_GET['id_prix'];
	if (isset($_POST['update'])) 
	{
		# code...
		$id=$_POST['id'];
		$prix_prod=$_POST['prix_prod'];
		$id_prod=$_POST['id_prod'];
		$commentaire_prix=$_POST['commentaire_prix'];
		$id_typepart=$_POST['id_typepart'];
		//update
		$query_update="UPDATE prix SET prix_prod= :prix_prod, commentaire_prix= :commentaire_prix,id_prod= :id_prod,id_typepart= :id_typepart WHERE id_prix = :id_prix";
		$statement_update=$pdo->prepare($query_update,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		$statement_update->execute(array(':prix_prod'=>$prix_prod,':commentaire_prix'=>$commentaire_prix,':id_prod'=>$id_prod,':id_typepart'=>$id_typepart,':id_prix'=>$id));	
		echo $statement_update->rowCount() . " Produit mis à jour <br/>";
		    ?>
		    <script type="text/javascript">
		    	//Redirection automatique aprés 3s
		    	setTimeout(function(){window.location.href="index.php";},2000);
		    </script>
		    <?php
	}
    	//AFFICHAGE
        $query_select='SELECT * FROM prix WHERE id_prix=:id_prix';
    	$statement_select = $pdo->prepare($query_select,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    	$statement_select->execute(array(':id_prix'=>$id_prix));

    	while ($row_select=$statement_select->fetch()) 
    	{
   		  	$prix_prod=$row_select['prix_prod'];
		    $commentaire_prix=$row_select['commentaire_prix'];
		    $id_typepart=$row_select['id_typepart']; 
   		}	
?>


<!DOCTYPE html>
<html>
<head>
	<title>AJOUTER LE PRIX D'UN PRODUIT</title>
</head>
<body>
<form method="POST" action="edit_prix.php">
<input type="hidden" required="required" name="id" value="<?php echo $id_prix;?>">

	<table>
	<tr>
		<td>
			<label>PRODUIT :</label>
		</td>
		<td>
			<select required="required" name="id_prod" >
				<?php   
					$query_select='SELECT * FROM prix px INNER JOIN produit p on px.id_prod=p.id_prod WHERE id_prix=:id_prix ';
    				$statement_select = $pdo->prepare($query_select,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    				$statement_select->execute(array(':id_prix'=>$id_prix));
    				$row_select=$statement_select->fetch();

					echo "<option value=".$row_select['id_prod'].">". $row_select['lib_prod']." </option>";
					//requete pour selectionner les produits
			     	$query_prod='SELECT  * FROM produit WHERE id_prod<>:id_prod';
			    	$statement_prod = $pdo->prepare($query_prod,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
			    	$statement_prod->execute(array(':id_prod'=>$row_select['id_prod']));
				 	while($row_prod=$statement_prod->fetch())
			          	{ 
			          		echo "<option value=".$row_prod['id_prod'].">". $row_prod['lib_prod']." </option>";
			  			} 
			     ?>
			</select>
		</td>	
	</tr>
	<tr>
		<td>
			<label>PRIX :</label>
		</td>
		<td>
			<input type="text" name="prix_prod" required="required" value="<?php echo $prix_prod;?>">
		</td>
	</tr>
	<tr>
		<td>
			<label>COMMENTAIRE :</label>
		</td>
		<td>
			<textarea minlength='20' maxlength='70' name='commentaire_prix' rows="6" cols="40"> </textarea>
		</td>
	</tr>
	<tr>
		<td>
			<label>TYPE DE PARTENARIAT :</label>
		</td>
		<td>
			<select  required="required" name="id_typepart">
				<?php  

					//selectionner tout le type de partenariat indexe 
					$query_typep='SELECT * FROM prix px INNER JOIN type_partenariat t on px.id_typepart=t.id_typepart WHERE id_prix=:id_prix ';
    				$statement_typep = $pdo->prepare($query_typep,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    				$statement_typep->execute(array(':id_prix'=>$id_prix));
    				$row_typep=$statement_typep->fetch();

					echo "<option value=".$row_typep['id_typepart'].">". $row_typep['lib_typepart']." </option>";
					///requete pour selectionner tout les autres types de partenariat
			     	$query_type='SELECT  * FROM type_partenariat WHERE id_typepart<>:id_typepart';
			    	$statement_type = $pdo->prepare($query_type,array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
			    	$statement_type->execute(array(':id_typepart'=>$row_typep['id_typepart']));
			    	
				 	while($row_type=$statement_type->fetch())
			          	{ 
			          		echo "<option value=".$row_type['id_typepart'].">". $row_type['lib_typepart']." </option>";
			  			} 
			     ?> 
			</select>
		</td>
	</tr>
	<tr >
		<td colspan="2" align="center">
			<input type="submit" name="update" value="UPDATE">
		</td>
	</tr>
	
    </table>
</form>
</body>
</html>