<h1>Crea una nuova pagina</h1>
<form method="post" action="">
    <table class="form-table">
        <tr>
            <th><label for="title">Titolo della pagina</label></th>
            <td><input type="text" id="title" name="title" class="regular-text" required /></td>
        </tr>
        <tr>
            <th><label for="content">Contenuto della pagina</label></th>
            <td><textarea id="content" name="content" rows="5" class="large-text" required></textarea></td>
        </tr>
    </table>
    <p class="submit">
        <input type="submit" name="submit" id="submit" class="button button-primary" value="Crea Pagina">
    </p>
</form>

<?php
// Se il form è stato inviato, processa la creazione della nuova pagina
if (isset($_POST['submit'])) {
    $title = sanitize_text_field($_POST['title']);
    $content = sanitize_textarea_field($_POST['content']);
    
    // Crea una nuova pagina
    $new_page = array(
        'post_title'    => $title,
        'post_content'  => $content,
        'post_status'   => 'publish',
        'post_type'     => 'page',
    );
    
    $page_id = wp_insert_post($new_page);

    if ($page_id) {
        // Aggiungi la meta key personalizzata per questa pagina
        update_post_meta($page_id, '_custom_page_maker', true);
        echo '<div class="notice notice-success"><p>Pagina creata con successo!</p></div>';
    } else {
        echo '<div class="notice notice-error"><p>Errore nella creazione della pagina.</p></div>';
    }
}
?>
