<h1>Modifica la pagina</h1>

<form method="post" action="">
    <input type="hidden" name="page_id" value="<?php echo $page->ID; ?>" />
    
    <table class="form-table">
        <tr>
            <th><label for="title">Titolo della pagina</label></th>
            <td><input type="text" id="title" name="title" class="regular-text" value="<?php echo esc_attr($page->post_title); ?>" required /></td>
        </tr>
        <tr>
            <th><label for="content">Contenuto della pagina</label></th>
            <td><textarea id="content" name="content" rows="5" class="large-text" required><?php echo esc_textarea($page->post_content); ?></textarea></td>
        </tr>
    </table>

    <p class="submit">
        <input type="submit" name="submit" id="submit" class="button button-primary" value="Salva modifiche">
    </p>
</form>

<?php
// Processa il form se inviato
if (isset($_POST['submit'])) {
    $page_id = intval($_POST['page_id']);
    $title = sanitize_text_field($_POST['title']);
    $content = sanitize_textarea_field($_POST['content']);

    // Aggiorna la pagina
    $updated_page = array(
        'ID'           => $page_id,
        'post_title'   => $title,
        'post_content' => $content,
    );

    $result = wp_update_post($updated_page);

    if (!is_wp_error($result)) {
        echo '<div class="notice notice-success"><p>Pagina aggiornata con successo!</p></div>';
    } else {
        echo '<div class="notice notice-error"><p>Errore nell\'aggiornamento della pagina.</p></div>';
    }
}
?>
