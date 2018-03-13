<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/img/favicon.png">

<title><?php echo get_bloginfo('name') ?></title>
<meta name="description" content="<?php echo get_bloginfo('description') ?>" />

<style>
<?php
    require_once('critical.php');
?>
</style>

<?php wp_head();?>
</script>
</head>
<body <?php body_class(); ?>>