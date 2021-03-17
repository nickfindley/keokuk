<?php
wp_register_script( 'dutchtown-chart', autoversion( '/dist/js/chart.min.js' ), false, '0.1', false );
wp_enqueue_script( 'dutchtown-chart' );

$chart_title = get_field( 'chart_title' );
$chart_width = get_field( 'chart_width' );
$chart_height = get_field( 'chart_height' );

if ( get_field( 'chart_stacked' ) ) : 
    $chart_stacked = 'true';
else :
    $chart_stacked = 'false';
endif;

if ( get_field( 'chart_display_title' ) ) : 
    $chart_display_title = 'true';
else :
    $chart_display_title = 'false';
endif;
                    
if ( get_field( 'chart_display_legend' ) ) :
    $chart_display_legend = 'true';
else :
    $chart_display_legend = 'false';
endif;

if ( get_field( 'chart_dataset_opacity' ) ) :
    $chart_dataset_opacity = get_field( 'chart_dataset_opacity' ) / 100;
else :
    $chart_dataset_opacity = 1;
endif;

$ticks = '';
if ( get_field( 'chart_axis_minimum' ) || get_field( 'chart_axis_maximum' ) ) :
    $ticks .= "ticks: {";
    if ( get_field( 'chart_axis_minimum' ) ) :
        $ticks .= "min: " . get_field( 'chart_axis_minimum' ) . ",\n";
    endif;

    if ( get_field( 'chart_axis_maximum' ) ) :
        $ticks .= "max: " . get_field( 'chart_axis_maximum' ) . ",\n";
    endif;
    $ticks .= "},\n";
endif;

 
$block_id = 'chartjs_' . $block['id'];
$block_classes= 'chartjs';

if ( ! empty( $block['className'] ) ) :
     $block_classes .= ' ' . $block['className'];
endif;
?>

<div class="chart-container" style="position: relative;">
    <canvas id="<?php echo $block_id; ?>" width="<?php echo $chart_width; ?>" height="<?php echo $chart_height; ?>">
    </canvas>
</div>

<?php
    $labels = '';
    if ( have_rows( 'chart_labels' ) ) :
        $labels .= "labels: [\n";
        while ( have_rows( 'chart_labels' ) ) :
            the_row();
            $labels .= "'" . get_sub_field( 'label' ) . "', \n";
        endwhile;
        $labels .= "], ";
    endif;

    $datasets = '';
    if ( have_rows( 'chart_datasets' ) ) :
        $datasets .= "datasets: [\n";
        while ( have_rows( 'chart_datasets' ) ) :
            the_row();

            if ( ! get_sub_field( 'dataset_fill' ) ) :
                $dataset_fill = 'false';
            else :
                $dataset_fill = "'start'";
            endif;

            if ( ! get_sub_field( 'dataset_line' ) ) :
                $dataset_line = 'false';
            else :
                $dataset_line = 'true';
            endif;

            if ( get_sub_field( 'dataset_color' ) ) :
                $dataset_color = get_sub_field( 'dataset_color' );
            else :
                $dataset_color = 'fce409';
            endif;

            if ( get_sub_field( 'dataset_border_color' ) == 'datasetColor' ) :
                $dataset_border_color = $dataset_color;
            elseif ( get_sub_field( 'dataset_border_color' )  == 'black' ) :
                $dataset_border_color = '000000';
            elseif ( get_sub_field( 'dataset_border_color' )  == 'other' ) :
                if ( get_sub_field( 'dataset_border_other_color' ) ) :
                    $dataset_border_color = get_sub_field( 'dataset_border_other_color' );
                else :
                    $dataset_border_color = '000000';
                endif;
            endif;

            if ( get_sub_field( 'dataset_border_width' ) ) :
                $dataset_border_width = get_sub_field( 'dataset_border_width' );
            else :
                $dataset_border_width = 2;
            endif;

            if ( get_sub_field( 'dataset_point_style' ) ) :
                $dataset_point_style = get_sub_field( 'dataset_point_style' );
            else :
                $dataset_point_style = 'circle';
            endif;

            if ( get_sub_field( 'dataset_point_size' ) ) :
                $dataset_point_size = get_sub_field( 'dataset_point_size' );
            else :
                $dataset_point_size = 5;
            endif;

            if ( get_sub_field( 'dataset_point_hover_size' ) ) :
                $dataset_point_hover_size = get_sub_field( 'dataset_point_hover_size' );
            else :
                $dataset_point_hover_size = 10;
            endif;

            $datasets .= "{\n";
            $datasets .= "label: '" . get_sub_field( 'dataset_label' ) . "',\n";
            $datasets .= "backgroundColor: '". hex2rgb( $dataset_color, $chart_dataset_opacity ) . "',\n";
            $datasets .= "borderColor: '". hex2rgb( $dataset_border_color, 1 ) . "',\n";
            $datasets .= "fill: $dataset_fill,\n";
            $datasets .= "pointBackgroundColor: '". hex2rgb( $dataset_border_color, 1 ) . "',\n";
            $datasets .= "pointBorderWidth: '$dataset_border_width',\n";
            $datasets .= "pointHoverRadius: $dataset_point_hover_size,\n";
            $datasets .= "pointRadius: $dataset_point_size,\n";
            $datasets .= "pointStyle: '$dataset_point_style',\n";
            $datasets .= "showLine: $dataset_line,\n";

            if ( have_rows( 'dataset_data' ) ) :
                $datasets .= "data: [\n";
                while ( have_rows( 'dataset_data' ) ) :
                    the_row();
                    $datasets .= get_sub_field( 'data_value' ) . ", \n";
                endwhile;
                $datasets .= "]\n";
            endif;

            $datasets .= "},\n";
        endwhile;
        $datasets .= "]\n";
    endif;
?>

<script>
    Chart.defaults.global.defaultFontFamily = 'Avenir, \"Avenir Next\", AvenirNext, sans-serif';
    var <?php echo $block_id; ?> = document.getElementById('<?php echo $block_id; ?>');
    var myChart = new Chart(<?php echo $block_id; ?>, {
        type: 'line',
        data: {
            <?php echo $labels; ?>
            <?php echo $datasets; ?>
        },
        options: {
            scales: {
                yAxes: [{
                    stacked: <?php echo $chart_stacked; ?>,
                    <?php echo $ticks; ?>
                }]
            }
        }
    });
</script>