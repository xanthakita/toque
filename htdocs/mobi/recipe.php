<!DOCTYPE html>
<html>
    <head>
        <title>Toque | Home</title>
		<link rel="stylesheet" type="text/css" href="/css/m_calc.css">
        <!--[if IE]><link rel='stylesheet' type='text/css' href='/css/m_base_IE.css'><!--[endif]-->
		<script type="text/javascript" src="/js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="/js/calc.js"></script>
		<script type="text/javascript" src="/js/m_calc.js"></script>
    </head>
    <body>
	<!--<center><img src='Toque_banner_linear_XpressHeavySF.png'></center>-->
       	<?php include '../ssi/header.php'; ?>
		<div id='main'>
            <div id='body'>
                <div id="side" class='side'>
					<?php include '../ssi/m_side.php'; ?>
                </div>
                <div id='recipe' class='recipe'>
					<div>
						<div class="tag" style="color:#FFF;background-color:#939;">Sweet</div>
						<div class="tag" style="color:#000;background-color:#9C0;">Low carb</div>
						<div class="tag" style="color:#000;background-color:#6F9;">Snack</div>
					</div>
					<!--<div id="side-column">
						<ul>
							<li><a href="#">Sample Link One</a></li>
							<li><a href="#">Sample Link Two</a></li>
							<li><a href="#">Sample Link Three</a></li>
							<li><a href="#">Sample Link Four</a></li>
						</ul>
					</div>-->
					<div>
						<img width="175" height="175" alt="[recipe] image">
						
						<h3>[recipe title]</h3>
						<p>(Feeds [n] people)</p>
						
						<p>Preheat oven to [temperature].</p>
						<p>Mix [x] [measurement] of [item1] with [y] [measurement] of [item2] in [mixing container].</p>
						<p>Continue for [duration] or until [necessary condition].</p>
						<p>Mix [z] [measurement] into mixture, then pour into [baking container].</p>
						<p>Place in oven on [selected rack] for [duration] or until [necessary condition].</p>
						<p>Remove and allow to cool for [duration].</p>
						
						<h4>Original recipe by [ Website | user | chef ]</h4>
					</div>
                </div>
            </div>
		</div>
		<?php include '../ssi/footer.htm'; ?>
	</body>
</html>