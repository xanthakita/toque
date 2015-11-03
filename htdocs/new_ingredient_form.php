<!DOCTYPE html>
<?php

?>
<html>
    <head>
        <title>Toque | Add an ingredient</title>
        <link rel='stylesheet' type='text/css' href='/css/base.css'>
		<script type="text/javascript" src="/js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="/js/general.js"></script>
    </head>
    <body>
	<!--<center><img src='Toque_banner_linear_XpressHeavySF.png'></center>-->
       	<?php include 'ssi/header.php'; ?>
		<?php include 'ssi/float.php'; ?>
        
		<div id='main'>
            <div id='body'>
                <div id='new_ingredient' class='recipe'>
				
					<div>
                                            <h3>Submit a new ingredient</h3>
                                            
                                            <!-- UPDATE FORM ACTION -->
                                            <form action="ssi/new_ingredient.php" method="post" id="new_ingredient_form">
                                                
                                                <?php
                                                #get error message, if exists
                                                $em = $_GET['errmsg'];
                                                if (!empty($em))
                                                {
                                                    echo $em . "<br /><br />";
                                                }
                                                ?>
                                                <table width="50%">
                                                    <tr>
                                                        <td>
                                                        <label>Name:</label>&nbsp;
                                                        </td>
                                                        <td>
                                                        <input type="text" name="ingredient_name" />
                                                        </td>
                                                    </tr>
                                                        <td>
                                                        <label>Description:</label>&nbsp;
                                                        </td>
                                                        <td>
                                                        <input type="text" name="ingredient_description" />
                                                        </td>
                                                </table>
                                                <br />
                                                
                                                <br />
                                                <input type="submit" value="Submit" />
                                            </form>
                                            <br />
                                                <br />
                                                <br />
                                                <br />
                                                <br />
                                                <br />
                                            <p>&nbsp;</p>
                                            <p>&nbsp;</p>
                                        </div>
                </div>
				
                <!--<div id="side" class='side'>
		<?php include 'ssi/sideInclude.php'; ?>
                </div>-->
            </div>
		</div>
		<?php include 'ssi/footer.php'; ?>

                
	</body>
</html>