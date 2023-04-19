<?php
class FilterWidget extends WP_Widget {
	function __construct() {
		parent::__construct('wpb_widget',__('Filter Widget', 'filter_widget'), 

		array( 'description' => __( 'Widget for filtering buildings', 'filter_widget' ), )
		);
	}

	public function widget( $args, $instance ) {
		$regions = get_terms("region");

		echo "<div class=\"post-filter\">
				<div class=\"fields\">
					<select name=\"region\">
						<option value=\"\">Будь-який</option>";
		foreach($regions as $region){
			$slug = $region->slug;
			$name = $region->name;
			echo "<option value=\"{$slug}\">{$name}</option>";
		}
							

					echo "</select>

					<input type=\"text\" placeholder=\"Кількість приміщень\" name=\"number_of_floors\">
					<select name=\"type\">
						<option value=\"\">Будь-який</option>
						<option value=\"panel\">Панель</option>
						<option value=\"brick\">Цегла</option>
						<option value=\"foam-block\">Піноблок</option>
					</select>
					<input type=\"text\" name=\"eco-friendliness\" placeholder=\"Екологічність\">
				</div>
				<button>Пошук</button>
			</div>";
	}

}
?>