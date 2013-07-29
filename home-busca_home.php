<? wp_reset_query(); ?>
<div id="busca-home" <? if (!is_home()) { echo 'class="busca-home-categoria"'; } ?>>
	<section id="onde-ir">
		<nav>
			<div class="busca-cima">
				<h2>ONDE IR</h2>
				<? wp_reset_query();
					$args['category_name']='roteiro';
					$args['posts_per_page']=1;
					query_posts($args);
					if(have_posts()):
					while(have_posts()): the_post();
				?>
				<?php $title_h5 = get_the_title();
					$title_h5_2 = substr($title_h5, 0, 75);
					echo '<h5>' . $title_h5_2;
					if ($title_h5_2 != $title_h5) {
						echo " ...";
					}
					echo '</h5>';
					unset ($title_h5, $title_h5_2);
				?>
				
				<?php $short_title = get_the_excerpt();
					$short_title_2 = substr($short_title, 0, 100);
					echo '<article>' . $short_title_2;
					if ($short_title_2 != $short_title) {
						echo " ...";
					}
					echo '</article>';
					unset($short_title, $short_title_2);
				?>
			</div>
				<? endwhile; endif;?>

			<form method="post" id="searchform" action="<?  echo get_page_link(30);?>" class="data-form">
				<fieldset>				
					<select name="city">
						<option value="">Cidade</option>
						<?php
						global $wpdb;
						$total = $wpdb -> get_results('SELECT wp_term_taxonomy.term_id, wp_terms.name FROM wp_term_taxonomy INNER JOIN wp_terms ON wp_term_taxonomy.term_id = wp_terms.term_id WHERE taxonomy = "city"');

						foreach ($total as $totals) {
							print("<option>" . "$totals->name" . "</option>");
						}
						?>
					</select>
					<select name="cuisine">
						<option value="">Cozinha</option>
						<option>Adega </option>
						<option>Alem&atilde;</option>
						<option>Bar </option>
						<option>Bistr&ocirc; </option>
						<option>Buffet </option>
						<option>Caf&eacute; </option>
						<option>Carnes </option>
						<option>Ch&aacute;s </option>
						<option>Chinesa </option>
						<option>Contempor&acirc;nea </option>
						<option>Cl&aacute;sssica </option>
						<option>Crepes </option>
						<option>Doces </option>
						<option>Emp&oacute;srio </option>
						<option>fast-food </option>
						<option>Francesa </option>
						<option>frutos-do-mar </option>
						<option>Internacional </option>
						<option>Italiana </option>
						<option>Japon&ecirc;s </option>
						<option>Lanches </option>
						<option>Massas </option>
						<option>Mediterr&acirc;nea </option>
						<option>Oriental </option>
						<option>Peruana </option>
						<option>Pizzas </option>
						<option>Regional </option>
						<option>Rod&iacute;zio </option>
						<option>Sandu&iacute;ches </option>
						<option>Sopas </option>
						</select>				
					<input type="submit" value="buscar" />
				</fieldset>
			</form>
		</nav>
		<div class="img-busca-home">
			<a href="<?the_permalink();?>">
				<?php if ( has_post_thumbnail() ) {
					the_post_thumbnail( 'homepage-thumb', array( 'title' => ''.get_the_title().'' ));
				} ?>			
			</a>
		</div>
	</section>	
	<div id="bg-meio"></div>
	<section id="receitas" class="last">
		<nav>
			<div class="busca-cima">
				<h2>RECEITAS</h2>
				<? wp_reset_query();
					$args['category_name']='receitas';
					$args['posts_per_page']=1;
					query_posts($args);
					if(have_posts()):
					while(have_posts()): the_post();
				?>
				<?php $title_h5 = get_the_title();
					$title_h5_2 = substr($title_h5, 0, 75);
					echo '<h5>' . $title_h5_2;
					if ($title_h5_2 != $title_h5) {
						echo " ...";
					}
					echo '</h5>';
					unset ($title_h5, $title_h5_2);
				?>
				
				<?php $short_title = get_the_excerpt();
					$short_title_2 = substr($short_title, 0, 100);
					echo '<article>' . $short_title_2;
					if ($short_title_2 != $short_title) {
						echo " ...";
					}
					echo '</article>';
					unset($short_title, $short_title_2);
				?>
			</div>
				<? endwhile; endif;?>

			<form method="post" id="searchform" action="<? echo get_page_link(23);?>" class="data-form">
				<fieldset>					
					<select name="types">
						<option value="">Tipo</option>
						<option> Alem&atilde;</option>
						<option> Arroz</option>
						<option> Assado</option>
						<option> Aves</option>
						<option> Azeite</option>
						<option> Bacalhau</option>
						<option> Baiana</option>
						<option> Batata</option>
						<option> Baunilha</option>
						<option> Biscoito</option>
						<option> Bolo</option>
						<option> Caldos</option>
						<option> Carnes</option>
						<option> Cereal</option>
						<option> Cerveja</option>
						<option> Ch&aacute;</option>
						<option> Chocolate</option>
						<option> Cobertura</option>
						<option> Coco</option>
						<option> Creme de Leite</option>
						<option> Creme</option>
						<option> Crocante</option>
						<option> Defumado</option>
						<option> Dend&ecirc;</option>
						<option> Diet</option>
						<option> Doce</option>
						<option> Docinhos</option>
						<option> Drinks</option>
						<option> Ensopados</option>
						<option> Entrada</option>
						<option> Erva</option>
						<option> Farinha de trigo</option>
						<option> Farinha</option>
						<option> Fermento</option>
						<option> Festa</option>
						<option> Frencesa</option>
						<option> Frio</option>
						<option> Fritura</option>
						<option> Frutas secas</option>
						<option> Frutas vermelhas</option>
						<option> Frutos do mar</option>
						<option> Fuba</option>
						<option> Gelados</option>
						<option> Gratinado</option>
						<option> Grelhado</option>
						<option> Infantil</option>
						<option> Iogurte</option>
						<option> Italiana</option>
						<option> Legume</option>
						<option> Leite de coco</option>
						<option> Licor</option>
						<option> Light</option>
						<option> Lim&atilde;o</option>
						<option> Lingui&ccedil;a</option>
						<option> Macarr&atilde;o</option>
						<option> Manteiga</option>
						<option> Massas</option>
						<option> Mediterr&acirc;nea</option>
						<option> Mel</option>
						<option> Merengue</option>
						<option> Milho</option>
						<option> Mineira</option>
						<option> Molho</option>
						<option> &Oacute;leo</option>
						<option> Oriental</option>
						<option> P&atilde;es</option>
						<option> P&atilde;o</option>
						<option> Pastel</option>
						<option> Pastel&atilde;o</option>
						<option> Pav&ecirc;</option>
						<option> Peixes</option>
						<option> Petisco</option>
						<option> Pimenta</option>
						<option> Pudim</option>
						<option> Queijo</option>
						<option> Quente</option>
						<option> Raiz</option>
						<option> Refogado</option>
						<option> Regional</option>
						<option> Risoto</option>
						<option> Rocambole</option>
						<option> Salada</option>
						<option> Salgados</option>
						<option> Salsicha</option>
						<option> Saud&aacute;vel</option>
						<option> Semente</option>
						<option> Sobremesa</option>
						<option> Sopa</option>
						<option> Suco</option>
						<option> Sufl&ecirc;</option>
						<option> Sushi</option>
						<option> Tomate</option>
						<option> Torrado</option>
						<option> Torta salgada</option>
						<option> Torta</option>
						<option> Verdura</option>
						<option> Vinho</option>
						<option> Vitamina</option>
						<option> Vodka</option>
						<option> Whisky</option>
						<option> World Fusion</option>
						<option> Xarope</option>
						<option>Calda</option>
						<option>Doces</option>
					</select>					
					<select name="ingredients">
						<option value="">Preparo</option>
						<option> Batedeira </option><option>Fog&atilde;o </option><option> Forno </option><option> Forno e Fog&atilde;o </option><option> Gelados </option><option> Liquidificador </option><option> Microondas </option><option> Vapor </option>
					</select>					
					<input type="submit" value="buscar" />
				</fieldset>
			</form>
		</nav>	
		
		<div class="img-busca-home">
			<a href="<?the_permalink();?>">
				<?php if ( has_post_thumbnail() ) {
					the_post_thumbnail( 'homepage-thumb', array( 'title' => ''.get_the_title().'' ));
				} ?>			
			</a>
		</div>
	</section>
 </div>