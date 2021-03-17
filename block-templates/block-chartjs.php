<?php
wp_register_script( 'dutchtown-chart', autoversion( '/dist/js/chart.min.js' ), false, '0.1', false );
wp_enqueue_script( 'dutchtown-chart' );

$chart_title = get_field( 'chart_title' );
$chart_type = get_field( 'chart_type' );

if ( have_rows( 'chart_options' ) ) :
    while ( have_rows( 'chart_options' ) ) :
        the_row();
        $chart_align = get_sub_field( 'align' );
        $chart_width = get_sub_field( 'width' );
        $chart_height = get_sub_field( 'height' );
        
        if ( get_sub_field( 'title' ) ) : 
            $chart_display_title = 'true';
        else :
            $chart_display_title = 'false';
        endif;
        
        if ( get_sub_field( 'legend' ) ) :
            $chart_display_legend = 'true';
        else :
            $chart_display_legend = 'false';
        endif;
    endwhile;
endif;
 
$block_id = 'chartjs_' . $block['id'];
$block_classes= 'chartjs';

if ( ! empty( $block['className'] ) ) :
     $block_classes .= ' ' . $block['className'];
endif;
?>

<div class="chart-container <?php echo $chart_align; ?>" style="position: relative;">
    <canvas id="<?php echo $block_id; ?>" width="<?php echo $chart_width; ?>" height="<?php echo $chart_height; ?>">
    </canvas>
</div>

<?php
    $data = '';
    $datasets = '';
    $labels = '';
    $datasets_data = '';
    $colors = '';


    $data_array = array();
    $i = -1;

    $dataset_array = array();
    $dataset_inc = -1;
    
    if ( have_rows( 'chart_labels' ) ) :
        while ( Have_rows( 'chart_labels' ) ) :
            the_row();
            $labels .= "'" . get_sub_field( 'label' ) . "', ";
        endwhile;
    endif;


    if ( have_rows( 'chart_data' ) ) :
        while ( have_rows( 'chart_data' ) ) :
            the_row();

            if ( have_rows( 'dataset' ) ) :
                while( have_rows( 'dataset' ) ) :
                    the_row();
                    $dataset_name = get_sub_field( 'dataset_name' );
                    $dataset_array[$dataset_name]['dataset_color'][] = get_sub_field( 'dataset_color' );

                    if ( have_rows( 'data' ) ) :
                        while ( have_rows( 'data' ) ) :
                            the_row();
                            $dataset_array[$dataset_name]['data_value'][] = get_sub_field( 'data_value' );
                            $dataset_array[$dataset_name]['data_color'][] = get_sub_field( 'data_color' );
                        endwhile;
                    endif;
                endwhile;
            endif;
        endwhile;
    endif;

    // echo '<pre>'; print_r( $dataset_array ); echo '</pre>';


            // $axis = get_sub_field( 'axis' );
            // $axis_id = 'axis_' . get_sub_field( 'dataset_name' );
            // $axis_min = get_sub_field( 'min' );
            // $axis_max = get_sub_field( 'max' );
            // $x_axes_output = '';
            // $y_axes_output = '';

            // if ( $axis = 'xAxis' ) :
            //     $x_axes_output .= "{\n";
            //     $x_axes_output .= "\t\t\t\t\t\tid: '$axis_id',\n";
            //     $x_axes_output .= "\t\t\t\t\t\tticks: {\n";
            //     $x_axes_output .= "\t\t\t\t\t\t\tmin: $axis_min,\n";
            //     $x_axes_output .= "\t\t\t\t\t\t\tmax: $axis_max\n";
            //     $x_axes_output .= "\t\t\t\t\t\t},\n";
            //     $x_axes_output .= "\t\t\t\t\t},\n";
            // elseif ( $axis = 'yAxis' ) :
            //     $y_axes_output .= "{\n";
            //     $y_axes_output .= "\t\t\t\t\t\tid: '$axis_id',\n";
            //     $y_axes_output .= "\t\t\t\t\t\tticks: {\n";
            //     $y_axes_output .= "\t\t\t\t\t\t\tmin: $axis_min,\n";
            //     $y_axes_output .= "\t\t\t\t\t\t\tmax: $axis_max\n";
            //     $y_axes_output .= "\t\t\t\t\t\t},\n";
            //     $y_axes_output .= "\t\t\t\t\t},\n";
            // endif;

    $dataset_output = '';
    
    foreach ( $dataset_array as $dataset_key => $dataset_value ) :
        if ( $chart_type == 'line' ) :
            $dataset_output .=
                "\t\t\t\t{
                    // borderColor: '#000000',
                    // borderWidth: 1,
                    // pointBorderColor: '#000000',
                    // pointBorderWidth: 2,
                    // pointRadius:
                    // fill: false,
                    label: '$dataset_key',\n";
        else : 
            $dataset_output .=
                "\t\t\t\t{
                    // borderColor: '#000000',
                    // borderWidth: 1,
                    // pointBorderColor: '#000000',
                    // pointBorderWidth: 2,
                    // fill: 'start',
                    label: '$dataset_key',\n";
        endif;

        foreach ( $dataset_value as $data_key => $data_value ) :
            $data_output = '';
            $color_output = '';
            $background_output = '';
            if ( $data_key == 'data_value' ) :
                $data_output .= "\t\t\t\t\tdata: [\n";
                foreach ( $data_value as $data_value_key => $data_value_value ) :
                    $data_values[$dataset_key][] = $data_value_value;
                    $data_output .= "\t\t\t\t\t\t'" . $data_value_value . "', \n";
                endforeach;
                $data_output .= "\t\t\t\t\t],";
            endif;

            if ( $chart_type == 'pie' || $chart_type == 'doughnut' ) :
                if ( $data_key == 'data_color' ) :
                    if ( empty( $dataset_color ) ) :
                        $color_output .= "\t\t\t\t\tbackgroundColor: [\n";
                        foreach ( $data_value as $data_value_key => $data_value_value ) :
                            if ( ! empty( $data_value_value ) ) :
                                $data_colors[$dataset_key][] = '#ff0000';
                            else : 
                                $data_colors[$dataset_key][] = '#fce409';
                            endif;
                            $color_output .= "\t\t\t\t\t\t'" . $data_value_value . "', \n";
                        endforeach;
                        $color_output .= "\t\t\t\t\t],";
                    endif;
                endif;
            elseif ( $chart_type == 'bar' || $chart_type == 'horizontalBar' || $chart_type == 'line' ) :
                if ( $data_key == 'dataset_color' ) :
                    $background_output = "backgroundColor: '" . $data_value[0] . "', ";
                endif;
            endif;
            $dataset_output .= $background_output;
            $dataset_output .= $data_output . "";
            $dataset_output .= $color_output . "\n";
        endforeach;
        $dataset_output .= "\t\t\t\t}, \n";
    endforeach;
?>

<pre>
<?php
    $output = "
        data: {
            labels: [$labels],
            datasets: [
                $dataset_output
            ]
        },
        options: {
            responsive: true,
            title: {
                display: $chart_display_title,
                text: '$chart_title',
            },
            legend: {
                display: $chart_display_legend
            },
            scales: {
            ";
        // if ( $x_axes_output != '' ) :
        //     $output .= "
        //         xAxes: [
        //             $x_axes_output
        //         ],";
        // endif;
        // if ( $y_axes_output != '') :
        //     $output .= "
        //         yAxes: [
        //             $y_axes_output
        //         ]";
        // endif;
    $output .= "
            }
        }
        ";
?>
</pre>

<script>
    Chart.defaults.global.defaultFontFamily = 'Avenir, \"Avenir Next\", AvenirNext, sans-serif';
    var <?php echo $block_id; ?> = document.getElementById('<?php echo $block_id; ?>');
    var myChart = new Chart(<?php echo $block_id; ?>, {
        type: '<?php echo $chart_type; ?>',
        <?php echo $output; ?>
    });
</script>

<div class="chart-container" style="position: relative;">
    <canvas id="populationTrend19802020" width="<?php echo $chart_width; ?>" height="<?php echo $chart_height; ?>">
    </canvas>
</div>

<script>
    Chart.defaults.global.defaultFontFamily = 'Avenir, \"Avenir Next\", AvenirNext, sans-serif';
    
var populationTrend19802020 = document.getElementById('populationTrend19802020');
var myChart = new Chart(populationTrend19802020, {
    type: 'line',
    data: {
        labels: ['1940', '1950', '1960', '1970', '1980', '1990', '2000', '2010', '2019'],
        datasets: [{
            label: 'Non-white population',
            data: [341, 394, 436, 428, 1111, 5675, 20727, 26776, 27649],
            backgroundColor: '<?php hex2rgb( '00ffff', .25 ); ?>',
            borderColor: '#000000',
            pointBackgroundColor: 'rgba(252,5,29,1)',
            pointBorderColor: '#000000',
            pointBorderWidth: 2,
            order: 2
        },
        {
            label: 'Black population',
            data: [335, 373, 333, 93, 400, 3479, 16446, 18690, 19226],
            backgroundColor: 'rgba(0,0,0,1)',
            borderColor: '#000000',
            pointBackgroundColor: 'rgba(0,0,0,1)',
            pointBorderColor: '#000000',
            pointBorderWidth: 2,
            order: 1
        },
        {
            label: 'White population',
            data: [81000, 79000, 73000, 62000, 52000, 43000, 24000, 22000, 19000],
            backgroundColor: 'rgba(200,200,200,1)',
            borderColor: '#000000',
            pointBackgroundColor: 'rgba(200,200,200,1)',
            pointBorderColor: '#000000',
            pointBorderWidth: 2,
            order: 3
        },
        {
            label: 'Total population',
            data: [81926, 81944, 73986, 62911, 53127, 44453, 41784, 40069, 41828],
            backgroundColor: 'rgba(252,228,6,1)',
            borderColor: '#000000',
            pointBackgroundColor: 'rgba(252,228,6,1)',
            pointBorderColor: '#000000',
            pointBorderWidth: 2,
            order: 4
        }]
    },
    options: {
        title: {
            display: true,
            text: 'Population of Greater Dutchtown, 1940–2019'
        },
        legend: {
            labels: {
                usePointStyle: true
            }
        },
        scales: {
            yAxes: [{
                ticks: {
                    min: 0
                }
            }]
        }
    }
});

</script>