<h1>Lista delle pagine create</h1>

<?php
// Ottieni le pagine che contengono la meta key '_custom_page_maker'
$args = array(
    'post_type'  => 'page',
    'meta_key'   => '_custom_page_maker',
    'meta_value' => true
);
$custom_pages = new WP_Query($args);

if ($custom_pages->have_posts()) : ?>
    <table class="widefat fixed" cellspacing="0">
        <thead>
            <tr>
                <th id="title" class="manage-column column-title column-primary">Titolo</th>
                <th id="date" class="manage-column column-date">Data di pubblicazione</th>
                <th id="actions" class="manage-column column-actions">Azioni</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($custom_pages->have_posts()) : $custom_pages->the_post(); ?>
                <tr>
                    <td class="column-title"><strong><?php the_title(); ?></strong></td>
                    <td class="column-date"><?php echo get_the_date(); ?></td>
                    <td class="column-actions">
                        <a href="<?php echo admin_url('admin.php?page=cpm_edit_page&page_id=' . get_the_ID()); ?>">Modifica</a> | 
                        <a href="<?php echo get_delete_post_link(); ?>">Elimina</a>
                    </td>

                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
<?php else : ?>
    <p>Non ci sono pagine create dal plugin.</p>
<?php endif;

wp_reset_postdata();
?>
